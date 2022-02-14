<!---Modal/ Pop up-->
    <div class="modal_bg studDetails" id="modal_add_entry">
        <div class="modal">
            <div class="title_bar">
                <p>Add Violation Entry</p>
                <a href="" class="modal_title_bttn" id="close_modal"><i class="fas fa-times-circle"></i></a>
            </div>
            <!--<form>-->
            <form id="studDetails" method="POST" action="">
                <div class="modal_content">
                    <div class="modal_studDetails_input_container">
                        <div class="input_sd">

                            <div class="modal_studDetails_input">
                                <p class="label">Student Num: </p>
                                <input type="text" class="input_field" id="studNum" name="studNum" >
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_studNum" class="fa-solid "></i>
                            </div>

                            <div class="modal_studDetails_input">
                                <p class='label'>Violation: </p>
                                <select class="input_field" name="violations" id="violations">
                                
                                    <option disabled selected> --Select Violation-- </option>
                                    <?php
                                    include 'dbconnection.php';

                                    $sql = mysqli_query($conn, "SELECT * FROM fortheviolations");

                                    while ($row = mysqli_fetch_array($sql)) {
                                        echo "<option value='". $row['v_code'] ."'>" .$row['Violations'] ."</option>";
                                    
                                    }
                                    ?>

                                </select>
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_violations" class="fa-solid "></i>
                            </div>
                            <div class="modal_studDetails_input">
                                <p class='label'>Sanction: </p>
                                <select class="input_field" name="sanctions" id="sanctions">
                                
                                    <option disabled selected> --Select Sanction- </option>
                                    <?php
                                    include 'dbconnection.php';

                                    $sql = mysqli_query($conn, "SELECT * FROM forthesanctions ");

                                    while ($row = mysqli_fetch_array($sql)) {
                                        echo "<option value='". $row['s_id'] ."'>" .$row['Sanctions'] ."</option>";
                                    }
                                    ?>

                                </select>
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_sanctions" class="fa-solid "></i>
                            </div>

                            <div class="modal_studDetails_input">
                                <p class="label">Date committed: </p>
                                <input type="date" class="input_field" id="date" name="date" >
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_date" class="fa-solid "></i>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="footer_modal_bttn">
                    <button class="modal_foot_bttn1" type="submit" id="entrysubmit" name="submit"><i class="fas fa-save"></i> Save</button>
                    <a href="#" id="close_modal2" class="modal_foot_bttn"><i class="fas fa-sign-out-alt"></i> Exit</a>
                </div>

            </form>
            <!--</form>-->

        </div>
    </div>


    
