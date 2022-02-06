<?php
    session_start();
    // for Connection.php
    include '../../../assets/connection/DBconnection.php';

    $stud_ID = $_SESSION['StudID'];
    $stud_num = $_POST['stud_num']; 
    $fst_name = $_POST['fname'];
    $mid_name = $_POST['mname'];
    $last_name = $_POST['lname'];
    $suf_name = $_POST['suffname'];
    $bday = $_POST['bday'];
    $gender = $_POST['gender'];
    

    //insert sa database
    $updateInfo="UPDATE clientaccountinfo SET ClientFirstName = '$fst_name', ClientMiddleName = '$mid_name', ClientLastName = '$last_name',
     ClientSuffix = '$suf_name', ClientStudentNo = '$stud_num', ClientBDay = '$bday', ClientGenderID = '$gender' WHERE ClientAccountID = '$stud_ID'";
    $query_run = mysqli_query($conn, $updateInfo);
    if($query_run){
        echo "Data Inserted";
        header ("Location: ../../Client Edit Personal Information/");
    }else{
        echo "something is wrong" . $updateInfo . $conn->error;
    }

?> 