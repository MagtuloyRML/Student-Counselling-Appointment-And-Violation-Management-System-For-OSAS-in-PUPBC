<?php
    $title = 'Profile';
    $page = 'client_profile';
    include_once('../includes/header.php');

    $sql_fetch = mysqli_query($conn, "SELECT ClientFirstName, ClientMiddleName, ClientLastName, ClientSuffix, ClientStudentNo,
     ClientBDay, ClientAddress, ClientContactNo, ClientGuardian, ClientGuardianNo, ClientEmailAdd from clientaccountinfo WHERE ClientAccountID = '$id'");
    while($details = mysqli_fetch_assoc($sql_fetch))
    {
        $fname = $details['ClientFirstName']; $mname = $details['ClientMiddleName']; $lname = $details['ClientLastName']; $sname = $details['ClientSuffix'];
        $stud_ID = $details['ClientStudentNo']; $bday = $details['ClientBDay']; $cAdd = $details['ClientAddress']; $cNo = $details['ClientContactNo'];
        $gName = $details['ClientGuardian']; $cGNo = $details['ClientGuardianNo']; $cEmail = $details['ClientEmailAdd']; 
    }
    $newBday = date_create($bday);

    $sql_fetchpic = mysqli_query($conn, "SELECT PictureFilename from clientprofilepictureinfo WHERE ClientAccountID = '$id' AND UsedStatus = TRUE ");
    while($detailpic = mysqli_fetch_assoc($sql_fetchpic))
    {
        $prof_pic = $detailpic['PictureFilename'];
    }
    $directory = "../../assets/user_profile_pic/client/";
?>
    <div class="content">
        <div class="profile">
            <a href="../Client Edit Personal Information/" class="acc_bttn" ><i class="fas fa-user-cog"></i></a>
            <p>Profile Info</p>
            <div class="profile_info">
                <div class="profile_pic" >
                    <div id="prof_pic_div">
                        <img class="prof_pic" id="prof_pic" src="<?php echo $directory, $stud_ID,'/', $prof_pic?>" alt="Profile Pic">
                    </div>
                    
                    <div class="upload_pic">
                        <input class="upload_pic_hidden" id="pic_filename" type="file" name="pic_filename" accept="image/*" visbility="hidden">
                        <label class="pic_bttn" for="pic_filename"><i class="fas fa-camera"></i> Edit Profile Picture</label>
                    </div>
                </div>

                <div class="profile_content_info">
                    <div class="input-container">
                        <label class="label" for="#">Student Number: </label>
                       <p class="input-field"><?php echo $stud_ID?></p>
                    </div>
                    <div class="input-container">
                        <label class="label" for="#">Full Name: </label>
                        <p class="input-field"><?php echo $lname, ', ', $fname ,' ', $mname ,' ', $sname?></p>
                    </div>
                    <div class="input-container">
                        <label class="label" for="#">BirthDate: </label>
                        <p class="input-field"><?php echo date_format($newBday,"F j, Y")?></p>
                    </div>
                    <div class="input-container">
                        <label class="label" for="#">Full Address: </label>
                        <p class="input-field"><?php echo $cAdd?></p>
                    </div>
                    <div class="input-container">
                        <label class="label" for="#">Email Address: </label>
                        <p class="input-field"><?php echo $cEmail?></p>
                    </div>
                    <div class="input-container">
                        <label class="label" for="#">Contact Name: </label>
                        <p class="input-field"><?php echo $cNo?></p>
                    </div>
                    <div class="input-container">
                        <label class="label" for="#">Guardian's Name: </label>
                        <p class="input-field"><?php echo $gName?></p>
                    </div>
                   <div class="input-container">
                       <label class="label" for="#">Guardian's Contact Number: </label>
                        <p class="input-field"><?php echo $cGNo?></p>
                    </div>
                </div>
            </div>

            <div class="counceling_records_content">
                <h4>Counceling Records</h4>
                <table class="cr_record">
                    <tr> 
                        <th class="cr_title">Counceling Num.</th>
                        <th class="cr_title">Title Counceling</th>
                        <th class="cr_title">Date</th>
                        <th class="cr_title">Monitored by:</th>
                        <th class="cr_title">Status</th>
                    </tr>
                    <tr>
                        <td class="cr_data">NO DATA AVAILABLE</td>
                        <td class="cr_data">NO DATA AVAILABLE</td>
                        <td class="cr_data">NO DATA AVAILABLE</td>
                        <td class="cr_data">NO DATA AVAILABLE</td> 
                        <td class="cr_data">NO DATA AVAILABLE</td>
                    </tr>
                </table>
            </div>

            <div id="memapic">

            </div>

        </div>
    </div>

    <?php
        include('assets/modal_edit_picture.php')
    ?>
    <script src="assets/js/main.js"></script>
    
    
</body>

</html>