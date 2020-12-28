<?php 
include("database_connections.php");

session_start();

$user_id = $_SESSION['id'];
$content = $_POST['content'];
$car_id = $_POST['car_id'];

$query_comment = "INSERT INTO comments(userID, content, carID) VALUES ('$user_id','$content', '$car_id');";
$return = $dbh->exec($query_comment);

if (!$return) {
    print_r($dbh->errorInfo());
} else {
    header("location:../index.php?car=$car_id&showcomments=true");
}