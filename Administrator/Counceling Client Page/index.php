<?php
    $title = 'Counseling Client';
    $page = 'ca_client';
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
    include '../../assets/connection/dbconnection.php';
    

    $sched = $conn->query("SELECT 
    `id`,
    `ClientFirstName` as firstName,
    `ClientMiddleName` as middleName,
    `ClientLastName` as lastName,
    `ClientStudentNo` as studNum,
    `ClientAddress` as c_address,
    `ClientContactNo` as c_contact_num,
    `ClientGuardian` as guardian_name,
    `ClientGuardianNo` as guardian_num,
    `end_app`,
    `app_date`,
    `start_app`,
    `stat`,
    `anonymity`,
    `AdminFirstName` as a_firstName,
    `AdminLastName` as a_lastName
    FROM schedules
    INNER JOIN clientaccountinfo ON schedules.client_id = clientaccountinfo.ClientAccountID
    INNER JOIN adminaccountinfo ON schedules.remarks = adminaccountinfo.AdminAccountID 
    
    WHERE `anonymity` = 'No' AND `stat` = 'Done' AND `remarks` = '$name'");

    $query = $conn->query("SELECT 
    `id`,
    `ClientFirstName` as firstName,
    `ClientMiddleName` as middleName,
    `ClientLastName` as lastName,
    `ClientStudentNo` as studNum,
    `ClientAddress` as c_address,
    `ClientContactNo` as c_contact_num,
    `ClientGuardian` as guardian_name,
    `ClientGuardianNo` as guardian_num,
    `end_app`,
    `app_date`,
    `start_app`,
    `stat`,
    `anonymity`,
    `AdminFirstName` as a_firstName,
    `AdminLastName` as a_lastName
    FROM schedules
    INNER JOIN clientaccountinfo ON schedules.client_id = clientaccountinfo.ClientAccountID
    INNER JOIN adminaccountinfo ON schedules.remarks = adminaccountinfo.AdminAccountID 

    WHERE `anonymity` = 'Yes' AND `stat` = 'Done' AND `remarks` = '$name'");
    
    if(isset($_POST['submit'])){
        $searched = $_POST['search'];

        $sched = $conn->query("SELECT 
        `id`,
        `ClientFirstName` as firstName,
        `ClientMiddleName` as middleName,
        `ClientLastName` as lastName,
        `ClientStudentNo` as studNum,
        `ClientAddress` as c_address,
        `ClientContactNo` as c_contact_num,
        `ClientGuardian` as guardian_name,
        `ClientGuardianNo` as guardian_num,
        `end_app`,
        `app_date`,
        `start_app`,
        `stat`,
        `client_id`,
        `anonymity`,
        `AdminFirstName` as a_firstName,
        `AdminLastName` as a_lastName
        FROM schedules
        INNER JOIN clientaccountinfo ON schedules.client_id = clientaccountinfo.ClientAccountID
        INNER JOIN adminaccountinfo ON schedules.remarks = adminaccountinfo.AdminAccountID 
        
        WHERE `stat` = 'Done' AND `anonymity` = 'No' AND `remarks` = '$name'
        AND ClientStudentNo = '$searched'");

        $query = $conn->query("SELECT 
        `id`,
        `ClientFirstName` as firstName,
        `ClientMiddleName` as middleName,
        `ClientLastName` as lastName,
        `ClientStudentNo` as studNum,
        `ClientAddress` as c_address,
        `ClientContactNo` as c_contact_num,
        `ClientGuardian` as guardian_name,
        `ClientGuardianNo` as guardian_num,
        `end_app`,
        `app_date`,
        `start_app`,
        `stat`,
        `anonymity`,
        `AdminFirstName` as a_firstName,
        `AdminLastName` as a_lastName
        FROM schedules
        INNER JOIN clientaccountinfo ON schedules.client_id = clientaccountinfo.ClientAccountID
        INNER JOIN adminaccountinfo ON schedules.remarks = adminaccountinfo.AdminAccountID 

        WHERE `anonymity` = 'Yes' AND `stat` = 'Done' AND `remarks` = '$name'");
    }

?>
    <div class="body_container">
        <div class="content">
            <div class="client_content">
                <div class="title">
                    <h1>Client Page</h1>
                    <hr>
                    
                </div>
                <p>This is the list of all the appointments that you still haven't evaluated.</p>
                <div class="searchBar">
                    <form action="" method="POST">
                        <input type="text" placeholder="Enter Student Number" class="search" name="search">
                        <button type="submit" name="submit" id="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <div class="list_client">
                    <h3 class="list_title">Previous Clients</h3>
                    <table class="display_client">
                        <tr> 
                            <th class="client_title" style="width: 10%;">Appointment ID</th>
                            <th class="client_title" style="width: 12%;">Name</th>
                            <th class="client_title" style="width: 12%;">Student Number</th>
                            <th class="client_title" style="width: 12%;">Date of Appointment</th>
                            <th class="client_title" style="width: 8%;">Status</th>
                            <th class="client_title" style="width: 10%;"></th>
                        </tr>
                        <?php while($row = $sched->fetch_array()){
                            $c_nameFormat = $row['lastName'].', '.$row['firstName'].' '.$row['middleName'];
                            $studNum = $row['studNum'];
                            $address = $row['c_address'];
                            $contactNum = $row['c_contact_num'];
                            $guardianName = $row['guardian_name'];
                            $guardianNum = $row['guardian_num'];
                            $app_date = $row['app_date'];
                            $start_app = $row['start_app'];
                            $nstart_app = date("g:i a", strtotime($start_app));
                            $end_app = $row['end_app'];
                            $nend_app = date("g:i a", strtotime($end_app));
                            $status = $row['stat'];
                            $a_nameFormat = $row['a_lastName'].', '.$row['a_firstName'];
                            $id = $row['id'];
                            
                            ?>
                        <tr>
                            <td class="client_data"><?= $id ?></td>
                            <td class="client_data"><?= $c_nameFormat ?></td>
                            <td class="client_data"><?= $studNum ?></td>
                            <td class="client_data"><?= $app_date.' '.$nstart_app.' - '.$nend_app  ?></td>
                            <td class="client_data"><?= $status ?></td>
                            <td class="client_data"><a href="../Counceling Client Evaulation Form/index.php?a_id=<?php echo $row['id']; ?>" class="bttn_table"><i class="fas fa-thumbs-up"></i>Evaluate</a></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                
                <div class="list_client">
                    <h3 class="list_title">Previous Clients(Anonymous)</h3>
                    <table class="display_client">
                        <tr> 
                            <th class="client_title"style="width: 10%;">Appointment ID</th>
                            <th class="client_title" style="width: 12%;">Name</th>
                            <th class="client_title" style="width: 12%;">Student Number</th>
                            <th class="client_title" style="width: 12%;">Date of Appointment</th>
                            <th class="client_title" style="width: 8%;">Status</th>
                            <th class="client_title" style="width: 10%;"></th>
                        </tr>
                        <?php while($row = $query->fetch_array()){
                            
                            $app_date = $row['app_date'];
                            $start_app = $row['start_app'];
                            $nstart_app = date("g:i a", strtotime($start_app));
                            $end_app = $row['end_app'];
                            $nend_app = date("g:i a", strtotime($end_app));
                            $status = $row['stat'];
                            $a_nameFormat = $row['a_lastName'].', '.$row['a_firstName'];
                            $id = $row['id'];
                            
                            ?>
                        <tr>
                            <td class="client_data"><?= $id ?></td>
                            <td class="client_data">None</td>
                            <td class="client_data">None</td>
                            <td class="client_data"><?= $app_date.' '.$nstart_app.' - '.$nend_app  ?></td>
                            <td class="client_data"><?= $status ?></td>
                            <td class="client_data"><a href="../Counceling Client Evaulation Form/index.php?a_id=<?php echo $row['id']; ?>" class="bttn_table"><i class="fas fa-thumbs-up"></i>Evaluate</a></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>

            </div>

        </div>
    </div>
    <script src="assets/js/main.js"></script>
    
</body>

</html>