<?php
    $title = 'Counceling Approval Schedule';
    $page = 'ca_appoint_sched';
    include_once('../includes/header.php');
?>

    <div class="content">
        <div class="approv_content">
            <div class="title">
                <h1>Approval Schedule</h1>
                <hr>
            </div>
            <div class="list_approv">
            <form method ="POST">
                <h3 class="list_title">List</h3>
                <table class="display_approv">
                    <tr> 
                        <th class="approv_title">Appointment ID</th>
                        <th class="approv_title">Name</th>
                        <th class="approv_title">Appointment Date</th>
                        <th class="approv_title">Status</th>
                        <th class="approv_title">Actions</th>
                    </tr>
                    <?php
                    include '../../assets/connection/DBconnection.php';
                    $sched = $conn->query("SELECT id, title, start_app, end_app, stat FROM `schedules`
                    WHERE stat = 'Pending'");
						while($row = $sched->fetch_array()){
				    ?>
                    <tr>
                        <td class="approv_data"><?php echo $row['id']?></td>
                        <td class="approv_data"><?php echo $row['title']?></td>
                        <td class="approv_data"><?php 
                            $start = date("d/m/Y h:i A", strtotime($row['start_app']));
                            $end = date(" h:i A", strtotime($row['end_app']));
                            
                            $final = $start.' - '. $end;
                            echo $final;
                            
                            ?></td>
                        <td class="approv_data"><?php echo $row['stat'] ?></td>
                        <td class="approv_data"><a href="confirm_sched_work.php?a_id=<?php echo $row['id']; ?>"><i class="fas fa-thumbs-up"></i></a>
                        <a href="cancel_sched_work.php?a_id=<?php echo $row['id']; ?>"><i class="fas fa-times-circle"></i></a></td>
                    </tr>
                    <?php
									}
				?>
                </table>
                </form>
            </div>
        </div>
    </div>

</body>

</html>