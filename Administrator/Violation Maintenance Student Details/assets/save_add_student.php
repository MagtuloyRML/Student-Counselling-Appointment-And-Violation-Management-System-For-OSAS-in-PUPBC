<?php
    // INSERTING THE DATA TO DATA BASE
        include_once 'dbconnection.php';
    
    
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
        $sql = "INSERT INTO forstudents (studNum, lastName, firstName, middleName, ayCode, Section, Address, Gender, progCode, status) 
        VALUES ('$studNum', '$lastName', '$firstName','$middleName', '$ayCode', '$Section','$Address','$Gender','$progCode', '$status')";
        $result = mysqli_query($conn, $sql);
    
        header("Location: ../index.php?save=success");
    
        if(!$result){
    
            echo "Failed";
        }
            
        

        
    

     
   
        
        
    

    