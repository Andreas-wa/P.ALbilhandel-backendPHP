<?php
    session_start();

    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
    

    
    echo "<h1 class='writecar-h1'>SKRIV INLÄGG</h1>";
  
    echo "<div class='writecar_wrapper'>";
    echo "<form method='POST' action='Includes/writecar_functions.php' enctype='multipart/form-data'>";
    echo "<div class='writecar-input_container'>";
    echo "<b>Titel:</b><br />";
    echo "<input type='text' name='title' required><br />";
    echo "<br />";
    echo "<b> Kategori: </b> <br />";
    echo "<select name='category' id='category' required>";
    echo "<option value='' disabled selected>Välj Kategori</option>";
    echo "<option value='Ideer'>Företaget</option>";
    echo "<option value='Nyheter'>Nyheter</option>";
    echo "<option value='Produkter'>Produkter</option>";
    echo "<option value='Tyck till'>Tyck till</option>";
    echo "</select>";
    echo "<br />";
    echo "<br />";
    echo "<b> Inlägg: </b> <br />";
    echo "<textarea name='description' cols='60' rows='10' placeholder='Skriv ditt inlägg här..' required></textarea><br />";
    echo "<br />";
    echo "<b>Bifoga bild:</b><br />";
    echo "<input type='file' name='file' id='fileToUpload'><br />";
    echo "<br />";
    echo "<input type='submit' name='submit' value='Publicera' />";
    echo "<br />";
    echo "</div>";
    echo "</form>";
    echo "</div>";

    echo "<a class='signup-backspace-btn' href='index.php'><i class='fas fa-backspace fa-3x' aria-hidden='true'></i></a>";
}

else{
    echo "ajabaja inga hackerattacker här inte!";
}
?>

