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

                     <!-- Messages Tab -->
                     
                     <div class="tab-pane fade show active" id="messages">
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