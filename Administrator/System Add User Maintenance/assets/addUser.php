<?php
    // for Connection.php
    include_once '../../../assets/connection/DBconnection.php';

    $fst_name = $_POST['fst_name'];
    $mid_name = $_POST['mid_name'];
    $last_name = $_POST['last_name'];
    $suf_name = $_POST['suf_name'];
    $userRole = $_POST['userRole'];
    $admin_email = $_POST['admin_email'];
    $username = $_POST['username'];
    $add = $_POST['add'];
    $gender = $_POST['gender'];
    $admin_contact = $_POST['admin_contact'];

    $passletter = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $passgen = substr(str_shuffle($passletter),0, 10);

    //insert sa database
    $insert="INSERT INTO adminaccountinfo (AdminFirstName, AdminMiddleName, AdminLastName,
    AdminSufifx, AdminUserRoleID, AdminContactNo, AdminUsername, AdminPassword, AdminEmailAdd, AdminAddress, GenderID,
    AccountStatusID) VALUES ('$fst_name','$mid_name','$last_name',
    '$suf_name','$userRole','$admin_contact','$username', '$passgen', '$admin_email', '$add', '$gender',
    '1')";
    $query_run = mysqli_query($conn, $insert);
    if($query_run){

        $sql_fetch = mysqli_query($conn, "SELECT AdminAccountID FROM adminaccountinfo WHERE AdminFirstName = '$fst_name' AND AdminMiddleName = '$mid_name' 
        AND AdminLastName = '$last_name' AND AdminSufifx = '$suf_name' AND AdminUserRoleID = '$userRole' AND AdminContactNo = '$admin_contact' 
        AND AdminUsername = '$username' AND AdminPassword = '$passgen' AND AdminEmailAdd = '$admin_email' AND AdminAddress = '$add' 
        AND GenderID = '$gender' ");
        while($details = mysqli_fetch_assoc($sql_fetch))
        {
            $id = $details['AdminAccountID']; 
        }

        $directoryFolder = '../../../assets/user_profile_pic/admin/pbcscvs'.$id;
        mkdir($directoryFolder);

        $sourceIMG = '../../../assets/user_profile_pic/default_user.jpg';
        $insertIMG = '../../../assets/user_profile_pic/admin/pbcscvs'.$id.'/default_user.jpg';
        copy($sourceIMG, $insertIMG);

        $imgFileName = 'default_user.jpg';
        $now = date("Y-m-d H:i:s");

        $insert="INSERT INTO adminprofilepictureinfo (AdminAccountID, PictureFilename, UploadDate, UsedStatus) VALUES ('$id','$imgFileName', '$now', TRUE)";
        mysqli_query($conn, $insert);

        echo "Data Inserted";
        
    }else{
        echo "something is wrong" . $insert . $conn->error;
    }

?> 
