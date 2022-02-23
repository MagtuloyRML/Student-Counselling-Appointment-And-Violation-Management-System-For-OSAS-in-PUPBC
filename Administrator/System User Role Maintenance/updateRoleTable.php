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