<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    include "../db/db.php"; // make sure this connects to your DB

    if (!isset($_SESSION['user_id'])) {
        die("User not logged in");
    }

    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'] ?? 'Guest';

    // Collect and sanitize form data
    $eventName = trim($_POST['eventName']);
    $eventDate = trim($_POST['eventDate']);
    $eventLocation = trim($_POST['eventLocation']);
    $eventDescription = trim($_POST['eventDescription']);

    if (empty($eventName) || empty($eventDate) || empty($eventLocation) || empty($eventDescription)) {
        die("All fields are required");
    }

    // Map event names to costs
    $eventCosts = [
        "Corporate Seminar" => 45000,
        "Wedding Ceremony" => 125000,
        "Music Concert" => 300000,
        "Charity Fundraiser" => 60000,
        "Tech Conference" => 72000,
        "Food Festival" => 240000
    ];

    $eventCost = $eventCosts[$eventName] ?? 0;

    // Insert using prepared statement
    $stmt = $conn->prepare("INSERT INTO event_requests 
        (user_id, user_name, event_name, event_date, event_location, event_description, event_cost, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, 'Pending')");

    $stmt->bind_param("isssssd", $user_id, $user_name, $eventName, $eventDate, $eventLocation, $eventDescription, $eventCost);

    if ($stmt->execute()) {
        echo "<script>
                alert('Event request submitted successfully!');
                window.location.href='../html/dashboard.php';
              </script>";
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
