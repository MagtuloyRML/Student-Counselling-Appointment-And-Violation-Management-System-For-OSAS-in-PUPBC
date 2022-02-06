<?php
    $title = 'Profile Edit';
    $page = 'client_edit_profile';
    include_once('../includes/header.php');
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
                        $sub_page = 'client_e_acc_config';
                        include('../includes/prof_sub_nav.php');
                    ?>
                </div>
                <form id="editInfo" method="POST">
                    <div class="sub_content">
                        <div class="profile_content_info">

                            <h4>Account Information:</h4>

                            <div class="input-container">
                                <div class="input-container">
                                    <label class="label" for="#">Previous Password: </label>
                                    <input type="password" class="input-field" name="prepass" id="prepass" >
                                    <i class="fas fa-eye" id="viewPass"></i>
                                    <i id="i_prepass" class="fas"></i>
                                </div>
                            </div>

                            <div class="input-container">
                                <div class="input-container">
                                    <label class="label" for="#">New Password: </label>
                                    <input type="password" class="input-field" name="npass" id="npass">
                                    <i class="fas fa-eye" id="viewPass1"></i>
                                    <i id="i_npass" class="fas"></i>
                                </div>
                            </div>

                            <div class="input-container">
                                <div class="input-container">
                                    <label class="label" for="#">Confirm Password: </label>
                                    <input type="password" class="input-field" name="conpass" id="conpass" >
                                    <i class="fas fa-eye" id="viewPass2"></i>
                                    <i id="i_conpass" class="fas"></i>
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