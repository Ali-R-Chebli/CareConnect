<?php
require_once 'db_connection.php';

if (isset($_GET['id'])) {
    $certId = $_GET['id'];
    
    $query = "SELECT c.*, u.FullName AS NurseName, u.Email AS NurseEmail
              FROM certification c
              JOIN nurse n ON c.NurseID = n.NurseID
              JOIN user u ON n.UserID = u.UserID
              WHERE c.CertificationID = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $certId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        echo "<div class='certification-details'>";
        
        // Left column
        echo "<div class='left-column'>";
        echo "<div class='detail-group'>";
        echo "<label>Nurse Name:</label>";
        echo "<p>{$row['NurseName']}</p>";
        echo "</div>";
        
        echo "<div class='detail-group'>";
        echo "<label>Nurse Email:</label>";
        echo "<p>{$row['NurseEmail']}</p>";
        echo "</div>";
        
        echo "<div class='detail-group'>";
        echo "<label>Certification Type:</label>";
        echo "<p>{$row['Name']}</p>";
        echo "</div>";
        
        echo "<div class='detail-group'>";
        echo "<label>Status:</label>";
        $statusClass = strtolower($row['Status']);
        echo "<p><span class='status status-$statusClass'>{$row['Status']}</span></p>";
        echo "</div>";
        echo "</div>";
        
        // Right column
        echo "<div class='right-column'>";
        echo "<div class='detail-group'>";
        echo "<label>Submitted On:</label>";
        echo "<p>" . date('F j, Y \a\t g:i a', strtotime($row['CreatedAt'])) . "</p>";
        echo "</div>";
        
        if (!empty($row['Comment'])) {
            echo "<div class='detail-group'>";
            echo "<label>Comments:</label>";
            echo "<p>{$row['Comment']}</p>";
            echo "</div>";
        }
        
        if (!empty($row['Image'])) {
            echo "<div class='detail-group'>";
            echo "<label>Document:</label>";
            echo "<div style='margin-top: 10px;'>";
            echo "<img src='{$row['Image']}' alt='Certification Document'>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
        
        echo "</div>"; // Close certification-details
        
        // Show action buttons if pending
        if ($row['Status'] === 'Pending') {
            echo "<div class='action-buttons'>";
            echo "<form method='post' action='certifications.php' onsubmit='return confirmAction(\"approve\")'>";
            echo "<input type='hidden' name='certification_id' value='{$row['CertificationID']}'>";
            echo "<input type='hidden' name='action' value='approve'>";
            echo "<button type='submit' class='btn btn-success'>Approve</button>";
            echo "</form>";
            
            echo "<form method='post' action='certifications.php' onsubmit='return confirmAction(\"reject\")'>";
            echo "<input type='hidden' name='certification_id' value='{$row['CertificationID']}'>";
            echo "<input type='hidden' name='action' value='reject'>";
            echo "<button type='submit' class='btn btn-danger'>Reject</button>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "<div class='alert alert-error'>Certification details not found.</div>";
    }
    
    $stmt->close();
} else {
    echo "<div class='alert alert-error'>Invalid request.</div>";
}
?>