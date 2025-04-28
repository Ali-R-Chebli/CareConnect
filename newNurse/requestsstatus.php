<?php
// Start session and include database connection
session_start();
$_SESSION['nurse_id'] = 8; // Example: manually set nurse ID
$_SESSION['user_type'] = 'nurse';
$_SESSION['logged_in'] = true;

$nurse_id = $_SESSION['nurse_id'];

require_once 'db_connection.php';



// Function to get formatted address
function getFormattedAddress($address_id, $conn)
{
    if (!$address_id) return "Address not specified";

    $stmt = $conn->prepare("SELECT Country, City, Street, Building FROM address WHERE AddressID = ?");
    $stmt->bind_param("i", $address_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $address = $result->fetch_assoc();
        return $address['Street'] . ', ' . $address['Building'] . ', ' . $address['City'] . ', ' . $address['Country'];
    }
    return "Address not found";
}


function getNurseRequests($nurse_id, $status, $conn)
{
    $requests = [];

    // Case 1: InProcess Requests
    if ($status === 'inprocess') {
        // Private requests (assigned directly to the nurse)
        $private_query = "SELECT r.* FROM request r
                          WHERE r.NurseID = ? AND r.RequestStatus = 'inprocess'";
        $stmt = $conn->prepare($private_query);
        $stmt->bind_param("i", $nurse_id);
        $stmt->execute();
        $private_results = $stmt->get_result();
        while ($row = $private_results->fetch_assoc()) {
            $requests[] = $row;
        }

        // Public requests (nurse applied and now inprocess)
        $public_query = "SELECT r.* FROM request r
                         JOIN request_applications ra ON r.RequestID = ra.RequestID
                         WHERE ra.NurseID = ? AND ra.ApplicationStatus = 'inprocess' 
                         AND r.RequestStatus = 'inprocess'";
        $stmt = $conn->prepare($public_query);
        $stmt->bind_param("i", $nurse_id);
        $stmt->execute();
        $public_results = $stmt->get_result();
        while ($row = $public_results->fetch_assoc()) {
            $requests[] = $row;
        }

    }
    // Case 2: Pending Requests
    elseif ($status === 'pending') {
        // Private requests (assigned directly to the nurse)
        $private_query = "SELECT r.* FROM request r
                          WHERE r.NurseID = ? AND r.RequestStatus = 'pending' ";
        $stmt = $conn->prepare($private_query);
        $stmt->bind_param("i", $nurse_id);
        $stmt->execute();
        $private_results = $stmt->get_result();
        while ($row = $private_results->fetch_assoc()) {
            $requests[] = $row;
        }

        // Public requests (nurse applied but still pending)
        $public_query = "SELECT r.* FROM request r
                         JOIN request_applications ra ON r.RequestID = ra.RequestID
                         WHERE ra.NurseID = ? AND ra.ApplicationStatus = 'pending' 
                         AND r.RequestStatus = 'pending'";
        $stmt = $conn->prepare($public_query);
        $stmt->bind_param("i", $nurse_id);
        $stmt->execute();
        $public_results = $stmt->get_result();
        while ($row = $public_results->fetch_assoc()) {
            $requests[] = $row;
        }

    }
    // Case 3: Confirmed Requests
    elseif ($status === 'confirmed') {
        // Private requests (assigned directly to the nurse)
        $private_query = "SELECT r.* FROM request r
                          WHERE r.NurseID = ? AND r.RequestStatus = 'confirmed'";
        $stmt = $conn->prepare($private_query);
        $stmt->bind_param("i", $nurse_id);
        $stmt->execute();
        $private_results = $stmt->get_result();
        while ($row = $private_results->fetch_assoc()) {
            $requests[] = $row;
        }

        // Public requests (nurse applied and confirmed)
        $public_query = "SELECT r.* FROM request r
                         JOIN request_applications ra ON r.RequestID = ra.RequestID
                         WHERE ra.NurseID = ? AND ra.ApplicationStatus = 'accepted' 
                         AND r.RequestStatus = 'confirmed'";
        $stmt = $conn->prepare($public_query);
        $stmt->bind_param("i", $nurse_id);
        $stmt->execute();
        $public_results = $stmt->get_result();
        while ($row = $public_results->fetch_assoc()) {
            $requests[] = $row;
        }
    }

    return $requests;
}


// Get requests for each tab
$current_work = getNurseRequests($nurse_id, 'inprocess', $conn);
$waiting_requests = getNurseRequests($nurse_id, 'pending', $conn);
$completed_requests = getNurseRequests($nurse_id, 'confirmed', $conn);

// Count for badges
$waiting_count = count($waiting_requests);
$completed_count = count($completed_requests);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Nursing - Nurse Portal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="nurse.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php include "sidebar.php" ?>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <!-- Tab Navigation -->
                <ul class="nav nav-tabs mb-4" id="statusTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab">
                            Current Work
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="waiting-tab" data-bs-toggle="tab" data-bs-target="#waiting" type="button" role="tab">
                            Waiting <span class="badge bg-warning ms-1"><?php echo $waiting_count; ?></span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab">
                            Completed <span class="badge bg-success ms-1"><?php echo $completed_count; ?></span>
                        </button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="statusTabsContent">
                    <!-- Current Work Tab -->
                    <div class="tab-pane fade show active" id="all" role="tabpanel">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <h2 class="h4 fw-bold">Current Work</h2>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group me-2">
                                    <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-sync-alt"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- Table for Current Work -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Request ID</th>
                                        <th>Service Type</th>
                                        <th>Address</th>
                                        <th>Date/Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($current_work as $request): ?>
                                        <tr data-status="inprocess">
                                            <td>#REQ-<?php echo $request['RequestID']; ?></td>
                                            <td><?php echo htmlspecialchars($request['Type']); ?></td>
                                            <td><?php echo getFormattedAddress($request['AddressID'], $conn); ?></td>
                                            <td><?php echo date('M j, Y, g:i A', strtotime($request['Date'] . ' ' . $request['Time'])); ?></td>
                                            <td>
                                                <!-- <span class="badge bg-primary">In Progress</span> -->
        
                                                
                                                <form action="completed_request.php" method="post" style="display: inline;">
                                                        <input type="hidden" name="request_id" value="<?php echo $request['RequestID']; ?>">
                                                        <button  type="submit" class="btn btn-sm btn-primary">completed</button>
                                                    </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php if (empty($current_work)): ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No current work found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Waiting Tab -->
                    <div class="tab-pane fade" id="waiting" role="tabpanel">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <h2 class="h4 fw-bold">Waiting Requests</h2>
                        </div>

                        <!-- Table for Waiting Requests -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Request ID</th>
                                        <th>Service Type</th>
                                        <th>Address</th>
                                        <th>Date/Time</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($waiting_requests as $request): ?>
                                        <tr data-status="pending">
                                            <td>#REQ-<?php echo $request['RequestID']; ?></td>
                                            <td><?php echo htmlspecialchars($request['Type']); ?></td>
                                            <td><?php echo getFormattedAddress($request['AddressID'], $conn); ?></td>
                                            <td><?php echo date('M j, Y, g:i A', strtotime($request['Date'] . ' ' . $request['Time'])); ?></td>
                                            <td>
                                                <?php if ($request['is_public'] == 1): ?>
                                                    <span class="badge bg-warning">Pending</span>
                                                <?php else: ?>
                                                    <span class="badge bg-info">Waiting Patient</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($request['is_public'] == 0): ?>
                                                    <!-- heree -->
                                                    <form action="accept_private_request.php" method="post" style="display: inline;">
                                                        <input type="hidden" name="request_id" value="<?php echo $request['RequestID']; ?>">
                                                        <input type="hidden" name="source_page" value="<?php echo basename($_SERVER['PHP_SELF']); ?>">
                                                        <button type="submit" class="btn btn-sm btn-success me-2">
                                                            Accept
                                                        </button>
                                                    </form>

                                                    <button
                                                        class="btn btn-sm btn-outline-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#declineReasonModal"
                                                        data-request-id="<?php echo $request['RequestID']; ?>">
                                                        Decline
                                                    </button>
                                                <?php else: ?>
                                                    <button class="btn btn-sm btn-outline-secondary">Waiting...</button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php if (empty($waiting_requests)): ?>
                                        <tr>
                                            <td colspan="6" class="text-center">No waiting requests found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Completed Tab -->
                    <div class="tab-pane fade" id="completed" role="tabpanel">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <h2 class="h4 fw-bold">Completed Requests</h2>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group me-2">
                                </div>
                            </div>
                        </div>

                        <!-- Table for Completed Requests -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Request ID</th>
                                        <th>Service Type</th>
                                        <th>Address</th>
                                        <th>Date Completed</th>
                                        <th>Rating</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($completed_requests as $request): ?>
                                        <tr>
                                            <td>#REQ-<?php echo $request['RequestID']; ?></td>
                                            <td><?php echo htmlspecialchars($request['Type']); ?></td>
                                            <td><?php echo getFormattedAddress($request['AddressID'], $conn); ?></td>
                                            <td><?php echo date('M j, Y', strtotime($request['Date'])); ?></td>
                                            <td><span class="badge bg-success">5.0 ★</span></td>
                                            <td>
                                                <button data-bs-toggle="modal" data-bs-target="#completeServiceModal" class="btn btn-sm btn-outline-success">View</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php if (empty($completed_requests)): ?>
                                        <tr>
                                            <td colspan="6" class="text-center">No completed requests found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Complete Service Modal -->
    <div class="modal fade" id="completeServiceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Complete Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="completeServiceForm">
                        <div class="mb-3">
                            <label class="form-label">Service Provided</label>
                            <input type="text" class="form-control" value="Wound Care - Nov 10, 2023" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Patient</label>
                            <input type="text" class="form-control" value="John Patient" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Service Duration</label>
                            <div class="input-group">
                                <input type="number" class="form-control" value="1.5" min="0.25" step="0.25">
                                <span class="input-group-text">hours</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" rows="3" placeholder="Enter any notes about the service..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Upload Documents (Optional)</label>
                            <input type="file" class="form-control" multiple>
                            <small class="text-muted">You can upload photos, reports, or other documents</small>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Complete Service</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include "logoutmodal.php" ?>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="nurse.js"></script>
</body>

</html>