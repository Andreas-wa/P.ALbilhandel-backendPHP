<?php

// PHP SETTINGS
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "pal-bil";

    // MAKE CONNECTION
    try {
        $dsn = "mysql:host=$host;dbname=$db;";
        $dbh = new PDO($dsn, $user, $pass);

    } catch(PDOException $e) {
        // ON ERROR
        echo "Error! ". $e->getMessage() ."<br />";
        die;
    }

?>