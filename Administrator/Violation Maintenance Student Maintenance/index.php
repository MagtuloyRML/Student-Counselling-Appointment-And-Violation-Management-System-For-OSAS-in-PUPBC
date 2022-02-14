<?php
    $title = 'Maintenance';
    $page = 'maintenance';
    include_once('../includes/header.php');
?>

<?php
    $sub_page = 'vmain_stud_main';
    include('../includes/sub_nav.php');
?>

<?php 
    include 'assets/dbconnection.php';
    $enrolled = 'Enrolled';
    $disabled = 'Disabled';
    $sched = $conn->query("SELECT 
    `id`,
    `studNum`,
    `lastName`,
    `firstName`,
    `middleName`,
    `Section`,
    `Address`,
    `Gender`,
    t2.pCode AS p_description,
    t3.code AS a_code,
    status FROM forstudents t1
    INNER JOIN forprogram t2 ON t1.progCode = t2.pCode
    INNER JOIN foracademicyear t3 ON t1.ayCode = t3.code
    
    WHERE `status` = '$enrolled' OR `status` = '$disabled'");

    //search button and drop down button
    if(isset($_POST['submit'])){
        $searched = $_POST['search_box'];
        $searched2 = $_POST['fetchval'];

        $sched = $conn->query("SELECT 
        `id`,
        `studNum`,
        `lastName`,
        `firstName`,
        `middleName`,
        `Section`,
        `Address`,
        `Gender`,
        t2.pCode AS p_description,
        t3.code AS a_code,
        status FROM forstudents t1
        INNER JOIN forprogram t2 ON t1.progCode = t2.pCode
        INNER JOIN foracademicyear t3 ON t1.ayCode = t3.code
        

        WHERE lastName = '{$searched}' 
        OR firstName = '{$searched}'
        OR  pCode ='{$searched2}'");


    }
    //update student button
    if (isset($_POST['but_update'])){
        if(isset($_POST['update'])){
            foreach ($_POST['update'] as $updateid){
                
                $ln = $_POST['lastName_'.$updateid];
                $fn = $_POST['firstName_'.$updateid];
                $mn = $_POST['middleName_'.$updateid];
                $curriculum = $_POST['curri_'.$updateid];
                $curriculum2 = $_POST['curri2_'.$updateid];
                $sec = $_POST['section_'.$updateid];
                $add = $_POST['address_'.$updateid];
                $fullName = $ln . ", " . $fn . " " . $mn;

                
                

                if($curriculum !=''){

                    $updateUser = "UPDATE forstudents SET fullName = '$fullName', 
                    lastName = '$ln', 
                    firstName = '$fn',
                    middleName = '$mn',
                    progCode = '$curriculum',
                    Section = '$sec',
                    Address = '$add'
                    WHERE id = $updateid";
                    mysqli_query($conn, $updateUser);
                    $sched = $conn->query("SELECT 
                    `id`,
                    `studNum`,
                    `lastName`,
                    `firstName`,
                    `middleName`,
                    `Section`,
                    `Address`,
                    `Gender`,
                    t2.pCode AS p_description,
                    t3.code AS a_code,
                    status FROM forstudents t1
                    INNER JOIN forprogram t2 ON t1.progCode = t2.pCode
                    INNER JOIN foracademicyear t3 ON t1.ayCode = t3.code WHERE `status` = '$enrolled' OR `status` = '$disabled'");
                }else{
                    $updateUser = "UPDATE forstudents SET fullName = '$fullName', 
                    lastName = '$ln', 
                    firstName = '$fn',
                    middleName = '$mn',
                    progCode = '$curriculum2',
                    Section = '$sec',
                    Address = '$add'
                    WHERE id =$updateid";
                    mysqli_query($conn, $updateUser);
                    $sched = $conn->query("SELECT 
                    `id`,
                    `studNum`,
                    `lastName`,
                    `firstName`,
                    `middleName`,
                    `Section`,
                    `Address`,
                    `Gender`,
                    t2.pCode AS p_description,
                    t3.code AS a_code,
                    status FROM forstudents t1
                    INNER JOIN forprogram t2 ON t1.progCode = t2.pCode
                    INNER JOIN foracademicyear t3 ON t1.ayCode = t3.code WHERE `status` = '$enrolled' OR `status` = '$disabled'");
                }

            }
            
        }
    }

?>

            <div class="subcontent">
                <div class="sub_nav">
                    <a href="../Violation Maintenance Student Maintenance/" class="sub_nav_bttn_active">
                        Update Student
                    </a>
                    <a href="../Violation Maintenance Student Maintenance Section Year/" class="sub_nav_bttn">
                        Update Section/Year
                    </a>
                    <a href="../Violation Maintenance Student Maintenance Status/" class="sub_nav_bttn">
                        Update Status
                    </a>
                </div>


                <div class="sub_top_content">
                    <div class="student_input_group">
                   <form action = "" method = "POST">
                        <div class="student_input">
                            <label for="#" class="label">Search:</label>
                            <input type="text" class="input_field" id="search_box" name="search_box" class="">
                            <button type="submit" name="submit" value=">>" class="srch_bttn"><i class="fas fa-search"></i></button>
                        </div>
                        
                        <div class="student_select">
                            <span class="label">Filter by</span>
                            
                            <select class="curri_selection" name = "fetchval" id="fetchval">
                            
                            <option disabled value="" selected ="selected">Curriculum</option>
                                <?php 
                                
                                $query = "SELECT * from forprogram";
                                $result1 = mysqli_query($conn, $query);
                                while($row2 = mysqli_fetch_assoc($result1))
                                {?>
                                <option value="<?php echo $row2["pCode"];?>"
                                ><?php echo $row2['pCode']; ?></option>
                                <?php } ?>
                                
                            </select>
                            <button type="submit" name="submit" value=">>" class="srch_bttn"><i class="fas fa-search"></i></button>
                        </div>
                        
                    </div>

                    <div class="student_main_bttn_group">
                    <button type ="submit" id="but_update" name = "but_update" class="stud_bttn">
                            <i class="fas fa-save"></i>
                            Save
                            </button>
                    </div>
                    
                </div>
                    


                <div class="stud_table_content">
                    <table class="stud_table">
                        <tr> 
                            <th class="stud_title" style="width: 40px" ><input type='checkbox' id='checkAll'>All</th>
                            <th class="stud_title">Student Num</th>
                            <th class="stud_title">Last Name</th>
                            <th class="stud_title">First Name</th>
                            <th class="stud_title">Middle Name</th>
                            <th class="stud_title">Curriculum</th>
                            <th class="stud_title">Section</th>
                            <th class="stud_title">Address</th>
                            <th class="stud_title">Gender</th>
                            
                        </tr>
                        <?php
                            
                            while($row = $sched->fetch_array()){
                                $id = $row['id'];
                            $lastName = $row['lastName'];
                            $firstName = $row['firstName'];
                            $middleName = $row['middleName'];
                            $curri = $row['p_description'];
                            $section = $row['Section'];
                            $address = $row['Address'];
				        ?>
                        <tr>
                            <td class="stud_data"> <input type ='checkbox' name ='update[]' value='<?= $id ?>'></td>
                            <td class="stud_data"> <?php echo $row['studNum']?> </td>
                            <td class="stud_data"> <input type ='text' name ='lastName_<?= $id ?>' value='<?= $lastName ?>'></td>
                            <td class="stud_data"> <input type ='text' name ='firstName_<?= $id ?>' value='<?= $firstName ?>'> </td>
                            <td class="stud_data"> <input type ='text' name ='middleName_<?= $id ?>' value='<?= $middleName ?>'>  </td>
                            <td class="stud_data">  <input type="hidden" name =  "curri2_<?= $id ?>" value='<?= $curri ?>'>
                                <select class="curri_selection" name = "curri_<?= $id ?>">
                            
                            <option disabled value="<?= $curri ?>" selected ="selected"><?php echo $curri?></option>
                                <?php 
                                
                                $query = "SELECT * from forprogram";
                                $result1 = mysqli_query($conn, $query);
                                while($row2 = mysqli_fetch_assoc($result1))
                                {?>
                                <option value="<?php echo $row2["pCode"];?>"
                                ><?php echo $row2['pCode']; ?></option>
                                <?php } ?>
                                
                            </select> </td>
                            
                            <td class="stud_data"> <input type ='text' name ='section_<?= $id ?>' value='<?= $section ?>'> </td>
                            <td class="stud_data" style="width: 33%;"> <input type ='text' name ='address_<?= $id ?>' value='<?= $address ?>'> </td>
                            <td class="stud_data"> <?php echo $row['Gender']?> </td>
                            
                        </tr>
                        <?php
							}
				        ?>
                    </table>
                    </form>
                </div>
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
            </div>
        </div>
        
    </div>


</body>

</html>