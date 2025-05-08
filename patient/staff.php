<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeCare - Staff Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --success-color: #2ecc71;
            --danger-color: #e74c3c;
            --warning-color: #f39c12;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --gray-color: #95a5a6;
            --white-color: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: #333;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: var(--dark-color);
            color: var(--white-color);
            padding: 20px 0;
            transition: all 0.3s;
            position: fixed;
            height: 100vh;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 0 20px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }

        .sidebar-header h3 {
            color: var(--white-color);
            font-size: 1.3rem;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: var(--light-color);
            text-decoration: none;
            transition: all 0.3s;
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--white-color);
        }

        .sidebar-menu i {
            margin-right: 10px;
            font-size: 1.1rem;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background-color: var(--white-color);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .notification-icon {
            position: relative;
            margin-right: 20px;
            cursor: pointer;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--danger-color);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
        }

        /* Card Styles */
        .card {
            background-color: var(--white-color);
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
        }

        .card-header {
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h3 {
            font-size: 1.2rem;
            color: var(--dark-color);
        }

        .card-body {
            padding: 20px;
        }

        /* Table Styles */
        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: var(--dark-color);
        }

        tr:hover {
            background-color: #f8f9fa;
        }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-approved {
            background-color: #d4edda;
            color: #155724;
        }

        .status-rejected {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Button Styles */
        .btn {
            padding: 8px 15px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 0.8rem;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
        }

        .btn-success {
            background-color: var(--success-color);
            color: white;
        }

        .btn-success:hover {
            background-color: #27ae60;
        }

        .btn-danger {
            background-color: var(--danger-color);
            color: white;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        .btn-warning {
            background-color: var(--warning-color);
            color: white;
        }

        .btn-warning:hover {
            background-color: #e67e22;
        }

        .btn-light {
            background-color: var(--light-color);
            color: var(--dark-color);
        }

        .btn-light:hover {
            background-color: #d5dbdb;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 2000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            border-radius: 5px;
            width: 500px;
            max-width: 90%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            font-size: 1.2rem;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            padding: 15px 20px;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .close {
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--gray-color);
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        /* Tabs Styles */
        .tabs {
            display: flex;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .tab {
            padding: 10px 20px;
            cursor: pointer;
            border-bottom: 2px solid transparent;
        }

        .tab.active {
            border-bottom: 2px solid var(--primary-color);
            color: var(--primary-color);
            font-weight: 500;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Badge Styles */
        .badge {
            display: inline-block;
            padding: 3px 7px;
            font-size: 0.75rem;
            font-weight: 600;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 10px;
        }

        .badge-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .badge-success {
            background-color: var(--success-color);
            color: white;
        }

        .badge-danger {
            background-color: var(--danger-color);
            color: white;
        }

        .badge-warning {
            background-color: var(--warning-color);
            color: white;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                overflow: hidden;
            }
            
            .sidebar-header h3, .sidebar-menu a span {
                display: none;
            }
            
            .sidebar-menu a {
                justify-content: center;
            }
            
            .sidebar-menu i {
                margin-right: 0;
                font-size: 1.3rem;
            }
            
            .main-content {
                margin-left: 70px;
            }
        }

        /* Utility Classes */
        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .align-items-center {
            align-items: center;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        .text-center {
            text-align: center;
        }

        .text-muted {
            color: var(--gray-color);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-color);
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h3>HomeCare Staff</h3>
            </div>
            <ul class="sidebar-menu">
                <li><a href="#" class="active" data-tab="dashboard"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
                <li><a href="#" data-tab="applications"><i class="fas fa-file-alt"></i> <span>Nurse Applications</span></a></li>
                <li><a href="#" data-tab="certifications"><i class="fas fa-certificate"></i> <span>Certifications</span></a></li>
                <li><a href="#" data-tab="reports"><i class="fas fa-flag"></i> <span>Reports</span></a></li>
                <li><a href="#" data-tab="notifications"><i class="fas fa-bell"></i> <span>Send Notifications</span></a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                <h2>Staff Dashboard</h2>
                <div class="user-info">
                    <div class="notification-icon">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </div>
                    <img src="https://via.placeholder.com/40" alt="User">
                    <span>Staff Admin</span>
                </div>
            </div>

            <!-- Dashboard Tab -->
            <div class="tab-content active" id="dashboard">
                <div class="card">
                    <div class="card-header">
                        <h3>Overview</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="card" style="width: 32%; padding: 15px;">
                                <h4>Pending Applications</h4>
                                <h2 style="color: var(--warning-color);">12</h2>
                            </div>
                            <div class="card" style="width: 32%; padding: 15px;">
                                <h4>Certification Requests</h4>
                                <h2 style="color: var(--primary-color);">8</h2>
                            </div>
                            <div class="card" style="width: 32%; padding: 15px;">
                                <h4>New Reports</h4>
                                <h2 style="color: var(--danger-color);">5</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3>Recent Activity</h3>
                    </div>
                    <div class="card-body">
                        <table>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Activity</th>
                                    <th>User</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2025-05-07</td>
                                    <td>Application approved</td>
                                    <td>Sarah Johnson</td>
                                    <td><span class="status status-approved">Approved</span></td>
                                </tr>
                                <tr>
                                    <td>2025-05-06</td>
                                    <td>Certification rejected</td>
                                    <td>Michael Brown</td>
                                    <td><span class="status status-rejected">Rejected</span></td>
                                </tr>
                                <tr>
                                    <td>2025-05-05</td>
                                    <td>Report submitted</td>
                                    <td>Patient #1234</td>
                                    <td><span class="status status-pending">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>2025-05-04</td>
                                    <td>Notification sent</td>
                                    <td>All Nurses</td>
                                    <td><span class="status status-approved">Sent</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Applications Tab -->
            <div class="tab-content" id="applications">
                <div class="card">
                    <div class="card-header">
                        <h3>Nurse Applications</h3>
                        <div class="tabs">
                            <div class="tab active" data-app-tab="all">All</div>
                            <div class="tab" data-app-tab="pending">Pending</div>
                            <div class="tab" data-app-tab="approved">Approved</div>
                            <div class="tab" data-app-tab="rejected">Rejected</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Specialization</th>
                                        <th>Date Applied</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1001</td>
                                        <td>Emily Davis</td>
                                        <td>emily.d@example.com</td>
                                        <td>Pediatric Care</td>
                                        <td>2025-05-05</td>
                                        <td><span class="status status-pending">Pending</span></td>
                                        <td>
                                            <button class="btn btn-success btn-sm" onclick="openReviewModal(1001, 'approve')">Approve</button>
                                            <button class="btn btn-danger btn-sm" onclick="openReviewModal(1001, 'reject')">Reject</button>
                                            <button class="btn btn-primary btn-sm" onclick="viewApplication(1001)">View</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1002</td>
                                        <td>Robert Wilson</td>
                                        <td>robert.w@example.com</td>
                                        <td>Geriatric Care</td>
                                        <td>2025-05-04</td>
                                        <td><span class="status status-pending">Pending</span></td>
                                        <td>
                                            <button class="btn btn-success btn-sm" onclick="openReviewModal(1002, 'approve')">Approve</button>
                                            <button class="btn btn-danger btn-sm" onclick="openReviewModal(1002, 'reject')">Reject</button>
                                            <button class="btn btn-primary btn-sm" onclick="viewApplication(1002)">View</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1003</td>
                                        <td>Jennifer Lee</td>
                                        <td>jennifer.l@example.com</td>
                                        <td>Post-Surgical Care</td>
                                        <td>2025-05-03</td>
                                        <td><span class="status status-approved">Approved</span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" onclick="viewApplication(1003)">View</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1004</td>
                                        <td>David Kim</td>
                                        <td>david.k@example.com</td>
                                        <td>Chronic Care</td>
                                        <td>2025-05-02</td>
                                        <td><span class="status status-rejected">Rejected</span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" onclick="viewApplication(1004)">View</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Certifications Tab -->
            <div class="tab-content" id="certifications">
                <div class="card">
                    <div class="card-header">
                        <h3>Certification Applications</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nurse Name</th>
                                        <th>Certification Type</th>
                                        <th>Date Submitted</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2001</td>
                                        <td>Sarah Johnson</td>
                                        <td>Advanced Cardiac Life Support</td>
                                        <td>2025-05-06</td>
                                        <td><span class="status status-pending">Pending</span></td>
                                        <td>
                                            <button class="btn btn-success btn-sm">Approve</button>
                                            <button class="btn btn-danger btn-sm">Reject</button>
                                            <button class="btn btn-primary btn-sm">View</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2002</td>
                                        <td>Michael Brown</td>
                                        <td>Pediatric Advanced Life Support</td>
                                        <td>2025-05-05</td>
                                        <td><span class="status status-rejected">Rejected</span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2003</td>
                                        <td>Lisa Wong</td>
                                        <td>Wound Care Certification</td>
                                        <td>2025-05-04</td>
                                        <td><span class="status status-approved">Approved</span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reports Tab -->
            <div class="tab-content" id="reports">
                <div class="card">
                    <div class="card-header">
                        <h3>Nurse Reports</h3>
                        <div class="tabs">
                            <div class="tab active" data-report-tab="all">All</div>
                            <div class="tab" data-report-tab="pending">Pending</div>
                            <div class="tab" data-report-tab="resolved">Resolved</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Report ID</th>
                                        <th>Reporter</th>
                                        <th>Reported Nurse</th>
                                        <th>Type</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>3001</td>
                                        <td>Patient #1234</td>
                                        <td>Nurse Emily</td>
                                        <td>Professional Conduct</td>
                                        <td>2025-05-07</td>
                                        <td><span class="status status-pending">Pending</span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                            <button class="btn btn-success btn-sm">Resolve</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3002</td>
                                        <td>Patient #5678</td>
                                        <td>Nurse Robert</td>
                                        <td>Service Quality</td>
                                        <td>2025-05-06</td>
                                        <td><span class="status status-pending">Pending</span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                            <button class="btn btn-success btn-sm">Resolve</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3003</td>
                                        <td>Patient #9012</td>
                                        <td>Nurse Jennifer</td>
                                        <td>Timeliness</td>
                                        <td>2025-05-05</td>
                                        <td><span class="status status-approved">Resolved</span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notifications Tab -->
            <div class="tab-content" id="notifications">
                <div class="card">
                    <div class="card-header">
                        <h3>Send Notifications</h3>
                    </div>
                    <div class="card-body">
                        <form id="notificationForm">
                            <div class="form-group">
                                <label for="notificationRecipient">Recipient</label>
                                <select id="notificationRecipient" class="form-control">
                                    <option value="all">All Nurses</option>
                                    <option value="specific">Specific Nurse</option>
                                    <option value="group">Group of Nurses</option>
                                </select>
                            </div>
                            <div class="form-group" id="specificNurseGroup" style="display: none;">
                                <label for="specificNurse">Select Nurse</label>
                                <select id="specificNurse" class="form-control">
                                    <option value="">Select a nurse</option>
                                    <option value="101">Emily Davis</option>
                                    <option value="102">Robert Wilson</option>
                                    <option value="103">Jennifer Lee</option>
                                </select>
                            </div>
                            <div class="form-group" id="nurseGroupGroup" style="display: none;">
                                <label for="nurseGroup">Select Group</label>
                                <select id="nurseGroup" class="form-control">
                                    <option value="">Select a group</option>
                                    <option value="pediatric">Pediatric Care Nurses</option>
                                    <option value="geriatric">Geriatric Care Nurses</option>
                                    <option value="surgical">Post-Surgical Care Nurses</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="notificationTitle">Title</label>
                                <input type="text" id="notificationTitle" class="form-control" placeholder="Notification title">
                            </div>
                            <div class="form-group">
                                <label for="notificationMessage">Message</label>
                                <textarea id="notificationMessage" class="form-control" placeholder="Enter your message here"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="notificationType">Type</label>
                                <select id="notificationType" class="form-control">
                                    <option value="info">Information</option>
                                    <option value="warning">Warning</option>
                                    <option value="urgent">Urgent</option>
                                    <option value="update">System Update</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Notification</button>
                        </form>
                    </div>
                </div>
            </div>

            
        </div>
    </div>

    <!-- Application Review Modal -->
    <div class="modal" id="reviewModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle">Review Application</h3>
                <span class="close" onclick="closeModal('reviewModal')">&times;</span>
            </div>
            <div class="modal-body">
                <div id="approveContent" style="display: none;">
                    <p>Are you sure you want to approve this application? The nurse will receive their login credentials via email.</p>
                    <div class="form-group">
                        <label for="username">Generated Username</label>
                        <input type="text" id="username" class="form-control" value="nurse_1001" readonly>
                    </div>
                    <div class="form-group">
                        <label for="password">Generated Password</label>
                        <input type="text" id="password" class="form-control" value="hC@r3P@ss" readonly>
                    </div>
                </div>
                <div id="rejectContent" style="display: none;">
                    <p>Are you sure you want to reject this application? Please provide a reason that will be sent to the applicant.</p>
                    <div class="form-group">
                        <label for="rejectionReason">Reason for Rejection</label>
                        <textarea id="rejectionReason" class="form-control" placeholder="Enter reason for rejection"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" onclick="closeModal('reviewModal')">Cancel</button>
                <button id="confirmAction" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>

    <!-- View Application Modal -->
    <div class="modal" id="viewApplicationModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Application Details</h3>
                <span class="close" onclick="closeModal('viewApplicationModal')">&times;</span>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Full Name</label>
                    <p>Emily Davis</p>
                </div>
                <div class="form-group">
                    <label>Date of Birth</label>
                    <p>1990-05-15</p>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <p>emily.d@example.com</p>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <p>(555) 123-4567</p>
                </div>
                <div class="form-group">
                    <label>Specialization</label>
                    <p>Pediatric Care</p>
                </div>
                <div class="form-group">
                    <label>Syndicate Number</label>
                    <p>RN-123456</p>
                </div>
                <div class="form-group">
                    <label>Languages</label>
                    <p>English, Spanish</p>
                </div>
                <div class="form-group">
                    <label>CV</label>
                    <p><a href="#" class="btn btn-light btn-sm">View CV</a></p>
                </div>
                <div class="form-group">
                    <label>Profile Picture</label>
                    <img src="https://via.placeholder.com/150" alt="Applicant Photo" style="max-width: 150px; display: block;">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" onclick="closeModal('viewApplicationModal')">Close</button>
            </div>
        </div>
    </div>

    <script>
        // Tab navigation
        document.querySelectorAll('.sidebar-menu a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all tabs and links
                document.querySelectorAll('.sidebar-menu a').forEach(item => {
                    item.classList.remove('active');
                });
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.remove('active');
                });
                
                // Add active class to clicked link
                this.classList.add('active');
                
                // Show corresponding tab content
                const tabId = this.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });

        // Application tabs
        document.querySelectorAll('[data-app-tab]').forEach(tab => {
            tab.addEventListener('click', function() {
                document.querySelectorAll('[data-app-tab]').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                // In a real app, you would filter the table here
            });
        });

        // Report tabs
        document.querySelectorAll('[data-report-tab]').forEach(tab => {
            tab.addEventListener('click', function() {
                document.querySelectorAll('[data-report-tab]').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                // In a real app, you would filter the table here
            });
        });

        // Notification recipient selection
        document.getElementById('notificationRecipient').addEventListener('change', function() {
            const specificNurseGroup = document.getElementById('specificNurseGroup');
            const nurseGroupGroup = document.getElementById('nurseGroupGroup');
            
            specificNurseGroup.style.display = 'none';
            nurseGroupGroup.style.display = 'none';
            
            if (this.value === 'specific') {
                specificNurseGroup.style.display = 'block';
            } else if (this.value === 'group') {
                nurseGroupGroup.style.display = 'block';
            }
        });

        // Form submission
        document.getElementById('notificationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Notification sent successfully!');
            this.reset();
            document.getElementById('specificNurseGroup').style.display = 'none';
            document.getElementById('nurseGroupGroup').style.display = 'none';
        });

        // Modal functions
        function openReviewModal(id, action) {
            const modal = document.getElementById('reviewModal');
            const modalTitle = document.getElementById('modalTitle');
            const approveContent = document.getElementById('approveContent');
            const rejectContent = document.getElementById('rejectContent');
            const confirmBtn = document.getElementById('confirmAction');
            
            if (action === 'approve') {
                modalTitle.textContent = 'Approve Application';
                approveContent.style.display = 'block';
                rejectContent.style.display = 'none';
                confirmBtn.textContent = 'Approve';
                confirmBtn.className = 'btn btn-success';
                confirmBtn.onclick = function() {
                    alert(`Application ${id} approved! Credentials sent to nurse's email.`);
                    closeModal('reviewModal');
                    // In a real app, you would update the UI and send data to the server
                };
            } else {
                modalTitle.textContent = 'Reject Application';
                approveContent.style.display = 'none';
                rejectContent.style.display = 'block';
                confirmBtn.textContent = 'Reject';
                confirmBtn.className = 'btn btn-danger';
                confirmBtn.onclick = function() {
                    const reason = document.getElementById('rejectionReason').value;
                    if (!reason) {
                        alert('Please provide a reason for rejection');
                        return;
                    }
                    alert(`Application ${id} rejected. Reason sent to applicant.`);
                    closeModal('reviewModal');
                    // In a real app, you would update the UI and send data to the server
                };
            }
            
            modal.style.display = 'flex';
        }

        function viewApplication(id) {
            // In a real app, you would fetch the application details based on ID
            const modal = document.getElementById('viewApplicationModal');
            modal.style.display = 'flex';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Close modal when clicking outside of it
        window.addEventListener('click', function(event) {
            if (event.target.className === 'modal') {
                event.target.style.display = 'none';
            }
        });
    </script>
</body>
</html>