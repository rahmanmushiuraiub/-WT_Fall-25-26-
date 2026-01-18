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
    <link rel="stylesheet" href="../css/userDashboard.css">
</head>
<body>
<div class="navbar">
    <h2>Event Management System</h2>
    <div class="nav-links">
        <span>Welcome, <strong><?php echo htmlspecialchars($username); ?></strong>!</span>
        <a href="../php/logout.php" class="logout-btn">Logout</a>
    </div>
</div>

<div class="container">
    <div class="sidebar">
        <a href="dashboard.php" class="active">Dashboard</a>
        <a href="events.php">View Events</a>
        <a href="myBookings.php">My Bookings</a>
        <a href="requestEvent.php">Request Event</a>
        <a href="payment.php">Payment</a>
    </div>

    <div class="main-content">
        <h2>Dashboard</h2>
        <p>Welcome to your dashboard, <?php echo htmlspecialchars($username); ?>!</p>
        <p>Here you can manage your events, bookings, and requests.</p>

        <!-- Events We Are Working On -->
        <div class="working-events">
            <h3>Events We Are Working On</h3>
            <table class="event-list">
                <tr>
                    <th>Event Name</th>
                    <th>Total Cost</th>
                </tr>
                <tr>
                    <td>Corporate Seminar</td>
                    <td>৳45,000</td>
                </tr>
                <tr>
                    <td>Wedding Ceremony</td>
                    <td>৳125,000</td>
                </tr>
                <tr>
                    <td>Music Concert</td>
                    <td>৳300,000</td>
                </tr>
                <tr>
                    <td>Charity Fundraiser</td>
                    <td>৳60,000</td>
                </tr>
                <tr>
                    <td>Tech Conference</td>
                    <td>৳72,000</td>
                </tr>
                <tr>
                    <td>Food Festival</td>
                    <td>৳240,000</td>
                </tr>
            </table>
        </div>
    </div>
</div>

</body>
</html>
