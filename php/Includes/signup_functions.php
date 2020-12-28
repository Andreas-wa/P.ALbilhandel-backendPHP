<?php
include("database_connections.php");


$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];

$query_check_username = $dbh->query("SELECT username FROM users WHERE username = '$username'");
$query_check_email = $dbh->query("SELECT email FROM users WHERE email = '$email'");

$result_username = count($query_check_username->fetchAll());
$result_email = count($query_check_email->fetchAll());
        if ($result_username > 0){
            echo "AJABAJA! Användarnamnet är redan taget, Försök igen!<br />";
            echo "<a href='../index.php?page=signup' >Tillbaka</a>";
         } 
         else if ($result_email > 0){
            echo "AJABAJA! Endast ett konto per mail, Försök igen!<br />";
            echo "<a href='../index.php?page=signup' >Tillbaka</a>";
         }
         else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "fel email format";
            echo "fuck you bish!";
            echo "<a href='../index.php?page=signup' >Tillbaka</a>";
        }
         
         else {
            $query = "INSERT INTO users(username, password, email) VALUES('$username', '$password', '$email');";
            $return = $dbh->exec($query);

            if (!$return){

            print_r($dbh->errorInfo());
            } else{
            header("location:../index.php?registered=true");
                }
         }
?>