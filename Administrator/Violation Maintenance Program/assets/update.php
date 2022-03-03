<?php
include_once 'dbconnection.php';

    $pID = $_POST['pCode'];
    $progCode = $_POST['pc'];
    $progDescription = $_POST['pd'];


    $update = "UPDATE forprogram SET pCode = '$progCode' , pDescription = '$progDescription' WHERE pID ='$pID' ";
    $results = mysqli_query($conn, $update);
    if (!$results) {
        echo "msg005";
    }
    else{
        echo "msg004";
    }

?>
