<?php
    $title = 'Client Manage Appointment';
    $page = 'client_manage_appointment';
    include_once('../includes/header.php');

    $id = $_SESSION['StudID'];
    $sql_fetch = mysqli_query($conn, "SELECT * from clientaccountinfo WHERE ClientAccountID = '$id'");
    $name = "";
    while($row = mysqli_fetch_assoc($sql_fetch))
    {
        $name = $row['ClientAccountID'];
    }
    include '../../assets/connection/dbconnection.php';
    

    $sched = $conn->query("SELECT * from schedules WHERE client_id = '$name' AND stat ='Pending' OR stat='Confirmed'");

?>
    <div class="body_container">
        <div class="content">
            <div class="client_content">
                <div class="title">
                    <h1>Appointments Page</h1>
                    <hr>
                </div>

                <div class="list_client">
                    <h3 class="list_title">Your Appointments</h3>
                    <table class="display_client">
                        <tr> 
                        <th class="client_title">Appointment ID</th>
                            <th class="client_title">Date</th>
                            <th class="client_title">Status</th>
                            <th class="client_title"> </th>
                            
                        </tr>
                        <?php 
                            while ($row = mysqli_fetch_array($sched)){

                        ?>
                        <tr>
                        <td class="client_data"><?= $row['id']?></td>
                            <td class="client_data"><?= $row['start_app'] .' - '. $row['end_app']?></td>
                            <td class="client_data"><?= $row['stat']?></td>
                            <td class="client_data"><a href="cancel_sched_reason.php?a_id=<?php echo $row['id']; ?>"><i class="fas fa-times-circle"></i>Cancel</a></td>
                        </tr>
                        <?php }
                        ?>
                    </table>
                </div>

        </div>
    </div>
    <script src="assets/js/main.js"></script>
    
</body>

</html>