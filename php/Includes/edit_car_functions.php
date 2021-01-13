<?php
    include('database_connections.php');
    //include('../Views/edit_post.php');

    session_start();

    

    if (isset($_POST['submit'])) {

        $model = $_POST['model'];
        $reg = $_POST['reg'];
        $manufacturers = $_POST['manufacturers'];
        $year = $_POST['year'];
        $distance = $_POST['distance'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $user_id = $_SESSION['id'];

        // $file_name = $_POST['file_name'];
        // $images_id = $_POST['images.id'];


        $car_id = $_GET['car'];

        // update sql
        $edit_car_query = "UPDATE cars SET model=:model, reg=:reg, manufacturers=:manufacturers, year=:year, distance=:distance, price=:price,
        description=:description WHERE id = :car_id";
        $sth_update_car = $dbh->prepare($edit_car_query); 
        $sth_update_car->bindParam(':model', $model); 
        $sth_update_car->bindParam(':reg', $reg); 
        $sth_update_car->bindParam(':manufacturers', $manufacturers);
        $sth_update_car->bindParam(':year', $year);
        $sth_update_car->bindParam(':distance', $distance);
        $sth_update_car->bindParam(':price', $price);
        $sth_update_car->bindParam(':description', $description);
        // $sth_update_car->bindParam(':file_new_name', $file_new_name);
        $sth_update_car->bindParam(':car_id', $car_id);

        $return_update_car = $sth_update_car->execute();

        // $carId = $dbh->lastInsertId();


        if (!empty($_FILES['file']['name'])){
    //    $file = $_FILES['file']['name'];
            $file = count($_FILES['file']['name']);

            for($i=0;$i<$file;$i++){
                $file_name = $_FILES['file']['name'][$i];
        // post variabler för writepost
        // files variabler för file/img.
        //  $file_name = $_FILES['file']['name'];
            $file_tmp_name = $_FILES['file']['tmp_name'][$i];
            $file_size = $_FILES['file']['size'][$i];
            $file_error = $_FILES['file']['error'][$i];
            $file_type = $_FILES['file']['type'][$i];

            $file_ext = explode('.', $file_name);
            $file_actual_ext = strtolower(end($file_ext)); 
   
            $allowed = array('jpg', 'jpeg', 'png', ' ');


            if (in_array($file_actual_ext, $allowed)) {
                if ($file_error === 0) {
                    if ($file_size < 10000000) {
                        $file_name = uniqid('', true) . "." . $file_actual_ext;
                        $file_destination = '../uploads/' . $file_name;
                        move_uploaded_file($file_tmp_name, $file_destination);
                        
                    } else {
                        echo "Your file is to big!";
                    }
                } else {
                    echo "Det blev ett error vid uppladdningen av filen";
                }
            } else {
            echo "Du kan inte ladda upp filer av denna typ";
                }
             
                if (empty($_FILES['file']['name'])){
                $file_name = " ";
                }
     
                // $query_image = "UPDATE images SET file_name=:file_name WHERE car_id = $car_id AND images.id = $carId";
                $query_image = "INSERT INTO images(car_id, file_name) VALUES (:car_id, :file_name)";
                $sth_writecar = $dbh->prepare($query_image);
                $sth_writecar->bindParam(':car_id', $car_id);
                $sth_writecar->bindParam(':file_name', $file_name);
                $return = $sth_writecar->execute();

                // $sth_update_car->debugDumpParams();

            }
        }
   }

if (!$return_update_car) {
    print_r($dbh->errorInfo());
    // annars kommer den att skicka användaren vidare till index.php(start sidan).
} else {
    header("location:../index.php?car=" $car_id);
}

// $model = $_POST['model'];
// $reg = $_POST['reg'];
// $manufacturers = $_POST['manufacturers'];
// $year = $_POST['year'];
// $distance = $_POST['distance'];
// $price = $_POST['price'];
// $description = $_POST['description'];
// $file_name = $_POST['file_name'];
// $images_id = $_POST['images.id'];

// // print_r($image_id);
// //$userID = $_SESSION['id'];

// $car_id = $_GET['car'];

//     // update 
// $edit_car_query = "UPDATE cars SET model=:model, reg=:reg, manufacturers=:manufacturers, year=:year, distance=:distance, price=:price,
// description=:description WHERE id = :car_id";
// $sth_update_car = $dbh->prepare($edit_car_query); 
// $sth_update_car->bindParam(':model', $model); 
// $sth_update_car->bindParam(':reg', $reg); 
// $sth_update_car->bindParam(':manufacturers', $manufacturers);
// $sth_update_car->bindParam(':year', $year);
// $sth_update_car->bindParam(':distance', $distance);
// $sth_update_car->bindParam(':price', $price);
// $sth_update_car->bindParam(':description', $description);
// // $sth_update_car->bindParam(':file_new_name', $file_new_name);
// $sth_update_car->bindParam(':car_id', $car_id);
// $return_update_car = $sth_update_car->execute();

// $query_image = "UPDATE images SET file_name=:file_name WHERE car_id = $car_id AND images.id=$images_id";
// $sth_writecar = $dbh->prepare($query_image);
// $sth_writecar->bindParam(':car_id', $car_id);
// $sth_writecar->bindParam(':images.id', $images_id);
// $sth_writecar->bindParam(':file_name', $file_name);
// $return = $sth_writecar->execute();
// //die;
?>


