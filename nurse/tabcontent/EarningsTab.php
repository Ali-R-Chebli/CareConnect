<div class="tab-pane fade" id="earnings">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <h2 class="h4 fw-bold">Earnings</h2>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group me-2">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">This Month</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Last Month</button>
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                                    <i class="fas fa-calendar"></i> Custom Range
                                </button>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-8">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 fw-bold text-primary">Earnings Overview</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="earningsChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 fw-bold text-primary">Earnings Summary</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span>This Month</span>
                                                <strong>$1,250</strong>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 65%"></div>
                                            </div>
                                            <small class="text-muted">65% of your $2,000 goal</small>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span>Last Month</span>
                                                <strong>$1,850</strong>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 92%"></div>
                                            </div>
                                            <small class="text-muted">92% of your $2,000 goal</small>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span>Total Earnings</span>
                                                <strong>$8,450</strong>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 100%"></div>
                                            </div>
                                            <small class="text-muted">Since you joined 6 months ago</small>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button class="btn btn-primary">Request Payout</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 fw-bold text-primary">Recent Transactions</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Date</th>
                                                <th>Service</th>
                                                <th>Patient</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Nov 10, 2023</td>
                                                <td>Wound Care</td>
                                                <td>John Patient</td>
                                                <td>$85.00</td>
                                                <td><span class="badge bg-success">Paid</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Details</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Invoice</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nov 8, 2023</td>
                                                <td>Medication Admin</td>
                                                <td>Mary Smith</td>
                                                <td>$65.00</td>
                                                <td><span class="badge bg-success">Paid</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Details</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Invoice</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nov 5, 2023</td>
                                                <td>Physical Therapy</td>
                                                <td>Robert Johnson</td>
                                                <td>$95.00</td>
                                                <td><span class="badge bg-warning">Pending</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Details</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Invoice</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nov 2, 2023</td>
                                                <td>Wound Care</td>
                                                <td>Sarah Wilson</td>
                                                <td>$85.00</td>
                                                <td><span class="badge bg-success">Paid</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Details</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Invoice</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oct 28, 2023</td>
                                                <td>Medication Admin</td>
                                                <td>Michael Brown</td>
                                                <td>$65.00</td>
                                                <td><span class="badge bg-success">Paid</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Details</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Invoice</button>
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