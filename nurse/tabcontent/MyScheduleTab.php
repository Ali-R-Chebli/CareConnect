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