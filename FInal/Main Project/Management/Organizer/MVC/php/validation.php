<?php
include "../db/db.php";
$success = "";
$error = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
$fullname = htmlspecialchars(trim($_POST['fullname']));
$phone    = htmlspecialchars(trim($_POST['phone']));
$email    = htmlspecialchars(trim($_POST['email']));
$password = htmlspecialchars(trim($_POST['password']));


    
    if(empty($fullname) || empty($phone) || empty($email) || empty($password)){
        die("All fields are required");
    }

    if(preg_match('/[0-9]/', $fullname)){
        die("Name must not contain numbers");
    }

    if(!preg_match('/^01[0-9]{9}$/', $phone)){
        die("Please enter a valid phone number");
    }

    if(!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/", $email)){
        die("Please enter a valid email address (e.g., example@domain.com)");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO admin (fullname, phone, email, password, verified) 
        VALUES ('$fullname', '$phone', '$email', '$hashedPassword', 1)";

 if (mysqli_query($conn, $sql)) {
        $_SESSION['fullname'] = $fullname;
         $success = "Registration successful!";  
        header("Location:html/landinpage.php");
        exit;
    } else {
        echo "Database error: " . mysqli_error($conn);
    }
    $conn->close();
}else {
    echo "Invalid request";
    

}
?>