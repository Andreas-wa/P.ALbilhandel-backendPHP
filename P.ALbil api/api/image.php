<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'database.php';
include_once '../cars.php';

$database = new Database();
    $db = $database->getConnection();

    $items_images = new cars($db);
    $car_id = $_GET['car_id'];

    $stmt_images = $items_images->images($car_id);
    $itemCount = $stmt_images->rowCount();

    if($itemCount > 0){
        
        $carArr = array();
        $carArr["image"] = array();

        while ($row = $stmt_images->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "car_id" => $car_id,
                "file_name" => $file_name
            );

            array_push($carArr["image"], $e);
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