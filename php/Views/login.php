<?php 
echo (isset($_GET['err']) && $_GET['err'] == true ? "Något gick fel! Försök Igen!" : "");

?>

<form method="POST" action="Includes/login_functions.php">

<img src="logoTransp.png" class="pal-logo-login" alt="logo for the company" srcset="">

<div class="login_container">
<h1 class="login_title">Logga in</h1>

<input type="text" name="username" class="login_username" placeholder="Användarnamn" required><br />
<input type="password" name="password" class="login_password" placeholder="Lösenord" required><br />
<br />
<input class="login_btn" type="submit" name="login" value="Logga in">
<br>
</div>
</form>
