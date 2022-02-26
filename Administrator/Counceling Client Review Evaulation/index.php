<?php
    $title = 'Counseling Review Evaulation';
    $page = ' ';
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
    $a_id = $_GET['a_id'];
    $query = $conn->query("SELECT 
    t1.id,
    t1.anonymity,
    t1.email_add,
    t1.stat,
    t1.app_date,
    t1.start_app,
    t1.end_app,
    t1.CounseZLink,
    t2.ClientAccountID as cID,
    t2.ClientStudentNo as studNum,
    t2.ClientFirstName as firstName,
    t2.ClientMiddleName as middleName,
    t2.ClientLastName as lastName,
    t3.Description as gender,
    t2.ClientAddress as client_address,
    t2.ClientBDay as birthdate,
    t2.ClientContactNo as contact_num
     from schedules as t1 
     INNER JOIN clientaccountinfo as t2 ON t1.client_id = t2.ClientAccountID
     INNER JOIN genderrole as t3 ON t2.ClientGenderID = t3.GenderID
     WHERE t1.id = '$a_id'");
    $row2 = mysqli_fetch_array($query);
    $appointmentID = $row2['id'];
    $anonymity = $row2['anonymity'];
    $cID = $row2['cID'];
    $contactnum = $row2['contact_num'];
    $app_date = $row2['app_date'];
    $start_app = $row2['start_app'];
    $nstart_app = date("g:i a", strtotime($start_app));
    $end_app = $row2['end_app'];
    $nend_app = date("g:i a", strtotime($end_app));
    $CounseZLink = $row2['CounseZLink'];

    if($anonymity != 'Yes'){
        $email_add = $row2['email_add'];
        $studNum = $row2['studNum'];
        $fname = $row2['firstName'].' '.$row2['middleName'].' '.$row2['lastName'];
        $gender = $row2['gender'];
        $address = $row2['client_address'];
        $birthday = $row2['birthdate'];
        

        $sql_fetchpic = mysqli_query($conn, "SELECT PictureFilename from clientprofilepictureinfo WHERE ClientAccountID = '$cID' AND UsedStatus = TRUE ");
        while($detailpic = mysqli_fetch_assoc($sql_fetchpic))
        {
            $directory = "../../assets/user_profile_pic/client/";
            $prof_pic = $detailpic['PictureFilename'];
        }
        $profile_pic = "<img class='prof_pic' id='prof_pic' src='$directory$studNum/$prof_pic' alt='Profile Pic'>";
    }
    elseif($anonymity == 'Yes'){
        $email_add = 'Unknown';
        $studNum = 'Unknown';
        $fname = "Anomynous$cID";
        $gender = 'Unknown';
        $address = 'Unknown';
        $birthday = 'Unknown';

        $profile_pic = "<img class='prof_pic' id='prof_pic' src='../../assets/user_profile_pic/default_user.jpg' alt='Profile Pic'>";
    }

    $sql_fetch44 = mysqli_query($conn, "SELECT * from forevaluation WHERE appointment_id = '$a_id'");
    while($row44 = mysqli_fetch_assoc($sql_fetch44))
    {
        $eval = $row44['evaluation']; $recom = $row44['recommendation'];
    }
    
?>
    <div class="body_container">
        <div class="content">
            <div class="title">
                <h1>System Maintenance</h1>
                <hr>
            </div>
            <div class="subcontent">
            <?php if (isset($_GET['error'])) { ?>
                                    <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php } ?>

                                <?php if (isset($_GET['success'])) { ?>
                                    <p class="success"><?php echo $_GET['success']; ?></p>
                                <?php } ?>
                    <h3 class="subtitle">Review Evaluation Form</h3>
                        <a href="../Administrator Profile/" class="acc_bttn"><i class="fas fa-arrow-left"></i></a>
                        <div class="profile_pic">
                            <div id="prof_pic_div">
                                <?php echo $profile_pic; ?>
                            </div>
                        </div>
                        <h4>Client Information:</h4>
                        <div class="input_group">
                            <div class="input_container">
                                <label for="#" class="label">Full Name: </label>
                                <div class="input " id="input_fst_name">
                                    <input class="input-field" type="text" value="<?= $fname ?>" name="fst_name" id="fst_name" readonly>
                                    <input class="input-field" type="hidden" value="<?= $appointmentID ?>" name="a_id" id="a_id" >
                                    <input class="input-field" type="hidden" value="<?= $name ?>" name="id" id="id" >
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Student Number: </label>
                                <div class="input " id="input_mid_name">
                                    <input class="input-field" type="text" value="<?= $studNum ?>" name="mid_name" id="mid_name" readonly>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Birtdate: </label>
                                <div class="input " id="input_mid_name">
                                    <input class="input-field" type="text" value="<?= $birthday ?>" name="mid_name" id="mid_name" readonly>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Gender: </label>
                                <div class="input " id="input_last_name">
                                    <input class="input-field" type="text" value="<?= $gender ?>" name="last_name" id="last_name" readonly>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Email: </label>
                                <div class="input " id="input_admin_email">
                                    <input class="input-field" type="text" value="<?= $email_add ?>" name="admin_email" id="admin_email" readonly>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Address: </label>
                                <div class="input " id="input_add">
                                    <input class="input-field " type="" value="<?= $address ?>" name="add" id="add" readonly>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Contact Number: </label>
                                <div class="input " id="input_admin_contact">
                                    <input class="input-field" type="text" value="<?= $contactnum ?>" name="admin_contact" id="admin_contact" readonly>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Anonymity: </label>
                                <div class="input " id="input_admin_contact">
                                    <input class="input-field" type="text" value="<?= $anonymity ?>" name="admin_contact" id="admin_contact" readonly>
                                </div>
                            </div>
                        </div>

                        <h4>Apppointment Information:</h4>
                        <div class="input_group">
                            <div class="input_container">
                                <label for="#" class="label">Apppointment Date: </label>
                                <div class="input " id="input_mid_name">
                                    <input class="input-field" type="text" value="<?php echo $app_date ?>" name="mid_name" id="mid_name" readonly>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Apppointment Time: </label>
                                <div class="input " id="input_mid_name">
                                    <input class="input-field" type="text" value="<?= $nstart_app.' - '.$nend_app ?>" name="mid_name" id="mid_name" readonly>
                                </div>
                            </div>
                            <div class="input_container link">
                                <label for="#" class="label">Zoom Link: </label>
                                <div class="input " id="input_mid_name">
                                    <input class="input-field" type="text" value="<?= $CounseZLink ?>" name="mid_name" id="mid_name" readonly>
                                </div>
                            </div>
                        </div>
                        
                    
                        <div class="input_group">
                            <div class="eval">
                                <label for="#" class="label">Evaluation: </label>
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_evaluation" class="fa-solid "></i>
                                <div class="input " id="input_fst_name">
                                    <textarea class="input-field evalInput" placeholder="Evaluation of this Apppointment" name="evaluation" id="evaluation" readonly><?= $eval ?></textarea>
                                </div>
                            </div>
                            <div class="eval">
                                <label for="#" class="label">Recommendation: </label>
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_recommendation" class="fa-solid "></i>
                                <div class="input " id="input_fst_name">
                                    <textarea class="input-field evalInput" placeholder="Recommendation of this Apppointment" name="recommendation" id="recommendation" readonly><?= $recom ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="action_content">
                            <a href="../Counceling Client Edit Evaulation/?a_id=<?php echo $appointmentID; ?>" class= "bttn" id="submit"> <i class="fa-solid fa-pen-to-square"></i> Edit Evaluation Form</a>
                        </div>                
                    
            </div>

        </div>
    </div>

    <script src="assets/js/main.js"></script>


</body>
</html>