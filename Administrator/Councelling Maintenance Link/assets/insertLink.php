<?php 
include '../../../assets/connection/DBconnection.php';      
    $id = $_POST['id'];
    $zlink = $_POST['zlink'];

    $query = "SELECT * from counsellingzoomlink where AdminAccountID = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $zoomLink = $row['AdminAccountID'];
    $now = date("Y-m-d H:i:s");
    if(isset($zoomLink)){
        $sql = "UPDATE counsellingzoomlink SET CounseZLink = '$zlink', DateTimeStamp ='$now' WHERE AdminAccountID = '$id'";
        $run = mysqli_query($conn, $sql);
        if($run){
            echo '<span class="alert_icon green">
                    <i class="fa-solid fa-check"></i>
                </span>
                <span class="alert_text">
                    Update Link Successful
                </span>';
        }
    }
    else{
        $insert = "INSERT INTO counsellingzoomlink ( AdminAccountID, CounseZLink, DateTimeStamp) VALUES 
        ('$id', '$zlink', '$now')";
        $insert_run = mysqli_query($conn, $insert);
        if($insert_run){
            echo '<span class="alert_icon green">
                    <i class="fa-solid fa-check"></i>
                </span>
                <span class="alert_text">
                    Insert Link Successful
                </span>';
        }
    }

    

?>