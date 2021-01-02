<?php

    // startar sessionen(sparar data som skrivs in).
    session_start();

    // hämtar all data i databasen
    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
    
    $car_id = $_GET['car'];
    $update_car_query = "SELECT id, userID, title, description, manufacturers, year, distance, image, date FROM cars WHERE id = :car_id;";
    $sth_update_car = $dbh->prepare($update_car_query);
    $sth_update_car->bindParam(':car_id', $car_id);
    $return_update_car = $sth_update_car->execute();
    $row_edit_car = $sth_update_car->fetch(PDO::FETCH_ASSOC);

    // skriver ut titel(titeln för caren som har givits), kategori(med "företaget","nyheter" osv)
    // , description(textfält), knapp där man kan sicka in filer i.
    echo "<h1 class='writecar-h1'> REDIGERA BIL </h1>";
    echo "<form method='POST' action='Includes/edit_car_functions.php?car=$car_id' enctype='multipart/form-data'>";
    echo "<div class='writecar_wrapper'>";
    
    // Ändra titel
    echo "<b>Titel:</b><br />";
    echo "<input type='text' name='title' value='" . $row_edit_car['title'] ."' required><br />";
    echo "<br />";
    
    // Ändra märket
    echo "<b> Bilar: </b> <br />";
    echo "<select name='manufacturers' id='manufacturers value='" . $row_edit_car['manufacturers'] . "' required>";
    echo "<option value='' disabled selected>Välj Kategori</option>";
    echo "<option value='Audi'>Audi</option>";
    echo "<option value='Volvo'>Volvo</option>";
    echo "<option value='BMW'>BMW</option>";
    echo "<option value='Skoda'>Skoda</option>";
    echo "</select>";
    echo "<br />";
    echo "<br />";

    // Ändra miltal
    echo "<b> Miltal(km):</b> <br/>";
    echo "<input type='number' name='distance' required><br />";
    echo "<br />";

    // Ändra årsmodell
    echo "<b> Årsmodell:</b> <br/>";
    echo "<input type='number' name='year' required><br />";
    echo "<br />";
    
    // Ändra beskrivningen
    echo "<b> Beskrivning: </b> <br />";
    echo "<textarea name='description' cols='60' rows='10' required>" . $row_edit_car['description'] . "</textarea><br />";
    echo "<br />";

    // Ändra Bilder
    echo "<b>Bifoga bild:</b><br />";
    echo "<input type='file' name='file' id='fileToUpload'><br />";
    echo "<br />";
    echo "<img src='uploads/" . $row_edit_car['image'] . "'><br />";
    echo "<br />";
    echo "<input type='submit' name='submit' value='Publicera' />";
    echo "</div>";
    echo "</form>";
    echo "<a class='signup-backspace-btn' href='index.php'><i class='fas fa-backspace fa-3x' aria-hidden='true'></i></a>";

    }
    // annars kommer ett fel medelande att vissas.
    else{
    echo "ajabaja inga hackerattacker här inte!";
    }
?>