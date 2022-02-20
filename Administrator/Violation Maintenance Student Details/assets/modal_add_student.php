<?php
include('dbconnection.php');



?>

<!---Modal/ Pop up-->
<div class="modal_bg studDetails" id="modal_add_student">
    <div class="modal">
        <div class="title_bar">
            <p>Student Details</p>
            <a href="#" class="modal_title_bttn" id="close_modal"><i class="fas fa-times-circle"></i></a>
        </div>
        <!--<form>-->
        <form id="studDetails" method="POST" action="assets/save_add_student.php">
            <div class="modal_content">
                <div class="modal_studDetails_input_container">
                    <div class="input_sd">

                        <div class="modal_studDetails_input">
                            <p class="label">Student Num: </p>
                            <input type="text" class="input_field" id="studNum" name="studNum">
                        </div>
                        <div class="modal_studDetails_input">
                            <p class="label">Last Name: </p>
                            <input type="text" class="input_field" id="lastName" name="lastName">
                        </div>
                        <div class="modal_studDetails_input">
                            <p class="label">First Name: </p>
                            <input type="text" class="input_field" id="firstName" name="firstName">
                        </div>
                        <div class="modal_studDetails_input">
                            <p class="label">Middle Name: </p>
                            <input type="text" class="input_field" id="middleName" name="middleName">
                        </div>
                    </div>

                    <div class="input_sd">

                        <div class="modal_studDetails_input">
                            <p class='label'>Academic Year: </p>
                            <select class="input_field" name="ayCode" id="ayCode">

                                    <option disabled selected> --Academic Year & Section-- </option>
                                    <?php
                                    include_once 'dbconnection.php';

                                    $sql = mysqli_query($conn, "SELECT * FROM foracademicyear ");

                                    while ($row = mysqli_fetch_array($sql)) {
                                        echo "<option value='" . $row['code'] . "'>" . $row['code'] . " Semester </option>";
                                    }
                                    ?>

                                </select>
                        </div>
                        <div class="modal_studDetails_input">
                            <p class="label">Section: </p>
                            <input type="text" class="input_field" id="Section" name="Section">
                        </div>

                        <div class="modal_studDetails_input">
                            <p class="label">Address: </p>
                            <input type="text" class="input_field" id="Addres" name="Addres">
                        </div>

                        <div class="modal_studDetails_input">
                            <p class="label">Gender: </p>

                            <select class="input_field" name="Gender" id="Gender">
                                <option disabled selected> --Enter Gender-- </option>
                                <option value="Male">Male </option>
                                <option value="Female">Female </option>
                            </select>
                        </div>

                        <div class="modal_studDetails_input">
                            <p class='label'>Program: </p>
                            <select class="input_field" name="progCode" id="progCode">

                                <option disabled selected> --Select Program-- </option>
                                <?php
                                $result1 = mysqli_query($conn, "SELECT * FROM forprogram");
                                $options = "";
                                while ($row2 = mysqli_fetch_array($result1)) { ?>
                                    <option value="<?php echo $row2['pID']; ?>"><?php echo $row2['pDescription']; ?> </option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>

                    </div>

                </div>


            </div>

            <div class="footer_modal_bttn">
                <a href="#" class="modal_foot_bttn" type="submit" onclick="document.getElementById('studDetails').submit()"><i class="fas fa-save"></i> Save</a>
                <a href="#" id="close_modal2" class="modal_foot_bttn"><i class="fas fa-sign-out-alt"></i> Exit</a>
            </div>

        </form>
        <!--</form>-->

    </div>
</div>


<script src="assets/js/modal_add_student.js"></script>