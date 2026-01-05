<?php
session_start();
include "../db/db.php";

// Allow only POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../html/landinpage.php");
    exit();
}

// Get input (DO NOT use htmlspecialchars on password)
$email    = trim($_POST['email']);
$password = trim($_POST['password']);

// Validate input
if (empty($email) || empty($password)) {
    $_SESSION['error'] = "Please enter email and password.";
    header("Location: ../html/landinpage.php");
    exit();
}

// Prepare query
$stmt = $conn->prepare(
    "SELECT fullname, phone, email, password 
     FROM organizer 
     WHERE email = ?"
);

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Check user exists
if ($result->num_rows === 1) {

    $row = $result->fetch_assoc();

    // Verify password
    if (password_verify($password, $row['password'])) {

        // Set session data
        $_SESSION['user_name']  = $row['fullname'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['role']       = 'organizer';

        // Redirect to dashboard
        header("Location: ../php/organizerDashboard.php");
        exit();

    } else {
        $_SESSION['error'] = "Invalid email or password.";
    }

} else {
    $_SESSION['error'] = "Invalid email or password.";
}

// Redirect back on failure
header("Location: ../html/landinpage.php");
exit();
?>