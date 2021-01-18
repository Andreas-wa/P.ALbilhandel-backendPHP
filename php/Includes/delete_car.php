<?php
include("database_connections.php");
include("show_cars.php");

$car_id = $_GET['car'];


// sql för att ta bort car data med den valda id:en
$query = "DELETE FROM cars WHERE id = :car_id";

$sth = $dbh->prepare($query);
$sth->bindParam(':car_id', $car_id);
$return = $sth->execute();

if (!$return) {
    print_r($dbh->errorInfo());
} else {
    header("location:../index.php");
}

?>