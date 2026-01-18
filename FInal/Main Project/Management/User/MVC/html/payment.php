<?php
session_start();

/* Login check */
if (!isset($_SESSION['user_id'])) {
    header("Location: ../php/login.php");
    exit();
}

$userId   = $_SESSION['user_id'];
$userName = $_SESSION['user_name'] ?? 'Guest';
$userEmail = $_SESSION['user_email'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Payment</title>
    <link rel="stylesheet" href="../css/payment.css">
</head>
<body>

<div class="navbar">
    <h2>Event Management System</h2>
    <div class="nav-links">
        <a href="dashboard.php">Dashboard</a>
        <a href="myBookings.php">My Bookings</a>
        <a href="../php/logout.php">Logout</a>
    </div>
</div>

<div class="container">
    <div class="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="events.php">View Events</a>
        <a href="myBookings.php">My Bookings</a>
        <a href="requestEvent.php">Request Event</a>
        <a href="payment.php" class="active">Payment</a>
    </div>

    <div class="main-content">
        <h2>Event Payment</h2>

        <?php include "../php/payment.php"; ?>

        <?php if (!empty($payment_message)): ?>
            <div class="<?= strpos($payment_message, 'successfully') !== false ? 'success' : 'error' ?>">
                <?= htmlspecialchars($payment_message) ?>
            </div>
        <?php endif; ?>

        

        <form method="POST">
            <div class="card">
                <h3>Select Event</h3>
                <select name="event_id" required>
                    <option value="">-- Choose an event --</option>
                    <?php foreach ($bookings as $booking): ?>
                        <option value="<?= $booking['event_id'] ?>">
                            <?= htmlspecialchars($booking['event_name']) ?> - <?= htmlspecialchars($booking['event_date']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="card">
                <h3>User Information</h3>
                <input type="text" value="<?= htmlspecialchars($userName) ?>" readonly>
                <input type="email" value="<?= htmlspecialchars($userEmail) ?>" readonly>
            </div>

            <div class="card">
                <h3>Payment Method</h3>
                <label><input type="radio" name="payment_method" value="Credit Card" required> Credit / Debit Card</label>
                <label><input type="radio" name="payment_method" value="Mobile Banking"> Mobile Banking</label>
                <label><input type="radio" name="payment_method" value="Bank Transfer"> Bank Transfer</label>
            </div>
            <div>
                <h3>
                    Transaction ID:
                </h3>
                <input type="text" name="transaction_id" placeholder="Enter transaction ID" required>
                
            </div>

            <div class="card">
                <h3>Payment Summary</h3>
                         <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $selected_cost > 0): ?>
        <p>Event: <?= htmlspecialchars($event_name) ?></p>
        <p>Amount: Tk <?= htmlspecialchars($selected_cost) ?></p>
    <?php else: ?>
        <p>Select an event to see payment details</p>
    <?php endif; ?>
            </div>

            <button type="submit">Pay Now</button>
        </form>
    </div>
</div>

</body>
</html>
