<?php
    $title = 'Maintenance';
    $page = 'v_maintenance';
    include_once('../includes/header.php');
?>

<?php
    $sub_page = 'vmain_acad_yr';
    include_once('../includes/sub_nav.php');
?>

            <div class="subcontent">
                <div class="title">
                    <h1>Academic Year</h1>
                    <hr>
                </div>

                <div class="ac_bttn_group">
                    <a href="#" class="ac_bttn" id="openModal_input_ay_details">
                        <i class="fas fa-plus-square"></i>
                        Create
                    </a>
                </div>

                <div class="ac_table_content">
                    <table class="ac_table">
                        <tr> 
                            <th class="acadYear_title"> </th>
                            <th class="acadYear_title">AYCODE</th>
                            <th class="acadYear_title">Year From</th>
                            <th class="acadYear_title">Year To</th>
                            <th class="acadYear_title">Semester</th>
                        </tr>
                        <!-- DISPLAYING THE DATA TO WEB PAGE FROM DATA BASE  -->
                        <?php
                        include_once 'assets/dbconnection.php';
                        $SQL = $conn->query("SELECT code, yearFrom, yearTo, Semester FROM foracademicyear");
                
                        if ($SQL->num_rows > 0) {
                            while ($row = $SQL->fetch_assoc()) {
                                ?>
                        <tr>
                            <td class="acadYear_data"> </td>
                            <td class="acadYear_data"><?php  echo $row['code'] ."<br>";?></td>
                            <td class="acadYear_data"><?php  echo $row['yearFrom'] ."<br>";?></td>
                            <td class="acadYear_data"><?php  echo $row['yearTo'] ."<br>";?></td>
                            <td class="acadYear_data"><?php  echo $row['Semester'] ."<br>";?></td>
                        </tr>
                                <?php
                            }
                        
                        }
                        ?>
                    </table>
                </div>

            </div>
    </div>

    <?php
        include_once('assets/modal_ay_details.php');
    ?>

    

</body>

</html>