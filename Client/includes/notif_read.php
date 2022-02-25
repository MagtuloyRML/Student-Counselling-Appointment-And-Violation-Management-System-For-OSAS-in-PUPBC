<?php
    session_start();
    include '../../assets/connection/DBconnection.php';
    $id = $_SESSION['StudID'];
    if(isset($id)){
        $sql = "UPDATE clientnotification SET ClientNotificationStatusID = 1 WHERE ClientAccountID = '$id' AND ClientNotificationStatusID = 2";
        $res = mysqli_query($conn, $sql);
        if ($res){
            echo 'success';
        }else{
            echo 'error';
        }
    }
    
?>