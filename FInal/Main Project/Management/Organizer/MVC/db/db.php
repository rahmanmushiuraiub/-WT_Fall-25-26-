<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "webtech_final_project";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create organizer table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS organizer (
    id INT AUTO_INCREMENT,
    fullname VARCHAR(100),
    phone VARCHAR(20),
    email VARCHAR(100),
    password VARCHAR(255),
    PRIMARY KEY (id)
)";

if (mysqli_query($conn, $sql)) {
    // Table created or already exists
   
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
?>