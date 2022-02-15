<?php
    $title = 'Profile';
    $page = 'admin_profile';
    include_once('../includes/header.php');

    $sql_fetch = mysqli_query($conn, "SELECT AdminFirstName, AdminMiddleName, AdminLastName, AdminSufifx,
     AdminContactNo, AdminEmailAdd, AdminAddress from adminaccountinfo WHERE AdminAccountID = '$id'");
    while($details = mysqli_fetch_assoc($sql_fetch))
    {
        $fname = $details['AdminFirstName']; $mname = $details['AdminMiddleName']; $lname = $details['AdminLastName']; $sname = $details['AdminSufifx'];
        $aNo = $details['AdminContactNo']; $aEmail = $details['AdminEmailAdd']; $aAdd = $details['AdminAddress']; 
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
                <a href="../Administrator Profile/" class="acc_bttn"><i class="fas fa-arrow-left"></i></a>
                <p>Edit Profile Info</p>
                <div class="profile_info">
                    <div class="profile_pic" >
                        <div id="prof_pic_div">
                            <img class="prof_pic" id="prof_pic" src="<?php echo $directory,'pbcscvs',$id,'/', $prof_pic?>" alt="Profile Pic">
                        </div>
                        <div class="upload_pic">
                            <input class="upload_pic_hidden" id="pic_filename" type="file" name="pic_filename" accept="image/*" visbility="hidden">
                            <label class="pic_bttn" for="pic_filename"><i class="fas fa-camera"></i> Edit Profile Picture</label>
                        </div>
                    </div>
                </div>

            
                <div>
                    <?php
                        $sub_page = 'admin_e_personal_info';
                        include('../includes/prof_sub_nav.php');
                    ?>
                </div>
                <form id="editInfo" action="assets/updateInfo.php" method="POST">
                    <div class="sub_content">
                        <h4>Personal Information:</h4>

                        <h4>Full Name:</h4>
                        <div class="input_group">
                            <div class="input_container">
                                <label for="#" class="label">First Name: </label>
                                <div class="input " id="input_fname">
                                    <input type="text" class="input-field" name="fname" id="fname" value="<?php echo $fname?>">
                                    <i id="i_fname" class="fas" ></i>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Middle Name: </label>
                                <div class="input " id="input_mname">
                                    <input type="text" class="input-field" name="mname" id="mname" value="<?php echo $mname?>">
                                    <i id="i_mname" class="fas"></i>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Last Name: </label>
                                <div class="input " id="input_lname">
                                    <input type="text" class="input-field" name="lname" id="lname" value="<?php echo $lname?>">
                                    <i id="i_lname"class="fas" ></i>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Suffix Name:</label>
                                <div class="input " id="input_suffname">
                                    <input type="text" class="input-field" name="suffname" id="suffname" value="<?php echo $sname?>">
                                    <i id="i_suffname" class="fas"></i>
                                </div>
                            </div>
                        </div>

                        <h4>Contact Details:</h4>
                        <div class="input_group">
                            <div class="input_container">
                                <label for="#" class="label">Contact Number: </label>
                                <div class="input " id="input_aNo">
                                    <input type="text" class="input-field" name="aNo" id="aNo" value="<?php echo $aNo?>">
                                    <i id="i_aNo" class="fas" ></i>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Email Address: </label>
                                <div class="input " id="input_aEmail">
                                    <input type="text" class="input-field" name="aEmail" id="aEmail" value="<?php echo $aEmail?>">
                                    <i id="i_aEmail" class="fas"></i>
                                </div>
                            </div>
                            <div class="input_container add">
                                <label for="#" class="label">Address: </label>
                                <div class="input " id="input_aAdd">
                                    <input type="text" class="input-field" name="aAdd" id="aAdd" value="<?php echo $aAdd?>">
                                    <i id="i_aAdd" class="fas"></i>
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