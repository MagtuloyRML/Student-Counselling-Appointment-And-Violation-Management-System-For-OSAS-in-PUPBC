<?php

include "../../assets/connection/DBconnection.php"; // Using database connection file here
require ('../../assets/PHPMailer/src/PHPMailer.php');
require ('../../assets/PHPMailer/src/SMTP.php');
include('../includes/header.php');

$id = $_GET['id'];


$appointmentID = $_GET['a_id']; // get id through query string
$stat ='Confirmed';
$query = "UPDATE schedules SET stat ='$stat', remarks ='$id' WHERE id = '$appointmentID'";
$get = "SELECT * FROM schedules WHERE id = '$appointmentID'";
$data2=mysqli_query($conn, $get);
$data=mysqli_query($conn, $query);
/*
if($data && $data2)
{
            while($row = $data2->fetch_array()){
            //pagsesendan ng email
            $mailTo = $row['email_add'];
            //Message to recipient
            $start = date("d/m/Y h:i A", strtotime($row['start_app']));
			$end = date("d/m/Y h:i A", strtotime($row['end_app']));
            $body ="Your appointment on". " " . $start . "-" . $end . " " . "is confirmed";
        
            $mail = new PHPMailer\PHPMailer\PHPMailer();
        
            $mail -> SMTPDebug = 3;
        
            $mail -> isSMTP();
        
            $mail -> Host = "mail.smtp2go.com";
        
            $mail -> SMTPAuth = true;
        
            $mail -> Username = "appointmentsched";
            $mail -> Password = "MHB6a3h0aHhwaW5h";
        
            $mail -> SMTPSecure = "tls";
        
            $mail -> Port = "2525";
        
            $mail -> From = "godrel0422@gmail.com";
            $mail -> FromName = "Test Code Scheduling";
        
            $mail -> addAddress($mailTo, "Test");
        
            $mail -> isHTML(true);
        
            $mail -> Subject = "Test Notification";
        
            $mail -> Body = $body;
            
            $mail -> AltBody = "This is the basic version";
        
            if(!$mail->send()){
                echo "Mailer Error: " . $mail->ErrorInfo;
            }else{
                echo "Message has been sent";
            }
        }
    
    mysqli_close($conn); // Close connection
    header("location:index.php"); // redirects to scheduling page
    exit;	
}
else
{
    echo "Error confirming record"; // display error message if not delete
}
*/
exit();
?>