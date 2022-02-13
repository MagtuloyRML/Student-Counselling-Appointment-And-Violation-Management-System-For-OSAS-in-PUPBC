<?php 
    

    include('assets/dbconnection.php');

if(isset($_POST['input'])){
    $input = $_POST['input'];
    $sql = "SELECT 
    `entry_id`,
    t1.studNum,
    `Date`,
    t5.fullName as fullName,
    t5.Section as Section,
    t4.Violations as Violations,
    t6.Sanctions as Sanctions,
    t2.pDescription AS p_description,
    t3.code AS a_code,
    status FROM forviolationentries t1
    INNER JOIN forprogram t2 ON t1.pCode = t2.pCode
    INNER JOIN foracademicyear t3 ON t1.code = t3.code
    INNER JOIN fortheviolations t4 ON t1.Violations = t4.v_code
    INNER JOIN forstudents t5 ON t1.studNum = t5.studNum
    INNER JOIN forthesanctions t6 ON t1.Sanctions = t6.s_id WHERE t1.studNum LIKE '{$input}%'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        ?>
        <table class="display_violation_record">
        <thead>
            <tr> 
                <th class="violation_title">Student Number</th>
                <th class="violation_title">Name</th>
                <th class="violation_title">Course</th>
                <th class="violation_title">Section</th>
                <th class="violation_title">A.Y Code</th>
                <th class="violation_title">Violation</th>
                <th class="violation_title">Sanction</th>
                <th class="violation_title">Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)){
                $studNum = $row['studNum'];
                $fullName = $row['fullName'];
                $p_description = $row['p_description'];
                $section = $row['Section'];
                $code = $row['a_code'];
                $violations = $row['Violations'];
                $sanctions = $row['Sanctions'];
                $date = $row['Date'];
                ?>
                <tr>
                        <td class="violation_data"><?php echo $studNum; ?> </td>
                        <td class="violation_data"><?php echo $fullName; ?></td>
                        <td class="violation_data"><?php echo $p_description; ?></td>
                        <td class="violation_data"><?php echo $section; ?></td>
                        <td class="violation_data"><?php echo $code; ?></td>
                        <td class="violation_data"><?php echo $violations; ?> </td>
                        <td class="violation_data"><?php echo $sanctions; ?> </td>
                        <td class="violation_data"><?php echo $date; ?></td>
                    </tr>
                <?php
            }
            ?>
        </tbody>

        </table>
     
    <?php }else{

    }
}
?>