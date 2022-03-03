                        <tr> 
                            <th class="acadYear_title">AYCODE</th>
                            <th class="acadYear_title">Year From</th>
                            <th class="acadYear_title">Year To</th>
                            <th class="acadYear_title">Semester</th>
                        </tr>
                        <!-- DISPLAYING THE DATA TO WEB PAGE FROM DATA BASE  -->
                        <?php
                        include_once 'assets/dbconnection.php';
                        $SQL = $conn->query("SELECT code, yearFrom, yearTo, Semester FROM foracademicyear");
                
                        if ($SQL->num_rows > 0) {
                            while ($row = $SQL->fetch_assoc()) {
                                ?>
                        <tr>
                            <td class="acadYear_data"><?php  echo $row['code'] ."<br>";?></td>
                            <td class="acadYear_data"><?php  echo $row['yearFrom'] ."<br>";?></td>
                            <td class="acadYear_data"><?php  echo $row['yearTo'] ."<br>";?></td>
                            <td class="acadYear_data"><?php  echo $row['Semester'] ."<br>";?></td>
                        </tr>
                                <?php
                            }
                        
                        }
                        ?>