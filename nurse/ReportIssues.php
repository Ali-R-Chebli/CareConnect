<?php
session_start();
// Manually set session variables as provided
$_SESSION['user_id'] = 1; // Example: manually set nurse ID
$_SESSION['user_type'] = 'nurse';
$_SESSION['logged_in'] = true;

// Database connection (adjust credentials as needed)
$db_host = '127.0.0.1';
$db_user = 'root';
$db_pass = '';
$db_name = 'homecare';

$db = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}






// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'] ?? '';
    $request_id = $_POST['request_id'] ?? null;
    $description = $_POST['description'] ?? '';
    $error = null;

    // Validate required fields
    if (empty($type) || empty($description)) {
        $error = "Please fill all required fields";
    } else {
        // Determine reported ID based on report type
        if ($type === 'Building issues' || $type === 'Other') {
            $reported_id = 20; // Admin ID
            $reported_role = 'admin';
        } elseif ($type === 'Request') {
            // Get patient ID from the request
            $stmt = $db->prepare("SELECT PatientID FROM request WHERE RequestID = ?");
            $stmt->bind_param("i", $request_id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                $reported_id = $row['PatientID'];
                $reported_role = 'patient';
            } else {
                $error = "Invalid request selected";
            }
            $stmt->close();
        }

        if (!isset($error)) {
            // Handle file upload
            $file_name = null;
            if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                $upload_dir = 'uploads/reports/';
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                $file_name = uniqid() . '.' . $file_ext;
                if (!move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir . $file_name)) {
                    $error = "Failed to upload file";
                }
            }

            if (!isset($error)) {
                if ($requestId == null) {
                    // Insert report without RequestID
                    $stmt = $db->prepare("INSERT INTO report 
                    (ReporterID, ReporterRole, ReportedID, ReportedRole, File, Type, Description, Status, Date) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, 'pending', CURDATE())");

                    $stmt->bind_param(
                        "isissss",
                        $_SESSION['user_id'],
                        $_SESSION['user_type'],
                        $reported_id,
                        $reported_role,
                        $file_name,
                        $type,
                        $description
                    );
                    // Insert report without RequestID
                } else {

                    // Insert report with requestid 
                    $stmt = $db->prepare("INSERT INTO report (ReporterID, ReporterRole, ReportedID, ReportedRole, RequestID, File, Type, Description, Status, Date) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pending', CURDATE())");

                    $stmt->bind_param("isssisss", $_SESSION['user_id'], $_SESSION['user_type'], $reported_id, $reported_role, $request_id, $file_name, $type, $description);
                    // insert report with request id
                }

                if ($stmt->execute()) {
                    $success = "Report submitted successfully!";
                } else {
                    $error = "Error submitting report: " . $db->error;
                }
                $stmt->close();
            }
        }
    }
}

// Fetch all requests related to the nurse
$nurse_id = $_SESSION['user_id'];
$requests = [];
try {
    $query = "SELECT 
    r.RequestID, 
    CONCAT('#HN-', YEAR(r.Date), '-', LPAD(r.RequestID, 3, '0'), ' - ', s.Name, ' (', DATE_FORMAT(r.Date, '%b %d'), ')') AS request_name, 
    r.Date,
    s.Name AS Type
FROM 
    request r
JOIN 
    service s ON r.Type = s.ServiceID
WHERE 
    r.NurseID = ?

UNION

SELECT 
    r.RequestID, 
    CONCAT('#HN-', YEAR(r.Date), '-', LPAD(r.RequestID, 3, '0'), ' - ', s.Name, ' (', DATE_FORMAT(r.Date, '%b %d'), ')') AS request_name, 
    r.Date,
    s.Name AS Type
FROM 
    request r
JOIN 
    request_applications ra ON r.RequestID = ra.RequestID
JOIN 
    service s ON r.Type = s.ServiceID
WHERE 
    ra.NurseID = ? AND ra.ApplicationStatus IN ('completed', 'accepted', 'inprocess');
";


    $stmt = $db->prepare($query);
    $stmt->bind_param("ii", $nurse_id, $nurse_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $requests[] = $row;
    }
    $stmt->close();
} catch (Exception $e) {
    $error = "Error fetching requests: " . $e->getMessage();
}
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

                    <!-- Report Issues Tab -->
                    <div class="tab-pane fade show active" id="reports">
                        <h2 class="h4 mb-4 fw-bold">Report Issues</h2>

                        <?php if (isset($success)): ?>
                            <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
                        <?php elseif (isset($error)): ?>
                            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 fw-bold text-primary">Submit a Report</h6>
                                    </div>
                                    <div class="card-body">
                                        <form id="reportForm" method="POST" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label class="form-label">Report Type <span class="text-danger">*</span></label>
                                                <select class="form-select" name="type" required>
                                                    <option value="">Select report type</option>
                                                    <option value="Building issues" <?= (isset($_POST['type']) && $_POST['type'] === 'Building issues') ? 'selected' : '' ?>>Building issues</option>
                                                    <option value="Request" <?= (isset($_POST['type']) && $_POST['type'] === 'Request') ? 'selected' : '' ?>>Request</option>
                                                    <option value="Other" <?= (isset($_POST['type']) && $_POST['type'] === 'Other') ? 'selected' : '' ?>>Other</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Requests</label>
                                                <select class="form-select" name="request_id">
                                                    <option value="">Select Request</option>
                                                    <?php foreach ($requests as $request): ?>
                                                        <option value="<?= $request['RequestID'] ?>" <?= (isset($_POST['request_id']) && $_POST['request_id'] == $request['RequestID']) ? 'selected' : '' ?>>
                                                            <?= htmlspecialchars($request['request_name']) ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                                <textarea class="form-control" name="description" rows="5" placeholder="Please describe the issue in detail..." required><?= isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '' ?></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Upload Supporting Documents (Optional)</label>
                                                <input type="file" class="form-control" name="file">
                                                <small class="text-muted">You can upload photos, documents, or other files (max 5MB each)</small>
                                            </div>
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary">Submit Report</button>
                                            </div>
                                        </form>
                                    </div>
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
</body>

</html>