<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "gästbok"; 

try{
    $dsn = "mysql:host=$host;dbname=$db;";
    $dbh = new PDO($dsn, $user, $pass);
} catch(PDOExCeption $e){
    echo "Error! ". $e->getMessage() ."<br />";
    die;
}

?>