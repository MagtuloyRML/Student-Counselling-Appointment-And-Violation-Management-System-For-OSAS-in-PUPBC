<?php
    // INSERTING THE ACADEMIC YEAR FROM WEB PAGE TO DATA BASE
        include_once 'dbconnection.php';
    
    
        
        $yearFrom = $_POST['yearFrom'];
        $yearTo = $_POST['yearTo'];
        $Semester = $_POST['semester'];
        
        $sql = "INSERT INTO foracademicyear (code, yearFrom, yearTo, Semester) VALUES ('$yearFrom, $yearTo ', '$yearFrom', '$yearTo', '$Semester')";
        $result = mysqli_query($conn, $sql);
    
        header("Location: ../index.php?save=success");
    
        if(!$result){
    
            echo "Failed";
        }
            
        

        
    

     
   
        
        
    

    