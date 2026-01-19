<?php
include "../db/db.php";
 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
 
if (!isset($_SESSION['organizer_id'])) {
    die("Organizer not logged in.");
}
 
$organizer_id = $_SESSION['organizer_id'];
 
// Fetch accepted events for this organizer
$query = "SELECT * FROM event_requests WHERE status='Accepted' ORDER BY event_date ASC";
 
$result = $conn->query($query);
 
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>
 
 
 
<table border="1" cellpadding="8" cellspacing="0" style="width:70%; border-collapse: collapse;">
    <tr style="background:#3498db; color:white;">
        <th>ID</th>
        <th>Event Name</th>
        <th>Date</th>
        <th>Location</th>
        <th>Description</th>
        <th>Cost</th>
    </tr>
 
<?php if ($result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['event_name']) ?></td>
            <td><?= htmlspecialchars($row['event_date']) ?></td>
            <td><?= htmlspecialchars($row['event_location']) ?></td>
            <td><?= htmlspecialchars($row['event_description']) ?></td>
            <td><?= htmlspecialchars($row['event_cost']) ?></td>
        </tr>
    <?php endwhile; ?>
<?php else: ?>
    <tr>
        <td colspan="6" style="text-align:center;">No accepted events yet.</td>
    </tr>
<?php endif; ?>
 
</table>
 
<?php $conn->close(); ?>
 
 