<?php
    include 'assets/dbconnection.php';
    
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
    WHERE  forviolationentries.date >= '2020-01-01'");

    
?>

<?php
    $title = 'Violation Records';
    $page = 'v_rec';
    include_once('../includes/header.php');

    $connection = new mysqli('localhost', 'root','','test_db');
    if ($connection->connect_error){
        die(
            'Error : ('. $connection->connect_errno.') '.$connection->connect_error
        );
    }

    $idFecth = $_SESSION['AdminID'];
    $sql_fetchid = mysqli_query($connection, 
    "SELECT adminAccount.AdminFirstName, adminAccount.AdminUserRoleID, userRole.AdminPageStudentCounceling, 
    userRole.AdminPageViolation, userRole.AdminMaintenance, userRole.StatusID
    FROM adminaccountinfo AS adminAccount 
    INNER JOIN adminuserrole AS userRole 
    ON adminAccount.AdminUserRoleID = userRole.AdminUserRoleID WHERE adminAccount.AdminAccountID = '$idFecth' ");
    
    while($row = mysqli_fetch_assoc($sql_fetchid))
    {
        $userRoleID = $row['AdminUserRoleID']; 
        $studCounceling = $row['AdminPageStudentCounceling']; $studViol = $row['AdminPageViolation']; 
        $systemMaintenance = $row['AdminMaintenance']; $roleStatus = $row['StatusID']; 
    }
    if ($studViol != '1'){
        header('Location: ../Page 404/');
    }
?>

<div class="body_container">

    <div class="content_rec">
        <div class="title">
            <h1>Violation Records</h1>
            <hr>
        </div>
        <div class="violation_records_content">
            <form method = "POST" action="">

            <div class="records_action_prop">


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
                        <tr>
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
                </tr>
                    </tbody>
                </table>
            </div>
                            </form>



        </div>

    </div>
</div>



<?php

include_once('assets/modal_print_records.php');
?>


</body>

</html>