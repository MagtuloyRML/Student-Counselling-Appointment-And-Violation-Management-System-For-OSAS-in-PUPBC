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
        echo "<script> window.location.href = '../Page 404/';</script>";
    }

    $role_id = $_GET['role_id'];

    $userRole = $conn->query("SELECT * FROM adminuserrole WHERE AdminUserRoleID = '$role_id' ");
    while($row = $userRole->fetch_assoc()){
        $id = $row['AdminUserRoleID']; $roleName = $row['AdminUserRole']; $studentCounc = $row['AdminPageStudentCounceling']; 
        $studentViolation = $row['AdminPageViolation'];
        $sysMain = $row['AdminMaintenance']; $status = $row['StatusID'];
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
                    $sub_page = 'role_admin';
                    include '../includes/main_sub_nav.php';

                ?>
                <a href="../System User Role Maintenance/" class="acc_bttn"><i class="fas fa-arrow-left"></i></a>
                <h3 class="subtitle">Edit User's Role</h3>

                <form id="editRole"  method = "POST">
                    <div class="input_group">
                        <input class="input" type="hidden" id="id" name="id" value="<?php echo $id ?>">
                        <div class="input_container">
                            <label for="#" class="label">Role Name: </label>
                            <div class="input " id="input_roleName">
                                <input class="input-field" type="text" placeholder="Insert Role Name" name="roleNameCheck" 
                                id="roleNameCheck" value="<?php echo $roleName ?>">
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_roleName" class="fa-solid "></i>
                            </div>
                        </div>
                        <div class="input_container">
                            <label for="studCouncheck" class="labelcheck">Student Counceling: </label>
                            <select class="input_fieldselectAdd" name="studCouncheck" id="studCouncheck">
                                <option value = '' disabled selected>Status</option>
                                    <?php 
                                    $statuscheck = mysqli_query($conn, "SELECT StatusID, StatusDescription FROM `statuscontent`");
                                    while($row3 = mysqli_fetch_assoc($statuscheck)){
                                        $statsID = $row3['StatusID']; $statsName = $row3['StatusDescription'];
                                        ?>
                                    <option value = "<?php echo $statsID ?>" <?php if($statsID == $studentCounc ){echo "selected";}?>> <?php echo $statsName?>  </option>
                                <?php }?>
                            </select>
                            <i class="fa-solid fa-asterisk"></i>
                            <i id="i_studCouncheck" class="fa-solid "></i>
                        </div>
                        <div class="input_container">
                            <label for="studViolationcheck" class="labelcheck">Student Violation: </label>
                            <select class="input_fieldselectAdd" name="studViolationcheck" id="studViolationcheck">
                                <option value = '' disabled selected>Status</option>
                                    <?php 
                                    $statuscheck = mysqli_query($conn, "SELECT StatusID, StatusDescription FROM `statuscontent`");
                                    while($row3 = mysqli_fetch_assoc($statuscheck)){
                                        $statsID = $row3['StatusID']; $statsName = $row3['StatusDescription'];
                                        ?>
                                    <option value = "<?php echo $statsID ?>" <?php if($statsID == $studentViolation ){echo "selected";}?>> <?php echo $statsName?>  </option>
                                <?php }?>
                            </select>
                            <i class="fa-solid fa-asterisk"></i>
                            <i id="i_studViolationcheck" class="fa-solid "></i>
                        </div>
                        <div class="input_container">
                            <label for="sysMainsCheck" class="labelcheck">System Maintenance: </label>
                            <select class="input_fieldselectAdd" name="sysMainsCheck" id="sysMainsCheck">
                                <option value = '' disabled selected>Status</option>
                                    <?php 
                                    $statuscheck = mysqli_query($conn, "SELECT StatusID, StatusDescription FROM `statuscontent`");
                                    while($row3 = mysqli_fetch_assoc($statuscheck)){
                                        $statsID = $row3['StatusID']; $statsName = $row3['StatusDescription'];
                                        ?>
                                    <option value = "<?php echo $statsID ?>" <?php if($statsID == $sysMain ){echo "selected";}?>> <?php echo $statsName?>  </option>
                                <?php }?>
                            </select>
                            <i class="fa-solid fa-asterisk"></i>
                            <i id="i_sysMainsCheck" class="fa-solid "></i>
                        </div>

                        <div class="input_container">
                            <label for="sysMainsCheck" class="labelcheck">Status: </label>
                            <select class="input_fieldselectAdd" name="status" id="status" >
                                <option value = ''disabled  >Status</option>
                                <?php 
                                    $statuscheck = mysqli_query($conn, "SELECT StatusID, StatusDescription FROM `statuscontent`");
                                    while($row3 = mysqli_fetch_assoc($statuscheck)){
                                        $statsID = $row3['StatusID']; $statsName = $row3['StatusDescription'];
                                        ?>
                                    <option value = "<?php echo $statsID ?>" <?php if($statsID == $status ){echo "selected";}?>> <?php echo $statsName?>  </option>
                                <?php }?>
                            </select>
                            <i class="fa-solid fa-asterisk"></i>
                            <i id="i_status" class="fa-solid "></i>
                        </div>
                    </div> 

                    <div class="action_content">
                        <button class= "bttn" type="submit" name="submit" id="submitRole">
                        <i class="fa-solid fa-check-to-slot"></i> Edit Role</button>
                    </div>
                </form>
                
            </div>

        </div>
    </div>

    <script src="assets/js/main.js"></script>

</body>
</html>