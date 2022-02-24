<?php 
include '../../../assets/connection/dbconnection.php';


    $id = $_POST['id'];
    $a_id = $_POST['a_id'];
    $eval = $_POST['evaluation'];
    $reco = $_POST['recommendation'];

    $insert = $conn->query("INSERT INTO forevaluation(evaluator_id, appointment_id, evaluation, recommendation) VALUES
    ('$id', '$a_id', '$eval', '$reco')");
    if($insert){
        $update = $conn->query("UPDATE schedules SET stat = 'Evaluated' WHERE id = '$a_id'");
    echo "success";
        exit();
    }else{
        echo "somethingWrong";
        exit();
    }



?>