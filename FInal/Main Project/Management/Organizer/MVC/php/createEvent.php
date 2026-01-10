<?php
session_start();
include "../db/db.php";

if (!isset($_SESSION['id'])) {
    header("Location: ../html/login.php");
    exit();
}
$sql = "SELECT id, fullname, email 
        FROM `user`";

$result = $conn->query($sql);

if (!$result) {
    die("Query Failed: " . $conn->error);
}
?>