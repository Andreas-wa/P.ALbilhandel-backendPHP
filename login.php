<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h1>Login system</h1>

    <form method="POST" action="user-function/login_function.php">
        <input type="text" name="username" placeholder="username" required>
        <input type="password" name="password" placeholder="password" required>
        <button type="submit" name="submit">Skicka</button>
    </form>

    <button><a href="signup.php">Signup</a></button>

</body>
</html>