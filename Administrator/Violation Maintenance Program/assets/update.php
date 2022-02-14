<?php
include_once 'dbconnection.php';


if (isset($_POST['submit'])) {
    $pID = $_POST['pCode'];

    $progCode = $_POST['pc'];
    $progDescription = $_POST['pd'];


    $update = "UPDATE forprogram SET pCode = '$progCode' , pDescription = '$progDescription' WHERE pID ='$pID' ";
    $results = mysqli_query($conn, $update);
    if (!$results) {
        echo "Something is wrong" . $update . $conn->error;
    }
}
header("Location: ../index.php?Updated=success");
