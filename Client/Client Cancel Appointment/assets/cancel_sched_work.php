<?php 
    session_start();
    $id = $_SESSION['StudID'];

    include '../../../assets/connection/DBconnection.php';

    $sql_fetch = mysqli_query($conn, "SELECT * from clientaccountinfo WHERE ClientAccountID = '$id'");
    $name = "";
    while($row = mysqli_fetch_assoc($sql_fetch))
    {
        $name = $row['ClientAccountID'];
    }
    
    $a_id = $_POST['id'];
    $reason = $_POST['reason'];
    $remarks = $_POST['counselor'];
    $notification = $conn->query("INSERT INTO adminnotification(AdminAccountID, NotificationTitle, NotificationMessage, AdminNotificationStatusID, DateTimeStamp)
				VALUES('$remarks', 'Cancelled Appointment', 'A client has cancelled his/her appointment. Please check schedule page', '2', NOW())");
    $update = $conn->query("UPDATE schedules SET stat ='Cancelled', cancel_id = '$name', cancel_reason ='$reason' WHERE id = '$a_id'");
    if($update){
        echo '<span class="alert_icon green">
                    <i class="fa-solid fa-check"></i>
                </span>
                <span class="alert_text">
                    Cancel Schedule Successful
                </span>';
    }else{
        echo '<span class="alert_icon red">
                    <i class="fa-solid fa-exclamation"></i>
                </span>
                <span class="alert_text">
                    Cancel Schedule Unsuccessful
                </span>';
    }
    
   
?>