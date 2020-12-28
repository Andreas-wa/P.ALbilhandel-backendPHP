<?php
    include('database_connections.php');
    //include('../Views/edit_post.php');

    session_start();

    

    if (isset($_POST['submit'])) {
        if (!empty($_FILES['file']['name'])){
       $file = $_FILES['file']['name'];
       
       // post variabler för writepost
       
   
       // files variabler för file/img.
       $file_name = $_FILES['file']['name'];
       $file_tmp_name = $_FILES['file']['tmp_name'];
       $file_size = $_FILES['file']['size'];
       $file_error = $_FILES['file']['error'];
       $file_type = $_FILES['file']['type'];
   
       $file_ext = explode('.', $file_name);
       $file_actual_ext = strtolower(end($file_ext)); 
   
       $allowed = array('jpg', 'jpeg', 'png', ' ');
   
       
   
       // lägger till file för posten samt gör en rad för ny post.
       if (in_array($file_actual_ext, $allowed)) {
           if ($file_error === 0) {
               if ($file_size < 1000000) {
                   $file_new_name = uniqid('', true) . "." . $file_actual_ext;
                   $file_destination = '../uploads/' . $file_new_name;
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
       } 
           if (empty($_FILES['file']['name'])){
           $file_new_name = " ";
           }
   }

   $title = $_POST['title'];
$category = $_POST['category'];
$description = $_POST['description'];
$image = $_POST['image'];
//$userID = $_SESSION['id'];

$post_id = $_GET['post'];

    // update 
$edit_post_query = "UPDATE posts SET title=:title, category=:category, 
description=:description, image=:file_new_name WHERE id = :post_id";
$sth_update_post = $dbh->prepare($edit_post_query);
$sth_update_post->bindParam(':title', $title);
$sth_update_post->bindParam(':category', $category);
$sth_update_post->bindParam(':description', $description);
$sth_update_post->bindParam(':file_new_name', $file_new_name);
$sth_update_post->bindParam(':post_id', $post_id);
$return_update_post = $sth_update_post->execute();
//die;


if (!$return_update_post) {
    print_r($dbh->errorInfo());
    // annars kommer den att skicka användaren vidare till index.php(start sidan).
} else {
    header("location:../index.php?page=home");
}

?>
