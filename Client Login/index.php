<?php
    session_start();
    if(isset($_SESSION['Page'])){
        if( ($_SESSION['Page'] == 'Client') && isset($_SESSION['StudID'])){
            header('location: ../Client/Client Home/');
        }
        elseif(($_SESSION['Page'] == 'Admin') && isset($_SESSION['AdminID'])){
            header('location: ../Administrator/Counceling Dashboard/');
        }
        
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

    <link href="assets/css/login_style.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Login</title>
</head>
<body>
    <div class="body">
        <div class="select_container">
            <div class="selection">
                <a class="back_bttn" href="../index.php"><i class="fas fa-arrow-left"></i></a>
                <div class="welcome_text">
                    <img class="logo" src="assets/img/1200px-Polytechnic_University_of_the_Philippines_Biñan_Logo.svg.png" alt="PUPBC LOGO">
                    <h2>Office of Student Affairs and Services Portal</h2>
                    <p>Student Counseling Appointment and Violation Management System for OSAS
                    </p>
                </div>

                <div class="error">
                    <div class="error_msg" id="error_message">
                        <li id="error_username"></li>
                        <li id="error_pass"></li>
                        <li id="error_acc"></li>
                    </div>
                </div>
                
                <form id="loginForm" action="assets/client_login_work.php" method="POST" autocomplete="off">
                    <div class="input_group">
                        <div class="input_container " >
                            <div class="input " id="input_stud_num">
                                <input class="input-field" type="text" placeholder="Student Number  Ex: 2010-00000-BN-0" name="stud_num" id="stud_num">
                                <i id="i_stud_num" ></i>
                                <i class="fas fa-user-tie"></i>
                            </div>
                        </div>
                        

                        <div class="input_container " >
                            <div class="input " id="input_password">
                                <input class="input-field" type="password" placeholder="Password" name="password" id="password">
                                <i class="fas fa-eye" id="viewPass"></i>
                                <i id="i_password" ></i>
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="bttn_group">
                        <div class="login_bttn">
                            <button type="submit" name="submit" class="selection_bttn"><i class="fas fa-sign-in-alt"></i> Login</button>
                        </div>
                        <div class="p_register">
                            <a href="../Client Forgot Password/">Forgot your Password?</a>
                        </div>
                    </div>
                    <div class="p_register">
                        <p>Do you want to make an Account?</p> <a href="../Client Registration/"> Sign up here</a>
                    </div>
                </form>
                
                

            </div>

        </div>

    </div>
    
    <script src="assets/js/main.js"></script>
    
</body>
</html>
