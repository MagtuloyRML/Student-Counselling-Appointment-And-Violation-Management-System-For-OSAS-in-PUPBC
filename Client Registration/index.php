<?php 
    include '../assets/connection/DBconnection.php';

    $result1 = mysqli_query($conn, "SELECT * from genderrole");
    $options = "";
    while($row2 = mysqli_fetch_array($result1))
    {
        $options = $options."<option value='$row2[0]'>$row2[1]</option>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!---icon--->
    <script src="https://kit.fontawesome.com/dcd5bb0e38.js" crossorigin="anonymous"></script> <!---icon--->

        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

    <link href="assets/css/reg_style.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Registration</title>
</head>
<body>
    <div class="select_container">
        <a class="back_bttn" href="../Client Login/"><i class="fas fa-arrow-left"></i></a>
        <div class="selection">
            <div class="reg_form">
            <?php if (isset($_GET['error'])) { ?>
                                    <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php } ?>

                                <?php if (isset($_GET['success'])) { ?>
                                    <p class="success"><?php echo $_GET['success']; ?></p>
                                <?php } ?>
                <div class="title">
                    <h1>Client Registration</h1>
                    <hr>
                </div>
        
                <form id="registration" action="assets/client_registration_process.php" method="POST">
                    <div class="input_group">
                        <div class="input_container">
                            <label for="#" class="label">First Name: </label>
                            <div class="input " id="input_fst_name">
                                <input class="input-field" type="text" placeholder="Ex: Juan" name="fst_name" id="fst_name">
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_fst_name" ></i>
                            </div>
                        </div>
                        <div class="input_container">
                            <label for="#" class="label">Middle Name: </label>
                            <div class="input " id="input_mid_name">
                                <input class="input-field" type="text" placeholder="Leave if None" name="mid_name" id="mid_name">
                                <i id="i_mid_name" ></i>
                            </div>
                        </div>
                        <div class="input_container">
                            <label for="#" class="label">Last Name: </label>
                            <div class="input " id="input_last_name">
                                <input class="input-field" type="text" placeholder="Ex: Dela Cruz" name="last_name" id="last_name">
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_last_name" ></i>
                            </div>
                        </div>
                        <div class="input_container">
                            <label for="#" class="label">Suffix Name: </label>
                            <div class="input " id="input_suf_name">
                                <input class="input-field" type="text" placeholder="Ex: Jr. (Leave if None)" name="suf_name" id="suf_name">
                                <i id="i_suf_name" ></i>
                            </div>
                        </div>

                        <div class="input_container">
                            <label for="#" class="label">Student No.: </label>
                            <div class="input " id="input_stud_num">
                                <input class="input-field" type="text" placeholder="Ex: 2010-00000-BN-0" name="stud_num" id="stud_num">
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_stud_num" ></i>
                            </div>
                        </div>
                        <div class="input_container">
                            <label for="#" class="label">Email: </label>
                            <div class="input " id="input_client_email">
                                <input class="input-field" type="text" placeholder="Ex: dcJuan@gmail.com" name="client_email" id="client_email">
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_client_email" ></i>
                            </div>
                        </div>
                        <div class="input_container">
                            <label for="#" class="label">Password: </label>
                            <div class="input " id="input_password">
                                <input class="input-field" type="password" placeholder="Password" name="password" id="password">
                                <i class="fas fa-eye" id="viewPass"></i>
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_password" ></i>
                            </div>
                        </div>
                        <div class="input_container">
                            <label for="#" class="label">Confirm Password: </label>
                            <div class="input " id="input_cpassword">
                                <input class="input-field" type="password" placeholder="Confirm Password" name="cpassword" id="cpassword">
                                <i class="fas fa-eye" id="viewCPass"></i>
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_cpassword" ></i>
                            </div>
                        </div>

                        <div class="input_container">
                            <label for="#" class="label">Birthdate: </label>
                            <div class="input " id="input_bday">
                                <input class="input-field" type="date" name="bday" id="bday">
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_bday" ></i>
                            </div>
                        </div>
                        
                        <div class="input_container">
                            <label for="#" class="label">Address: </label>
                            <div class="input " id="input_add">
                                <input class="input-field " type="" placeholder="Address" name="add" id="add">
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_add" ></i>
                            </div>
                            
                        </div>
                        <div class="input_container" >
                            <label for="#" class="label">Gender: </label>
                            <div class="input " id="input_gender">
                                <select class="input-field select" name="gender" id="gender">
                                    <option value = '' >Select Gender</option>
                                    <?php echo $options; ?>
                                </select>
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_gender" ></i>
                            </div>
                        </div>
                        
                        <div class="input_container">
                            <label for="#" class="label">Contact Number: </label>
                            <div class="input " id="input_client_contact">
                                <input class="input-field" type="text" placeholder="Ex: 09*********" name="client_contact" id="client_contact">
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_client_contact" ></i>
                            </div>
                            
                        </div>
                        
                        <div class="input_container">
                            <label for="#" class="label">Guardian: </label>
                            <div class="input " id="input_guar_name">
                                <input class="input-field" type="text" placeholder="Guardian's Name" name="guar_name" id="guar_name">
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_guar_name" ></i>
                            </div>
                        </div>
                        <div class="input_container">
                            <label for="#" class="label">Guardian Contact Number: </label>
                            <div class="input " id="input_guardian_contact">
                                <input class="input-field" type="text" placeholder="Ex: 09*********" name="guardian_contact" id="guardian_contact">
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_guardian_contact" ></i>
                            </div>
                        </div>
                        
                    </div>
                    <div class="bttn_group">
                        <div class="reg_bttn">
                            <button type="submit" name="submit" class="selection_bttn"><i class="fas fa-sign-in-alt"></i> Sign Up</button>
                        </div>
                    </div>
               </form>
            </div>
        </div>

    </div>
    <script src="assets/js/main.js"></script>
    
</body>
</html>