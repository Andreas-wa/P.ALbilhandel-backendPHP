<?php
include("database_connections.php");
include("show_cars.php");
// include("../views/show_cars.php");

$car_id = $_GET['car'];
$file_name = $_GET['file_name'];


//$query_car = "DELETE * FROM cars WHERE id =:id";
//$query_comment = "DELETE * FROM comments WHERE "
// koden under är till för att ta bort både från cars tabelen samt comments tabelen.
// $query = "DELETE FROM comments where carID = :car_id; DELETE FROM cars WHERE id = :car_id;"
$delete_path = "../uploads/" . $file_name;
if(!unlink($delete_path)){
    
} else {
    
}

// sql för att ta bort car data med den valda id:en
$query = "DELETE FROM images WHERE car_id = :car_id AND file_name = :file_name";
$sth = $dbh->prepare($query);
$sth->bindParam(':car_id', $car_id);
$sth->bindParam(':file_name', $file_name);
$return = $sth->execute();


if (!$return) {
    print_r($dbh->errorInfo());
} else {
    header("location:../index.php?car=" . $car_id);
}

?>