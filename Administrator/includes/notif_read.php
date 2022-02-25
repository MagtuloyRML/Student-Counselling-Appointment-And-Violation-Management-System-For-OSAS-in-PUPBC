<?php
    session_start();
    include '../../assets/connection/DBconnection.php';
    $id = $_SESSION['AdminID'];
    if(isset($id)){
        $sql = "UPDATE adminnotification SET AdminNotificationStatusID = 1 WHERE AdminAccountID = '$id' AND AdminNotificationStatusID = 2";
        $res = mysqli_query($conn, $sql);
        if ($res){
            echo 'success';
        }else{
            echo 'error';
        }
    }
    
?>