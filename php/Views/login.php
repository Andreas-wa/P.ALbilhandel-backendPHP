<?php 
echo (isset($_GET['err']) && $_GET['err'] == true ? "Något gick fel! Försök Igen!" : "");

?>

<form method="POST" action="Includes/login_functions.php">

<div class="login_container">
<b>Användarnamn:</b><br />
<input type="text" name="username" placeholder="Användarnamn" required><br />
<b>Lösenord:</b><br />
<input type="password" name="password" placeholder="Lösenord" required><br />
<br />
<input class="login-btn" type="submit" name="login" value="Logga in">
<br>
</form>
</div>
<a href="index.php"><i class="fas fa-backspace fa-3x"></i></a>


<?php 
// echo (isset($_GET['err']) && $_GET['err'] == true ? "Något gick fel! Försök Igen!" : "");
?>
