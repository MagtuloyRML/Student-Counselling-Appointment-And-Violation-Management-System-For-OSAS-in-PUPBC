<?php
    $title = 'Counceling Apointment Dashboard';
    $page = 'ca_appoint_sched';
    $id = 'ap_dash';
    $online_script = '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>';
    include_once('../includes/header.php');
    $s_id = $_SESSION['AdminID'];
    $sql_fetch = mysqli_query($conn, "SELECT * from adminaccountinfo WHERE AdminAccountID = '$s_id'");
    
    while($row = mysqli_fetch_assoc($sql_fetch))
    {
        $name = $row['AdminAccountID'];
    }
?>

<?php 
        include('../../assets/connection/DBconnection.php');
        // para magather yung data
        date_default_timezone_set("Asia/Manila");
        $query = $conn->query("SELECT * FROM schedules WHERE remarks = '$name' AND stat = 'Confirmed' OR stat = 'Pending' ORDER BY id");
        //$today = date("Y-m-d H:i:s");
        $check = $conn->query("SELECT * FROM schedules WHERE end_app < NOW() AND stat = 'Confirmed' ORDER BY id");
        if(mysqli_num_rows($check) > 0){
            $expire = "UPDATE schedules SET stat = 'Done' WHERE end_app < NOW() AND stat = 'Confirmed' ";
            $run = mysqli_query($conn,$expire);
        }

?>

    <script>
            $(document).ready(function(){
                var calendar = $('#calendar').fullCalendar({
                    editable: true,
                    header:{
                        left: 'prev, next today',
                        center: 'title',
                        right: 'month, agendaWeek, agendaDay'
                        },
                        /* Function para magamit data sa db and idisplay*/
                        events: 
                        [<?php while($row = $query -> fetch_object()) {?>
                        {
                            id : '<?php echo $row->id;?>', title: '<?php echo $row->title;?>',
                            start : '<?php echo $row->start_app;?>', end: '<?php echo $row->end_app;?>', 
                        }, 
                        <?php }?>],
                        selectable: false,
                        selectHelper: true,
                         /* may error pa dito 
                         select: function(start, end, allDay)
                        {
                            /* Function para mag insert ng data 
                            var title = prompt("Enter Event Title");
                            if(title)
                            {
                                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                                $.ajax(
                                {
                                url:"insert.php",
                                type:"POST",
                                data:{title:title, start:start, end:end},
                                success:function(data)
                                    {
                                    calendar.fullCalendar('refetchEvents');
                                    alert("Added Successfully");
                                    window.location.replace("test3.php");
                                    }
                                }
                            }
                        }, */

                });
            });
        </script>
    <div class="body_container">
        <div class="content">
            <div class="title">
                <h1>Appointment</h1>
                <hr>
            </div>
            <div class="subcontent">
                <?php
                    $sub_page = 'dash_app';
                    include '../includes/appoitment_sub_nav.php';
                ?>
                <h3 class="subtitle">Scheduling Calendar</h3>
                <div class="calendar" id="calendar">

                </div>

            </div>

        </div>
        
    </div>
    <script src="assets/js/main.js"></script>
</body>

</html>