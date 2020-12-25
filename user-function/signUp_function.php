<?php
    include("db.php");


    // variablar för username och password
    $signUp_username = $_POST['username'];
    $signUp_password = md5($_POST['password']);
    // checkar om namenet som har angivits redan finns i databasen
    $query_check_name = $dbh->query("SELECT username FROM login WHERE username = '$signUp_username'");
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
            header("location:signup.php?signUp_function=true");
        }
    }

    ?>