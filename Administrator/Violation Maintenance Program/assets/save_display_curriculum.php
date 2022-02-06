<?php
    // INSERTING THE DATA TO DATA BASE
        include_once 'dbconnection.php';
    
    
        $pCode = $_POST['progCode'];
        $Description = $_POST['progDescription'];
        
        $sql = "INSERT INTO forprogram (pCode, pDescription) VALUES ('$pCode', '$Description')";
        $result = mysqli_query($conn, $sql);
    
        header("Location: ../index.php?save=success");
    
        if(!$result){
    
            echo "Failed";
        }
            

        
    

     
   
        
        
    

    