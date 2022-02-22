<?php 
include '../../../assets/connection/dbconnection.php';

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $a_id = $_POST['a_id'];
    $eval = $_POST['evaluation'];
    $reco = $_POST['recommendation'];

    $insert = $conn->query("INSERT INTO forevaluation(evaluator_id, appointment_id, evaluation, recommendation) VALUES
    ('$id', '$a_id', '$eval', '$reco')");
    if($insert){
        $update = $conn->query("UPDATE schedules SET stat = 'Evaluated' WHERE id = '$a_id'");
    echo "<script>window.location.href='../index.php?success=Evaluation Recorded'</script>";
        exit();
    }else{
        echo "<script>window.location.href='../index.php?error=Something Went Wrong'</script>";
        exit();
    }


}
?>