    
    <!---Modal/ Pop up-->
    <div class="modal_bg curri" id="modal_curri_input">
        <div class="modal">
            <div class="title_bar">
                <p>Create New Program</p>
                <a href="#" class="modal_title_bttn" id="close_modal" ><i class="fas fa-times-circle"></i></a>
            </div>
            <!-- INPUTING THE DATA AND CALLING THE INSERT FUNCTION FROM ANOTHER PHP FILE -->
            <form id="pcode" method="POST" action="assets/save_display_curriculum.php" >
                <!--<form>-->
                <div class="modal_content">
                    <div class="modal_curri_input_container">
                        <div class="modal_curri_input">
                            <p class="label">PCODE: </p>
                            <input type="varchar" maxlength="50" class="input_field" name="progCode" id="progCode" placeholder="Please Enter Course Code">
                        </div>
                        <div class="modal_curri_input">
                            <p class="label">Description: </p>
                            <input type="text" class="input_field" name="progDescription" id="progDescription"  placeholder="Please Enter Code Description">
                         </div>
                    </div>
                </div>
                <div class="footer_modal_bttn">
                    <a class="modal_foot_bttn" type="submit" onclick="document.getElementById('pcode').submit()"><i class="fas fa-save"></i> Save</a>
                    <a id="close_modal2" class="modal_foot_bttn"><i class="fas fa-sign-out-alt"></i> Exit</a>
                </div>
            <!--</form>-->
            </form>
            
            </div>
    </div>

    <script src="assets/js/modal_add_curriculum.js"></script>

                        