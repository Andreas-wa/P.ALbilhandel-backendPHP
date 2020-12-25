<?php
    include("db.php");
    echo "<pre>";

    print_r($_POST);

    echo "</pre>";
    
    $username = $_POST['user'];
    $password = md5($_POST['password']);

    $query = "SELECT id, Username, Password FROM logintabell WHERE Username = '$username' AND Password='$password'";
    
    $return = $dbh->query($query);

    $row = $return->fetch(PDO::FETCH_ASSOC);

    print_r($return->errorInfo());
    die;

    if(!empty($row)){
        header("location:login.php?err=true");
    }   else {

        session_start();
        $_SESSION['username'] = $row['Username'];
        $_SESSION['password'] = $row['Password'];
    
        header("location:loginForm.php");
    }

?>