<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "../db/db.php";

    $eventName = trim($_POST['eventName']);
    $eventDate = trim($_POST['eventDate']);
    $eventLocation = trim($_POST['eventLocation']);
    $eventDescription = trim($_POST['eventDescription']);

    if (empty($eventName) || empty($eventDate) || empty($eventLocation) || empty($eventDescription)) {
        die("All fields are required");
    }

    $sql = "INSERT INTO event_requests (event_name, event_date, event_location, event_description, status)
            VALUES ('$eventName', '$eventDate', '$eventLocation', '$eventDescription', 'pending')";

    if ($conn->query($sql)){
        echo "<script>
                alert('Event request submitted successfully! Thank you for contacting us.');
                window.location.href='../html/userDashboard.php';
              </script>";
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}