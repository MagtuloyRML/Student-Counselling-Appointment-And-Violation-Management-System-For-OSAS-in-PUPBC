<?php 
include '../../../assets/connection/dbconnection.php';

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $eval = $_POST['evaluation'];
    $reco = $_POST['recommendation'];

    $insert = $conn->query("INSERT INTO forevaluation(appointment_id, evaluation, recommendation) VALUES
    ('$id', '$eval', '$reco')");
    if($insert){
    echo "<script>window.location.href='../index.php?success=Evaluation Recorded'</script>";
        exit();
    }else{
        echo "<script>window.location.href='../index.php?error=Something Went Wrong'</script>";
        exit();
    }


}
?>