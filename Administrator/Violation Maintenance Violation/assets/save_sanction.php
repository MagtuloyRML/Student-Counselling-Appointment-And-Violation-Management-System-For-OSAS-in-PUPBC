<?php
    // INSERTING A DATA TO DATABASE FROM WEB PAGE
        include_once 'dbconnection.php';
    
    
        $Sanction = $_POST['Sanctions'];
        
        
        $sql = "INSERT INTO forthesanctions (Sanctions) VALUES ('$Sanction');";
        $result = mysqli_query($conn, $sql);
    
        header("Location: ../index.php?save=success");
    
        if(!$result){
    
            echo "Failed";
        }
            
        

        
    

     
   
        
        
    

    