<?php
    session_start();
    include '../../assets/connection/DBconnection.php';
    $id = $_SESSION['AdminID'];
    if(isset($id)){
        $sql = mysqli_query($conn, "SELECT adminNotif.NotificationTitle, adminNotif.NotificationMessage, nStatus.NotificationStatusDescription 
        FROM adminnotification AS adminNotif
        INNER JOIN notificationstatus AS nStatus 
        ON adminNotif.AdminNotificationStatusID = nStatus.NotificationStatusID 
        WHERE adminNotif.AdminAccountID = '$id' AND adminNotif.AdminNotificationStatusID = '2' ");
        
        while ($row = mysqli_fetch_array( $sql )) {
            $nTitle = $row["NotificationTitle"]; $nMSG = $row["NotificationMessage"]; $nStatus = $row["NotificationStatusDescription"]; 
        ?>
            <h5 class="notif_title"><?php echo $nTitle ?></h5>
            <div class="notif_text">
                <p class="notif_txt"><?php echo $nMSG ?></p>
                <a href="#" class="notif_bttn"><?php echo $nStatus ?></a>
            </div>
            <hr class="notif-line">
        <?php 
        }

        $conn->close();
    }
    
?>