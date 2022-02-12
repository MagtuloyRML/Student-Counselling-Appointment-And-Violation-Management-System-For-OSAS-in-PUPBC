<?php
    $title = 'Appointment Scheduling';
    $page = 'client_app_sched';
    include_once('../includes/header.php');
?>
    <div class="content">
        <div class="appoint_form">
            <div class="title_content">
                <h3>Appointment Schedule</h3>
            </div>
            <div class="content_appoint">
                <form action = "scheduleCheck.php" method = "POST">
                    <div class="form_content">
                        <!-- message if ever recorded or taken yung sched -->
                        <?php if (isset($_GET['error'])) { ?>
                                    <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php } ?>

                                <?php if (isset($_GET['success'])) { ?>
                                    <p class="success"><?php echo $_GET['success']; ?></p>
                                <?php } ?>

                        <p>Fill up the following to appoint a Sched</p>
                        <div class="input_container">
                            <label class="label" for="#">Student Name(Optional): </label>
                            <br>
                            <input class="input" type="text" id="#" name="name">
                        </div>
                        <div class="input_container">
                            <label class="label" for="#">Email Address(Required): </label>
                            <br>
                            <input class="input" type="text" id="#" name="email_add" required>
                        </div>
                        <div class="input_container">
                        <?php 
                            include('../../assets/connection/dbconnection.php');
                            $SQL = $conn->query("SELECT `meta_field`,
                            `start_date`,
                            `end_date` FROM `avail_sched` WHERE `meta_field` = 'first'");

                                while ($row = $SQL->fetch_assoc()) {
                            ?>
                            <label class="label" for="#">Date of Appointment: </label>
                            <br>
                            <input class="input" type="date" id="#" name="start_app_date" required min = "<?php echo $row['start_date']; ?>" max = "<?php echo $row['end_date']; ?>">
                            <?php
                            }
                          ?>
                        </div>
                        
                        <div class="input_container">
                            <?php 
                            include('../../assets/connection/dbconnection.php');
                            $SQL = $conn->query("SELECT `meta_field`,
                            `start_time`,
                            `end_time` FROM `avail_sched` WHERE `meta_field` = 'first'");

                                while ($row = $SQL->fetch_assoc()) {
                            ?>
                            <label class="label" for="#">Time of Appointment: </label>
                            <br>
                            <input class="input" type="time" id="start_app_time" name="start_app_time" required step="3600" min ="<?php echo $row['start_time'];?>" max="<?php echo $row['end_time']; ?>" >
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