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
    "ssssss",
    $eventName,
    $eventDate,
    $eventTime,
    $eventLocation,
    $eventDescription,
    $status
);


$conn->close();
