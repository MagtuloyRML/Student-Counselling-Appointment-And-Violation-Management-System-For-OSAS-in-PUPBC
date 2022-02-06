<?php
session_start();

//This is the connection process, referencing to connection.php
include_once '../../assets/connection/DBconnection.php';

//giving variable to password and username
$stud_num = $_POST['stud_num'];
$pass = $_POST['password'];
$_SESSION['StudID'] = '';
$_SESSION['Page'] = '';

// fetching the data from the database
$sql_fetch = mysqli_query($conn, "SELECT ClientAccountID, ClientStudentNo, ClientPassword from clientaccountinfo WHERE ClientStudentNo = '$stud_num' AND ClientPassword = '$pass'");

//checking if the password and username is matching the database
    while($row = mysqli_fetch_array($sql_fetch)){
        //if the pass and username is correct, display this
        if( $row['ClientStudentNo'] == $stud_num & $row['ClientPassword'] == $pass ){
            $_SESSION['StudID'] = $row['ClientAccountID'];
            $_SESSION['Page'] = 'Client';
            echo "exists";
            die;
        //if the pass and username is INCORRECT, display this
        }else{
            echo "Not exists";
        }
    }
?>