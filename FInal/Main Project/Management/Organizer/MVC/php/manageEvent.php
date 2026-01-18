<?php
include "../db/db.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['organizer_id'])) {
    header("Location: ../../../User/MVC/html/login.php");
    exit();
}

$organizer_id = $_SESSION['organizer_id'];


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['action'])) {

    $id = intval($_POST['id']);
    $action = $_POST['action'];

    if ($action === 'accept') {
        $status = 'Accepted';
    } elseif ($action === 'reject') {
        $status = 'Rejected';
    } else {
        $status = null;
    }

    if ($status) {
        
        $query = "UPDATE event_requests SET status = '$status' WHERE id = $id";
        if (mysqli_query($conn, $query)) {
            
            header("Location: manageEvent.php");
            exit();
        } else {
            die("Error updating status: " . mysqli_error($conn));
        }
    }
}


$result = mysqli_query($conn, "SELECT * FROM event_requests WHERE status='Pending' ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Event Requests</title>
    
</head>
<body>
    <h2>Pending Event Requests</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>Event Name</th>
            <th>Date</th>
            <th>Location</th>
            <th>Description</th>
            <th>Action</th>
        </tr>

        <?php if ($result && mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['user_name']) ?></td>
                    <td><?= htmlspecialchars($row['event_name']) ?></td>
                    <td><?= htmlspecialchars($row['event_date']) ?></td>
                    <td><?= htmlspecialchars($row['event_location']) ?></td>
                    <td><?= htmlspecialchars($row['event_description']) ?></td>
                    <td>
                        <!-- Accept -->
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="hidden" name="action" value="accept">
                            <button type="submit" class="accept-btn" onclick="return confirm('Accept this request?')">Accept</button>
                        </form>

                        <!-- Reject -->
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="hidden" name="action" value="reject">
                            <button type="submit" class="reject-btn" onclick="return confirm('Reject this request?')">Reject</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="7" style="text-align:center;">No pending requests</td></tr>
        <?php endif; ?>
    </table>

<?php mysqli_close($conn); ?>
</body>
</html>
