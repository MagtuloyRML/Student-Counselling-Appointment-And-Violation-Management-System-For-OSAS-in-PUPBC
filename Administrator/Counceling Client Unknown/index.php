<?php
    $title = 'Counseling Client Unknown';
    $page = 'ca_client';
    include_once('../includes/header.php');
    $id = $_SESSION['AdminID'];
    $sql_fetchid = mysqli_query($conn, 
    "SELECT adminAccount.AdminFirstName, adminAccount.AdminUserRoleID, userRole.AdminPageStudentCounceling, 
    userRole.AdminPageViolation, userRole.AdminMaintenance, userRole.StatusID
    FROM adminaccountinfo AS adminAccount 
    INNER JOIN adminuserrole AS userRole 
    ON adminAccount.AdminUserRoleID = userRole.AdminUserRoleID WHERE adminAccount.AdminAccountID = '$id' ");
    
    while($row = mysqli_fetch_assoc($sql_fetchid))
    {
        $userRoleID = $row['AdminUserRoleID']; 
        $studCounceling = $row['AdminPageStudentCounceling']; $studViol = $row['AdminPageViolation']; 
        $systemMaintenance = $row['AdminMaintenance']; $roleStatus = $row['StatusID']; 
    }
    if ($studCounceling != '1'){
        echo "<script> window.location.href = '../Page 404/';</script>";
    }
?>
    <div class="body_container">
        <div class="content">
            <div class="client_content">
                <div class="title">
                    <h1>Client Page</h1>
                    <hr>
                </div>

                <div class="searchBar">
                    <a href="../Counceling Client Page/" class="back_bttn"><i class="fas fa-arrow-left"></i></a>
                    <form action="">
                        <input type="text" placeholder="Search" class="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="content_statement">
                    <div class="statement">
                        <i class="fas fa-question"></i>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean fringilla nec ante vel vestibulum. Sed id nibh tincidunt,
                            volutpat risus eu, dignissim risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>

                </div>
                
                

            </div>

        </div>
        
    </div>
    <script src="assets/js/main.js"></script>
    
</body>

</html>