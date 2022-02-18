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
?>
    <div class="content">
        <div class="appoint_form">
            <div class="title_content">
                <h3>Appointment Schedule</h3>
            </div>
            <div class="content_appoint">
                <form action = "dateSelection.php" method = "POST">
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
                            <label class="label" for="#">Student Name: </label>
                            <br>
                            <input class="input" type="text" id="#" name="name">
                            <input class="input" type="hidden" id="id" name="id" value="<?= $name ?>">
                        </div>
                        <div class="input_container">
                            <label class="label" for="#">Email Address: </label>
                            <br>
                            <input class="input" type="text" id="#" name="email_add">
                        </div>
                        <div >
                            <label class="label" for="#">Do you want to be Anonymous or Not: </label>
                            <br>
                            <div>
                            <input class="input" type="radio" id="yes" name="anonymous" value="Yes" checked>
                            <label class="label" for="Yes">Yes</label>
                                </div>
                            <div>
                            <input class="input" type="radio" id="no" name="anonymous" value="No" >
                            <label class="label" for="No">No</label>
                            </div>
                        </div>
                        <div class="input_container">
                            <label class="label" for="#">What's bothering you? </label>
                            <br>
                            <input class="input" type="text" id="#" name="reason">
                        </div>
                        <div class="input_container">
                            <br>
                        <div class="input_container">
                            <select class="label" required name = "counselor_id" id="counselor_id">
                            <br>
                            <option disabled value="" selected ="selected">Select a Counselor</option>
                            <?php 
                                
                                $query = "SELECT * from adminaccountinfo";
                                $result1 = mysqli_query($conn, $query);
                                while($row2 = mysqli_fetch_assoc($result1))
                                {?>
                                <option value="<?php echo $row2["AdminAccountID"];?>"
                                ><?php echo $row2['AdminLastName'].', '. $row2['AdminFirstName'].' '.$row2['AdminMiddleName']; ?></option>
                                <?php } ?>
                                
                            </select>
                        </div>
                     
                    </div>
                    <div class="form_action">
                        <button type="submit" name="submit" class="form_bttn">Next</a>
                    </div>
                
                </form>
            </div>
            
        </div>
    </div>


</body>

</html>