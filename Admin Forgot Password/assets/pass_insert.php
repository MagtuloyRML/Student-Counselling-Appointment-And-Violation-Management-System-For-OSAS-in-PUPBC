<?php 
include_once '../../assets/connection/DBconnection.php';

if(isset($_POST['submit'])){
    $pass1 = $_POST['password'];
    $pass2 = $_POST['con_password'];
    $email = $_POST['email'];

    if($pass1 == $pass2){
        $updatePass = $conn->query("UPDATE adminaccountinfo SET AdminPassword = '$pass1', code = '' WHERE AdminEmailAdd = '$email'");
        if($updatePass){
            echo "<script>window.location.href='../index.php?success=You have changed your password successfully, you can now log in.'</script>";
            exit();
        }else{
            echo "<script>window.location.href='new_pass.php?error=Something went wrong&email=$email'</script>";
            exit();
        }
    }else{
        echo "<script>window.location.href='new_pass.php?error=The entered passwords do not match&email=$email'</script>";
        exit();
    }
    

}
?>