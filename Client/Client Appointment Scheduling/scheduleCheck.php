<?php 
session_start(); 
//DB Connection
include "../../assets/connection/DBConnection.php";
date_default_timezone_set("Asia/Manila");
$dateNow = date("Y-m-d H:i:s");
//Pagkuha ata ng data sa forms
if (isset($_POST['submit'])) {

/*Declaring functions
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}*/

//Calling functions
	$name = $_POST['name'];
    $email = $_POST['email_add'];
	$id = $_POST['id'];
	$reason = $_POST['reason'];
	$anonymous = $_POST['anonymous'];
	
	$start_app_time = $_POST['start_app_time'];
	$start_app_date = $_POST['start_app_date'];
	$start_time_edited = date("H:i:s ", strtotime($start_app_time));
	$date_edited = date("Y-m-d", strtotime($start_app_date));
    $stat = 'Pending';
    $remarks = $_POST['counselor_id'];

	$start_app = date("Y-m-d H:i:s", strtotime("$start_app_date $start_time_edited"));

	
	$end_app_edited = date("H:i:s ", strtotime('+1 hour', strtotime($start_app_time)));
	
	$start_app = date("Y-m-d H:i:s", strtotime("$start_app_date $start_time_edited"));
	$end_app = date("Y-m-d H:i:s", strtotime("$start_app_date $end_app_edited"));

	//kung piniling date ay kahapon o nung isang araw pa.
	if($start_app < $dateNow){
		header("Location: index.php?error=The date you picked is invalid");
		exit();
	}else{

		//kung walang email
		if(!$email){
			//kukunin yung nasa client account info na table, yung email nya
			$get = $conn->query("SELECT * FROM clientaccountinfo WHERE ClientAccountID = '$id'");
			while($row = mysqli_fetch_assoc($get))
			{
				$email2 = $row['ClientEmailAdd'];
			}
			


			//pag kuha ng data sa db tables.
			$sql = "SELECT remarks, start_app, end_app FROM schedules
			WHERE remarks = '$remarks' AND '$start_app' BETWEEN start_app AND end_app
			OR '$end_app' BETWEEN start_app AND end_app";
			$result = mysqli_query($conn, $sql);

			//conditions
			if (mysqli_num_rows($result) > 0) {
				
					header("Location: index.php?error=The schedule is already taken");
					exit();
				} 
				//if ever  walang kaparehas, papasok na yung nilagay sa form sa db.
				
				else{
					$sql2 = "INSERT INTO schedules(title, email_add, client_id, app_date, anonymity, start_app, end_app, stat, remarks, reason)
				VALUES('$name', '$email2', '$id', '$date_edited', '$anonymous', '$start_app', '$end_app', '$stat', '$remarks', '$reason')";
				$notification = $conn->query("INSERT INTO adminnotification(AdminAccountID, NotificationTitle, NotificationMessage, AdminNotificationStatusID, DateTimeStamp)
				VALUES('$remarks', 'New Appointment', 'You have a new appointment, check appointment approval page.', '2', NOW())");
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
		}else{

			//pag kuha ng data sa db tables.
			$sql = "SELECT start_app, end_app FROM schedules
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
					$sql2 = "INSERT INTO schedules(title, email_add, client_id, app_date, anonymity, start_app, end_app, stat, remarks, reason)
				VALUES('$name', '$email2', '$id', '$date_edited', '$anonymous', '$start_app', '$end_app', '$stat', '$remarks', '$reason')";
				$notification = $conn->query("INSERT INTO adminnotification(AdminAccountID, NotificationTitle, NotificationMessage, AdminNotificationStatusID, DateTimeStamp)
				VALUES('$remarks', 'New Appointment', 'You have a new appointment, check appointment approval page.', '2', NOW())");
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
		}

		
	
			
	}
	
