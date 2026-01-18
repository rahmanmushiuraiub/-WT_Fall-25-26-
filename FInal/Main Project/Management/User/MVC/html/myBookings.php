
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Bookings</title>
    <link rel="stylesheet" href="../css/userDashboard.css">
</head>
<body>

<div class="navbar">
    <h2>Event Management System</h2>
    <a href="dashboard.php">Back to Dashboard</a>
    <a href="../php/logout.php" class="logout-btn">Logout</a>
</div>


<div class="container">
    <div class="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="events.php">View Events</a>
        <a href="myBookings.php" class="active">My Bookings</a>
        <a href="requestEvent.php">Request Event</a>
        <a href="payment.php">Payment</a>
    </div>

    <div class="main-content">
        <h2>All Accepted Bookings</h2>
        
        <?php include "../php/myBookings.php"; ?>
        
        
        
        <?php if (!empty($bookings)): ?>
            <table border="1" cellpadding="10" style="width: 100%; border-collapse: collapse;">
                <tr style="background-color: #4CAF50; color: white;">
                    <th>Event ID</th>
                    <th>Event Name</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Booked By</th>
                    <th>Email</th>
                </tr>
                
                <?php foreach ($bookings as $booking): ?>
                    <tr style="background-color: #d4edda;">
                        <td><?= htmlspecialchars($booking['event_id']) ?></td>
                        <td><?= htmlspecialchars($booking['event_name']) ?></td>
                        <td><?= htmlspecialchars($booking['event_date']) ?></td>
                        <td><?= htmlspecialchars($booking['event_location']) ?></td>
                        <td><?= htmlspecialchars($booking['event_description']) ?></td>
                        <td><?= htmlspecialchars($booking['status']) ?></td>
                        <td><?= htmlspecialchars($booking['fullname'] ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($booking['email'] ?? 'N/A') ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p style="text-align: center; color: #666;">No accepted bookings found.</p>
        <?php endif; ?>
    </div>
    
</div>

</body>
</html>
