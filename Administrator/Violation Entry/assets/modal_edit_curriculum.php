<?php
    include 'dbconnection.php';
    if (isset($_GET['edit'])) {
        $pID = $_GET['edit'];

        $rec = mysqli_query($conn, "SELECT 
        `entry_id`,
        t1.studNum,
        `Date`,
        t5.fullName as fullName,
        t5.Section as Section,
        t4.v_code as v_code,
        t4.Violations as Violations,
        t6.Sanctions as Sanctions,
        t2.pDescription AS p_description,
        t3.code AS a_code,
        status FROM forviolationentries t1
        INNER JOIN forprogram t2 ON t1.pCode = t2.pID
        INNER JOIN foracademicyear t3 ON t1.code = t3.code
        INNER JOIN fortheviolations t4 ON t1.Violations = t4.v_code
        INNER JOIN forstudents t5 ON t1.studNum = t5.studNum
        INNER JOIN forthesanctions t6 ON t1.Sanctions = t6.s_id
        WHERE
        entry_id = '$pID'");
        $record = mysqli_fetch_array($rec);

        $id = $record['entry_id'];
        $studNum = $record['studNum'];
        $section = $record['Section'];
        $v_code = $record['v_code'];
        $violation = $record['Violations'];
        $s_id = $record['s_id'];
        $sanction = $record['Sanctions'];
        $progCode = $record['p_description'];
        $ayCode = $record['a_code'];
        $date= $record['Date'];
?>
    <!---Modal/ Pop up-->
    <div class="modal_bg curri" id="modal_curri_edit">
        <div class="modal">
            <div class="title_bar">
                <p>Edit Program</p>
                <a href="#" class="modal_title_bttn" id="close_modal4" ><i class="fas fa-times-circle"></i></a>
            </div>
            <!-- INPUTING THE DATA AND CALLING THE INSERT FUNCTION FROM ANOTHER PHP FILE -->
            <form id="editSave" method="POST" action="update.php">
             <!--<form>-->
                <div class="modal_content">
                    <div class="modal_curri_input_container">
                            <div class="modal_curri_input">
                                <p class="label">Student Number: </p>
                                <input type="hidden" class="input_field" name="id" id="id" value="<?php echo $id; ?>">
                                <label><?php echo $studNum; ?></label>
                            </div>
                            <div class="modal_curri_input">
                                <p class="label">Section: </p>
                                <label><?php echo $section; ?></label>
                            <div class="modal_curri_input">
                                <p class="label">Course: </p>
                                <label><?php echo $progCode; ?></label>
                            </div>
                            <div class="modal_curri_input">
                                <p class="label">Academic Year: </p>
                                <label><?php echo $ayCode; ?></label>
                            </div>
                            <div class="modal_curri_input">
                                <p class="label">Violation</p>
                                <input type="hidden" class="input_field" name="old_vio" id="old_vio" value="<?php echo $v_code; ?>">
                                <select class="curri_selection" name = "new_vio" id = "new_vio">
                            
                                <option disabled value="<?= $v_code ?>" selected ="selected"><?php echo $violation?></option>
                                    <?php 
                                    
                                    $query = "SELECT * from fortheviolations";
                                    $result1 = mysqli_query($conn, $query);
                                    while($row2 = mysqli_fetch_assoc($result1))
                                    {?>
                                    <option value="<?php echo $row2["v_code"];?>"
                                    ><?php echo $row2['Violations']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="modal_curri_input">
                                <p class="label">Sanction</p>
                                <input type="hidden" class="input_field" name="old_sanction" id="old_sanction" value="<?php echo $s_id; ?>">
                                <select class="curri_selection" name = "new_sanction" id = "new_sanction">
                            
                                <option disabled value="<?= $s_id ?>" selected ="selected"><?php echo $sanction?></option>
                                    <?php 
                                    
                                    $query = "SELECT * from forthesanctions";
                                    $result1 = mysqli_query($conn, $query);
                                    while($row2 = mysqli_fetch_assoc($result1))
                                    {?>
                                    <option value="<?php echo $row2["s_id"];?>"
                                    ><?php echo $row2['Sanctions']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="modal_curri_input">
                                <p class="label">Date Committed: </p>
                                <input type="date" class="input_field" name="date" id="date" value="<?php echo $date; ?>">
                            </div>
                    </div>
                </div>

                <div class="footer_modal_bttn" >
                    <button class="modal_foot_bttn" type="submit" id="submit" name="submit"><i class="fas fa-save"></i> Save</button>
                    <a href="../index.php"id="close_modal5" class="modal_foot_bttn"><i class="fas fa-sign-out-alt"></i> Exit</a>
                </div>
            <!--</form>-->
            </form>
            <?php
    }
    ?>
            </div>
    </div>

    <script src="js/modal_edit_curriculum.js"></script>

                        