<?php
    session_start();
    // for Connection.php
    include '../../../assets/connection/DBconnection.php';

    $id = $_SESSION['AdminID'];
    $prepass = $_POST['prepass']; 
    $npass = $_POST['npass']; 
    $conpass = $_POST['conpass'];
    $pass = '';
 
    $check_pass = mysqli_query($conn, "SELECT AdminPassword from adminaccountinfo WHERE AdminAccountID = '$id'");
    
    while($detail = mysqli_fetch_assoc($check_pass))
    {
        $pass = $detail['AdminPassword']; 
        if($prepass == $pass){
            if($npass == $conpass){
                //insert sa database
                $updateInfo="UPDATE adminaccountinfo SET AdminPassword = '$npass' WHERE AdminAccountID = '$id'";
                $query_run = mysqli_query($conn, $updateInfo);
                if($query_run){
                echo "Data Inserted";
                header ("Location: ../../Administrator Account Configuration/");
                }else{
                echo "something is wrong" . $updateInfo . $conn->error;
                }
            }
            else{
                echo "errorPrePass";
            }
        }
        else{
            echo "errorPrePass";
        }
    }
    


?> 