<?php
include_once 'dbconnection.php';

if (isset($_POST['request'])) {


        $request = $_POST['request'];

        $sql = "SELECT 
        `entry_id`,
        t1.studNum,
        `Date`,
        t5.fullName as fullName,
        t5.Section as Section,
        t4.Violations as Violations,
        t6.Sanctions as Sanctions,
        t2.pDescription AS p_description,
        t3.code AS code,
        status FROM forviolationentries t1
        INNER JOIN forprogram t2 ON t1.pCode = t2.pCode
        INNER JOIN foracademicyear t3 ON t1.code = t3.code
        INNER JOIN fortheviolations t4 ON t1.Violations = t4.v_code
        INNER JOIN forstudents t5 ON t1.studNum = t5.studNum
        INNER JOIN forthesanctions t6 ON t1.Sanctions = t6.s_id
        WHERE code = '$request' ";

        $result = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($result);
        ?>

        <table class="display_violation_record">
                <?php 
                if ($count) {

                ?>

                        <tr>
                                <th class="violation_title">Student Number</th>
                                <th class="violation_title">Name</th>
                                <th class="violation_title">Program</th>
                                <th class="violation_title">Section</th>
                                <th class="violation_title">Violations</th>
                                <th class="violation_title">Sanctions</th>
                                <th class="violation_title">A.Y. Code</th>
                                <th class="violation_title">Date</th>

                        </tr>

                <?php
                } 
                else {
                        echo "Na Record Found";
                }
                ?>

                <tbody>
                        <?php

                        while ($row = mysqli_fetch_array($result)) {

                        ?>

                                <tr>
                                        <td><?php echo $row['studNum']?></td>
                                        <td><?php echo $row['fullName']?></td>
                                        <td><?php echo $row['pCode']?></td>
                                        <td><?php echo $row['Section']?></td>
                                        <td><?php echo $row['Violations']?></td>
                                        <td><?php echo $row['Sanctions']?></td>
                                        <td><?php echo $row['code']?></td>
                                        <td><?php echo $row['Date']?></td>
                                </tr>

                        <?php
                        }
                        ?>
                </tbody>
        </table>
<?php
}
?>