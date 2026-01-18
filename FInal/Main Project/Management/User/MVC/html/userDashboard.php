<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../php/login.php");
    exit();
}

$username = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Guest';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../css/userDashboard.css">
</head>
<body>

<div class="navbar">
    <h2>Event Management System</h2>
    <p>Welcome, <strong><?= htmlspecialchars($username) ?></strong>!</p>
    <a href="../php/logout.php" class="logout-btn">Logout</a>
</div>

<div class="container">

    <div class="sidebar">
        <a href="userDashboard.php">Dashboard</a>
        <a href="events.php">View Events</a>
        <a href="myBookings.php">My Bookings</a>
        <a href="requestEvent.php">Request Event</a>
        <a href="payment.php">Payment</a>
        <a href="profile.php">Profile</a>
        <a href="#">Update Profile</a>
    </div>

    <div class="main-content">
        <h3>Dashboard</h3>
        <p>Welcome to your user dashboard. Here you can view upcoming events, manage your bookings, and request new events.</p>
    </div>

</div>

</body>
</html>
