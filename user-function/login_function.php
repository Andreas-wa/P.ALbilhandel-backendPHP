<?php
    include("db.php");

    // gör en variabel för username(det som jag skriver in i inputen ovan).
    $username = $_POST['username'];
    // gör en variabel för pasword med en md5 för säkerhet(det som skrivs in i inputen ovan).
    $password = md5($_POST['password']);

    // gör en query som bestämmer vilken data som ska hämtas från databasen, i detta fall id username och password.
    $query = "SELECT id, username, password FROM login WHERE username = '$username' AND password = '$password'";
    // return hämtar dbh:n som är nya PDO(hämtar dsn, username, password från db.php).
    // PDO = PHP data objects är ett sätt att koppla databas tillsamans med kod.
    $return = $dbh->query($query);
    // hämtar datan från databasen
    $row = $return->fetch(PDO::FETCH_ASSOC);

    // om databasen inte har värdet som skrivits i för username och password ...
    if(empty($row)){
        // kommer den att skriva ut "nope! testa igen"...
        echo "nope! testa igen";
        // och sedan skicka användaren tillbaka till "login.php". 
        include("../login.php");
        // annars...
    } else {
        // kommer den att starta en session...
        // session = är liknande local storage(sparar datan som har skrivits in).
        session_start();
        // för att då hämta id:n...
        $_SESSION['id'] = $row['id'];
        // username...
        $_SESSION['username'] = $row['username'];
        // och password från databasen, $row['blabla'] = hämtar från databasen
        $_SESSION['password'] = $row['password'];
        // sedan skriver den ut "välkommen" och användarens namn.
        echo "Välkommen " . $_POST['username'];
    }
    if(isset($_POST['username']) && $_POST['username'] == true){
        
    }
    
?>