<?php
session_start();

if (!isset($_SESSION['organizer_id'])) {
    header("Location: ../../../User/MVC/html/login.php");
    exit();
}

$organizerName = isset($_SESSION['organizer_name']) ? $_SESSION['organizer_name'] : 'Organizer';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Organizer Dashboard</title>
    <link rel="stylesheet" href="../css/organizerDashboard.css">
</head>
<body>

    

   
    <div class="main">
     
        <div class="b">
            <h1>Organizer Dashboard</h1>
            <div class="profile">
                <span>Welcome, <?php echo htmlspecialchars($organizerName); ?></span>
                
                
            </div>
        </div>

    <div class="c">
        <h2>
            
        </h2>
        <p></p>
        

    </div>
   <div class="d">
    <h2>Upcoming Events</h2>
    <?php include "../php/upcomingEvent.php"; ?>
    </div>
    </div>




        

   

</body>
</html>
