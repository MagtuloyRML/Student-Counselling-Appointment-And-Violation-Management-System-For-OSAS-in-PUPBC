<?php
    session_start();
    include '../../assets/connection/DBconnection.php';
    $id = $_SESSION['AdminID'];
    if(isset($id)){
        $sql = mysqli_query($conn, "SELECT adminNotif.NotificationTitle, adminNotif.NotificationMessage, nStatus.NotificationStatusDescription 
        FROM adminnotification AS adminNotif
        INNER JOIN notificationstatus AS nStatus 
        ON adminNotif.AdminNotificationStatusID = nStatus.NotificationStatusID 
        WHERE adminNotif.AdminAccountID = '$id' ");
        
        while ($row = mysqli_fetch_array( $sql )) {
            $nTitle = $row["NotificationTitle"]; $nMSG = $row["NotificationMessage"]; $nStatus = $row["NotificationStatusDescription"]; 
        ?>
        <a class="notif_tiles" href="">
            <h5 class="notif_title"><?php echo $nTitle ?></h5>
            <div class="notif_text <?php echo $nStatus ?>">
                <p class="notif_txt"><?php echo $nMSG ?></p>
                <p class="notif_txt"><?php echo $nStatus ?></p>
            </div>
            <hr class="notif-line">
        </a>
            
        <?php 
        }

        $conn->close();
    }
    
?>