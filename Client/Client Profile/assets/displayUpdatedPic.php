<?php
    session_start();
    $id = $_SESSION['StudID'];
    include '../../../assets/connection/DBconnection.php';
    $sql_fetch = mysqli_query($conn, "SELECT ClientStudentNo from clientaccountinfo WHERE ClientAccountID = '$id'");
    while($details = mysqli_fetch_assoc($sql_fetch))
    {
        $stud_ID = $details['ClientStudentNo']; 
    }
    $sql_fetchpic = mysqli_query($conn, "SELECT PictureFilename from clientprofilepictureinfo WHERE ClientAccountID = '$id' AND UsedStatus = TRUE ");
    while($detailpic = mysqli_fetch_assoc($sql_fetchpic))
    {
        $prof_pic = $detailpic['PictureFilename'];
        $directory = "../../assets/user_profile_pic/";
        ?>
        <img class="prof_pic" id="prof_pic" src="<?php echo $directory, $stud_ID,'/', $prof_pic?>" alt="Profile Pic">
        <div class="upload_pic">
            <input class="upload_pic_hidden" id="pic_filename" type="file" name="pic_filename" accept="image/*" visbility="hidden">
            <label class="pic_bttn" for="pic_filename"><i class="fas fa-camera"></i> Edit Profile Picture</label>
        </div>
        <?php
    }
    

?>