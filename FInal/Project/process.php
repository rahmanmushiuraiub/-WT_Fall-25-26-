<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: home.php");
    exit();
}

$email    = trim($_POST['email']);
$password = trim($_POST['password']);

if (empty($email) || empty($password)) {
    $_SESSION['error'] = "Please enter email and password.";
    header("Location: home.php");
    exit();
}

$check = $conn->prepare(
    "SELECT id, fullname, password, email, verified 
     FROM users WHERE email = ?"
);
$check->bind_param("s", $email);
$check->execute();
$result = $check->get_result();

if ($result->num_rows === 1) {

    $row = $result->fetch_assoc();

    if ($row['verified'] == 0) {
        $_SESSION['error'] = "Please verify your email before logging in.";
        header("Location: home.php");
        exit();
    }

    if (password_verify($password, $row['password'])) {

        $_SESSION['user_id']   = $row['id'];
        $_SESSION['user_name'] = $row['fullname'];

        if ($row['email'] === "mushiurrehman1610@gmail.com") {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: firstpage.php");
        }
        exit();

    } else {
        $_SESSION['error'] = "Invalid email or password.";
        header("Location: home.php");
        exit();
    }

} else {
    $_SESSION['error'] = "Invalid email or password.";
    header("Location: home.php");
    exit();
}
?>
