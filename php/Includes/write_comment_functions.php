<?php 
include("database_connections.php");

session_start();

$user_id = $_SESSION['id'];
$content = $_POST['content'];
$post_id = $_POST['post_id'];

$query_comment = "INSERT INTO comments(userID, content, postID) VALUES ('$user_id','$content', '$post_id');";
$return = $dbh->exec($query_comment);

if (!$return) {
    print_r($dbh->errorInfo());
} else {
    header("location:../index.php?post=$post_id&showcomments=true");
}