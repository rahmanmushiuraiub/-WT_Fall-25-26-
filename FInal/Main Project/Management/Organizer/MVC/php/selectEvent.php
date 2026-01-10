<?php
include("../db/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $eventEmail = trim($_POST['eventemail']);

    $sql = "SELECT eventname, eventtotalperson, eventdetails 
            FROM Event 
            WHERE eventemail = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $eventEmail);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        echo "Event Name: " . $row['eventname'] . "<br>";
        echo "Total Person: " . $row['eventtotalperson'] . "<br>";
        echo "Details: " . $row['eventdetails'] . "<br>";
    } else {
        echo "Event not found.";
    }

    $stmt->close();
    $conn->close();

} else {
    echo "Invalid request method.";
}
?>
