<?php
    session_start();
    include '../../assets/connection/DBconnection.php';
    $id = $_SESSION['AdminID'];
    if(isset($id)){
        $sql = "SELECT * FROM adminnotification WHERE AdminAccountID = '$id' AND AdminNotificationStatusID = 2";
        $result = $conn->query($sql);
        echo $result->num_rows;
        $conn->close();
    }
    
?>