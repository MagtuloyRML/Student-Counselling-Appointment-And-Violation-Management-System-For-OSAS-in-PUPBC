<?php
    $title = 'Maintenance';
    $page = 'v_maintenance';
    include_once('../includes/header.php');
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

                <div class="v_bttn_group">
                    <a href="#" class="v_bttn" id="upload_violation_bttn">
                        <i class="fas fa-upload"></i>
                        Upload
                    </a>
                </div>

                <div class="violation_content_tables">
                    
                    <div class="v_table_content">
                        <div class="title">
                            <h1>Violation</h1>
                            <hr>
                        </div>
                        <table class="v_table">
                            <tr> 
                                <th class="violation_title">Violation</th>
                                <th class="violation_title"> </th>
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
                                    <a href="assets/delete.php?Violations=<?php echo $row['Violations']; ?>" class="v_data_bttn"><i class="fas fa-trash-alt"></i></a>
                                </td>
                                <td class="violation_data">

                                </td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </table>

                        <div class="v_action_bttn_grp">
                            <a href="#" class="v_action_bttn" id="openModal_addviolation">
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

                        <table class="s_table">
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
                                    <a href="assets/delete_sanc.php?Sanctions=<?php echo $row['Sanctions']; ?>" class="s_data_bttn"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php
                                }
                            }
                            ?>
                        </table>

                        <div class="s_action_bttn_grp">
                            <a href="#" class="s_action_bttn" id="openModal_addsanction">
                                <i class="fas fa-plus-square"></i>
                                Add Sanction
                            </a>
                        </div>
                    </div>
                </div>
                

            </div>
    </div>

    <?php
        include_once('assets/modal_violation_add_vio_sanc.php');
    ?>
    <?php
        include_once('assets/modal_upload_violation.php');
    ?>

</body>

</html>