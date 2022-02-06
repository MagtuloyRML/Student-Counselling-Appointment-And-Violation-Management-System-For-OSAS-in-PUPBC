<?php
    // INSERTING THE DATA TO DATA BASE
        include_once 'dbconnection.php';
    
        $query = "SELECT * FROM forstudents order by id desc limit 1";
        $res = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($res);
        $lastid = $row['id'];

        $stud_id = substr($lastid, 0);
        $stud_id = intval($stud_id);
        $stud_id = ($stud_id + 1);

        $studNum = $_POST['studNum'];
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $Section = $_POST['Section'];
        $Address = $_POST['Addres'];
        $Gender = $_POST['Gender'];
        $progCode = $_POST['progCode'];
        $ayCode = $_POST['ayCode'];
        $status = 'Enrolled';
        $fullName = $lastName . ', ' . $firstName . ' ' . $middleName;
        $sql = "INSERT INTO forstudents (studNum, id, fullName, lastName, firstName, middleName, ayCode, Section, Address, Gender, progCode, status) 
        VALUES ('$studNum', '$stud_id', '$fullName', '$lastName', '$firstName','$middleName', '$ayCode', '$Section','$Address','$Gender','$progCode', '$status')";
        $result = mysqli_query($conn, $sql);
    
        header("Location: ../index.php?save=success");
    
        if(!$result){
    
            echo "Failed";
        }
            
        

        
    

     
   
        
        
    

    