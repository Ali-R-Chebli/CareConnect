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
                                            src="https://via.placeholder.com/150"
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
                                                        <p class="mb-0" id="viewFirstName">John</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label text-muted small">Last Name</label>
                                                        <p class="mb-0" id="viewLastName">Patient</p>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-muted small">Email</label>
                                                    <p class="mb-0" id="viewEmail">john.patient@example.com</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-muted small">Phone Number</label>
                                                    <p class="mb-0" id="viewPhone">(123) 456-7890</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-muted small">Address</label>
                                                    <p class="mb-0" id="viewAddress">123 Main St, Apt 4B<br>New York, NY 10001</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-muted small">Medical History</label>
                                                    <p class="mb-0" id="viewMedicalHistory">Diabetes Type 2<br>Hypertension<br>Allergic to Penicillin</p>
                                                </div>
                                            </div>

                                            <!-- Edit Mode (hidden by default) -->
                                            <div id="editMode" style="display: none;">
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label class="form-label">First Name</label>
                                                        <input type="text" class="form-control" id="editFirstName" value="John">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" id="editLastName" value="Patient">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="editEmail" value="john.patient@example.com">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Phone Number</label>
                                                    <input type="tel" class="form-control" id="editPhone" value="(123) 456-7890">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <textarea class="form-control" id="editAddress" rows="2">123 Main St, Apt 4B, New York, NY 10001</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Medical History</label>
                                                    <textarea class="form-control" id="editMedicalHistory" rows="3">Diabetes Type 2, Hypertension, Allergic to Penicillin</textarea>
                                                </div>
                                                <div class="text-end">
                                                    <button type="button" class="btn btn-secondary" id="cancelEditBtn">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>