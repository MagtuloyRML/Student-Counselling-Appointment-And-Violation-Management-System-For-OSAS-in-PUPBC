<?php
    $title = 'Cancel Appointment';
    $page = 'client_manage_appointment';
    include_once('../includes/header.php');

    $sched = $conn->query("SELECT * from schedules WHERE client_id = '$name' AND stat ='Pending' OR stat='Confirmed'");

    $id = $_SESSION['StudID'];
    $sql_fetch = mysqli_query($conn, "SELECT * from clientaccountinfo WHERE ClientAccountID = '$id'");
    $name = "";
    while($row = mysqli_fetch_assoc($sql_fetch))
    {
        $name = $row['ClientAccountID'];
    }
    include '../../assets/connection/dbconnection.php';

    $a_id = $_GET['a_id'];

    $sql_fetchdate = mysqli_query($conn, "SELECT app_date, start_app, end_app from schedules WHERE id = '$a_id'");
    while($rowget = mysqli_fetch_assoc($sql_fetchdate))
    {
        $app_date = $rowget['app_date'];
        $start_app = $rowget['start_app'];
        $nstart_app = date("g:i a", strtotime($start_app));
        $end_app = $rowget['end_app'];
        $nend_app = date("g:i a", strtotime($end_app));
    }

?>
    <form id="cancelAppoint" action="assets/cancel_sched_work.php" method ="POST" >
        <div class="content">
            <div class="profile">
                <a href="../Client Manage Appointment/" class="acc_bttn"><i class="fas fa-arrow-left"></i></a>
                <div class="title_content">
                    <h3>Cancellation of Schedule</h3>
                </div>

                <p class="text">Appointment Information: </p>

                <div class="date_group">
                     <div class="date_container">
                        <label for="#" class="datelabel">Apppointment Date: </label>
                        <div class="date " id="input_mid_name">
                            <input class="date-field" type="text" value="<?= $app_date ?>" name="mid_name" id="mid_name" readonly>
                        </div>
                    </div>
                    <div class="date_container">
                        <label for="#" class="datelabel">Apppointment Time: </label>
                        <div class="date " id="input_mid_name">
                            <input class="date-field" type="text" value="<?= $nstart_app.' - '.$nend_app ?>" name="mid_name" id="mid_name" readonly>
                        </div>
                    </div>
                </div>
                
                <div class="form_content">

                    <p class="text">Fill up the following to cancel your Schedule</p>
                            
                    <div class="input_container">
                        <label for="#" class="label">Cancellation Reason: </label>
                        <i class="fa-solid fa-asterisk"></i>
                        <i id="i_reason" class="fa-solid "></i>
                        <div class="input " id="input_fst_name">
                            <input class="input" type="hidden" id="id" name="id" value="<?= $a_id ?>">
                            <textarea class="input-field" placeholder="Reason to Cancel this Appointnment" name="reason" id="reason"></textarea>
                        </div>
                    </div>
                </div>

                <div class="action_content">
                    <a id="openCancelMSG" class="bttn"><i class="fa-solid fa-calendar-xmark"></i>  Submit Reason</a>
                </div>
                
            </div>
        </div>
        
        <?php
            include('assets/modal_cancelMSG.php')
        ?>
    </form>
    <script src="assets/js/main.js"></script>
    
</body>

</html>