<tr>
    <th class="sanction_title">Sanction</th>
    <th class="sanction_title"> </th>
</tr>

<?php
include_once 'assets/dbconnection.php';
$SQL = "SELECT * FROM forthesanctions;";
$RESULT = mysqli_query($conn, $SQL);
$resultchecker = mysqli_num_rows($RESULT);

if ($resultchecker > 0) {

    while ($row = mysqli_fetch_assoc($RESULT)) {

?>
   <tr>
        <td class="sanction_data"><?php echo $row['Sanctions'] . "<br>"; ?></td>
        <td class="sanction_data">
        <!--<a href="assets/delete_sanc.php?Sanctions=<;?php echo $row['Sanctions']; ?>" class="s_data_bttn"><i class="fas fa-trash-alt"></i></a>-->
        <a id="<?php echo $row['s_id']; ?>" class="s_data_bttn"><i class="fas fa-trash-alt"></i></a>
        </td>
    </tr>
<?php
    }
}
?>