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

    
?>
    <div class="content">
        <div class="profile">
            <a href="../Client Profile/" class="acc_bttn"><i class="fas fa-arrow-left"></i></a>
            <p>Edit Profile Info</p>
            <div class="profile_info">
                <div class="pic_container">
                    <div class="profile_pic">                  
                        <img class="prof_pic" src="../../assets/user_profile_pic/default_user.jpg" alt="Profile Pic">
                        <div class="bttn_group">
                            <button class="pic_bttn" id="openEditPicModal"><i class="fas fa-camera"></i> Profile Piture</button>
                            <button class="pic_bttn" id="openEditPicModal"><i class="fas fa-camera"></i> Profile Piture</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="profile_info">
                <div>
                    <?php
                        $sub_page = 'client_e_personal_info';
                        include('../includes/prof_sub_nav.php');
                    ?>
                </div>
                <form id="editInfo" method="POST">
                    <div class="sub_content">
                        <div class="profile_content_info">

                            <div class="input-container">
                                <label class="label" for="#">Student Number: </label>
                                <input type="text" class="input-field" name="stud_num" id="stud_num" value="<?php echo $stud_ID?>">
                                <i id="i_stud_num" class="fas"></i>
                            </div>

                            <h4>Full Name:</h4>

                            <div class="input-container group">
                                <div class="input">
                                    <label class="label" for="#">First Name: </label>
                                    <div class="input_align" id="input_fname">
                                        <input type="text" class="input-field" name="fname" id="fname" value="<?php echo $fname?>">
                                        <i id="i_fname" class="fas"></i>
                                    </div> 
                                </div>
                                <div class="input">
                                    <label class="label" for="#">Middle Name: </label>
                                    <div class="input_align" id="input_mname">
                                        <input type="text" class="input-field" name="mname" id="mname" value="<?php echo $mname?>">
                                        <i id="i_mname" class="fas"></i>
                                    </div> 
                                </div>
                                <div class="input">
                                    <label class="label" for="#">Last Name: </label>
                                    <div class="input_align" id="input_lname">
                                        <input type="text" class="input-field" name="lname" id="lname" value="<?php echo $lname?>">
                                        <i id="i_lname"class="fas" ></i>
                                    </div> 
                                    
                                </div>
                                <div class="input">
                                    <label class="label" for="#">Suffix Name: </label>
                                    <div class="input_align" id="input_sname">
                                        <input type="text" class="input-field" name="suffname" id="suffname" value="<?php echo $sname?>">
                                        <i id="i_suffname" class="fas"></i>
                                    </div> 
                                </div>
                            </div>

                            <h4>Other Information:</h4>
                            
                            <div class="input-container group">
                                <div class="input-container">
                                    <label class="label" for="#">BirthDate: </label>
                                    <input type="date" class="input-field" name="bday" id="bday" value="<?php echo $bday?>">
                                    <i id="i_bday" class="fas"></i>
                                </div>
                                <div class="input-container">
                                    <label class="label" for="#">Gender: </label>
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

    </div>

    <?php
        include('assets/modal_edit_picture.php')
    ?>
    <script src="assets/js/modal_edit_picture.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>