<h1>Registrera användare</h1>

<form method="POST" action="login.php">
Användar namn:
<br>
<input type="text" name="nyAV">
<br>
lösenord:
<br>
<input type="password" name="nyPA">
<br>
<input type="submit" name="submit">

</form>

<?php

$message = (!empty($_POST['password']) ? $_POST['password'] : "");
$name = (!empty($_POST['user']) ? $_POST['user'] : "");


$queary = "INSERT INTO logintabell (name, password) value('$user', '$password')";
$return = $dbh -> exec($queary);

echo "<pre>";
print_r ($_POST);
echo "</pre>";

if(!$return){
    print_r($dbh -> errorInfo());
    } else {
        header ("location/loginForm.php");
    }

print_r($return);

?>
