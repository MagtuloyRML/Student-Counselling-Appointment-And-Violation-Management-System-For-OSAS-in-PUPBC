<?php
    session_start();
    $id = $_SESSION['StudID'];
    include '../../../assets/connection/DBconnection.php';

    $sql_fetch = mysqli_query($conn, "SELECT ClientStudentNo from clientaccountinfo WHERE ClientAccountID = '$id'");
    while($details = mysqli_fetch_assoc($sql_fetch))
    {
        $stud_ID = $details['ClientStudentNo'];
    }
    $sql_fetchpic = mysqli_query($conn, "SELECT ClientProfilePictureID from clientprofilepictureinfo WHERE ClientAccountID = '$id' AND UsedStatus = TRUE ");
    while($detailpic = mysqli_fetch_assoc($sql_fetchpic))
    {
        $prof_picID = $detailpic['ClientProfilePictureID'];
    }
    if(isset($_POST["image"]))
    {
        $data= $_POST["image"];
        $img_array_1 = explode(";" , $data);
        $img_array_2 = explode(",", $img_array_1[1]);
        $basedecode = base64_decode($img_array_2[1]);
        $filename = $stud_ID.date("Ymd").time(). '.jpg';
        $directory = "../../../assets/user_profile_pic/client";
        file_put_contents("$directory/$stud_ID/$filename", $basedecode);
        $now = date("Y-m-d H:i:s");
        
        $update = "UPDATE clientprofilepictureinfo SET UsedStatus = FALSE WHERE ClientProfilePictureID = '$prof_picID'";
        $conn->query($update);
        
        $insert="INSERT INTO clientprofilepictureinfo(ClientAccountID, PictureFilename, UploadDate, UsedStatus) VALUES ('$id','$filename', '$now', TRUE)";
        mysqli_query($conn, $insert);
        echo "Success";
        
    }
    
?>