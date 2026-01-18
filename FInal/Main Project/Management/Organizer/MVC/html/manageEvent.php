<?php
session_start();

if (!isset($_SESSION['organizer_id'])) {
    header("Location: ../../../User/MVC/html/login.php");
    exit();
}

$organizerName = isset($_SESSION['organizer_name']) ? $_SESSION['organizer_name'] : 'Organizer';
?>
<!DOCTYPE html>

<body>


    <div class="main-content">
        
        
        <?php include "../php/manageEvent.php"; ?>
    </div>
</div>

</body>
</html>
