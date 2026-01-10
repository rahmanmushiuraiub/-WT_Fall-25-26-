<?php
session_start();
include "../db/db.php";

if (!isset($_SESSION['id'])) {
    header("Location: ../html/login.php");
    exit();
}
$sql = "SELECT id, fullname, email 
        FROM `user`";

$result = $conn->query($sql);

if (!$result) {
    die("Query Failed: " . $conn->error);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Event</title>
    <link rel="stylesheet" href="../css/createEvent.css">
</head>
<body>

<div class="event-form">
    <h2>Create Event</h2>
 <form method="POST" action="../php/createEvent.php">

        <label>Event Name</label>
        <input type="text" name="eventName" required>

        <label>Date</label>
        <input type="date" name="eventDate" required>

        <label>Time</label>
        <input type="time" name="eventTime" required>

        <label>Location</label>
        <input type="text" name="eventLocation" required>

        <label>Description</label>
        <textarea name="eventDescription" required></textarea>

        <label>All Approved Users</label>
        <select name="approvedUsers[]" multiple size="6" required>
