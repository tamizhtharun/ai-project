<?php 
ob_start();
session_start();
include 'payment\admin\inc\config.php';
unset($_SESSION['customer']);
header("location: ".BASE_URL.'seller_login.php'); 
?>