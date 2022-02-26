<?php
    $title = 'Counseling Client Information';
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
        header('Location: ../Page 404/');
    }
?>
    <div class="body_container">
        <div class="content">
            <div class="client_content">
                <div class="title">
                    <h1>Client Page</h1>
                    <hr>
                </div>
                <a href="../Counceling Client Page/" class="back_bttn"><i class="fas fa-arrow-left"></i></a>
                <div class="searchBar">
                    <form action="">
                        <input type="text" placeholder="Search" class="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <div class="client_info">
                    <div class="profile_info">
                        <div class="profile_pic">
                            <div id="prof_pic_div">
                                <img class="prof_pic" id="prof_pic" src="../../assets/user_profile_pic/default_user.jpg" alt="Profile Pic">
                            </div>
                            
                        </div>
                        <div class="profile_content_info">
                            <div class="input-container">
                                <label class="label" for="#">Full Name: </label>
                                <p class="input-field"></p>
                            </div>
                            <div class="input-container">
                                <label class="label" for="#">Full Address: </label>
                                <p class="input-field"></p>
                            </div>
                            <div class="input-container">
                                <label class="label" for="#">Email Address: </label>
                                <p class="input-field"></p>
                            </div>
                            <div class="input-container">
                                <label class="label" for="#">Contact Name: </label>
                                <p class="input-field"></p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="list_client">
                    <h3 class="list_title">Appointment Records</h3>
                    <table class="display_client">
                        <tr> 
                            <th class="client_title">Name</th>
                            <th class="client_title">Course</th>
                            <th class="client_title">Section</th>
                            <th class="client_title">A.Y Code</th>
                            <th class="client_title">Violation</th>
                            <th class="client_title">Sanction</th>
                            <th class="client_title">Date</th>
                        </tr>
                        <tr>
                            <td class="client_data">data</td>
                            <td class="client_data">data</td>
                            <td class="client_data">data</td>
                            <td class="client_data">data</td>
                            <td class="client_data">data</td>
                            <td class="client_data">data</td>
                            <td class="client_data">data</td>
                        </tr>
                    </table>
                </div>

            </div>

        </div>

    </div>
    <script src="assets/js/main.js"></script>

    
</body>

</html>