<?php
    $title = 'Violation Entry';
    $page = 'v_entry';
    include_once('../includes/header.php');
?>
    <div class="body_container">
        <div class="content">
            <div class="title">
                <h1>Violation Entry</h1>
                <hr>
            </div>
            <!-- SEARCH BOX -->
            <div class="searchBar">
                <form action="">
                    <input type="text" placeholder="Search" class="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <!-- STUDENT INFO -->
            <div class="studentInfo">
                <form action="" method="">
                    <div class="stud_content">
                        <div class="input_container">
                            <label for="#">Student Name: </label>
                            <br>
                            <input type="text" id="#" name="name" value="">
                        </div>
                        <div class="input_container">
                            <label for="#">Student Course: </label>
                            <br>
                            <input type="text" id="#" name="name" value="">
                        </div>
                        <div class="input_container">
                            <label for="#">Student Section: </label>
                            <br>
                            <input type="text" id="#" name="name" value="">
                        </div>
                        <div class="input_container">
                            <label for="#">Aycode: </label>
                            <br>
                            <input type="text" id="#" name="name" value="">
                        </div>
                        <div class="input_container">
                            <label for="#">Violation: </label>
                            <br>
                            <input type="text" id="#" name="name" value="">
                        </div>
                        <div class="input_container">
                            <label for="#">Sanction: </label>
                            <br>
                            <input type="text" id="#" name="name" value="">
                        </div>
                        <div class="input_container">
                            <label for="#">Date: </label>
                            <br>
                            <input type="text" id="#" name="name" value="">
                        </div>
                    </div>
                    <!-- DATA MANIPULATION BUTTONS -->
                    <div class="action_content">
                        <div class="action_bttn">
                            <input class="bttn" type="button" name="save" value="Save" id="bttnModalEntry">
                        </div>
                        <div class="action_bttn">
                            <input class="bttn" type="button" name="delete" value="Delete">
                        </div>
                        <div class="action_bttn">
                            <input class="bttn" type="button" name="update" value="Update">
                        </div>
                        <div class="action_bttn">
                            <input class="bttn" type="button" name="clear" value="Clear">
                        </div>
                    </div>
                </form>
            </div>
            
            <!-- LIST / TABLE -->
            <div class="list_student_violation">
                <h3 class="list_title">List</h3>
                <table class="display_violation_record">
                    <tr> 
                        <th class="violation_title">Name</th>
                        <th class="violation_title">Course</th>
                        <th class="violation_title">Section</th>
                        <th class="violation_title">A.Y Code</th>
                        <th class="violation_title">Violation</th>
                        <th class="violation_title">Sanction</th>
                        <th class="violation_title">Date</th>
                    </tr>
                    <tr>
                        <td class="violation_data">data</td>
                        <td class="violation_data">data</td>
                        <td class="violation_data">data</td>
                        <td class="violation_data">data</td>
                        <td class="violation_data">data</td>
                        <td class="violation_data">data</td>
                        <td class="violation_data">data</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <?php
        include_once('assets/modal_add_vio_entry.php');
    ?>


</body>

</html>