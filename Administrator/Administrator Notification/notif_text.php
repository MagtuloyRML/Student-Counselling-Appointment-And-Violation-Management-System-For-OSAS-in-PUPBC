<?php
    session_start();
    include '../../assets/connection/DBconnection.php';
    $id = $_SESSION['AdminID'];
    if(isset($id)){
        $sql = mysqli_query($conn, "SELECT adminNotif.NotificationTitle, adminNotif.NotificationMessage, nStatus.NotificationStatusDescription 
        FROM adminnotification AS adminNotif
        INNER JOIN notificationstatus AS nStatus 
        ON adminNotif.AdminNotificationStatusID = nStatus.NotificationStatusID 
        WHERE adminNotif.AdminAccountID = '$id' ORDER BY DateTimeStamp DESC ");
        
        while ($row = mysqli_fetch_array( $sql )) {
            $nTitle = $row["NotificationTitle"]; $nMSG = $row["NotificationMessage"]; $nStatus = $row["NotificationStatusDescription"]; 
        ?>
            <a class="notif_bttntiles" href="">
                <h4 class="notif_bttntitle"><?php echo $nTitle ?></h4>
                <div class="notif_bttntext <?php echo $nStatus ?>">
                    <span class="notif_bttntxt"><?php echo $nMSG ?></span>
                    <span class="notif_bttntxt"><?php echo $nStatus ?></span>
                </div>
                <hr class="notif_bttnline">
            </a>
        <?php 
        }

        $conn->close();
    }
    
?>