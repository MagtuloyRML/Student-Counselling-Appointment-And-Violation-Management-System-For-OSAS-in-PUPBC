<?php
    $title = 'Violation Entry';
    $page = 'v_entry';
    include_once('../includes/header.php');
    include 'assets/dbconnection.php';
   

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
                        <th class="violation_title">Student Number</th>
                        <th class="violation_title">Name</th>
                        <th class="violation_title">Course</th>
                        <th class="violation_title">Section</th>
                        <th class="violation_title">A.Y Code</th>
                        <th class="violation_title">Violation</th>
                        <th class="violation_title">Sanction</th>
                        <th class="violation_title">Date</th>
                        <th class="violation_title">Edit</th>
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
                        <td class="violation_data"><?php echo $row['studNum']; ?> </td>
                        <td class="violation_data"><?php echo $row['fullName']; ?> </td>
                        <td class="violation_data"><?php echo $row['p_description']; ?> </td>
                        <td class="violation_data"><?php echo $row['Section']; ?> </td>
                        <td class="violation_data"><?php echo $row['a_code']; ?> </td>
                        <td class="violation_data"> <?php echo $violations; ?> </td>
                        <td class="violation_data"><?php echo $sanctions; ?></td>
                        <td class="violation_data"><?php 
                       $date =  date("d/m/Y", strtotime($row['Date'])); 
                       echo $date; ?> 
                        </td>
                        <td class="violation_data"><a href="assets/modal_edit_curriculum.php?edit=<?php echo $id; ?>" class="c_data_bttn" id="modal_editBTTN"><i class="fas fa-edit"></i></a></td>
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
</body>

</html>