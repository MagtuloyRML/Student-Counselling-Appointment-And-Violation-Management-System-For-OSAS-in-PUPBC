<?php
session_start();

//This is the connection process, referencing to connection.php
include_once '../../assets/connection/DBconnection.php';

//giving variable to password and username
$username = $_POST['username'];
$pass = $_POST['password'];
$_SESSION['AdminID'] = '';
$_SESSION['Page'] = '';

// fetching the data from the database
$sql_fetch = mysqli_query($conn, "SELECT AdminAccountID, AdminUsername, AdminPassword from adminaccountinfo WHERE AdminUsername = '$username' AND AdminPassword = '$pass'");

//checking if the password and username is matching the database
    while($row = mysqli_fetch_array($sql_fetch)){
        //if the pass and username is correct, display this
        if( $row['AdminUsername'] == $username & $row['AdminPassword'] == $pass ){
            $_SESSION['AdminID'] = $row['AdminAccountID'];
            $_SESSION['Page'] = 'Admin';
            echo "exists";
            die;
        //if the pass and username is INCORRECT, display this
        }else{
            echo "Not exists";
        }
    }
?>