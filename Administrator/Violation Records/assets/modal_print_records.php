    <!---Modal/ Pop up-->
    <div class="modal_bg curri" id="modal_print_records">
        <div class="modal">
            <div class="title_bar">
                <p>Print Records</p>
                <a href="#" class="modal_title_bttn" id="close_modal" ><i class="fas fa-times-circle"></i></a>
            </div>
            <!--<form>-->
                <div class="modal_content print-container">

                    <div class="list_records_print">
                        <div class="records_print_prop">
                            <div class="records_months_filter">
                                <label for="#">Month: </label>
                                <input type="date" id="#" name="#">
                            </div>

                            <div class="records_print_filter">
                                <label for="">Filter A.Y Record: </label>
                                    <select name="ay_filter" id="ay_filter">
                                        <option value=""></option>
                                    </select>
                            </div>
                            
                        </div>
                        
                        <table class="display_records_print">
                            <tr> 
                                <th class="records_title"> </th>
                                <th class="records_title">Student Num</th>
                                <th class="records_title">Name</th>
                                <th class="records_title">Curriculum</th>
                                <th class="records_title">Section</th>
                                <th class="records_title">Violation</th>
                                <th class="records_title">Sanction</th>
                            </tr>
                            <tr>
                                <td class="records_data"> </td>
                                <td class="records_data"> </td>
                                <td class="records_data"> </td>
                                <td class="records_data"> </td>
                                <td class="records_data"> </td>
                                <td class="records_data"> </td>
                                <td class="records_data"> </td>
                            </tr>
                        </table>
                    </div>
                    
                    
                </div>

                <div class="footer_modal_bttn">
                    <a href="#" class="modal_foot_bttn" onclick="this.style.display='none';document.body.offsetHeight;window.print();this.style.display='inline';">
                    <i class="fas fa-print"></i> Print</a>
                    <a href="#" id="close_modal2" class="modal_foot_bttn"><i class="fas fa-sign-out-alt"></i> Exit</a>
                </div>
            <!--</form>-->
            
            </div>
    </div>

    <script src="assets/js/modal_print_records.js"></script>