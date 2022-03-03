    <!---Modal/ Pop up-->
    <div class="modal_bg violation" id="modal_add_viola_input">
        <div class="modal">
            <div class="title_bar">
                <P>Creating Violation</P>
                <a class="modal_title_bttn" id="close_modal"><i class="fas fa-times-circle"></i></a>
            </div>
            <form id="saveViolation" action="assets/save_violation.php" method="POST">
            <!--<form>-->
                <!-- INPUTING THE DATA FROM WEB PAGE & CALLING THE INSERT FUNCTION FROM ANOTHER PHP FILE -->
                <div class="modal_content">
                    <div class="modal_add_violation">
                        <label for="#">Violation:</label>
                        <input type="text" class="input_field" id="violations" name="violations" >
                        <i class="fa-solid fa-asterisk"></i>
                        <i id="i_Violations" class="fa-solid "></i>
                    </div>
                </div>

                <div class="footer_modal_bttn">
                    <button class="modal_foot_bttn1" type="submit" id="violationSubmit" name="violationSubmit"><i class="fas fa-save"></i> Save</button>
                    <a id="close_modal2" class="modal_foot_bttn"><i class="fas fa-sign-out-alt"></i> Exit</a>
                </div>

            <!--</form>-->
            </form>
        </div>
    </div>

    <!---Modal/ Pop up-->
    <div class="modal_bg sanction" id="modal_add_sanc_input">
        <div class="modal">
            <div class="title_bar">
                <P>Creating Violation</P>
                <a class="modal_title_bttn" id="close_modal1"><i class="fas fa-times-circle"></i></a>
            </div>
            <form id="saveSanction" action="assets/save_sanction.php" method="POST">
                <div class="modal_content">
                    <div class="modal_add_sanction">
                        <div class="sanction_input">
                            <label for="#">Sanction:</label>
                            <input type="text" class="input_field" id="sanctions" name="sanctions" >
                            <i class="fa-solid fa-asterisk"></i>
                            <i id="i_sanctions" class="fa-solid "></i>
                        </div>
                    </div>
                </div>

                <div class="footer_modal_bttn">
                    <button class="modal_foot_bttn1" type="submit" id="sanctionSubmit" name="sanctionSubmit" ><i class="fa-solid fa-floppy-disk"></i> Save</button>
                    <a id="close_modal3" class="modal_foot_bttn"><i class="fas fa-sign-out-alt"></i> Exit</a>
                </div>

            </form>
            
        </div>
    </div>

    <script src="assets/js/modal_violation_add_vio.js"></script>