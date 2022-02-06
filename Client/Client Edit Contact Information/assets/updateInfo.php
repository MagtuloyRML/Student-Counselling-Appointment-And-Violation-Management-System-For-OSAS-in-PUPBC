<?php
    session_start();
    // for Connection.php
    include '../../../assets/connection/DBconnection.php';

    $stud_ID = $_SESSION['StudID'];
    $add = $_POST['add']; 
    $cNom = $_POST['cNom'];
    $cguard = $_POST['cguard'];
    $cguardNum = $_POST['cguardNum'];
    $email = $_POST['email'];
    

    //insert sa database
    $updateInfo="UPDATE clientaccountinfo SET ClientAddress = '$add', ClientContactNo = '$cNom', ClientGuardian = '$cguard',
     ClientGuardianNo = '$cguardNum', ClientEmailAdd = '$email' WHERE ClientAccountID = '$stud_ID'";
    $query_run = mysqli_query($conn, $updateInfo);
    if($query_run){
        echo "Data Inserted";
        header ("Location: ../../Client Edit Contact Information/");
    }else{
        echo "something is wrong" . $updateInfo . $conn->error;
    }

?> 