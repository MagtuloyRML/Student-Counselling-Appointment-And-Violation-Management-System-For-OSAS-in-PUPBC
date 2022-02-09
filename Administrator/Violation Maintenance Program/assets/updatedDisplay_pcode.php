<?php
    include_once 'dbconnection.php';

    $SQL = ("SELECT pID, pCode, pDescription FROM forprogram");
    $RESULT = mysqli_query($conn, $SQL);
    $resultchecker = mysqli_num_rows($RESULT);

    if ($resultchecker > 0) {
        ?>
        <tr>
            <th class="curriculum_title">PCODE</th>
            <th class="curriculum_title">Description</th>
            <th class="curriculum_title"> </th>
            <th class="curriculum_title"> </th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($RESULT)) {
            ?>
            <tr id="editRows">
                <td class="curriculum_data"><?php echo $row['pCode'] . "<br>"; ?></td>
                <td class="curriculum_data"> <?php echo $row['pDescription'] . "<br>"; ?> </td>
                <td class="curriculum_data"> <a href="assets/delete.php?progCode=<?php echo $row['pCode']; ?>" class="c_data_bttn"><i class="fas fa-trash-alt"></i></a></td>
                <td class="curriculum_data"> <a href="index.php?edit=<?php echo $row['pID']; ?>" class="c_data_bttn"><i class="fas fa-edit"></i></a></td>
            </tr>        
            <?php
        }
            
    }
?>