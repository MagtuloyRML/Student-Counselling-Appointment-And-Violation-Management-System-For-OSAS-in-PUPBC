
<?php 
include_once('../includes/header.php');

$id = $_SESSION['AdminID'];
$sql_fetch = mysqli_query($conn, "SELECT * from adminaccountinfo WHERE AdminAccountID = '$id'");
$name = "";
while($row = mysqli_fetch_assoc($sql_fetch))
{
    $name = $row['AdminAccountID'];
}
$c_id = $_GET['id'];
$a_id = $_GET['a_id'];


?>


      
            <div class="title_bar">
                <p>Cancellation of Appointment</p>
                <button class="modal_title_bttn" id="close_modal"><i class="fas fa-times-circle"></i></button>
            </div>
            
            <form id="cancelReason" method="POST" action="cancel_sched_work.php">
                <div class="modal_content">
                    <div class="modal_studDetails_input_container">
                        <div class="input_sd">

                            <div class="modal_studDetails_input">
                                <p class="label">Cancellation Reason: </p>
                                <input type="text" class="input_field" id="cancel_reason" name="cancel_reason" required >
                                <input type="hidden" class="input_field" id="id" name="id" value ="<?= $c_id ?>">
                                <input type="hidden" class="input_field" id="a_id" name="a_id" value ="<?= $a_id ?>">
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_studNum" class="fa-solid "></i>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="footer_modal_bttn">
                    <button class="modal_foot_bttn1" type="submit" id="entrysubmit" name="submit"><i class="fas fa-save"></i> Save</button>
                    <a href="index.php" id="close_modal2" class="modal_foot_bttn"><i class="fas fa-sign-out-alt"></i> Exit</a>
                </div>

            </form>
            
    


    
