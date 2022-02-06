<?php
    $title = 'Counceling Apointment Dashboard';
    $page = 'ca_appoint_sched';
    $id = 'ap_dash';
    $online_script = '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>';
    include_once('../includes/header.php');
?>

<?php 
        include('../../assets/connection/DBconnection.php');
        // para magather yung data
        $query = $conn->query("SELECT * FROM schedules ORDER BY id");
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
    <div class="container1">
        <div class="content">
            <div class="title">
                <h1>Appointment Scheduling Calendar</h1>
                <hr>
            </div>
            <div class="calendar" id="calendar">
            </div>
        </div>
        
        
    </div>
</body>

</html>