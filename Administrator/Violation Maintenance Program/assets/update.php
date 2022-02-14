<?php
include_once 'dbconnection.php';
$pID = 0;

if (isset($_POST['submit'])) {
    $pID = $_POST['pCode'];

    $progCode = $_POST['pc'];
    $progDescription = $_POST['pd'];


    $update = "UPDATE forprogram SET pCode = '$progCode' , pDescription = '$progDescription' WHERE pCode ='$pID' ";
    $results = mysqli_query($conn, $update);
    if (!$result) {
        echo "Something is wrong" . $update . $conn->error;
    }
}
header("Location: ../index.php?Updated=success");
