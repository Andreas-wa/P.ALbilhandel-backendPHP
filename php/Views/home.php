
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P.ALbilhandel</title>
</head>
<body>

<nav class="navbar">
                <img src="logoTransp.png" class="pal-logo" alt="logo for the company" srcset="">
                <a href="http://localhost:3000/admin/messages" class="navbar__link">Meddelanden</a>
                <a href="" class="navbar__link">Bilar</a>

<?php
    session_start();
    echo "<div class='login-user-text'>";
    echo (isset($_SESSION['username']) ? " Inloggad som: " . $_SESSION['username'] : '');
    echo (isset($_SESSION['username']) ? "<button class='logout-btn'><a href='Includes/logout_functions.php'>Logga Ut</a></button>" : "");
    echo "</div>";
    ?>

<?php if (!isset($_SESSION['username'])){ ?>
            <nav class="navbar_admin">
                
                <form method="POST" action="index.php?page=login">
                    <button class ="navbar__link" id="navbar__link__btn" type="submit">Logga In</button>
                </form>    
                <center><?php echo (!isset($_SESSION['username']) ? "" : "");?></center>

            </nav>


<?php
}
    echo "</div>";
?>  
            </nav>


        <div class="content_container">
    <?php
        include('Views/show_cars.php');
    ?>
    
</body>
</html>