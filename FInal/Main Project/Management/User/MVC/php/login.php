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

//ORGANIZER LOGIN
$sqlOrg = "SELECT * FROM organizer WHERE email = ?";
$stmtOrg = $conn->prepare($sqlOrg);
$stmtOrg->bind_param("s", $email);
$stmtOrg->execute();
$resultOrg = $stmtOrg->get_result();

if ($resultOrg->num_rows === 1) {
    $organizer = $resultOrg->fetch_assoc();
    if ($password === $organizer['password']) {
        $_SESSION['id'] = $organizer['id'];
        $_SESSION['organizer_id'] = $organizer['id'];
        $_SESSION['organizer_name'] = $organizer['fullname'];
        $_SESSION['organizer_email'] = $organizer['email'];
        header("Location: ../../../Organizer/MVC/html/organizerDashboard.php");
        exit();
    } else {
        die("Invalid email or password");
    }
}
// If no match found

die("Invalid email or password");
?>
