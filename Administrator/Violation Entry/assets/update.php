<?php
include_once 'dbconnection.php';


if (isset($_POST['submit'])) {
    $pID = $_POST['id'];
    $oldvio = $_POST['old_vio'];
    $newvio = $_POST['new_vio'];
    $oldsanction = $_POST['old_sanction'];
    $newsanction = $_POST['new_sanction'];
    $date = $_POST['date'];

    if(!$newvio && !$newsanction){
        $update = "UPDATE forviolationentries SET Violations = '$oldvio', Sanctions = '$oldsanction', Date = '$date' WHERE entry_id ='$pID' ";
        $results = mysqli_query($conn, $update);
        if (!$results) {
            echo "Something is wrong" . $update . $conn->error;
        }else{
            header("Location: ../index.php?Updated=success");
        }

    }
    elseif(!$newvio && $newsanction != ''){
        $update = "UPDATE forviolationentries SET Violations = '$oldvio', Sanctions = '$newsanction', Date = '$date' WHERE entry_id ='$pID' ";
        $results = mysqli_query($conn, $update);
        if (!$results) {
            echo "Something is wrong" . $update . $conn->error;
        }else{
            header("Location: ../index.php?Updated=success");
        }
    }
    elseif(!$newsanction && $newvio != ''){
        $update = "UPDATE forviolationentries SET Violations = '$newvio', Sanctions = '$oldsanction', Date = '$date' WHERE entry_id ='$pID' ";
        $results = mysqli_query($conn, $update);
        if (!$results) {
            echo "Something is wrong" . $update . $conn->error;
        }else{
            header("Location: ../index.php?Updated=success");
        }
    }
    elseif($newsanction != '' && $newvio != ''){
        $update = "UPDATE forviolationentries SET Violations = '$newvio', Sanctions = '$newsanction', Date = '$date' WHERE entry_id ='$pID' ";
        $results = mysqli_query($conn, $update);
        if (!$results) {
            echo "Something is wrong" . $update . $conn->error;
        }else{
            header("Location: ../index.php?Updated=success");
        }
    }
}

