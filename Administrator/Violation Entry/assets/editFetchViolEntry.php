<?php 
    include('dbconnection.php');
    if(isset($_POST["violationEntryID"]) ){
        $query = "SELECT entry_id, studNum, Violations, Sanctions, Date FROM forviolationentries WHERE entry_id = '".$_POST["violationEntryID"]."' LIMIT 1";
        $result = mysqli_query($conn, $query);
        while ($fetchRow = mysqli_fetch_array($result) ){
            echo json_encode($fetchRow);
        }
    }
?>