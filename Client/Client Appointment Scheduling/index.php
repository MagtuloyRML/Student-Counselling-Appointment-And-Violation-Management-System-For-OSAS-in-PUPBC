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
                            <input class="input" type="text" id="#" name="email_add">
                        </div>
                        <div class="input_container">
                            <label class="label" for="#">Start Date and Time of Appointment: </label>
                            <br>
                            <input class="input" type="datetime-local" id="#" name="start_app">
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