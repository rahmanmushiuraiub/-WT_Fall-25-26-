<?php
session_start();
include "../db/db.php";

if (!isset($_SESSION['id'])) {
    header("Location: ../html/login.php");
    exit();
}
