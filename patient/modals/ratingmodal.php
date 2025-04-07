<div class="modal fade" id="ratingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rate Your Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="ratingForm">
                        <div class="mb-3">
                            <label class="form-label">Service Provided</label>
                            <input type="text" class="form-control" value="Wound Care - Nov 10, 2023" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nurse</label>
                            <input type="text" class="form-control" value="Sarah Johnson" readonly>
                        </div>

                        <div class="mb-4 text-center">
                            <label class="form-label">Rating</label>
                            <div class="rating-stars">
                                <i class="fas fa-star rating-star" data-rating="1"></i>
                                <i class="fas fa-star rating-star" data-rating="2"></i>
                                <i class="fas fa-star rating-star" data-rating="3"></i>
                                <i class="fas fa-star rating-star" data-rating="4"></i>
                                <i class="fas fa-star rating-star" data-rating="5"></i>
                                <input type="hidden" id="ratingValue" name="rating" value="0">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Comments</label>
                            <textarea class="form-control" rows="3" placeholder="Share details about your experience..."></textarea>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit Rating</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
