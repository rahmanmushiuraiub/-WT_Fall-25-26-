<?php
session_start();
include "../db/db.php";
$userId = $_SESSION['id'];
$query = "SELECT * FROM bookings WHERE user_id = $userId ORDER BY id DESC";
$result = $conn->query($query);
if (!$result) {
    die("Query Failed: " . $conn->error);
}
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['event_name']}</td>";
        echo "<td>{$row['booking_date']}</td>";
        echo "<td>{$row['status']}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4' style='text-align:center;'>No bookings found</td></tr>";
}
$conn->close();

?>