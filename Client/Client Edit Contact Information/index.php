<?php
    $title = 'Profile Edit';
    $page = 'client_edit_profile';
    include_once('../includes/header.php');

    $sql_fetch = mysqli_query($conn, "SELECT ClientStudentNo, ClientAddress, ClientContactNo, ClientGuardian, ClientGuardianNo, ClientEmailAdd 
    from clientaccountinfo WHERE ClientAccountID = '$id'");
    while($details = mysqli_fetch_assoc($sql_fetch))
    {
        $stud_ID = $details['ClientStudentNo']; $add = $details['ClientAddress']; $cNom = $details['ClientContactNo']; $cguard = $details['ClientGuardian']; 
        $cguardNum = $details['ClientGuardianNo']; $email = $details['ClientEmailAdd']; 
    }
    $sql_fetchpic = mysqli_query($conn, "SELECT PictureFilename from clientprofilepictureinfo WHERE ClientAccountID = '$id' AND UsedStatus = TRUE ");
    while($detailpic = mysqli_fetch_assoc($sql_fetchpic))
    {
        $prof_pic = $detailpic['PictureFilename'];
    }
    $directory = "../../assets/user_profile_pic/client/";
?>
    <div class="content">
        <div class="profile">
            <a href="../Client Profile/" class="acc_bttn"><i class="fas fa-arrow-left"></i></a>
            <p>Edit Profile Info</p>
            <div class="profile_info">
                <div class="pic_container">
                    <div class="profile_pic" >   
                        <div id="prof_pic_div">
                            <img class="prof_pic" id="prof_pic" src="<?php echo $directory, $stud_ID,'/', $prof_pic?>" alt="Profile Pic">
                        </div>               
                        <div class="upload_pic">
                            <input class="upload_pic_hidden" id="pic_filename" type="file" name="pic_filename" accept="image/*" visbility="hidden">
                            <label class="pic_bttn" for="pic_filename"><i class="fas fa-camera"></i> Edit Profile Picture</label>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <?php
                    $sub_page = 'client_e_cont_info';
                    include('../includes/prof_sub_nav.php');
                ?>
            </div>
            <form id="editContactInfo" method="POST">
                <div class="sub_content">
                        
                        <h4>Personal Information:</h4>

                        <div class="input_group">
                            <div class="input_container stud_id">
                                <label for="#" class="label">Student Number: </label>
                                <div class="input " id="input_stud_num">
                                    <input type="text" class="input-field" name="stud_num" id="stud_num" value="<?php echo $stud_ID?>" readonly>
                                    <i id="i_stud_num" class="fas"></i>
                                </div>
                            </div>
                        </div>

                        <h4>Contact Information:</h4>
                        <div class="input_group">
                            <div class="input_container">
                                <label for="#" class="label">Email Address: </label>
                                <div class="input " id="input_fname">
                                    <input type="text" class="input-field" name="email" id="email" value="<?php echo $email?>">
                                    <i id="i_email" class="fas"></i>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Contact Number: </label>
                                <div class="input " id="input_mname">
                                    <input type="text" class="input-field" name="cNom" id="cNom" value="<?php echo $cNom?>">
                                    <i id="i_cNom" class="fas"></i>
                                </div>
                            </div>
                        </div>

                        <div class="input_group">
                            <div class="input_container">
                                <label for="#" class="label">Guardian's Name: </label>
                                <div class="input " id="input_lname">
                                    <input type="text" class="input-field" name="cguard" id="cguard" value="<?php echo $cguard?>">
                                    <i id="i_cguard" class="fas"></i>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Guardian's Contact Number: </label>
                                <div class="input " id="input_suffname">
                                    <input type="text" class="input-field" name="cguardNum" id="cguardNum" value="<?php echo $cguardNum?>">
                                    <i id="i_cguardNum" class="fas"></i>
                                </div>
                            </div>
                        </div>

                        <div class="input_group">
                            <div class="input_container add">
                                <label for="#" class="label">Address: </label>
                                <div class="input " id="input_stud_num">
                                    <input type="text" class="input-field" name="add" id="add" value="<?php echo $add?>">
                                    <i id="i_add" class="fas"></i>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="config_bttn_group">
                    <button type="sumbit" class="config_bttn" id="saveInfo" ><i class="fas fa-save"></i> Save</button>
                </div>
            </form>
        </div>

    </div>

    <?php
        include('assets/modal_edit_picture.php')
    ?>
    <script src="assets/js/main.js"></script>
</body>

</html>