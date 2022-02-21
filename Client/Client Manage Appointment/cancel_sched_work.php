<?php 
include_once('../includes/header.php');

$id = $_SESSION['StudID'];
   $sql_fetch = mysqli_query($conn, "SELECT * from clientaccountinfo WHERE ClientAccountID = '$id'");
   $name = "";
   while($row = mysqli_fetch_assoc($sql_fetch))
   {
       $name = $row['ClientAccountID'];
   }
   include '../../assets/connection/dbconnection.php';
   
   if(isset($_POST['submit'])){
    $a_id = $_POST['id'];
    $reason = $_POST['reason'];

    $update = $conn->query("UPDATE schedules SET stat ='Cancelled', cancel_id = '$name', cancel_reason ='$reason' WHERE id = '$a_id'");
    if($update){
        echo "<script>window.location.href='index.php'</script>";
        exit();
    }
   }
   
?>