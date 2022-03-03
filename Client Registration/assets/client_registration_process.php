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

    //Get the same student number in the database
    $verify = $conn->query("SELECT * from clientaccountinfo WHERE ClientStudentNo = '$stud_num' AND ClientFirstName = '$fst_name' AND ClientMiddleName = '$mid_name' AND ClientLastName = '$last_name' AND ClientSuffix = '$suf_name'");
    if(mysqli_num_rows($verify) > 0){
        $mgs = 'mgs001';
    }else{
        $verifyEmail = $conn->query("SELECT * from clientaccountinfo WHERE ClientEmailAdd = '$client_email' ");
        if(mysqli_num_rows($verifyEmail) > 0){
            $mgs =  'mgs004';
        }else{
            //insert sa database
            $insert="INSERT INTO clientaccountinfo (ClientFirstName, ClientMiddleName, ClientLastName,
            ClientSuffix, ClientStudentNo, RoleID, ClientBDay, ClientAddress, ClientContactNo, ClientGuardian, ClientGuardianNo,
            ClientEmailAdd, ClientPassword, ClientGenderID) VALUES ('$fst_name','$mid_name','$last_name',
            '$suf_name','$stud_num','1','$bday', '$add', '$client_contact', '$guar_name', '$guardian_contact',
            '$client_email', '$password', '$gender')";
            $query_run = mysqli_query($conn, $insert);
            
            //if the insertion is done right
            if($query_run){
                $directoryFolder = '../../assets/user_profile_pic/client/'.$stud_num;
                mkdir($directoryFolder);

                $sourceIMG = '../../assets/user_profile_pic/default_user.jpg';
                $insertIMG = '../../assets/user_profile_pic/client/'.$stud_num.'/default_user.jpg';
                copy($sourceIMG, $insertIMG);

                $imgFileName = 'default_user.jpg';
                $now = date("Y-m-d H:i:s");

                $sql_fetch = mysqli_query($conn, "SELECT ClientAccountID FROM clientaccountinfo WHERE ClientFirstName = '$fst_name' AND ClientMiddleName = '$mid_name' 
                AND ClientLastName = '$last_name' AND ClientSuffix = '$suf_name' AND ClientStudentNo = '$stud_num' AND ClientBDay = '$bday' 
                AND ClientAddress = '$add' AND ClientContactNo = '$client_contact' AND ClientGuardian = '$guar_name' AND ClientGuardianNo = '$guardian_contact' 
                AND ClientEmailAdd = '$client_email' ");
                while($details = mysqli_fetch_assoc($sql_fetch))
                {
                    $id = $details['ClientAccountID']; 
                }

                $insert="INSERT INTO clientprofilepictureinfo (ClientAccountID, PictureFilename, UploadDate, UsedStatus) VALUES ('$id','$imgFileName', '$now', TRUE)";
                mysqli_query($conn, $insert);

                $mgs =  "mgs002";
            }else{
                //if it didn't
                $mgs =  "mgs003";
            }

        }
        

    }
    echo $mgs;
    

?> 
