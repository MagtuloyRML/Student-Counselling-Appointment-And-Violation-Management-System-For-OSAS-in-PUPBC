<?php

include_once 'dbconnection.php';

$Sanctions = $_GET['Sanctions'];

$conn ->query("DELETE FROM `forthesanctions` WHERE `forthesanctions`.`Sanctions` = '$Sanctions' ");

header("Location: ../index.php?Deleted=success");
