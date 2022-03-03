<?php
    session_start();

    unset($_SESSION['StudID']);
    unset($_SESSION['AdminID']);
    unset($_SESSION['Page']);

    session_destroy();


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
    <title>Administrator Login</title>
</head>
<body>
    <div class="body_content">

        <div class="login_form">
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
                <p class="Text">Your Account is Unavailable right now, Please go back in Administrator Login Page</p>

                <div class="p_register">
                    <a href="../Administrator Login/">Go to Admin Login Page</a>
                </div>
                
                
           

        </div>

    </div>
    <script src="assets/js/main.js"></script>
</body>
</html>