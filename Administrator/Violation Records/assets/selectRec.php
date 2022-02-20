<?php
//getting data from database
include_once 'dbconnection.php';
// getting data from employee table
$result = mysqli_query($conn, "SELECT 
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

//storing in array
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}


// returning response in JSON format
echo json_encode($data);
exit();