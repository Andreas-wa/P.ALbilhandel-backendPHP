<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    <h1>Signup</h1>

    <form method="POST" action="user-function/signUp_function.php">
        <input type="text" name="username" placeholder="username" required>
        <input type="password" name="password" placeholder="password" required>
        <button type="submit">Make it happen!</a></button>
    </form>     

    <button name="tillbaka"><a href="login.php">Tillbaka</a></button>

    <?php
/*
    // variablar för username och password
    $signUp_username = $_POST['username'];
    $signUp_password = md5($_POST['password']);
    // checkar om namenet som har angivits redan finns i databasen
    $query_check_name = $dbh->query("SELECT username FROM login WHERE username = '$signUp_username'");
    // 
    $result_name = count($query_check_name->fetchAll());
    
    // om resultat_name är större är 0...
    if($result_name > 0){
        // kommer den att skirva ut echo nedan....
        echo "användar namn finns redan";
        // annars....
    } else {
        // kommer den att lägga till ett nytt username och password inuti login databasen...
        $query = "INSERT INTO login(username, password) VALUES('$signUp_username', '$signUp_password');";
        // för att sedan skicka informationen vidare till databasen.
        $return = $dbh->exec($query);

        // om $return inte executar kommer ett error medelande up som säger vad som fattas...
        if(!$return){
            print_r($dbh->errorInfo());
            // annars kommer den att skicka vidare användaren till start sidan som är login.php.
        } else {
            header("login.php");
        }
    }
*/
    ?>
</body>
</html>