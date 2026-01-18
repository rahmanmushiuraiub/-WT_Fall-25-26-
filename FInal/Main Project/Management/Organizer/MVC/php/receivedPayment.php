<?php
include "../db/db.php";

// Get search parameter
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$events = array();
$payment_details = null;
$selected_event_id = isset($_GET['event_id']) ? intval($_GET['event_id']) : 0;

// Fetch accepted events
$query = "SELECT id, event_name, event_date, event_location, event_cost FROM event_requests WHERE status = 'Accepted' ORDER BY event_name ASC";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}

// If event is selected show payment details
if ($selected_event_id > 0) {
    $event_query = "SELECT id, event_name, event_date, event_location, event_cost, user_name FROM event_requests WHERE id = $selected_event_id AND status = 'Accepted'";
    $event_result = $conn->query($event_query);
    
    if ($event_result && $event_result->num_rows > 0) {
        $payment_details = $event_result->fetch_assoc();
    }
}

