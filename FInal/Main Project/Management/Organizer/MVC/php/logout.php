<?php
session_start();
session_unset();
session_destroy();
header("Location: ../../../User/MVC/html/login.php");
exit();
?>