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

    $update = $conn->query("UPDATE schedules SET stat ='Cancelled', cancel_id = '$name', cancel_reason ='$reason' WHERE id = '$a_id'");
    if($update){
        echo "success";
    }
    
   
?>