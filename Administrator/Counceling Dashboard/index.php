<?php
    $title = 'Counceling Apointment Dashboard';
    $page = 'ca_home';
    include_once('../includes/header.php');
?> 
    <div class="body_container">
        <div class="content">
            <div class="approv_content">
                <div class="title">
                    <h1>Counceling Dashboard</h1>
                    <hr>
                </div>
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

                <div class="charts_container">
                    <div class="chart_content">
                        <p class="chart_label">Line Graph</p>
                        <div class="canvas_holder">
                            <canvas class="graph" id="lineGraph"></canvas>
                        </div>
                    </div>
                    
                    <div class="chart_content ">
                        <p class="chart_label">Bar Graph</p>
                        <div class="canvas_holder ">
                            <canvas class="graph" id="Bar"></canvas>
                        </div>
                    </div>

                    <div class="chart_content donut">
                        <p class="chart_label">Pie Chart</p>
                        <div class="canvas_holder ">
                            <canvas class="graph" id="doughnutGraph"></canvas>
                        </div>
                    </div>

                </div>
                

            </div>
        </div>
    </div>

    <script src="assets/js/main.js"></script>
    <script>
        const ctxdonut = document.getElementById('doughnutGraph').getContext('2d');
        const doughnutGraph = new Chart(ctxdonut, {
            type: 'doughnut',
            data: {
                labels: ['Red', 'Blue', 'Yellow'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235)',
                        'rgba(255, 206, 86)'
                    ]
                   
                }]
            },
            
        });

        const ctxline = document.getElementById('lineGraph').getContext('2d');
        const lineGraph = new Chart(ctxline, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235)',
                        'rgba(255, 206, 86)',
                        'rgba(75, 192, 192)',
                        'rgba(153, 102, 255)',
                        'rgba(255, 159, 64)'
                    ]
                   
                }]
            },
            
        });

        const ctx = document.getElementById('Bar').getContext('2d');
        const Bar = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235)',
                        'rgba(255, 206, 86)',
                        'rgba(75, 192, 192)',
                        'rgba(153, 102, 255)',
                        'rgba(255, 159, 64)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    
</body>

</html>