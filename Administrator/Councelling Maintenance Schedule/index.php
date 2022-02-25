<?php
    $title = 'Maintenance Counceling Schedule';
    $page = 'maintenance';
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

?>
    <div class="body_container">
        <div class="content">
            <div class="title">
                <h1>Counceling Maintenance</h1>
                <hr>
            </div>
            <div class="subcontent">
                <?php
                    $sub_page = 'cmain_schedule';
                    include '../includes/cmain_sub_nav.php';
                ?>
                <div class="title">
                    <h1>Evaulator's Schedule</h1>
                    <hr>
                </div>
                <form id="evaulAvailSched" action ="assets/insertAvail_sched.php" method = "POST">
                    <?php            
                        $query = "SELECT * from avail_sched where meta_field = '$name'";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_assoc($result))
                        {
                    ?>

                    <h3>Available Time</h3>
                        
                    <div class="input_group">
                        <div class="input_container">
                        <input class="input" type="hidden" id="id" name="id" value="<?= $name ?>">
                            <label for="#" class="label">Start Time: </label>
                            <div class="input " id="input_fst_name">
                                <input class="input-field" type ="time" id = "start_time" name = "start_time" value="<?php echo $row['start_time'];?>">
                                <i id="i_fst_name" ></i>
                            </div>
                        </div>
                        <div class="input_container">
                            <label for="#" class="label">End Time: </label>
                            <div class="input " id="input_fst_name">
                                <input class="input-field" type ="time" id = "end_time" name = "end_time" value="<?php echo $row['end_time'];?>">
                                <i id="i_fst_name" ></i>
                            </div>
                        </div>
                        <div class="input_container">
                            <label for="#" class="label">Start Date: </label>
                            <div class="input " id="input_fst_name">
                                <input class="input-field" type ="date" id = "start_date" name = "start_date" value="<?php echo $row['start_date'];?>">
                                <i id="i_fst_name" ></i>
                            </div>
                        </div>
                        <div class="input_container">
                            <label for="#" class="label">End Date: </label>
                            <div class="input " id="input_fst_name">
                                <input class="input-field" type ="date" id = "end_date" name = "end_date" value="<?php echo $row['end_date'];?>">
                                <i id="i_fst_name" ></i>
                            </div>
                        </div>
                        <?php } ?>
                    </div> 
                    <div class="action_content">
                        <button class= "bttn" type="submit" name="submit" id="submit">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script src="assets/js/main.js"></script>

</body>
</html>