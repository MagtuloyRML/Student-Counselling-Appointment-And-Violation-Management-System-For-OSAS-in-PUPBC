<?php 
    session_start();
    if( !($_SESSION['Page'] == '') && !isset($_SESSION['AdminID'])){
        header('location: ../../index.php');
        unset($_SESSION['AdminID']);
        die();
    }
    elseif ( ($_SESSION['Page'] == 'Client') && isset($_SESSION['StudID'])){
        header('location: ../../Client/Client Home/');
        unset($_SESSION['AdminID']);
        die();
    }

    include '../../assets/connection/DBconnection.php';

    $id = $_SESSION['AdminID'];

    //$sql_fetch = mysqli_query($conn, "SELECT AdminFirstName, AdminUserRoleID from adminaccountinfo WHERE AdminAccountID = '$id'");
    $sql_fetch = mysqli_query($conn, 
    "SELECT adminAccount.AdminFirstName, adminAccount.AdminUserRoleID, userRole.AdminPageStudentCounceling, 
    userRole.AdminPageViolation, userRole.AdminMaintenance, userRole.StatusID
    FROM adminaccountinfo AS adminAccount 
    INNER JOIN adminuserrole AS userRole 
    ON adminAccount.AdminUserRoleID = userRole.AdminUserRoleID WHERE adminAccount.AdminAccountID = '$id' ");
    $name = "";
    $userRole = "";
    while($row = mysqli_fetch_assoc($sql_fetch))
    {
        $name = $row['AdminFirstName']; $userRoleID = $row['AdminUserRoleID']; 
        $studCounceling = $row['AdminPageStudentCounceling']; $studViol = $row['AdminPageViolation']; 
        $systemMaintenance = $row['AdminMaintenance']; $roleStatus = $row['StatusID']; 
    }

    $sql_fetch = mysqli_query($conn, "SELECT AdminFirstName, AdminMiddleName, AdminLastName, AdminSufifx,
     AdminContactNo, AdminEmailAdd, AdminAddress from adminaccountinfo WHERE AdminAccountID = '$id'");
    while($details = mysqli_fetch_assoc($sql_fetch))
    {
        $fname = $details['AdminFirstName']; $mname = $details['AdminMiddleName']; $lname = $details['AdminLastName']; $sname = $details['AdminSufifx'];
        $aAdd = $details['AdminAddress']; $aNo = $details['AdminContactNo']; $aEmail = $details['AdminEmailAdd']; 
    }

    $sql_fetchpic = mysqli_query($conn, "SELECT PictureFilename from adminprofilepictureinfo WHERE AdminAccountID = '$id' AND UsedStatus = TRUE ");
    while($detailpic = mysqli_fetch_assoc($sql_fetchpic))
    {
        $prof_pic = $detailpic['PictureFilename'];
    }
    $directory = "../../assets/user_profile_pic/admin/";
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" 
    integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
     crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">

    <link href="../includes/css/side_nav.css" rel="stylesheet">
    <script src="../includes/js/acc_dropdown_notif_dropdown.js" defer></script>
    <script src="../includes/js/notif_admin.js" defer></script>
    <link href="../includes/css/admin_navbar.css" rel="stylesheet">
    <script src="../includes/js/side_navi.js" defer></script>
    <link href="../includes/css/maintenance.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="../includes/css/modal_placement.css">

    <link rel="stylesheet" href="../includes/css/modal_upload_placement.css">

    <?php if ($page == 'ca_appoint_sched'){ echo '<link rel="stylesheet" href="assets/css/calendar.css">';}?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title?></title>
</head>
<body id="body-pd" <?php if ($page == 'v_home'||$page == 'ca_home' ){ echo 'onload="initClock()"';}?>>
    <div class="loader" scroll="no">
        <div></div>
    </div>

    <div id="blur">
        <div class="sideBar_mobile" id="sideBar_mobile">
            <div class="sb_bttn" id="close_side">
                <i class="fa-solid fa-xmark"></i>
            </div>

            <div class="prf_content">
                <a class="profile_bttn" href="../Administrator Profile/">
                    <div class="pic" id="profile_bttn">
                        <img class="prof_pic" id="prof_pic" src="<?php echo $directory,'pbcscvs',$id,'/', $prof_pic?>" alt="Profile Pic">
                    </div>
                    <div class="side_Text">
                        <p class="sideName"><?php echo $lname, ', ', $fname; ?></p>

                        <p class="pview">View Profile</p>
                    </div>
                </a>    
            </div>
            
            <?php if ($studCounceling == '1'){ echo '  <h3 class="title_text"><i class="fa-solid fa-hospital-user"></i> Counseling</h3>
            <div class="sbMobile_menu">
                <div class="sb_div">
                    <a href="../Counceling Dashboard/" id="sidecdash" class="sb_Link "><i class="fa-solid fa-chart-line"></i> DashBoard</a>
                </div>
                <div class="sb_div">
                    <a href="../Counceling Appointment Dashboard/" id="sidecappoint" class="sb_Link "><i class="fa-solid fa-calendar-days"></i> Appointment</a>
                </div>
                <div class="sb_div">
                    <a href="../Counceling Client Page/" id="sidecClient" class="sb_Link "><i class="fa-solid fa-users"></i> Client</a>
                </div>
            </div>
            ';}?>

            <?php if ($studViol == '1'){ echo '  <h3 class="title_text"><i class="fa-solid fa-house-chimney-user"></i> Violation</h3>
            <div class="sbMobile_menu">
                <div class="sb_div">
                    <a href="../Violation Dashboard/" id="sidevdash" class="sb_Link "><i class="fa-solid fa-chart-line"></i> Dashboard</a>
                </div>
                <div class="sb_div">
                    <a href="../Violation Entry/" id="sidevEntry" class="sb_Link "><i class="fa-solid fa-bullhorn"></i> Violation Entry</a>
                </div>
                <div class="sb_div">
                    <a href="../Violation Records/" id="sidevRec" class="sb_Link "><i class="fa-solid fa-address-card"></i> Records</a>
                </div>
            </div>
            ';}?>

            <h3 class="title_text"><i class="fa-solid fa-screwdriver-wrench"></i> Maintenance</h3>
            <div class="sbMobile_menu">
                <div class="sb_div">
                <?php if ($studCounceling == '1'){ echo '   <a href="../Councelling Maintenance Schedule/" id="cSide" class="sb_Link "><i class="fa-solid fa-hospital-user"></i> Counseling</a> ';}?>
                </div>
                <div class="sb_div">
                <?php if ($studViol == '1'){ echo '   <a href="../Violation Maintenance Program/" id="vSide" class="sb_Link "><i class="fa-solid fa-house-chimney-user"></i> Violation</a> ';}?>
                </div>
                <div class="sb_div">
                <?php if ($systemMaintenance == '1'){ echo '   <a href="../System User Maintenance/" id="sysSide" class="sb_Link "><i class="fa-solid fa-screwdriver-wrench"></i> System</a> ';}?>
                </div>
            </div>
            
            <div class="side_down_bttn">
                <div class="sb_div">
                    <a href="../includes/logout.php" class="downBttn"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                </div>
            </div>
        </div>

    </div>
    
    <div class="side_navbar" id="sideNavbar">
        <nav class="navi">
            <div class="navi_selection">
                <div class="navi_brand">
                    <i class="fas fa-bars" id="nav-toggle"></i>
                    <a href="#" class="navi_logo">PUPBC Website</a>
                </div>
<?php if ($studCounceling == '1'){ echo '                <div class="navi_list">
                    <h3 class="sub_title"><i class="fas fa-hospital-user" id="nav-toggle1"></i>Counseling</h3>
                    <a href="../Counceling Dashboard/" id="cdash" class="navi_link ">
                        <i class="fas fa-chart-line"></i>
                        <span class="navi_name">DashBoard</span>
                    </a>
                    
                    <a href="../Counceling Appointment Dashboard/" id="cappoint" class="navi_link " >
                        <i class="fas fa-calendar-alt"></i>
                        <span class="navi_name">Appointment</span>
                    </a>
                    <a href="../Counceling Client Page/" id="cClient" class="navi_link ">
                        <i class="fas fa-users"></i>
                        <span class="navi_name">Client</span>
                    </a>
                </div>
                <br> ';}?>
<?php if ($studViol == '1'){ echo '                <div class="navi_list">
                    <h3 class="sub_title"><i class="fas fa-house-user" id="nav-toggle2"></i>Violation</h3>
                    <a href="../Violation Dashboard/" id="vdash" class="navi_link ">
                        <i class="fas fa-chart-line"></i>
                        <span class="navi_name">DashBoard</span>
                    </a>
                    <a href="../Violation Entry/" id="vEntry" class="navi_link ">
                        <i class="fas fa-bullhorn"></i>
                        <span class="navi_name">Violation Entry</span>
                    </a>
                    <a href="../Violation Records/" id="vRec" class="navi_link ">
                        <i class="fas fa-address-card"></i>
                        <span class="navi_name">Records</span>
                    </a>
                </div>
                <br> ';}?>
                <div class="navi_list">
                    <div class="navi_link <?php if ($page == 'maintenance'){ echo 'active_side';}?> collapse" >
                        <i class="fas fa-tools" id="main_list"></i>
                        <span class="navi_name">Maintenance</span>
                        <i class="fas fa-chevron-down" id="drop_bttn"></i>

                        <ul class="collapse_menu">
<?php if ($studCounceling == '1'){ echo '                            <a href="../Councelling Maintenance Schedule/" class="collapse_link">Counseling</a> ';}?>
<?php if ($studViol == '1'){ echo '                            <a href="../Violation Maintenance Program/" class="collapse_link">Violation</a> ';}?>
<?php if ($systemMaintenance == '1'){ echo '                            <a href="../System User Maintenance/" class="collapse_link">System</a> ';}?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div class="top_nav_bar">
        <div class="navi-bar">
            <div class="sideBar_bttn">
                <button class="sb_bttnOpen" id="open_side">
                    <i class="fa-solid fa-bars"></i>
                </button>
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
                            <a href="../Administrator Notification/" class="notif_bttn">See More</a>
                        </div>
                    </div>
                </div>
                <!---- Acount Drop down menu-->
                <div class="dropdown" user-dropdown-menu>
                    <button class="btndrop_user" user-dropdown-menu-bttn><i class="fas fa-user-circle icon" user-dropdown-menu-bttn></i></button>
                    <div class="user_menu">
                        <a href="../Administrator Profile/" class="bttn<?php if ($page == 'admin_profile'){ echo '_active';}?>"><i class="fa fa-user icon"></i><?php echo $name ?></a>
                        <a href="../includes/logout.php" class="bttn<?php if ($page == ''){ echo '_active';}?>"><i class="fas fa-sign-out-alt"></i>Log out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
