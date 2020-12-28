<?php
include("database_connections.php");
include("show_cars.php");

$car_id = $_GET['car'];

//$query_car = "DELETE * FROM cars WHERE id =:id";
//$query_comment = "DELETE * FROM comments WHERE "
$query = "DELETE FROM comments where carID = :car_id; DELETE FROM cars WHERE id = :car_id";

$sth = $dbh->prepare($query);
$sth->bindParam(':car_id', $post_id);
$return = $sth->execute();

if (!$return) {
    print_r($dbh->errorInfo());
} else {
    header("location:../index.php");
}

?>