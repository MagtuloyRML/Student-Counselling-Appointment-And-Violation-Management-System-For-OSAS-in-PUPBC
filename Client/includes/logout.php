<?php 
session_start();

unset($_SESSION['StudID']);
unset($_SESSION['AdminID']);
unset($_SESSION['Page']);

session_destroy();
header('location: ../../index.php');
die();
?>