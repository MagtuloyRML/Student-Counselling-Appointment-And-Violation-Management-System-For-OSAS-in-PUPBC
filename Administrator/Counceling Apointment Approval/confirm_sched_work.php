<?php

include "../../assets/connection/DBconnection.php"; // Using database connection file here
require ('../../assets/PHPMailer/src/PHPMailer.php');
require ('../../assets/PHPMailer/src/SMTP.php');


$id = $_GET['id'];

$find = $conn->query("SELECT * FROM adminaccountinfo WHERE AdminAccountID = '$id'");
$row = mysqli_fetch_array($find);
$finalNameFormat = $row['AdminFirstName'] . ' ' . $row['AdminLastName'];
$appointmentID = $_GET['a_id']; // get id through query string
$stat ='Confirmed';
$query = "UPDATE schedules SET stat ='$stat', remarks ='$id' WHERE id = '$appointmentID'";
$get = "SELECT * FROM schedules WHERE id = '$appointmentID'";
$data2=mysqli_query($conn, $get);
$data=mysqli_query($conn, $query);

if($data && $data2)
{
            while($row = $data2->fetch_array()){
            //pagsesendan ng email
            $mailTo = $row['email_add'];
            //Message to recipient
            $start = date("d/m/Y h:i A", strtotime($row['start_app']));
			$end = date("h:i A", strtotime($row['end_app']));
            $body ="
            <h1>Your appointment is confirmed!</h1>
            <p>Your appointment of <u>".$start." - ".$end."</u> "." is confirmed by Counselor <u>".$finalNameFormat."</u>. <br>
                Please be in the waiting room <u>15 minutes earlier</u> than the scheduled time.</p>
                <a href='https://us04web.zoom.us/j/71714722555?pwd=sWrJtdcN0pdJHIDFgWovW2tYmA8zFz.1' target='_blank' class='btn'>Link here</a>

                <hr />

                <p id='contact'>© All rights reserved</p>"; //Body
        
            $mail = new PHPMailer\PHPMailer\PHPMailer();
        
            $mail -> SMTPDebug = 3;
        
            $mail -> isSMTP();
        
            $mail -> Host = "mail.smtp2go.com";
        
            $mail -> SMTPAuth = true;
        
            $mail -> Username = "iskolarngbayan.pup.edu.ph";
            $mail -> Password = "bMadDrTrXEnCpjkf";
        
            $mail -> SMTPSecure = "tls";
        
            $mail -> Port = "2525";
        
            $mail -> From = "godrel0422@gmail.com";
            $mail -> FromName = "Test Code Scheduling";
        
            $mail -> addAddress($mailTo, "Test");
        
            $mail -> isHTML(true);
        
            $mail -> Subject = "Test Email Notification";
        
            $mail -> Body = $body;
            
            $mail -> AltBody = "This is the basic version";
        
            if(!$mail->send()){
                echo "Mailer Error: " . $mail->ErrorInfo;
            }else{
                echo "Message has been sent";
            }
        }
        echo "<script>window.location.href='index.php?success=Appointment Confirmed'</script>";
        exit();
}
else
{
    echo "Error confirming record"; // display error message if not delete
}

exit();
?>