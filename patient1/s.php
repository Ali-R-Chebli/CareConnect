<?php
require '../connect.php';

// Fetch patient address based on patient_id (hardcoded as 1)
$patient_id = 1;
$sql_patient_address = "SELECT a.AddressID, a.City, a.Street, a.Building
                       FROM address a
                       INNER JOIN user u ON u.AddressID = a.AddressID
                       INNER JOIN patient p ON p.UserID = u.UserID
                       WHERE p.PatientID = '$patient_id'";
$result_patient_address = $conn->query($sql_patient_address);
$patient_address = $result_patient_address && $result_patient_address->num_rows > 0 ? $result_patient_address->fetch_assoc() : [];

// Handle form submission
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nurse_id = isset($_POST['nurse_id']) ? intval($_POST['nurse_id']) : 0;
    $patient_id = isset($_POST['patient_id']) ? intval($_POST['patient_id']) : 0;
    $service_id = isset($_POST['service_id']) ? intval($_POST['service_id']) : 0;
    $schedule_id = isset($_POST['schedule_id']) ? intval($_POST['schedule_id']) : 0;
    $care_needed = isset($_POST['care_needed']) ? array_map('trim', $_POST['care_needed']) : [];
    $street = isset($_POST['address_street']) ? trim($_POST['address_street']) : '';
    $building = isset($_POST['address_building']) ? trim($_POST['address_building']) : '';
    $city = isset($_POST['city']) ? trim($_POST['city']) : '';

    if (!$nurse_id || !$patient_id || !$service_id || !$schedule_id || empty($care_needed) || !$street || !$building || !$city) {
        $error = "All fields are required, including at least one type of care.";
    } else {
        // Fetch date and time from schedule
        $sql_schedule = "SELECT Date, StartTime FROM schedule WHERE ScheduleID = $schedule_id AND NurseID = $nurse_id AND Status = 'available'";
        $result_schedule = $conn->query($sql_schedule);
        if ($result_schedule->num_rows == 0) {
            $error = "Invalid or unavailable schedule selected.";
        } else {
            $schedule_row = $result_schedule->fetch_assoc();
            $date = $schedule_row['Date'];
            $time = $schedule_row['StartTime'];

            // Check if address matches patient's existing address
            $address_id = null;
            if (
                !empty($patient_address) &&
                $city === $patient_address['City'] &&
                $street === $patient_address['Street'] &&
                $building === $patient_address['Building']
            ) {
                $address_id = $patient_address['AddressID'];
            } else {
                $sql_address = "INSERT INTO address (City, Street, Building) VALUES ('$city', '$street', '$building')";
                if ($conn->query($sql_address)) {
                    $address_id = $conn->insert_id;
                } else {
                    $error = "Error saving address: " . $conn->error;
                }
            }

            if (!$error) {
                $special_instructions = implode(', ', $care_needed);
                $sql_request = "INSERT INTO request (
                    NurseGender, AgeType, Date, Time, Type, NumberOfNurses, SpecialInstructions, 
                    MedicalCondition, Duration, NurseStatus, PatientStatus, RequestStatus, 
                    ServiceFeePercentage, PatientID, NurseID, AddressID
                ) VALUES (
                    'No Preference', 'No Preference', '$date', '$time', 
                    (SELECT Name FROM service WHERE ServiceID = $service_id), 1, '$special_instructions', 
                    NULL, NULL, 'pending', 'confirmed', 'pending', 10.00, $patient_id, $nurse_id, $address_id
                )";
                if ($conn->query($sql_request)) {
                    $request_id = $conn->insert_id;

                    foreach ($care_needed as $care_name) {
                        $sql_care = "INSERT INTO request_care_needed (RequestID, CareID) 
                                     SELECT $request_id, CareID FROM care_needed WHERE Name = '$care_name'";
                        if (!$conn->query($sql_care)) {
                            $error = "Error linking care needed: " . $conn->error;
                            break;
                        }
                    }

                    if (!$error) {
                        $sql_update_schedule = "UPDATE schedule SET Status = 'booked' WHERE ScheduleID = $schedule_id";
                        $conn->query($sql_update_schedule);
                        header("Location: my_requests.php");
                        exit;
                    }
                } else {
                    $error = "Error submitting request: " . $conn->error;
                }
            }
        }
    }
}

// Handle service filter
$service_filter = isset($_GET['service']) ? $_GET['service'] : '';

// Fetch all nurses and their services/schedules
$sql_nurses = "SELECT n.NurseID, u.FullName, n.Bio, na.Picture, na.Specialization, na.Gender, na.Language, u.DateOfBirth, a.City, a.Street, AVG(r.Rating) AS AvgRating, COUNT(r.RID) AS ReviewCount
               FROM nurse n
               INNER JOIN user u ON n.UserID = u.UserID
               INNER JOIN nurseapplication na ON n.NAID = na.NAID
               INNER JOIN address a ON u.AddressID = a.AddressID
               LEFT JOIN rating r ON n.NurseID = r.NurseID
               INNER JOIN nurseservices ns ON n.NurseID = ns.NurseID
               INNER JOIN service s ON ns.ServiceID = s.ServiceID
               WHERE n.Availability = 1";
if ($service_filter && $service_filter !== 'All') {
    $sql_nurses .= " AND s.Name = '$service_filter'";
}
$sql_nurses .= " GROUP BY n.NurseID ORDER BY AvgRating DESC";
$result_nurses = $conn->query($sql_nurses);
$nurses = [];
while ($row = $result_nurses->fetch_assoc()) {
    $dob = new DateTime($row['DateOfBirth']);
    $now = new DateTime();
    $row['Age'] = $now->diff($dob)->y;

    // Fetch services for this nurse
    $nurse_id = $row['NurseID'];
    $sql_services = "SELECT s.ServiceID, s.Name FROM nurseservices ns INNER JOIN service s ON ns.ServiceID = s.ServiceID WHERE ns.NurseID = '$nurse_id'";
    $result_services = $conn->query($sql_services);
    $row['services'] = [];
    while ($service_row = $result_services->fetch_assoc()) {
        $row['services'][] = $service_row;
    }

    // Fetch schedules for this nurse
    $sql_schedules = "SELECT ScheduleID, Date, StartTime, EndTime, Notes FROM schedule WHERE NurseID = '$nurse_id' AND Status = 'available'";
    $result_schedules = $conn->query($sql_schedules);
    $row['schedules'] = [];
    while ($schedule_row = $result_schedules->fetch_assoc()) {
        $row['schedules'][] = $schedule_row;
    }

    $nurses[] = $row;
}

// Fetch distinct service names
$sql_services = "SELECT DISTINCT Name FROM service WHERE ServiceID > 0";
$result_services = $conn->query($sql_services);
$services = [];
while ($row = $result_services->fetch_assoc()) {
    $services[] = $row['Name'];
}

// Fetch selected nurse details for profile modal
$selected_nurse = null;
$certifications = [];
$schedule = [];
$prices = [];
$image_base_path = '/patient1/images/';

if (isset($_GET['nurse_id']) && is_numeric($_GET['nurse_id']) && $_GET['nurse_id'] > 0) {
    $nurse_id = $_GET['nurse_id'];
    $sql_nurse = "SELECT n.NurseID, u.FullName, n.Bio, na.Picture, na.Specialization, na.Gender, na.Language, u.DateOfBirth, a.City, a.Street, AVG(r.Rating) AS AvgRating, COUNT(r.RID) AS ReviewCount
                  FROM nurse n
                  INNER JOIN user u ON n.UserID = u.UserID
                  INNER JOIN nurseapplication na ON n.NAID = na.NAID
                  INNER JOIN address a ON u.AddressID = a.AddressID
                  LEFT JOIN rating r ON n.NurseID = r.NurseID
                  WHERE n.NurseID = '$nurse_id'
                  GROUP BY n.NurseID";
    $result_nurse = $conn->query($sql_nurse);
    if ($result_nurse->num_rows > 0) {
        $row = $result_nurse->fetch_assoc();
        $dob = new DateTime($row['DateOfBirth']);
        $now = new DateTime();
        $row['Age'] = $now->diff($dob)->y;
        $row['Location'] = ($row['City'] && $row['Street']) ? $row['City'] . ', ' . $row['Street'] : ($row['City'] ?: 'Unknown');
        $row['Picture'] = !empty($row['Picture']) && file_exists($_SERVER['DOCUMENT_ROOT'] . $image_base_path . $row['Picture']) 
            ? $image_base_path . $row['Picture'] 
            : '/patient1/images/default_nurse.jpg';
        $selected_nurse = $row;
    }

    // Fetch certifications
    $sql_certs = "SELECT Name, Image, Comment FROM certification WHERE NurseID = '$nurse_id' AND Status = 'approved'";
    $result_certs = $conn->query($sql_certs);
    while ($cert_row = $result_certs->fetch_assoc()) {
        $cert_row['Image'] = !empty($cert_row['Image']) && file_exists($_SERVER['DOCUMENT_ROOT'] . $image_base_path . $cert_row['Image']) 
            ? $image_base_path . $cert_row['Image'] 
            : '/patient1/images/default_cert.jpg';
        $certifications[] = $cert_row;
    }

    // Fetch schedule
    $sql_schedule = "SELECT ScheduleID, Date, StartTime, EndTime, Notes FROM schedule WHERE NurseID = '$nurse_id' AND Status = 'available'";
    $result_schedule = $conn->query($sql_schedule);
    while ($sched_row = $result_schedule->fetch_assoc()) {
        $schedule[] = $sched_row;
    }

    // Fetch prices
    $sql_prices = "SELECT s.ServiceID, s.Name, ns.Price FROM nurseservices ns INNER JOIN service s ON ns.ServiceID = s.ServiceID WHERE ns.NurseID = '$nurse_id'";
    $result_prices = $conn->query($sql_prices);
    while ($price_row = $result_prices->fetch_assoc()) {
        $prices[] = $price_row;
    }
}

// Fetch care options
$sql_care_needed = "SELECT Name FROM care_needed";
$result_care_needed = $conn->query($sql_care_needed);
$care_options = [];
while ($row = $result_care_needed->fetch_assoc()) {
    $care_options[] = $row['Name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Nursing - Available Nurses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="assets/patient.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <?php include 'sidebar.php'; ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4 main-content">
                <h2 class="h4 mb-4 fw-bold">Available Nurses</h2>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                <h6 class="m-0 fw-bold text-primary">Currently Available Nurses</h6>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown">
                                        <?php echo htmlspecialchars($service_filter && $service_filter !== 'All' ? $service_filter : 'Filter by Service'); ?>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="?service=All">All Services</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <?php foreach ($services as $service): ?>
                                            <li><a class="dropdown-item" href="?service=<?php echo urlencode($service); ?>"><?php echo htmlspecialchars($service); ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php if ($error): ?>
                                    <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                                <?php endif; ?>
                                <?php if (empty($nurses)): ?>
                                    <div class="alert alert-warning text-center">
                                        No nurses are currently available. Please check the database or try a different filter.
                                    </div>
                                <?php else: ?>
                                    <div class="row">
                                        <?php foreach ($nurses as $nurse): ?>
                                            <div class="col-md-4 mb-4">
                                                <div class="card h-100 border-start border-primary border-4" data-nurse-id="<?php echo htmlspecialchars($nurse['NurseID']); ?>">
                                                    <div class="card-body text-center">
                                                        <?php
                                                        $nurse_image = !empty($nurse['Picture']) && file_exists($_SERVER['DOCUMENT_ROOT'] . $image_base_path . $nurse['Picture']) 
                                                            ? $image_base_path . $nurse['Picture'] 
                                                            : '/patient1/images/default_nurse.jpg';
                                                        ?>
                                                        <img src="<?php echo htmlspecialchars($nurse_image); ?>" class="rounded-circle mb-3" width="100" alt="Nurse">
                                                        <h5 class="card-title"><?php echo htmlspecialchars($nurse['FullName']); ?></h5>
                                                        <p class="text-muted small"><?php echo htmlspecialchars($nurse['Specialization'] ?? 'General Nurse'); ?></p>
                                                        <div class="mb-3">
                                                            <?php
                                                            $rating = isset($nurse['AvgRating']) && $nurse['AvgRating'] !== null ? round($nurse['AvgRating'], 1) : 0;
                                                            for ($i = 1; $i <= 5; $i++) {
                                                                if ($i <= floor($rating)) {
                                                                    echo '<i class="fas fa-star text-warning"></i>';
                                                                } elseif ($i == ceil($rating) && $rating - floor($rating) > 0) {
                                                                    echo '<i class="fas fa-star-half-alt text-warning"></i>';
                                                                } else {
                                                                    echo '<i class="far fa-star text-warning"></i>';
                                                                }
                                                            }
                                                            ?>
                                                            <span class="small text-muted ms-1"><?php echo $rating . ' (' . (isset($nurse['ReviewCount']) ? $nurse['ReviewCount'] : 0) . ')'; ?></span>
                                                        </div>
                                                        <div class="d-grid gap-2">
                                                            <button class="btn btn-sm btn-outline-primary view-profile-btn" 
                                                                    data-nurse-id="<?php echo htmlspecialchars($nurse['NurseID']); ?>">
                                                                View Profile
                                                            </button>
                                                            <button class="btn btn-sm btn-primary request-service-btn" 
                                                                    data-nurse-id="<?php echo htmlspecialchars($nurse['NurseID']); ?>"
                                                                    data-services='<?php echo htmlspecialchars(json_encode($nurse['services'])); ?>'
                                                                    data-schedules='<?php echo htmlspecialchars(json_encode($nurse['schedules'])); ?>'>
                                                                Request Service
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Nurse Profile Modal -->
    <div class="modal fade" id="nurseProfileModal" tabindex="-1" aria-labelledby="nurseProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nurseProfileModalLabel">Nurse Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php if ($selected_nurse): ?>
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img src="<?php echo htmlspecialchars($selected_nurse['Picture']); ?>" class="rounded-circle mb-3" width="150" alt="Nurse Photo">
                                <h4><?php echo htmlspecialchars($selected_nurse['FullName']); ?></h4>
                                <p class="text-muted"><?php echo htmlspecialchars($selected_nurse['Specialization'] ?? 'General Nurse'); ?></p>
                                <div class="mb-3">
                                    <?php
                                    $rating = isset($selected_nurse['AvgRating']) && $selected_nurse['AvgRating'] !== null ? round($selected_nurse['AvgRating'], 1) : 0;
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= floor($rating)) {
                                            echo '<i class="fas fa-star text-warning"></i>';
                                        } elseif ($i == ceil($rating) && $rating - floor($rating) > 0) {
                                            echo '<i class="fas fa-star-half-alt text-warning"></i>';
                                        } else {
                                            echo '<i class="far fa-star text-warning"></i>';
                                        }
                                    }
                                    ?>
                                    <small class="text-muted"><?php echo $rating . ' (' . (isset($selected_nurse['ReviewCount']) ? $selected_nurse['ReviewCount'] : 0) . ' reviews)'; ?></small>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <ul class="nav nav-tabs" id="nurseProfileTabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#profile">Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#schedule">Schedule</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#certification">Certifications</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#pricing">Pricing</a>
                                    </li>
                                </ul>
                                <div class="tab-content p-3 border border-top-0 rounded-bottom">
                                    <div class="tab-pane fade show active" id="profile">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p><strong>Age:</strong> <?php echo htmlspecialchars($selected_nurse['Age'] ?? 'Unknown'); ?></p>
                                                <p><strong>Gender:</strong> <?php echo htmlspecialchars($selected_nurse['Gender'] ?? 'Unknown'); ?></p>
                                                <p><strong>Languages:</strong> <?php echo htmlspecialchars($selected_nurse['Language'] ?? 'Unknown'); ?></p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p><strong>Location:</strong> <?php echo htmlspecialchars($selected_nurse['Location'] ?? 'Unknown'); ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <h6>About</h6>
                                        <p><?php echo htmlspecialchars($selected_nurse['Bio'] ?? 'No bio available.'); ?></p>
                                    </div>
                                    <div class="tab-pane fade" id="schedule">
                                        <div class="alert alert-info small">
                                            <i class="fas fa-info-circle me-2"></i>
                                            Green indicates available time slots
                                        </div>
                                        <?php if (empty($schedule)): ?>
                                            <p class="text-muted">No schedule available.</p>
                                        <?php else: ?>
                                            <ul class="list-group">
                                                <?php foreach ($schedule as $slot): ?>
                                                    <li class="list-group-item">
                                                        <strong><?php echo htmlspecialchars($slot['Date']); ?>:</strong>
                                                        <?php echo htmlspecialchars($slot['StartTime'] . ' - ' . $slot['EndTime']); ?>
                                                        <?php if ($slot['Notes']): ?>
                                                            <small class="text-muted">(<?php echo htmlspecialchars($slot['Notes']); ?>)</small>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                    <div class="tab-pane fade" id="certification">
                                        <?php if (empty($certifications)): ?>
                                            <p class="text-muted">No certifications available.</p>
                                        <?php else: ?>
                                            <div class="row">
                                                <?php foreach ($certifications as $cert): ?>
                                                    <div class="col-md-6 mb-3">
                                                        <div class="card h-100">
                                                            <div class="card-body">
                                                                <h6 class="card-title"><?php echo htmlspecialchars($cert['Name']); ?></h6>
                                                                <?php if ($cert['Image']): ?>
                                                                    <img src="<?php echo htmlspecialchars($cert['Image']); ?>" class="img-fluid mb-2" alt="Certification" style="max-width: 100px;">
                                                                <?php endif; ?>
                                                                <p class="small text-muted"><?php echo htmlspecialchars($cert['Comment'] ?: 'No additional comments.'); ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="tab-pane fade" id="pricing">
                                        <?php if (empty($prices)): ?>
                                            <p class="text-muted">No pricing information available.</p>
                                        <?php else: ?>
                                            <ul class="list-group">
                                                <?php foreach ($prices as $price): ?>
                                                    <li class="list-group-item">
                                                        <strong><?php echo htmlspecialchars($price['Name']); ?>:</strong>
                                                        $<?php echo htmlspecialchars($price['Price']); ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning">
                            No nurse selected. Please choose a nurse to view their profile.
                        </div>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <?php if ($selected_nurse): ?>
                        <button class="btn btn-primary request-service-btn" 
                                data-nurse-id="<?php echo htmlspecialchars($selected_nurse['NurseID']); ?>"
                                data-services='<?php echo htmlspecialchars(json_encode($prices)); ?>'
                                data-schedules='<?php echo htmlspecialchars(json_encode($schedule)); ?>'>
                            Request This Nurse
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Service Request Modal -->
    <div class="modal fade" id="serviceRequestModal" tabindex="-1" aria-labelledby="serviceRequestModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="serviceRequestModalLabel">Service Request Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="modalServiceRequestForm" action="nurses_available.php" method="POST">
                        <!-- Hidden Inputs -->
                        <input type="hidden" name="nurse_id" id="modalNurseId">
                        <input type="hidden" name="patient_id" value="<?php echo htmlspecialchars($patient_id); ?>">

                        <!-- Service Type -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Service Type <span class="text-danger">*</span></label>
                            <select class="form-select" name="service_id" id="modalServiceId" required>
                                <option value="">Select a service</option>
                            </select>
                            <div class="invalid-feedback">Please select a service type.</div>
                        </div>

                        <!-- Schedule -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Preferred Schedule <span class="text-danger">*</span></label>
                            <select class="form-select" name="schedule_id" id="modalSchedule" required>
                                <option value="">Select a schedule</option>
                            </select>
                            <div class="invalid-feedback">Please select a schedule.</div>
                        </div>

                        <!-- Type of Care Needed -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Type of Care Needed <span class="text-danger">*</span></label>
                            <div class="row">
                                <?php foreach ($care_options as $index => $care): ?>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="care_needed[]" value="<?php echo htmlspecialchars($care); ?>" id="modalCare<?php echo $index; ?>">
                                            <label class="form-check-label" for="modalCare<?php echo $index; ?>"><?php echo htmlspecialchars($care); ?></label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="invalid-feedback" id="careNeededFeedback">Please select at least one type of care.</div>
                        </div>

                        <!-- Address for Service -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Address for Service <span class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label class="form-label">Street</label>
                                    <input type="text" class="form-control" name="address_street" id="modalStreet" placeholder="Street (e.g., 123 Main St)" value="<?php echo htmlspecialchars($patient_address['Street'] ?? ''); ?>" required>
                                    <div class="invalid-feedback">Please enter the street address.</div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label">Building</label>
                                    <input type="text" class="form-control" name="address_building" id="modalBuilding" placeholder="Building (e.g., Apt 4B)" value="<?php echo htmlspecialchars($patient_address['Building'] ?? ''); ?>" required>
                                    <div class="invalid-feedback">Please enter the building details.</div>
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" name="city" id="modalCity" placeholder="City (e.g., New York)" value="<?php echo htmlspecialchars($patient_address['City'] ?? ''); ?>" required>
                                    <div class="invalid-feedback">Please enter the city.</div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary mt-2 fw-bold" id="useCurrentLocation">
                                <i class="fas fa-location-arrow me-1"></i> Use My Current Location
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Pass patient address data to JavaScript
    var patientAddress = {
        city: '<?php echo htmlspecialchars($patient_address['City'] ?? ''); ?>',
        street: '<?php echo htmlspecialchars($patient_address['Street'] ?? ''); ?>',
        building: '<?php echo htmlspecialchars($patient_address['Building'] ?? ''); ?>'
    };

    document.addEventListener('DOMContentLoaded', function () {
        // Open profile modal if nurse_id is in URL
        var urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('nurse_id') && urlParams.get('nurse_id') !== '') {
            var profileModal = new bootstrap.Modal(document.getElementById('nurseProfileModal'), {
                backdrop: 'static',
                keyboard: false
            });
            profileModal.show();
        }

        // View profile button handler
        document.querySelectorAll('.view-profile-btn').forEach(function (button) {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                var nurseId = this.getAttribute('data-nurse-id');
                var urlParams = new URLSearchParams(window.location.search);
                var serviceFilter = urlParams.get('service') || 'All';
                var url = window.location.pathname + '?nurse_id=' + nurseId + '&service=' + encodeURIComponent(serviceFilter);
                window.location.href = url;
            });
        });

        // Request service button handler
        document.querySelectorAll('.request-service-btn').forEach(function (button) {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                var nurseId = this.getAttribute('data-nurse-id');
                var services = JSON.parse(this.getAttribute('data-services') || '[]');
                var schedules = JSON.parse(this.getAttribute('data-schedules') || '[]');
                var modalElement = document.getElementById('serviceRequestModal');
                var form = document.getElementById('modalServiceRequestForm');

                if (!modalElement || !form) return;

                // Set nurse ID
                document.getElementById('modalNurseId').value = nurseId;

                // Reset form
                form.reset();

                // Populate address fields
                document.getElementById('modalCity').value = patientAddress.city || '';
                document.getElementById('modalStreet').value = patientAddress.street || '';
                document.getElementById('modalBuilding').value = patientAddress.building || '';

                // Populate services dropdown
                var serviceSelect = document.getElementById('modalServiceId');
                serviceSelect.innerHTML = '<option value="">Select a service</option>';
                if (services.length === 0) {
                    serviceSelect.innerHTML += '<option value="">No services available</option>';
                } else {
                    services.forEach(function (service) {
                        var option = document.createElement('option');
                        option.value = service.ServiceID;
                        option.textContent = service.Name;
                        serviceSelect.appendChild(option);
                    });
                }

                // Populate schedules dropdown
                var scheduleSelect = document.getElementById('modalSchedule');
                scheduleSelect.innerHTML = '<option value="">Select a schedule</option>';
                if (schedules.length === 0) {
                    scheduleSelect.innerHTML += '<option value="">No schedules available</option>';
                } else {
                    schedules.forEach(function (slot) {
                        var option = document.createElement('option');
                        option.value = slot.ScheduleID;
                        option.textContent = slot.Date + ' ' + slot.StartTime + ' - ' + slot.EndTime + (slot.Notes ? ' (' + slot.Notes + ')' : '');
                        scheduleSelect.appendChild(option);
                    });
                }

                // Open modal
                var modal = new bootstrap.Modal(modalElement, {
                    backdrop: 'static',
                    keyboard: false
                });
                modal.show();
            });
        });

        // Use Current Location button
        var useCurrentLocationBtn = document.getElementById('useCurrentLocation');
        if (useCurrentLocationBtn) {
            useCurrentLocationBtn.addEventListener('click', function () {
                if (patientAddress.city || patientAddress.street || patientAddress.building) {
                    document.getElementById('modalCity').value = patientAddress.city;
                    document.getElementById('modalStreet').value = patientAddress.street;
                    document.getElementById('modalBuilding').value = patientAddress.building;
                } else {
                    alert('No address found for this patient. Please enter the address manually.');
                }
            });
        }
    });
</script>
</body>
</html>

talk to me in Arabic but give me all the code in English (not in Arabic) without using any security, Ajax, Jquery, Json, session.