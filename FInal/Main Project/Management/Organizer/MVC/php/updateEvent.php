<?php
include("../db/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $eventEmail = trim($_POST['eventemail']);
    $eventName = trim($_POST['eventname']);
    $eventTotalPerson = trim($_POST['eventtotalperson']);
    $eventDetails = trim($_POST['eventdetails']);

    if (empty($eventEmail) || empty($eventName) || empty($eventTotalPerson) || empty($eventDetails)) {
        echo "All fields are required!";
        exit;
    }

    $stmt = $conn->prepare("UPDATE Event SET eventname=?, eventtotalperson=?, eventdetails=? WHERE eventemail=?");
    $stmt->bind_param("siss", $eventName, $eventTotalPerson, $eventDetails, $eventEmail);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Event updated successfully!";
        } else {
            echo "No event found with that email, or nothing changed.";
        }
    } else {
        echo "Error updating event: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

} else {
    echo "Invalid request method.";
}
?>
