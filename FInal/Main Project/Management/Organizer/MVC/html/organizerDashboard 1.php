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

    <div class="a">
        <h2>EventOrg</h2>
        <nav class = "z">
            <ul>
                <li class="active"><a href="organizerDashboard.php">Dashboard</a></li>
                <li><a href="manageEvent.php">Manage Events</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="payment.php">Payment</a></li>
                <li><a href="../php/logout.php">Logout</a></li>
                
            </ul>

        </nav>
    </div>

   
    <div class="main">
     
        <div class="b">
            <h1>Organizer Dashboard</h1>
            <div class="profile">
                <span>Welcome, <?php echo htmlspecialchars($organizerName); ?></span>
                
                
            </div>
        </div>

    <div class="c">
        <h2>
            Total Revenue
        </h2>
        <p>$12,345</p>
        

    </div>
   <div class="d">
    <h2>Upcoming Events</h2>
    <?php include "../php/upcomingEvent.php"; ?>
    </div>
    </div>




        

   

</body>
</html>
