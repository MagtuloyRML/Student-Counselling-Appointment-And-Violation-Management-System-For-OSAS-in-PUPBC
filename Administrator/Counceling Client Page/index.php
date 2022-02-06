<?php
    $title = 'Counceling Client';
    $page = 'ca_client';
    include_once('../includes/header.php');
?>
    <div class="content">
        <div class="client_content">
            <div class="title">
                <h1>Client Page</h1>
                <hr>
            </div>

            <div class="searchBar">
                <form action="">
                    <input type="text" placeholder="Search" class="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>

            <div class="list_client">
                <h3 class="list_title">Monitored Client</h3>
                <table class="display_client">
                    <tr> 
                        <th class="client_title">Name</th>
                        <th class="client_title">Course</th>
                        <th class="client_title">Section</th>
                        <th class="client_title">A.Y Code</th>
                        <th class="client_title">Violation</th>
                        <th class="client_title">Sanction</th>
                        <th class="client_title">Date</th>
                    </tr>
                    <tr>
                        <td class="client_data">data</td>
                        <td class="client_data">data</td>
                        <td class="client_data">data</td>
                        <td class="client_data">data</td>
                        <td class="client_data">data</td>
                        <td class="client_data">data</td>
                        <td class="client_data">data</td>
                    </tr>
                </table>
            </div>

        </div>

    </div>
</body>

</html>