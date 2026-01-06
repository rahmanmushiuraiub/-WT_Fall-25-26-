<?php 
include "../db/db.php";  

// Array of 10 organizers with sample data
$organizers = [
    ['Nihan Rahman', '0123456789', 'nihan@example.com', 'password123'],
    ['Alex Johnson', '0987654321', 'alex.johnson@example.com', 'securePass456'],
    ['Maria Garcia', '0345678910', 'maria.garcia@example.com', 'mypassword789'],
    ['David Smith', '0567891234', 'david.smith@example.com', 'davidPass2023'],
    ['Sarah Williams', '0789123456', 'sarah.w@example.com', 'sarahSecure321'],
    ['James Wilson', '0912345678', 'james.wilson@example.com', 'jamesWilsonPass'],
    ['Emma Brown', '0234567891', 'emma.brown@example.com', 'emmaBrown789'],
    ['Michael Davis', '0456789123', 'michael.d@example.com', 'mikeDavis456'],
    ['Lisa Taylor', '0678912345', 'lisa.taylor@example.com', 'lisaT2023'],
    ['Robert Miller', '0891234567', 'robert.miller@example.com', 'robertMillerPass']
];

// Start transaction
mysqli_begin_transaction($conn);

$successCount = 0;
$errorCount = 0;
$hasErrors = false;

foreach ($organizers as $organizer) {
    $hashed_password = password_hash($organizer[3], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO organizer (fullname, phone, email, password) 
            VALUES (?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $organizer[0], $organizer[1], $organizer[2], $hashed_password);
        
        if (mysqli_stmt_execute($stmt)) {     
            $successCount++;
        } else {     
            $errorCount++;
            $hasErrors = true;
            echo "Error inserting " . $organizer[0] . ": " . mysqli_error($conn) . "<br>";
        }
        
        mysqli_stmt_close($stmt);
    } else {
        $errorCount++;
        $hasErrors = true;
        echo "Error preparing statement for " . $organizer[0] . ": " . mysqli_error($conn) . "<br>";
    }
}

if ($hasErrors) {
    // Rollback if there were errors
    mysqli_rollback($conn);
    echo "<h3>Transaction rolled back!</h3>";
    echo "No records were inserted due to errors.<br>";
} else {
    // Commit if all successful
    mysqli_commit($conn);
    echo "<h3>Transaction successful!</h3>";
    echo "All " . $successCount . " organizers inserted successfully!<br>";
}

echo "Total attempted: " . ($successCount + $errorCount) . " organizers<br>";

mysqli_close($conn);
?>