<?php
    include 'dbconnection.php';
    
    $sql = $conn->query("SELECT 
    forviolationentries.entry_id,
    forviolationentries.studNum as studnum,
    forviolationentries.Date,
    forstudents.fullName as fullName,
    forstudents.Section as Section,
    fortheviolations.Violations as Violations,
    forthesanctions.Sanctions as Sanctions,
    forprogram.pDescription AS p_description,
    foracademicyear.code AS a_code FROM forviolationentries
    INNER JOIN forprogram  ON forviolationentries.pCode = forprogram.pID
    INNER JOIN foracademicyear  ON forviolationentries.code = foracademicyear.code
    INNER JOIN fortheviolations ON forviolationentries.Violations = fortheviolations.v_code
    INNER JOIN forstudents  ON forviolationentries.studNum = forstudents.studNum
    INNER JOIN forthesanctions ON forviolationentries.Sanctions = forthesanctions.s_id
    WHERE  forviolationentries.date >= '2020-01-01' ORDER BY forviolationentries.date DESC");
    
    ?>
    <!---Modal/ Pop up-->
    <div class="modal_bg curri" id="modal_print_records">
        <div class="modal">
            <div class="title_bar">
                <p>Print Records</p>
                <a href="" class="modal_title_bttn" id="close_modal"><i class="fas fa-times-circle"></i></a>
            </div>
            
                <div class="modal_content print-container">

                <div class="list_records_print">
                   
                    <form id="printRec">
                        <table class="display_records_print">
                            <tr>
                                <th class="violation_title">Student Number</th>
                                <th class="violation_title">Name</th>
                                <th class="violation_title">Program</th>
                                <th class="violation_title" style="width: 8%;">Section</th>
                                <th class="violation_title">Violations</th>
                                <th class="violation_title">Sanctions</th>
                                <th class="violation_title">A.Y. Code</th>
                                <th class="violation_title">Date</th>

                            </tr>
                            <tbody>
                            <?php
                            
                            
                            while ($row = mysqli_fetch_array($sql)) {
                                $studNum = $row['studnum'];
                                $fullName =  $row['fullName'];
                                $pCode = $row['p_description'];
                                $Section = $row['Section'];
                                $Violations = $row['Violations'];
                                $Sanctions = $row['Sanctions'];
                                $code = $row['a_code'];
                                $Date = $row['Date'];

                        ?>
                                <tr>
                            <td class="violation_data"><?= $studNum ?> </td>
                            <td class="violation_data"><?= $fullName ?> </td>
                            <td class="violation_data"><?= $pCode ?> </td>
                            <td class="violation_data"><?= $Section ?> </td>
                            <td class="violation_data"><?= $Violations ?> </td>
                            <td class="violation_data"><?= $Sanctions ?> </td>
                            <td class="violation_data"><?= $code ?> </td>
                            <td class="violation_data"><?php
                                                        $date =  date("d/m/Y", strtotime($row['Date']));
                                                        echo $date; ?>
                            </td>
                                </tr>
                                <?php
                                }
                    ?>
                            </tbody>
                        </table>

                </div>
            </div>

            <div class="footer_modal_bttn">
                <a href="#" class="modal_foot_bttn" onclick="document.getElementById('printRec');window.print();">
                    <i class="fas fa-print"></i> Print</a>
                <a href="" id="close_modal2" class="modal_foot_bttn"><i class="fas fa-sign-out-alt"></i> Exit</a>
            </div>
            <!--</form>-->
            </form>
        </div>

    </div>
   
    <script src="assets/js/modal_print_records.js"></script>
    