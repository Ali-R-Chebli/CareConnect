<?php
// Include database connection
include '../connect.php';

// Initialize variables for filtering
$role_filter = isset($_GET['role']) ? $_GET['role'] : '';
$status_filter = isset($_GET['status']) ? $_GET['status'] : '';
$alert_message = '';
$show_modal = false;

// Handle block/activate actions
if (isset($_GET['action']) && isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $action = $_GET['action'];

    if ($action === 'block') {
        $update_query = "UPDATE user SET Status = 'blocked' WHERE UserID = $user_id";
        mysqli_query($conn, $update_query);
        $alert_message = 'User blocked successfully!';
        $show_modal = true;
    } elseif ($action === 'activate') {
        $update_query = "UPDATE user SET Status = 'active' WHERE UserID = $user_id";
        mysqli_query($conn, $update_query);
        $alert_message = 'User activated successfully!';
        $show_modal = true;
    }
}

// Build the query with filters
$query = "SELECT u.UserID, u.FullName, u.Email, u.Role, u.Status 
          FROM user u 
          WHERE 1=1";

if ($role_filter) {
    $query .= " AND u.Role = '$role_filter'";
}
if ($status_filter) {
    $query .= " AND u.Status = '$status_filter'";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin panel to manage users on Home Care Platform.">
    <title>Manage Users - Admin - Home Care</title>
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
            <h2 class="mb-4">Manage Users</h2>
            <!-- Filters -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="roleFilter" class="form-label">Filter by Role</label>
                    <select class="form-select" id="roleFilter" onchange="filterTable()">
                        <option value="">All Roles</option>
                        <option value="nurse" <?php echo $role_filter === 'nurse' ? 'selected' : ''; ?>>Nurses</option>
                        <option value="patient" <?php echo $role_filter === 'patient' ? 'selected' : ''; ?>>Patients</option>
                        <option value="staff" <?php echo $role_filter === 'staff' ? 'selected' : ''; ?>>Staff</option>
                        <option value="admin" <?php echo $role_filter === 'admin' ? 'selected' : ''; ?>>Admin</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="statusFilter" class="form-label">Filter by Status</label>
                    <select class="form-select" id="statusFilter" onchange="filterTable()">
                        <option value="">All Statuses</option>
                        <option value="active" <?php echo $status_filter === 'active' ? 'selected' : ''; ?>>Active</option>
                        <option value="inactive" <?php echo $status_filter === 'inactive' ? 'selected' : ''; ?>>Inactive</option>
                        <option value="blocked" <?php echo $status_filter === 'blocked' ? 'selected' : ''; ?>>Blocked</option>
                    </select>
                </div>
            </div>
            <!-- Users Table -->
            <table class="table table-striped shadow-sm" id="usersTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['UserID']; ?></td>
                            <td><?php echo $row['FullName']; ?></td>
                            <td><?php echo $row['Email']; ?></td>
                            <td><?php echo ucfirst($row['Role']); ?></td>
                            <td>
                                <span class="badge <?php echo $row['Status'] === 'active' ? 'bg-success' : ($row['Status'] === 'inactive' ? 'bg-warning' : 'bg-danger'); ?>">
                                    <?php echo ucfirst($row['Status']); ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($row['Status'] === 'active') { ?>
                                    <a href="#" class="btn btn-danger btn-sm" onclick="showConfirmation('Block', 'users.php?action=block&id=<?php echo $row['UserID']; ?>')">Block</a>
                                <?php } else { ?>
                                    <a href="#" class="btn btn-success btn-sm" onclick="showConfirmation('Activate', 'users.php?action=activate&id=<?php echo $row['UserID']; ?>')">Activate</a>
                                <?php } ?>
                                <a href="send_message.php?id=<?php echo $row['UserID']; ?>" class="btn btn-info btn-sm">Send Message</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirm Action</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="confirmationMessage"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a id="confirmAction" class="btn btn-danger">Confirm</a>
            </div>
        </div>
    </div>
</div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Filter Script -->
    <script>
        function filterTable() {
            const roleFilter = document.getElementById('roleFilter').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value.toLowerCase();
            const rows = document.querySelectorAll('#usersTable tbody tr');

            rows.forEach(row => {
                const role = row.cells[3].textContent.toLowerCase();
                const status = row.cells[4].textContent.toLowerCase();

                const roleMatch = roleFilter === '' || role === roleFilter;
                const statusMatch = statusFilter === '' || status.includes(statusFilter);

                row.style.display = roleMatch && statusMatch ? '' : 'none';
            });
        }

        // Apply filter automatically on page load based on URL parameters
        window.onload = function() {
            <?php if (isset($_GET['role'])): ?>
                document.getElementById('roleFilter').value = '<?php echo $_GET['role']; ?>';
                filterTable();
            <?php endif; ?>
            <?php if (isset($_GET['status'])): ?>
                document.getElementById('statusFilter').value = '<?php echo $_GET['status']; ?>';
                filterTable();
            <?php endif; ?>
            <?php if ($show_modal): ?>
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            <?php endif; ?>
        };

        function showConfirmation(action, url) {
            document.getElementById('confirmationMessage').textContent = `Are you sure you want to ${action.toLowerCase()} this user?`;
            document.getElementById('confirmAction').href = url;
            
            var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
            confirmationModal.show();
        }

    </script>
</body>
</html>