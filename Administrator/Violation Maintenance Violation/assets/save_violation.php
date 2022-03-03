<?php
    // INSERTING A DATA TO DATABASE FROM WEB PAGE
    include_once 'dbconnection.php';
    
    $Violations = $_POST['violations'];
    if(!isset($Violations)){
        echo '<span class="alert_icon orange">
                <i class="fa-solid fa-exclamation"></i>
            </span>
            <span class="alert_text">
                Please Fill up the Form
            </span>';
    }elseif(isset($Violations)){
        $existViolation = '';

        $check_viol = mysqli_query($conn, "SELECT Violations from fortheviolations WHERE Violations = '$Violations'");
        
        $detail = mysqli_fetch_array($check_viol);
        
        $existViolation = $detail['Violations']; 
        if($Violations != $existViolation){
            $Violations = $_POST['violations'];
            $sql = "INSERT INTO `fortheviolations` (`Violations`) VALUE ('$Violations')";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo '<span class="alert_icon green">
                        <i class="fa-solid fa-check"></i>
                    </span>
                    <span class="alert_text">
                        Add Violation Successfully
                    </span>';
            }else{
                echo '<span class="alert_icon orange">
                            <i class="fa-solid fa-exclamation"></i>
                        </span>
                        <span class="alert_text">
                            Something Error in Connection
                        </span>';
            }
        }
        else{
            echo '<span class="alert_icon red">
                        <i class="fa-solid fa-exclamation"></i>
                    </span>
                    <span class="alert_text">
                        Violation is Already Exists
                    </span>';
        }
        
        
    }
?>   

        
    

     
   
        
        
    

    