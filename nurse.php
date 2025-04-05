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
    <style>
        :root {
            --primary: #4e73df;
            --secondary: #858796;
            --success: #1cc88a;
            --info: #36b9cc;
            --warning: #f6c23e;
            --danger: #e74a3b;
            --light: #f8f9fc;
            --dark: #5a5c69;
        }

        body {
            background-color: #f8f9fc;
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        .sidebar {
            background: linear-gradient(180deg, var(--primary) 10%, #224abe 100%);
            min-height: 100vh;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 600;
            padding: 0.75rem 1rem;
            margin-bottom: 0.2rem;
        }

        .sidebar .nav-link.active {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sidebar .nav-link:hover {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sidebar .nav-link i {
            margin-right: 0.25rem;
        }

        .card {
            border: none;
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .service-card {
            transition: transform 0.3s;
            cursor: pointer;
        }

        .service-card:hover {
            transform: translateY(-5px);
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
        }

        .chat-message {
            max-width: 70%;
            border-radius: 1rem;
            padding: 0.75rem 1rem;
            margin-bottom: 0.5rem;
        }

        .chat-message-in {
            background-color: #f8f9fa;
        }

        .chat-message-out {
            background-color: var(--primary);
            color: white;
            margin-left: auto;
        }

        .rating-star {
            color: #ddd;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .rating-star.active {
            color: var(--warning);
        }

        .step {
            transition: all 0.3s ease;
        }

        .patient-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .patient-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
        }

        .map-placeholder {
            height: 150px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .request-detail-row {
            margin-bottom: 0.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #eee;
        }

        .availability-day {
            cursor: pointer;
        }

        .availability-day.active {
            background-color: var(--success);
            color: white;
        }

        /* Public request items */
        .public-request-item {
            transition: all 0.2s;
        }

        .public-request-item:hover {
            background-color: #f8f9fa;
        }

        .accept-public-request {
            transition: all 0.2s;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar bg-primary collapse" id="sidebarMenu">
                <div class="position-sticky pt-3">
                    <div class="text-center mb-4">
                        <h4 class="text-white">Home Nursing</h4>
                        <p class="text-white-50 small">Nurse Portal</p>
                    </div>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#dashboard" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#public-requests" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-bullhorn"></i>
                                Public Requests
                                <span class="badge bg-danger ms-2">3</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#service-requests" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-list"></i>
                                Service Requests
                                <span class="badge bg-danger ms-2">3</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#my-schedule" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-calendar-alt"></i>
                                My Schedule
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#messages" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-comments"></i>
                                Messages
                                <span class="d-inline-block rounded-circle bg-danger ms-3" style="width:10px; height:10px;"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#notifications" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-bell"></i>
                                Notifications
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#profile" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-user"></i>
                                My Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#earnings" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-dollar-sign"></i>
                                Earnings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#reports" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-flag"></i>
                                Report Issues
                            </a>
                        </li>
                        <li class="nav-item mt-auto">
                            <a class="nav-link" href="#" id="logoutBtn">
                                <i class="fas fa-fw fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

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

                    <!-- public requests -->
                    <div class="tab-pane fade" id="public-requests">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <h2 class="h4 fw-bold">Public Service Requests</h2>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group me-2">
                                    <button class="btn btn-sm btn-outline-secondary">All</button>
                                    <button class="btn btn-sm btn-outline-secondary">Near Me</button>
                                    <button class="btn btn-sm btn-outline-secondary">My Skills</button>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 fw-bold text-primary">Available Public Requests</h6>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush">
                                    <!-- Public Request Item 1 -->
                                    <div class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <div>
                                                <h6 class="mb-1">Wound Dressing Change</h6>
                                                <small class="text-muted">Posted 2 hours ago</small>
                                            </div>
                                            <span class="badge bg-danger">Urgent</span>
                                        </div>
                                        <p class="mb-2">Patient needs weekly wound dressing changes for post-surgical care.</p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <span class="small text-muted"><i class="fas fa-map-marker-alt me-1"></i> 3.2 miles away</span>
                                                <span class="small text-muted ms-3"><i class="fas fa-clock me-1"></i> Flexible timing</span>
                                            </div>
                                            <button class="btn btn-sm btn-primary accept-public-request">Accept Request</button>
                                        </div>
                                    </div>

                                    <!-- Public Request Item 2 -->
                                    <div class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <div>
                                                <h6 class="mb-1">Elderly Care Assistance</h6>
                                                <small class="text-muted">Posted 1 day ago</small>
                                            </div>
                                            <span class="badge bg-secondary">Standard</span>
                                        </div>
                                        <p class="mb-2">Looking for assistance with daily activities for 85-year-old patient.</p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <span class="small text-muted"><i class="fas fa-map-marker-alt me-1"></i> 5.1 miles away</span>
                                                <span class="small text-muted ms-3"><i class="fas fa-clock me-1"></i> Mornings preferred</span>
                                            </div>
                                            <button class="btn btn-sm btn-primary accept-public-request">Accept Request</button>
                                        </div>
                                    </div>

                                    <!-- Public Request Item 3 -->
                                    <div class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <div>
                                                <h6 class="mb-1">Medication Administration</h6>
                                                <small class="text-muted">Posted 3 days ago</small>
                                            </div>
                                            <span class="badge bg-secondary">Standard</span>
                                        </div>
                                        <p class="mb-2">Need nurse to administer insulin injections twice daily for diabetic patient.</p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <span class="small text-muted"><i class="fas fa-map-marker-alt me-1"></i> 1.8 miles away</span>
                                                <span class="small text-muted ms-3"><i class="fas fa-clock me-1"></i> 8am & 6pm daily</span>
                                            </div>
                                            <button class="btn btn-sm btn-primary accept-public-request">Accept Request</button>
                                        </div>
                                    </div>
                                </div>

                                <nav aria-label="Page navigation" class="mt-3">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Service Requests Tab -->
                    <div class="tab-pane fade" id="service-requests">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <h2 class="h4 fw-bold">Service Requests</h2>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group me-2">
                                    <button class="btn btn-sm btn-outline-secondary">All</button>
                                    <button class="btn btn-sm btn-outline-secondary">Pending</button>
                                    <button class="btn btn-sm btn-outline-secondary">Confirmed</button>
                                    <button class="btn btn-sm btn-outline-secondary">Completed</button>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 fw-bold text-primary">Available Requests</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Request ID</th>
                                                <th>Service Type</th>
                                                <th>Patient</th>
                                                <th>Date/Time</th>
                                                <th>Distance</th>
                                                <th>Urgency</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#HN-2023-045</td>
                                                <td>Wound Care</td>
                                                <td>John Patient</td>
                                                <td>Tomorrow, 10:00 AM</td>
                                                <td>2.3 miles</td>
                                                <td><span class="badge bg-danger">Urgent</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary view-request-btn">View</button>
                                                    <button class="btn btn-sm btn-success accept-request-btn">Accept</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#HN-2023-046</td>
                                                <td>Medication Admin</td>
                                                <td>Mary Smith</td>
                                                <td>Friday, 2:00 PM</td>
                                                <td>3.1 miles</td>
                                                <td><span class="badge bg-secondary">Standard</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary view-request-btn">View</button>
                                                    <button class="btn btn-sm btn-success accept-request-btn">Accept</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#HN-2023-047</td>
                                                <td>Physical Therapy</td>
                                                <td>Robert Johnson</td>
                                                <td>Nov 15, 9:00 AM</td>
                                                <td>1.5 miles</td>
                                                <td><span class="badge bg-secondary">Standard</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary view-request-btn">View</button>
                                                    <button class="btn btn-sm btn-success accept-request-btn">Accept</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="card shadow">
                            <div class="card-header py-3">
                                <h6 class="m-0 fw-bold text-primary">My Accepted Requests</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Request ID</th>
                                                <th>Service Type</th>
                                                <th>Patient</th>
                                                <th>Date/Time</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#HN-2023-042</td>
                                                <td>Wound Care</td>
                                                <td>Sarah Johnson</td>
                                                <td>Today, 10:00 AM</td>
                                                <td><span class="badge bg-primary">In Progress</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Details</button>
                                                    <button class="btn btn-sm btn-info">Complete</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#HN-2023-043</td>
                                                <td>Medication Admin</td>
                                                <td>Michael Brown</td>
                                                <td>Today, 2:00 PM</td>
                                                <td><span class="badge bg-success">Confirmed</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Details</button>
                                                    <button class="btn btn-sm btn-danger">Cancel</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#HN-2023-044</td>
                                                <td>Physical Therapy</td>
                                                <td>David Wilson</td>
                                                <td>Today, 4:00 PM</td>
                                                <td><span class="badge bg-success">Confirmed</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Details</button>
                                                    <button class="btn btn-sm btn-danger">Cancel</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- My Schedule Tab -->
                    <div class="tab-pane fade" id="my-schedule">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <h2 class="h4 fw-bold">My Schedule</h2>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group me-2">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Day</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Week</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Month</button>
                                </div>
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#availabilityModal">
                                    <i class="fas fa-plus me-1"></i> Set Availability
                                </button>
                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 fw-bold text-primary">Weekly Calendar</h6>
                            </div>
                            <div class="card-body">
                                <div id="calendar"></div>
                            </div>
                        </div>

                        <div class="card shadow">
                            <div class="card-header py-3">
                                <h6 class="m-0 fw-bold text-primary">Upcoming Appointments</h6>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Wound Care - John Patient</h6>
                                            <small class="text-muted">Tomorrow, 10:00 AM - 11:30 AM</small>
                                        </div>
                                        <p class="mb-1">123 Main St, Apt 4B, New York, NY 10001</p>
                                        <small>Special Instructions: Please ring doorbell twice. Dog will bark but is friendly.</small>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Medication Admin - Mary Smith</h6>
                                            <small class="text-muted">Friday, 2:00 PM - 2:30 PM</small>
                                        </div>
                                        <p class="mb-1">456 Oak Ave, New York, NY 10002</p>
                                        <small>Special Instructions: Patient is allergic to penicillin.</small>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Physical Therapy - Robert Johnson</h6>
                                            <small class="text-muted">Nov 15, 9:00 AM - 10:00 AM</small>
                                        </div>
                                        <p class="mb-1">789 Pine St, New York, NY 10003</p>
                                        <small>Special Instructions: Patient uses a wheelchair, building has elevator.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Messages Tab -->
                    <div class="tab-pane fade" id="messages">
                        <h2 class="h4 mb-4 fw-bold">Messages</h2>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="card shadow">
                                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                        <h6 class="m-0 fw-bold text-primary">Conversations</h6>
                                        <button class="btn btn-sm btn-primary">New Message</button>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="list-group list-group-flush">
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-3">JP</div>
                                                    <div>
                                                        <h6 class="mb-0">John Patient</h6>
                                                        <small class="text-white-50">Wound Care - Tomorrow</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-3">MS</div>
                                                    <div>
                                                        <h6 class="mb-0">Mary Smith</h6>
                                                        <small class="text-muted">Medication Admin - Friday</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-3">RJ</div>
                                                    <div>
                                                        <h6 class="mb-0">Robert Johnson</h6>
                                                        <small class="text-muted">Physical Therapy - Nov 15</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card shadow h-100">
                                    <div class="card-header py-3 d-flex align-items-center">
                                        <div class="avatar me-3">JP</div>
                                        <div>
                                            <h6 class="m-0 fw-bold">John Patient</h6>
                                            <small class="text-muted">Wound Care Appointment</small>
                                        </div>
                                    </div>
                                    <div class="card-body chat-container" style="height: 400px; overflow-y: auto;">
                                        <div class="chat-message chat-message-in">
                                            <div class="message-text">Hello Sarah, I'm confirming our appointment for tomorrow at 10 AM.</div>
                                            <div class="message-time small text-muted">Today, 9:30 AM</div>
                                        </div>

                                        <div class="chat-message chat-message-out">
                                            <div class="message-text">Hi John, yes that works for me. I'll make sure to have all the supplies ready.</div>
                                            <div class="message-time small text-white-50">Today, 9:35 AM</div>
                                        </div>

                                        <div class="chat-message chat-message-in">
                                            <div class="message-text">Great! Could you please send me a list of the supplies you currently have? I'll bring anything that's missing.</div>
                                            <div class="message-time small text-muted">Today, 9:37 AM</div>
                                        </div>

                                        <div class="chat-message chat-message-out">
                                            <div class="message-text">Sure, I have gauze pads, medical tape, and saline solution. The wound is on my left leg, about 2 inches long.</div>
                                            <div class="message-time small text-white-50">Today, 9:40 AM</div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Type your message...">
                                            <button class="btn btn-primary" type="button">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notifications Tab -->
                    <div class="tab-pane fade" id="notifications">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <h2 class="h4 fw-bold">Notifications</h2>
                            <button class="btn btn-sm btn-outline-secondary">Mark all as read</button>
                        </div>

                        <div class="card shadow">
                            <div class="card-body p-0">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3 text-primary">
                                                <i class="fas fa-calendar-check fa-2x"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-1">New Service Request</h6>
                                                    <small class="text-muted">1 hour ago</small>
                                                </div>
                                                <p class="mb-0 small">John Patient has requested wound care services for tomorrow at 10:00 AM.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3 text-success">
                                                <i class="fas fa-check-circle fa-2x"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-1">Payment Received</h6>
                                                    <small class="text-muted">2 days ago</small>
                                                </div>
                                                <p class="mb-0 small">Your payment of $85.00 for service #HN-2023-041 has been processed.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3 text-info">
                                                <i class="fas fa-comment fa-2x"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-1">New Message</h6>
                                                    <small class="text-muted">3 days ago</small>
                                                </div>
                                                <p class="mb-0 small">You have a new message from Mary Smith about your upcoming medication administration.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3 text-warning">
                                                <i class="fas fa-star fa-2x"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-1">New Rating Received</h6>
                                                    <small class="text-muted">1 week ago</small>
                                                </div>
                                                <p class="mb-0 small">Robert Johnson rated your service 5 stars: "Excellent care and very professional!"</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3 text-secondary">
                                                <i class="fas fa-bell fa-2x"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-1">System Notification</h6>
                                                    <small class="text-muted">2 weeks ago</small>
                                                </div>
                                                <p class="mb-0 small">We've updated our privacy policy. Please review the changes at your convenience.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Tab -->
                    <div class="tab-pane fade" id="profile">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <h2 class="h4 fw-bold">My Profile</h2>
                            <button class="btn btn-primary" id="editProfileBtn">Edit Profile</button>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 fw-bold text-primary">Profile Picture</h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <img id="profileImagePreview" class="img-fluid rounded-circle mb-3"
                                            src="https://randomuser.me/api/portraits/women/44.jpg"
                                            alt="Profile Picture"
                                            style="width: 150px; height: 150px; object-fit: cover;">
                                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                        <input type="file" id="profileImageUpload" accept="image/jpeg, image/png" style="display: none;">
                                        <button class="btn btn-sm btn-primary" onclick="document.getElementById('profileImageUpload').click()">
                                            Upload new image
                                        </button>
                                        <div id="uploadError" class="text-danger small mt-2" style="display: none;"></div>
                                    </div>
                                </div>

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 fw-bold text-primary">Verification Status</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span>License Verification</span>
                                                <span class="badge bg-success">Verified</span>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span>Background Check</span>
                                                <span class="badge bg-success">Verified</span>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span>Certifications</span>
                                                <span class="badge bg-success">3 Verified</span>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-sm btn-outline-primary">View Verification Details</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                        <h6 class="m-0 fw-bold text-primary">Account Information</h6>
                                    </div>
                                    <div class="card-body">
                                        <form id="profileForm">
                                            <!-- View Mode -->
                                            <div id="viewMode">
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label class="form-label text-muted small">First Name</label>
                                                        <p class="mb-0" id="viewFirstName">Sarah</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label text-muted small">Last Name</label>
                                                        <p class="mb-0" id="viewLastName">Johnson</p>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-muted small">Email</label>
                                                    <p class="mb-0" id="viewEmail">sarah.johnson@example.com</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-muted small">Phone Number</label>
                                                    <p class="mb-0" id="viewPhone">(555) 123-4567</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-muted small">Address</label>
                                                    <p class="mb-0" id="viewAddress">789 Elm St, Apt 2A<br>New York, NY 10005</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-muted small">Specialties</label>
                                                    <p class="mb-0" id="viewSpecialties">Wound Care, Medication Administration</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-muted small">Years of Experience</label>
                                                    <p class="mb-0" id="viewExperience">8</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-muted small">Hourly Rate</label>
                                                    <p class="mb-0" id="viewRate">$45</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-muted small">About Me</label>
                                                    <p class="mb-0" id="viewBio">Certified wound care specialist with 8 years of hospital experience. Specializing in post-surgical care and diabetic wound management.</p>
                                                </div>
                                            </div>

                                            <!-- Edit Mode (hidden by default) -->
                                            <div id="editMode" style="display: none;">
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label class="form-label">First Name</label>
                                                        <input type="text" class="form-control" id="editFirstName" value="Sarah">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" id="editLastName" value="Johnson">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="editEmail" value="sarah.johnson@example.com">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Phone Number</label>
                                                    <input type="tel" class="form-control" id="editPhone" value="(555) 123-4567">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <textarea class="form-control" id="editAddress" rows="2">789 Elm St, Apt 2A, New York, NY 10005</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Specialties</label>
                                                    <select class="form-select" id="editSpecialties" multiple>
                                                        <option selected>Wound Care</option>
                                                        <option selected>Medication Administration</option>
                                                        <option>Physical Therapy</option>
                                                        <option>Elderly Care</option>
                                                        <option>Pediatric Care</option>
                                                    </select>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Years of Experience</label>
                                                        <input type="number" class="form-control" id="editExperience" value="8">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Hourly Rate ($)</label>
                                                        <input type="number" class="form-control" id="editRate" value="45">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">About Me</label>
                                                    <textarea class="form-control" id="editBio" rows="3">Certified wound care specialist with 8 years of hospital experience. Specializing in post-surgical care and diabetic wound management.</textarea>
                                                </div>
                                                <div class="text-end">
                                                    <button type="button" class="btn btn-secondary" id="cancelEditBtn">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 fw-bold text-primary">Certifications & Licenses</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <h6 class="card-title">RN License</h6>
                                                        <p class="small mb-1">Issued: 2015</p>
                                                        <p class="small text-muted">State Board of Nursing</p>
                                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                                            <span class="badge bg-success">Verified</span>
                                                            <button class="btn btn-sm btn-outline-primary">View</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <h6 class="card-title">Wound Care Certification</h6>
                                                        <p class="small mb-1">Issued: 2018</p>
                                                        <p class="small text-muted">WOCNCB</p>
                                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                                            <span class="badge bg-success">Verified</span>
                                                            <button class="btn btn-sm btn-outline-primary">View</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <h6 class="card-title">CPR/BLS</h6>
                                                        <p class="small mb-1">Issued: 2023</p>
                                                        <p class="small text-muted">American Heart Association</p>
                                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                                            <span class="badge bg-success">Verified</span>
                                                            <button class="btn btn-sm btn-outline-primary">View</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="card h-100 border-dashed">
                                                    <div class="card-body text-center d-flex flex-column justify-content-center">
                                                        <i class="fas fa-plus-circle fa-2x text-muted mb-2"></i>
                                                        <h6 class="card-title mb-0">Add New Certification</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings Tab -->
                    <div class="tab-pane fade" id="earnings">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <h2 class="h4 fw-bold">Earnings</h2>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group me-2">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">This Month</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Last Month</button>
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                                    <i class="fas fa-calendar"></i> Custom Range
                                </button>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-8">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 fw-bold text-primary">Earnings Overview</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="earningsChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 fw-bold text-primary">Earnings Summary</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span>This Month</span>
                                                <strong>$1,250</strong>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 65%"></div>
                                            </div>
                                            <small class="text-muted">65% of your $2,000 goal</small>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span>Last Month</span>
                                                <strong>$1,850</strong>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 92%"></div>
                                            </div>
                                            <small class="text-muted">92% of your $2,000 goal</small>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span>Total Earnings</span>
                                                <strong>$8,450</strong>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 100%"></div>
                                            </div>
                                            <small class="text-muted">Since you joined 6 months ago</small>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button class="btn btn-primary">Request Payout</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 fw-bold text-primary">Recent Transactions</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Date</th>
                                                <th>Service</th>
                                                <th>Patient</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Nov 10, 2023</td>
                                                <td>Wound Care</td>
                                                <td>John Patient</td>
                                                <td>$85.00</td>
                                                <td><span class="badge bg-success">Paid</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Details</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Invoice</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nov 8, 2023</td>
                                                <td>Medication Admin</td>
                                                <td>Mary Smith</td>
                                                <td>$65.00</td>
                                                <td><span class="badge bg-success">Paid</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Details</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Invoice</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nov 5, 2023</td>
                                                <td>Physical Therapy</td>
                                                <td>Robert Johnson</td>
                                                <td>$95.00</td>
                                                <td><span class="badge bg-warning">Pending</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Details</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Invoice</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nov 2, 2023</td>
                                                <td>Wound Care</td>
                                                <td>Sarah Wilson</td>
                                                <td>$85.00</td>
                                                <td><span class="badge bg-success">Paid</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Details</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Invoice</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oct 28, 2023</td>
                                                <td>Medication Admin</td>
                                                <td>Michael Brown</td>
                                                <td>$65.00</td>
                                                <td><span class="badge bg-success">Paid</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Details</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Invoice</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Report Issues Tab -->
                    <div class="tab-pane fade" id="reports">
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

    <!-- Availability Modal -->
    <div class="modal fade" id="availabilityModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Set Your Availability</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="availabilityForm">
                        <div class="mb-4">
                            <h6 class="mb-3">General Availability</h6>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="card availability-day">
                                        <div class="card-body text-center">
                                            <h6 class="card-title">Monday</h6>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="mondayToggle" checked>
                                            </div>
                                            <div class="time-slots mt-2" id="mondaySlots">
                                                <div class="mb-2">
                                                    <input type="time" class="form-control form-control-sm mb-1" value="09:00">
                                                    <span class="small">to</span>
                                                    <input type="time" class="form-control form-control-sm mt-1" value="17:00">
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary mt-2 add-slot-btn" data-day="monday">Add Slot</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card availability-day">
                                        <div class="card-body text-center">
                                            <h6 class="card-title">Tuesday</h6>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="tuesdayToggle" checked>
                                            </div>
                                            <div class="time-slots mt-2" id="tuesdaySlots">
                                                <div class="mb-2">
                                                    <input type="time" class="form-control form-control-sm mb-1" value="09:00">
                                                    <span class="small">to</span>
                                                    <input type="time" class="form-control form-control-sm mt-1" value="17:00">
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary mt-2 add-slot-btn" data-day="tuesday">Add Slot</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card availability-day">
                                        <div class="card-body text-center">
                                            <h6 class="card-title">Wednesday</h6>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="wednesdayToggle" checked>
                                            </div>
                                            <div class="time-slots mt-2" id="wednesdaySlots">
                                                <div class="mb-2">
                                                    <input type="time" class="form-control form-control-sm mb-1" value="09:00">
                                                    <span class="small">to</span>
                                                    <input type="time" class="form-control form-control-sm mt-1" value="17:00">
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary mt-2 add-slot-btn" data-day="wednesday">Add Slot</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card availability-day">
                                        <div class="card-body text-center">
                                            <h6 class="card-title">Thursday</h6>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="thursdayToggle" checked>
                                            </div>
                                            <div class="time-slots mt-2" id="thursdaySlots">
                                                <div class="mb-2">
                                                    <input type="time" class="form-control form-control-sm mb-1" value="09:00">
                                                    <span class="small">to</span>
                                                    <input type="time" class="form-control form-control-sm mt-1" value="17:00">
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary mt-2 add-slot-btn" data-day="thursday">Add Slot</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card availability-day">
                                        <div class="card-body text-center">
                                            <h6 class="card-title">Friday</h6>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="fridayToggle" checked>
                                            </div>
                                            <div class="time-slots mt-2" id="fridaySlots">
                                                <div class="mb-2">
                                                    <input type="time" class="form-control form-control-sm mb-1" value="09:00">
                                                    <span class="small">to</span>
                                                    <input type="time" class="form-control form-control-sm mt-1" value="17:00">
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary mt-2 add-slot-btn" data-day="friday">Add Slot</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card availability-day">
                                        <div class="card-body text-center">
                                            <h6 class="card-title">Saturday</h6>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="saturdayToggle">
                                            </div>
                                            <div class="time-slots mt-2" id="saturdaySlots" style="display: none;">
                                                <div class="mb-2">
                                                    <input type="time" class="form-control form-control-sm mb-1" value="10:00">
                                                    <span class="small">to</span>
                                                    <input type="time" class="form-control form-control-sm mt-1" value="14:00">
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary mt-2 add-slot-btn" data-day="saturday" style="display: none;">Add Slot</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="mb-3">Specific Date Exceptions</h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control" id="exceptionDate">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Availability</label>
                                    <select class="form-select" id="exceptionType">
                                        <option value="unavailable">Unavailable All Day</option>
                                        <option value="custom">Custom Hours</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3" id="exceptionHours" style="display: none;">
                                <div class="col-md-6">
                                    <label class="form-label">Start Time</label>
                                    <input type="time" class="form-control" id="exceptionStart">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">End Time</label>
                                    <input type="time" class="form-control" id="exceptionEnd">
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary" id="addExceptionBtn">Add Exception</button>

                            <div class="mt-3" id="exceptionsList">
                                <div class="list-group">
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong>Nov 23, 2023</strong> - Unavailable All Day
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-danger">Remove</button>
                                    </div>
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong>Dec 25, 2023</strong> - Unavailable All Day
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-danger">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Availability</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Request Details Modal -->
    <div class="modal fade" id="requestDetailsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Service Request Details <span id="requestIdBadge" class="badge bg-primary ms-2"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">Service Information</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-sm-5 fw-bold">Service Type:</div>
                                        <div class="col-sm-7" id="detailServiceType"></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-5 fw-bold">Request Date:</div>
                                        <div class="col-sm-7" id="detailRequestDate"></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-5 fw-bold">Scheduled Time:</div>
                                        <div class="col-sm-7" id="detailScheduledTime"></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-5 fw-bold">Status:</div>
                                        <div class="col-sm-7" id="detailStatus"></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-5 fw-bold">Urgency:</div>
                                        <div class="col-sm-7" id="detailUrgency"></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-5 fw-bold">Duration:</div>
                                        <div class="col-sm-7" id="detailDuration"></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-5 fw-bold">Payment:</div>
                                        <div class="col-sm-7" id="detailPayment"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">Patient Information</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <img id="detailPatientPhoto" src="https://via.placeholder.com/60" class="rounded-circle me-3" width="60" alt="Patient">
                                        <div>
                                            <h6 class="mb-0" id="detailPatientName"></h6>
                                            <small class="text-muted" id="detailPatientCondition"></small>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-5 fw-bold">Gender:</div>
                                        <div class="col-sm-7" id="detailPatientGender"></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-5 fw-bold">Age:</div>
                                        <div class="col-sm-7" id="detailPatientAge"></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-5 fw-bold">Contact Number:</div>
                                        <div class="col-sm-7" id="detailPatientPhone"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">Service Location</h6>
                                </div>
                                <div class="card-body">
                                    <div id="detailServiceAddress" class="mb-3"></div>
                                    <div class="map-placeholder bg-light p-3 text-center rounded">
                                        <i class="fas fa-map-marker-alt fa-2x text-muted mb-2"></i>
                                        <p class="small text-muted">Map would display here</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">Medical Details</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Medical History</label>
                                        <div id="detailMedicalHistory"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Allergies</label>
                                        <div id="detailAllergies"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Current Medications</label>
                                        <div id="detailMedications"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">Special Instructions</h6>
                                </div>
                                <div class="card-body">
                                    <div id="detailSpecialInstructions"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="contactPatientBtn">
                        <i class="fas fa-comment-dots me-1"></i> Contact Patient
                    </button>
                    <button type="button" class="btn btn-success" id="acceptRequestBtn">Accept Request</button>
                </div>
            </div>
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

    <!-- modal for log out -->
    <div class="modal fade" id="logoutConfirmModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>
                    <h3>Are you sure you want to logout?</h3>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="logout.php" class="btn btn-danger">Yes, Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom JS -->
    <script>
        // Initialize charts
        document.addEventListener('DOMContentLoaded', function() {
            // Earnings Chart
            const earningsCtx = document.getElementById('earningsChart').getContext('2d');
            const earningsChart = new Chart(earningsCtx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Earnings',
                        data: [0, 0, 0, 0, 0, 1250, 1850, 2200, 1800, 1600, 1250, 0],
                        backgroundColor: '#4e73df',
                        borderColor: '#4e73df',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '$' + value;
                                }
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return '$' + context.raw;
                                }
                            }
                        }
                    }
                }
            });

            // Availability toggle functionality
            document.querySelectorAll('.form-check-input').forEach(toggle => {
                toggle.addEventListener('change', function() {
                    const day = this.id.replace('Toggle', '');
                    const slots = document.getElementById(day + 'Slots');
                    const addBtn = document.querySelector(`.add-slot-btn[data-day="${day}"]`);

                    if (this.checked) {
                        slots.style.display = 'block';
                        addBtn.style.display = 'inline-block';
                    } else {
                        slots.style.display = 'none';
                        addBtn.style.display = 'none';
                    }
                });
            });

            // Add time slot button
            document.querySelectorAll('.add-slot-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const day = this.getAttribute('data-day');
                    const slotsContainer = document.getElementById(day + 'Slots');

                    const slotDiv = document.createElement('div');
                    slotDiv.className = 'mb-2 d-flex align-items-center';
                    slotDiv.innerHTML = `
                        <input type="time" class="form-control form-control-sm me-1" value="09:00">
                        <span class="small me-1">to</span>
                        <input type="time" class="form-control form-control-sm me-2" value="17:00">
                        <button type="button" class="btn btn-sm btn-outline-danger remove-slot-btn">&times;</button>
                    `;

                    slotsContainer.appendChild(slotDiv);

                    // Add remove functionality
                    slotDiv.querySelector('.remove-slot-btn').addEventListener('click', function() {
                        slotDiv.remove();
                    });
                });
            });

            // Exception type toggle
            document.getElementById('exceptionType').addEventListener('change', function() {
                const hoursDiv = document.getElementById('exceptionHours');
                if (this.value === 'custom') {
                    hoursDiv.style.display = 'flex';
                } else {
                    hoursDiv.style.display = 'none';
                }
            });

            // Add exception button
            document.getElementById('addExceptionBtn').addEventListener('click', function() {
                const date = document.getElementById('exceptionDate').value;
                const type = document.getElementById('exceptionType').value;
                const start = document.getElementById('exceptionStart').value;
                const end = document.getElementById('exceptionEnd').value;

                if (!date) {
                    alert('Please select a date');
                    return;
                }

                const exceptionsList = document.getElementById('exceptionsList').querySelector('.list-group');
                const listItem = document.createElement('div');
                listItem.className = 'list-group-item d-flex justify-content-between align-items-center';

                let text;
                if (type === 'unavailable') {
                    text = `<strong>${formatDate(date)}</strong> - Unavailable All Day`;
                } else {
                    if (!start || !end) {
                        alert('Please enter both start and end times');
                        return;
                    }
                    text = `<strong>${formatDate(date)}</strong> - Available from ${formatTime(start)} to ${formatTime(end)}`;
                }

                listItem.innerHTML = `
                    <div>${text}</div>
                    <button type="button" class="btn btn-sm btn-outline-danger">Remove</button>
                `;

                exceptionsList.appendChild(listItem);

                // Add remove functionality
                listItem.querySelector('button').addEventListener('click', function() {
                    listItem.remove();
                });

                // Clear form
                document.getElementById('exceptionDate').value = '';
                document.getElementById('exceptionType').value = 'unavailable';
                document.getElementById('exceptionHours').style.display = 'none';
                document.getElementById('exceptionStart').value = '';
                document.getElementById('exceptionEnd').value = '';
            });

            function formatDate(dateString) {
                const options = {
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric'
                };
                return new Date(dateString).toLocaleDateString(undefined, options);
            }

            function formatTime(timeString) {
                return new Date(`2000-01-01T${timeString}`).toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit'
                });
            }

            // Image Upload Functionality
            document.getElementById('profileImageUpload').addEventListener('change', function(e) {
                const file = e.target.files[0];
                const preview = document.getElementById('profileImagePreview');
                const errorElement = document.getElementById('uploadError');

                errorElement.style.display = 'none';

                if (!file) return;

                if (file.size > 5 * 1024 * 1024) {
                    errorElement.textContent = 'File is too large (max 5MB)';
                    errorElement.style.display = 'block';
                    return;
                }

                if (!['image/jpeg', 'image/png'].includes(file.type)) {
                    errorElement.textContent = 'Only JPG/PNG files allowed';
                    errorElement.style.display = 'block';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            });

            // Edit Profile Toggle Functionality
            const editProfileBtn = document.getElementById('editProfileBtn');
            const cancelEditBtn = document.getElementById('cancelEditBtn');
            const viewMode = document.getElementById('viewMode');
            const editMode = document.getElementById('editMode');

            let isEditMode = false;

            function toggleEditMode() {
                isEditMode = !isEditMode;

                if (isEditMode) {
                    viewMode.style.display = 'none';
                    editMode.style.display = 'block';
                    editProfileBtn.textContent = 'View Profile';

                    // Transfer current values to edit fields
                    document.getElementById('editFirstName').value = document.getElementById('viewFirstName').textContent;
                    document.getElementById('editLastName').value = document.getElementById('viewLastName').textContent;
                    document.getElementById('editEmail').value = document.getElementById('viewEmail').textContent;
                    document.getElementById('editPhone').value = document.getElementById('viewPhone').textContent;
                    document.getElementById('editAddress').value = document.getElementById('viewAddress').textContent.replace(/<br>/g, '\n');
                    document.getElementById('editExperience').value = document.getElementById('viewExperience').textContent;
                    document.getElementById('editRate').value = document.getElementById('viewRate').textContent.replace('$', '');
                    document.getElementById('editBio').value = document.getElementById('viewBio').textContent;
                } else {
                    viewMode.style.display = 'block';
                    editMode.style.display = 'none';
                    editProfileBtn.textContent = 'Edit Profile';
                }
            }

            editProfileBtn.addEventListener('click', toggleEditMode);
            cancelEditBtn.addEventListener('click', toggleEditMode);

            // Form Submission
            document.getElementById('profileForm').addEventListener('submit', function(e) {
                e.preventDefault();

                if (isEditMode) {
                    // Update view mode with edited values
                    document.getElementById('viewFirstName').textContent = document.getElementById('editFirstName').value;
                    document.getElementById('viewLastName').textContent = document.getElementById('editLastName').value;
                    document.getElementById('viewEmail').textContent = document.getElementById('editEmail').value;
                    document.getElementById('viewPhone').textContent = document.getElementById('editPhone').value;
                    document.getElementById('viewAddress').innerHTML = document.getElementById('editAddress').value.replace(/\n/g, '<br>');
                    document.getElementById('viewExperience').textContent = document.getElementById('editExperience').value;
                    document.getElementById('viewRate').textContent = '$' + document.getElementById('editRate').value;
                    document.getElementById('viewBio').innerHTML = document.getElementById('editBio').value.replace(/\n/g, '<br>');

                    // Handle specialties (simplified for demo)
                    const selectedOptions = Array.from(document.getElementById('editSpecialties').selectedOptions);
                    const specialties = selectedOptions.map(option => option.value).join(', ');
                    document.getElementById('viewSpecialties').textContent = specialties;

                    toggleEditMode();
                }
            });

            // View request details
            document.querySelectorAll('.view-request-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const requestData = {
                        id: row.cells[0].textContent,
                        serviceType: row.cells[1].textContent,
                        patient: row.cells[2].textContent,
                        dateTime: row.cells[3].textContent,
                        distance: row.cells[4].textContent,
                        urgency: row.cells[5].textContent,
                        // These would normally come from your data source
                        patientPhoto: "https://randomuser.me/api/portraits/men/32.jpg",
                        patientCondition: "Diabetes Type 2, Hypertension",
                        patientGender: "Male",
                        patientAge: "58",
                        patientPhone: "(555) 987-6543",
                        address: "123 Main St, Apt 4B, New York, NY 10001",
                        medicalHistory: "Diabetes Type 2, Hypertension, Recent hip surgery",
                        allergies: "Penicillin, Latex",
                        medications: "Insulin, Lisinopril, Metformin",
                        instructions: "Please ring doorbell twice. Dog will bark but is friendly.",
                        duration: "1.5 hours",
                        payment: "$85.00"
                    };

                    populateRequestDetails(requestData);
                    new bootstrap.Modal(document.getElementById('requestDetailsModal')).show();
                });
            });

            function populateRequestDetails(data) {
                // Basic info
                document.getElementById('requestIdBadge').textContent = data.id;
                document.getElementById('detailServiceType').textContent = data.serviceType;
                document.getElementById('detailRequestDate').textContent = new Date().toLocaleDateString();
                document.getElementById('detailScheduledTime').textContent = data.dateTime;
                document.getElementById('detailStatus').innerHTML = `<span class="badge bg-warning">Pending</span>`;
                document.getElementById('detailUrgency').textContent = data.urgency.includes("Urgent") ? "Urgent" : "Standard";
                document.getElementById('detailDuration').textContent = data.duration;
                document.getElementById('detailPayment').textContent = data.payment;

                // Patient info
                document.getElementById('detailPatientName').textContent = data.patient;
                document.getElementById('detailPatientCondition').textContent = data.patientCondition;
                document.getElementById('detailPatientPhoto').src = data.patientPhoto;
                document.getElementById('detailPatientGender').textContent = data.patientGender;
                document.getElementById('detailPatientAge').textContent = data.patientAge;
                document.getElementById('detailPatientPhone').textContent = data.patientPhone;

                // Location and instructions
                document.getElementById('detailServiceAddress').textContent = data.address;
                document.getElementById('detailMedicalHistory').textContent = data.medicalHistory;
                document.getElementById('detailAllergies').textContent = data.allergies;
                document.getElementById('detailMedications').textContent = data.medications;
                document.getElementById('detailSpecialInstructions').textContent = data.instructions;

                // Connect buttons
                document.getElementById('contactPatientBtn').onclick = function() {
                    // This would open the messages tab with this patient pre-selected
                    bootstrap.Modal.getInstance(document.getElementById('requestDetailsModal')).hide();
                    document.querySelector('[href="#messages"]').click();
                };

                document.getElementById('acceptRequestBtn').onclick = function() {
                    alert('Request accepted successfully!');
                    bootstrap.Modal.getInstance(document.getElementById('requestDetailsModal')).hide();
                    // In a real app, you would update the UI and send data to the server
                };
            }

            // Accept request button
            document.querySelectorAll('.accept-request-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const requestId = row.cells[0].textContent;
                    const patientName = row.cells[2].textContent;

                    if (confirm(`Accept service request ${requestId} from ${patientName}?`)) {
                        // In a real app, you would send this to your server
                        alert('Request accepted successfully!');
                        row.remove();
                    }
                });
            });

            // Complete service button (in accepted requests table)
            document.querySelectorAll('.btn-info').forEach(btn => {
                if (btn.textContent.trim() === 'Complete') {
                    btn.addEventListener('click', function() {
                        new bootstrap.Modal(document.getElementById('completeServiceModal')).show();
                    });
                }
            });

            // Cancel request button (in accepted requests table)
            document.querySelectorAll('.btn-danger').forEach(btn => {
                if (btn.textContent.trim() === 'Cancel') {
                    btn.addEventListener('click', function() {
                        const row = this.closest('tr');
                        const requestId = row.cells[0].textContent;

                        if (confirm(`Cancel service request ${requestId}?`)) {
                            // In a real app, you would send this to your server
                            alert('Request cancelled successfully!');
                            row.remove();
                        }
                    });
                }
            });

            // Complete service form submission
            document.getElementById('completeServiceForm').addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Service marked as completed!');
                bootstrap.Modal.getInstance(document.getElementById('completeServiceModal')).hide();
                // In a real app, you would update the UI and send data to the server
            });

            // for the log out
            document.getElementById('logoutBtn').addEventListener('click', function(e) {
                e.preventDefault(); // Prevent default link behavior
                var logoutModal = new bootstrap.Modal(document.getElementById('logoutConfirmModal'));
                logoutModal.show();
            });
        });

        // Public Request Acceptance
        document.querySelectorAll('.accept-public-request').forEach(btn => {
            btn.addEventListener('click', function() {
                const requestItem = this.closest('.list-group-item');
                const requestTitle = requestItem.querySelector('h6').textContent;

                if (confirm(`Accept this public request: "${requestTitle}"?`)) {
                    // In a real app, you would send this to your server
                    alert('Request accepted! You will be connected with the patient shortly.');
                    requestItem.remove();

                    // Update badge count
                    const badge = document.querySelector('[href="#public-requests"] .badge');
                    if (badge) {
                        const currentCount = parseInt(badge.textContent);
                        badge.textContent = currentCount > 1 ? currentCount - 1 : '';
                        if (badge.textContent === '') badge.remove();
                    }
                }
            });
        });
    </script>
</body>

</html>