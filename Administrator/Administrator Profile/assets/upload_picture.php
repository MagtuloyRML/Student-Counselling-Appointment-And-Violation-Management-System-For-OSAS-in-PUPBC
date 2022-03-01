<?php
    session_start();
    $id = $_SESSION['AdminID'];
    include '../../../assets/connection/DBconnection.php';

    $sql_fetchpic = mysqli_query($conn, "SELECT AdminProfilePictureID from adminprofilepictureinfo WHERE AdminAccountID = '$id' AND UsedStatus = TRUE ");
    while($detailpic = mysqli_fetch_assoc($sql_fetchpic))
    {
        $prof_picID = $detailpic['AdminProfilePictureID'];
    }
    if(isset($_POST["image"]))
    {
        $data= $_POST["image"];
        $img_array_1 = explode(";" , $data);
        $img_array_2 = explode(",", $img_array_1[1]);
        $basedecode = base64_decode($img_array_2[1]);
        $filename = 'pbcscvs'.$id.date("Ymd").time(). '.jpg';
        $directory = "../../../assets/user_profile_pic/admin";
        file_put_contents("$directory/pbcscvs$id/$filename", $basedecode);
        $now = date("Y-m-d H:i:s");
        
        $update = "UPDATE adminprofilepictureinfo SET UsedStatus = FALSE WHERE AdminProfilePictureID = '$prof_picID'";
        $conn->query($update);
        
        $insert="INSERT INTO adminprofilepictureinfo (AdminAccountID, PictureFilename, UploadDate, UsedStatus) VALUES ('$id','$filename', '$now', TRUE)";
        mysqli_query($conn, $insert);
        echo '<span class="alert_icon green">
                    <i class="fa-solid fa-check"></i>
                </span>
                <span class="alert_text">
                    Updated Picture Successful
                </span>';
        
    }
    else{
        echo '<span class="alert_icon red">
                <i class="fa-solid fa-exclamation"></i>
            </span>
            <span class="alert_text">
                Updated Picture Unsuccessfully
            </span>';
    }
    
?>