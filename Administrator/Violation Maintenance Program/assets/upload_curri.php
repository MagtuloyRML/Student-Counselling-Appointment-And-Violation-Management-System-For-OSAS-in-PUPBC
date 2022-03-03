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
                ':pcode'  => $row[0],
                ':description'  => $row[1]
            );
            $pCoded = $row[0];
            $pdescription  = $row[1];


            $checkExistingCode = "SELECT pID, pCode, pDescription FROM forprogram WHERE pCode = :pcoded ";
            $query_result = $connect->prepare($checkExistingCode);
            $query_result->bindValue(':pcoded', $pCoded);
            $query_result->execute();
            $rowResult = $query_result->fetch(PDO::FETCH_ASSOC);


            if ($rowResult) {
                $update_data = "
                UPDATE forprogram
                SET pCode = :pcode, 
                pDescription = :description
                WHERE progCode = :pcode ";
                $updatestatement = $connect->prepare($update_data);
                $updatestatement->execute($insert_data);
            }
            else{
                $query = "
                INSERT INTO forprogram
                (pCode, pDescription) 
                VALUES (:pcode, :description)
                ";

                $statement = $connect->prepare($query);
                $statement->execute($insert_data);
            }
            
        }
        $message = 'msg001';

    }
    else{
        $message = 'msg002';
    }
}
else
{
 $message = 'msg003';
}

echo $message;

?>