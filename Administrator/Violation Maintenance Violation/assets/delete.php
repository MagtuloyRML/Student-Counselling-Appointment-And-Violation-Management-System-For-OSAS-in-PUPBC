<?php
    include_once 'dbconnection.php';

    $delID = $_POST['delID'];
    if(!isset($delID)){
        echo 'msg003';
    }
    elseif(isset($delID)){
        $check_viol = mysqli_query($conn, "SELECT Violations from fortheviolations WHERE v_code = '$delID'");
        $detail = mysqli_num_rows($check_viol);
        if($detail>0){
            $run = $conn ->query("DELETE FROM fortheviolations WHERE v_code = '$delID' ");
            if($run){
                echo 'msg001';
            }else{
                echo 'msg008';
            }
        }else{
            echo 'msg002';
        }
    }

?>
