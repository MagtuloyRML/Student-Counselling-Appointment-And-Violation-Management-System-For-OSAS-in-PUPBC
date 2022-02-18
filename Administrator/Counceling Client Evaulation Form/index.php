<?php
    $title = 'Evaulation Form';
    $page = 'maintenance';
    include_once('../includes/header.php');
    
    
?>
    <div class="body_container">
        <div class="content">
            <div class="title">
                <h1>System Maintenance</h1>
                <hr>
            </div>
            <div class="subcontent">
                
                <h3 class="subtitle">Evaulation Form</h3>
                        <div class="profile_pic">
                            <div id="prof_pic_div">
                                <img class="prof_pic" id="prof_pic" src="../../assets/user_profile_pic/default_user.jpg" alt="Profile Pic">
                            </div>
                        </div>
                        <h4>Client Information:</h4>
                        <div class="input_group">
                            <div class="input_container">
                                <label for="#" class="label">Full Name: </label>
                                <div class="input " id="input_fst_name">
                                    <input class="input-field" type="text" placeholder="None" name="fst_name" id="fst_name" readonly>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Birtdate: </label>
                                <div class="input " id="input_mid_name">
                                    <input class="input-field" type="text" placeholder="None" name="mid_name" id="mid_name" readonly>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Gender: </label>
                                <div class="input " id="input_last_name">
                                    <input class="input-field" type="text" placeholder="None" name="last_name" id="last_name" readonly>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Email: </label>
                                <div class="input " id="input_admin_email">
                                    <input class="input-field" type="text" placeholder="None" name="admin_email" id="admin_email" readonly>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Address: </label>
                                <div class="input " id="input_add">
                                    <input class="input-field " type="" placeholder="None" name="add" id="add" readonly>
                                </div>
                                
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Contact Number: </label>
                                <div class="input " id="input_admin_contact">
                                    <input class="input-field" type="text" placeholder="None" name="admin_contact" id="admin_contact" readonly>
                                </div>
                            </div>
                        </div>
                    <form id="evaluate"  method = "POST">
                        <div class="input_group">
                            <div class="input_container eval">
                                <label for="#" class="label">Evaulation: </label>
                                <div class="input " id="input_fname">
                                    <input type="text" class="input-field" name="prepass" id="prepass" >
                                    <i class="fa-solid fa-asterisk"></i>
                                    <i id="i_gender" class="fa-solid "></i>
                                </div>
                            </div>
                            <div class="input_container eval">
                                <label for="#" class="label">Recommendation: </label>
                                <div class="input " id="input_fname">
                                    <input type="text" class="input-field" name="prepass" id="prepass" >
                                    <i class="fa-solid fa-asterisk"></i>
                                    <i id="i_gender" class="fa-solid "></i>
                                </div>
                            </div>
                        </div>                 
                        <div class="action_content">
                            <button class= "bttn" type="submit" name="submit" id="submit">
                            <i class="fa-solid fa-address-card"></i>  Sumbit Form</button>
                        </div>
                    </form>
                
                
            </div>

        </div>
    </div>

    <script src="assets/js/main.js"></script>

</body>
</html>