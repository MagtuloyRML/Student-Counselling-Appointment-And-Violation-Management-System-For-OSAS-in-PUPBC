<?php
    $title = 'Appointment Scheduling';
    $page = 'client_app_sched';
    include_once('../includes/header.php');
    
    $id = $_SESSION['StudID'];
    $sql_fetch = mysqli_query($conn, "SELECT * from clientaccountinfo WHERE ClientAccountID = '$id'");
    $name = "";
    while($row = mysqli_fetch_assoc($sql_fetch))
    {
        $name = $row['ClientAccountID'];
    }

    if(isset($_POST['submit'])){
        $input_name = $_POST['name'];
        $email = $_POST['email_add'];
        $c_id = $_POST['counselor_id'];
        $reason = $_POST['reason'];
        $anonymous = $_POST['anonymous'];
    }
?>
    <div class="content">
        <div class="appoint_form">
            <div class="title_content">
                <h3>Appointment Schedule</h3>
            </div>
            <div class="content_appoint">
                <form action = "scheduleCheck.php" method = "POST">
                    <div class="form_content">
                        
                        <p>Fill up the following to appoint a Sched</p>
                        <input class="input" type="hidden" id="id" name="id" value="<?= $name ?>">
                        <input class="input" type="hidden" id="email_add" name="email_add" value="<?= $email ?>">
                        <input class="input" type="hidden" id="name" name="name" value="<?= $input_name ?>">
                        <input class="input" type="hidden" id="counselor_id" name="counselor_id" value="<?= $c_id ?>">
                        <input class="input" type="hidden" id="anonymous" name="anonymous" value="<?= $anonymous ?>">
                        <input class="input" type="hidden" id="reason" name="reason" value="<?= $reason ?>">
                        <div class="input_container">
                        <?php 
                            include('../../assets/connection/dbconnection.php');
                            $SQL = $conn->query("SELECT `meta_field`,
                            `start_date`,
                            `end_date` FROM `avail_sched` WHERE `meta_field` = '$c_id'");

                                while ($row = $SQL->fetch_assoc()) {
                            ?>
                            <label class="label" for="#">Date of Appointment: </label>
                            <br>
                            <input class="input" type="date" required id="start_app_date" name="start_app_date" min = "<?php echo $row['start_date']; ?>" max = "<?php echo $row['end_date']; ?>">
                            <?php
                            }
                          ?>
                        </div>
                        
                        <div class="input_container">
                            <?php 
                            include('../../assets/connection/dbconnection.php');
                            $SQL = $conn->query("SELECT `meta_field`,
                            `start_time`,
                            `end_time` FROM `avail_sched` WHERE `meta_field` = '$c_id'");

                                while ($row = $SQL->fetch_assoc()) {
                            ?>
                            <label class="label" for="#">Time of Appointment: </label>
                            <br>
                            <input class="input" type="time" required id="start_app_time" name="start_app_time" step="3600" min ="<?php echo $row['start_time'];?>" max="<?php echo $row['end_time']; ?>" >
                            <?php
                            }
                        
                          ?>
                        </div>
                    </div>
                    <div class="form_action">
                        <button type="submit" name="submit" class="form_bttn">Appoint</a>
                    </div>
                
                </form>
            </div>
            
        </div>
    </div>


</body>

</html>