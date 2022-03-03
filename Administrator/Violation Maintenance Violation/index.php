<?php
    $title = 'Maintenance';
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
    if ($studViol != '1'){
        echo "<script> window.location.href = '../Page 404/';</script>";
    }
?>

<?php
    $sub_page = 'vmain_violation';
    include('../includes/sub_nav.php');
?>

            <div class="subcontent">
                <div class="title">
                    <h1>Violation</h1>
                    <hr>
                </div>

                <?php if (isset($_GET['msg'])) { ?>
                    <input class="input" type="hidden" id="msg" name="msg" value="<?php echo $_GET['msg']; ?>">
                <?php } ?>

                <div class="violation_content_tables">
                    
                    <div class="v_table_content">
                        <div class="title">
                            <h1>Violation</h1>
                            <hr>
                        </div>
                        <table class="v_table" id="v_table">
                            <tr> 
                                <th class="violation_title">Violation</th>
                                <th class="violation_title"> </th>
                            </tr>
                            
                                <!-- DISPLAYING THE VIOLATION INSERTED FROM DATABASE -->
                            <?php
                                include_once 'assets/dbconnection.php';
                                $SQL = "SELECT * FROM fortheviolations;";
                                $RESULT = mysqli_query($conn, $SQL);
                                $resultchecker = mysqli_num_rows($RESULT);

                                if ($resultchecker > 0) {

                                    while ($row = mysqli_fetch_assoc($RESULT)) {

                            ?>
                            <tr>
                                <td class="violation_data" id="Violations" name="Violations"><?php echo $row['Violations'] . "<br>"; ?> </td>

                                <td class="violation_data">
                                    <!--<a href="assets/delete.php?Violations=<"?php echo $row['Violations']; ?>" class="v_data_bttn"><i class="fas fa-trash-alt"></i></a>-->
                                    <a id="<?php echo $row['v_code']; ?>" class="v_data_bttn"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </table>

                        <div class="v_action_bttn_grp">
                            <a class="v_action_bttn" id="openModal_addviolation">
                                <i class="fas fa-plus-square"></i>
                                Add Violation
                            </a>
                        </div>
                    </div>

                    <div class="s_table_content">
                        <div class="title">
                            <h1>Sanction</h1>
                            <hr>
                        </div>

                        <table class="s_table" id="s_table">
                            <tr>
                                <th class="sanction_title">Sanction</th>
                                <th class="sanction_title"> </th>
                            </tr>

                            <?php
                            include_once 'assets/dbconnection.php';
                            $SQL = "SELECT * FROM forthesanctions;";
                            $RESULT = mysqli_query($conn, $SQL);
                            $resultchecker = mysqli_num_rows($RESULT);

                            if ($resultchecker > 0) {

                                while ($row = mysqli_fetch_assoc($RESULT)) {

                            ?>
                                <tr>
                                    <td class="sanction_data"><?php echo $row['Sanctions'] . "<br>"; ?></td>
                                    <td class="sanction_data">
                                    <!--<a href="assets/delete_sanc.php?Sanctions=<;?php echo $row['Sanctions']; ?>" class="s_data_bttn"><i class="fas fa-trash-alt"></i></a>-->
                                    <a id="<?php echo $row['s_id']; ?>" class="s_data_bttn"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php
                                }
                            }
                            ?>
                        </table>

                        <div class="s_action_bttn_grp">
                            <a class="s_action_bttn" id="openModal_addsanction">
                                <i class="fas fa-plus-square"></i>
                                Add Sanction
                            </a>
                        </div>
                    </div>
                </div>
                

            </div>
    </div>

    <div class="alert " id="alert_bottomappointment">
        <div class="alert_content">
            <div class="alert_content_text" id="alert_contentappointment">
                
            </div>
            <button class="alert_close" id="alert_Close_bottappointment"><i class="fa-solid fa-xmark"></i></button>
        </div>
    </div>

    <?php
        include_once('assets/modal_violation_add_vio_sanc.php');
    ?>

</body>

</html>