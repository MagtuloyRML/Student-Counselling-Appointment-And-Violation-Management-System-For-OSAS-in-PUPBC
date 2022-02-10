<?php
    $title = 'Profile Edit';
    $page = 'client_edit_profile';
    include_once('../includes/header.php');


    $sql_fetch = mysqli_query($conn, "SELECT ClientFirstName, ClientMiddleName, ClientLastName, ClientSuffix, ClientStudentNo,
     ClientBDay, ClientGenderID from clientaccountinfo WHERE ClientAccountID = '$id'");
    while($details = mysqli_fetch_assoc($sql_fetch))
    {
        $fname = $details['ClientFirstName']; $mname = $details['ClientMiddleName']; $lname = $details['ClientLastName']; $sname = $details['ClientSuffix'];
        $stud_ID = $details['ClientStudentNo']; $bday = $details['ClientBDay']; $gend = $details['ClientGenderID'];; 
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
            <a href="../Client Profile/" class="acc_bttn"><i class="fas fa-arrow-left"></i></a>
            <p>Edit Profile Info</p>
            <div class="profile_info">
                <div class="pic_container">
                    <div class="profile_pic" id="prof_pic_div">                  
                        <img class="prof_pic" id="prof_pic" src="<?php echo $directory, $stud_ID,'/', $prof_pic?>" alt="Profile Pic">
                        <div class="upload_pic">
                            <input class="upload_pic_hidden" id="pic_filename" type="file" name="pic_filename" accept="image/*" visbility="hidden">
                            <label class="pic_bttn" for="pic_filename"><i class="fas fa-camera"></i> Edit Profile Picture</label>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <?php
                    $sub_page = 'client_e_personal_info';
                    include('../includes/prof_sub_nav.php');
                ?>
            </div>
            <form id="editInfo" method="POST">
                <div class="sub_content">
                        
                        <h4>Personal Information:</h4>

                        <div class="input_group">
                            <div class="input_container stud_id">
                                <label for="#" class="label">Student Number: </label>
                                <div class="input " id="input_stud_num">
                                    <input type="text" class="input-field" name="stud_num" id="stud_num" value="<?php echo $stud_ID?>">
                                    <i id="i_stud_num" class="fas"></i>
                                </div>
                            </div>
                        </div>

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

                        <h4>Other Information:</h4>

                        <div class="input_group">
                            <div class="input_container">
                                <label for="#" class="label">BirthDate: </label>
                                <div class="input " id="input_bday">
                                    <input type="text" class="input-field" name="bday" id="bday" value="<?php echo $bday?>">
                                    <i id="i_bday" class="fas"></i>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Gender: </label>
                                <div class="input " id="input_mname">
                                    <select class="input-field select" name="gender" id="gender">
                                        <option value = '' >Select Gender</option>
                                        <?php 
                                            $result1 = mysqli_query($conn, "SELECT GenderID, Description from genderrole");
                                            while($row2 = mysqli_fetch_assoc($result1))
                                        {   $genderID = $row2['GenderID']; $genderName = $row2['Description'];
                                                ?>
                                            <option value = "<?php echo $genderID ?>" <?php if($genderID == $gend )echo "selected" ?>> <?php echo $genderName?>  </option>
                                        <?php }?>
                                            
                                    </select>
                                    <i id="i_gender" class="fas"></i>
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