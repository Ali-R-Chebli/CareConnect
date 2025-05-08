<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Nursing - Nurse Portal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- link with nurse.css -->
    <link rel="stylesheet" href="nurse.css">

    
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #1cc88a;
            --info-color: #36b9cc;
            --warning-color: #f6c23e;
            --danger-color: #e74a3b;
            --light-color: #f8f9fc;
            --dark-color: #5a5c69;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fb;
        }
        
        .sidebar {
            background: linear-gradient(180deg, var(--primary-color) 0%, #224abe 100%);
            min-height: 100vh;
        }
        
        .card {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            margin-bottom: 1.5rem;
        }
        
        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            padding: 1rem 1.35rem;
            font-weight: 600;
            border-radius: 0.5rem 0.5rem 0 0 !important;
        }
        
        .summary-card {
            border-left: 0.25rem solid;
            transition: transform 0.3s ease;
        }
        
        .summary-card:hover {
            transform: translateY(-5px);
        }
        
        .border-left-primary {
            border-left-color: var(--primary-color);
        }
        
        .border-left-success {
            border-left-color: var(--secondary-color);
        }
        
        .border-left-info {
            border-left-color: var(--info-color);
        }
        
        .border-left-warning {
            border-left-color: var(--warning-color);
        }
        
        .timeline {
            position: relative;
            padding-left: 1rem;
        }
        
        .timeline-item {
            position: relative;
            padding-bottom: 1.5rem;
            padding-left: 1.5rem;
        }
        
        .timeline-item:last-child {
            padding-bottom: 0;
        }
        
        .timeline-item-marker {
            position: absolute;
            left: -0.5rem;
            top: 0;
        }
        
        .timeline-item-marker-indicator {
            display: block;
            width: 1rem;
            height: 1rem;
            border-radius: 100%;
            border: 3px solid #fff;
            position: relative;
        }
        
        .chart-container {
            position: relative;
            height: 300px;
        }
        
        .progress-sm {
            height: 0.5rem;
        }
        
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .badge-pill {
            border-radius: 10rem;
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php include "sidebar.php" ?>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <!-- Tab Content -->
                <div class="tab-content">
                    <!-- Dashboard Tab -->
                    <div class="tab-pane fade show active" id="dashboard">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <h2 class="h4 fw-bold">Dashboard Overview</h2>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group me-2">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-download fa-sm"></i> Export
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-print fa-sm"></i> Print
                                    </button>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                        <i class="fas fa-calendar"></i> This week
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Week</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Summary Cards -->
                        <div class="row mb-4">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card summary-card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Number of Visits</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">24</div>
                                                <div class="mt-2">
                                                    <span class="text-success text-sm font-weight-bolder">
                                                        <i class="fas fa-arrow-up"></i> 12%
                                                    </span>
                                                    <span class="text-muted text-sm">vs last week</span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user-nurse fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card summary-card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Hours Worked</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">38.5</div>
                                                <div class="mt-2">
                                                    <span class="text-success text-sm font-weight-bolder">
                                                        <i class="fas fa-arrow-up"></i> 5.2%
                                                    </span>
                                                    <span class="text-muted text-sm">vs last week</span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clock fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card summary-card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    This Month's Earnings</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">$1,850</div>
                                                <div class="mt-2">
                                                    <span class="text-success text-sm font-weight-bolder">
                                                        <i class="fas fa-arrow-up"></i> 8.4%
                                                    </span>
                                                    <span class="text-muted text-sm">vs last month</span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card summary-card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Patient Satisfaction</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">94%</div>
                                                <div class="mt-2 mb-1">
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 94%" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-star fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Charts Row -->
                        <div class="row mb-4">
                            <div class="col-lg-8">
                                <div class="card shadow mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h6 class="m-0 fw-bold text-primary">Weekly Visits & Hours</h6>
                                        <div class="dropdown no-arrow">
                                            <button class="btn btn-link btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end shadow">
                                                <li><a class="dropdown-item" href="#">This Week</a></li>
                                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                                <li><a class="dropdown-item" href="#">This Year</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Export Data</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-container">
                                            <canvas id="visitsHoursChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h6 class="m-0 fw-bold text-primary">Service Distribution</h6>
                                        <div class="dropdown no-arrow">
                                            <button class="btn btn-link btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end shadow">
                                                <li><a class="dropdown-item" href="#">This Week</a></li>
                                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                                <li><a class="dropdown-item" href="#">This Year</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-container">
                                            <canvas id="serviceDistributionChart"></canvas>
                                        </div>
                                        <div class="mt-4 text-center small">
                                            <span class="me-2">
                                                <i class="fas fa-circle text-primary"></i> Wound Care
                                            </span>
                                            <span class="me-2">
                                                <i class="fas fa-circle text-success"></i> Medication
                                            </span>
                                            <span class="me-2">
                                                <i class="fas fa-circle text-info"></i> Therapy
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Activity Row -->
                        



                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php include "logoutmodal.php" ?>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom JS -->
    <script>
        // Visits and Hours Chart
        const visitsHoursCtx = document.getElementById('visitsHoursChart').getContext('2d');
        const visitsHoursChart = new Chart(visitsHoursCtx, {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [
                    {
                        label: 'Number of Visits',
                        data: [3, 5, 4, 6, 4, 2, 0],
                        backgroundColor: 'rgba(78, 115, 223, 0.8)',
                        borderColor: 'rgba(78, 115, 223, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Hours Worked',
                        data: [5.5, 7, 6, 8, 6, 3, 0],
                        backgroundColor: 'rgba(28, 200, 138, 0.8)',
                        borderColor: 'rgba(28, 200, 138, 1)',
                        borderWidth: 1,
                        type: 'line',
                        tension: 0.3,
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            callback: function(value) {
                                return Number.isInteger(value) ? value : value.toFixed(1);
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                        align: 'end'
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                }
            }
        });

        // Service Distribution Chart
        const serviceDistributionCtx = document.getElementById('serviceDistributionChart').getContext('2d');
        const serviceDistributionChart = new Chart(serviceDistributionCtx, {
            type: 'doughnut',
            data: {
                labels: ['Wound Care', 'Medication', 'Therapy', 'Other'],
                datasets: [{
                    data: [35, 30, 25, 10],
                    backgroundColor: [
                        'rgba(78, 115, 223, 0.8)',
                        'rgba(28, 200, 138, 0.8)',
                        'rgba(54, 185, 204, 0.8)',
                        'rgba(246, 194, 62, 0.8)'
                    ],
                    hoverBackgroundColor: [
                        'rgba(78, 115, 223, 1)',
                        'rgba(28, 200, 138, 1)',
                        'rgba(54, 185, 204, 1)',
                        'rgba(246, 194, 62, 1)'
                    ],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                cutout: '70%',
            },
        });
    </script>
</body>
</html>