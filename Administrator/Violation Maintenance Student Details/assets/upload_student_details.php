<?php

use PhpOffice\PhpSpreadsheet\Calculation\TextData\Text;

include ("../../../assets/PHPSpreedsheet/vendor/autoload.php");

$connect = new PDO("mysql:host=localhost;dbname=studentviolation_db", "root", "");


if($_FILES["file_path"]["name"] != '')
{
    $allowed_extension = array('xls', 'xlsx');
    $file_array = explode(".", $_FILES["file_path"]["name"]);
    $file_extension = end($file_array);

    if(in_array($file_extension, $allowed_extension)){

        $file_name = time() . '.' . $file_extension;
        move_uploaded_file($_FILES['file_path']['tmp_name'], $file_name);
        $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

        $spreadsheet = $reader->load($file_name);

        unlink($file_name);

        $data = $spreadsheet->getActiveSheet()->toArray();
        unset($data[0]);
        
        foreach($data as $row)
        {
            $insert_data = array(
                ':studNUM'  => $row[0],
                ':lastNAME'  => $row[1],
                ':firstNAME'  => $row[2],
                ':midNAME'  => $row[3],
                ':sec'  => $row[4],
                ':add'  => $row[5],
                ':gen'  => $row[6],
                ':progID'  => $row[7],
                ':ayCode'  => $row[8]
            );
            $pstudNUM = $row[0];
            $plastNAME  = $row[1];
            $pfirstNAME  = $row[2];
            $pmidNAME  = $row[3];
            $psec  = $row[4];
            $padd  = $row[5];
            $pgen  = $row[6];
            $pprogID  = $row[7];
            $payCode  = $row[8];


            $checkExistingCode = "SELECT studNum, lastName, firstName, middleName, Section, Address, Gender , progCode FROM forstudents WHERE studNum = :studNUM ";
            $query_result = $connect->prepare($checkExistingCode);
            $query_result->bindValue(':studNUM', $pstudNUM);
            $query_result->execute();
            $rowResult = $query_result->fetch(PDO::FETCH_ASSOC);


            if ($rowResult) {
                //Para makapag generate ng auto incremented id
                $query9 = "SELECT * FROM forstudents order by id desc limit 1";
                $res = mysqli_query($conn, $query9);
                $row = mysqli_fetch_array($res);
                $lastid = $row['id'];

                $stud_id = substr($lastid, 0);
                $stud_id = intval($stud_id);
                $stud_id = ($stud_id + 1);

                //Update data if Existing na yung studentNumber
                $update_data = "
                UPDATE forstudents SET studNum =:studNUM, 
                lastName = :lastNAME, firstName = :firstNAME, middleName = :midNAME,
                Section = :sec , Address = :add, Gender = :gen, progCode = :progID, ayCode = :ayCode, id = '$stud_id'
                WHERE studNum =:studNUM";
                $updatestatement = $connect->prepare($update_data);
                $updatestatement->execute($insert_data);
            }
            else{
                //Para makapag generate ng auto incremented id
                $query10 = "SELECT * FROM forstudents order by id desc limit 1";
                $res = mysqli_query($conn, $query10);
                $row = mysqli_fetch_array($res);
                $lastid = $row['id'];

                $stud_id = substr($lastid, 0);
                $stud_id = intval($stud_id);
                $stud_id = ($stud_id + 1);

                //inserting data if walang kaparehas na studentnumber
                $query = "
                INSERT INTO forstudents
                (studNum, lastName, firstName, middleName, Section, Address, Gender , progCode, ayCode, id) 
                VALUES (:studNUM, :lastNAME, :firstNAME, :midNAME, :sec , :add, :gen, :progID, :ayCode, '$stud_id')
                ";

                $statement = $connect->prepare($query);
                $statement->execute($insert_data);
            }
            
        }
        $message = '<div class="alert alert-success">Data Imported Successfully</div>';

    }
    else{
        $message = '<div class="alert alert-danger">Only .xls or .xlsx file allowed</div>';
    }
}
else
{
 $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;

?>