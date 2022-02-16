<?php
    $title = 'Maintenance';
    $page = 'maintenance';
    include_once('../includes/header.php');
?>

<?php
    $sub_page = 'vmain_program';
    include('../includes/sub_nav.php');
?>

            <div class="subcontent">
                <div class="title">
                    <h1>Program</h1>
                    <hr>
                </div>

                <div class="c_bttn_group">
                    <a href="#" class="c_bttn" id="upload_bttn">
                        <i class="fas fa-upload"></i>
                        Upload
                    </a>
                    <a href="#" class="c_bttn" id="openModal_add_curriculum">
                        <i class="fas fa-plus-square"></i>
                        Create
                    </a>
                </div>

                <div class="c_table_content">
                    <table class="c_table" id="table">
                        <tr>
                            <th class="curriculum_title" style="width: 12%;">PCODE</th>
                            <th class="curriculum_title">Description</th>
                            <th class="curriculum_title" style="width: 12%;"> </th>
                            <th class="curriculum_title" style="width: 12%;"> </th>
                        </tr>
                        <!-- DISPLAYING THE DATA TO WEB PAGE FROM DATA BASE -->
                        <?php
                        include_once 'assets/dbconnection.php';
                        $SQL = $conn->query("SELECT * FROM forprogram");

                        if ($SQL->num_rows > 0) {
                            while ($row = $SQL->fetch_assoc()) {
                        ?>
                            <tr id="editRows">
                                <td class="curriculum_data" ><?php echo $row['pCode'] . "<br>"; ?></td>
                                <td class="curriculum_data"> <?php echo $row['pDescription'] . "<br>"; ?> </td>
                                <td class="curriculum_data"> <a href="assets/delete_program.php?delete=<?php echo $row['pID']; ?>" class="c_data_bttn"><i class="fas fa-trash-alt"></i></a></td>
                                <td class="curriculum_data"> <a href="assets/modal_edit_curriculum.php?edit=<?php echo $row['pID']; ?>" class="c_data_bttn" id="modal_editBTTN"><i class="fas fa-edit"></i></a></td>
                            </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>

            </div>
      
        </div>
    </div>

    <?php
        include('assets/modal_add_curriculum.php');
        include('assets/modal_upload_curri.php');

    ?>
    
</body>

</html>