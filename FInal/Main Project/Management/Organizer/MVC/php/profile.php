<?php
include "../db/db.php";

$organizer_id = $_SESSION['organizer_id'];
$message = '';

// Fetch organizer details
$query = "SELECT id, fullname, email, phone FROM organizer WHERE id = $organizer_id";
$result = $conn->query($query);
$organizer = $result->fetch_assoc();

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    
    if (empty($fullname) || empty($email) || empty($phone)) {
        $message = "All fields are required";
    } else {
        $update_sql = "UPDATE organizer SET fullname = '$fullname', email = '$email', phone = '$phone' WHERE id = $organizer_id";
        
        if ($conn->query($update_sql)) {
            $_SESSION['organizer_name'] = $fullname;
            $_SESSION['organizer_email'] = $email;
            $message = "Profile updated successfully!";
            $organizer['fullname'] = $fullname;
            $organizer['email'] = $email;
            $organizer['phone'] = $phone;
        } else {
            $message = "Error updating profile: " . $conn->error;
        }
    }
}
?>
