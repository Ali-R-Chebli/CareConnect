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

                    <!-- public requests -->
                    <div class="tab-pane fade show active " id="public-requests">
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
                            <div class="card-body p-0 "> <!-- Changed to p-0 to remove padding -->
                                <div class="list-group list-group-flush" style="max-height: 500px; overflow-y: auto;"> <!-- Added scrollable container -->
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
                                            <button data-bs-toggle="modal" data-bs-target="#requestDetailsModal" class="btn btn-sm btn-primary accept-public-request">Accept Request</button>
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
                                            <button data-bs-toggle="modal" data-bs-target="#requestDetailsModal" class="btn btn-sm btn-primary accept-public-request">Accept Request</button>
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
                                            <button data-bs-toggle="modal" data-bs-target="#requestDetailsModal" class="btn btn-sm btn-primary accept-public-request">Accept Request</button>
                                        </div>
                                    </div>

                                    <!-- You can add more request items here -->
                                    <!-- They will automatically become scrollable when they exceed the max-height -->
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </main>
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