<?php
include "../db/db.php";

// Fetch accepted events
$query = "SELECT * FROM event_requests WHERE status = 'Accepted' ORDER BY event_date ASC";
$result = $conn->query($query);

if (!$result) {
    die("Query Failed: " . $conn->error);
}

// Start table
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr>
        <th>Event ID</th>
        <th>Event Name</th>
        <th>Date</th>
        <th>Location</th>
        <th>Description</th>
      </tr>";


echo "</table>";

$conn->close();
?>
