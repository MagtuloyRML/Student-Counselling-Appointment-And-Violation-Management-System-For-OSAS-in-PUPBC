<?php 
include '../../../assets/connection/DBconnection.php';      

    $start_t = $_POST['start_time'];
    $end_t = $_POST['end_time'];
    $start_d = $_POST['start_date'];
    $end_d = $_POST['end_date'];

    $sql = "UPDATE avail_sched SET start_time = '$start_t', end_time = '$end_t', start_date = '$start_d', end_date = '$end_d'
    WHERE meta_field = 'first'";
    $run = mysqli_query($conn, $sql);

    if($run){
        echo "success";
    }

?>