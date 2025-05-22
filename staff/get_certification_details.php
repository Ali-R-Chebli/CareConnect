<?php
require_once 'db_connection.php';

if (isset($_GET['id'])) {
    $certification_id = intval($_GET['id']);
    
    $query = "SELECT c.*, u.FullName, u.Email, u.PhoneNumber 
              FROM certification c
              JOIN nurse n ON c.NurseID = n.NurseID
              JOIN user u ON n.UserID = u.UserID
              WHERE c.CertificationID = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $certification_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<p><strong>Nurse Name:</strong> ' . htmlspecialchars($row['FullName']) . '</p>';
        echo '<p><strong>Certification Type:</strong> ' . htmlspecialchars($row['Name']) . '</p>';
        echo '<p><strong>Status:</strong> ' . htmlspecialchars($row['Status']) . '</p>';
        echo '<p><strong>Submitted On:</strong> ' . date('Y-m-d H:i', strtotime($row['CreatedAt'])) . '</p>';
        
        if (!empty($row['Comment'])) {
            echo '<p><strong>Comments:</strong> ' . htmlspecialchars($row['Comment']) . '</p>';
        }
        
        if (!empty($row['Image'])) {
            echo '<p><strong>Document:</strong></p>';
            echo '<img src="' . htmlspecialchars($row['Image']) . '" style="max-width: 100%;" alt="Certification Document">';
        }
        
        echo '<p><strong>Contact Info:</strong></p>';
        echo '<p>Email: ' . htmlspecialchars($row['Email']) . '</p>';
        echo '<p>Phone: ' . htmlspecialchars($row['PhoneNumber']) . '</p>';
    } else {
        echo 'Certification details not found.';
    }
    
    $stmt->close();
} else {
    echo 'Invalid request.';
}
?>