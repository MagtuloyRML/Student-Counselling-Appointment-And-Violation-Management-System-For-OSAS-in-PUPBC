<?php
    session_start();
    if(isset($_SESSION['Page'])){
        if( ($_SESSION['Page'] == 'Client') && isset($_SESSION['StudID'])){
            header('location: Client/Client Home/');
        }
        elseif(($_SESSION['Page'] == 'Admin') && isset($_SESSION['AdminID'])){
            header('location: Administrator/Counceling Dashboard/');
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!---icon--->
    <script src="https://kit.fontawesome.com/dcd5bb0e38.js" crossorigin="anonymous"></script> <!---icon--->

    <link href="assets/css/selector_style.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUPBC Website</title>
</head>
<body>
    <div class="body">
        <div class="select_container">
            <div class="selection">
                <div class="welcome_text">
                    <img class="logo" src="assets/img/1200px-Polytechnic_University_of_the_Philippines_Biñan_Logo.svg.png" alt="PUPBC LOGO">
                    <h2>Office of Student Affairs and Services Portal</h2>
                    <p>Student Counseling Appointment and Violation Management System for OSAS
                    </p>
                </div>
                <div class="bttn_group">
                    <div class="select_bttn">
                        <button onclick="window.location.href='Client Login/'" class="selection_bttn"><i class="fas fa-user-graduate"></i> Client</button>
                    </div>
                    <div class="select_bttn">
                        <button onclick="window.location.href='Administrator Login/'" class="selection_bttn"><i class="fas fa-user-tie"></i> Administrator</button>
                    </div>
                </div>
                

            </div>

        </div>

    </div>
    
    
</body>
</html>
