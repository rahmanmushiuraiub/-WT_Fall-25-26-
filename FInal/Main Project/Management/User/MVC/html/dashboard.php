<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get user information from session
$username = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Guest';
$userEmail = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
<div class="navbar">
    <h2>Event Management System</h2>
    <p>Welcome, <strong><?php echo htmlspecialchars($username); ?></strong>!</p>
    <a href="../php/logout.php" class="logout-btn">Logout</a>
</div>

<div class="container">
    <div class="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="events.php">View Events</a>
        <a href="myBookings.php">My Bookings</a>
        <a href="requestEvent.php">Request Event</a>
        <a href="contactus.php">Contact Us</a>
    </div>

    <div class="main-content">
        <h3>Dashboard</h3>
        <p>Welcome to your dashboard, <?php echo htmlspecialchars($username); ?>!</p>
        <p>Here you can manage your events, bookings, and requests.</p>
    </div>
</div>

</body>
</html>
