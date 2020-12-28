<?php
include("database_connections.php");
include("show_posts.php");

$post_id = $_GET['post'];

//$query_post = "DELETE * FROM posts WHERE id =:id";
//$query_comment = "DELETE * FROM comments WHERE "
$query = "DELETE FROM comments where postID = :post_id; DELETE FROM posts WHERE id = :post_id";

$sth = $dbh->prepare($query);
$sth->bindParam(':post_id', $post_id);
$return = $sth->execute();

if (!$return) {
    print_r($dbh->errorInfo());
} else {
    header("location:../index.php");
}

?>