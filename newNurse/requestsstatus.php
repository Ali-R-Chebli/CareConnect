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
                            All Requests
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="waiting-tab" data-bs-toggle="tab" data-bs-target="#waiting" type="button" role="tab">
                            Waiting <span class="badge bg-warning ms-1">3</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab">
                            Completed <span class="badge bg-success ms-1">8</span>
                        </button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="statusTabsContent">
                    <!-- All Requests Tab -->
                    <div class="tab-pane fade show active" id="all" role="tabpanel">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <h2 class="h4 fw-bold">All Requests</h2>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="dropdown me-2">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="statusFilter" data-bs-toggle="dropdown">
                                        <i class="fas fa-filter me-1"></i> Filter
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" data-status="all">All</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#" data-status="pending">Pending</a></li>
                                        <li><a class="dropdown-item" href="#" data-status="patient-pending">Waiting Patient</a></li>
                                        <li><a class="dropdown-item" href="#" data-status="accepted">Accepted</a></li>
                                    </ul>
                                </div>
                                <div class="btn-group me-2">
                                    <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-sync-alt"></i></button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Table for All Requests -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Request ID</th>
                                        <th>Patient</th>
                                        <th>Service</th>
                                        <th>Date/Time</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- All requests will be shown here -->
                                    <tr data-status="pending">
                                        <td>#REQ-1024</td>
                                        <td>John Smith</td>
                                        <td>Wound Dressing</td>
                                        <td>Tomorrow, 10:00 AM</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-success me-1">Accept</button>
                                            <button class="btn btn-sm btn-outline-danger">Decline</button>
                                        </td>
                                    </tr>
                                    <tr data-status="completed">
                                        <td>#REQ-1015</td>
                                        <td>Sarah Wilson</td>
                                        <td>Elderly Care</td>
                                        <td>Nov 10, 2023, 10:00 AM</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                        <td>
                                            <button data-bs-toggle="modal" data-bs-target="#completeServiceModal" class="btn btn-sm btn-outline-success">View</button>
                                        </td>
                                    </tr>
                                    <!-- More rows... -->
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
                                        <th>Patient</th>
                                        <th>Service</th>
                                        <th>Date/Time</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Only waiting requests will be shown here -->
                                    <tr data-status="pending">
                                        <td>#REQ-1024</td>
                                        <td>John Smith</td>
                                        <td>Wound Dressing</td>
                                        <td>Tomorrow, 10:00 AM</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-success me-1">Accept</button>
                                            <button class="btn btn-sm btn-outline-danger">Decline</button>
                                        </td>
                                    </tr>
                                    <tr data-status="patient-pending">
                                        <td>#REQ-1021</td>
                                        <td>Mary Johnson</td>
                                        <td>Medication Admin</td>
                                        <td>Fri, Nov 17, 2:00 PM</td>
                                        <td><span class="badge bg-info">Waiting Patient</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-secondary">Remind</button>
                                        </td>
                                    </tr>
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
                                    <button class="btn btn-sm btn-outline-secondary">Export</button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Table for Completed Requests -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Request ID</th>
                                        <th>Patient</th>
                                        <th>Service</th>
                                        <th>Date Completed</th>
                                        <th>Rating</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Only completed requests will be shown here -->
                                    <tr>
                                        <td>#REQ-1015</td>
                                        <td>Sarah Wilson</td>
                                        <td>Elderly Care</td>
                                        <td>Nov 10, 2023</td>
                                        <td><span class="badge bg-success">5.0 ★</span></td>
                                        <td>
                                            <button data-bs-toggle="modal" data-bs-target="#completeServiceModal" class="btn btn-sm btn-outline-success">Details</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#REQ-1014</td>
                                        <td>Michael Brown</td>
                                        <td>Physical Therapy</td>
                                        <td>Nov 8, 2023</td>
                                        <td><span class="badge bg-success">4.8 ★</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-success">Details</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Complete Service Modal (unchanged) -->
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