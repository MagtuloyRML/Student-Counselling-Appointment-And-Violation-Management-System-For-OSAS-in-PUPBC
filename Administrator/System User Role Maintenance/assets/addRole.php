<?php
    // for Connection.php
    include_once '../../../assets/connection/DBconnection.php';

    $roleNameCheck = $_POST['roleNameCheck'];
    $roleNameCheckNew = strtoupper($roleNameCheck);
    $studCouncheck = $_POST['studCouncheck'];
    $studViolationcheck = $_POST['studViolationcheck'];
    $sysMainsCheck = $_POST['sysMainsCheck'];

    //insert sa database
    $insert="INSERT INTO adminuserrole (AdminUserRole, AdminPageStudentCounceling, AdminPageViolation,
    AdminMaintenance, StatusID) VALUES ('$roleNameCheckNew','$studCouncheck','$studViolationcheck','$sysMainsCheck','1')";
    $query_run = mysqli_query($conn, $insert);
    if($query_run){
        echo "msg004";
        
    }else{
        echo "msg005";
    }

?> 
