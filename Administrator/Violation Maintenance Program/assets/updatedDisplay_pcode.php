<?php
    include_once 'dbconnection.php';

    $SQL = ("SELECT pID, pCode, pDescription FROM forprogram");
    $RESULT = mysqli_query($conn, $SQL);
    $resultchecker = mysqli_num_rows($RESULT);

    if ($resultchecker > 0) {
        ?>
        <tr>
            <th class="curriculum_title" style="width: 12%;">PCODE</th>
            <th class="curriculum_title">Description</th>
            <th class="curriculum_title" style="width: 12%;"> </th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($RESULT)) {
            ?>
            <tr id="editRows">
                <td class="curriculum_data pCode<?php echo $row['pID']; ?>" id="<?php echo $row['pCode']; ?>" ><?php echo $row['pCode'] . "<br>"; ?></td>
                <td class="curriculum_data pDescription<?php echo $row['pID']; ?>" id="<?php echo $row['pDescription']; ?>"> <?php echo $row['pDescription'] . "<br>"; ?> </td>
                <td class="curriculum_data"> <a class="c_data_bttn editBttn" id="<?php echo $row['pID']; ?>"><i class="fas fa-edit"></i></a></td>
            </tr>     
            <?php
        }
            
    }
?>