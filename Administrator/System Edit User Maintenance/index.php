<?php
    $title = 'User Maintenance';
    $page = 'maintenance';
    include_once('../includes/header.php');

    $connection = new mysqli('localhost', 'root','','test_db');
    if ($connection->connect_error){
        die(
            'Error : ('. $connection->connect_errno.') '.$connection->connect_error
        );
    }

    $idFecth = $_SESSION['AdminID'];
    $sql_fetchid = mysqli_query($connection, 
    "SELECT adminAccount.AdminFirstName, adminAccount.AdminUserRoleID, userRole.AdminPageStudentCounceling, 
    userRole.AdminPageViolation, userRole.AdminMaintenance, userRole.StatusID
    FROM adminaccountinfo AS adminAccount 
    INNER JOIN adminuserrole AS userRole 
    ON adminAccount.AdminUserRoleID = userRole.AdminUserRoleID WHERE adminAccount.AdminAccountID = '$idFecth' ");
    
    while($row = mysqli_fetch_assoc($sql_fetchid))
    {
        $userRoleID = $row['AdminUserRoleID']; 
        $studCounceling = $row['AdminPageStudentCounceling']; $studViol = $row['AdminPageViolation']; 
        $systemMaintenance = $row['AdminMaintenance']; $roleStatus = $row['StatusID']; 
    }
    if ($systemMaintenance != '1'){
        header('Location: ../Page 404/');
    }

    $acc_id = $_GET['acc_id'];

    $userRole = $conn->query("SELECT AdminAccountID, AdminFirstName, AdminMiddleName, AdminLastName, AdminSufifx, 
    AdminUserRoleID, AccountStatusID FROM adminaccountinfo WHERE AdminAccountID = '$acc_id' ");
    while($row = $userRole->fetch_assoc()){
        $id = $row['AdminAccountID']; $fname = $row['AdminFirstName']; $mname = $row['AdminMiddleName']; 
        $lname = $row['AdminLastName']; $sname = $row['AdminSufifx'];
        $AdminUserRoleID = $row['AdminUserRoleID']; $AccountStatusID = $row['AccountStatusID'];
    
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

                    $sub_content = 'admin_userPage';
                    include '../includes/sub_content_navadd.php';
                ?>
                <a href="../System User Maintenance/" class="acc_bttn"><i class="fas fa-arrow-left"></i></a>
                <h3 class="subtitle">Edit Account Role</h3>

                <form id="edituserRole"  method = "POST">
                    <div class="input_group">
                        <input class="input" type="hidden" id="id" name="id" value="<?php echo $id ?>">
                        <div class="input_container">
                            <label for="#" class="label">Role Name: </label>
                            <div class="input " id="input_roleName">
                                <input class="input-field" type="text" placeholder="Insert Role Name" name="NameCheck" 
                                id="NameCheck" value="<?php echo $lname.', '.$fname.' '.$mname.' '.$sname ?>" readonly>
                                <i id="i_Name" class="fa-solid "></i>
                            </div>
                        </div>
                        <div class="input_container">
                            <label for="roleCouncheck" class="labelcheck">Admin User Role: </label>
                            <div class="input " id="input_roleName">
                                <select class="input-field" name="roleCouncheck" id="roleCouncheck">
                                    <option value = '' disabled >Role User</option>
                                    <?php 
                                        $userRole = mysqli_query($conn, "SELECT AdminUserRoleID, AdminUserRole FROM `adminuserrole`");
                                        while($row2 = mysqli_fetch_assoc($userRole)){
                                        $roleID = $row2['AdminUserRoleID']; $roleName = $row2['AdminUserRole'];
                                    ?>
                                    <option value = "<?php echo $roleID ?>" <?php if($roleID == $AdminUserRoleID ){echo "selected";} ?>> <?php echo $roleName?>  </option>
                                    <?php }?>
                                </select>
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_roleCouncheck" class="fa-solid "></i>
                            </div>
                        </div>
                        <div class="input_container">
                            <label for="status" class="labelcheck">Account Status: </label>
                            <div class="input " id="input_roleName">
                                <select class="input-field" name="status" id="status">
                                    <option value = '' disabled>Status</option>
                                    <?php 
                                        $statuscheck = mysqli_query($conn, "SELECT AccountStatusID, StatusDescription FROM `accountstatus`");
                                        while($row3 = mysqli_fetch_assoc($statuscheck)){
                                        $statsID = $row3['AccountStatusID']; $statsName = $row3['StatusDescription'];
                                    ?>
                                        <option value = "<?php echo $statsID ?>" <?php if($statsID == $AccountStatusID ){echo "selected";} ?>> <?php echo $statsName?>  </option>
                                    <?php }?>
                                </select>
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_status" class="fa-solid "></i>
                            </div>
                        </div>
                    </div> 

                    <div class="action_content">
                        <button class= "bttn" type="submit" name="submit" id="submitRole">
                        <i class="fa-solid fa-check-to-slot"></i> Edit Role</button>
                    </div>
                    <?php }?>
                </form>
                
            </div>

        </div>
    </div>

    <script src="assets/js/main.js"></script>

</body>
</html>