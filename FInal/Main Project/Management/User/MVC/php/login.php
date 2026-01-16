<?php
session_start();
include "../db/db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid request");
}

$email = trim($_POST['email']);
$password = trim($_POST['password']);

if ($email === '' || $password === '') {
    die("Email and password are required");
}

//USER LOGIN
$sqlUser = "SELECT * FROM user WHERE email = ?";
$stmtUser = $conn->prepare($sqlUser);
$stmtUser->bind_param("s", $email);
$stmtUser->execute();
$resultUser = $stmtUser->get_result();

if ($resultUser->num_rows === 1) {
    $user = $resultUser->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['fullname'];
        $_SESSION['user_email'] = $user['email'];

        header("Location: ../html/userDashboard.php");
        exit();
    } else {
        die("Invalid email or password");
    }
}
