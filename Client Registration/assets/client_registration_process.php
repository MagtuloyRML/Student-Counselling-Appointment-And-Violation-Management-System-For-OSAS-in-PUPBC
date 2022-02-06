<?php
    // for Connection.php
    include_once '../../assets/connection/DBconnection.php';

    $fst_name = $_POST['fst_name'];
    $mid_name = $_POST['mid_name'];
    $last_name = $_POST['last_name'];
    $suf_name = $_POST['suf_name'];
    $stud_num = $_POST['stud_num'];
    $client_email = $_POST['client_email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $bday = $_POST['bday'];
    $add = $_POST['add'];
    $gender = $_POST['gender'];
    $client_contact = $_POST['client_contact'];
    $guar_name = $_POST['guar_name'];
    $guardian_contact = $_POST['guardian_contact'];

    //insert sa database
    $insert="INSERT INTO clientaccountinfo (ClientFirstName, ClientMiddleName, ClientLastName,
    ClientSuffix, ClientStudentNo, RoleID, ClientBDay, ClientAddress, ClientContactNo, ClientGuardian, ClientGuardianNo,
    ClientEmailAdd, ClientPassword, ClientGenderID) VALUES ('$fst_name','$mid_name','$last_name',
    '$suf_name','$stud_num','1','$bday', '$add', '$client_contact', '$guar_name', '$guardian_contact',
    '$client_email', '$password', '$gender')";
    $query_run = mysqli_query($conn, $insert);
    if($query_run){
        echo "Data Inserted";
        header ("Location: ../../Client Login/");
    }else{
        echo "something is wrong" . $insert . $conn->error;
    }

?> 