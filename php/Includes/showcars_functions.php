<?php
include("database_connections.php");

if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
    echo "<a href=\"show_cars.php?action=delete&id=" . $row['id'] ."\"> Delete! </a>";
    }

    if(isset($_GET['action']) && $_GET['action'] == "delete") {

        $query = "DELETE FROM messages WHERE id=" . $_GET['id'];
        $return = $dbh->exec($query);
        
    
        header('location:index.php');
    
    }