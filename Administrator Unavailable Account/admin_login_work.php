<?php
session_start();
//error message
$error = "Username or Password is incorrect. Please try again";
//This is the connection process, referencing to connection.php
include '../assets/connection/DBconnection.php';
//When the submit button in Login form is clicked
if(isset($_POST['submit'])){
    //giving variable to password and username
    $username = $_POST['username'];
    $pass = $_POST['password'];
    // fetching the data from the database
    $sql_fetch = "SELECT * from tbl_admins";
    //giving the result to the system
    $result = $conn->query($sql_fetch);
    //checking if the password and username is matching the database
        while($row = $result->fetch_array()){
            //if the pass and username is correct, display this
            if( $row['username'] == $username & $row['password'] == $pass ){
                $_SESSION['username'] = $username;
                header('location: ../administrator/counceling dashboard/');
                die;
            //if the pass and username is INCORRECT, display this
            }else{
                $_SESSION["error"] = $error;
                header("location: index.php");
            }
        }

}



?>