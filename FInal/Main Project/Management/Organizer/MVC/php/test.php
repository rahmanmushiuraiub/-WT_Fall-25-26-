<?php
// Test 1: Check if db.php exists
$dbPath = __DIR__ . '/../db/db.php';
echo "1. Checking db.php path: $dbPath<br>";
echo "File exists: " . (file_exists($dbPath) ? "YES" : "NO") . "<br><br>";

// Test 2: Try to include and connect
include $dbPath;
echo "2. Database connection: ";
if ($conn->connect_error) {
    echo "FAILED - " . $conn->connect_error;
} else {
    echo "SUCCESSFUL!<br>";
    echo "Host info: " . $conn->host_info . "<br><br>";
}

// Test 3: Check if table exists
echo "3. Checking if 'organizer' table exists: ";
$result = $conn->query("SHOW TABLES LIKE 'organizer'");
if ($result->num_rows > 0) {
    echo "YES<br><br>";
    
    // Test 4: Show table structure
    echo "4. Table structure:<br>";
    $structure = $conn->query("DESCRIBE organizer");
    while($row = $structure->fetch_assoc()) {
        echo "- {$row['Field']} ({$row['Type']})<br>";
    }
} else {
    echo "NO - Table doesn't exist<br>";
}

$conn->close();
?>