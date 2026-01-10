<?php
include("../db/db.php");

$sql = "SELECT eventname, eventtotalperson, eventdetails, eventemail FROM Event";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>
            <th>Event Name</th>
            <th>Total Person</th>
            <th>Details</th>
            <th>Email</th>
          </tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['eventname']) . "</td>";
        echo "<td>" . htmlspecialchars($row['eventtotalperson']) . "</td>";
        echo "<td>" . htmlspecialchars($row['eventdetails']) . "</td>";
        echo "<td>" . htmlspecialchars($row['eventemail']) . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No events found.";
}

$conn->close();
?>
