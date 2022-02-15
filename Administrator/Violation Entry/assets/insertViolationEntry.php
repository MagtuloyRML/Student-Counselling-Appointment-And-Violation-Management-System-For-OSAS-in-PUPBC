<?php 
include('dbconnection.php');
    $studNum = $_POST['studNum'];
    $violation = $_POST['violations'];
    $sanction = $_POST['sanctions'];
    $date = $_POST['date'];

    $query = "SELECT * FROM forstudents WHERE studNum = '$studNum'";
    $run = mysqli_query($conn, $query);
    if(mysqli_num_rows($run) > 0){
        $sql = "SELECT `studNum`,
        `id`,
        `fullName`,
        `lastName`,
        `firstName`,
        `middleName`,
        `Section`,
        `Address`,
        `Gender`,
        `progCode`,
        `ayCode`,
        `status` FROM `forstudents` WHERE studNum = '$studNum'";
        $sql_run = mysqli_query($conn, $sql);
        while($row = $sql_run->fetch_array()){

        $fullName = $row['fullName'];
        $Section = $row['Section'];
        $progCode = $row['progCode'];
        $ayCode = $row['ayCode'];


        $insert = "INSERT into `forviolationentries`(`studNum`,
        `fullName`, `pCode`, `Section`, `Violations`, `Sanctions`, `Date`, `code`) VALUES 
        ('$studNum',
        '$fullName',
        '$progCode',
        '$Section',
        '$violation',
       '$sanction',
        '$date',
        '$ayCode')";
        $insert_run = mysqli_query($conn, $insert);
        echo "success";
    }
    }else{
        echo "Your student number is invalid / not found.";
    }
?>