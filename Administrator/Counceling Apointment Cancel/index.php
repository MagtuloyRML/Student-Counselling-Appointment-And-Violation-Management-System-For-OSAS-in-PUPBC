<?php
    $title = 'Counceling Approval Schedule';
    $page = 'ca_appoint_sched_approve';
    include_once('../includes/header.php');

    $id = $_SESSION['AdminID'];
    $sql_fetchid = mysqli_query($conn, 
    "SELECT adminAccount.AdminFirstName, adminAccount.AdminUserRoleID, userRole.AdminPageStudentCounceling, 
    userRole.AdminPageViolation, userRole.AdminMaintenance, userRole.StatusID
    FROM adminaccountinfo AS adminAccount 
    INNER JOIN adminuserrole AS userRole 
    ON adminAccount.AdminUserRoleID = userRole.AdminUserRoleID WHERE adminAccount.AdminAccountID = '$id' ");
    
    while($row = mysqli_fetch_assoc($sql_fetchid))
    {
        $userRoleID = $row['AdminUserRoleID']; 
        $studCounceling = $row['AdminPageStudentCounceling']; $studViol = $row['AdminPageViolation']; 
        $systemMaintenance = $row['AdminMaintenance']; $roleStatus = $row['StatusID']; 
    }
    if ($studCounceling != '1'){
        header('Location: ../Page 404/');
    }
    
    $sql_fetch = mysqli_query($conn, "SELECT * from adminaccountinfo WHERE AdminAccountID = '$id'");
    $name = "";
    while($row = mysqli_fetch_assoc($sql_fetch))
    {
        $name = $row['AdminAccountID'];
    }
    $c_id = $_GET['id'];
    $a_id = $_GET['a_id'];
    $cancel_id = $_GET['client_id'];

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
    <form id="cancelAppoint" action="cancel_sched_work.php" method ="POST" >
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

                        <h4>Apppointment Information:</h4>

                        <p class="text">Cancel Appointment: </p>

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