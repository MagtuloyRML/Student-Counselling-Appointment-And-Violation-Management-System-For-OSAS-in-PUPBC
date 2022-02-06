<?php
    $title = 'Profile';
    $page = 'client_profile';
    include_once('../includes/header.php');

    $sql_fetch = mysqli_query($conn, "SELECT AdminFirstName, AdminMiddleName, AdminLastName, AdminSufifx,
     AdminContactNo, AdminEmailAdd, AdminAddress from adminaccountinfo WHERE AdminAccountID = '$id'");
    while($details = mysqli_fetch_assoc($sql_fetch))
    {
        $fname = $details['AdminFirstName']; $mname = $details['AdminMiddleName']; $lname = $details['AdminLastName']; $sname = $details['AdminSufifx'];
        $aAdd = $details['AdminAddress']; $aNo = $details['AdminContactNo']; $aEmail = $details['AdminEmailAdd']; 
    }
    
?>
    <div class="content">
        <div class="profile">
            <button class="acc_bttn"><i class="fas fa-user-cog"></i></button>
            <p>Profile Info</p>
            <div class="profile_info">
                <div class="profile_pic">
                    <!--lagayan ng profile pic-->
                    <img class="prof_pic" src="../../assets/user_profile_pic/default_user.jpg" alt="Profile Pic">
                    <button class="pic_bttn" id="openEditPicModal"><i class="fas fa-camera"></i> Profile Piture</button>
                </div>

                <div class="profile_content_info">
                    <div class="input-container">
                        <label class="label" for="#">Full Name: </label>
                        <p class="input-field"><?php echo $lname, ', ', $fname ,' ', $mname ,' ', $sname?></p>
                    </div>
                    <div class="input-container">
                        <label class="label" for="#">Full Address: </label>
                        <p class="input-field"><?php echo $aAdd?></p>
                    </div>
                    <div class="input-container">
                        <label class="label" for="#">Email Address: </label>
                        <p class="input-field"><?php echo $aEmail?></p>
                    </div>
                    <div class="input-container">
                        <label class="label" for="#">Contact Name: </label>
                        <p class="input-field"><?php echo $aNo?></p>
                    </div>
                </div>
            </div>

            <div class="counceling_records_content">
                <h3>Appointment Records</h3>
                <table class="cr_record">
                    <tr> 
                        <th class="cr_title">Appointment Num.</th>
                        <th class="cr_title">Title Appointment</th>
                        <th class="cr_title">Date</th>
                        <th class="cr_title">Monitored by:</th>
                        <th class="cr_title">Status</th>
                    </tr>
                    <tr>
                        <td class="cr_data">NO DATA AVAILABLE</td>
                        <td class="cr_data">NO DATA AVAILABLE</td>
                        <td class="cr_data">NO DATA AVAILABLE</td>
                        <td class="cr_data">NO DATA AVAILABLE</td> 
                        <td class="cr_data">NO DATA AVAILABLE</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
</body>

</html>