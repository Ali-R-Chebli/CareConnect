<div class="tab-pane fade show active" id="request-service">
                        <h2 class="h4 mb-4 fw-bold">Request Nursing Service</h2>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 fw-bold text-primary">Service Details</h6>
                                    </div>
                                    <div class="card-body">
                                        <form id="serviceRequestForm">
                                            <!-- Step 1: Basic Information -->
                                            <div class="step" id="step1">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Service Type</label>
                                                    <select class="form-select" required>
                                                        <option value="">Select a service</option>
                                                        <option>Wound Care</option>
                                                        <option>Medication Administration</option>
                                                        <option>Physical Therapy</option>
                                                    </select>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold">Preferred Date</label>
                                                        <input type="date" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold">Preferred Time</label>
                                                        <input type="time" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="text-end">
                                                    <button type="button" class="btn btn-primary next-step">Next</button>
                                                </div>
                                            </div>

                                            <!-- Step 2: Patient Details -->
                                            <div class="step" id="step2" style="display:none;">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Patient Gender</label>
                                                    <select class="form-select" required>
                                                        <option value="">Select gender</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                        <option>Other</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Type of Care Needed</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="wasteManagement">
                                                        <label class="form-check-label" for="wasteManagement">Waste Management</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="mobilityAssistance">
                                                        <label class="form-check-label" for="mobilityAssistance">Mobility Assistance</label>
                                                    </div>
                                                </div>

                                                <div class="text-end">
                                                    <button type="button" class="btn btn-secondary me-2 prev-step">Back</button>
                                                    <button type="button" class="btn btn-primary next-step">Next</button>
                                                </div>
                                            </div>

                                            <!-- Step 3: Address & Final Details -->
                                            <div class="step" id="step3" style="display:none;">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Address for Service</label>
                                                    <textarea class="form-control" id="serviceAddress" rows="2" required></textarea>
                                                    <button type="button" class="btn btn-sm btn-outline-primary mt-2 fw-bold" id="detectAddressBtn">
                                                        <i class="fas fa-location-arrow me-1"></i> Use My Current Location
                                                    </button>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Special Instructions</label>
                                                    <textarea class="form-control" rows="3" placeholder="Any special requirements..."></textarea>
                                                </div>

                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" class="form-check-input" id="urgentCheck">
                                                    <label class="form-check-label fw-bold" for="urgentCheck">Urgent Request</label>
                                                </div>

                                                <div class="text-end">
                                                    <button type="button" class="btn btn-secondary me-2 prev-step">Back</button>
                                                    <button type="submit" class="btn btn-success">Submit Request</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>