<?php
    // for Connection.php
    include_once '../../../assets/connection/DBconnection.php';
    require ('../../../assets/PHPMailer/src/PHPMailer.php');
    require ('../../../assets/PHPMailer/src/SMTP.php');

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

        $sql_fetch = mysqli_query($conn, "SELECT AdminAccountID, AdminEmailAdd FROM adminaccountinfo WHERE AdminFirstName = '$fst_name' AND AdminMiddleName = '$mid_name' 
        AND AdminLastName = '$last_name' AND AdminSufifx = '$suf_name' AND AdminUserRoleID = '$userRole' AND AdminContactNo = '$admin_contact' 
        AND AdminUsername = '$username' AND AdminPassword = '$passgen' AND AdminEmailAdd = '$admin_email' AND AdminAddress = '$add' 
        AND GenderID = '$gender' ");
        while($details = mysqli_fetch_assoc($sql_fetch))
        {
            $id = $details['AdminAccountID']; 
            $mailTo = $details['AdminEmailAdd'];
            //Message to recipient
            $body ="
            <h1>Your admin account has been created</h1>
            <p>The password is the default password that is generated, please change your password as soon as possible. <br>
            <br>
            Your password is: <u>".$passgen."</u></a>

                <hr />

                <p>© All rights reserved</p>"; //Body
        
            $mail = new PHPMailer\PHPMailer\PHPMailer();
        
            $mail -> SMTPDebug = 3;
        
            $mail -> isSMTP();
        
            $mail -> Host = "smtp.gmail.com";
        
            $mail -> SMTPAuth = true;
        
            $mail -> Username = "godrel0422@gmail.com";
            $mail -> Password = "SimplePassword123";
        
            $mail -> SMTPSecure = "tls";
        
            $mail -> Port = "587";
        
            $mail -> From = "godrel0422@gmail.com";
            $mail -> FromName = "Admin User Creation";
        
            $mail -> addAddress($mailTo, "Test");
        
            $mail -> isHTML(true);
        
            $mail -> Subject = "New Admin Account";
        
            $mail -> Body = $body;
            
            $mail -> AltBody = "This is the basic version";
        
            if(!$mail->send()){
                echo "Mailer Error: " . $mail->ErrorInfo;
            }else{
                echo "Message has been sent";
            }
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

        $insert2 = $conn->query("INSERT into avail_sched(meta_field, start_date, end_date, start_time, end_time) VALUES ('$id','2022-01-01', '2023-01-01', '00:00:00', '23:00:00')");

        echo "Data Inserted";

       
        
    }else{
        echo "something is wrong" . $insert . $conn->error;
    }

?> 
