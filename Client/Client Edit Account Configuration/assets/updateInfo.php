<?php
    session_start();
    // for Connection.php
    include '../../../assets/connection/DBconnection.php';

    $stud_ID = $_SESSION['StudID'];
    $prepass = $_POST['prepass']; 
    $npass = $_POST['npass']; 
    $conpass = $_POST['conpass'];
    $pass = '';
 
    $check_pass = mysqli_query($conn, "SELECT ClientPassword from clientaccountinfo WHERE ClientAccountID = '$stud_ID'");
    
    while($detail = mysqli_fetch_assoc($check_pass))
    {
        $pass = $detail['ClientPassword']; 
        if($prepass == $pass){

            if($npass == $conpass){
                //insert sa database
                $updateInfo="UPDATE clientaccountinfo SET ClientPassword = '$npass' WHERE ClientAccountID = '$stud_ID'";
                $query_run = mysqli_query($conn, $updateInfo);
                if($query_run){
                echo '<span class="alert_icon green">
                            <i class="fa-solid fa-check"></i>
                        </span>
                        <span class="alert_text">
                            Change Password Successfully
                        </span>';
                
                }else{
                echo "something is wrong" . $updateInfo . $conn->error;
                }
            }
            else{
                echo "errorConPass";
            }
            
        }
        else{
            echo "errorPrePass";
        }
    }
    


?> 