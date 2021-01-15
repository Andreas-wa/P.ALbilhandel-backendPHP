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

    $item = new cars($db);

    $item->car_id = isset($_GET['car_id']) ? $_GET['car_id'] : die();
  
    $item->getSinglecarImage();

    if($item->car_id != null){
        // create array
        $car_arr = array(
            "id" =>  $item->id,
            "car_id" => $item->car_id,
            "file_name" => $item->file_name,
        );
      
        http_response_code(200);
        echo json_encode($car_arr, JSON_UNESCAPED_UNICODE);
    }
      
    else{
        http_response_code(404);
        echo json_encode("car not found.");
    }
?>