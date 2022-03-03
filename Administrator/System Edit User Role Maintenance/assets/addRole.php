<?php
    // for Connection.php
    include_once '../../../assets/connection/DBconnection.php';

    $id = $_POST['id'];
    $roleNameCheck = $_POST['roleNameCheck'];
    $roleNameCheckNew = strtoupper($roleNameCheck);
    $studCouncheck = $_POST['studCouncheck'];
    $studViolationcheck = $_POST['studViolationcheck'];
    $sysMainsCheck = $_POST['sysMainsCheck'];
    $status = $_POST['status'];

    //insert sa database
    $update = $conn->query("UPDATE adminuserrole SET AdminUserRole ='$roleNameCheckNew', AdminPageStudentCounceling = '$studCouncheck',
     AdminPageViolation ='$studViolationcheck', AdminMaintenance ='$sysMainsCheck', StatusID ='$status' WHERE AdminUserRoleID = '$id' ");
    if($update){
        echo "msg001";
        
    }else{
        echo "msg002";
    }

?> 
