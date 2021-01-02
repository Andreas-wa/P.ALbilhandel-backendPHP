<?php
include("database_connections.php");
include("show_cars.php");
// include("../views/show_cars.php");

$car_id = $_GET['car'];

//$query_car = "DELETE * FROM cars WHERE id =:id";
//$query_comment = "DELETE * FROM comments WHERE "
// koden under är till för att ta bort både från cars tabelen samt comments tabelen.
// $query = "DELETE FROM comments where carID = :car_id; DELETE FROM cars WHERE id = :car_id;"

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