<div class="tab-pane fade" id="request-status">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <h2 class="h4 fw-bold">Request Status Dashboard</h2>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="dropdown me-2">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="statusFilter" data-bs-toggle="dropdown">
                                        <i class="fas fa-filter me-1"></i> Filter Status
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item active" href="#" data-status="all">All Requests</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#" data-status="pending">Pending My Response</a></li>
                                        <li><a class="dropdown-item" href="#" data-status="patient-pending">Waiting Patient Confirmation</a></li>
                                        <li><a class="dropdown-item" href="#" data-status="accepted">Accepted/Upcoming</a></li>
                                        <li><a class="dropdown-item" href="#" data-status="completed">Completed</a></li>
                                        <li><a class="dropdown-item" href="#" data-status="cancelled">Cancelled/Declined</a></li>
                                        <li><a class="dropdown-item" href="#" data-status="expired">Expired</a></li>
                                    </ul>
                                </div>
                                <div class="btn-group me-2">
                                    <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-sync-alt"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                <h6 class="m-0 fw-bold text-primary">All Requests Overview</h6>
                                <div class="small">
                                    <span class="badge bg-primary me-2">Total: 15</span>
                                    <span class="badge bg-warning me-2">Pending: 3</span>
                                    <span class="badge bg-success me-2">Completed: 8</span>
                                    <span class="badge bg-secondary">Others: 4</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="statusTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Request ID</th>
                                                <th>Patient</th>
                                                <th>Service</th>
                                                <th>Date/Time</th>
                                                <th>Status</th>
                                                <th>Last Updated</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Pending My Response -->
                                            <tr data-status="pending">
                                                <td>#REQ-1024</td>
                                                <td>John Smith</td>
                                                <td>Wound Dressing</td>
                                                <td>Tomorrow, 10:00 AM</td>
                                                <td><span class="badge bg-warning">Pending Your Acceptance</span></td>
                                                <td>2 hours ago</td>
                                                <td>
                                                    <button class="btn btn-sm btn-success me-1">Accept</button>
                                                    <button class="btn btn-sm btn-outline-danger">Decline</button>
                                                </td>
                                            </tr>

                                            <!-- Waiting Patient Confirmation -->
                                            <tr data-status="patient-pending">
                                                <td>#REQ-1021</td>
                                                <td>Mary Johnson</td>
                                                <td>Medication Admin</td>
                                                <td>Fri, Nov 17, 2:00 PM</td>
                                                <td><span class="badge bg-info">Waiting Patient Confirmation</span></td>
                                                <td>1 day ago</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-secondary">Remind</button>
                                                </td>
                                            </tr>

                                            <!-- Accepted/Upcoming -->
                                            <tr data-status="accepted">
                                                <td>#REQ-1019</td>
                                                <td>Robert Brown</td>
                                                <td>Physical Therapy</td>
                                                <td>Mon, Nov 20, 9:00 AM</td>
                                                <td><span class="badge bg-primary">Confirmed</span></td>
                                                <td>3 days ago</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Details</button>
                                                </td>
                                            </tr>

                                            <!-- Completed -->
                                            <tr data-status="completed">
                                                <td>#REQ-1015</td>
                                                <td>Sarah Wilson</td>
                                                <td>Elderly Care</td>
                                                <td>Nov 10, 2023, 10:00 AM</td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                                <td>Nov 10, 2023</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-success">View Feedback</button>
                                                </td>
                                            </tr>

                                            <!-- Cancelled/Declined -->
                                            <tr data-status="cancelled">
                                                <td>#REQ-1012</td>
                                                <td>David Lee</td>
                                                <td>Wound Care</td>
                                                <td>Nov 5, 2023, 2:00 PM</td>
                                                <td><span class="badge bg-secondary">Cancelled by Patient</span></td>
                                                <td>Nov 4, 2023</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-secondary">Details</button>
                                                </td>
                                            </tr>

                                            <!-- Expired -->
                                            <tr data-status="expired">
                                                <td>#REQ-1008</td>
                                                <td>Emma Davis</td>
                                                <td>Medication Admin</td>
                                                <td>Oct 28, 2023, 9:00 AM</td>
                                                <td><span class="badge bg-dark">Expired</span></td>
                                                <td>Oct 27, 2023</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-dark">Recreate</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>