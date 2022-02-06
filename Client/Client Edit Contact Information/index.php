<?php
    $title = 'Profile Edit';
    $page = 'client_edit_profile';
    include_once('../includes/header.php');


    $sql_fetch = mysqli_query($conn, "SELECT ClientAddress, ClientContactNo, ClientGuardian, ClientGuardianNo, ClientEmailAdd 
    from clientaccountinfo WHERE ClientAccountID = '$id'");
    while($details = mysqli_fetch_assoc($sql_fetch))
    {
        $add = $details['ClientAddress']; $cNom = $details['ClientContactNo']; $cguard = $details['ClientGuardian']; 
        $cguardNum = $details['ClientGuardianNo']; $email = $details['ClientEmailAdd']; 
    }
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
                        $sub_page = 'client_e_cont_info';
                        include('../includes/prof_sub_nav.php');
                    ?>
                </div>
                <form id="editContactInfo" method="POST">
                    <div class="sub_content">
                        <div class="profile_content_info">

                            <h4>Contact Information:</h4>

                            <div class="input-container">

                                <div class="input-container">
                                    <label class="label" for="#">Email Address: </label>
                                    <input type="text" class="input-field" name="email" id="email" value="<?php echo $email?>">
                                    <i id="i_email" class="fas"></i>
                                </div>     
                            </div>
                            
                            <div class="input-container">

                                <div class="input-container">
                                    <label class="label" for="#">Address: </label>
                                    <input type="text" class="input-field" name="add" id="add" value="<?php echo $add?>">
                                    <i id="i_add" class="fas"></i>
                                </div>

                                <div class="input-container">
                                    <label class="label" for="#">Contact Number: </label>
                                    <input type="text" class="input-field" name="cNom" id="cNom" value="<?php echo $cNom?>">
                                    <i id="i_cNom" class="fas"></i>
                                </div>

                            </div>

                            <div class="input-container">
                                <div class="input-container">
                                    <label class="label" for="#">Guardian's Name: </label>
                                    <input type="text" class="input-field" name="cguard" id="cguard" value="<?php echo $cguard?>">
                                    <i id="i_cguard" class="fas"></i>
                                </div>

                                <div class="input-container">
                                    <label class="label" for="#">Guardian's Contact Number: </label>
                                    <input type="text" class="input-field" name="cguardNum" id="cguardNum" value="<?php echo $cguardNum?>">
                                    <i id="i_cguardNum" class="fas"></i>
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