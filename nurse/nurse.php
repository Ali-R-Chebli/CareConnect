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
                            <a class="nav-link" href="#private-requests" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-envelope"></i>
                                Private Requests
                                <span class="badge bg-danger ms-2">2</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#request-status" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-tasks"></i>
                                Request Status
                                <span class="badge bg-info ms-2">New</span>
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
                     <?php include "tabcontent/DashboardTab.php"  ?>
                     
                     
                     <!-- public requests -->
                     <?php include "tabcontent/publicrequests.php"  ?>
                     
                     
                     <!-- private requests tab -->
                     <?php include "tabcontent/privaterequeststab.php"  ?>
                     
                     
                     <!-- requests status tab -->
                     <?php include "tabcontent/requestsstatustab.php"  ?>
                     
                     
                     <!-- My Schedule Tab -->
                     <?php include "tabcontent/MyScheduleTab.php"  ?>
                     
                     
                     <!-- Messages Tab -->
                     <?php include "tabcontent/MessagesTab.php"  ?>
                     
                     
                     <!-- Notifications Tab -->
                     <?php include "tabcontent/NotificationsTab.php"  ?>
                     
                     
                     <!-- Profile Tab -->
                     <?php include "tabcontent/ProfileTab.php"  ?>
                     
                     
                     <!-- Earnings Tab -->
                     <?php include "tabcontent/EarningsTab.php"  ?>
                     
                     
                     <!-- Report Issues Tab -->
                     <?php include "tabcontent/ReportIssuesTab.php"  ?>


                </div>

            </main>
        </div>
    </div>

    <!-- Availability Modal -->
    <?php include "modals/AvailabilityModal.php" ?>
    
    <!-- Request Details Modal -->
    <?php include "modals/RequestDetailsModal.php" ?>


    <!-- Complete Service Modal -->
    <?php include "modals/CompleteServiceModal.php" ?>   
    
    <!-- modal for log out -->
    <?php include "modals/modalforlogout.php" ?>   


    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom JS -->
    <script src="nurse.js"></script>
    </body>
    
    </html>


<!-- end of page -->