    <!---Modal/ Pop up-->
    <div class="modal_bg curri" id="modal_curri_input">
        <div class="modal">
            <div class="title_bar">
                <p>Create New Program</p>
                <a href="#" class="modal_title_bttn" id="close_modal" ><i class="fas fa-times-circle"></i></a>
            </div>
            <!-- INPUTING THE DATA AND CALLING THE INSERT FUNCTION FROM ANOTHER PHP FILE -->
            <form id="pcodeInput" method="POST">
                
                <div class="modal_content">
                    <div class="modal_curri_input_container">
                        <div class="modal_curri_input">
                            <p class="label">PCODE: </p>
                            <input type="varchar" maxlength="50" class="input_field" name="progCode" id="progCode" placeholder="Please Enter Course Code">
                            <i class="fa-solid fa-asterisk"></i>
                            <i id="i_pcAdd" class="fa-solid "></i>
                        </div>
                        <div class="modal_curri_input">
                            <p class="label">Description: </p>
                            <input type="text" class="input_field" name="progDescription" id="progDescription"  placeholder="Please Enter Code Description">
                            <i class="fa-solid fa-asterisk"></i>
                            <i id="i_pdAdd" class="fa-solid "></i>
                         </div>
                    </div>
                </div>
                <div class="footer_modal_bttn">
                    <button class="modal_foot_bttn1" type="submit" id="addSubmit" name="addSubmit"><i class="fas fa-save"></i> Save</button>
                    <a id="close_modal2" class="modal_foot_bttn"><i class="fas fa-sign-out-alt"></i> Exit</a>
                </div>
            
            </form>
            
        </div>
    </div>

                        