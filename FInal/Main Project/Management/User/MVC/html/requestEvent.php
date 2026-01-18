<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/login.php"); 
    exit();
}
$username = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Guest';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Request Event</title>
    <link rel="stylesheet" href="../css/userDashboard.css">
    <link rel="stylesheet" href="../css/requestEvent.css">
</head>
<body>


    <div class="main-content">
        <h2>Request an Event</h2>

       
        <div class="request-form">
            <h3>Request Details</h3>
            <form method="POST" action="../php/requestEvent.php">
                <label for="eventName">Select Event Name:</label>
                <select id="eventName" name="eventName" required>
                    <option value="">-- Choose an event --</option>
                    <option value="Corporate Seminar">Corporate Seminar (৳45,000)</option>
                    <option value="Wedding Ceremony">Wedding Ceremony (৳125,000)</option>
                    <option value="Music Concert">Music Concert (৳300,000)</option>
                    <option value="Charity Fundraiser">Charity Fundraiser (৳60,000)</option>
                    <option value="Tech Conference">Tech Conference (৳72,000)</option>
                    <option value="Food Festival">Food Festival (৳240,000)</option>
                </select>

                <label for="eventDate">Event Date:</label>
                <input type="date" id="eventDate" name="eventDate" required>

                <label for="eventLocation">Event Location:</label>
                <input type="text" id="eventLocation" name="eventLocation" required>

                <label for="eventDescription">Event Description:</label>
                <textarea id="eventDescription" name="eventDescription" required></textarea>

                <input type="submit" value="Submit Request">
            </form>
        </div>
    </div>
</div>

</body>
</html>
