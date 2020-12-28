<?php
include("database_connections.php");
include("../views/show_cars.php");


$comment_id = $_GET['id'];

//if (isset($_GET['id']) && $_GET['id'] == $comments['id']){

$query = "DELETE from comments where id =:id";
$sth = $dbh->prepare($query);
$sth->bindParam(':id', $_GET['id']);
$return = $sth->execute();

if (!$return) {
    print_r($dbh->errorInfo());
} else {
    header("location:../index.php?car=$car_id&showcomments=true");
}


?>