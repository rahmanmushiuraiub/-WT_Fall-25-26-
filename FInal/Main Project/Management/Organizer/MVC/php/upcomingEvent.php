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

// Loop through results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['event_id']) . "</td>"; // changed id → event_id
        echo "<td>" . htmlspecialchars($row['event_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['event_date']) . "</td>";
        echo "<td>" . htmlspecialchars($row['event_location']) . "</td>";
        echo "<td>" . htmlspecialchars($row['event_description']) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5' style='text-align:center;'>No upcoming events</td></tr>";
}

echo "</table>";

$conn->close();
?>
