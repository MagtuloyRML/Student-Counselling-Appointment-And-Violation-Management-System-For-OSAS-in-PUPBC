<?php
    $title = 'Maintenance Counceling Schedule';
    $page = 'maintenance';
    include_once('../includes/header.php');

    $id = $_SESSION['AdminID'];
    $sql_fetch = mysqli_query($conn, "SELECT * from adminaccountinfo WHERE AdminAccountID = '$id'");
    $name = "";
    while($row = mysqli_fetch_assoc($sql_fetch))
    {
        $name = $row['AdminAccountID'];
    }

?>
    <div class="body_container">
        <div class="content">
            <div class="title">
                <h1>Counceling Maintenance</h1>
                <hr>
            </div>
            <div class="subcontent">
                <?php
                    $sub_page = 'cmain_link';
                    include '../includes/cmain_sub_nav.php';
                ?>
                <div class="title">
                    <h1>Evaulator's Zoom Link:</h1>
                    <hr>
                </div>
                <form id="zlinkForm" action ="assets/insertAvail_sched.php" method = "POST">
                    <?php            
                        $query = "SELECT * from counsellingzoomlink where AdminAccountID = '$name'";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_assoc($result);
                        
                        $zoomLink = $row['CounseZLink'];
                        
                    ?>
                        
                    <div class="input_group">
                        
                        <div class="input_container">
                            <input class="input" type="hidden" id="id" name="id" value="<?= $name ?>">
                            <label for="#" class="label">Zoom Link: </label>
                            <div class="input " id="input_roleName">
                                <input class="input-field" type="text" placeholder="Insert Zoom Link" name="zlink" id="zlink" value="<?php echo $zoomLink;?>">
                                <i class="fa-solid fa-asterisk"></i>
                                <i id="i_zlink" class="fa-solid "></i>
                            </div>
                        </div>
                        
                        
                    </div> 
                    <div class="action_content">
                        <button class= "bttn" type="submit" name="submit" id="submit"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script src="assets/js/main.js"></script>

</body>
</html>