<html lang="en">
<head>
</head>
<body>

<?php
    session_start();

    echo (isset($_GET['err']) && $_GET['err'] == true ? "något gick fel!" : "");

    if(isset($_SESSION['username'])){
        echo "hej " . $_SESSION['username'] . "<br />";
        echo '<a href="logout.php">logga ut!<a />';
    }   else{
        include("loginForm.php");
        include("signUp.php");
    }

?>

<?php
/*
echo "<pre>";
while ($row = $rows->fetch(PDO::FETCH_ASSOC)){
    //echo $row['name']. "<br />";
    //print_r($row);

    echo "<span> Namn: </span>" . " " . $row['name']. "<br />";
    echo "<span> Kommentar: </span>" . " " . $row['message']. "<br />";
    echo "<a href=\"login.php?action=delete&id=". $row['id'] . "\">Delete!</a>";
    echo "<hr />";
}
echo "<pre />";*/
?>

</body>
</html>