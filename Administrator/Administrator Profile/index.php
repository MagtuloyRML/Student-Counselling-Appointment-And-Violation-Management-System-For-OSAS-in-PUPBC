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
?>
    <div class="body_container">
        <div class="content">
            <a href="../Administrator Edit Personal Info" class="acc_bttn" ><i class="fas fa-user-cog"></i></a>
            <p>Profile Info</p>
            <div class="profile_info">
                <div class="profile_pic">
                    <div id="prof_pic_div">
                        <img class="prof_pic" id="prof_pic" src="<?php echo $directory,'pbcscvs',$id,'/', $prof_pic?>" alt="Profile Pic">
                    </div>
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
                         <th class="cr_title">Date and Time</th>
                        <th class="cr_title">Name</th>
                        <th class="cr_title">Monitored by:</th>
                        
                    </tr>
                <?php 
                $id = $_SESSION['AdminID'];

                $sql_fetch = mysqli_query($conn, 
                "SELECT eval.appointment_id, appointSched.app_date, appointSched.start_app, appointSched.end_app, 
                appointSched.anonymity, appointSched.client_id, client.ClientFirstName,
                client.ClientMiddleName, client.ClientLastName, client.ClientSuffix
                FROM forevaluation AS eval 
                INNER JOIN schedules AS appointSched 
                ON eval.appointment_id = appointSched.id 
                INNER JOIN clientaccountinfo AS client 
                ON appointSched.client_id = client.ClientAccountID WHERE eval.evaluator_id = '$id' ");
                while($row = mysqli_fetch_assoc($sql_fetch))
                {
                    $app_id = $row['appointment_id']; $dateSTime = $row['start_app']; 
                    $dateNTime = $row['end_app']; $app_date = $row['app_date']; 
                    $anonymity = $row['anonymity']; $client_id = $row['client_id'];
                    if($anonymity == 'Yes'){
                        $name = 'Anonymous'.$client_id; 
                    }
                    else{
                        $name = $row['ClientLastName'].", ".$row['ClientFirstName']." ".$row['ClientMiddleName']." ".$row['ClientSuffix']; 
                    }
                ?>
                
                    <tr>
                        <td class="cr_data"><?= $app_id ?></td>
                        <td class="cr_data"><?php echo $app_date.' '.date('h:i A', strtotime($dateSTime)).' - '.date('h:i A', strtotime($dateNTime)); ?></td>
                        <td class="cr_data"><?= $name ?></td>
                        <td class="cr_data">
                            <a href="../Counceling Client Review Evaulation/?a_id=<?php echo $app_id; ?>" class="bttn_table">
                            <i class="fa-solid fa-book-open"></i>  Review</a>
                        </td> 
                    </tr>
                    <?php }?>
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