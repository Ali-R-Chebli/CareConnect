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
                    <!-- Dashboard Tab -->
                     
                    <div class="tab-pane fade show active" id="dashboard">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <h2 class="h4 fw-bold">Dashboard</h2>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group me-2">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                                    <i class="fas fa-calendar"></i> This week
                                </button>
                            </div>
                        </div>

                        <!-- Summary Cards -->
                        <div class="row mb-4">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Pending Requests</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Upcoming Appointments</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    This Month's Earnings</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">$1,250</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Average Rating</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">4.8</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-star fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Activity -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 fw-bold text-primary">Recent Requests</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="list-group list-group-flush">
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h6 class="mb-1">Wound Care</h6>
                                                    <small class="text-muted">Today, 10:30 AM</small>
                                                </div>
                                                <p class="mb-1">John Patient - 2 miles away</p>
                                                <small class="text-muted">Pending your response</small>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h6 class="mb-1">Medication Administration</h6>
                                                    <small class="text-muted">Yesterday, 2:15 PM</small>
                                                </div>
                                                <p class="mb-1">Mary Smith - 3 miles away</p>
                                                <small class="text-success">Confirmed for tomorrow</small>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h6 class="mb-1">Physical Therapy</h6>
                                                    <small class="text-muted">Nov 10, 9:00 AM</small>
                                                </div>
                                                <p class="mb-1">Robert Johnson - 1 mile away</p>
                                                <small class="text-warning">Completed - needs rating</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 fw-bold text-primary">Today's Schedule</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline">
                                            <div class="timeline-item">
                                                <div class="timeline-item-marker">
                                                    <div class="timeline-item-marker-indicator bg-success"></div>
                                                </div>
                                                <div class="timeline-item-content">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="mb-1">Wound Care</h6>
                                                        <small class="text-muted">10:00 AM - 11:30 AM</small>
                                                    </div>
                                                    <p class="mb-0">Sarah Johnson - 123 Main St</p>
                                                </div>
                                            </div>
                                            <div class="timeline-item">
                                                <div class="timeline-item-marker">
                                                    <div class="timeline-item-marker-indicator bg-primary"></div>
                                                </div>
                                                <div class="timeline-item-content">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="mb-1">Medication Administration</h6>
                                                        <small class="text-muted">2:00 PM - 2:30 PM</small>
                                                    </div>
                                                    <p class="mb-0">Michael Brown - 456 Oak Ave</p>
                                                </div>
                                            </div>
                                            <div class="timeline-item">
                                                <div class="timeline-item-marker">
                                                    <div class="timeline-item-marker-indicator bg-warning"></div>
                                                </div>
                                                <div class="timeline-item-content">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="mb-1">Physical Therapy</h6>
                                                        <small class="text-muted">4:00 PM - 5:00 PM</small>
                                                    </div>
                                                    <p class="mb-0">David Wilson - 789 Pine St</p>
                                                </div>
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