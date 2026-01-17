<?php
include "../db/db.php";

// Fetch pending event requests
$query = "SELECT * FROM event_requests WHERE status = 'Pending' ORDER BY event_id DESC";
$result = $conn->query($query);
?>

<table class= "table">
    <tr>
        <th>ID</th>
        <th>Event Name</th>
        <th>Date</th>
        <th>Location</th>
        <th>Description</th>
        <th>Action</th>
    </tr>

<?php
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['event_id']}</td>";
        echo "<td>{$row['event_name']}</td>";
        echo "<td>{$row['event_date']}</td>";
        echo "<td>{$row['event_location']}</td>";
        echo "<td>{$row['event_description']}</td>";
       echo "<td>
    <form method='POST' action='../php/updateRequest.php' style='display:inline;'>
        <input type='hidden' name='event_id' value='{$row['event_id']}'>
        <input type='hidden' name='action' value='accept'>
        <button type='submit' class='action-btn accept-btn'>Accept</button>
    </form>

    <form method='POST' action='../php/updateRequest.php' style='display:inline;'>
        <input type='hidden' name='event_id' value='{$row['event_id']}'>
        <input type='hidden' name='action' value='reject'>
        <button type='submit' class='action-btn reject-btn'>Reject</button>
    </form>
</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6' style='text-align:center;'>No pending requests</td></tr>";
}

$conn->close();
?>
</table>
