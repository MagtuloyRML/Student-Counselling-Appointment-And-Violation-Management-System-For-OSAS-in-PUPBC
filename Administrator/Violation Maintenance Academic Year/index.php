<?php
    $title = 'Maintenance';
    $page = 'maintenance';
    include_once('../includes/header.php');

    $connection = new mysqli('localhost', 'root','','test_db');
    if ($connection->connect_error){
        die(
            'Error : ('. $connection->connect_errno.') '.$connection->connect_error
        );
    }

    $idFecth = $_SESSION['AdminID'];
    $sql_fetchid = mysqli_query($connection, 
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

<?php
    $sub_page = 'vmain_acad_yr';
    include_once('../includes/sub_nav.php');
?>

            <div class="subcontent">
                <div class="title">
                    <h1>Academic Year</h1>
                    <hr>
                </div>

                <div class="ac_bttn_group">
                    <a href="#" class="ac_bttn" id="openModal_input_ay_details">
                        <i class="fas fa-plus-square"></i>
                        Create
                    </a>
                </div>

                <div class="ac_table_content">
                    <table class="ac_table">
                        <tr> 
                            <th class="acadYear_title">AYCODE</th>
                            <th class="acadYear_title">Year From</th>
                            <th class="acadYear_title">Year To</th>
                            <th class="acadYear_title">Semester</th>
                        </tr>
                        <!-- DISPLAYING THE DATA TO WEB PAGE FROM DATA BASE  -->
                        <?php
                        include_once 'assets/dbconnection.php';
                        $SQL = $conn->query("SELECT code, yearFrom, yearTo, Semester FROM foracademicyear");
                
                        if ($SQL->num_rows > 0) {
                            while ($row = $SQL->fetch_assoc()) {
                                ?>
                        <tr>
                            <td class="acadYear_data"><?php  echo $row['code'] ."<br>";?></td>
                            <td class="acadYear_data"><?php  echo $row['yearFrom'] ."<br>";?></td>
                            <td class="acadYear_data"><?php  echo $row['yearTo'] ."<br>";?></td>
                            <td class="acadYear_data"><?php  echo $row['Semester'] ."<br>";?></td>
                        </tr>
                                <?php
                            }
                        
                        }
                        ?>
                    </table>
                </div>

            </div>
    </div>

    <?php
        include_once('assets/modal_ay_details.php');
    ?>

    

</body>

</html>