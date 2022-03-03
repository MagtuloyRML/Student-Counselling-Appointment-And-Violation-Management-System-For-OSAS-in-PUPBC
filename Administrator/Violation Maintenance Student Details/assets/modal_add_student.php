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
                    <div class="input_group">
                            <div class="input_container">
                                <label for="#" class="label">Student Num: </label>
                                <div class="input " id="input_fst_name">
                                    <input class="input-field" type="text" placeholder="Ex: 2000-00000-BN-0" name="studNum" id="studNum">
                                    <i class="fa-solid fa-asterisk"></i>
                                    <i id="i_studNum" class="fa-solid "></i>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Last Name: </label>
                                <div class="input " id="input_mid_name">
                                    <input class="input-field" type="text" placeholder="Ex: Dela Cruz" name="lastName" id="lastName">
                                    <i class="fa-solid fa-asterisk"></i>
                                    <i id="i_lastNamee" class="fa-solid "></i>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">First Name: </label>
                                <div class="input " id="input_last_name">
                                    <input class="input-field" type="text" placeholder="Ex: Juan" name="firstName" id="firstName">
                                    <i class="fa-solid fa-asterisk"></i>
                                    <i id="i_firstName" class="fa-solid "></i>
                                </div>
                            </div>
                            <div class="input_container">
                                <label for="#" class="label">Middle Name: </label>
                                <div class="input " id="input_suf_name">
                                    <input class="input-field" type="text" placeholder="Ex: Mendez. (If None, Type None)" name="middleName" id="middleName">
                                    <i id="i_middleName" class="fa-solid "></i>
                                </div>
                            </div>

                            <div class="input_container" >
                                <label for="#" class="label">Academic Year </label>
                                <div class="input " id="input_userRole">
                                    <select class="input-field select" name="ayCode" id="ayCode">
                                        <option disabled selected> --Academic Year & Section-- </option>
                                        <?php
                                        include_once 'dbconnection.php';
                                        $sql = mysqli_query($conn, "SELECT * FROM foracademicyear ");
                                        while ($row = mysqli_fetch_array($sql)) {
                                                echo "<option value='" . $row['code'] . "'>" . $row['code'] . " Semester </option>";
                                        }
                                        ?>
                                    </select>
                                    <i class="fa-solid fa-asterisk"></i>
                                    <i id="i_ayCode" class="fa-solid "></i>
                                </div>
                            </div>

                            <div class="input_container">
                                <label for="#" class="label">Section: </label>
                                <div class="input " id="input_admin_email">
                                    <input class="input-field" type="text" placeholder="Ex: 1" name="Section" id="Section">
                                    <i class="fa-solid fa-asterisk"></i>
                                    <i id="i_Section" class="fa-solid "></i>
                                </div>
                            </div>
                            
                            <div class="input_container">
                                <label for="#" class="label">Address: </label>
                                <div class="input " id="input_username">
                                    <input class="input-field" type="text" placeholder="Ex: Binan Laguna" name="Addres" id="Addres">
                                    <i class="fa-solid fa-asterisk"></i>
                                    <i id="i_Addres" class="fa-solid "></i>
                                </div>
                            </div>
                            
                            
                            <div class="input_container" >
                                <label for="#" class="label">Gender: </label>
                                <div class="input " id="input_gender">
                                    <select class="input-field select" name="Gender" id="Gender">
                                        <option disabled selected> --Enter Gender-- </option>
                                        <option value="Male">Male </option>
                                        <option value="Female">Female </option>
                                    </select>
                                    <i class="fa-solid fa-asterisk"></i>
                                    <i id="i_gender" class="fa-solid "></i>
                                </div>
                            </div>
                            
                            <div class="input_container">
                                <label for="#" class="label">Program: </label>
                                <div class="input " id="input_admin_contact">
                                    <select class="input-field select" name="progCode" id="progCode">
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
                                    <i class="fa-solid fa-asterisk"></i>
                                    <i id="i_progCode" class="fa-solid "></i>
                                </div>
                                
                            </div>
                            
                        </div> 

                </div>


            </div>

            <div class="footer_modal_bttn">
                <button id="submit" name="submit" class="modal_foot_bttn1" type="submit" ><i class="fas fa-save"></i> Save</button>
                <a id="close_modal2" class="modal_foot_bttn"><i class="fas fa-sign-out-alt"></i> Exit</a>
            </div>

        </form>
        <!--</form>-->

    </div>
</div>


<script src="assets/js/modal_add_student.js"></script>