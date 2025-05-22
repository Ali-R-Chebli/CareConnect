<?php
require '../connect.php';

$patient_id = 1; // TODO: Replace with actual patient ID

// Handle report submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $issue_type = $conn->real_escape_string($_POST['issue_type']);
    $request_id = !empty($_POST['request_id']) ? (int)$_POST['request_id'] : 0; // Default to 0 if not provided
    $description = $conn->real_escape_string($_POST['description']);
    $folder = NULL;
    $error_message = NULL;

    // Handle PDF file upload
    if (!empty($_FILES["file"]["name"])) {
        $max_file_size = 5 * 1024 * 1024; // 5MB
        $file_size = $_FILES["file"]["size"];
        $file_ext = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
        $unique_filename = uniqid('report_', true) . '.pdf';
        $folder = "reports/" . $unique_filename;

        // Validate file
        if ($file_ext !== 'pdf') {
            $error_message = "Error: Only PDF files are allowed.";
        } elseif ($file_size > $max_file_size) {
            $error_message = "Error: File size exceeds 5MB limit.";
        } else {
            // Create reports directory if it doesn't exist
            if (!file_exists("reports")) {
                mkdir("reports", 0777, true);
            }
        }
    }

    if (!$error_message) {
        $reporter_id = $conn->query("SELECT UserID FROM patient WHERE PatientID = $patient_id")->fetch_assoc()['UserID'];
        $reported_id = 0; // Default if no nurse is associated
        $reported_role = 'none'; // Default if no nurse is associated
        if ($request_id !== 0) {
            $result = $conn->query("SELECT UserID FROM nurse n JOIN request r ON n.NurseID = r.NurseID WHERE r.RequestID = $request_id");
            if ($result && $result->num_rows > 0) {
                $reported_id = $result->fetch_assoc()['UserID'];
                $reported_role = 'nurse';
            }
        }
        $sql = "INSERT INTO report(ReporterID, ReporterRole, ReportedID, ReportedRole, RequestID, File, Type, Description, Status, Date) 
                VALUES ($reporter_id, 'patient', $reported_id, '$reported_role', $request_id, " . ($folder ? "'$folder'" : 'NULL') . ",
                 '$issue_type', '$description', 'pending', CURDATE())";
        
        if ($conn->query($sql) === TRUE) {
            // Move file if uploaded
            if ($folder && !move_uploaded_file($_FILES["file"]["tmp_name"], $folder)) {
                $error_message = "Error: Failed to upload file.";
            } else {
                header("Location: report_issues.php?success=1");
                exit();
            }
        } else {
            $error_message = "Error: " . $conn->error;
        }
    }
}

// Fetch patient’s requests for dropdown (exclude completed requests or those completed more than 7 days ago)
$sql = "SELECT RequestID, Type, Date 
        FROM request 
        WHERE PatientID = $patient_id 
        AND (RequestStatus != 'completed' OR (RequestStatus = 'completed' AND Date >= DATE_SUB(NOW(), INTERVAL 7 DAY)))";
$result = $conn->query($sql);
$requests = [];
while ($row = $result->fetch_assoc()) {
    $requests[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Nursing - Report Issues</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/patient.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include 'sidebar.php'; ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4 main-content">
                <h2 class="h4 mb-4 fw-bold">Report an Issue</h2>
                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success">Report submitted successfully!</div>
                <?php endif; ?>
                <?php if (isset($error_message)): ?>
                    <div class="alert alert-danger"><?php echo htmlspecialchars($error_message); ?></div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 fw-bold text-primary">Submit a Report</h6>
                            </div>
                            <div class="card-body">
                                <form id="reportIssueForm" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Issue Type</label>
                                        <select class="form-select" name="issue_type" required>
                                            <option value="">Select issue type</option>
                                            <option value="Service Quality">Service Quality</option>
                                            <option value="Billing Issue">Billing Issue</option>
                                            <option value="Nurse Conduct">Nurse Conduct</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Related Service (Optional)</label>
                                        <select class="form-select" name="request_id">
                                            <option value="">Select a service</option>
                                            <?php foreach ($requests as $req): ?>
                                                <option value="<?php echo $req['RequestID']; ?>">
                                                    <?php echo htmlspecialchars($req['Type'] . ' - ' . date('M d, Y', strtotime($req['Date']))); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Description</label>
                                        <textarea class="form-control" name="description" rows="5" required
                                            placeholder="Describe the issue in detail..."></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Attach PDF File (Optional)</label>
                                        <input type="file" class="form-control" name="file" accept="application/pdf">
                                        <div class="small text-muted mt-2">Accepted format: PDF only (Max 5MB)</div>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Submit Report</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/patient.js"></script>
</body>
</html>