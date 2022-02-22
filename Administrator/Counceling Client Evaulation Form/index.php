<?php
    $title = 'Evaulation Form';
    $page = 'maintenance';
    include_once('../includes/header.php');
    
    $id = $_SESSION['AdminID'];
    $sql_fetch = mysqli_query($conn, "SELECT * from adminaccountinfo WHERE AdminAccountID = '$id'");
    $name = "";
    while($row = mysqli_fetch_assoc($sql_fetch))
    {
        $name = $row['AdminAccountID'];
    }
    $a_id = $_GET['a_id'];
    $query = $conn->query("SELECT 
    t1.id,
    t1.email_add,
    t1.stat,
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
    $email_add = $row2['email_add'];
    $fname = $row2['firstName'].' '.$row2['middleName'].' '.$row2['lastName'];
    $gender = $row2['gender'];
    $address = $row2['client_address'];
    $birthday = $row2['birthdate'];
    $contactnum = $row2['contact_num'];
    

    
    
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
                <form method ="POST" action="assets/insert_eval.php">
                <h3 class="subtitle">Evaluation Form</h3>
                        <div class="profile_pic">
                            <div id="prof_pic_div">
                                <img class="prof_pic" id="prof_pic" src="../../assets/user_profile_pic/default_user.jpg" alt="Profile Pic">
                            </div>
                        </div>
                        <h4>Client Information:</h4>
                        <div class="input_group">
                            <div class="input_container">
                                <label for="#" class="label">Full Name: </label>
                                <div class="input " id="input_fst_name">
                                    <input class="input-field" type="text" placeholder="<?= $fname ?>" name="fst_name" id="fst_name" readonly>
                                    <input class="input-field" type="hidden" value="<?= $appointmentID ?>" name="a_id" id="a_id" readonly>
                                    <input class="input-field" type="hidden" value="<?= $name ?>" name="id" id="id" readonly>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Birtdate: </label>
                                <div class="input " id="input_mid_name">
                                    <input class="input-field" type="text" placeholder="<?= $birthday ?>" name="mid_name" id="mid_name" readonly>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Gender: </label>
                                <div class="input " id="input_last_name">
                                    <input class="input-field" type="text" placeholder="<?= $gender ?>" name="last_name" id="last_name" readonly>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Email: </label>
                                <div class="input " id="input_admin_email">
                                    <input class="input-field" type="text" placeholder="<?= $email_add ?>" name="admin_email" id="admin_email" readonly>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Address: </label>
                                <div class="input " id="input_add">
                                    <input class="input-field " type="" placeholder="<?= $address ?>" name="add" id="add" readonly>
                                </div>
                                
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Contact Number: </label>
                                <div class="input " id="input_admin_contact">
                                    <input class="input-field" type="text" placeholder="<?= $contactnum ?>" name="admin_contact" id="admin_contact" readonly>
                                </div>
                            </div>
                        </div>
                    <form id="evaluate"  method = "POST">
                        <div class="input_group">
                            <div class="input_container eval">
                                <label for="#" class="label">Evaluation: </label>
                                <div class="input " id="input_fname">
                                    <input type="text" class="input-field" name="evaluation" id="evaluation" >
                                    <i class="fa-solid fa-asterisk"></i>
                                    <i id="i_gender" class="fa-solid "></i>
                                </div>
                            </div>
                            <div class="input_container eval">
                                <label for="#" class="label">Recommendation: </label>
                                <div class="input " id="input_fname">
                                    <input type="text" class="input-field" name="recommendation" id="recommendation" >
                                    <i class="fa-solid fa-asterisk"></i>
                                    <i id="i_gender" class="fa-solid "></i>
                                </div>
                            </div>
                        </div>                 
                        <div class="action_content">
                            <button class= "bttn" type="submit" name="submit" id="submit">
                            <i class="fa-solid fa-address-card"></i>  Sumbit Form</button>
                        </div>
                    </form>
                
                
            </div>

        </div>
    </div>


</body>
</html>