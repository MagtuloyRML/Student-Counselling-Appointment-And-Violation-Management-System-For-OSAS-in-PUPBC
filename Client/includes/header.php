<?php 
    session_start();
    if( !isset($_SESSION['Page']) && !isset($_SESSION['StudID'])){
        header('location: ../../index.php');
        unset($_SESSION['StudID']);
        die();
    }
    elseif(($_SESSION['Page'] == 'Admin') && isset($_SESSION['AdminID'])){
        header('location: ../Administrator/Counceling Dashboard/');
        unset($_SESSION['StudID']);
        die();
    }
    include '../../assets/connection/DBconnection.php';

    $id = $_SESSION['StudID'];

    $sql_fetch = mysqli_query($conn, "SELECT ClientFirstName, ClientMiddleName, ClientLastName, ClientSuffix, ClientStudentNo
     from clientaccountinfo WHERE ClientAccountID = '$id'");
    $name = "";
    while($row = mysqli_fetch_assoc($sql_fetch))
    {
        $name = $row['ClientFirstName'];
        $fname = $row['ClientFirstName']; $mname = $row['ClientMiddleName']; 
        $lname = $row['ClientLastName']; $sname = $row['ClientSuffix'];
        $stud_ID = $row['ClientStudentNo'];
    }

    $sql_fetchpic = mysqli_query($conn, "SELECT PictureFilename from clientprofilepictureinfo WHERE ClientAccountID = '$id' AND UsedStatus = TRUE ");
    while($detailpic = mysqli_fetch_assoc($sql_fetchpic))
    {
        $prof_pic = $detailpic['PictureFilename'];
    }
    $directory = "../../assets/user_profile_pic/client/";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!---icon--->
    <script src="https://kit.fontawesome.com/dcd5bb0e38.js" crossorigin="anonymous"></script> <!---icon--->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">

    <link href="../includes/css/stud_nav_bar.css" rel="stylesheet">
    <script src="../includes/js/acc_dropdown_notif_dropdown.js" defer></script>
    <script src="../includes/js/notif_client.js" defer></script>
    <link href="../includes/css/modal_placement.css" rel="stylesheet">
    <link href="../includes/css/modal_upload_placement.css" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="X-UA-Compatible" content="id=edge">

    <title><?php echo $title?></title>
</head>

<body>
    <div class="loader" scroll="no">
        <div></div>
    </div>

    <div id="blur">
        <div class="sideBar_mobile" id="sideBar_mobile">
            <div class="sb_bttn" id="close_side">
                <i class="fa-solid fa-xmark"></i>
            </div>

            <div class="prf_content">
                <a class="profile_bttn" href="../Client Profile/">
                    <div class="pic" id="profile_bttn">
                        <img class="prof_pic" id="prof_pic" src="<?php echo $directory, $stud_ID,'/', $prof_pic?>" alt="Profile Pic">
                    </div>
                    <div class="side_Text">
                        <p class="sideName"><?php echo $lname, ', ', $fname; ?></p>
                        <p class="sideName"><?php echo $stud_ID; ?></p>

                        <p class="pview">View Profile</p>
                    </div>
                </a>    
            </div>
            
            
            <div class="sbMobile_menu">
                <div class="sb_div">
                    <a href="../Client Home/" class="sb_Link <?php if ($page == 'client_home'){ echo 'sideActive';}?>"><i class="fa-solid fa-house-chimney"></i> Home</a>
                </div>
                <div class="sb_div">
                    <a href="../Client Appointment Scheduling/" class="sb_Link <?php if ($page == 'client_app_sched'){ echo 'sideActive';}?>"><i class="fas fa-calendar-check"></i> Book Appointment</a>
                </div>
                <div class="sb_div">
                    <a href="../Client Manage Appointment/" class="sb_Link <?php if ($page == 'client_manage_appointment'){ echo 'sideActive';}?>"><i class="fa-solid fa-calendar-days"></i> Manage Schedule</a>
                </div>
            </div>

            <div class="side_down_bttn">
                <div class="sb_div">
                    <a href="../includes/logout.php" class="downBttn"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                </div>
            </div>
        </div>

    </div>

    

    <div class="page">
        <div class="navi-bar">
            <div class="sideBar_bttn">
                <button class="sb_bttnOpen" id="open_side">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>

            <div class="topmenu">
                <a class="link<?php if ($page == 'client_home'){ echo '_active';}?>" href="../Client Home/">Home</a>
                <a class="link<?php if ($page == 'client_app_sched'){ echo '_active';}?>" href="../Client Appointment Scheduling/">Appoint</a>
            </div>
            
            <div class="menu">
                <!--- Notifcation drop down content-->
                <div class="dropdown1" notif-dropdown>
                    <button class="btndrop_notif" id="notif_bell" notif-dropdown-bttn><i class="fas fa-bell" notif-dropdown-bttn></i><span id="notifCount"></span></button>
                    <div class="notif_content">
                        <!---Content for Notif--->
                        <p><i class="fas fa-bell"></i> Notification</p>
                        <hr class="notif-line">
                        <div class="notif-content" id="notif_content">
                            
                        </div>
                        <div class="notif-content">
                            <a href="../Client Notification/" class="notif_bttn">See More</a>
                        </div>
                    </div>
                </div>
                <!---- Acount Drop down menu-->
                <div class="dropdown" user-dropdown-menu>
                    <button class="btndrop_user" user-dropdown-menu-bttn><i class="fas fa-user-circle icon" user-dropdown-menu-bttn></i></button>
                    <div class="user_menu">
                        <ul></ul>
                            <a href="../Client Profile/" class="bttn<?php if ($page == 'client_profile' || $page == 'client_edit_profile'){ echo '_active';}?>"><i class="fa fa-user icon"></i><?php echo $name ?></a>
                            <a href="../Client Manage Appointment/" class="bttn<?php if ($page == 'client_manage_appointment'){ echo '_active';}?>"><i class="fas fa-calendar-alt"></i>Manage Sched</a>
                            <a href="../includes/logout.php" class="bttn<?php if ($page == ''){ echo '_active';}?>"><i class="fas fa-sign-out-alt"></i>Log out</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
