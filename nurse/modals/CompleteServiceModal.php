<div class="modal fade" id="completeServiceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Complete Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="completeServiceForm">
                        <div class="mb-3">
                            <label class="form-label">Service Provided</label>
                            <input type="text" class="form-control" value="Wound Care - Nov 10, 2023" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Patient</label>
                            <input type="text" class="form-control" value="John Patient" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Service Duration</label>
                            <div class="input-group">
                                <input type="number" class="form-control" value="1.5" min="0.25" step="0.25">
                                <span class="input-group-text">hours</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" rows="3" placeholder="Enter any notes about the service..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Upload Documents (Optional)</label>
                            <input type="file" class="form-control" multiple>
                            <small class="text-muted">You can upload photos, reports, or other documents</small>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Complete Service</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>