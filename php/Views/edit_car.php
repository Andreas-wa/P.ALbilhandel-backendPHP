<?php

    // startar sessionen(sparar data som skrivs in).
    session_start();

    // hämtar all data i databasen
    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
    
    $car_id = $_GET['car'];
    $update_car_query = "SELECT id, userID, model, reg, description, manufacturers, year, distance, price, date FROM cars WHERE id = :car_id;";
    $sth_update_car = $dbh->prepare($update_car_query);
    $sth_update_car->bindParam(':car_id', $car_id);
    $return_update_car = $sth_update_car->execute();
    $row_edit_car = $sth_update_car->fetch(PDO::FETCH_ASSOC);

    $query_image = "SELECT images.file_name, images.id FROM images JOIN cars ON cars.id = images.car_id WHERE cars.id = $car_id";
    $return_image = $dbh->query($query_image);
    $sth_update_car->bindParam(':car_id', $car_id);
    $row_image = $return_image->fetchAll(PDO::FETCH_ASSOC);


    echo "<form method='POST' class='writecar_wrapper_form' action='Includes/edit_car_functions.php?car=$car_id' enctype='multipart/form-data'>";
    echo "<div class='writecar_wrapper'>";

    echo "<h1 class='writecar-h1'> REDIGERA BIL </h1>";

    echo "<div class='writecar_wrapper_edit'>";
    echo "<a class='signup-backspace-btn' href='index.php'><i class='fas fa-arrow-left fa-3x' aria-hidden='true' id='arrow-left'></i></a>";

    echo "<div class='writecar_wrapper_edit_inputs'>";

    // Ändra märket
    echo '<div class="manu_edit">';
    echo "<b> Bilar: </b><br />";
    echo "<select name='manufacturers' class='cars_edit' id='manufacturers value='" . $row_edit_car['manufacturers'] . "' required>";
    echo "<option value='' disabled selected>Välj Kategori</option>";
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


    // Ändra model
    echo '<div class="model_edit">';
    echo "<b>Model:</b><br />";
    echo "<input type='text' class='cars_edit' name='model' value='" . $row_edit_car['model'] ."' required><br />";
    echo "<br />";
    echo '</div>';

    // regnummer för bilen
    echo '<div class="reg_edit">';
    echo "<b>Regnummer:</b><br />";
    echo "<input type='text' class='cars_edit' name='reg' value='" . $row_edit_car['reg'] ."' required><br />";
    echo "<br />";
    echo '</div>';


    // Ändra miltal
    echo '<div class="dist_edit">';
    echo "<b> Miltal(km):</b> <br/>";
    echo "<input type='number' class='cars_edit' name='distance' value='" . $row_edit_car['distance'] ."' required><br />";
    echo "<br />";
    echo '</div>';


    // Ändra årsmodell
    echo '<div class="year_edit">';
    echo "<b> Årsmodell:</b> <br/>";
    echo "<input type='number' class='cars_edit' name='year' value='" . $row_edit_car['year'] ."' required><br />";
    echo "<br />";
    echo '</div>';


    // Ändra årsmodell
    echo '<div class="price_edit">';
    echo "<b> Pris(kr):</b> <br/>";
    echo "<input type='number' class='cars_edit' name='price' value='" . $row_edit_car['price'] ."' required><br />";
    echo "<br />";
    echo '</div>';

    
    echo "</div>";

    
    // Ändra beskrivningen
    echo "<b> Beskrivning: </b> <br />";
    echo "<textarea name='description' class='cars_edit_description' cols='60' rows='10' required>" . $row_edit_car['description'] . "</textarea><br />";
    echo "<br />";

    // Ändra Bilder
    echo "<b>Bifoga bild:</b><br />";
    echo "<input type='file'  name='file[]' id='fileToUpload' multiple><br />";
    echo "<br />";

    echo "<div class='edit_image_div'>";
    foreach($row_image as $images){
        echo "<img src='uploads/" . $images['file_name'] . "'class='edit_image'><a href='Includes/delete_image.php?car=" . $car_id . "&file_name=" . $images['file_name'] . "'><i class='fas fa-times fa-2x' id='pen_times'></i></a><br />";
    }

    echo "</div>";

    
    echo "<br />";

    echo "<input type='submit' name='submit' class='publish-btn' value='Publicera' />";
    echo "</div>";
    echo "</form>";

    echo "</div>";

    }
    // annars kommer ett fel medelande att vissas.
    else{
    echo "ajabaja inga hackerattacker här inte!";
    }
?>