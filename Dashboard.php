<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: Index2.php"); // if not logged in, go back to login
    exit();
}
?>