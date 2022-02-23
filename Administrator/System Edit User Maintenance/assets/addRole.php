<?php
    // for Connection.php
    include_once '../../../assets/connection/DBconnection.php';

    $id = $_POST['id'];
    $roleCouncheck = $_POST['roleCouncheck'];
    $status = $_POST['status'];

    //insert sa database
    $update = $conn->query("UPDATE adminaccountinfo SET AdminUserRoleID ='$roleCouncheck', 
    AccountStatusID = '$status' WHERE AdminAccountID = '$id' ");
    if($update){
        echo "success";
        
    }else{
        echo "something is wrong" . $update . $conn->error;
    }

?> 
