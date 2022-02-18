<?php 
include('dbconnection.php');
    $editID = $_POST['id'];
    $studNumEdit = $_POST['studNumEdit'];
    $violationsEdit = $_POST['violationsEdit'];
    $sanctionsEdit = $_POST['sanctionsEdit'];
    $dateEdit = $_POST['dateEdit'];

    $query = "SELECT * FROM forstudents WHERE studNum = '$studNumEdit'";
    $run = mysqli_query($conn, $query);
    if(mysqli_num_rows($run) > 0){
        $sql = "SELECT `studNum`, `id`, `fullName`, `lastName`, `firstName`, `middleName`, `Section`, `Address`, `Gender`, `progCode`,
         `ayCode`, `status` FROM `forstudents` WHERE studNum = '$studNumEdit'";
        $sql_run = mysqli_query($conn, $sql);
        while($row = $sql_run->fetch_array()){

            $fullName = $row['fullName'];
            $Section = $row['Section'];
            $progCode = $row['progCode'];
            $ayCode = $row['ayCode'];

            //updateinto sa database
            $updateInfo="UPDATE forviolationentries SET studNum = '$studNumEdit', fullName = '$fullName', pCode = '$progCode',
            Section = '$Section', Violations = '$violationsEdit', Sanctions = '$sanctionsEdit' , Date = '$dateEdit' , code = '$ayCode' WHERE entry_id = '$editID'";
            $query_run = mysqli_query($conn, $updateInfo);
            if($query_run){
                echo "success";
            }else{
                echo "something is wrong" . $updateInfo . $conn->error;
            }
        }
    }else{
        echo "unknownStudent";
    }
    
    

    
?>