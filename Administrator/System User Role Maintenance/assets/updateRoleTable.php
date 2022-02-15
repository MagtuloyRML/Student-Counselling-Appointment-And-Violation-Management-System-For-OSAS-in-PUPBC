                    <form method ="POST" id="updateRoles">
                        <h3 class="list_title">Role List</h3>
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
                                include_once '../../../assets/connection/DBconnection.php';
                                $userRole = $conn->query("SELECT * FROM adminuserrole");
                                while($row = $userRole->fetch_assoc()){
                                    $id = $row['AdminUserRoleID']; $roleName = $row['AdminUserRole']; $studentCounc = $row['AdminPageStudentCounceling']; $studentViolation = $row['AdminPageViolation'];
                                    $sysMain = $row['AdminMaintenance']; $status = $row['StatusID'];
                            ?>
                            <tr>
                                <td class="data"><?php echo $id?></td>
                                <td class="data"><?php echo $roleName ?></td>
                                <td class="data">
                                    <select class="input_fieldselect" name="studentCounc" id="studentCounc">
                                        <option value = '' disabled >Status</option>
                                        <?php 
                                            $statuscheck = mysqli_query($conn, "SELECT StatusID, StatusDescription FROM `statuscontent`");
                                            while($row3 = mysqli_fetch_assoc($statuscheck)){
                                                $statsID = $row3['StatusID']; $statsName = $row3['StatusDescription'];
                                                ?>
                                            <option value = "<?php echo $statsID ?>" <?php if($statsID == $studentCounc )echo "selected" ?>> <?php echo $statsName?>  </option>
                                        <?php }?>
                                    </select>
                                </td>
                                <td class="data">
                                    <select class="input_fieldselect" name="studentViolation" id="studentViolation">
                                        <option value = '' disabled >Status</option>
                                        <?php 
                                            $statuscheck = mysqli_query($conn, "SELECT StatusID, StatusDescription FROM `statuscontent`");
                                            while($row3 = mysqli_fetch_assoc($statuscheck)){
                                                $statsID = $row3['StatusID']; $statsName = $row3['StatusDescription'];
                                                ?>
                                            <option value = "<?php echo $statsID ?>" <?php if($statsID == $studentViolation )echo "selected" ?>> <?php echo $statsName?>  </option>
                                        <?php }?>
                                    </select>
                                </td>
                                <td class="data">
                                    <select class="input_fieldselect" name="sysMain" id="sysMain">
                                        <option value = '' disabled >Status</option>
                                        <?php 
                                            $statuscheck = mysqli_query($conn, "SELECT StatusID, StatusDescription FROM `statuscontent`");
                                            while($row3 = mysqli_fetch_assoc($statuscheck)){
                                                $statsID = $row3['StatusID']; $statsName = $row3['StatusDescription'];
                                                ?>
                                            <option value = "<?php echo $statsID ?>" <?php if($statsID == $sysMain )echo "selected" ?>> <?php echo $statsName?>  </option>
                                        <?php }?>
                                    </select>
                                </td>
                                <td class="data">
                                    <select class="input_fieldselect" name="status" id="status">
                                        <option value = ''disabled  >Status</option>
                                        <?php 
                                            $statuscheck = mysqli_query($conn, "SELECT StatusID, StatusDescription FROM `statuscontent`");
                                            while($row3 = mysqli_fetch_assoc($statuscheck)){
                                                $statsID = $row3['StatusID']; $statsName = $row3['StatusDescription'];
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

                        <div class="table_content">
                            <button class= "bttn" type="submit" name="submit" id="submit">
                            <i class="fa-solid fa-floppy-disk"></i> Save Status</button>
                        </div>
                    </form>