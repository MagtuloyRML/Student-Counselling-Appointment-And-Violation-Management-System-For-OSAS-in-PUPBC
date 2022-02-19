<?php 
session_start(); 
//DB Connection
include "../../assets/connection/DBConnection.php";

//Pagkuha ata ng data sa forms
if (isset($_POST['submit'])) {

//Declaring functions
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

//Calling functions
	$name = validate($_POST['name']);
    $email = $_POST['email_add'];
	$start_app_time = validate($_POST['start_app_time']);
	$start_app_date = validate($_POST['start_app_date']);
	
    $stat = 'Pending';
    $remarks = ' ';

	$start_app = date("Y-m-d H:i:s", strtotime("$start_app_date $start_time_edited"));

	$start_time_edited = date("H:i:s ", strtotime($start_app_time));
	$date_edited = date("Y-m-d", strtotime($start_app_date));
	$end_app_edited = date("H:i:s ", strtotime('+1 hour', strtotime($start_app_time)));
	$end_updated = $end_app_edited;
	$start_app = date("Y-m-d H:i:s", strtotime("$start_app_date $start_time_edited"));
	$end_app = date("Y-m-d H:i:s", strtotime("$start_app_date $end_updated"));

//yung may comment after ng $start_app below. , kapag sinama iyon sa code, pati yung end time ay nababasa and magkakaerror pag may kasabay na nagpasched.

	

	
//pag kuha ng data sa db tables.
	$sql = "SELECT start_app_date, end_app_date, start_app_time, end_app_time FROM schedules
	WHERE '$start_app' BETWEEN start_app AND end_app
	AND '$end_app' BETWEEN start_app AND end_app";
	$result = mysqli_query($conn, $sql);

//conditions
	if (mysqli_num_rows($result) > 0) {
		
			header("Location: index.php?error=The schedule is already taken");
	        exit();
		} 
		//if ever  walang kaparehas, papasok na yung nilagay sa form sa db.
		
		else{
			$sql2 = "INSERT INTO schedules(title, email_add, start_app, end_app, start_app_date, end_app_date, start_app_time, end_app_time, stat, remarks)
           VALUES('$name', '$email', '$start_app', '$end_app', '$date_edited', '$date_edited', '$start_time_edited', '$end_updated', '$stat', '$remarks')";
				$result2 = mysqli_query($conn, $sql2);
				if ($result2){
					header("Location: index.php?success=Recorded successfully");
					exit();
				}else {
					header("Location: index.php?unknown error occured.$result2.$conn->error;");
					echo "Error Occured" . $result2 . $conn->error;
					exit();
				}
		}
			
	}
	
