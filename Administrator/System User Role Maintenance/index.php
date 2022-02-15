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
                    $sub_page = 'role_admin';
                    include '../includes/main_sub_nav.php';

                ?>
                <h3 class="subtitle">User's Role</h3>

                <form id="addUser"  method = "POST">
                    <div class="input_group">
                        <div class="input_container">
                            <label for="#" class="label">Role Name: </label>
                            <div class="input " id="input_roleName">
                                <input class="input-field" type="text" placeholder="Insert Role Name" name="roleName" id="roleName">
                                <i id="i_roleName" ></i>
                            </div>
                        </div>
                        <div class="input_container">
                            <label for="studCounce" class="labelcheck">Student Counceling </label>
                            <div class="input " id="input_roleName">
                                <input class="input-fieldcheck" type="checkbox" placeholder="Insert Role Name" name="studCounce" id="studCounce">
                                <i id="i_roleName" ></i>
                            </div>
                        </div>
                        <div class="input_container">
                            <label for="studViolation" class="labelcheck">Student Violation </label>
                            <div class="input " id="input_roleName">
                                <input class="input-fieldcheck" type="checkbox" placeholder="Insert Role Name" name="studViolation" id="studViolation">
                                <i id="i_roleName" ></i>
                            </div>
                        </div>
                        <div class="input_container">
                            <label for="sysMain" class="labelcheck">System Maintenance </label>
                            <div class="input " id="input_roleName">
                                <input class="input-fieldcheck" type="checkbox" placeholder="Insert Role Name" name="sysMain" id="sysMain">
                                <i id="i_roleName" ></i>
                            </div>
                        </div>
                        
                    </div> 
                    <div class="action_content">
                        <button class= "bttn" type="submit" name="submit" id="submit">
                        <i class="fa-solid fa-book-user"></i> Add Role</button>
                    </div>
                </form>

                <div class="list">
                    <form method ="POST">
                    <h3 class="list_title">List</h3>
                        <table class="display">
                            <tr> 
                                <th class="table_title" style="width: 50px;">ID</th>
                                <th class="table_title" >Role Name</th>
                                <th class="table_title" style="width: 15%;">Student Counceling</th>
                                <th class="table_title" style="width: 15%;">Student Violation</th>
                                <th class="table_title" style="width: 15%;">System Maintenance</th>
                                <th class="table_title" style="width: 15%;">Status</th>
                            </tr>
                            <?php
                                
                                $userRole = $conn->query("SELECT * FROM adminuserrole");
                                while($row = $userRole->fetch_assoc()){
                                    $id = $row['AdminUserRoleID']; $roleName = $row['AdminUserRole']; $studentCounc = $row['AdminPageStudentCounceling']; $studentViolation = $row['AdminPageViolation'];
                                    $sysMain = $row['AdminMaintenance']; $status = $row['StatusID'];
                                
                            ?>
                            <tr>
                                <td class="data"><?php echo $id?></td>
                                <td class="data"><?php echo $roleName ?></td>
                                <td class="data"><input class="input-fieldcheck" type="checkbox" placeholder="Insert Role Name" name="studCounce" id="studCounce" value= 1 
                                    <?php if($studentCounc > 0 )echo "checked" ?>></td>
                                <td class="data"><input class="input-fieldcheck" type="checkbox" placeholder="Insert Role Name" name="studCounce" id="studCounce" value= 1 
                                    <?php if($studentViolation > 0 )echo "checked" ?>></td>
                                <td class="data"><input class="input-fieldcheck" type="checkbox" placeholder="Insert Role Name" name="studCounce" id="studCounce" value= 1 
                                    <?php if($sysMain > 0 )echo "checked" ?>></td>
                                <td class="data">
                                    <select class="input_fieldselect" name="gender" id="gender">
                                        <option value = '' >Status</option>
                                        <?php 
                                            $statuscheck = mysqli_query($conn, "SELECT AccountStatusID, StatusDescription FROM `accountstatus`");
                                            while($row3 = mysqli_fetch_assoc($statuscheck)){
                                                $statsID = $row3['AccountStatusID']; $statsName = $row3['StatusDescription'];
                                                ?>
                                            <option value = "<?php echo $statsID ?>" <?php if($statsID == $status )echo "selected" ?>> <?php echo $statsName?>  </option>
                                        <?php }?>
                                    </select>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                            
                        </table>
                    </form>
                </div>
                
                
            </div>

        </div>
    </div>

    <script src="assets/js/main.js"></script>

</body>
</html>