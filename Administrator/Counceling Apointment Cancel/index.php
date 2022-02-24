<?php
    $title = 'Counceling Approval Schedule';
    $page = 'ca_appoint_sched_approve';
    include_once('../includes/header.php');

    $id = $_SESSION['AdminID'];
    $sql_fetch = mysqli_query($conn, "SELECT * from adminaccountinfo WHERE AdminAccountID = '$id'");
    $name = "";
    while($row = mysqli_fetch_assoc($sql_fetch))
    {
        $name = $row['AdminAccountID'];
    }
    $c_id = $_GET['id'];
    $a_id = $_GET['a_id'];
    $cancel_id = $_GET['client_id'];
?>
    <form id="cancelAppoint" method ="POST" >
        <div class="body_container">
            <div class="content">
                <div class="approv_content">
                    <div class="title">
                        <h1>Appointment</h1>
                        <hr>
                    </div>
                    <div class="subcontent">
                        <?php
                            $sub_page = 'approval_app';
                            include '../includes/appoitment_sub_nav.php';
                        ?>
                        <a href="../Counceling Apointment Approval/" class="acc_bttn"><i class="fas fa-arrow-left"></i></a>
                        <div class="form_content">
                            <p class="text head">Cancel Appointment: </p>
                            <p class="text">Fill up the following to cancel your Schedule</p>
                            <div class="input_container">
                                <label for="#" class="label">Cancellation Reason: </label>
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_reason" class="fa-solid "></i>
                                <div class="input " id="input_fst_name">
                                    <input type="hidden" class="input_field" id="id" name="id" value ="<?= $c_id ?>">
                                    <input type="hidden" class="input_field" id="a_id" name="a_id" value ="<?= $a_id ?>">
                                    <input type="hidden" class="input_field" id="client_id" name="client_id" value ="<?= $cancel_id ?>">
                                    <textarea class="input-field" placeholder="Reason to Cancel this Appointnment" name="cancel_reason" id="cancel_reason"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="action_content">
                            <a id="openCancelMSG" class="bttn"><i class="fa-solid fa-calendar-xmark"></i>  Submit Reason</a>
                        </div>

                    </div>
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