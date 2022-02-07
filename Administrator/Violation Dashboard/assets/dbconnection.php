<?php
//connect to the database
    
    $location = "localhost";
    $name = "root";
    $password = "";
    $database = "studentviolation_db";

    $conn = new mysqli($location, $name, $password, $database);

    if($conn->connect_error){
        echo "Connection Error";
    }
    
?>