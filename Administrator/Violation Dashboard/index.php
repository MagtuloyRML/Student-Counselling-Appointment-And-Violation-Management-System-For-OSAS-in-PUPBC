<?php
    $title = 'Violation Dashboard';
    $page = 'v_home';
    include_once('../includes/header.php');
    
    $idFecth = $_SESSION['AdminID'];
    $sql_fetchid = mysqli_query($conn, 
    "SELECT adminAccount.AdminFirstName, adminAccount.AdminUserRoleID, userRole.AdminPageStudentCounceling, 
    userRole.AdminPageViolation, userRole.AdminMaintenance, userRole.StatusID
    FROM adminaccountinfo AS adminAccount 
    INNER JOIN adminuserrole AS userRole 
    ON adminAccount.AdminUserRoleID = userRole.AdminUserRoleID WHERE adminAccount.AdminAccountID = '$idFecth' ");
    
    while($row = mysqli_fetch_assoc($sql_fetchid))
    {
        $userRoleID = $row['AdminUserRoleID']; 
        $studCounceling = $row['AdminPageStudentCounceling']; $studViol = $row['AdminPageViolation']; 
        $systemMaintenance = $row['AdminMaintenance']; $roleStatus = $row['StatusID']; 
    }
    if ($studViol != '1'){
        echo "<script> window.location.href = '../Page 404/';</script>";
    }
?>
    <div class="body_container" onload="initClock()">
        <div class="container">
            <div class="title">
                <h1>DashBoard</h1>
                <hr>
            </div>
            <div class="divider">
                <!-- Date, Day, and Time day VISUALIZATION -->
                <div class="dash_content time_date" >

                    <div class="datetime">
                        <div class="date">
                            <span id="dayname">Day</span>,
                            <span id="month">Month</span>
                            <span id="daynum">00</span>,
                            <span id="year">Year</span>
                        </div>
                        <div class="time">
                            <span id="hour">00</span>:
                            <span id="minutes">00</span>:
                            <span id="seconds">00</span>
                            <span id="period">AM</span>
                        </div>
                    </div>
                    
                </div>
                <!-- A.Y CODE VISUALIZATION -->
                <div class="dash_content">
                    <h3><i class="fas fa-school"></i>Academic Year: </h3>
                    <p>00000000</p>
                </div>

                <!-- TOTAL NUMBERS OF STUDENT VISUAL DATA  -->
                <div class="dash_content">
                    <?php 
                    include('assets/dbconnection.php');
                    $query = "SELECT id FROM forstudents ORDER BY id";
                    $run = mysqli_query($conn, $query);

                    $row = mysqli_num_rows($run);
                    echo '<h3><i class="fas fa-user-graduate"></i>Total Student: </h3>';
                    echo '<p>'.$row.'</p>';
                    ?>
                    
                </div>
                <!-- TOTAL NUMBERS OF VIOLATION VISUAL DATA  -->
                <div class="dash_content">
                <?php 
                    include('assets/dbconnection.php');
                    $query2 = "SELECT entry_id FROM forviolationentries ORDER BY entry_id";
                    $run2 = mysqli_query($conn, $query2);

                    $row2 = mysqli_num_rows($run2);
                    echo '<h3><i class="fas fa-user-graduate"></i>Total Violation: </h3>';
                    echo '<p>'.$row2.'</p>';
                    ?>
                </div>
            </div>
            
        </div>
    </div>
    
    <script src="assets/js/time_date.js"></script>
</body>
</html>
