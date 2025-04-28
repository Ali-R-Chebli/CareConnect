<?php
session_start();
$_SESSION['user_id'] = 9; // Example: manually set nurse ID
$_SESSION['user_type'] = 'nurse';
$_SESSION['logged_in'] = true;


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
                <!-- Tab Content -->
                <div class="tab-content">

                    <!-- public requests -->
                    <div class="tab-pane fade show active" id="public-requests">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <h2 class="h4 fw-bold">Public Service Requests</h2>

                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 fw-bold text-primary">Available Public Requests</h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="list-group list-group-flush" style="max-height: 500px; overflow-y: auto;">
                                    <?php
                                    // Database connection
                                    require_once 'db_connection.php';

                                    // Query to get public requests (those without assigned nurses)
                                    $query = "SELECT r.*, a.Country, a.City, a.Street, a.Building, a.Latitude, a.Longitude, a.Notes as AddressNotes
                                              FROM request r
                                              LEFT JOIN address a ON r.AddressID = a.AddressID
                                              WHERE r.NurseID IS NULL AND r.RequestStatus = 'pending'
                                              ORDER BY r.Date DESC";
                                    $result = mysqli_query($conn, $query);

                                    while ($request = mysqli_fetch_assoc($result)) {
                                        // Calculate time ago
                                        $postedTime = strtotime($request['Date'] . ' ' . $request['Time']);
                                        $timeAgo = time() - $postedTime;
                                        if ($timeAgo < 60) {
                                            $timeText = "less than a minute ago";
                                        } elseif ($timeAgo < 3600) {
                                            $minutes = floor($timeAgo / 60);
                                            $timeText = "$minutes minute" . ($minutes > 1 ? "s" : "") . " ago";
                                        } elseif ($timeAgo < 86400) {
                                            $hours = floor($timeAgo / 3600);
                                            $timeText = "$hours hour" . ($hours > 1 ? "s" : "") . " ago";
                                        } else {
                                            $days = floor($timeAgo / 86400);
                                            $timeText = "$days day" . ($days > 1 ? "s" : "") . " ago";
                                        }

                                        // Format date and time
                                        $formattedDate = date("M j, Y", strtotime($request['Date']));
                                        $formattedTime = date("g:i A", strtotime($request['Time']));

                                        // Determine if urgent (example logic - you can adjust)
                                        $isUrgent = strtotime($request['Date']) - time() < 86400; // If less than 24 hours away
                                    ?>
                                        <!-- Public Request Item -->
                                        <div class="list-group-item">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <div>
                                                    <h6 class="mb-1"><?php echo htmlspecialchars($request['Type']); ?>
                                                        <small class="text-muted">(<?php echo htmlspecialchars($request['Type']); ?>)</small>
                                                    </h6>
                                                    <small class="text-muted">
                                                        Posted <?php echo $timeText; ?> •
                                                        Needs <?php echo $request['NumberOfNurses']; ?> nurse<?php echo $request['NumberOfNurses'] > 1 ? 's' : ''; ?> •
                                                        For <?php echo htmlspecialchars($request['AgeType']); ?> patient
                                                    </small>
                                                </div>
                                                <!-- <?php if ($isUrgent) { ?>
                                                <span class="badge bg-danger">Urgent</span>
                                            <?php } ?> -->
                                            </div>
                                            <p class="mb-2"><?php echo htmlspecialchars($request['MedicalCondition']); ?></p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <span class="small text-muted">
                                                        <i class="fas fa-map-marker-alt me-1"></i>
                                                        <?php echo htmlspecialchars($request['City'] . ', ' . $request['Street']); ?> •
                                                        3.2 miles away
                                                    </span>
                                                    <span class="small text-muted ms-3">
                                                        <i class="fas fa-calendar me-1"></i>
                                                        <?php echo $formattedDate; ?> at <?php echo $formattedTime; ?>
                                                    </span>
                                                    <span class="small text-muted ms-3">
                                                        <i class="fas fa-clock me-1"></i>
                                                        <?php echo $request['Duration'] ? $request['Duration'] . ' hours duration' : 'Flexible timing'; ?>
                                                    </span>
                                                </div>
                                                <div>
                                                    <button data-bs-toggle="modal" data-bs-target="#requestDetailsModal<?php echo $request['RequestID']; ?>"
                                                        class="btn btn-sm btn-outline-secondary me-2">
                                                        <i class="fas fa-info-circle"></i> View Details
                                                    </button>

                                                    <form action="accept_request.php" method="post" style="display: inline;">
                                                        <input type="hidden" name="request_id" value="<?php echo $request['RequestID']; ?>">
                                                        <button
                                                            type="submit"
                                                            <?php

                                                            // Prepare and execute the query
                                                            $sql1 = "SELECT * FROM `request_applications` WHERE NurseID = ? AND RequestID = ?";
                                                            $stmt1 = $conn->prepare($sql1);
                                                            $stmt1->bind_param("ii",$_SESSION['user_id'] ,$request["RequestID"]);
                                                            $stmt1->execute();
                                                            $result1 = $stmt1->get_result();

                                                            // Check if any rows were returned
                                                            if ($result1->num_rows > 0) {
                                                                echo 'class="btn btn-secondary" disabled';
                                                            } else {
                                                                echo 'class="btn btn-primary" ';
                                                            }
                                                            

                                                            ?>
                                                               >
                                                               Accept Request
                                                        </button>

                                                        

                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal for this request -->
                                        <div class="modal fade" id="requestDetailsModal<?php echo $request['RequestID']; ?>" tabindex="-1"
                                            aria-labelledby="requestDetailsModalLabel<?php echo $request['RequestID']; ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="requestDetailsModalLabel<?php echo $request['RequestID']; ?>">
                                                            Request Details
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h6>Basic Information</h6>
                                                                <ul class="list-unstyled">
                                                                    <li><strong>Type:</strong> <?php echo htmlspecialchars($request['Type']); ?></li>
                                                                    <li><strong>Date & Time:</strong> <?php echo $formattedDate; ?> at <?php echo $formattedTime; ?></li>
                                                                    <li><strong>Duration:</strong> <?php echo $request['Duration'] ? $request['Duration'] . ' hours' : 'Flexible'; ?></li>
                                                                    <li><strong>Nurse Gender Preference:</strong> <?php echo htmlspecialchars($request['NurseGender']); ?></li>
                                                                    <li><strong>Patient Age Type:</strong> <?php echo htmlspecialchars($request['AgeType']); ?></li>
                                                                    <li><strong>Number of Nurses Needed:</strong> <?php echo $request['NumberOfNurses']; ?></li>
                                                                    <li><strong>Service Fee Percentage:</strong> <?php echo $request['ServiceFeePercentage']; ?>%</li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h6>Location Details</h6>
                                                                <ul class="list-unstyled">
                                                                    <li><strong>Country:</strong> <?php echo htmlspecialchars($request['Country']); ?></li>
                                                                    <li><strong>City:</strong> <?php echo htmlspecialchars($request['City']); ?></li>
                                                                    <li><strong>Street:</strong> <?php echo htmlspecialchars($request['Street']); ?></li>
                                                                    <li><strong>Building:</strong> <?php echo htmlspecialchars($request['Building']); ?></li>
                                                                    <li><strong>Notes:</strong> <?php echo htmlspecialchars($request['AddressNotes']); ?></li>
                                                                </ul>
                                                                <?php if ($request['Latitude'] && $request['Longitude']) { ?>
                                                                    <div class="mt-2">
                                                                        <iframe width="100%" height="200" frameborder="0" style="border:0"
                                                                            src="https://maps.google.com/maps?q=<?php echo $request['Latitude']; ?>,<?php echo $request['Longitude']; ?>&z=15&output=embed">
                                                                        </iframe>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>

                                                        <div class="mt-3">
                                                            <h6>Medical Information</h6>
                                                            <p><strong>Medical Condition:</strong> <?php echo htmlspecialchars($request['MedicalCondition']); ?></p>
                                                            <p><strong>Special Instructions:</strong> <?php echo htmlspecialchars($request['SpecialInstructions']); ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <form action="accept_request.php" method="post">
                                                            <input type="hidden" name="request_id" value="<?php echo $request['RequestID']; ?>">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if (mysqli_num_rows($result) == 0) { ?>
                                        <div class="list-group-item text-center py-4">
                                            <p class="text-muted">No public requests available at this time.</p>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php include "logoutmodal.php" ?>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom JS -->
    <script src="nurse.js"></script>
    <script></script>
</body>

</html>