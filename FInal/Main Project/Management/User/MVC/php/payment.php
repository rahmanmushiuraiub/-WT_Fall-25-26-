<?php

$userId     = $_SESSION['user_id'];
$userName   = $_SESSION['user_name'] ?? 'Guest';
$userEmail  = $_SESSION['user_email'] ?? '';

include "../db/db.php";


$sql = "SELECT 
            er.id AS event_id,
            er.event_name,
            er.event_date,
            er.event_location,
            er.event_description,
            er.event_cost
        FROM event_requests er
        WHERE er.status = 'Accepted'
        ORDER BY er.event_date DESC";

$result = $conn->query($sql);

if (!$result) {
    die("Query Error: " . $conn->error);
}

$bookings = $result->fetch_all(MYSQLI_ASSOC);

$payment_message = '';
$selected_cost   = 0;
$event_name      = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $event_id        = intval($_POST['event_id'] ?? 0);
    $payment_method = trim($_POST['payment_method'] ?? '');
    $transaction_id = trim($_POST['transaction_id'] ?? '');

    
    foreach ($bookings as $booking) {
        if ($booking['event_id'] == $event_id) {
            $selected_cost = $booking['event_cost'];
            $event_name    = $booking['event_name'];
            break;
        }
    }

    if ($event_id > 0 && $selected_cost > 0 && !empty($payment_method) && !empty($transaction_id)) {

        $stmt = $conn->prepare(
            "INSERT INTO payments 
             (user_id, event_id, amount, payment_method, transaction_id)
             VALUES (?, ?, ?, ?, ?)"
        );

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        /* i = int, d = double, s = string */
        $stmt->bind_param(
            "iidss",
            $userId,
            $event_id,
            $selected_cost,
            $payment_method,
            $transaction_id
        );

        if ($stmt->execute()) {
            $payment_message = "Payment of Tk {$selected_cost} for '{$event_name}' completed successfully.";
        } else {
            $payment_message = "Payment failed: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $payment_message = "Please select an event, payment method, and enter transaction ID.";
    }
}

$conn->close();
?>
