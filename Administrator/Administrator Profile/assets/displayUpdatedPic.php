<?php
    session_start();
    $id = $_SESSION['AdminID'];
    include '../../../assets/connection/DBconnection.php';
    
    $sql_fetchpic = mysqli_query($conn, "SELECT PictureFilename from adminprofilepictureinfo WHERE AdminAccountID = '$id' AND UsedStatus = TRUE ");
    while($detailpic = mysqli_fetch_assoc($sql_fetchpic))
    {
        $prof_pic = $detailpic['PictureFilename'];
        $directory = "../../assets/user_profile_pic/admin/";
        ?>
            <img class="prof_pic" id="prof_pic" src="<?php echo $directory,'pbcscvs',$id,'/', $prof_pic?>" alt="Profile Pic">
            
        <?php
    }
    

?>