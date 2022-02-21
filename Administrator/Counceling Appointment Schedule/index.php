<?php
    $title = 'Counceling Apointment Dashboard';
    $page = 'ca_appoint_sched_view';
    include_once('../includes/header.php');
    $id = $_SESSION['AdminID'];
    $sql_fetch = mysqli_query($conn, "SELECT * from adminaccountinfo WHERE AdminAccountID = '$id'");
    $name = "";
    while($row = mysqli_fetch_assoc($sql_fetch))
    {
        $name = $row['AdminAccountID'];
    }
?>
    <div class="body_container">
        <div class="content">
            <div class="approv_content">
                <div class="title">
                    <h1>Appointment</h1>
                    <hr>
                </div>
                <div class="subcontent">
                    <?php
                        $sub_page = 'schedule';
                        include '../includes/appoitment_sub_nav.php';
                    ?>
                    <div class="list_approv">
                        <h3 class="subtitle">Approved Appointment</h3>
                        <form method ="POST">
                    <h3 class="list_title">List</h3>
                    <table class="display_approv">
                        <tr> 
                            <th class="approv_title">Appointment ID</th>
                            <th class="approv_title">Title</th>
                            <th class="approv_title">Email Address</th>
                            <th class="approv_title">Appointment Date</th>
                            <th class="approv_title">Status</th>
                            <th class="approv_title">Confirmed By</th>
                        </tr>
                        <?php
                        include '../../assets/connection/DBconnection.php';
                        $sched = $conn->query("SELECT `id`,
                        `title`,         
                        `ClientEmailAdd` as email_add,
                        `stat`,
                        `start_app`,
                        `end_app`,
                        `AdminFirstName` as a_firstName,
                        `AdminLastName` as a_lastName
                        FROM schedules
                        INNER JOIN clientaccountinfo ON schedules.client_id = clientaccountinfo.ClientAccountID
                        INNER JOIN adminaccountinfo ON schedules.remarks = adminaccountinfo.AdminAccountID 
                            
                        WHERE `stat` = 'Confirmed' AND `remarks` = '$name'       
                        ");
                            while($row = $sched->fetch_array()){
                        ?>
                        <tr>
                            <td class="approv_data"><?php echo $row['id']?></td>
                            <td class="approv_data"><?php echo $row['title']?></td>
                            <td class="approv_data"><?php echo $row['email_add']?></td>
                            <td class="approv_data"><?php 
                                $start_date = date("d/m/Y h:i A", strtotime($row['start_app']));
                                
                                $end_time = date("h:i A", strtotime($row['end_app']));
                                
                                $final = $start_date.' - '. $end_time;
                                echo $final;
                                
                                ?></td>
                            <td class="approv_data"><?php echo $row['stat'] ?></td>
                            <td class="approv_data"><?php echo $row['a_lastName'].', '.$row['a_firstName'] ?></td>
                        </tr>
                        <?php
                                        }
                    ?>
                    </table>
                    </form>
                    </div>

                    <!-- Cancelled Appointments -->

                    <div class="list_approv">
                        <h3 class="subtitle">Cancelled Appointment</h3>
                        <form method ="POST">
                    <h3 class="list_title">List</h3>
                    <table class="display_approv">
                        <tr> 
                            <th class="approv_title">Appointment ID</th>
                            <th class="approv_title">Title</th>
                            <th class="approv_title">Email Address</th>
                            <th class="approv_title">Appointment Date</th>
                            <th class="approv_title">Status</th>
                            <th class="approv_title">Remarks</th>
                        </tr>
                        <?php
                        include '../../assets/connection/DBconnection.php';
                        $sched = $conn->query("SELECT `id`,
                        `title`,         
                        `ClientEmailAdd` as email_add,
                        `stat`,
                        `start_app`,
                        `end_app`,
                        `cancel_reason`,
                        `AdminFirstName` as a_firstName,
                        `AdminLastName` as a_lastName
                        FROM schedules
                        INNER JOIN clientaccountinfo ON schedules.client_id = clientaccountinfo.ClientAccountID
                        INNER JOIN adminaccountinfo ON schedules.remarks = adminaccountinfo.AdminAccountID 
                            
                        WHERE `stat` = 'Cancelled' AND `remarks` = '$name'       
                        ");
                            while($row = $sched->fetch_array()){
                        ?>
                        <tr>
                            <td class="approv_data"><?php echo $row['id']?></td>
                            <td class="approv_data"><?php echo $row['title']?></td>
                            <td class="approv_data"><?php echo $row['email_add']?></td>
                            <td class="approv_data"><?php 
                                $start_date = date("d/m/Y h:i A", strtotime($row['start_app']));
                                
                                $end_time = date("h:i A", strtotime($row['end_app']));
                                
                                $final = $start_date.' - '. $end_time;
                                echo $final; ?>
                                </td>
                            <td class="approv_data"><?php echo $row['stat'] ?></td>
                            <td class="approv_data"><?php echo $row['cancel_reason'] ?></td>
                        </tr>
                        <?php
                                        }
                    ?>
                    </table>
                    </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
    

    <script src="assets/js/main.js"></script>
    
    
</body>

</html>