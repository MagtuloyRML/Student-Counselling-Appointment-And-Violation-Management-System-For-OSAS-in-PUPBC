<?php
    include_once 'dbconnection.php';

    $SQL = ("SELECT studNum, lastName, firstName, middleName, Section, Address, Gender , progCode, ayCode FROM forstudents");
    $RESULT = mysqli_query($conn, $SQL);
    $resultchecker = mysqli_num_rows($RESULT);

    if ($resultchecker > 0) {
        ?>
        <tr>
            <th class="stud_details_title">No.</th>
            <th class="stud_details_title">Student Num</th>
            <th class="stud_details_title">Last Name</th>
            <th class="stud_details_title">First Name</th>
            <th class="stud_details_title">Middle Name</th>
            <th class="stud_details_title">Section</th>
            <th class="stud_details_title">Address</th>
            <th class="stud_details_title">Gender</th>
            <th class="stud_details_title">Program</th>
            <th class="stud_details_title">Academic Year Code</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($RESULT)) {
            ?>
            <tr>
                <td class="stud_details_data"></td>
                <td class="stud_details_data"><?php echo $row['studNum']; ?> </td>
                <td class="stud_details_data"><?php echo $row['lastName']; ?> </td>
                <td class="stud_details_data"><?php echo $row['firstName']; ?> </td>
                <td class="stud_details_data"><?php echo $row['middleName']; ?> </td>
                <td class="stud_details_data"><?php echo $row['Section']; ?> </td>
                <td class="stud_details_data"><?php echo $row['Address']; ?> </td>
                <td class="stud_details_data"><?php echo $row['Gender']; ?> </td>
                <td class="stud_details_data"><?php echo $row['progCode']; ?> </td>
                <td class="stud_details_data"><?php echo $row['ayCode']; ?> </td>
            </tr>        
            <?php
        }
            
    }
?>