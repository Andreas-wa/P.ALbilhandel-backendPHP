    <?php    
 
    $order = 'desc';

    if (isset($_GET['car'])){

        $car_id = $_GET['car'];
        $query_car_data = "SELECT id, userID, model, reg, description, manufacturers, year, distance, price, date FROM cars WHERE id = $car_id";
        $return = $dbh->query($query_car_data);
        $row = $return->fetch(PDO::FETCH_ASSOC);

        $query_username = "SELECT users.username FROM users JOIN cars ON cars.userID = users.id WHERE cars.id = $car_id";
        $return_username = $dbh->query($query_username);
        $row_username = $return_username->fetch(PDO::FETCH_ASSOC);

        $query_image = "SELECT images.file_name FROM images JOIN cars ON cars.id = images.car_id WHERE cars.id = $car_id";
        $return_image = $dbh->query($query_image);
        $row_image = $return_image->fetchAll(PDO::FETCH_ASSOC);



            // class för all data  
            echo "<div class='car_wrapper'>";
            echo '<a href="index.php"><i class="fas fa-arrow-left fa-3x" id="arrow-left"></i></a>';
           
            // div för car data
            echo "<div class='car_wrapper_info'>";
            

            echo "<br />";

            // div för tillverkaren
            echo "<div class='car_wrapper_manufacturers'>";
            echo "<b>Märke: </b>" . $row['manufacturers'] . "<br />";
            echo "</div>";

            echo "<br />";

            // div för Model
            echo "<div class='car_wrapper_model'>";
            echo "<b>Model: </b>" . $row['model'];
            echo "</div>";

            echo "<br/>";

            // div för regnummer
            echo "<div class='car_wrapper_reg'>";
            echo "<b>Regnummer: </b>" . $row['reg'];
            echo "</div>";

            echo "<br />";

            // div för årsmodell
            echo "<div class='car_wrapper_year'>";
            echo "<b>Årsmodell: </b>" . $row['year'] . "<br />";
            echo "</div>";

            echo "<br />";
            
            // div för miltal

            echo "<div class='car_wrapper_distance'>";
            echo "<b>Miltal: </b>" . $row['distance'] . "km <br />";
            echo "</div>";
            echo "<br />";

            // div för pris
            echo "<div class='car_wrapper_price'>";
            echo "<b>Pris: </b>" . $row['price'] . "kr <br />";
            echo "</div>";
            echo "<br />";

            // end of car_wrapper_info div
            echo "</div>";

            // div för datum
            echo "<div class='car_wrapper_date'>";
            echo "<b>Inlagd: </b>" . $row['date'];
            echo "</div>";
            echo "<br />";
 
            echo "<hr/>";
            
            // div för beskrivningen
            echo "<div class='car_wrapper_description'>";
            echo "<b>Beskrivning: </b><br />" .$row['description'] . "<br />";
            echo "</div>";

            
            echo "<br />";
            
            // div för bild
            echo "<div class='car_wrapper_image'>";
            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
                foreach($row_image as $images){
                echo "<img src='uploads/" . $images['file_name'] . "'><a href='Includes/delete_image.php?car=" . $car_id . "&file_name=" . $images['file_name'] . "'><i class='fas fa-times fa-2x' id='pen_times'></i></a><br />";
                }
            }else{
                foreach($row_image as $images){
                    echo "<img src='uploads/" . $images['file_name'] . "'><br />";
                }
            }
            
            echo "</div>";

            // div för footer
            echo "<div class='car_wrapper_footer'>";
            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
            echo "<a href='index.php?page=editcar&car=" . $car_id . "'><i class='fas fa-pen fa-2x' id='big_pen_icon'></i></a>";
            echo "</br>";
            echo "<a href='Includes/delete_car.php?car=" . $car_id . "'><i class='fas fa-trash-alt fa-2x' id='big_trash_icon'></i></a>";
            }
            echo "</br>";
            
            echo "</table>";
       
            echo "</div>";
    }
    

    $query_shopcars = "SELECT id, userID, model, reg, description, manufacturers, year, distance, price, date FROM cars ORDER BY date $order";
    $rows_cars = $dbh->query($query_shopcars);
    
    echo "<br/ >";
    if(isset($_GET['car']) == true){

    while($row = $rows_cars->fetch(PDO::FETCH_ASSOC)){
        
 
        }     
    } else {
            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
                echo "<a href='index.php?page=writecar' id='fa-edit'><i class='far fa-edit fa-3x'></i></a>";
            }

        echo "<div class='table_small'>";

        echo '<table>';

        echo "<thead>";
            echo '<tr class="top">';
            echo "<th>Märke</th>";
            echo "<th>Model</th>";
            echo "<th>Regnr</th>";
            echo '<th className="notOnPhone">Årsmodell</th>';
            echo '<th className="notOnPhone">Miltal</th>';
            echo '<th>Pris</th>';
            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
                echo '<th>Redigera</th>';
                echo '<th>Delete</th>';
            }
            echo '</tr>';
            echo "</thead>";

            echo '</table>';

        while($row = $rows_cars->fetch(PDO::FETCH_ASSOC)){

            echo "<div class='tbl'>";

            echo '<a href="index.php?car='.$row["id"].'">';
            echo '<table>';
            
            echo "<colgroup span={4}></colgroup>";

            echo '<tbody>';
            echo '<tr class="bot">';
            echo "<td>" . $row['manufacturers'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['reg'] . "</td>";            
            echo '<td>' . $row['year'] . '</td>';
            echo '<td>' . $row['distance'] . '</td>';
            echo '<td>' . $row['price'] . '</td>';
            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
                echo "<td><a href='index.php?page=editcar&car=" . $row["id"] . "'><i class='fas fa-pen fa-2x' id='pen_edit'></i></a></td>";
                echo "<td><a href='Includes/delete_car.php?car=" . $row["id"] . "'><i class='fas fa-trash-alt fa-2x' id='trash_edit'></i></a></td>";
            }
            echo "</tr>";
            echo "</tbody>";
            echo "</div>";
            echo "</table>";
            echo "</div>";

            echo '</a>';


        
    }
}

    ?>