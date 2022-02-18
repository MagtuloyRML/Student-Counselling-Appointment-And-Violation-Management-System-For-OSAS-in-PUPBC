<!---Modal/ Pop up-->
    <div class="modal_bg studDetails" id="modal_edit_entry">
        <div class="modal" >
        <div class="title_bar">
                <p>Edit Violation Entry</p>
                <button class="modal_title_bttn" id="close_modal3"><i class="fas fa-times-circle"></i></button>
            </div>
            <form id="editDetails" method="POST">
                <div class="modal_content" >
                    <div class="modal_studDetails_input_container">
                        <div class="input_sd">
                            <input type="hidden" name="id" id="id">

                            <div class="modal_studDetails_input">
                                <p class="label">Student Num: </p>
                                <input type="text" class="input_field" id="studNumEdit" name="studNumEdit" >
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_studNumEdit" class="fa-solid "></i>
                            </div>

                            <div class="modal_studDetails_input">
                                <p class="label">Violation: </p>
                                <select class="input_field" name="violationsEdit" id="violationsEdit" >
                                
                                    <option disabled > --Select Violation-- </option>
                                    <?php
                                    include "dbconnection.php";

                                    $sql = mysqli_query($conn, "SELECT * FROM fortheviolations");

                                    while ($row = mysqli_fetch_array($sql)) {
                                        $vID = $row["v_code"]; $vName = $row["Violations"];
                                    ?>
                                        <option value = "<?php echo $vID ?>" > <?php echo $vName?>  </option>
                                    <?php }?>

                                </select>
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_violationsEdit" class="fa-solid "></i>
                            </div>
                            <div class="modal_studDetails_input">
                                <p class="label">Sanction: </p>
                                <select class="input_field" name="sanctionsEdit" id="sanctionsEdit" >
                                
                                    <option disabled > --Select Sanction- </option>
                                    <?php
                                    include "dbconnection.php";

                                    $sql = mysqli_query($conn, "SELECT * FROM forthesanctions ");

                                    while ($row = mysqli_fetch_array($sql)) {
                                        $sID = $row["s_id"]; $sName = $row["Sanctions"];
                                    ?>
                                        <option value = "<?php echo $sID ?>" > <?php echo $sName?>  </option>
                                    <?php }?>

                                </select>
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_sanctionsEdit" class="fa-solid "></i>
                            </div>

                            <div class="modal_studDetails_input">
                                <p class="label">Date committed: </p>
                                <input type="date" class="input_field" id="dateEdit" name="dateEdit">
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_dateEdit" class="fa-solid "></i>
                            </div>
                        </div>
                        
                    </div>
                    <div>
                            
                    </div>
                </div>

                <div class="footer_modal_bttn">
                    <button class="modal_foot_bttn1" type="submit" id="editsubmit" name="submit"><i class="fas fa-save"></i> Save</button>
                    <button id="close_modal4" class="modal_foot_bttn"><i class="fas fa-sign-out-alt"></i> Exit</button>
                </div>
            </form>
            

        </div>
    </div>
    
