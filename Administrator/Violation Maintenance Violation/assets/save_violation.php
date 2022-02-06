<?php
    // INSERTING A DATA TO DATABASE FROM WEB PAGE
        include_once 'dbconnection.php';
    
    
        $Violations = $_POST['Violations'];
        
        
        $sql = "INSERT INTO fortheviolations (Violations) VALUES ('$Violations');";
        $result = mysqli_query($conn, $sql);
    
        header("Location: ../index.php?save=success");
    
        if(!$result){
    
            echo "Failed";
        }
            
        

        
    

     
   
        
        
    

    