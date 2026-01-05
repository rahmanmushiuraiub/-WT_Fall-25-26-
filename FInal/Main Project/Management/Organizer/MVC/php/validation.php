<?php
include " ../db/db.php";
 
$success = "";
$error = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fullname = trim($_POST['fullname']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
 
   
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
    $sql = "INSERT INTO organizer (fullname, phone, email, password)
        VALUES ('$fullname',   '$phone', '$email', '$hashedPassword')";
 

if (mysqli_query($conn, $sql)) {
    //echo "New record created successfully";
    header("Location:../html/landinpage.php");
        //exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
else{
    echo "post error";
}

mysqli_close($conn);
?>