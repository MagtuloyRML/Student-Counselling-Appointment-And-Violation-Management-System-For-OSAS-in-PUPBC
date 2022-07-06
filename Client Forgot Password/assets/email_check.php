<?php


//This is the connection process, referencing to connection.php
include_once '../../assets/connection/DBconnection.php';
require ('../../assets/PHPMailer/src/PHPMailer.php');
require ('../../assets/PHPMailer/src/SMTP.php');

if(isset($_POST['submit'])){
//giving variable to password and username
$email = $_POST['email'];


// fetching the data from the database
$sql_fetch = mysqli_query($conn, "SELECT * from clientaccountinfo WHERE ClientEmailAdd = '$email'");
if(mysqli_num_rows($sql_fetch) > 0){
    
    //creating a random code
    function generateRandomString($length = 6) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    //usage 
    $myRandomString = generateRandomString(6);

    //updating the column code in database for verification purposes
    $updateUser = $conn->query("UPDATE clientaccountinfo SET code = '$myRandomString' WHERE ClientEmailAdd = '$email'");

        if($updateUser){
            while($row = $sql_fetch->fetch_array()){
                //pagsesendan ng email
                $mailTo = $row['ClientEmailAdd'];
                //Message to recipient
                
                $body ="
                <h1>Here's your code</h1>
                <p>The code will only last for 5 minutes, please use it as soon as possible. <br>
                <br>
                <u>".$myRandomString."</u></a>

                    <hr />

                    <p>© All rights reserved</p>"; //Body
            
                    $mail = new PHPMailer\PHPMailer\PHPMailer();
            
                    $mail -> SMTPDebug = 3;
                
                    $mail -> isSMTP();
                
                    $mail -> Host = "smtp.gmail.com";
                
                    $mail -> SMTPAuth = true;
                
                    $mail -> Username = "studentcounselingpupbc@gmail.com";
                    $mail -> Password = "ewpbneyhunnzxccg";
                
                    $mail -> SMTPSecure = "tls";
                
                    $mail -> Port = "587";
                
                    $mail -> From = "studentcounselingpupbc@gmail.com";
                    $mail -> FromName = "Forgot Password Code";
                
                    $mail -> addAddress($mailTo, "Test");
                
                    $mail -> isHTML(true);
                
                    $mail -> Subject = "Forgot Password";
                
                    $mail -> Body = $body;
                    
                    $mail -> AltBody = "This is the basic version";
                
                    if(!$mail->send()){
                        echo "Mailer Error: " . $mail->ErrorInfo;
                    }else{
                        echo "Message has been sent";
                    }
            }
            echo "<script>window.location.href='verify_otp.php?success=An OTP has been sent to your email&email=$email'</script>";
            exit();
        }else{
            echo "Error confirming record"; // display error message if not delete
        }
    }else{
        echo "<script>window.location.href='../index.php?error=No email found'</script>";
            exit();
    }


}



?>