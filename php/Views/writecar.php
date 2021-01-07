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
    echo "<option value='Alfa Romeo'>Alfa Romeo</option>";
    echo "<option value='Audi'>Audi</option>";
    echo "<option value='BMW'>BMW</option>";
    echo "<option value='Citoen'>Citoen</option>";
    echo "<option value='Dacia'>Dacia</option>";
    echo "<option value='Fiat'>Fiat</option>";
    echo "<option value='Ford'>Ford</option>";
    echo "<option value='Honda'>Honda</option>";
    echo "<option value='Hyndai'>Hyndai</option>";
    echo "<option value='Jeep'>Jeep</option>";
    echo "<option value='Kia'>Kia</option>";
    echo "<option value='Land Rover'>Hyndai</option>";
    echo "<option value='Lexus'>Lexus</option>";
    echo "<option value='Mazda'>Mazda</option>";
    echo "<option value='Mercedes-Benz'>Mercedes-Benz</option>";
    echo "<option value='Mini'>Mini</option>";
    echo "<option value='Mitsubishi'>Mitsubishi</option>";
    echo "<option value='Nissan'>Nissan</option>";
    echo "<option value='Opel'>Opel</option>";
    echo "<option value='Peugeot'>Peugeot</option>";
    echo "<option value='Renault'>Renault</option>";
    echo "<option value='Saab'>Saab</option>";
    echo "<option value='Seat'>Seat</option>";
    echo "<option value='Subaru'>Subaru</option>";
    echo "<option value='Suzuki'>Suzuki</option>";
    echo "<option value='Tesla'>Tesla</option>";
    echo "<option value='Toyota'>Toyota</option>";
    echo "<option value='Volkswagen'>Volkswagen</option>";
    echo "<option value='Volvo'>Volvo</option>";
    echo "<option value='Övrigt'>Övrigt</option>";
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

    echo "<b> Pris(kr):</b> <br/>";
    echo "<input type='number' name='price' required><br />";
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

