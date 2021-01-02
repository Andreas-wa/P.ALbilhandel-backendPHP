<?php
    session_start();

    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
    

    echo "<h1 class='writecar-h1'>Lägg till bil</h1>";
    echo "<div class='writecar_wrapper'>";
    echo "<form method='POST' action='Includes/writecar_functions.php' enctype='multipart/form-data'>";
    echo "<div class='writecar-input_container'>";

    // titel för bilen
    echo "<b>Titel:</b><br />";
    echo "<input type='text' name='title' required><br />";
    echo "<br />";

    // rullgardin med bilmärken
    echo "<b> Bilmärken: </b> <br />";
    echo "<select name='manufacturers' id='manufacturers' required>";
    echo "<option value='' disabled selected>Välj bil märke</option>";
    echo "<option value='Audi'>Audi</option>";
    echo "<option value='Volvo'>Volvo</option>";
    echo "<option value='BMW'>BMW</option>";
    echo "<option value='Skoda'>Skoda</option>";
    echo "</select>";
    echo "<br />";
    echo "<br />";

    // miltal
    echo "<b> Miltal(km):</b> <br/>";
    echo "<input type='number' name='distance' required><br />";
    echo "<br />";

    // årsmodell
    echo "<b> Årsmodell:</b> <br/>";
    echo "<input type='number' name='year' required><br />";
    echo "<br />";

    // beskrivningen
    echo "<b> Beskrivning: </b> <br />";
    echo "<textarea name='description' cols='60' rows='10' placeholder='Skriv ditt inlägg här..' required></textarea><br />";
    echo "<br />";

    // bilder
    echo "<b>Bifoga bild:</b><br />";
    echo "<input type='file' name='file' id='fileToUpload'><br />";
    echo "<br />";
    
    // publicera knapp
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

