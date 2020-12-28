<?php
echo "Kommentara som: " . $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="Includes/write_comment_functions.php">
        <input name="post_id" type="hidden" value='<?php echo $_GET['post'];?>'>
        <textarea name="content" id="" cols="40" rows="3" placeholder="Skriv för fan.."></textarea>
        <br>
        <button name="submit">Skicka</button>
        <hr />
    </form>
    
</body>
</html>