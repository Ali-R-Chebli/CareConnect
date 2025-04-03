<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Nursing - Patient Portal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #4e73df;
            --secondary: #858796;
            --success: #1cc88a;
            --info: #36b9cc;
            --warning: #f6c23e;
            --danger: #e74a3b;
            --light: #f8f9fc;
            --dark: #5a5c69;
        }

        body {
            background-color: #f8f9fc;
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        .sidebar {
            background: linear-gradient(180deg, var(--primary) 10%, #224abe 100%);
            min-height: 100vh;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 600;
            padding: 0.75rem 1rem;
            margin-bottom: 0.2rem;
        }

        .sidebar .nav-link.active {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sidebar .nav-link:hover {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sidebar .nav-link i {
            margin-right: 0.25rem;
        }

        .card {
            border: none;
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .service-card {
            transition: transform 0.3s;
            cursor: pointer;
        }

        .service-card:hover {
            transform: translateY(-5px);
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
        }

        .chat-message {
            max-width: 70%;
            border-radius: 1rem;
            padding: 0.75rem 1rem;
            margin-bottom: 0.5rem;
        }

        .chat-message-in {
            background-color: #f8f9fa;
        }

        .chat-message-out {
            background-color: var(--primary);
            color: white;
            margin-left: auto;
        }

        .rating-star {
            color: #ddd;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .rating-star.active {
            color: var(--warning);
        }

        .step {
            transition: all 0.3s ease;
        }

        .nurse-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .nurse-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container-fluid">



        <div class="row">
            <!-- Sidebar -->

            <div class="col-md-3 col-lg-2 d-md-block sidebar bg-primary collapse" id="sidebarMenu">
                <div class="position-sticky pt-3">
                    <div class="text-center mb-4">
                        <h4 class="text-white">Home Nursing</h4>
                        <p class="text-white-50 small">Patient Portal</p>
                    </div>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#request-service" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-plus-circle"></i>
                                Request Service
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#my-requests" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-list"></i>
                                My Requests
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#nurses-available" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-user-nurse"></i>
                                Nurses Available
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#messages" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-comments"></i>
                                Messages
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#notifications" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-bell"></i>
                                Notifications
                                <span class="d-inline-block rounded-circle bg-danger ms-3" style="width:10px; height:10px;"></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="#profile" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-user"></i>
                                My Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#reports" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-flag"></i>
                                Report Issues
                            </a>
                        </li>
                        <!-- Only addition: Logout button as list item -->
                        <li class="nav-item mt-auto">
                            <a class="nav-link" href="#" id="logoutBtn">
                                <i class="fas fa-fw fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- for the sidebar -->

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">

                <!-- Tab Content -->
                <div class="tab-content">
                    <!-- Profile Tab 2  -->

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

                    <script>
                        // Image Upload Functionality
                        document.getElementById('profileImageUpload').addEventListener('change', function(e) {
                            const file = e.target.files[0];
                            const preview = document.getElementById('profileImagePreview');
                            const errorElement = document.getElementById('uploadError');

                            errorElement.style.display = 'none';

                            if (!file) return;

                            if (file.size > 5 * 1024 * 1024) {
                                errorElement.textContent = 'File is too large (max 5MB)';
                                errorElement.style.display = 'block';
                                return;
                            }

                            if (!['image/jpeg', 'image/png'].includes(file.type)) {
                                errorElement.textContent = 'Only JPG/PNG files allowed';
                                errorElement.style.display = 'block';
                                return;
                            }

                            const reader = new FileReader();
                            reader.onload = function(e) {
                                preview.src = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        });

                        // Edit Profile Toggle Functionality
                        const editProfileBtn = document.getElementById('editProfileBtn');
                        const cancelEditBtn = document.getElementById('cancelEditBtn');
                        const viewMode = document.getElementById('viewMode');
                        const editMode = document.getElementById('editMode');

                        let isEditMode = false;

                        function toggleEditMode() {
                            isEditMode = !isEditMode;

                            if (isEditMode) {
                                viewMode.style.display = 'none';
                                editMode.style.display = 'block';
                                editProfileBtn.textContent = 'View Profile';

                                // Transfer current values to edit fields
                                document.getElementById('editFirstName').value = document.getElementById('viewFirstName').textContent;
                                document.getElementById('editLastName').value = document.getElementById('viewLastName').textContent;
                                document.getElementById('editEmail').value = document.getElementById('viewEmail').textContent;
                                document.getElementById('editPhone').value = document.getElementById('viewPhone').textContent;
                                document.getElementById('editAddress').value = document.getElementById('viewAddress').textContent.replace(/<br>/g, '\n');
                                document.getElementById('editMedicalHistory').value = document.getElementById('viewMedicalHistory').textContent.replace(/<br>/g, '\n');
                            } else {
                                viewMode.style.display = 'block';
                                editMode.style.display = 'none';
                                editProfileBtn.textContent = 'Edit Profile';
                            }
                        }

                        editProfileBtn.addEventListener('click', toggleEditMode);
                        cancelEditBtn.addEventListener('click', toggleEditMode);

                        // Form Submission
                        document.getElementById('profileForm').addEventListener('submit', function(e) {
                            e.preventDefault();

                            if (isEditMode) {
                                // Update view mode with edited values
                                document.getElementById('viewFirstName').textContent = document.getElementById('editFirstName').value;
                                document.getElementById('viewLastName').textContent = document.getElementById('editLastName').value;
                                document.getElementById('viewEmail').textContent = document.getElementById('editEmail').value;
                                document.getElementById('viewPhone').textContent = document.getElementById('editPhone').value;
                                document.getElementById('viewAddress').innerHTML = document.getElementById('editAddress').value.replace(/\n/g, '<br>');
                                document.getElementById('viewMedicalHistory').innerHTML = document.getElementById('editMedicalHistory').value.replace(/\n/g, '<br>');

                                // Here you would typically send the data to your server
                                // const formData = {
                                //     firstName: document.getElementById('editFirstName').value,
                                //     lastName: document.getElementById('editLastName').value,
                                //     email: document.getElementById('editEmail').value,
                                //     phone: document.getElementById('editPhone').value,
                                //     address: document.getElementById('editAddress').value,
                                //     medicalHistory: document.getElementById('editMedicalHistory').value
                                // };
                                // console.log('Data to be saved:', formData);

                                toggleEditMode();
                            }
                        });
                    </script>


                    <!-- Profile Tab 2  -->


                    <!-- Request Service Tab -->
                    <div class="tab-pane fade show active" id="request-service">
                        <h2 class="h4 mb-4 fw-bold">Request Nursing Service</h2>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 fw-bold text-primary">Service Details</h6>
                                    </div>
                                    <div class="card-body">
                                        <form id="serviceRequestForm">
                                            <!-- Step 1: Basic Information -->
                                            <div class="step" id="step1">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Service Type</label>
                                                    <select class="form-select" required>
                                                        <option value="">Select a service</option>
                                                        <option>Wound Care</option>
                                                        <option>Medication Administration</option>
                                                        <option>Physical Therapy</option>
                                                    </select>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold">Preferred Date</label>
                                                        <input type="date" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold">Preferred Time</label>
                                                        <input type="time" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="text-end">
                                                    <button type="button" class="btn btn-primary next-step">Next</button>
                                                </div>
                                            </div>

                                            <!-- Step 2: Patient Details -->
                                            <div class="step" id="step2" style="display:none;">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Patient Gender</label>
                                                    <select class="form-select" required>
                                                        <option value="">Select gender</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                        <option>Other</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Type of Care Needed</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="wasteManagement">
                                                        <label class="form-check-label" for="wasteManagement">Waste Management</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="mobilityAssistance">
                                                        <label class="form-check-label" for="mobilityAssistance">Mobility Assistance</label>
                                                    </div>
                                                </div>

                                                <div class="text-end">
                                                    <button type="button" class="btn btn-secondary me-2 prev-step">Back</button>
                                                    <button type="button" class="btn btn-primary next-step">Next</button>
                                                </div>
                                            </div>

                                            <!-- Step 3: Address & Final Details -->
                                            <div class="step" id="step3" style="display:none;">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Address for Service</label>
                                                    <textarea class="form-control" id="serviceAddress" rows="2" required></textarea>
                                                    <button type="button" class="btn btn-sm btn-outline-primary mt-2 fw-bold" id="detectAddressBtn">
                                                        <i class="fas fa-location-arrow me-1"></i> Use My Current Location
                                                    </button>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Special Instructions</label>
                                                    <textarea class="form-control" rows="3" placeholder="Any special requirements..."></textarea>
                                                </div>

                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" class="form-check-input" id="urgentCheck">
                                                    <label class="form-check-label fw-bold" for="urgentCheck">Urgent Request</label>
                                                </div>

                                                <div class="text-end">
                                                    <button type="button" class="btn btn-secondary me-2 prev-step">Back</button>
                                                    <button type="submit" class="btn btn-success">Submit Request</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- My Requests Tab -->
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

                    <!-- Nurses Available Tab -->
                    <div class="tab-pane fade" id="nurses-available">
                        <h2 class="h4 mb-4 fw-bold">Available Nurses</h2>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                        <h6 class="m-0 fw-bold text-primary">Currently Available Nurses</h6>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                                id="filterDropdown" data-bs-toggle="dropdown">
                                                Filter by Specialty
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#">All Specialties</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Wound Care</a></li>
                                                <li><a class="dropdown-item" href="#">Medication Administration</a></li>
                                                <li><a class="dropdown-item" href="#">Physical Therapy</a></li>
                                                <li><a class="dropdown-item" href="#">Elderly Care</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- Nurse Card 1 -->
                                            <div class="col-md-4 mb-4">
                                                <div class="card h-100 border-start border-primary border-4"  data-nurse-id="1">
                                                    <div class="card-body text-center">
                                                        <img src="https://randomuser.me/api/portraits/women/44.jpg"
                                                            class="rounded-circle mb-3" width="100" alt="Nurse">
                                                        <h5 class="card-title">Sarah Johnson</h5>
                                                        
                                                        <p class="text-muted small">Wound Care Specialist</p>
                                                        <div class="mb-3">
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star-half-alt text-warning"></i>
                                                            <span class="small text-muted ms-1">4.5 (28)</span>
                                                        </div>
                                                        <div class="d-grid gap-2">
                                                            <button class="btn btn-sm btn-outline-primary view-profile-btn">View Profile</button>
                                                            <button class="btn btn-sm btn-primary">Request Service</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Nurse Card 2 -->
                                            <div class="col-md-4 mb-4">
                                                <div class="card h-100 border-start border-success border-4"  data-nurse-id="2">
                                                    <div class="card-body text-center">
                                                        <img src="https://randomuser.me/api/portraits/men/32.jpg"
                                                            class="rounded-circle mb-3" width="100" alt="Nurse">
                                                        <h5 class="card-title">Michael Brown</h5>
                                                        <p class="text-muted small">Medication Specialist</p>
                                                        <div class="mb-3">
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="far fa-star text-warning"></i>
                                                            <span class="small text-muted ms-1">4.0 (15)</span>
                                                        </div>
                                                        <div class="d-grid gap-2">
                                                            <button class="btn btn-sm btn-outline-primary view-profile-btn">View Profile</button>
                                                            <button class="btn btn-sm btn-primary">Request Service</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Nurse Card 3 -->
                                            <div class="col-md-4 mb-4">
                                                <div class="card h-100 border-start border-info border-4"  data-nurse-id="3">
                                                    <div class="card-body text-center">
                                                        <img src="https://randomuser.me/api/portraits/men/75.jpg"
                                                            class="rounded-circle mb-3" width="100" alt="Nurse">
                                                        <h5 class="card-title">David Wilson</h5>
                                                        <p class="text-muted small">Physical Therapist</p>
                                                        <div class="mb-3">
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <span class="small text-muted ms-1">5.0 (42)</span>
                                                        </div>
                                                        <div class="d-grid gap-2">
                                                            <button class="btn btn-sm btn-outline-primary view-profile-btn">View Profile</button>
                                                            <button class="btn btn-sm btn-primary">Request Service</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center mt-3">
                                            <button class="btn btn-outline-primary">Load More Nurses</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Messages Tab -->
                    <div class="tab-pane fade" id="messages">
                        <h2 class="h4 mb-4 fw-bold">Messages</h2>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="card shadow">
                                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                        <h6 class="m-0 fw-bold text-primary">Conversations</h6>
                                        <button class="btn btn-sm btn-primary">New Message</button>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="list-group list-group-flush">
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-3">SJ</div>
                                                    <div>
                                                        <h6 class="mb-0">Sarah Johnson</h6>
                                                        <small class="text-white-50">Wound Care - Tomorrow</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-3">MB</div>
                                                    <div>
                                                        <h6 class="mb-0">Michael Brown</h6>
                                                        <small class="text-muted">Medication Admin - Friday</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-3">DW</div>
                                                    <div>
                                                        <h6 class="mb-0">David Wilson</h6>
                                                        <small class="text-muted">Physical Therapy - Nov 15</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card shadow h-100">
                                    <div class="card-header py-3 d-flex align-items-center">
                                        <div class="avatar me-3">SJ</div>
                                        <div>
                                            <h6 class="m-0 fw-bold">Sarah Johnson</h6>
                                            <small class="text-muted">Wound Care Specialist</small>
                                        </div>
                                    </div>
                                    <div class="card-body chat-container" style="height: 400px; overflow-y: auto;">
                                        <div class="chat-message chat-message-in">
                                            <div class="message-text">Hello John, I'm confirming our appointment for tomorrow at 10 AM.</div>
                                            <div class="message-time small text-muted">Today, 9:30 AM</div>
                                        </div>

                                        <div class="chat-message chat-message-out">
                                            <div class="message-text">Hi Sarah, yes that works for me. I'll make sure to have all the supplies ready.</div>
                                            <div class="message-time small text-white-50">Today, 9:35 AM</div>
                                        </div>

                                        <div class="chat-message chat-message-in">
                                            <div class="message-text">Great! Could you please send me a list of the supplies you currently have? I'll bring anything that's missing.</div>
                                            <div class="message-time small text-muted">Today, 9:37 AM</div>
                                        </div>

                                        <div class="chat-message chat-message-out">
                                            <div class="message-text">Sure, I have gauze pads, medical tape, and saline solution. The wound is on my left leg, about 2 inches long.</div>
                                            <div class="message-time small text-white-50">Today, 9:40 AM</div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Type your message...">
                                            <button class="btn btn-primary" type="button">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notifications Tab -->
                    <div class="tab-pane fade" id="notifications">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <h2 class="h4 fw-bold">Notifications</h2>
                            <button class="btn btn-sm btn-outline-secondary">Mark all as read</button>
                        </div>

                        <div class="card shadow">
                            <div class="card-body p-0">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3 text-primary">
                                                <i class="fas fa-calendar-check fa-2x"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-1">Appointment Confirmed</h6>
                                                    <small class="text-muted">1 hour ago</small>
                                                </div>
                                                <p class="mb-0 small">Your wound care appointment with Sarah Johnson has been confirmed for tomorrow at 10:00 AM.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3 text-success">
                                                <i class="fas fa-check-circle fa-2x"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-1">Service Completed</h6>
                                                    <small class="text-muted">2 days ago</small>
                                                </div>
                                                <p class="mb-0 small">Your physical therapy session with David Wilson has been completed. Please rate your experience.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3 text-info">
                                                <i class="fas fa-comment fa-2x"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-1">New Message</h6>
                                                    <small class="text-muted">3 days ago</small>
                                                </div>
                                                <p class="mb-0 small">You have a new message from Michael Brown about your upcoming medication administration.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3 text-warning">
                                                <i class="fas fa-exclamation-triangle fa-2x"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-1">Payment Reminder</h6>
                                                    <small class="text-muted">1 week ago</small>
                                                </div>
                                                <p class="mb-0 small">Your recent service invoice is due. Please make payment at your earliest convenience.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3 text-secondary">
                                                <i class="fas fa-bell fa-2x"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-1">System Notification</h6>
                                                    <small class="text-muted">2 weeks ago</small>
                                                </div>
                                                <p class="mb-0 small">We've updated our privacy policy. Please review the changes at your convenience.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Report Issues Tab -->
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
                </div>
            </main>
        </div>




    </div>

    <!-- Nurse Profile Modal -->
<div class="modal fade" id="nurseProfileModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nurseProfileModalLabel">Nurse Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <!-- Left Column -->
          <div class="col-md-4 text-center">
            <img id="nurseProfilePhoto" src="" class="rounded-circle mb-3" width="150" alt="Nurse Photo">
            <h4 id="nurseProfileName"></h4>
            <p class="text-muted" id="nurseProfileSpecialty"></p>
            
            <div class="mb-3">
              <div id="nurseProfileRating"></div>
              <small class="text-muted" id="nurseReviewCount"></small>
            </div>
            
            <div class="card mb-3">
              <div class="card-body">
                <h6 class="card-title">Quick Stats</h6>
                <div class="d-flex justify-content-between small">
                  <span>Requests:</span>
                  <strong id="nurseTotalRequests">0</strong>
                </div>
                <div class="d-flex justify-content-between small">
                  <span>Experience:</span>
                  <strong id="nurseExperience">0 years</strong>
                </div>
                <div class="d-flex justify-content-between small">
                  <span>Response Time:</span>
                  <strong id="nurseResponseTime">-</strong>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Right Column -->
          <div class="col-md-8">
            <ul class="nav nav-tabs" id="nurseProfileTabs">
              <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#nurseDetails">Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#nurseSchedule">Schedule</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#nurseCertifications">Certifications</a>
              </li>
            </ul>
            
            <div class="tab-content p-3 border border-top-0 rounded-bottom">
              <!-- Details Tab -->
              <div class="tab-pane fade show active" id="nurseDetails">
                <div class="row">
                  <div class="col-sm-6">
                    <p><strong>Age:</strong> <span id="nurseAge">-</span></p>
                    <p><strong>Gender:</strong> <span id="nurseGender">-</span></p>
                    <p><strong>Languages:</strong> <span id="nurseLanguages">English</span></p>
                  </div>
                  <div class="col-sm-6">
                    <p><strong>Location:</strong> <span id="nurseLocation">-</span></p>
                    <p><strong>Hourly Rate:</strong> <span id="nurseRate">-</span></p>
                    <p><strong>Last Active:</strong> <span id="nurseLastActive">-</span></p>
                  </div>
                </div>
                <hr>
                <h6>About</h6>
                <p id="nurseBio">No bio available.</p>
              </div>
              
              <!-- Schedule Tab -->
              <div class="tab-pane fade" id="nurseSchedule">
                <div class="alert alert-info small">
                  <i class="fas fa-info-circle me-2"></i> 
                  Green indicates available time slots
                </div>
                <div id="nurseAvailabilityCalendar"></div>
                <div class="mt-3">
                  <h6>Typical Availability</h6>
                  <ul id="nurseGeneralAvailability"></ul>
                </div>
              </div>
              
              <!-- Certifications Tab -->
              <div class="tab-pane fade" id="nurseCertifications">
                <div class="row" id="nurseCertificationsList">
                  <!-- Will be filled dynamically -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="requestThisNurseBtn">Request This Nurse</button>
      </div>
    </div>
  </div>
</div>

    <!-- Rating Modal -->
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

    <!-- modal for log out -->
    <div class="modal fade" id="logoutConfirmModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>
                    <h3>Are you sure you want to logout ?</h3>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="logout.php" class="btn btn-danger">Yes, Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Enable tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        // Rating stars interaction
        document.querySelectorAll('.rating-star').forEach(star => {
            star.addEventListener('click', function() {
                const rating = parseInt(this.getAttribute('data-rating'));
                document.getElementById('ratingValue').value = rating;

                // Update star display
                document.querySelectorAll('.rating-star').forEach((s, index) => {
                    if (index < rating) {
                        s.classList.add('active');
                    } else {
                        s.classList.remove('active');
                    }
                });
            });

            star.addEventListener('mouseover', function() {
                const rating = parseInt(this.getAttribute('data-rating'));

                document.querySelectorAll('.rating-star').forEach((s, index) => {
                    if (index < rating) {
                        s.classList.add('hover');
                    } else {
                        s.classList.remove('hover');
                    }
                });
            });

            star.addEventListener('mouseout', function() {
                document.querySelectorAll('.rating-star').forEach(s => {
                    s.classList.remove('hover');
                });
            });
        });

        // Edit profile button
        document.getElementById('editProfileBtn').addEventListener('click', function() {
            const form = document.getElementById('profileForm');
            const inputs = form.querySelectorAll('input[readonly], textarea[readonly]');
            const actions = document.getElementById('profileFormActions');

            inputs.forEach(input => {
                input.removeAttribute('readonly');
            });

            actions.classList.remove('d-none');
        });

        // Form submissions
        document.getElementById('serviceRequestForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Service request submitted successfully!');
            // In a real app, you would send this to your PHP backend
        });

        document.getElementById('reportForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Issue report submitted successfully! Our team will review it shortly.');
            // In a real app, you would send this to your PHP backend
        });

        document.getElementById('ratingForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const rating = document.getElementById('ratingValue').value;
            if (rating === '0') {
                alert('Please select a rating');
                return;
            }
            alert('Thank you for your rating!');
            // In a real app, you would send this to your PHP backend
            bootstrap.Modal.getInstance(document.getElementById('ratingModal')).hide();
        });

        // Simulate clicking on rating modal when "Rate" button is clicked in requests table
        document.querySelectorAll('.btn-outline-success').forEach(btn => {
            if (btn.textContent.trim() === 'Rate') {
                btn.addEventListener('click', function() {
                    const ratingModal = new bootstrap.Modal(document.getElementById('ratingModal'));
                    ratingModal.show();
                });
            }
        });

        // for the log out
        document.getElementById('logoutBtn').addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default link behavior
            var logoutModal = new bootstrap.Modal(document.getElementById('logoutConfirmModal'));
            logoutModal.show();
        });

        document.getElementById('detectAddressBtn').addEventListener('click', function() {
            const addressField = document.getElementById('serviceAddress');

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    async function(position) {
                            try {
                                // Reverse geocoding using Nominatim (OpenStreetMap)
                                const response = await fetch(
                                    `https://nominatim.openstreetmap.org/reverse?format=json&lat=${position.coords.latitude}&lon=${position.coords.longitude}`
                                );
                                const data = await response.json();

                                if (data.address) {
                                    const address = [
                                        data.address.road,
                                        data.address.house_number,
                                        data.address.city || data.address.town,
                                        data.address.state,
                                        data.address.postcode
                                    ].filter(Boolean).join(', ');

                                    addressField.value = address;
                                } else {
                                    throw new Error('Address not found');
                                }
                            } catch (error) {
                                addressField.classList.add('is-invalid');
                                console.error("Geocoding error:", error);
                            }
                        },
                        function(error) {
                            addressField.classList.add('is-invalid');
                            console.error("Geolocation error:", error.message);
                        }
                );
            } else {
                addressField.classList.add('is-invalid');
                console.error("Geolocation not supported");
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Next step functionality
            document.querySelectorAll('.next-step').forEach(button => {
                button.addEventListener('click', function() {
                    const currentStep = this.closest('.step');
                    const nextStep = currentStep.nextElementSibling;

                    currentStep.style.display = 'none';
                    nextStep.style.display = 'block';
                });
            });

            // Previous step functionality
            document.querySelectorAll('.prev-step').forEach(button => {
                button.addEventListener('click', function() {
                    const currentStep = this.closest('.step');
                    const prevStep = currentStep.previousElementSibling;

                    currentStep.style.display = 'none';
                    prevStep.style.display = 'block';
                });
            });

            // Your existing address detection code
            document.getElementById('detectAddressBtn').addEventListener('click', function() {
                // Your geolocation code here
            });
        });


        document.getElementById('profileImageUpload').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('profileImagePreview');
            const errorElement = document.getElementById('uploadError');

            // Reset error message
            errorElement.style.display = 'none';

            // Validate file
            if (!file) return;

            if (file.size > 5 * 1024 * 1024) { // 5MB limit
                errorElement.textContent = 'File is too large (max 5MB)';
                errorElement.style.display = 'block';
                return;
            }

            if (!['image/jpeg', 'image/png'].includes(file.type)) {
                errorElement.textContent = 'Only JPG/PNG files allowed';
                errorElement.style.display = 'block';
                return;
            }

            // Preview image
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;

                // Here you would typically upload the image to your server
                // uploadImageToServer(file);
            };
            reader.readAsDataURL(file);
        });

        // This function would handle the actual upload to your server
        function uploadImageToServer(file) {
            const formData = new FormData();
            formData.append('profileImage', file);

            // Example using fetch API
            fetch('/upload-profile-image', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Upload successful:', data);
                    // Handle successful upload (e.g., show success message)
                })
                .catch(error => {
                    console.error('Upload error:', error);
                    // Handle upload error
                });
        }



        // Add this to your existing script section
document.querySelectorAll('.view-profile-btn').forEach(btn => {
  btn.addEventListener('click', function() {
    const card = this.closest('.card');
    const nurseData = {
      id: card.dataset.nurseId,
      name: card.querySelector('.card-title').textContent,
      specialty: card.querySelector('.text-muted').textContent,
      photo: card.querySelector('img').src,
      rating: 4.5, // Would normally come from data attributes
      reviews: 28,
      // Add more data points as needed
    };
    
    // Populate the modal
    populateNurseProfile(nurseData);
    
    // Show the modal
    new bootstrap.Modal(document.getElementById('nurseProfileModal')).show();
  });
});

function populateNurseProfile(data) {
  // Basic Info
  document.getElementById('nurseProfileName').textContent = data.name;
  document.getElementById('nurseProfileSpecialty').textContent = data.specialty;
  document.getElementById('nurseProfilePhoto').src = data.photo;
  
  // Ratings
  const ratingContainer = document.getElementById('nurseProfileRating');
  ratingContainer.innerHTML = '';
  for (let i = 1; i <= 5; i++) {
    const star = document.createElement('i');
    star.className = `fas fa-star ${i <= Math.floor(data.rating) ? 'text-warning' : 
                      (i === Math.ceil(data.rating) && data.rating % 1 > 0 ? 'fa-star-half-alt text-warning' : 'far fa-star text-warning')}`;
    ratingContainer.appendChild(star);
  }
  document.getElementById('nurseReviewCount').textContent = `(${data.reviews} reviews)`;
  
  // Sample data - in real app you'd fetch this from an API
  document.getElementById('nurseTotalRequests').textContent = '142';
  document.getElementById('nurseExperience').textContent = '8 years';
  document.getElementById('nurseResponseTime').textContent = 'Within 1 hour';
  document.getElementById('nurseAge').textContent = '34';
  document.getElementById('nurseGender').textContent = 'Female';
  document.getElementById('nurseLanguages').textContent = 'English, Spanish';
  document.getElementById('nurseLocation').textContent = 'Within 5 miles of you';
  document.getElementById('nurseRate').textContent = '$45/hour';
  document.getElementById('nurseLastActive').textContent = 'Active today';
  document.getElementById('nurseBio').textContent = 
    'Certified wound care specialist with 8 years of hospital experience. Specializing in post-surgical care and diabetic wound management.';
  
  // Certifications
  const certsContainer = document.getElementById('nurseCertificationsList');
  certsContainer.innerHTML = '';
  const certifications = [
    { name: 'RN License', date: '2015', issuer: 'State Board' },
    { name: 'Wound Care Certification', date: '2018', issuer: 'WOCNCB' },
    { name: 'CPR/BLS', date: '2023', issuer: 'American Heart Association' }
  ];
  
  certifications.forEach(cert => {
    const col = document.createElement('div');
    col.className = 'col-md-6 mb-3';
    col.innerHTML = `
      <div class="card h-100">
        <div class="card-body">
          <h6 class="card-title">${cert.name}</h6>
          <p class="small mb-1">Issued: ${cert.date}</p>
          <p class="small text-muted">${cert.issuer}</p>
        </div>
      </div>
    `;
    certsContainer.appendChild(col);
  });
  
  // Schedule - simple example
  const availabilityList = document.getElementById('nurseGeneralAvailability');
  availabilityList.innerHTML = '';
  ['Monday-Friday: 9am-5pm', 'Saturday: 10am-2pm', 'Sunday: Not available'].forEach(time => {
    const li = document.createElement('li');
    li.textContent = time;
    availabilityList.appendChild(li);
  });
  
  // Connect request button
  document.getElementById('requestThisNurseBtn').onclick = function() {
    // You could pre-fill the request form with this nurse's ID
    bootstrap.Modal.getInstance(document.getElementById('nurseProfileModal')).hide();
    // Optionally open the request form tab
    document.querySelector('[href="#request-service"]').click();
  };
}
    </script>
</body>

</html>