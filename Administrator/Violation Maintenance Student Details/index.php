<?php
    $title = 'Maintenance';
    $page = 'maintenance';
    include_once('../includes/header.php');
?>

<?php
    $sub_page = 'vmain_stud_details';
    include('../includes/sub_nav.php');
?>

            <div class="subcontent">
                <div class="title">
                    <h1>Student Details</h1>
                    <hr>
                </div>

                <div class="sd_bttn_group">
                    <a href="#" class="sd_bttn" id="upload_student_bttn">
                        <i class="fas fa-upload"></i>
                        Upload
                    </a>
                    <a href="#" class="sd_bttn" id="openModal_add_student">
                        <i class="fas fa-plus-square" ></i>
                        Create
                    </a>
                </div>

                <div class="sd_table_content">
                    <table class="sd_table" id="table">
                        <tr> 
                            
                            <th class="stud_details_title">Student Num</th>
                            <th class="stud_details_title">Last Name</th>
                            <th class="stud_details_title">First Name</th>
                            <th class="stud_details_title">Middle Name</th>
                            <th class="stud_details_title">Section</th>
                            <th class="stud_details_title" style="width: 33%;">Address</th>
                            <th class="stud_details_title">Gender</th>
                            <th class="stud_details_title">Program</th>
                            <th class="stud_details_title">Batch / Year</th>

                            
                        </tr>
                        <?php
                        include_once 'assets/dbconnection.php';
                        $enrolled = 'Enrolled';
                        $disabled = 'Disabled';
                        $SQL = $conn->query("SELECT 
                        `id`,
                        `studNum`,
                        `lastName`,
                        `firstName`,
                        `middleName`,
                        `Section`,
                        `Address`,
                        `Gender`,
                        t2.pCode AS p_description,
                        t3.code AS a_code,
                        status FROM forstudents t1
                        INNER JOIN forprogram t2 ON t1.progCode = t2.pCode
                        INNER JOIN foracademicyear t3 ON t1.ayCode = t3.code WHERE `status` = '$enrolled' OR `status` = '$disabled'");

                        if ($SQL->num_rows > 0) {
                            while ($row = $SQL->fetch_assoc()) {
                        ?>
                        <tr>
                            <td class="stud_details_data"><?php echo $row['studNum']; ?> </td>
                            <td class="stud_details_data"><?php echo $row['lastName']; ?> </td>
                            <td class="stud_details_data"><?php echo $row['firstName']; ?> </td>
                            <td class="stud_details_data"><?php echo $row['middleName']; ?> </td>
                            <td class="stud_details_data"><?php echo $row['Section']; ?> </td>
                            <td class="stud_details_data"><?php echo $row['Address']; ?> </td>
                            <td class="stud_details_data"><?php echo $row['Gender']; ?> </td>
                            <td class="stud_details_data"><?php echo $row['p_description']; ?> </td>
                            <td class="stud_details_data"><?php echo $row['a_code']; ?> </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>

            </div>
    </div>

    

    <?php
        include_once('assets/modal_add_student.php');
    ?>

    <?php
        include_once('assets/modal_upload_student.php');
    ?>

</body>

</html>