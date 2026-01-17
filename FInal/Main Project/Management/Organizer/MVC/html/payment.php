<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Organizer Payment Verification</title>
    <link rel="stylesheet" href="../css/payment.css">
</head>
<body>

<div class="payment-container">
    <h2>Payment Verification Panel</h2>

    <!-- Event Info -->
    <div class="card">
        <h3>Event Details</h3>
        <p><strong>Event Name:</strong> Tech Conference 2026</p>
        <p><strong>Date:</strong> 25 March 2026</p>
        <p><strong>Ticket Price:</strong> ৳1500</p>
    </div>

    <!-- User Info -->
    <div class="card">
        <h3>User Information</h3>
        <p><strong>Name:</strong> User Name</p>
        <p><strong>Email:</strong> user@email.com</p>
        <p><strong>Phone:</strong> 01XXXXXXXXX</p>
    </div>

    <!-- Transaction Check -->
    <div class="card">
        <h3>Transaction Verification</h3>

        <label>Payment Method</label>
        <select>
            <option>bKash</option>
            <option>Nagad</option>
            <option>Rocket</option>
            <option>Bank Transfer</option>
        </select>

        <label>Transaction ID</label>
        <input type="text" placeholder="Enter Transaction ID">

        <label>Paid Amount</label>
        <input type="text" placeholder="৳1600" readonly>
    </div>

    <!-- Action Buttons -->
    <div class="action-btns">
        <button class="verify-btn">Verify Payment</button>
        <button class="reject-btn">Reject</button>
    </div>
</div>

</body>
</html>
