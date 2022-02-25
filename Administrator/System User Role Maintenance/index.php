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
                <h3 class="subtitle">User's Role</h3>

                <form id="addRole"  method = "POST">
                    <div class="input_group">
                        <div class="input_container">
                            <label for="#" class="label">Role Name: </label>
                            <div class="input " id="input_roleName">
                                <input class="input-field" type="text" placeholder="Insert Role Name" name="roleNameCheck" id="roleNameCheck">
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_roleName" class="fa-solid "></i>
                            </div>
                        </div>
                        <div class="input_container">
                            <label for="studCouncheck" class="labelcheck">Student Counceling </label>
                            <select class="input_fieldselectAdd" name="studCouncheck" id="studCouncheck">
                                <option value = '' disabled selected>Status</option>
                                    <?php 
                                    $statuscheck = mysqli_query($conn, "SELECT StatusID, StatusDescription FROM `statuscontent`");
                                    while($row3 = mysqli_fetch_assoc($statuscheck)){
                                        $statsID = $row3['StatusID']; $statsName = $row3['StatusDescription'];
                                        ?>
                                    <option value = "<?php echo $statsID ?>" > <?php echo $statsName?>  </option>
                                <?php }?>
                            </select>
                            <i class="fa-solid fa-asterisk"></i>
                            <i id="i_studCouncheck" class="fa-solid "></i>
                        </div>
                        <div class="input_container">
                            <label for="studViolationcheck" class="labelcheck">Student Violation </label>
                            <select class="input_fieldselectAdd" name="studViolationcheck" id="studViolationcheck">
                                <option value = '' disabled selected>Status</option>
                                    <?php 
                                    $statuscheck = mysqli_query($conn, "SELECT StatusID, StatusDescription FROM `statuscontent`");
                                    while($row3 = mysqli_fetch_assoc($statuscheck)){
                                        $statsID = $row3['StatusID']; $statsName = $row3['StatusDescription'];
                                        ?>
                                    <option value = "<?php echo $statsID ?>" > <?php echo $statsName?>  </option>
                                <?php }?>
                            </select>
                            <i class="fa-solid fa-asterisk"></i>
                            <i id="i_studViolationcheck" class="fa-solid "></i>
                        </div>
                        <div class="input_container">
                            <label for="sysMainsCheck" class="labelcheck">System Maintenance </label>
                            <select class="input_fieldselectAdd" name="sysMainsCheck" id="sysMainsCheck">
                                <option value = '' disabled selected>Status</option>
                                    <?php 
                                    $statuscheck = mysqli_query($conn, "SELECT StatusID, StatusDescription FROM `statuscontent`");
                                    while($row3 = mysqli_fetch_assoc($statuscheck)){
                                        $statsID = $row3['StatusID']; $statsName = $row3['StatusDescription'];
                                        ?>
                                    <option value = "<?php echo $statsID ?>" > <?php echo $statsName?>  </option>
                                <?php }?>
                            </select>
                            <i class="fa-solid fa-asterisk"></i>
                            <i id="i_sysMainsCheck" class="fa-solid "></i>
                        </div>
                    </div> 

                    <div class="action_content">
                        <button class= "bttn" type="submit" name="submit" id="submitRole">
                        <i class="fa-solid fa-check-to-slot"></i>  Add Role</button>
                    </div>
                </form>

                <div class="list" id="tableRoles">
                    
                    <h3 class="list_title">Role List</h3>
                        <table class="display">
                            <tr> 
                                <th class="table_title" >Role Name</th>
                                <th class="table_title" style="width: 15%;">Student Counceling</th>
                                <th class="table_title" style="width: 15%;">Student Violation</th>
                                <th class="table_title" style="width: 15%;">System Maintenance</th>
                                <th class="table_title" style="width: 15%;">Status</th>
                                <th class="table_title" style="width: 10%;"> </th>
                            </tr>
                            <?php
                                include_once '../../assets/connection/DBconnection.php';
                                $userRole = $conn->query("SELECT * FROM adminuserrole");
                                while($row = $userRole->fetch_assoc()){
                                    $id = $row['AdminUserRoleID']; $roleName = $row['AdminUserRole']; $studentCounc = $row['AdminPageStudentCounceling']; $studentViolation = $row['AdminPageViolation'];
                                    $sysMain = $row['AdminMaintenance']; $status = $row['StatusID'];
                            ?>
                            <tr>
                                <td class="data"><?php echo $roleName ?></td>
                                <td class="data">
                                    <select class="input_fieldselect" name="studentCounc" id="studentCounc" disabled>
                                        <option value = '' disabled >Status</option>
                                        <?php 
                                            $statuscheck = mysqli_query($conn, "SELECT StatusID, StatusDescription FROM `statuscontent`");
                                            while($row3 = mysqli_fetch_assoc($statuscheck)){
                                                $statsID = $row3['StatusID']; $statsName = $row3['StatusDescription'];
                                                ?>
                                            <option value = "<?php echo $statsID ?>" <?php if($statsID == $studentCounc ){echo "selected";}else{echo "disabled";}?>> <?php echo $statsName?>  </option>
                                        <?php }?>
                                    </select>
                                </td>
                                <td class="data">
                                    <select class="input_fieldselect" name="studentViolation" id="studentViolation" disabled>
                                        <option value = '' disabled >Status</option>
                                        <?php 
                                            $statuscheck = mysqli_query($conn, "SELECT StatusID, StatusDescription FROM `statuscontent`");
                                            while($row3 = mysqli_fetch_assoc($statuscheck)){
                                                $statsID = $row3['StatusID']; $statsName = $row3['StatusDescription'];
                                                ?>
                                            <option value = "<?php echo $statsID ?>" <?php if($statsID == $studentViolation ){echo "selected";}else{echo "disabled";} ?>> <?php echo $statsName?>  </option>
                                        <?php }?>
                                    </select>
                                </td>
                                <td class="data">
                                    <select class="input_fieldselect" name="sysMain" id="sysMain" disabled>
                                        <option value = '' disabled >Status</option>
                                        <?php 
                                            $statuscheck = mysqli_query($conn, "SELECT StatusID, StatusDescription FROM `statuscontent`");
                                            while($row3 = mysqli_fetch_assoc($statuscheck)){
                                                $statsID = $row3['StatusID']; $statsName = $row3['StatusDescription'];
                                                ?>
                                            <option value = "<?php echo $statsID ?>" <?php if($statsID == $sysMain ){echo "selected";}else{echo "disabled";} ?>> <?php echo $statsName?>  </option>
                                        <?php }?>
                                    </select>
                                </td>
                                <td class="data">
                                    <select class="input_fieldselect" name="status" id="status" disabled>
                                        <option value = ''disabled  >Status</option>
                                        <?php 
                                            $statuscheck = mysqli_query($conn, "SELECT StatusID, StatusDescription FROM `statuscontent`");
                                            while($row3 = mysqli_fetch_assoc($statuscheck)){
                                                $statsID = $row3['StatusID']; $statsName = $row3['StatusDescription'];
                                                ?>
                                            <option value = "<?php echo $statsID ?>" <?php if($statsID == $status ){echo "selected";}else{echo "disabled";} ?>> <?php echo $statsName?>  </option>
                                        <?php }?>
                                    </select>
                                </td>
                                <td class="data"><a href="../System Edit User Role Maintenance/?role_id=<?php echo $id ?>" class="bttn_table">
                                    <i class="fa-solid fa-user-pen"></i> Edit</a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </table>
                </div>
                
                
            </div>

        </div>
    </div>

    <script src="assets/js/main.js"></script>

</body>
</html>