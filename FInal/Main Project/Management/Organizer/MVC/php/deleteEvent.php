<?php
include("../db/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $eventEmail = trim($_POST['eventemail']);

    if (empty($eventEmail)) {
        echo "Please provide an event email.";
        exit;
    }

    $sql = "DELETE FROM Event WHERE eventemail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $eventEmail);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Event deleted successfully.";
        } else {
            echo "No event found with this email.";
        }
    } else {
        echo "Error deleting event: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

} else {
    echo "Invalid request method.";
}
?>
