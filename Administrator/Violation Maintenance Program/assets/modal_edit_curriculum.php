    <!---Modal/ Pop up-->
    <div class="modal_bg curri" id="modal_curri_edit">
        <div class="modal">
            <div class="title_bar">
                <p>Edit Program</p>
                <a class="modal_title_bttn" id="close_modal4" ><i class="fas fa-times-circle"></i></a>
            </div>
            <!-- INPUTING THE DATA AND CALLING THE INSERT FUNCTION FROM ANOTHER PHP FILE -->
            <form id="editSave" method="POST" action="update.php">
             <!--<form>-->
                <div class="modal_content">
                    <div class="modal_curri_input_container">
                        <div class="modal_curri_input">
                            <p class="label">PCODE: </p>
                            <input type="hidden" class="input_field" name="pCode" id="pCode">
                            <input type="text"  class="input_field" name="pc" id="pc" >
                            <i class="fa-solid fa-asterisk"></i>
                            <i id="i_pc" class="fa-solid "></i>
                        </div>
                        <div class="modal_curri_input">
                            <p class="label">Description: </p>
                            <input type="text" class="input_field" name="pd" id="pd" >
                            <i class="fa-solid fa-asterisk"></i>
                            <i id="i_pd" class="fa-solid "></i>
                        </div>
                    </div>
                </div>

                <div class="footer_modal_bttn" >
                    <button class="modal_foot_bttn1" type="submit" id="editsubmit" name="editsubmit"><i class="fas fa-save"></i> Save</button>
                    <a id="close_modal5" class="modal_foot_bttn"><i class="fas fa-sign-out-alt"></i> Exit</a>
                </div>
            <!--</form>-->
            </form>
           
            </div>
    </div>

    

                        