<?php 
include("database_connections.php");

session_start();


 // variabler
 if (isset($_POST['submit'])) {

    $model = $_POST['model'];
    $reg = $_POST['reg'];
    $manufacturers = $_POST['manufacturers'];
    $distance = $_POST['distance'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $user_id = $_SESSION['id'];
    
    
    $query_car = "INSERT INTO cars(userID, model, reg, manufacturers, year, distance, price, description) VALUES (:user_id, :model, :reg, :manufacturers, :year, :distance, :price, :description);";
    $sth_writecar = $dbh->prepare($query_car);
    $sth_writecar->bindParam(':user_id', $user_id);
    $sth_writecar->bindParam(':model', $model);
    $sth_writecar->bindParam(':reg', $reg);
    $sth_writecar->bindParam(':manufacturers', $manufacturers);
    $sth_writecar->bindParam(':distance', $distance);
    $sth_writecar->bindParam(':year', $year);
    $sth_writecar->bindParam(':price', $price);
    $sth_writecar->bindParam(':description', $description);
    $return = $sth_writecar->execute();
    
    $carId = $dbh->lastInsertId();


    if (!empty($_FILES['file']['name'])){
    
        $file = count($_FILES['file']['name']);

        for($i=0;$i<$file;$i++){
            $file_name = $_FILES['file']['name'][$i];
            
    // post variabler för writepost
    $file_tmp_name = $_FILES['file']['tmp_name'][$i];
    $file_size = $_FILES['file']['size'][$i];
    $file_error = $_FILES['file']['error'][$i];
    $file_type = $_FILES['file']['type'][$i];

    $file_ext = explode('.', $file_name);
    $file_actual_ext = strtolower(end($file_ext)); 

    $allowed = array('jpg', 'jpeg', 'png', ' ');

    // lägger till file för posten samt gör en rad för ny post.
    if (in_array($file_actual_ext, $allowed)) {
        if ($file_error === 0) {
            if ($file_size < 10000000) {
                $file_new_name = uniqid('', true) . "." . $file_actual_ext;
                $file_destination = '../uploads/' . $file_new_name;
                move_uploaded_file($file_tmp_name, $file_destination);
            
                
            } else {
                echo "Din fil är för stor!";
            }
        } else {
            echo "Det blev ett error vid uppladdningen av filen";
        }
    } else {
    echo "Du kan inte ladda upp filer av denna typ";
        }
    
        if (empty($_FILES['file']['name'])){
        $file_new_name = " ";
        }

                $query_image = "INSERT INTO images(car_id, file_name) VALUES (:car_id, :file_new_name)";
                $sth_writecar = $dbh->prepare($query_image);
                $sth_writecar->bindParam(':car_id', $carId);
                $sth_writecar->bindParam(':file_new_name', $file_new_name);
                $return = $sth_writecar->execute();
            
                $sth_writecar->debugDumpParams();
        }
    }
}

if (!$return) {
    print_r($dbh->errorInfo());
    // annars kommer den att skicka användaren vidare till index.php(start sidan).
} else {
    header("location:../index.php?page=home");
}
?>