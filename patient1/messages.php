<?php
require '../connect.php';

session_start();
$patient_id = $_SESSION['user_id'] ;

if (isset($_POST['confirm_logout'])) {
    // session_destroy();
    unset($_SESSION['email']);
    unset($_SESSION['role']);
    unset($_SESSION['full_name']);
    unset($_SESSION['user_id']);
    session_destroy();
    header("Location: ../homepage/mainpage.php");
    exit();
}

// Fetch conversations (distinct nurses the patient has messaged)
$sql = "SELECT DISTINCT n.NurseID, u.FullName, ns.ServiceID, s.Name AS ServiceName
        FROM chat c
        JOIN nurse n ON c.RecipientID = n.UserID OR c.SenderID = n.UserID
        JOIN user u ON n.UserID = u.UserID
        LEFT JOIN nurseservices ns ON n.NurseID = ns.NurseID
        LEFT JOIN service s ON ns.ServiceID = s.ServiceID
        WHERE c.SenderID = (SELECT UserID FROM patient WHERE PatientID = $patient_id)
           OR c.RecipientID = (SELECT UserID FROM patient WHERE PatientID = $patient_id)";
$result = $conn->query($sql);
$conversations = [];
while ($row = $result->fetch_assoc()) {
    $conversations[] = $row;
}

// Fetch messages for the selected nurse (default to first nurse)
$selected_nurse_id = isset($_GET['nurse_id']) ? (int)$_GET['nurse_id'] : ($conversations ? $conversations[0]['NurseID'] : 0);
$sql = "SELECT c.*, u.FullName
        FROM chat c
        JOIN user u ON u.UserID = c.SenderID
        WHERE (c.SenderID = (SELECT UserID FROM patient WHERE PatientID = $patient_id) AND c.RecipientID = (SELECT UserID FROM nurse WHERE NurseID = $selected_nurse_id))
           OR (c.SenderID = (SELECT UserID FROM nurse WHERE NurseID = $selected_nurse_id) AND c.RecipientID = (SELECT UserID FROM patient WHERE PatientID = $patient_id))
        ORDER BY c.Date ASC";
$result = $conn->query($sql);
$messages = [];
while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

// Handle new message submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $conn->real_escape_string($_POST['message']);
    $sender_id = $conn->query("SELECT UserID FROM patient WHERE PatientID = $patient_id")->fetch_assoc()['UserID'];
    $recipient_id = $conn->query("SELECT UserID FROM nurse WHERE NurseID = $selected_nurse_id")->fetch_assoc()['UserID'];
    $sql = "INSERT INTO chat (SenderID, RecipientID, Message, Date, Status) VALUES ($sender_id, $recipient_id, '$message', NOW(), 'sent')";
    if ($conn->query($sql) === TRUE) {
        header("Location: messages.php?nurse_id=$selected_nurse_id");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Nursing - Messages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/patient.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include 'sidebar.php'; ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
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
                                    <?php foreach ($conversations as $conv): ?>
                                        <a href="messages.php?nurse_id=<?php echo $conv['NurseID']; ?>" class="list-group-item list-group-item-action <?php echo $conv['NurseID'] == $selected_nurse_id ? 'active' : ''; ?>">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar me-3"><?php echo substr($conv['FullName'], 0, 2); ?></div>
                                                <div>
                                                    <h6 class="mb-0"><?php echo htmlspecialchars($conv['FullName']); ?></h6>
                                                    <small class="text-muted"><?php echo htmlspecialchars($conv['ServiceName'] ?? 'General'); ?> - <?php echo date('M d', strtotime('+1 day')); ?></small>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card shadow h-100">
                            <div class="card-header py-3 d-flex align-items-center">
                                <div class="avatar me-3"><?php echo $conversations ? substr($conversations[0]['FullName'], 0, 2) : 'N/A'; ?></div>
                                <div>
                                    <h6 class="m-0 fw-bold"><?php echo $conversations ? htmlspecialchars($conversations[0]['FullName']) : 'No Nurse Selected'; ?></h6>
                                    <small class="text-muted"><?php echo $conversations ? htmlspecialchars($conversations[0]['ServiceName'] ?? 'General') : ''; ?></small>
                                </div>
                            </div>
                            <div class="card-body chat-container" style="height: 400px; overflow-y: auto;">
                                <?php foreach ($messages as $msg): ?>
                                    <div class="chat-message <?php echo $msg['SenderID'] == $sender_id ? 'chat-message-out' : 'chat-message-in'; ?>">
                                        <div class="message-text"><?php echo htmlspecialchars($msg['Message']); ?></div>
                                        <div class="message-time small <?php echo $msg['SenderID'] == $sender_id ? 'text-white-50' : 'text-muted'; ?>">
                                            <?php echo date('M d, H:i', strtotime($msg['Date'])); ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="card-footer">
                                <form method="POST">
                                    <div class="input-group">
                                        <input type="text" name="message" class="form-control" placeholder="Type your message..." required>
                                        <button class="btn btn-primary" type="submit">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

        <?php include "logout.php" ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/patient.js"></script>
</body>
</html>