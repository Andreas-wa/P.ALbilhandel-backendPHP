<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once 'database.php';
    include_once '../cars.php';

    $database = new Database();
    $db = $database->getConnection();

    $items_images = new cars($db);

    $stmt_images = $items_images->getcars_images();
    $itemCount = $stmt_images->rowCount();


    // echo json_encode($itemCount);

    if($itemCount > 0){
        
        $carArr = array();
        $carArr["cars"] = array();
        // $carArr["itemCount"] = $itemCount;

        while ($row = $stmt_images->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "car_id" => $car_id,
                "file_name" => $file_name
            );

            array_push($carArr["cars"], $e);
        }
        echo json_encode($carArr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>