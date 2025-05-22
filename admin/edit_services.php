<?php include '../connect.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin panel to edit existing services on Home Care Platform.">
    <title>Edit Services - Admin - Home Care</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/admin.css">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>

        <!-- Main Content -->
        <div class="content flex-grow-1 p-4" style="margin-left: 250px;">
            <h2 class="mb-4 animate__animated animate__fadeIn">Edit Service</h2>
            <div class="card shadow-sm animate__animated animate__fadeInUp">
                <div class="card-body">
                    <?php
                    // Fetch service details
                    if (isset($_GET['service_id'])) {
                        $service_id = $_GET['service_id'];
                        $sql = "SELECT Name, Type, Duration, Description FROM service WHERE ServiceID = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $service_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            $service = $result->fetch_assoc();
                        } else {
                            echo "<p class='text-danger'>Service not found.</p>";
                            exit;
                        }
                        $stmt->close();
                    } else {
                        echo "<p class='text-danger'>No service ID provided.</p>";
                        exit;
                    }

                    // Initialize variables to store form data for confirmation modal
                    $name = isset($_POST['service_name']) ? $_POST['service_name'] : $service['Name'];
                    $type = isset($_POST['service_type']) ? $_POST['service_type'] : $service['Type'];
                    $duration = isset($_POST['service_duration']) ? $_POST['service_duration'] : $service['Duration'];
                    $description = isset($_POST['service_description']) ? $_POST['service_description'] : $service['Description'];
                    $show_confirm_modal = isset($_POST['update_service']);

                    // Handle confirmation from modal
                    if (isset($_POST['confirm_update'])) {
                        $name = $_POST['confirm_name'];
                        $type = $_POST['confirm_type'];
                        $duration = $_POST['confirm_duration'];
                        $description = $_POST['confirm_description'];
                        $sql = "UPDATE service SET Name = ?, Type = ?, Duration = ?, Description = ? WHERE ServiceID = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ssisi", $name, $type, $duration, $description, $service_id);
                        if ($stmt->execute()) {
                            header("Location: services.php");
                            exit;
                        } else {
                            $show_error_modal = true;
                        }
                        $stmt->close();
                    }
                    ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="serviceName" class="form-label">Service Name</label>
                            <input type="text" class="form-control" id="serviceName" name="service_name" value="<?php echo htmlspecialchars($name); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="serviceType" class="form-label">Type</label>
                            <select class="form-control" id="serviceType" name="service_type" required>
                                <option value="Medical" <?php if ($type == 'Medical') echo 'selected'; ?>>Medical</option>
                                <option value="Non-Medical" <?php if ($type == 'Non-Medical') echo 'selected'; ?>>Non-Medical</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="serviceDuration" class="form-label">Duration (Minutes)</label>
                            <input type="number" class="form-control" id="serviceDuration" name="service_duration" value="<?php echo htmlspecialchars($duration); ?>" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="serviceDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="serviceDescription" name="service_description" rows="3" required><?php echo htmlspecialchars($description); ?></textarea>
                        </div>
                        <button type="submit" name="update_service" class="btn btn-primary">Save Changes</button>
                        <a href="services.php" class="btn btn-secondary ms-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <?php if ($show_confirm_modal): ?>
    <div class='modal fade' id='confirmModal' tabindex='-1' aria-labelledby='confirmModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='confirmModalLabel'>Confirm Update</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <p>Are you sure you want to update the service: <strong><?php echo htmlspecialchars($name); ?></strong>?</p>
                    <p>This action cannot be undone.</p>
                </div>
                <div class='modal-footer'>
                    <form method="POST">
                        <input type="hidden" name="confirm_name" value="<?php echo htmlspecialchars($name); ?>">
                        <input type="hidden" name="confirm_type" value="<?php echo htmlspecialchars($type); ?>">
                        <input type="hidden" name="confirm_duration" value="<?php echo htmlspecialchars($duration); ?>">
                        <input type="hidden" name="confirm_description" value="<?php echo htmlspecialchars($description); ?>">
                        <button type="submit" name="confirm_update" class="btn btn-primary">Confirm</button>
                    </form>
                    <a href="edit_services.php?service_id=<?php echo $service_id; ?>" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
            confirmModal.show();
        });
    </script>
    <?php endif; ?>

    <!-- Error Modal -->
    <?php if (isset($show_error_modal) && $show_error_modal): ?>
    <div class='modal fade' id='errorModal' tabindex='-1' aria-labelledby='errorModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='errorModalLabel'>Error</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <p>Error updating service. Please try again.</p>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
        });
    </script>
    <?php endif; ?>

    <?php $conn->close(); ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>