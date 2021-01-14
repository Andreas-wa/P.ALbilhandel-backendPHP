
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P.ALbilhandel</title>
</head>
<body>
    <?php
    session_start();
    echo "<div class='login-user-text'>";
    echo (isset($_SESSION['username']) ? " Inloggad som: " . $_SESSION['username'] : '');
    echo (isset($_SESSION['username']) ? "<button class='logout-btn'><a href='Includes/logout_functions.php'>Logga Ut</a></button>" : "");
    echo "</div>";
    ?> 


<?php

    echo "<div class='header_wrapper'>";    
    echo "</div>";
    
if (!isset($_SESSION['username'])){
?>
    <!-- <div id="loginregister_btns">
    <form method="POST" action="index.php?page=signup">
    <button class ="btn-reg-login" type="submit">Registrera</button>
    </form> -->
        <div class="">
            <nav class="navbar">
                <a href="" class="navbar__link">Meddelanden</a>
                <a href="" class="navbar__link">Bilar</a>
                <form method="POST" action="index.php?page=login">
                    <button class ="navbar__link" type="submit">Logga In</button>
                </form>
            </nav>
        </div>

    <!-- <div class="body_wrapper"> -->
    <!--  title   -->
        <!-- <div class="header-text">
            <h1>P.AL bilhandel</h1>
        </div> -->
    <?php echo (!isset($_SESSION['username']) ? "Inte inloggad!" : "");?>


<?php
}
    echo "</div>";
?>  

    <!--  latest cars  -->
        <div class="content_container">
            <!-- <h2 class="content_container_title">Senaste bilarna:</h2> -->
    <?php
        include('Views/show_cars.php');
    ?>
    

    <?php
    // if (isset($_GET['registered']) && $_GET['registered'] == 'true'){
    //     echo "Du är nu registrerad!";
    // }
    ?>


</div>
<!-- <div class="footer_wrapper">
        <i class="fas fa-home"></i>
        <i class="fas fa-phone"></i>
    </div> -->

</body>
</html>