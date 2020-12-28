<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>

 <div class="signup_wrapper">

    <h1 class="signup-h1">REGISTRERA</h1>
    
    <form method="POST" action="Includes/signup_functions.php">
        <div class="signup-input_container">
        Användarnamn:<br>
        <input type="text" name="username" placeholder="Skapa användarnamn..." required>
        <br>Lösenord:<br>
        <input type="password" name="password" placeholder="Skapa Lösenord..." required>
        <br>Mailadress:<br>
        <input type="text" name="email" placeholder="Skriv din mail..." required>
        <br>
        <div class="signup-buttum">
        <button type="submit" name="submit">Skapa</button>
        </div>
        </div>
    </form>

    <a class="signup-backspace-btn" href="index.php"><i class="fas fa-backspace fa-3x"></i></a>
</div>
   

    
</body>
</html>