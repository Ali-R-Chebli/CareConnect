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