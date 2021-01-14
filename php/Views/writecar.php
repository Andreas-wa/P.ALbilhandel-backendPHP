<?php
    session_start();

    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
    

    echo "<h1 class='writecar-h1'>Lägg till bil</h1>";
    echo "<div class='writecar_wrapper'>";
    
    echo "<form method='POST' action='Includes/writecar_functions.php' enctype='multipart/form-data'>";
    echo "<div class='writecar-input_container'>";
    echo "<a class='signup-backspace-btn' href='index.php'><i class='fas fa-arrow-left fa-3x' aria-hidden='true' id='arrow-left'></i></a>";

    echo "<div class='writecar_wrapper_inputs'>";

    // rullgardin med bilmärken
    echo '<div class="manu_write">';
    echo "<b> Bilmärken: </b> <br />";
    echo "<select name='manufacturers' class='cars_write' id='manufacturers' required>";
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
    echo "<option value='Skoda'>Skoda</option>";
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
    echo '</div>';


    // Model för bilen
    echo '<div class="model_write">';
    echo "<b>Model:</b><br />";
    echo "<input type='text' class='cars_write' name='model' required><br />";
    echo "<br />";
    echo '</div>';


    // regnummer för bilen
    echo '<div class="reg_write">';
    echo "<b>Regnummer:</b><br />";
    echo "<input type='text' class='cars_write' name='reg' required><br />";
    echo "<br />";
    echo '</div>';


    // miltal
    echo '<div class="dist_write">';
    echo "<b> Miltal(km):</b> <br/>";
    echo "<input type='number' class='cars_write' name='distance' required><br />";
    echo "<br />";
    echo '</div>';


    // årsmodell
    echo '<div class="year_write">';
    echo "<b> Årsmodell:</b> <br/>";
    echo "<input type='number' class='cars_write' name='year' required><br />";
    echo "<br />";
    echo '</div>';


    // pris
    echo '<div class="price_write">';
    echo "<b> Pris(kr):</b> <br/>";
    echo "<input type='number' class='cars_write' name='price' required><br />";
    echo "<br />";
    echo '</div>';


    // beskrivningen
    echo "<b> Beskrivning: </b> <br />";
    echo "<textarea name='description' class='cars_write_description' cols='60' rows='10' placeholder='Skriv ditt inlägg här..' required></textarea><br />";
    echo "<br />";

    // bilder
    echo "<b>Bifoga bild:</b><br />";
    echo "<input type='file' name='file[]' id='fileToUpload' multiple required><br />";
    echo "<br />";
    
    // publicera knapp
    echo "<input type='submit' name='submit' class='publish-btn' value='Publicera' />";
    echo "<br />";
    echo "</div>";
    echo "</form>";
    echo "</div>";

}

else{
    echo "ajabaja inga hackerattacker här inte!";
}
?>

