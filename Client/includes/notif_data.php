<?php
    session_start();
    include '../../assets/connection/DBconnection.php';
    $id = $_SESSION['StudID'];
    if(isset($id)){
        $sql = "SELECT * FROM clientnotification WHERE ClientAccountID = '$id' AND ClientNotificationStatusID = 2";
        $result = $conn->query($sql);
        $fetch = $result->num_rows;
        if($fetch > 0){
            echo '<span class="badge" id="notifCount">'.$fetch.'</span>';
        }
        $conn->close();
    }
    
?>