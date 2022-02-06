<?php

include_once 'dbconnection.php';

$Violations = $_GET['Violations'];

$conn ->query("DELETE FROM `fortheviolations` WHERE `fortheviolations`.`Violations` = '$Violations' ");

header("Location: ../index.php?Deleted=success");
