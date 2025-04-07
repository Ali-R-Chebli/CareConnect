<div class="tab-pane fade" id="reports">
                        <h2 class="h4 mb-4 fw-bold">Report Issues</h2>

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 fw-bold text-primary">Submit a Report</h6>
                                    </div>
                                    <div class="card-body">
                                        <form id="reportForm">
                                            <div class="mb-3">
                                                <label class="form-label">Report Type</label>
                                                <select class="form-select" required>
                                                    <option value="">Select report type</option>
                                                    <option>Service Quality Issue</option>
                                                    <option>Billing Problem</option>
                                                    <option>Nurse Behavior</option>
                                                    <option>Technical Issue</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Related Service (if applicable)</label>
                                                <select class="form-select">
                                                    <option value="">Select service</option>
                                                    <option>#HN-2023-001 - Wound Care (Nov 10)</option>
                                                    <option>#HN-2023-002 - Medication Admin (Nov 12)</option>
                                                    <option>#HN-2023-003 - Physical Therapy (Nov 15)</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" rows="5" placeholder="Please describe the issue in detail..." required></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Upload Supporting Documents (Optional)</label>
                                                <input type="file" class="form-control" multiple>
                                                <small class="text-muted">You can upload photos, documents, or other files (max 5MB each)</small>
                                            </div>

                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="urgentReport">
                                                <label class="form-check-label" for="urgentReport">This is an urgent issue that requires immediate attention</label>
                                            </div>

                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary">Submit Report</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 fw-bold text-primary">Previous Reports</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="list-group">
                                            <div class="list-group-item">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-1">Late Arrival</h6>
                                                    <small class="text-muted">Nov 5</small>
                                                </div>
                                                <p class="mb-1 small">Nurse arrived 45 minutes late for scheduled appointment</p>
                                                <small class="text-success">Resolved</small>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-1">Incorrect Billing</h6>
                                                    <small class="text-muted">Oct 28</small>
                                                </div>
                                                <p class="mb-1 small">Charged for services not received</p>
                                                <small class="text-success">Resolved</small>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-1">Website Error</h6>
                                                    <small class="text-muted">Oct 15</small>
                                                </div>
                                                <p class="mb-1 small">Unable to submit service request form</p>
                                                <small class="text-warning">In Progress</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>