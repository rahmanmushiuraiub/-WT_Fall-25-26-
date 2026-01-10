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
                <li><a href="createEvent.php">Create Event</a></li>
                <li><a href="manageEvent.php">Manage Events</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Payment</a></li>
                <li><a href="logout.php">Logout</a></li>
                
            </ul>

        </nav>
    </div>
 <div class="main">
     
        <div class="b">
            <h1>Organizer Dashboard</h1>
            <div class="profile">
                <span>Welcome, Organizer</span>
                
                
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
