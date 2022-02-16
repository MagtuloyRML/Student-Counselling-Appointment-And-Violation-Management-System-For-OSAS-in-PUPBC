<html>

<head>
    <?php
    $title = 'Violation Records';
    $page = 'v_rec';
    include_once('../includes/header.php');
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="body_container">

        <div class="content_rec">
            <div class="title">
                <h1>Violation Records</h1>
                <hr>
            </div>
            <div class="violation_records_content">
                <!--<form action="">-->

                <div class="records_action_prop">

                    <div class="records_filter">
                        <label for="">Filter A.Y Record: </label>
                        <select class="input_field" name="getayCode" id="getayCode">

                            <option disabled selected> --Academic Year </option>
                            <?php
                            include_once 'assets/dbconnection.php';

                            $query = "SELECT * from forviolationentries";
                            $result1 = mysqli_query($conn, $query);
                            while ($row2 = mysqli_fetch_assoc($result1)) {
                            ?>

                                <option value="<?php echo $row2["code"]; ?>"> <?php echo $row2['code']; ?> </option>

                            <?php
                            }
                            ?>

                        </select>

                    </div>

                    <div class="records_print_bttn">
                        <a href="#" class="bttn" id="print_record_btn">
                            <i class="fas fa-print"></i>
                            Print Record
                        </a>
                    </div>
                </div>

                <!-- TABLE # 1 -->
                <div class="list_student_violation">
                    <!--<h3 class="list_title">List</h3>-->
                    <table class="display_violation_record">
                        <tr>
                            <th class="violation_title">Student Number</th>
                            <th class="violation_title">Name</th>
                            <th class="violation_title">Program</th>
                            <th class="violation_title">Section</th>
                            <th class="violation_title">Violations</th>
                            <th class="violation_title">Sanctions</th>
                            <th class="violation_title">A.Y. Code</th>
                            <th class="violation_title">Date</th>

                        </tr>
                        <tbody>
                            <tr>
                                <?php
                                include_once 'assets/dbconnection.php';

                                $SQL = $conn->query("SELECT 
                        `entry_id`,
                        t1.studNum,
                        `Date`,
                        t5.fullName as fullName,
                        t5.Section as Section,
                        t4.Violations as Violations,
                        t6.Sanctions as Sanctions,
                        t2.pDescription AS p_description,
                        t3.code AS code,
                        status FROM forviolationentries t1
                        INNER JOIN forprogram t2 ON t1.pCode = t2.pCode
                        INNER JOIN foracademicyear t3 ON t1.code = t3.code
                        INNER JOIN fortheviolations t4 ON t1.Violations = t4.v_code
                        INNER JOIN forstudents t5 ON t1.studNum = t5.studNum
                        INNER JOIN forthesanctions t6 ON t1.Sanctions = t6.s_id
                        WHERE
                        Date >= '2013-12-12'
                        ORDER BY entry_id DESC");

                                if ($SQL->num_rows > 0) {
                                    while ($row = $SQL->fetch_assoc()) {
                                ?>
                            <tr>
                                <td class="violation_data"><?php echo $row['studNum']; ?> </td>
                                <td class="violation_data"><?php echo $row['fullName']; ?> </td>
                                <td class="violation_data"><?php echo $row['p_description']; ?> </td>
                                <td class="violation_data"><?php echo $row['Section']; ?> </td>
                                <td class="violation_data"><?php echo $row['Violations']; ?> </td>
                                <td class="violation_data"><?php echo $row['Sanctions']; ?> </td>
                                <td class="violation_data"><?php echo $row['code']; ?> </td>
                                <td class="violation_data"><?php
                                                            $date =  date("d/m/Y", strtotime($row['Date']));
                                                            echo $date; ?>
                                </td>
                            </tr>
                    <?php
                                    }
                                }
                    ?>
                    </tr>
                        </tbody>
                    </table>
                </div>




            </div>

        </div>
    </div>
    <?php

    include_once('assets/modal_print_records.php');
    ?>
    <script type="text/javascript">
        // AJAX FOR FILTER
        $(document).ready(function() {

            $("#getayCode").on('change', function() {

                var value = $(this).val();
                // alert(value);

                $.ajax({
                    url: "assets/filter.php",
                    type: "POST",
                    data: 'request=' + value,

                    beforeSend: function() {
                        $(".container").html("<span>Working...</span>");
                    },
                    success: function(data) {
                        $(".container").html(data);
                    }
                });
            });
        });
    </script>

</body>

</html>