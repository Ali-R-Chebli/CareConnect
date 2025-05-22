<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin panel to manage settings on Home Care Platform.">
    <title>Settings - Admin - Home Care</title>
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
            <h2 class="mb-4">Settings</h2>
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Platform Settings</h5>
                    <form onsubmit="alert('Settings saved successfully!'); return false;">
                        <div class="mb-3">
                            <label for="siteName" class="form-label">Site Name</label>
                            <input type="text" class="form-control" id="siteName" value="Home Care Platform" required>
                        </div>
                        <div class="mb-3">
                            <label for="contactEmail" class="form-label">Contact Email</label>
                            <input type="email" class="form-control" id="contactEmail" value="support@homecare.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="contactPhone" class="form-label">Contact Phone</label>
                            <input type="text" class="form-control" id="contactPhone" value="+1234567890" required>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" value="123 Healthcare St, City" required>
                        </div>
                        <div class="mb-3">
                            <label for="maintenanceMode" class="form-label">Maintenance Mode</label>
                            <select class="form-select" id="maintenanceMode" required>
                                <option value="off" selected>Off</option>
                                <option value="on">On</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Styles -->
    <style>
        body { background-color: #f8f9fa; font-family: 'Arial', sans-serif; }
        .sidebar .nav-link:hover { background-color: #3498DB; border-radius: 5px; }
        .sidebar .nav-link.active { background-color: #3498DB; border-radius: 5px; }
        .card { transition: transform 0.3s ease; }
        .card:hover { transform: translateY(-10px); }
        .btn-primary { background-color: #3498DB; border: none; }
        .btn-primary:hover { background-color: #2980B9; }
        .shadow-sm { box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); }
    </style>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>