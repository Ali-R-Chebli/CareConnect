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
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">Nurse Information</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <img id="detailNursePhoto" src="https://via.placeholder.com/60" class="rounded-circle me-3" width="60" alt="Nurse">
                                        <div>
                                            <h6 class="mb-0" id="detailNurseName"></h6>
                                            <small class="text-muted" id="detailNurseSpecialty"></small>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-5 fw-bold">Contact Number:</div>
                                        <div class="col-sm-7" id="detailNursePhone"></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-5 fw-bold">Rating:</div>
                                        <div class="col-sm-7" id="detailNurseRating"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">Patient Details</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-sm-5 fw-bold">Patient Name:</div>
                                        <div class="col-sm-7" id="detailPatientName"></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-5 fw-bold">Gender:</div>
                                        <div class="col-sm-7" id="detailPatientGender"></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-5 fw-bold">Care Needed:</div>
                                        <div class="col-sm-7" id="detailCareNeeded"></div>
                                    </div>
                                </div>
                            </div>

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
                    <button type="button" class="btn btn-primary" id="contactNurseBtn">
                        <i class="fas fa-comment-dots me-1"></i> Contact Nurse
                    </button>
                </div>
            </div>
        </div>
    </div>