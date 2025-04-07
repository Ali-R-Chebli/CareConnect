<div class="modal fade" id="nurseProfileModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nurseProfileModalLabel">Nurse Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-4 text-center">
                            <img id="nurseProfilePhoto" src="" class="rounded-circle mb-3" width="150" alt="Nurse Photo">
                            <h4 id="nurseProfileName"></h4>
                            <p class="text-muted" id="nurseProfileSpecialty"></p>

                            <div class="mb-3">
                                <div id="nurseProfileRating"></div>
                                <small class="text-muted" id="nurseReviewCount"></small>
                            </div>

                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6 class="card-title">Quick Stats</h6>
                                    <div class="d-flex justify-content-between small">
                                        <span>Requests:</span>
                                        <strong id="nurseTotalRequests">0</strong>
                                    </div>
                                    <div class="d-flex justify-content-between small">
                                        <span>Experience:</span>
                                        <strong id="nurseExperience">0 years</strong>
                                    </div>
                                    <div class="d-flex justify-content-between small">
                                        <span>Response Time:</span>
                                        <strong id="nurseResponseTime">-</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-8">
                            <ul class="nav nav-tabs" id="nurseProfileTabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#nurseDetails">Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#nurseSchedule">Schedule</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#nurseCertifications">Certifications</a>
                                </li>
                            </ul>

                            <div class="tab-content p-3 border border-top-0 rounded-bottom">
                                <!-- Details Tab -->
                                <div class="tab-pane fade show active" id="nurseDetails">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p><strong>Age:</strong> <span id="nurseAge">-</span></p>
                                            <p><strong>Gender:</strong> <span id="nurseGender">-</span></p>
                                            <p><strong>Languages:</strong> <span id="nurseLanguages">English</span></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p><strong>Location:</strong> <span id="nurseLocation">-</span></p>
                                            <p><strong>Hourly Rate:</strong> <span id="nurseRate">-</span></p>
                                            <p><strong>Last Active:</strong> <span id="nurseLastActive">-</span></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <h6>About</h6>
                                    <p id="nurseBio">No bio available.</p>
                                </div>

                                <!-- Schedule Tab -->
                                <div class="tab-pane fade" id="nurseSchedule">
                                    <div class="alert alert-info small">
                                        <i class="fas fa-info-circle me-2"></i>
                                        Green indicates available time slots
                                    </div>
                                    <div id="nurseAvailabilityCalendar"></div>
                                    <div class="mt-3">
                                        <h6>Typical Availability</h6>
                                        <ul id="nurseGeneralAvailability"></ul>
                                    </div>
                                </div>

                                <!-- Certifications Tab -->
                                <div class="tab-pane fade" id="nurseCertifications">
                                    <div class="row" id="nurseCertificationsList">
                                        <!-- Will be filled dynamically -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="requestThisNurseBtn">Request This Nurse</button>
                </div>
            </div>
        </div>
    </div>