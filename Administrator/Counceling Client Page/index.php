<?php
    $title = 'Counceling Client';
    $page = 'ca_client';
    include_once('../includes/header.php');

    $id = $_SESSION['AdminID'];
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
`stat`,
`anonymity`,
`AdminFirstName` as a_firstName,
`AdminLastName` as a_lastName
FROM schedules
INNER JOIN clientaccountinfo ON schedules.client_id = clientaccountinfo.ClientAccountID
INNER JOIN adminaccountinfo ON schedules.remarks = adminaccountinfo.AdminAccountID 

WHERE `anonymity` = 'Yes' AND `stat` = 'Done' AND `remarks` = '$name'");

?>
    <div class="body_container">
        <div class="content">
            <div class="client_content">
                <div class="title">
                    <h1>Client Page</h1>
                    <hr>
                </div>

                <div class="searchBar">
                    <form action="">
                        <input type="text" placeholder="Search" class="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <div class="list_client">
                    <h3 class="list_title">Monitored Client</h3>
                    <table class="display_client">
                        <tr> 
                        <th class="client_title">Appointment ID</th>
                            <th class="client_title">Name</th>
                            <th class="client_title">Student Number</th>
                            <th class="client_title">Client Address</th>
                            <th class="client_title">Client Contact Number</th>
                            <th class="client_title">Guardian Name</th>
                            <th class="client_title">Guardian Contact Number</th>
                            <th class="client_title">Date of Appointment</th>
                            <th class="client_title">Monitored By:</th>
                            <th class="client_title">Status</th>
                        </tr>
                        <?php while($row = $sched->fetch_array()){
                            $c_nameFormat = $row['lastName'].', '.$row['firstName'].' '.$row['middleName'];
                            $studNum = $row['studNum'];
                            $address = $row['c_address'];
                            $contactNum = $row['c_contact_num'];
                            $guardianName = $row['guardian_name'];
                            $guardianNum = $row['guardian_num'];
                            $dateFormat = date("d/m/Y", strtotime($row['end_app']));
                            $status = $row['stat'];
                            $a_nameFormat = $row['a_lastName'].', '.$row['a_firstName'];
                            $id = $row['id'];
                            
                            ?>
                        <tr>
                        <td class="client_data"><?= $id ?></td>
                            <td class="client_data"><?= $c_nameFormat ?></td>
                            <td class="client_data"><?= $studNum ?></td>
                            <td class="client_data"><?= $address ?></td>
                            <td class="client_data"><?= $contactNum ?></td>
                            <td class="client_data"><?= $guardianName ?></td>
                            <td class="client_data"><?= $guardianNum ?></td>
                            <td class="client_data"><?= $dateFormat ?></td>
                            <td class="client_data"><?= $a_nameFormat ?></td>
                            <td class="client_data"><?= $status ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                
                <div class="list_client">
                    <h3 class="list_title">Monitored Client(Anonymous)</h3>
                    <table class="display_client">
                        <tr> 
                        <th class="client_title">Appointment ID</th>
                            <th class="client_title">Date of Appointment</th>
                            <th class="client_title">Monitored By:</th>
                            <th class="client_title">Status</th>
                        </tr>
                        <?php while($row = $query->fetch_array()){
                            
                            $dateFormat = date("d/m/Y", strtotime($row['end_app']));
                            $status = $row['stat'];
                            $a_nameFormat = $row['a_lastName'].', '.$row['a_firstName'];
                            $id = $row['id'];
                            
                            ?>
                        <tr>
                        <td class="client_data"><?= $id ?></td>
                            <td class="client_data"><?= $dateFormat ?></td>
                            <td class="client_data"><?= $a_nameFormat ?></td>
                            <td class="client_data"><?= $status ?></td>
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