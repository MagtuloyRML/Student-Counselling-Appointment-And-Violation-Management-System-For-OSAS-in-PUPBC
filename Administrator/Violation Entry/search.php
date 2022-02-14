<?php 
    include('assets/dbconnection.php');
    $output = '';
    if(isset($_POST['input'])){
        $input = $_POST['input'];
        $stmt= $conn->prepare("SELECT 
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
        INNER JOIN forthesanctions t6 ON t1.Sanctions = t6.s_id WHERE t1.studNum LIKE '{$input}%'");
        //$stmt->bind_param("ss",$input,$input);
    }else{
        $stmt=$conn->prepare("SELECT 
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
        INNER JOIN forthesanctions t6 ON t1.Sanctions = t6.s_id
        WHERE
        Date >= '2013-12-12'
        ORDER BY entry_id DESC");

    }

    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $output = "<thead>
        <tr> 
            <th class='violation_title'>Student Number</th>
            <th class='violation_title'>Name</th>
            <th class='violation_title'>Course</th>
            <th class='violation_title'>Section</th>
            <th class='violation_title'>A.Y Code</th>
            <th class='violation_title'>Violation</th>
            <th class='violation_title'>Sanction</th>
            <th class='violation_title'>Date</th>
        </tr>
        </thead>
        <tbody>";

        while ($row = $result->fetch_assoc()){
            $output .="<tr>
            <td class='violation_data'>".$row['studNum']."</td>
            <td class='violation_data'>".$row['fullName']."</td>
            <td class='violation_data'>".$row['p_description']."</td>
            <td class='violation_data'>".$row['Section']."</td>
            <td class='violation_data'>".$row['a_code']."</td>
            <td class='violation_data'>".$row['Violations']." </td>
            <td class='violation_data'>".$row['Sanctions']."</td>
            <td class='violation_data'>".$row['Date']."</td>
            </tr>";
        }
        $output .="</tbody>";
        echo $output;
    }else{
        echo "No Data Found";
    }
?>
       