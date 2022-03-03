<?php

    include_once 'dbconnection.php';

    $delID = $_POST['delID'];
    if(!isset($delID)){
        echo 'msg006';
    }
    elseif(isset($delID)){
        $check_viol = mysqli_query($conn, "SELECT Sanctions from forthesanctions WHERE s_id = '$delID'");
        $detail = mysqli_num_rows($check_viol);
        if($detail>0){
            $run = $conn ->query("DELETE FROM forthesanctions WHERE s_id = '$delID' ");
            if($run){
                echo 'msg004';
            }else{
                echo 'msg007';
            }
            
        }else{
            echo 'msg005';
        }
    }
?>
