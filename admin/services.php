<?php
include '../connect.php';

// Handle delete service (place this before any output)
if (isset($_POST['delete_service']) && isset($_POST['service_id'])) {
    $service_id = $_POST['service_id'];
    $sql = "DELETE FROM service WHERE ServiceID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $service_id);
    if ($stmt->execute()) {
        header("Location: services.php");
        exit;
    } else {
        $show_error_modal = true; // Flag to show error modal later
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin panel to manage services on Home Care Platform.">
    <title>Manage Services - Admin - Home Care</title>
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
            <h2 class="mb-4">Manage Services</h2>
            <div class="mb-3">
                <a href="add_services.php" class="btn btn-primary">Add New Service</a>
            </div>
            <!-- Services Table -->
            <div class="table-responsive">
                <table class="table table-striped shadow-sm" id="servicesTable">
                    <thead>
                        <tr>
                            <th style="width: 10%;">ID</th>
                            <th style="width: 20%;">Service Name</th>
                            <th style="width: 15%;">Type</th>
                            <th style="width: 15%;">Duration (Minutes)</th>
                            <th style="width: 25%;">Description</th>
                            <th style="width: 15%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch services from database
                        $sql = "SELECT ServiceID, Name, Type, Duration, Description FROM service";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['ServiceID'] . "</td>";
                                echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['Type'] ?: 'N/A') . "</td>";
                                echo "<td>" . htmlspecialchars($row['Duration'] ?: 'N/A') . "</td>";
                                echo "<td>" . htmlspecialchars($row['Description']) . "</td>";
                                echo "<td class='text-center'>";
                                echo "<a href='edit_services.php?service_id=" . $row['ServiceID'] . "' class='btn btn-warning btn-sm me-2'>Edit</a>";
                                echo "<button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deleteModal" . $row['ServiceID'] . "'>Delete</button>";
                                echo "</td>";
                                echo "</tr>";

                                // Delete Modal for each service
                                echo "<div class='modal fade' id='deleteModal" . $row['ServiceID'] . "' tabindex='-1' aria-labelledby='deleteModalLabel" . $row['ServiceID'] . "' aria-hidden='true'>";
                                echo "<div class='modal-dialog'>";
                                echo "<div class='modal-content'>";
                                echo "<div class='modal-header'>";
                                echo "<h5 class='modal-title' id='deleteModalLabel" . $row['ServiceID'] . "'>Confirm Deletion</h5>";
                                echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                                echo "</div>";
                                echo "<div class='modal-body'>";
                                echo "<p>Are you sure you want to delete the service: <strong>" . htmlspecialchars($row['Name']) . "</strong>?</p>";
                                echo "<p>This action cannot be undone.</p>";
                                echo "</div>";
                                echo "<div class='modal-footer'>";
                                echo "<form action='' method='POST'>";
                                echo "<input type='hidden' name='service_id' value='" . $row['ServiceID'] . "'>";
                                echo "<button type='submit' name='delete_service' class='btn btn-danger'>Delete Service</button>";
                                echo "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>";
                                echo "</form>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No services found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Error Modal (for delete failure) -->
    <?php if (isset($show_error_modal) && $show_error_modal): ?>
    <div class='modal fade' id='errorModal' tabindex='-1' aria-labelledby='errorModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='errorModalLabel'>Error</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <p>Error deleting service. Please try again.</p>
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