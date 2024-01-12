<?php 
ob_start();
session_start();
include 'inc/config.php'; 
unset($_SESSION['vendor']);
header("location: login.php"); 
?>