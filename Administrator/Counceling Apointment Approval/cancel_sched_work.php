<?php

include "../../assets/connection/DBconnection.php"; // Using database connection file here
require ('../../assets/PHPMailer/src/PHPMailer.php');
require ('../../assets/PHPMailer/src/SMTP.php');

$appointmentID = $_GET['a_id']; // get id through query string
$stat ='Cancelled';
//$remarks =  $_POST['remarks'];
//$query1 = "UPDATE schedules SET remarks = '$remarks' WHERE id = '$appointmentID'";
$query2 = "UPDATE schedules SET stat ='$stat' WHERE id = '$appointmentID'";
$query3 = "SELECT * FROM schedules WHERE id = '$appointmentID'";
//$data1=mysqli_query($conn, $query1);
$data2=mysqli_query($conn, $query2);
$data3=mysqli_query($conn, $query3);

if($data2 && $data3)
{
    while($row = $data3->fetch_array()){
        //pagsesendan ng email
        $mailTo = $row['email_add'];
        //Message to recipient
        $start = date("d/m/Y h:i A", strtotime($row['start_app']));
        $end = date("d/m/Y h:i A", strtotime($row['end_app']));
        $body ="Your appointment on". " " . $start . "-" . $end . " " . "is cancelled because of". " " .
        $row['remarks']. ". " . "We're sorry to inform you that.";
    
        $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    
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

?>