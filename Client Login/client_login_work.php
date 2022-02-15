<?php
session_start();
//error message
$error = "Username or Password is incorrect. Please try again";
//This is the connection process, referencing to connection.php
include '../assets/connection/DBconnection.php';
//When the submit button in Login form is clicked
if(isset($_POST['submit'])){
    //giving variable to password and username
    $username = $_POST['stud_num'];
    $pass = $_POST['password'];
    // fetching the data from the database
    $sql_fetch = "SELECT * from tbl_clients";
    //giving the result to the system
    $result = $conn->query($sql_fetch);
    //checking if the password and username is matching the database
        while($row = $result->fetch_array()){
            //if the pass and username is correct, display this
            if( $row['stud_num'] == $username & $row['stud_pass'] == $pass ){
                $_SESSION['stud_num'] = $username;
                header('location: ../client/client home/?login=success');
                die;
            //if the pass and username is INCORRECT, display this
            }else{
                $_SESSION["error"] = $error;
                header("location: index.php");
            }
        }

}



?>