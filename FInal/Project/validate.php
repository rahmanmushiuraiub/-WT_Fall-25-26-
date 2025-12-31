<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = trim($_POST['fullname']);
    $phone    = trim($_POST['phone']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($fullname) || empty($phone) || empty($email) || empty($password)) {
        die("All fields are required");
    }

    if (preg_match('/[0-9]/', $fullname)) {
        die("Name must not contain numbers");
    }

    if (!preg_match('/^01[0-9]{9}$/', $phone)) {
        die("Please enter a valid phone number");
    }

    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/", $email)) {
        die("Please enter a valid email address (e.g., anything@example.com)");
    }

    if (strlen($password) <= 6) {
        die("Password must be more than 6 characters");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (fullname, phone, email, password)
            VALUES ('$fullname', '$phone', '$email', '$hashedPassword')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['fullname'] = $fullname;
        header("Location: home.php");
        exit;
    } else {
        echo "Database error: " . mysqli_error($conn);
    }

} else {
    echo "Invalid request";
}
?>
