 
 <?php 
include('dbconnection.php');

if(isset($_POST['submit'])){
    
    $studNum = $_POST['studNum'];
    $violation = $_POST['violations'];
    $sanction = $_POST['sanctions'];
    $date = $_POST['date'];

    $query = "SELECT * FROM forstudents WHERE studNum = '$studNum'";
    $run = mysqli_query($conn, $query);
    if(mysqli_num_rows($run) > 0){
        $sql = "SELECT `studNum`,
        `id`,
        `fullName`,
        `lastName`,
        `firstName`,
        `middleName`,
        `Section`,
        `Address`,
        `Gender`,
        `progCode`,
        `ayCode`,
        `status` FROM `forstudents` WHERE studNum = '$studNum'";
        $sql_run = mysqli_query($conn, $sql);
        while($row = $sql_run->fetch_array()){

        $fullName = $row['fullName'];
        $Section = $row['Section'];
        $progCode = $row['progCode'];
        $ayCode = $row['ayCode'];


        $insert = "INSERT into `forviolationentries`(`studNum`,
        `fullName`, `pCode`, `Section`, `Violations`, `Sanctions`, `Date`, `code`) VALUES 
        ('$studNum',
        '$fullName',
        '$progCode',
        '$Section',
        '$violation',
       '$sanction',
        '$date',
        '$ayCode')";

        $insert_run = mysqli_query($conn, $insert);
       
    }

    }else{
        echo "Your student number is invalid / not found.";
    }
}
?>
 <!---Modal/ Pop up-->
    <div class="modal_bg studDetails" id="modal_add_entry">
        <div class="modal">
            <div class="title_bar">
                <p>Add Violation Entry</p>
                <a href="#" class="modal_title_bttn" id="close_modal"><i class="fas fa-times-circle"></i></a>
            </div>
            <!--<form>-->
            <form id="studDetails" method="POST" action="">
                <div class="modal_content">
                    <div class="modal_studDetails_input_container">
                        <div class="input_sd">

                            <div class="modal_studDetails_input">
                                <p class="label">Student Num: </p>
                                <input type="text" class="input_field" id="studNum" name="studNum" >
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
                            </div>
                            <div class="modal_studDetails_input">
                                <p class="label">Date committed: </p>
                                <input type="date" class="input_field" id="date" name="date" >
                            </div>
                        </div>

                    </div>


                </div>

                <div class="footer_modal_bttn">
                    <input class="modal_foot_bttn" type="submit" id="submit" name="submit"><i class="fas fa-save"></i> Save</input>
                    <a href="#" id="close_modal2" class="modal_foot_bttn"><i class="fas fa-sign-out-alt"></i> Exit</a>
                </div>

            </form>
            <!--</form>-->

        </div>
    </div>


    <script src="assets/js/modal_add_vio_entry.js"></script>
