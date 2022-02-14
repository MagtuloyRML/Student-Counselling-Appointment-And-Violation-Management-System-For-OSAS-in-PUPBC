<?php
    include_once 'assets/dbconnection.php';
    if (isset($_GET['edit'])) {
        $pID = $_GET['edit'];

        $rec = mysqli_query($conn, "SELECT * FROM forprogram WHERE pCode = '$progCode'");
        $record = mysqli_fetch_array($rec);
        
        $progCode = $record['progCode'];
        $progDescription = $record['progDescription'];

?>
    <!---Modal/ Pop up-->
    <div class="modal_bg curri" id="modal_curri_edit">
        <div class="modal">
            <div class="title_bar">
                <p>Edit Program</p>
                <a href="#" class="modal_title_bttn" id="close_modal4" ><i class="fas fa-times-circle"></i></a>
            </div>
            <!-- INPUTING THE DATA AND CALLING THE INSERT FUNCTION FROM ANOTHER PHP FILE -->
            <form id="editSave" method="POST" action="assets/update.php">
             <!--<form>-->
                <div class="modal_content">
                    <div class="modal_curri_input_container">
                            <div class="modal_curri_input">
                                <p class="label">PCODE: </p>
                                <input type="text" class="input_field" name="pc" id="pc" value="<?php echo $progCode; ?>">
                            </div>
                            <div class="modal_curri_input">
                                <p class="label">Description: </p>
                                <input type="text" class="input_field" name="pd" id="pd" value="<?php echo $progDescription; ?>">
                                
                            </div>
                    </div>
                </div>

                <div class="footer_modal_bttn" >
                    <button class="modal_foot_bttn" type="submit" onclick="document.getElementById('ccode').submit()" ><i class="fas fa-save"></i> Save</button>
                    <a id="close_modal5" class="modal_foot_bttn"><i class="fas fa-sign-out-alt"></i> Exit</a>
                </div>
            <!--</form>-->
            </form>
            <?php
    }
    ?>
            </div>
    </div>

    <script src="assets/js/modal_edit_curriculum.js"></script>

                        