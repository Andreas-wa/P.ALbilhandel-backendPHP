<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once 'database.php';
    include_once '../cars.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new cars($db);


    ///////////////////// ta bort detta om du inte vill ha bilderna ////////////////////

    // $items->getSinglecarImage();

    // $items_images = new cars($db);

    // $stmt_images = $items_images->getcars_images();

    ///////////////////// ta bort detta om du inte vill ha bilderna ////////////////////


    $stmt = $items->getcars();
    $itemCount = $stmt->rowCount();

    if($itemCount > 0){
        
        $carArr = array();
        $carArr["cars"] = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "manufacturers" => $manufacturers,
                "model" => $model,
                "reg" => $reg,
                "year" => $year,
                "distance" => $distance,
                "price" => $price,
                "description" => $description,
            );

            array_push($carArr["cars"], $e);
        }

        echo json_encode($carArr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
    }


    ///////////////////// ta bort detta om du inte vill ha bilderna ////////////////////
        // if($itemCount > 0){
        
        //     $carArr = array();
        //     $carArr["image"] = array();
        //     // $carArr["itemCount"] = $itemCount;
    
        //     while ($row = $stmt_images->fetch(PDO::FETCH_ASSOC)){
        //         extract($row);
        //         $e = array(
        //             "id" => $id,
        //             "car_id" => $car_id,
        //             "file_name" => $file_name
        //         );
    
        //         array_push($carArr["image"], $e);
        //     }
        //     echo json_encode($carArr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        // }
    

    ///////////////////// ta bort detta om du inte vill ha bilderna ////////////////////


        else{
            http_response_code(404);
            echo json_encode(
                array("message" => "No record found.")
            );
        }
?>