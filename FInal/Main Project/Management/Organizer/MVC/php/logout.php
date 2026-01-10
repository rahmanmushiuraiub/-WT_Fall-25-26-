<?php
session_start();
session_destroy();
header("Location: ../html/landinpage.php");
exit;
?>