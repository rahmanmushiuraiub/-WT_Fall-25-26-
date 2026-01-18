<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../php/login.php");
    exit();
}

$userId   = $_SESSION['user_id'];
$userName = $_SESSION['user_name'] ?? 'Guest';

include "../db/db.php";

// Handle search input
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$search_error = '';

if (!empty($search)) {
    if (strlen($search) < 2) {
        $search_error = 'Search term must be at least 2 characters long';
        $search = '';
    } elseif (strlen($search) > 50) {
        $search_error = 'Search term cannot exceed 50 characters';
        $search = '';
    } elseif (!preg_match('/^[a-zA-Z0-9\s\-@.]+$/', $search)) {
        $search_error = 'Search term contains invalid characters';
        $search = '';
    }
}

// Build query
$sql = "SELECT er.id AS event_id, er.event_name, er.event_date, er.event_location, 
               er.event_description, er.status, u.fullname, u.email
        FROM event_requests er
        LEFT JOIN user u ON er.user_id = u.id
        WHERE er.status = 'Accepted'";

if (!empty($search)) {
    $search_safe = $conn->real_escape_string($search);
    $sql .= " AND (er.event_name LIKE '%$search_safe%' 
                   OR er.event_location LIKE '%$search_safe%' 
                   OR u.fullname LIKE '%$search_safe%')";
}

$sql .= " ORDER BY er.event_date DESC";

$result = $conn->query($sql);

if (!$result) {
    die("Query Error: " . $conn->error);
}

$bookings = $result->fetch_all(MYSQLI_ASSOC);
if ($bookings === null) {
    $bookings = [];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Accepted Bookings</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background: #3498db; color: white; }
        tr:hover { background: #f5f5f5; }
        input[type="text"] { padding: 8px; width: 300px; margin-right: 10px; }
        input[type="submit"] { padding: 8px 12px; background: #27ae60; color: white; border: none; cursor: pointer; }
        input[type="submit"]:hover { background: #219150; }
        .error { color: red; margin-top: 10px; }
    </style>
</head>
<body>


<!-- Search Form -->
<form method="GET" action="">
    <input type="text" name="search" placeholder="Search by Event, Location, or User" value="<?= htmlspecialchars($search) ?>">
    <input type="submit" value="Search">
</form>

<?php if (!empty($search_error)): ?>
    <div class="error"><?= htmlspecialchars($search_error) ?></div>
<?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>
