<?php
    $title = 'Maintenance';
    $page = 'v_maintenance';
    include_once('../includes/header.php');
?>
<?php 
include ('../../assets/connection/dbconnection.php');           

if (isset($_POST['submit'])){
    $start_t = $_POST['start_time'];
    $end_t = $_POST['end_time'];
    $start_d = $_POST['start_date'];
    $end_d = $_POST['end_date'];

    $sql = "UPDATE avail_sched SET start_time = '$start_t', end_time = '$end_t', start_date = '$start_d', end_date = '$end_d'
    WHERE meta_field = 'first'";
    $run = mysqli_query($conn, $sql);

    if($run){
        header('index.php');
    }
}
?>


     <div class="subcontent">
         <form action ="index.php" method = "POST">
         <?php 
                     
         $query = "SELECT * from avail_sched";
         $result = mysqli_query($conn, $query);
         while($row = mysqli_fetch_assoc($result))
         {?>
        
         <label>Available Time</label>
         <br>
         <label>Start Time:</label>
         <input type ="time" id = "start_time" name = "start_time" value="<?php echo $row['start_time'];?>">       
         <br>
         <label>End Time:</label>
         <input type ="time" id = "end_time" name = "end_time" value="<?php echo $row['end_time'];?>">
         <br>
         <label>Start Date:</label>
         <input type ="date" id = "start_date" name = "start_date" value="<?php echo $row['start_date'];?>">       
         <br>
         <label>End Date:</label>
         <input type ="date" id = "end_date" name = "end_date" value="<?php echo $row['end_date'];?>">
         <?php } ?>       
         <input type = "submit" value="submit" name="submit" id="submit" >
         </form>
    </div>


</body>

</html>