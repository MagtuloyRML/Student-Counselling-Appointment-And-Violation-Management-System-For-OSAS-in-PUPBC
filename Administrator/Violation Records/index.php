<?php
    $title = 'Violation Records';
    $page = 'v_rec';
    include_once('../includes/header.php');
?>
    <div class="body_container">
        <div class="content_rec">
            <div class="title">
                <h1>Violation Records</h1>
                <hr>
            </div>
            <div class="violation_records_content">
                <!--<form action="">-->
                    <div class="records_action_prop">
                        <div class="records_filter">
                            <label for="">Filter A.Y Record: </label>
                                <select name="ay_filter" id="ay_filter">
                                    <option value=""></option>
                                </select>
                        </div>
                        <div class="records_print_bttn">
                            <a href="#" class="bttn" id="print_record_btn">
                                <i class="fas fa-print"></i>
                                Print Record
                            </a>
                        </div>
                    </div>

                    <!-- TABLE # 1 -->
                    <div class="list_student_violation">
                        <!--<h3 class="list_title">List</h3>-->
                        <table class="display_violation_record">
                            <tr> 
                                <th class="violation_title">Table NUM 1</th>
                                <th class="violation_title">Table NUM 1</th>
                                <th class="violation_title">Table NUM 1</th>
                                <th class="violation_title">Table NUM 1</th>
                                <th class="violation_title">Table NUM 1</th>
                            </tr>
                            <tr>
                                <td class="violation_data">NO DATA AVAILABLE</td>
                                <td class="violation_data">NO DATA AVAILABLE</td>
                                <td class="violation_data">NO DATA AVAILABLE</td>
                                <td class="violation_data">NO DATA AVAILABLE</td>
                                <td class="violation_data">NO DATA AVAILABLE</td>
                            </tr>
                        </table>
                    </div>
    
                        

                    <!-- TABLE # 2 -->
                    <div class="list_student_violation">
                        <!--<h3 class="list_title">List</h3>-->
                        <table class="display_violation_record">
                            <tr> 
                                <th class="violation_title">Table NUM 2</th>
                                <th class="violation_title">Table NUM 2</th>
                                <th class="violation_title">Table NUM 2</th>
                                <th class="violation_title">Table NUM 2</th>
                                <th class="violation_title">Table NUM 2</th>
                            </tr>
                            <tr>
                                <td class="violation_data">NO DATA AVAILABLE</td>
                                <td class="violation_data">NO DATA AVAILABLE</td>
                                <td class="violation_data">NO DATA AVAILABLE</td>
                                <td class="violation_data">NO DATA AVAILABLE</td>
                                <td class="violation_data">NO DATA AVAILABLE</td>
                            </tr>
                        </table>
                    </div>
                    
                <!--</form>-->
            </div>

        </div>
    </div>
    <?php
        
        include_once('assets/modal_print_records.php');
    ?>
    
</body>
</html>