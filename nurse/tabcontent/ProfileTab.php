<div class="tab-pane fade" id="profile">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <h2 class="h4 fw-bold">My Profile</h2>
                            <button class="btn btn-primary" id="editProfileBtn">Edit Profile</button>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 fw-bold text-primary">Profile Picture</h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <img id="profileImagePreview" class="img-fluid rounded-circle mb-3"
                                            src="https://randomuser.me/api/portraits/women/44.jpg"
                                            alt="Profile Picture"
                                            style="width: 150px; height: 150px; object-fit: cover;">
                                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                        <input type="file" id="profileImageUpload" accept="image/jpeg, image/png" style="display: none;">
                                        <button class="btn btn-sm btn-primary" onclick="document.getElementById('profileImageUpload').click()">
                                            Upload new image
                                        </button>
                                        <div id="uploadError" class="text-danger small mt-2" style="display: none;"></div>
                                    </div>
                                </div>

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 fw-bold text-primary">Verification Status</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span>License Verification</span>
                                                <span class="badge bg-success">Verified</span>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span>Background Check</span>
                                                <span class="badge bg-success">Verified</span>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span>Certifications</span>
                                                <span class="badge bg-success">3 Verified</span>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-sm btn-outline-primary">View Verification Details</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                        <h6 class="m-0 fw-bold text-primary">Account Information</h6>
                                    </div>
                                    <div class="card-body">
                                        <form id="profileForm">
                                            <!-- View Mode -->
                                            <div id="viewMode">
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label class="form-label text-muted small">First Name</label>
                                                        <p class="mb-0" id="viewFirstName">Sarah</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label text-muted small">Last Name</label>
                                                        <p class="mb-0" id="viewLastName">Johnson</p>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-muted small">Email</label>
                                                    <p class="mb-0" id="viewEmail">sarah.johnson@example.com</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-muted small">Phone Number</label>
                                                    <p class="mb-0" id="viewPhone">(555) 123-4567</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-muted small">Address</label>
                                                    <p class="mb-0" id="viewAddress">789 Elm St, Apt 2A<br>New York, NY 10005</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-muted small">Specialties</label>
                                                    <p class="mb-0" id="viewSpecialties">Wound Care, Medication Administration</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-muted small">Years of Experience</label>
                                                    <p class="mb-0" id="viewExperience">8</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-muted small">Hourly Rate</label>
                                                    <p class="mb-0" id="viewRate">$45</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-muted small">About Me</label>
                                                    <p class="mb-0" id="viewBio">Certified wound care specialist with 8 years of hospital experience. Specializing in post-surgical care and diabetic wound management.</p>
                                                </div>
                                            </div>

                                            <!-- Edit Mode (hidden by default) -->
                                            <div id="editMode" style="display: none;">
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label class="form-label">First Name</label>
                                                        <input type="text" class="form-control" id="editFirstName" value="Sarah">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" id="editLastName" value="Johnson">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="editEmail" value="sarah.johnson@example.com">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Phone Number</label>
                                                    <input type="tel" class="form-control" id="editPhone" value="(555) 123-4567">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <textarea class="form-control" id="editAddress" rows="2">789 Elm St, Apt 2A, New York, NY 10005</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Specialties</label>
                                                    <select class="form-select" id="editSpecialties" multiple>
                                                        <option selected>Wound Care</option>
                                                        <option selected>Medication Administration</option>
                                                        <option>Physical Therapy</option>
                                                        <option>Elderly Care</option>
                                                        <option>Pediatric Care</option>
                                                    </select>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Years of Experience</label>
                                                        <input type="number" class="form-control" id="editExperience" value="8">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Hourly Rate ($)</label>
                                                        <input type="number" class="form-control" id="editRate" value="45">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">About Me</label>
                                                    <textarea class="form-control" id="editBio" rows="3">Certified wound care specialist with 8 years of hospital experience. Specializing in post-surgical care and diabetic wound management.</textarea>
                                                </div>
                                                <div class="text-end">
                                                    <button type="button" class="btn btn-secondary" id="cancelEditBtn">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 fw-bold text-primary">Certifications & Licenses</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <h6 class="card-title">RN License</h6>
                                                        <p class="small mb-1">Issued: 2015</p>
                                                        <p class="small text-muted">State Board of Nursing</p>
                                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                                            <span class="badge bg-success">Verified</span>
                                                            <button class="btn btn-sm btn-outline-primary">View</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <h6 class="card-title">Wound Care Certification</h6>
                                                        <p class="small mb-1">Issued: 2018</p>
                                                        <p class="small text-muted">WOCNCB</p>
                                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                                            <span class="badge bg-success">Verified</span>
                                                            <button class="btn btn-sm btn-outline-primary">View</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <h6 class="card-title">CPR/BLS</h6>
                                                        <p class="small mb-1">Issued: 2023</p>
                                                        <p class="small text-muted">American Heart Association</p>
                                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                                            <span class="badge bg-success">Verified</span>
                                                            <button class="btn btn-sm btn-outline-primary">View</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="card h-100 border-dashed">
                                                    <div class="card-body text-center d-flex flex-column justify-content-center">
                                                        <i class="fas fa-plus-circle fa-2x text-muted mb-2"></i>
                                                        <h6 class="card-title mb-0">Add New Certification</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>