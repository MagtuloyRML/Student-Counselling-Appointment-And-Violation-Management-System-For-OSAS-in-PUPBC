<?php
    $title = 'Violation Entry';
    $page = 'v_entry';
    include_once('../includes/header.php');
    include 'assets/dbconnection.php';

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

    $SQL = $conn->query("SELECT 
    `entry_id`,
    t1.studNum,
    `Date`,
    t5.fullName as fullName,
    t5.Section as Section,
    t4.Violations as Violations,
    t6.Sanctions as Sanctions,
    t2.pDescription AS p_description,
    t3.code AS a_code,
    status FROM forviolationentries t1
    INNER JOIN forprogram t2 ON t1.pCode = t2.pID
    INNER JOIN foracademicyear t3 ON t1.code = t3.code
    INNER JOIN fortheviolations t4 ON t1.Violations = t4.v_code
    INNER JOIN forstudents t5 ON t1.studNum = t5.studNum
    INNER JOIN forthesanctions t6 ON t1.Sanctions = t6.s_id
    WHERE
    Date >= '2013-12-12'
    ORDER BY entry_id DESC
    ");

    if(isset($_POST['submit'])){

        if(isset($_POST['search'])){
            $searched = $_POST['search'];
            $SQL = $conn->query("SELECT 
                        `entry_id`,
                        t1.studNum,
                        `Date`,
                        t5.fullName as fullName,
                        t5.Section as Section,
                        t4.Violations as Violations,
                        t6.Sanctions as Sanctions,
                        t2.pDescription AS p_description,
                        t3.code AS a_code,
                        status FROM forviolationentries t1
                        INNER JOIN forprogram t2 ON t1.pCode = t2.pID
                        INNER JOIN foracademicyear t3 ON t1.code = t3.code
                        INNER JOIN fortheviolations t4 ON t1.Violations = t4.v_code
                        INNER JOIN forstudents t5 ON t1.studNum = t5.studNum
                        INNER JOIN forthesanctions t6 ON t1.Sanctions = t6.s_id
                        WHERE
                        t1.studNum = '$searched'
                        ORDER BY entry_id DESC");

        }


    }
?>
    <div class="body_container">
        <div class="content">
            <div class="title">
                <h1>Violation Entry</h1>
                <hr>
            </div>
            <?php if (isset($_GET['msg'])) { ?>
                <input class="input" type="hidden" id="msg" name="msg" value="<?php echo $_GET['msg']; ?>">
            <?php } ?>
            <!-- SEARCH BOX -->
            <div class="searchBar">
                <form action="" method="POST">
                    <input class="srcinput" type="text" placeholder="Search Student No" name="search" id="search" class="search">
                    <button class="srcbttn" type="submit" name='submit'><i class="fa fa-search"></i></button>
                </form>
            </div>
            <!-- STUDENT INFO -->
            <div class="studentInfo">
                    <!-- DATA MANIPULATION BUTTONS -->
                    <div class="action_content">
                        <div class="action_bttn">
                            <button class="bttn" id="bttnModalEntry"> Create Entry</button>
                        </div>
                    </div>
            </div>
            
            <!-- LIST / TABLE -->
            <div class="list_student_violation" >
                <h3 class="list_title">List</h3>
                <table class="display_violation_record" id = "table_data">
                    
                    <tr> 
                        <th class="violation_title">Student Number</th>
                        <th class="violation_title">Name</th>
                        <th class="violation_title">Course</th>
                        <th class="violation_title" style="width: 7%;">Section</th>
                        <th class="violation_title">A.Y Code</th>
                        <th class="violation_title">Violation</th>
                        <th class="violation_title">Sanction</th>
                        <th class="violation_title">Date</th>
                        <th class="violation_title" style="width: 50px;">Edit</th>
                    </tr>
                    
                    <?php
                        
                        

                        if ($SQL->num_rows > 0) {
                            while ($row = $SQL->fetch_assoc()) {
                        ?>
                        <tr>

                        <td class="violation_data studNum<?php echo $row['entry_id']; ?>" id="<?php echo $row['studNum']; ?>"><?php echo $row['studNum']; ?> </td>
                        <td class="violation_data"><?php echo $row['fullName']; ?> </td>
                        <td class="violation_data"><?php echo $row['p_description']; ?> </td>
                        <td class="violation_data"><?php echo $row['Section']; ?> </td>
                        <td class="violation_data"><?php echo $row['a_code']; ?> </td>
                        <td class="violation_data Violations<?php echo $row['entry_id']; ?>" id="<?php echo $row['Violations']; ?>"><?php echo $row['Violations']; ?> </td>
                        <td class="violation_data Sanctions<?php echo $row['entry_id']; ?>" id="<?php echo $row['Sanctions']; ?>"><?php echo $row['Sanctions']; ?> </td>
                        <td class="violation_data Date<?php echo $row['entry_id']; ?>" id="<?php echo $row['Date']; ?>"><?php $date =  date("d/m/Y", strtotime($row['Date'])); echo $date; ?> </td>
                        <td class="violation_data">
                            <button class="viol_data editBttn" id="<?php echo $row['entry_id']; ?>">
                            <i class="fa-solid fa-pen-to-square"></i></button> 
                        </td>
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
        include ('assets/modal_add_vio_entry.php');
        include ('assets/modal_edit_vio_entry.php');
    ?>

    <div class="alert " id="alert_bottomappointment">
        <div class="alert_content">
            <div class="alert_content_text" id="alert_contentappointment">
                
            </div>
            <button class="alert_close" id="alert_Close_bottappointment"><i class="fa-solid fa-xmark"></i></button>
        </div>
    </div>
    <script src="assets/js/main.js"></script>



</body>

</html>