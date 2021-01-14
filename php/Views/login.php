<?php 
echo (isset($_GET['err']) && $_GET['err'] == true ? "Något gick fel! Försök Igen!" : "");

?>

<form method="POST" action="Includes/login_functions.php">

<h1 class="login_title">Logga in</h1>
<div class="login_container">
<!-- <b>Användarnamn:</b><br /> -->
<input type="text" name="username" class="login_username" placeholder="Användarnamn" required><br />
<!-- <b>Lösenord:</b><br /> -->
<input type="password" name="password" class="login_password" placeholder="Lösenord" required><br />
<br />
<input class="login_btn" type="submit" name="login" value="Logga in">
<br>
</div>
</form>

<!-- <a href="index.php"><i class="fas fa-backspace fa-3x"></i></a> -->


<?php 
// echo (isset($_GET['err']) && $_GET['err'] == true ? "Något gick fel! Försök Igen!" : "");
?>
