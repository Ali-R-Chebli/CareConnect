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
            <?php include "sidebar.php"  ?>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <!-- Tab Content -->
                <div class="tab-content">
                     
                     <!-- Report Issues Tab -->
                     <div class="tab-pane fade show active" id="reports">
                        <h2 class="h4 mb-4 fw-bold">Report Issues</h2>

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 fw-bold text-primary">Submit a Report</h6>
                                    </div>
                                    <div class="card-body">
                                        <form id="reportForm">
                                            <div class="mb-3">
                                                <label class="form-label">Report Type</label>
                                                <select class="form-select" required>
                                                    <option value="">Select report type</option>
                                                    <option>Patient Behavior</option>
                                                    <option>Payment Issue</option>
                                                    <option>Technical Problem</option>
                                                    <option>Safety Concern</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Related Service (if applicable)</label>
                                                <select class="form-select">
                                                    <option value="">Select service</option>
                                                    <option>#HN-2023-042 - Wound Care (Nov 10)</option>
                                                    <option>#HN-2023-043 - Medication Admin (Nov 12)</option>
                                                    <option>#HN-2023-044 - Physical Therapy (Nov 15)</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" rows="5" placeholder="Please describe the issue in detail..." required></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Upload Supporting Documents (Optional)</label>
                                                <input type="file" class="form-control" multiple>
                                                <small class="text-muted">You can upload photos, documents, or other files (max 5MB each)</small>
                                            </div>

                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="urgentReport">
                                                <label class="form-check-label" for="urgentReport">This is an urgent issue that requires immediate attention</label>
                                            </div>

                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary">Submit Report</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 fw-bold text-primary">Previous Reports</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="list-group">
                                            <div class="list-group-item">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-1">Payment Dispute</h6>
                                                    <small class="text-muted">Nov 5</small>
                                                </div>
                                                <p class="mb-1 small">Patient refused to pay for completed service</p>
                                                <small class="text-success">Resolved</small>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-1">Safety Concern</h6>
                                                    <small class="text-muted">Oct 28</small>
                                                </div>
                                                <p class="mb-1 small">Unsafe home environment for patient care</p>
                                                <small class="text-success">Resolved</small>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-1">Technical Issue</h6>
                                                    <small class="text-muted">Oct 15</small>
                                                </div>
                                                <p class="mb-1 small">Unable to mark service as completed</p>
                                                <small class="text-warning">In Progress</small>
                                            </div>
                                        </div>
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


<!-- end of page -->