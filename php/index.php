<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P.ALbilhandel</title>
    <link rel="stylesheet" href="CSS/index.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>

<?php
// kopplar databasen
include('Includes/database_connections.php');

$page = (isset($_GET['page']) ? $_GET['page'] : '');

if($page == "login"){
    include("Views/login.php");
}

if(!$page){
    include("Views/home.php");
}

if($page == "editcar"){
    include("Views/edit_car.php");
}

if($page == "home"){
    include("Views/home.php");
}

if($page == "writecar"){
    include("Views/writecar.php");
}

echo (isset($_GET['login']) && $_GET['login'] == true ? "<center><a href='Includes/logout_functions.php' id='logout_btn'>Logga Ut</a></center>" : "");


?>

</body>
</html>