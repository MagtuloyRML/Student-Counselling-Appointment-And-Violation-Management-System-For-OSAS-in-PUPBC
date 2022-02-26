
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
    <title>Forgot Password</title>
</head>
<body>
    <div class="body_content">
        <a class="back_bttn" href="../index.php"><i class="fas fa-arrow-left"></i></a>
        <div class="login_form">
            <div class="welcome_text">
                <img class="logo" src="assets/img/1200px-Polytechnic_University_of_the_Philippines_Biñan_Logo.svg.png" alt="PUPBC LOGO">
                <h2>Office of Student Affairs and Services Portal</h2>
                <p>Student Counseling Appointment and Violation Management System for OSAS
                </p>
                <br>
                <?php if (isset($_GET['error'])) { ?>
                                    <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php } ?>

                                <?php if (isset($_GET['success'])) { ?>
                                    <p class="success"><?php echo $_GET['success']; ?></p>
                                <?php } ?>
            </div>
            
            <form id="loginForm" action="assets/email_check.php" method="POST">
                <div class="input_group">
                    <div class="input_container " >
                        <div class="input " id="input_username">
                            <input class="input-field" type="text" required placeholder="Enter Email Address" name="email" id="email">
                            <i id="i_username" ></i>
                            <i class="fas fa-user-tie"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bttn_group">
                    <div class="login_bttn">
                        <button type="submit" name="submit" class="selection_bttn"><i class="fas fa-sign-in-alt"></i> Proceed</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
    
</body>
</html>