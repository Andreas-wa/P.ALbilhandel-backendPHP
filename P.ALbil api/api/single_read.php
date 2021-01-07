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

    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
    $item->getSinglecar();

    if($item->title != null){
        // create array
        $emp_arr = array(
            "id" =>  $item->id,
            "title" => $item->title,
            "manufacturers" => $item->manufacturers,
            "year" => $item->year,
            "distance" => $item->distance,
            "description" => $item->description
        );
      
        http_response_code(200);
        echo json_encode($emp_arr, JSON_UNESCAPED_UNICODE);
    }
      
    else{
        http_response_code(404);
        echo json_encode("car not found.");
    }
?>