<?php
    $title = 'Counceling Client Information';
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
                <a href="../Counceling Client Page/" class="back_bttn"><i class="fas fa-arrow-left"></i></a>
                <form action="">
                    <input type="text" placeholder="Search" class="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>

            <div class="client_info">
                <div class="profile_info">
                    <div class="profile_pic">
                        <form action="#">
                            <!--lagayan ng profile pic-->
                            <img class="prof_pic" src="#" alt="Profile Pic">
                        </form>
                    </div>
                </div>

                <div class="profile_info">
                    <form action="#">
                        <!--Edit nyo nalang yun needed information dito-->
                        <div class="input-container">
                            <label class="label" for="#">Name: </label>
                            <input class="input-field" id="#" type="text" placeholder="Admin Username" name="usrnm">
                        </div>
                        <div class="input-container">
                            <label class="label" for="#">Name: </label>
                            <input class="input-field" id="#" type="text" placeholder="Admin Username" name="usrnm">
                        </div>
                        <div class="input-container">
                            <label class="label" for="#">Name: </label>
                            <input class="input-field" id="#" type="text" placeholder="Admin Username" name="usrnm">
                        </div>
                        <div class="input-container">
                            <label class="label" for="#">Name: </label>
                            <input class="input-field" id="#" type="text" placeholder="Admin Username" name="usrnm">
                        </div>
                        <div class="input-container">
                            <label class="label" for="#">Name: </label>
                            <input class="input-field" id="#" type="text" placeholder="Admin Username" name="usrnm">
                        </div>
                    </form>
                 </div>
            </div>

            <div class="list_client">
                <h3 class="list_title">Appointment Records</h3>
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