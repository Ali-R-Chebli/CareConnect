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
                                         
                     <!-- private requests tab -->
                     <div class="tab-pane fade show active" id="private-requests">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <h2 class="h4 fw-bold">Private Requests</h2>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group me-2">
                                    <button class="btn btn-sm btn-outline-secondary">All</button>
                                    <button class="btn btn-sm btn-outline-secondary">New</button>
                                    <button class="btn btn-sm btn-outline-secondary">Accepted</button>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 fw-bold text-primary">Requests Sent Directly to You</h6>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush">
                                    <!-- Private Request Item 1 -->
                                    <div class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <div>
                                                <h6 class="mb-1">John Smith - Wound Care</h6>
                                                <small class="text-muted">Requested you specifically - 1 hour ago</small>
                                            </div>
                                            <span class="badge bg-warning">Pending</span>
                                        </div>
                                        <p class="mb-2">"I need your expertise with my surgical wound care. You helped me last time."</p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <span class="small text-muted"><i class="fas fa-map-marker-alt me-1"></i> 2.1 miles away</span>
                                                <span class="small text-muted ms-3"><i class="fas fa-clock me-1"></i> Tomorrow 10 AM</span>
                                            </div>
                                            <div>
                                                <button class="btn btn-sm btn-success accept-private-request me-2">Accept</button>
                                                <button class="btn btn-sm btn-outline-danger decline-private-request">Decline</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Private Request Item 2 -->
                                    <div class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <div>
                                                <h6 class="mb-1">Mary Johnson - Medication Admin</h6>
                                                <small class="text-muted">Requested you specifically - 3 hours ago</small>
                                            </div>
                                            <span class="badge bg-warning">Pending</span>
                                        </div>
                                        <p class="mb-2">"You understand my complex medication schedule better than anyone."</p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <span class="small text-muted"><i class="fas fa-map-marker-alt me-1"></i> 3.5 miles away</span>
                                                <span class="small text-muted ms-3"><i class="fas fa-clock me-1"></i> Daily at 8 AM</span>
                                            </div>
                                            <div>
                                                <button class="btn btn-sm btn-success accept-private-request me-2">Accept</button>
                                                <button class="btn btn-sm btn-outline-danger decline-private-request">Decline</button>
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