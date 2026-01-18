<?php
session_start();
require "../db/db.php";


if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../html/organizerDashboard.php");
    exit();
}


$eventName        = trim($_POST['eventName'] ?? '');
$eventDate        = trim($_POST['eventDate'] ?? '');
$eventTime        = trim($_POST['eventTime'] ?? '');
$eventLocation    = trim($_POST['eventLocation'] ?? '');
$eventDescription = trim($_POST['eventDescription'] ?? '');
$approvedUsers    = $_POST['approvedUsers'] ?? [];
$status           = "Ongoing";


if (
    empty($eventName) || empty($eventDate) || empty($eventTime) ||
    empty($eventLocation) || empty($eventDescription)
) {
    die("All fields are required.");
}

if (empty($approvedUsers)) {
    die("Please select at least one approved user.");
}


$eventSql = "INSERT INTO events 
(event_name, event_date, event_time, event_location, event_description, status)
VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($eventSql);
$stmt->bind_param(
    
);

if ($stmt->execute()) {
    $eventId = $stmt->insert_id;

    
    $userSql = "INSERT INTO event_users (event_id, user_id, booking_status)
                VALUES (?, ?, 'Ongoing')";
    $userStmt = $conn->prepare($userSql);

    foreach ($approvedUsers as $userId) {
        $userId = intval($userId);
        $userStmt->bind_param("ii", $eventId, $userId);
        $userStmt->execute();
    }

    header("Location: ../html/organizerDashboard.php?success=event_created");
    exit();
} else {
    echo "Error creating event.";
}

$conn->close();
