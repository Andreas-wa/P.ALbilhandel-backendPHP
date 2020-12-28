
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start(); 
    echo "<div class='login-user-text'>";
    echo (isset($_SESSION['username']) ? " Inloggad som: " . $_SESSION['username'] : '');
    echo (isset($_SESSION['username']) ? "<button class='logout-btn'><a href='Includes/logout_functions.php'>Logga Ut</a></button>" : "");
    echo "</div>";
    ?> 
<div class="body_wrapper">


<?php

    echo "<div class='header_wrapper'>";
    
    
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){    
    echo "<button><a href='index.php?page=writepost'><i class='far fa-edit fa-2x'></i></a></button>";
}
    
if (!isset($_SESSION['username'])){
?>
    <div id="loginregister_btns">
    <form method="POST" action="index.php?page=signup">
    <button class ="btn-reg-login" type="submit">Registrera</button>
    </form>
    <form method="POST" action="index.php?page=login">
    <button class ="btn-reg-login" type="submit">Logga In</button>
    </form>
    </div>

<?php
}
    ;
    echo "<div class='header-link-2'>";
    
    
    echo "</div>";
    ;
    
    echo "</div>";
    echo "</div>";
?>
    <div class="header-text">
    <center><h1>BLOGGEN</h1></center>
    <h6>MILHOUSE FINA BLOGGSIDA</h6>

    </div>
        
    

    <div class="content_container">
    <h2>Senaste inläggen:</h2>
    <?php
    include('Views/show_posts.php');

    ?>
    

    <?php
    if (isset($_GET['registered']) && $_GET['registered'] == 'true'){
        echo "Du är nu registrerad!";
    }
    ?>
    



</div>

<div class="footer_wrapper">
                  
            <i class="fas fa-home">  Tulegatan 29</i>
            &copy; Milhouse AB 
            <i class="fas fa-phone">  070-5620022</i>
   
</div>
</body>
</html>