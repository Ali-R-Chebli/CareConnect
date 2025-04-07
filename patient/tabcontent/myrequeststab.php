<div class="tab-pane fade" id="my-requests">
                        <h2 class="h4 mb-4 fw-bold">My Service Requests</h2>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 fw-bold text-primary">All Requests</h6>
                                <div class="dropdown no-arrow">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                        Filter by Status
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#">All</a></li>
                                        <li><a class="dropdown-item" href="#">Pending</a></li>
                                        <li><a class="dropdown-item" href="#">Confirmed</a></li>
                                        <li><a class="dropdown-item" href="#">Completed</a></li>
                                        <li><a class="dropdown-item" href="#">Cancelled</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Request ID</th>
                                                <th>Service Type</th>
                                                <th>Date/Time</th>
                                                <th>Nurse</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#HN-2023-001</td>
                                                <td>Wound Care</td>
                                                <td>Tomorrow, 10:00 AM</td>
                                                <td>Sarah Johnson</td>
                                                <td><span class="badge bg-success">Confirmed</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Details</button>
                                                    <button class="btn btn-sm btn-outline-danger">Cancel</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#HN-2023-002</td>
                                                <td>Medication Admin</td>
                                                <td>Friday, 2:00 PM</td>
                                                <td>Michael Brown</td>
                                                <td><span class="badge bg-warning">Pending</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Details</button>
                                                    <button class="btn btn-sm btn-outline-danger">Cancel</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#HN-2023-003</td>
                                                <td>Physical Therapy</td>
                                                <td>Nov 15, 9:00 AM</td>
                                                <td>David Wilson</td>
                                                <td><span class="badge bg-secondary">Completed</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Details</button>
                                                    <button class="btn btn-sm btn-outline-success">Rate</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>