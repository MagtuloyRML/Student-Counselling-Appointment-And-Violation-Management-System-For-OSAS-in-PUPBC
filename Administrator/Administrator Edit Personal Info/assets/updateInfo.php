<?php
    session_start();
    // for Connection.php
    include '../../../assets/connection/DBconnection.php';

    $id = $_SESSION['AdminID'];
    $fst_name = $_POST['fname'];
    $mid_name = $_POST['mname'];
    $last_name = $_POST['lname'];
    $suf_name = $_POST['suffname'];
    $aNo = $_POST['aNo'];
    $aEmail = $_POST['aEmail'];
    $aAdd = $_POST['aAdd'];
    

    //insert sa database
    $updateInfo="UPDATE adminaccountinfo SET AdminFirstName = '$fst_name', AdminMiddleName = '$mid_name', AdminLastName = '$last_name',
     AdminSufifx = '$suf_name', AdminContactNo = '$aNo', AdminEmailAdd = '$aEmail' , AdminAddress = '$aAdd' WHERE AdminAccountID = '$id'";
    $query_run = mysqli_query($conn, $updateInfo);
    if($query_run){
        echo "Data Inserted";
        header ("Location: ../../Administrator Edit Personal Info/");
    }else{
        echo "something is wrong" . $updateInfo . $conn->error;
    }

?> 