<?php
session_start();

if (!isset($_SESSION['organizer_id'])) {
    header("Location: ../../../User/MVC/html/login.php");
    exit();
}

$organizerName = isset($_SESSION['organizer_name']) ? $_SESSION['organizer_name'] : 'Organizer';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Received Payment</title>
    <link rel="stylesheet" href="../css/receivedPayment.css">
</head>
<body>



    <div class="main-content">
        <h2>Received Payment</h2>

        <?php include "../php/receivedPayment.php"; ?>

        <div class="payment-container">
           
            <div class="search-box">
                <input type="text" id="search-input" placeholder="Search events by name or location...">
                <button onclick="filterEvents()">Search</button>
            </div>

            
            
            <?php if ($payment_details): ?>
                <div class="payment-form">
                    <h3>Payment Details</h3>
                    
                    <?php if (!empty($verification_message)): ?>
                        <div class="message success"><?= $verification_message ?></div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label>Event Name:</label>
                        <input type="text" value="<?= htmlspecialchars($payment_details['event_name']) ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Event Date:</label>
                        <input type="text" value="<?= htmlspecialchars($payment_details['event_date']) ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Location:</label>
                        <input type="text" value="<?= htmlspecialchars($payment_details['event_location']) ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>User Name:</label>
                        <input type="text" value="<?= htmlspecialchars($payment_details['user_name']) ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Amount (৳):</label>
                        <input type="text" value="<?= htmlspecialchars($payment_details['event_cost']) ?>" readonly>
                    </div>

                    <form method="POST">
                        <div class="form-group">
                            <label>Transaction ID:</label>
                            <input type="text" name="transaction_id" placeholder="Enter transaction ID to verify" required>
                        </div>

                        <input type="hidden" name="event_id" value="<?= $selected_event_id ?>">
                        <button type="submit" class="verify-btn">Verify Payment</button>
                    </form>
                </div>
            <?php else: ?>
                <div style="background: white; padding: 20px; border-radius: 4px; text-align: center; color: #666;">
                    Select an event to view payment details
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    function selectEvent(eventId) {
        window.location.href = '?event_id=' + eventId;
    }

    function filterEvents() {
        const searchTerm = document.getElementById('search-input').value.toLowerCase();
        const eventItems = document.querySelectorAll('.event-item');
        
        eventItems.forEach(item => {
            const text = item.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // Real-time search
    document.getElementById('search-input').addEventListener('keyup', filterEvents);
</script>

</body>
</html>
