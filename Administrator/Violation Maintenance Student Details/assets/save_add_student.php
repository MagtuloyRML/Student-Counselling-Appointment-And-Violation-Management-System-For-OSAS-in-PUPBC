<?php
    // INSERTING THE DATA TO DATA BASE
        include_once 'dbconnection.php';
    
        $query = "SELECT * FROM forstudents order by id desc limit 1";
        $res = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($res);
        $lastid = $row['id'];

        $stud_id = ($lastid + 1);

        $studNum = $_POST['studNum'];
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $Section = $_POST['Section'];
        $Address = $_POST['Addres'];
        $Gender = $_POST['Gender'];
        $progCode = $_POST['progCode'];
        $ayCode = $_POST['ayCode'];
        $status = 'Enrolled';
        $fullName = $lastName . ', ' . $firstName . ' ' . $middleName;

        if(!isset($studNum)){
            echo 'msg003';
        }else{
            $check_studID = "SELECT * FROM forstudents WHERE studNum = '$studNum' ";
            $studNum_count = mysqli_query($conn, $check_studID);
            $total_count = mysqli_num_rows($studNum_count);
            if($total_count > 0){
                echo "StudentNumExists";
            }else{
                $check_stud = "SELECT * FROM forstudents WHERE lastName = '$lastName' AND middleName = '$middleName' AND firstName = '$firstName' ";
                $stud_count = mysqli_query($conn, $check_stud);
                $total_Studcount = mysqli_num_rows($stud_count);
                if($total_Studcount > 0){
                    echo "StudentExists";
                }else{
                    $sql = "INSERT INTO forstudents (studNum, id, fullName, lastName, firstName, middleName, ayCode, Section, Address, Gender, progCode, status) 
                    VALUES ('$studNum', '$stud_id', '$fullName', '$lastName', '$firstName','$middleName', '$ayCode', '$Section','$Address','$Gender','$progCode', '$status')";
                    $result = mysqli_query($conn, $sql);
                
                    if(!$result){
                        echo '<span class="alert_icon orange">
                                    <i class="fa-solid fa-exclamation"></i>
                                </span>
                                <span class="alert_text">
                                    Something Error in Connection
                                </span>';
                    }else{
                        echo '<span class="alert_icon green">
                                    <i class="fa-solid fa-check"></i>
                                </span>
                                <span class="alert_text">
                                    Add Violation Successfully
                                </span>';
                    }
                }

            }

            
        }

        
?>
        

        
    

     
   
        
        
    

    