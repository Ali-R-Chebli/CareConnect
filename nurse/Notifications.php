<?php 
session_start();
$_SESSION['user_id'] = 1; // Example: manually set nurse ID
$_SESSION['user_type'] = 'nurse';
$_SESSION['logged_in'] = true;

require_once 'db_connection.php';
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
            <?php include "sidebar.php"  ?>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <!-- Tab Content -->
                <div class="tab-content">

                    <!-- Notifications Tab -->
                    <div class="tab-pane fade show active" id="notifications">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <h2 class="h4 fw-bold">Notifications</h2>
                            <button class="btn btn-sm btn-outline-secondary">Mark all as read</button>
                        </div>

                        <div class="card shadow">
                            <div class="card-body p-0">
                                <div class="list-group list-group-flush">

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