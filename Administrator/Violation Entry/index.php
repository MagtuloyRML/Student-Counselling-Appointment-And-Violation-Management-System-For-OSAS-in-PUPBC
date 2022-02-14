<?php
    $title = 'Violation Entry';
    $page = 'v_entry';
    include_once('../includes/header.php');
    include 'assets/dbconnection.php';
    //update button
    if (isset($_POST['but_update'])){
        if(isset($_POST['update'])){
            foreach ($_POST['update'] as $updateid){
                $violation = $_POST['vio_'.$updateid];
                $violation2 = $_POST['vio2_'.$updateid];
                $sanctions = $_POST['sanc_'.$updateid];
                $sanctions2 = $_POST['sanc2_'.$updateid];
                
                
                

                
                

                if(!$violation && !$sanctions){

                    $updateUser = "UPDATE forviolationentries SET Violations = '$violation2', Sanctions = '$sanctions2'
                    WHERE entry_id = $updateid";
                    mysqli_query($conn, $updateUser);
                    $sched = $conn->query("SELECT 
                    `entry_id`,
                    t1.studNum,
                    `Date`,
                    t5.fullName as fullName,
                    t5.Section as Section,
                    t4.v_code as v_code,
                    t4.Violations as Violations,
                    t6.Sanctions as Sanctions,
                    t2.pDescription AS p_description,
                    t3.code AS a_code,
                    status FROM forviolationentries t1
                    INNER JOIN forprogram t2 ON t1.pCode = t2.pID
                    INNER JOIN foracademicyear t3 ON t1.code = t3.code
                    INNER JOIN fortheviolations t4 ON t1.Violations = t4.v_code
                    INNER JOIN forstudents t5 ON t1.studNum = t5.studNum
                    INNER JOIN forthesanctions t6 ON t1.Sanctions = t6.s_id
                    WHERE
                    Date >= '2013-12-12'
                    ORDER BY entry_id DESC");
                }elseif(!$violation && $sanctions !=''){
                    $updateUser = "UPDATE forviolationentries SET Violations = '$violation2', Sanctions = '$sanctions'
                    WHERE entry_id = $updateid";
                    mysqli_query($conn, $updateUser);
                    $sched = $conn->query("SELECT 
                    `entry_id`,
                    t1.studNum,
                    `Date`,
                    t5.fullName as fullName,
                    t5.Section as Section,
                    t4.v_code as v_code,
                    t4.Violations as Violations,
                    t6.Sanctions as Sanctions,
                    t2.pDescription AS p_description,
                    t3.code AS a_code,
                    status FROM forviolationentries t1
                    INNER JOIN forprogram t2 ON t1.pCode = t2.pID
                    INNER JOIN foracademicyear t3 ON t1.code = t3.code
                    INNER JOIN fortheviolations t4 ON t1.Violations = t4.v_code
                    INNER JOIN forstudents t5 ON t1.studNum = t5.studNum
                    INNER JOIN forthesanctions t6 ON t1.Sanctions = t6.s_id
                    WHERE
                    Date >= '2013-12-12'
                    ORDER BY entry_id DESC");
                }elseif(!$sanctions && $violation !=''){
                    $updateUser = "UPDATE forviolationentries SET Violations = '$violation', Sanctions = '$sanctions2'
                    WHERE entry_id = $updateid";
                    mysqli_query($conn, $updateUser);
                    $sched = $conn->query("SELECT 
                    `entry_id`,
                    t1.studNum,
                    `Date`,
                    t5.fullName as fullName,
                    t5.Section as Section,
                    t4.v_code as v_code,
                    t4.Violations as Violations,
                    t6.Sanctions as Sanctions,
                    t2.pDescription AS p_description,
                    t3.code AS a_code,
                    status FROM forviolationentries t1
                    INNER JOIN forprogram t2 ON t1.pCode = t2.pID
                    INNER JOIN foracademicyear t3 ON t1.code = t3.code
                    INNER JOIN fortheviolations t4 ON t1.Violations = t4.v_code
                    INNER JOIN forstudents t5 ON t1.studNum = t5.studNum
                    INNER JOIN forthesanctions t6 ON t1.Sanctions = t6.s_id
                    WHERE
                    Date >= '2013-12-12'
                    ORDER BY entry_id DESC");

                }elseif($sanctions != '' && $violation !=''){
                    $updateUser = "UPDATE forviolationentries SET Violations = '$violation', Sanctions = '$sanctions'
                    WHERE entry_id = $updateid";
                    mysqli_query($conn, $updateUser);
                    $sched = $conn->query("SELECT 
                    `entry_id`,
                    t1.studNum,
                    `Date`,
                    t5.fullName as fullName,
                    t5.Section as Section,
                    t4.v_code as v_code,
                    t4.Violations as Violations,
                    t6.Sanctions as Sanctions,
                    t2.pDescription AS p_description,
                    t3.code AS a_code,
                    status FROM forviolationentries t1
                    INNER JOIN forprogram t2 ON t1.pCode = t2.pID
                    INNER JOIN foracademicyear t3 ON t1.code = t3.code
                    INNER JOIN fortheviolations t4 ON t1.Violations = t4.v_code
                    INNER JOIN forstudents t5 ON t1.studNum = t5.studNum
                    INNER JOIN forthesanctions t6 ON t1.Sanctions = t6.s_id
                    WHERE
                    Date >= '2013-12-12'
                    ORDER BY entry_id DESC");
                }

            }
            
        }
    }

?>
    <div class="body_container">
        <div class="content">
            <div class="title">
                <h1>Violation Entry</h1>
                <hr>
            </div>
            <!-- SEARCH BOX -->
            <div class="searchBar">
                <form action=""  method="POST">
                    <input class="srcinput" type="text" placeholder="Enter Student No." class="search" name="search" id="search">
                </form>
            </div>
            <!-- STUDENT INFO -->
            <div class="studentInfo">
                <form action="" method = "POST">
                    <!-- DATA MANIPULATION BUTTONS -->
                    <div class="action_content">
                        <div class="action_bttn">
                            <input class="bttn" type="button" name="save" value="Create" id="bttnModalEntry">
                        </div>
                        <div class="action_bttn">
                            <input class="bttn" type="button" name="delete" value="Delete">
                        </div>
                        <div class="action_bttn">
                            <input class="bttn" type="submit" name="but_update" value="Update">
                        </div>
                        <div class="action_bttn">
                            <input class="bttn" type="button" name="clear" value="Clear">
                        </div>
                    </div>
                
            </div>
            
            <!-- LIST / TABLE -->
            <div class="list_student_violation" >
                <h3 class="list_title">List</h3>
                <table class="display_violation_record" id = "table_data">
                    <thead>
                    <tr> 
                        <th class="violation_title" style="width: 40px" ><input type='checkbox' id='checkAll'>All</th>
                        <th class="violation_title">Student Number</th>
                        <th class="violation_title">Name</th>
                        <th class="violation_title">Course</th>
                        <th class="violation_title">Section</th>
                        <th class="violation_title">A.Y Code</th>
                        <th class="violation_title">Violation</th>
                        <th class="violation_title">Sanction</th>
                        <th class="violation_title">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        
                        
                        $SQL = $conn->query("SELECT 
                        `entry_id`,
                        t1.studNum,
                        `Date`,
                        t5.fullName as fullName,
                        t5.Section as Section,
                        t4.v_code as v_code,
                        t4.Violations as Violations,
                        t6.s_id as s_id,
                        t6.Sanctions as Sanctions,
                        t2.pDescription AS p_description,
                        t3.code AS a_code,
                        status FROM forviolationentries t1
                        INNER JOIN forprogram t2 ON t1.pCode = t2.pID
                        INNER JOIN foracademicyear t3 ON t1.code = t3.code
                        INNER JOIN fortheviolations t4 ON t1.Violations = t4.v_code
                        INNER JOIN forstudents t5 ON t1.studNum = t5.studNum
                        INNER JOIN forthesanctions t6 ON t1.Sanctions = t6.s_id
                        WHERE
                        Date >= '2013-12-12'
                        ORDER BY entry_id DESC
                        ");

                        if ($SQL->num_rows > 0) {
                            while ($row = $SQL->fetch_assoc()) {
                                $id = $row['entry_id'];
                                $violations = $row['Violations'];
                                $v_code = $row['v_code'];
                                $sanctions = $row['Sanctions'];
                                $s_id = $row['s_id'];

                        ?>
                        <tr>
                        <td class="violation_data"> <input type ='checkbox' name ='update[]' value='<?= $id ?>'></td>
                        <td class="violation_data"><?php echo $row['studNum']; ?> </td>
                        <td class="violation_data"><?php echo $row['fullName']; ?> </td>
                        <td class="violation_data"><?php echo $row['p_description']; ?> </td>
                        <td class="violation_data"><?php echo $row['Section']; ?> </td>
                        <td class="violation_data"><?php echo $row['a_code']; ?> </td>
                        <td class="violation_data"> <input type="hidden" name =  "vio2_<?= $id ?>" value='<?= $v_code ?>'>
                        <select class="curri_selection" name = "vio_<?= $id ?>">
                            
                            <option disabled value="<?= $v_code ?>" selected ="selected"><?php echo $violations?></option>
                                <?php 
                                
                                $query = "SELECT * from fortheviolations";
                                $result1 = mysqli_query($conn, $query);
                                while($row2 = mysqli_fetch_assoc($result1))
                                {?>
                                <option value="<?php echo $row2["v_code"];?>"
                                ><?php echo $row2['Violations']; ?></option>
                                <?php } ?>
                                
                            </select> </td>
                        <td class="violation_data"><input type="hidden" name =  "sanc2_<?= $id ?>" value='<?= $s_id ?>'>
                        <select class="curri_selection" name = "sanc_<?= $id ?>">
                            
                            <option disabled value="<?= $s_id ?>" selected ="selected"><?php echo $sanctions?></option>
                                <?php 
                                
                                $query = "SELECT * from forthesanctions";
                                $result1 = mysqli_query($conn, $query);
                                while($row2 = mysqli_fetch_assoc($result1))
                                {?>
                                <option value="<?php echo $row2["s_id"];?>"
                                ><?php echo $row2['Sanctions']; ?></option>
                                <?php } ?>
                                
                            </select> </td>
                        <td class="violation_data"><?php 
                       $date =  date("d/m/Y", strtotime($row['Date'])); 
                       echo $date; ?> 
                        </td>
                    </tr>
                            </tbody>
                    <?php
                            }
                        }
                        ?>
                </table>
                </form>
            </div>
        </div>
    </div>
    
    <?php
        include_once('assets/modal_add_vio_entry.php');
    ?>

    <script>
        $(document).ready(function(){
            $("#search").keyup(function(){
                var input = $(this).val();
                $.ajax({
                    method: 'POST',
                    url: 'search.php',
                    data:{input:input},
                    success: function(data){
                        $("#table_data").html(data);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
                    $(document).ready(function(){
                        // Check/Uncheck ALl
                        $('#checkAll').change(function(){
                            if($(this).is(':checked')){
                                $('input[name="update[]"]').prop('checked',true);
                            }else{
                                $('input[name="update[]"]').each(function(){
                                    $(this).prop('checked',false);
                                }); 
                            }
                        });
                        // Checkbox click
                        $('input[name="update[]"]').click(function(){
                            var total_checkboxes = $('input[name="update[]"]').length;
                            var total_checkboxes_checked = $('input[name="update[]"]:checked').length;
        
                            if(total_checkboxes_checked == total_checkboxes){
                                $('#checkAll').prop('checked',true);
                            }else{
                                $('#checkAll').prop('checked',false);
                            }
                        });
                    });
                </script>
</body>

</html>