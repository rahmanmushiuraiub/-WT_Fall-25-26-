<?php
session_start();
include "../db/db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid request");
    echo "post error";
}

if (
    !isset($_POST['email'], $_POST['password']) ||
    trim($_POST['email']) === '' ||
    trim($_POST['password']) === ''
) {
    die("Missing value in the form!");
    echo "post error";
}

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$sql = "SELECT * FROM organizer WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    die("Invalid email or password");
}

$organizer = $result->fetch_assoc();

if (!password_verify($password, $organizer['password'])) {
    die("Invalid email or password");
}

//$_SESSION['user_id'] = $user['id'];
$_SESSION['email']   = $organizer['email'];

header("Location: ../php/organizerDashboard.php");
exit();