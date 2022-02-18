<?php
    $title = 'Profile';
    $page = 'admin_profile';
    include_once('../includes/header.php');

    $sql_fetch = mysqli_query($conn, "SELECT AdminFirstName, AdminMiddleName, AdminLastName, AdminSufifx,
     AdminContactNo, AdminEmailAdd, AdminAddress from adminaccountinfo WHERE AdminAccountID = '$id'");
    while($details = mysqli_fetch_assoc($sql_fetch))
    {
        $fname = $details['AdminFirstName']; $mname = $details['AdminMiddleName']; $lname = $details['AdminLastName']; $sname = $details['AdminSufifx'];
        $aAdd = $details['AdminAddress']; $aNo = $details['AdminContactNo']; $aEmail = $details['AdminEmailAdd']; 
    }

    $sql_fetchpic = mysqli_query($conn, "SELECT PictureFilename from adminprofilepictureinfo WHERE AdminAccountID = '$id' AND UsedStatus = TRUE ");
    while($detailpic = mysqli_fetch_assoc($sql_fetchpic))
    {
        $prof_pic = $detailpic['PictureFilename'];
    }
    $directory = "../../assets/user_profile_pic/admin/";

    $id = $_SESSION['AdminID'];
    $sql_fetch = mysqli_query($conn, "SELECT * from adminaccountinfo WHERE AdminAccountID = '$id'");
    $name = "";
    while($row = mysqli_fetch_assoc($sql_fetch))
    {
        $name = $row['AdminAccountID'];
    }

    include '../../assets/connection/dbconnection.php';
    $sched = $conn->query("SELECT`id`,
    `title`,
    `end_app`,
    `stat`,
    t2.AdminAccountID as AdminAccountID,
    t2.AdminFirstName as firstName,
    t2.AdminLastName as lastName
    FROM schedules t1
    INNER JOIN adminaccountinfo t2 ON t1.remarks = t2.AdminAccountID 
    
    WHERE `stat` = 'Done' AND AdminAccountID = '$name'
    LIMIT 5");
?>
    <div class="body_container">
        <div class="content">
            <a href="../Administrator Edit Personal Info" class="acc_bttn" ><i class="fas fa-user-cog"></i></a>
            <p>Profile Info</p>
            <div class="profile_info">
                <div class="profile_pic" id="prof_pic_div">
                    <img class="prof_pic" id="prof_pic" src="<?php echo $directory,'pbcscvs',$id,'/', $prof_pic?>" alt="Profile Pic">
                    <div class="upload_pic">
                        <input class="upload_pic_hidden" id="pic_filename" type="file" name="pic_filename" accept="image/*" visbility="hidden">
                        <label class="pic_bttn" for="pic_filename"><i class="fas fa-camera"></i> Edit Profile Picture</label>
                     </div>
                    </div>
                <div class="profile_content_info">
                    <div class="input-container">
                        <label class="label" for="#">Full Name: </label>
                        <p class="input-field"><?php echo $lname, ', ', $fname ,' ', $mname ,' ', $sname?></p>
                    </div>
                    <div class="input-container">
                        <label class="label" for="#">Full Address: </label>
                        <p class="input-field"><?php echo $aAdd?></p>
                    </div>
                    <div class="input-container">
                        <label class="label" for="#">Email Address: </label>
                        <p class="input-field"><?php echo $aEmail?></p>
                    </div>
                    <div class="input-container">
                        <label class="label" for="#">Contact Name: </label>
                        <p class="input-field"><?php echo $aNo?></p>
                    </div>
                </div>
            </div>

            <div class="counceling_records_content">
                <h3>Appointment Records</h3>
                <table class="cr_record">
                     <tr> 
                         <th class="cr_title">Appointment Num.</th>
                         <th class="cr_title">Title Appointment</th>
                        <th class="cr_title">Date</th>
                        <th class="cr_title">Monitored by:</th>
                        <th class="cr_title">Status</th>
                    </tr>
                    <?php while($row = $sched->fetch_array()){
                                $id = $row['id'];
                            $title = $row['title'];
                            $dateFormat = date("d/m/Y", strtotime($row['end_app']));
                            $status = $row['stat'];
                            $nameFormat = $row['lastName'].', '.$row['firstName'];
                            
                            ?>
                    <tr>
                        <td class="cr_data"><?= $id ?></td>
                        <td class="cr_data"><?= $title ?></td>
                        <td class="cr_data"><?= $dateFormat ?></td>
                        <td class="cr_data"><?= $nameFormat ?></td> 
                        <td class="cr_data">
                    <?= $status ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        
        </div>
    </div>

    <?php
        include('assets/modal_edit_picture.php')
    ?>
    <script src="assets/js/main.js"></script>
    
</body>

</html>