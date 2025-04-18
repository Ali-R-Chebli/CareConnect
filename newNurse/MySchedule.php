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

                     <!-- My Schedule Tab -->
                     
                     <div class="tab-pane fade show active" id="my-schedule">
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