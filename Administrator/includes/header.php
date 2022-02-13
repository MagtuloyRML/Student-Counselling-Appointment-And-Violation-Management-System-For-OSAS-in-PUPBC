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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">

    <link href="../includes/css/side_nav.css" rel="stylesheet">
    <script src="../includes/js/acc_dropdown_notif_dropdown.js" defer></script>
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
<body id="body-pd" <?php if ($page == 'v_home'){ echo 'onload="initClock()"';}?>>
    <div class="side_navbar" id="sideNavbar">
        <nav class="navi">
            <div class="navi_selection">
                <div class="navi_brand">
                    <i class="fas fa-bars" id="nav-toggle"></i>
                    <a href="#" class="navi_logo">PUPBC Website</a>
                </div>
                <div class="navi_list">
                    <h3 class="sub_title"><i class="fas fa-hospital-user"></i>Counceling</h3>
                    <a href="../Counceling Dashboard/" class="navi_link <?php if ($page == 'ca_home'){ echo 'active_side';}?>">
                        <i class="fas fa-chart-line"></i>
                        <span class="navi_name">DashBoard</span>
                    </a>
                    
                    <div class="navi_link <?php if ($page == 'ca_appoint_sched'){ echo 'active_side';}?> collapse" >
                        <i class="fas fa-calendar-alt" id="app_list"></i>
                        <span class="navi_name">Appointment</span>
                        <i class="fas fa-chevron-down" id="drop_bttn"></i>

                        <ul class="collapse_menu">
                            <a href="../Counceling Appointment Dashboard/" class="collapse_link">Dashboard</a>
                            <a href="../Counceling Appointment Schedule/" class="collapse_link">Schedule</a>
                            <a href="../Counceling Apointment Approval/" class="collapse_link">Approval</a>
                        </ul>
                    </div>
                    <a href="../Counceling Client Page/" class="navi_link <?php if ($page == 'ca_client'){ echo 'active_side';}?>">
                        <i class="fas fa-users"></i>
                        <span class="navi_name">Client</span>
                    </a>
                </div>
                <br>
                <div class="navi_list">
                    <h3 class="sub_title"><i class="fas fa-house-user"></i>Violation</h3>
                    <a href="../Violation Dashboard/" class="navi_link <?php if ($page == 'v_home'){ echo 'active_side';}?>">
                        <i class="fas fa-chart-line"></i>
                        <span class="navi_name">DashBoard</span>
                    </a>
                    <a href="../Violation Entry/" class="navi_link <?php if ($page == 'v_entry'){ echo 'active_side';}?>">
                        <i class="fas fa-bullhorn"></i>
                        <span class="navi_name">Violation Entry</span>
                    </a>
                    <a href="../Violation Records/" class="navi_link <?php if ($page == 'v_rec'){ echo 'active_side';}?>">
                        <i class="fas fa-address-card"></i>
                        <span class="navi_name">Records</span>
                    </a>
                </div>
                <br>
                <div class="navi_list">
                    <div class="navi_link <?php if ($page == 'maintenance'){ echo 'active_side';}?> collapse">
                        <i class="fas fa-tools"></i>
                        <span class="navi_name">Maintenance</span>
                        <i class="fas fa-chevron-down" id="drop_bttn"></i>

                        <ul class="collapse_menu">
                            <a href="../Councelling Maintenance Schedule/" class="collapse_link">Counceling</a>
                            <a href="../Violation Maintenance Program/" class="collapse_link">Violation</a>
                            <a href="../System User Maintenance/" class="collapse_link">Maintenance</a>
                        </ul>
                    </div>
                </div>
                
            </div>
        </nav>
    </div>

    <div class="top_nav_bar">
        <div class="navi-bar">
            <div class="search-container">
                <form action="/action_page.php">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="menu">
                <!--- Notifcation drop down content-->
                <div class="dropdown1" notif-dropdown>
                    <button class="btndrop_notif" notif-dropdown-bttn><i class="fas fa-bell" notif-dropdown-bttn></i></button>
                    <div class="notif_content">
                        <!---Content for Notif--->
                        <p><i class="fas fa-bell"></i> Notification</p>
                        <hr class="notif-line">
                        <div class="notif-content">
                            <p>
                                No Available Content
                            </p>
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
