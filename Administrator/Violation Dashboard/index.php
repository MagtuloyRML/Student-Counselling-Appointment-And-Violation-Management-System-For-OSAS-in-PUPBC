<?php
    $title = 'Violation Dashboard';
    $page = 'v_home';
    include_once('../includes/header.php');
?>
    <div class="body_container" onload="initClock()">
        <div class="container">
            <div class="title">
                <h1>DashBoard</h1>
                <hr>
            </div>
            <div class="divider">
                <!-- Date, Day, and Time day VISUALIZATION -->
                <div class="dash_content time_date" >

                    <div class="datetime">
                        <div class="date">
                            <span id="dayname">Day</span>,
                            <span id="month">Month</span>
                            <span id="daynum">00</span>,
                            <span id="year">Year</span>
                        </div>
                        <div class="time">
                            <span id="hour">00</span>:
                            <span id="minutes">00</span>:
                            <span id="seconds">00</span>
                            <span id="period">AM</span>
                        </div>
                    </div>
                    
                </div>
                <!-- A.Y CODE VISUALIZATION -->
                <div class="dash_content">
                    <h3><i class="fas fa-school"></i>Academic Year: </h3>
                    <p>00000000</p>
                </div>

                <!-- TOTAL NUMBERS OF STUDENT VISUAL DATA  -->
                <div class="dash_content">
                    <h3><i class="fas fa-user-graduate"></i>Total Student: </h3>
                    <p>00000000</p>
                </div>
                <!-- TOTAL NUMBERS OF VIOLATION VISUAL DATA  -->
                <div class="dash_content">
                    <h3><i class="fas fa-exclamation-circle"></i>Total Violation: </h3>
                    <p>00000000</p>
                </div>
            </div>
            
        </div>
    </div>
    
    <script src="assets/js/time_date.js"></script>
</body>
</html>
