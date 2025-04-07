<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Nursing - Patient Portal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="patient.css">
</head>

<body>
    <div class="container-fluid">



        <div class="row">
            <!-- Sidebar -->

            <div class="col-md-3 col-lg-2 d-md-block sidebar bg-primary collapse" id="sidebarMenu">
                <div class="position-sticky pt-3">
                    <div class="text-center mb-4">
                        <h4 class="text-white">Home Nursing</h4>
                        <p class="text-white-50 small">Patient Portal</p>
                    </div>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#request-service" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-plus-circle"></i>
                                Request Service
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#my-requests" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-list"></i>
                                My Requests
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#nurses-available" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-user-nurse"></i>
                                Nurses Available
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#messages" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-comments"></i>
                                Messages
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#notifications" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-bell"></i>
                                Notifications
                                <span class="d-inline-block rounded-circle bg-danger ms-3" style="width:10px; height:10px;"></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="#profile" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-user"></i>
                                My Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#reports" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-flag"></i>
                                Report Issues
                            </a>
                        </li>
                        <!-- Only addition: Logout button as list item -->
                        <li class="nav-item mt-auto">
                            <a class="nav-link" href="#" id="logoutBtn">
                                <i class="fas fa-fw fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- for the sidebar -->

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">

                <!-- Tab Content -->
                <div class="tab-content">
                    <!-- Profile Tab   -->
                    <?php include 'tabcontent/profiletab.php' ; ?>
                    
                    
                    <!-- Request Service Tab -->
                    <?php include 'tabcontent/requestservicetab.php' ; ?>
            
                    
                    <!-- My Requests Tab -->
                    <?php include 'tabcontent/myrequeststab.php' ; ?>
                    
                    
                    <!-- Nurses Available Tab -->
                    <?php include 'tabcontent/nursesavailabletab.php' ; ?>
                    
                    
                    <!-- Messages Tab -->
                    <?php include 'tabcontent/messagestab.php' ; ?>
                    
                    
                    <!-- Notifications Tab -->
                    <?php include 'tabcontent/notificationstab.php' ; ?>
                    
                    
                    <!-- Report Issues Tab -->
                    <?php include 'tabcontent/reportissuestab.php' ; ?>

                </div>
            </main>
        </div>
    </div>

    <!-- Nurse Profile Modal -->
    <?php include 'modals/nurseprofilemodal.php' ; ?>
    
    <!-- Rating Modal -->
    <?php include 'modals/ratingmodal.php' ; ?>
    
    <!-- log out modal -->
    <?php include 'modals/logoutmodal.php' ; ?>
    
    <!-- Request Details Modal -->
    <?php include 'modals/requestdetailsmodal.php' ; ?>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="patient.js"></script>
</body>
</html>