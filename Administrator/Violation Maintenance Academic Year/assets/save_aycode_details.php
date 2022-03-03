<?php
    // INSERTING THE ACADEMIC YEAR FROM WEB PAGE TO DATA BASE
        include_once 'dbconnection.php';
        $yearFrom = $_POST['yearFrom'];
        $yearTo = $_POST['yearTo'];
        $Semester = $_POST['semester'];
        
        $sql = "INSERT INTO foracademicyear (code, yearFrom, yearTo, Semester) VALUES ('$yearFrom - $yearTo, $Semester', '$yearFrom', '$yearTo', '$Semester')";
        $result = mysqli_query($conn, $sql);
    
        if(!$result){
            echo "<script>window.location.href='../../Violation Maintenance Academic Year/?msg=mgs002'</script>";
        }
        else{
            echo "<script>window.location.href='../../Violation Maintenance Academic Year/?msg=mgs001'</script>";
        }
?>
        

        
    

     
   
        
        
    

    