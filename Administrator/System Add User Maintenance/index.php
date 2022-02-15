<?php
    $title = 'User Maintenance';
    $page = 'maintenance';
    include_once('../includes/header.php');

    $result1 = mysqli_query($conn, "SELECT * from genderrole");
    $options = "";
    while($row2 = mysqli_fetch_array($result1))
    {
        $options = $options."<option value='$row2[0]'>$row2[1]</option>";
    }

    $result2 = mysqli_query($conn, "SELECT AdminUserRoleID, AdminUserRole from adminuserrole");
    $role = "";
    while($row3 = mysqli_fetch_array($result2))
    {
        $role = $role."<option value='$row3[0]'>$row3[1]</option>";
    }
?>
    <div class="body_container">
        <div class="content">
            <div class="title">
                <h1>System Maintenance</h1>
                <hr>
            </div>
            <div class="subcontent">
                <?php
                    $sub_page = 'main_admin';
                    include '../includes/main_sub_nav.php';

                    $sub_content = 'add_admin';
                    include '../includes/sub_content_navadd.php';
                ?>
                <h3 class="subtitle">Information Form</h3>
                    <?php
                        include '../../assets/connection/DBconnection.php';
                        $result1 = mysqli_query($conn, "SELECT * from genderrole");
                        $options = "";
                        while($row2 = mysqli_fetch_array($result1))
                        {
                            $options = $options."<option value='$row2[0]'>$row2[1]</option>";
                        }
                        $roleCheck = mysqli_query($conn, "SELECT AdminUserRoleID, AdminUserRole FROM `adminuserrole`");
                        $optionsRole = "";
                        while($row1 = mysqli_fetch_array($roleCheck))
                        {
                            $optionsRole = $optionsRole."<option value='$row1[0]'>$row1[1]</option>";
                        }
                    ?>
                    <form id="addUser"  method = "POST">
                        <div class="input_group">

                            <div class="input_container">
                                <label for="#" class="label">First Name: </label>
                                <div class="input " id="input_fst_name">
                                    <input class="input-field" type="text" placeholder="Ex: Juan" name="fst_name" id="fst_name">
                                    <i id="i_fst_name" ></i>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Middle Name: </label>
                                <div class="input " id="input_mid_name">
                                    <input class="input-field" type="text" placeholder="Leave if None" name="mid_name" id="mid_name">
                                    <i id="i_mid_name" ></i>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Last Name: </label>
                                <div class="input " id="input_last_name">
                                    <input class="input-field" type="text" placeholder="Ex: Dela Cruz" name="last_name" id="last_name">
                                    <i id="i_last_name" ></i>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Suffix Name: </label>
                                <div class="input " id="input_suf_name">
                                    <input class="input-field" type="text" placeholder="Ex: Jr. (Leave if None)" name="suf_name" id="suf_name">
                                    <i id="i_suf_name" ></i>
                                </div>
                            </div>

                            <div class="input_container" >
                                <label for="#" class="label">User Role: </label>
                                <div class="input " id="input_userRole">
                                    <select class="input-field select" name="userRole" id="userRole">
                                        <option value = '' >Select User Role</option>
                                        <?php echo $optionsRole; ?>
                                    </select>
                                    <i id="i_userRole" ></i>
                                </div>
                            </div>

                            <div class="input_container">
                                <label for="#" class="label">Email: </label>
                                <div class="input " id="input_admin_email">
                                    <input class="input-field" type="text" placeholder="Ex: dcJuan@gmail.com" name="admin_email" id="admin_email">
                                    <i id="i_admin_email" ></i>
                                </div>
                            </div>
                            
                            <div class="input_container">
                                <label for="#" class="label">Username: </label>
                                <div class="input " id="input_username">
                                    <input class="input-field" type="text" placeholder="Ex: dcJuan1234" name="username" id="username">
                                    <i id="i_username" ></i>
                                </div>
                            </div>
                            
                            <div class="input_container">
                                <label for="#" class="label">Address: </label>
                                <div class="input " id="input_add">
                                    <input class="input-field " type="" placeholder="Address" name="add" id="add">
                                    <i id="i_add" ></i>
                                </div>
                                
                            </div>
                            <div class="input_container" >
                                <label for="#" class="label">Gender: </label>
                                <div class="input " id="input_gender">
                                    <select class="input-field select" name="gender" id="gender">
                                        <option value = '' >Select Gender</option>
                                        <?php echo $options; ?>
                                    </select>
                                    <i id="i_gender" ></i>
                                </div>
                            </div>
                            
                            <div class="input_container">
                                <label for="#" class="label">Contact Number: </label>
                                <div class="input " id="input_admin_contact">
                                    <input class="input-field" type="text" placeholder="Ex: 09*********" name="admin_contact" id="admin_contact">
                                    <i id="i_admin_contact" ></i>
                                </div>
                                
                            </div>
                            
                        </div> 
                        <div class="action_content">
                            <button class= "bttn" type="submit" name="submit" id="submit">
                            <i class="fa-solid fa-user-plus"></i> Add User</button>
                        </div>
                    </form>
                
                
            </div>

        </div>
    </div>

    <script src="assets/js/main.js"></script>

</body>
</html>