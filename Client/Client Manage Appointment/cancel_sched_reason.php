<?php 
 $title = 'Appointment Scheduling';
 $page = 'client_app_sched';
 include_once('../includes/header.php');

 $id = $_SESSION['StudID'];
    $sql_fetch = mysqli_query($conn, "SELECT * from clientaccountinfo WHERE ClientAccountID = '$id'");
    $name = "";
    while($row = mysqli_fetch_assoc($sql_fetch))
    {
        $name = $row['ClientAccountID'];
    }
    include '../../assets/connection/dbconnection.php';

    $a_id = $_GET['a_id'];
?>
 <div class="content">
        <div class="appoint_form">
            <div class="title_content">
                <h3>Cancellation of Schedule</h3>
            </div>
            <div class="content_appoint">
                <form action = "cancel_sched_work.php" method = "POST">
                    <div class="form_content">

                        <p>Fill up the following to cancel your Sched</p>
                        <div class="input_container">
                            <label class="label" for="#">Cancellation Reason: </label>
                            <br>
                            <input class="input" type="text" id="#" name="reason">
                            <input class="input" type="hidden" id="id" name="id" value="<?= $a_id ?>">
                        </div>
                        <div class="input_container">
                            <label class="label" for="#">Warning: If you cancel your appointment, you have to book another schedule again.</label>
                            <br>

                        </div>
                        
                        </div>
                     
                    </div>
                    <div class="form_action">
                        <button type="submit" name="submit" class="form_bttn">Submit Reason</button>
                        <a href="index.php">Exit</a>
                    </div>
                
                </form>
            </div>
            
        </div>
    </div>