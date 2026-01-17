<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "../db/db.php";

    $event_id = intval($_POST['event_id']);
    $action = $_POST['action'];

    if ($action === 'accept') {
        $status = 'Accepted';
    } elseif ($action === 'reject') {
        $status = 'Denied';
    } else {
        die("Invalid action");
    }

    $sql = "UPDATE event_requests SET status='$status' WHERE event_id=$event_id";

    

    $conn->close();
}
?>
