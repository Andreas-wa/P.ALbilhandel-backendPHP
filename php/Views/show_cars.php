    <?php    
 
    $order = 'desc';

    if (isset($_GET['car'])){

        $car_id = $_GET['car'];
        $query_car_data = "SELECT id, userID, model, reg, description, manufacturers, year, distance, price, image, date FROM cars WHERE id = $car_id";
        $return = $dbh->query($query_car_data);
        $row = $return->fetch(PDO::FETCH_ASSOC);

        $query_username = "SELECT users.username FROM users JOIN cars ON cars.userID = users.id WHERE cars.id = $car_id";
        $return_username = $dbh->query($query_username);
        $row_username = $return_username->fetch(PDO::FETCH_ASSOC);

        // $query_comments_amount = "SELECT id FROM comments WHERE carID=:car_id";
        // $sth_comments_amount = $dbh->prepare($query_comments_amount);         
        // $sth_comments_amount->bindParam(':car_id', $car_id);
        // $return_comments_amount = $sth_comments_amount->execute();

            // class för all data  
            echo "<div class='car_wrapper'>";
            
            // echo "<table>";
            // echo "<colgroup span={4}></colgroup>";

            // div för car data
            echo "<div class='car_wrapper_info'>";
            
            // echo "<thead>";
            // echo '<tr className="top">';
            // echo "<th>Regnr</th>";
            // echo "<th>Model</th>";
            // echo "<th>Märke</th>";
            // echo '<th className="notOnPhone">Årsmodell</th>';
            // echo '<th className="notOnPhone">Miltal</th>';
            // echo '<th>Pris</th>';
            // echo '</tr>';
            // echo "</thead>";

            // echo "<tbody>";
            // echo "<tr>";
            // echo "<td>Regnr</td>";
            // echo "<td>" . $row['model'] . "</td>";
            // echo "<td>" . $row['manufacturers'] . "</td>";
            // echo '<td>' . $row['year'] . '</td>';
            // echo '<td>' . $row['distance'] . '</td>';
            // echo '<td>' . $row['price'] . '</td>';
            // echo "</tr>";
            // echo "</tbody>";


            // div för tillverkaren
            // echo "Säljare: " . $row_username['username'] . "<br />";
            echo "<div class='car_wrapper_manufacturers'>";
            echo "Märke: " . $row['manufacturers'] . "<br />";
            echo "</div>";

            echo "<br />";

            // div för Model
            echo "<div class='car_wrapper_model'>";
            echo "Model: " . $row['model'];
            echo "</div>";

            echo "<br/>";

            // div för regnummer
            echo "<div class='car_wrapper_reg'>";
            echo "Regnummer: " . $row['reg'];
            echo "</div>";

            echo "<br />";

            // div för årsmodell
            echo "<div class='car_wrapper_year'>";
            echo "Årsmodell: " . $row['year'] . "<br />";
            echo "</div>";

            echo "<br />";
            
            // div för miltal

            echo "<div class='car_wrapper_distance'>";
            echo "Miltal(km): " . $row['distance'] . "<br />";
            echo "</div>";
            echo "<br />";

            // div för pris
            echo "<div class='car_wrapper_price'>";
            echo "Pris(kr): " . $row['price'] . "<br />";
            echo "</div>";
            echo "<br />";

            // end of car_wrapper_info div
            echo "</div>";
            
            // div för beskrivningen
            echo "<div class='car_wrapper_description'>";
            echo "Beskrivning: <br />" .$row['description'] . "<br />";
            echo "<br />";


            // div för bild
            echo "<div class='car_wrapper_image'>";
            echo "<img src='uploads/" . $row['image'] . "'><br />";
            echo "</div>";

            // div för datum
            echo "<div class='car_wrapper_date'>";
            echo $row['date'];
            echo "<br />";
            echo "</div>";

            // div för footer
            echo "<div class='car_wrapper_footer'>";
            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
            echo "<a href='index.php?page=editcar&car=" . $car_id . "'>Redigera inlägg</a>";
            echo "</br>";
            echo "<a href='Includes/delete_car.php?car=" . $car_id . "'><i class='fas fa-trash-alt fa-2x'></i></a>";
            }
            echo "</br>";
            
            echo "</table>";
            /*$carDeleted = new GBcar($dbh);

            $carDeleted->fetchAll($car_id);

            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
                echo "<a href='Includes/delete_car.php?car=" . $car_id . "&id=" . $carDeleted['id'] . ">Ta bort inlägg</a><br />";
            }

            /*if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
            echo "<button>Redigera Inlägg</button>";}
            echo "</center>";
            */
            
            // if (isset($_GET['showcomments']) && $_GET['showcomments'] == 'true'){
            //     echo "<div class='comments_link'>";
            //     echo "<br/><a href='index.php?car=$car_id'>". $sth_comments_amount->rowCount() . " Kommentarer</a><hr />";
            //     echo "</div>";
            // }
            // else{
            //     echo "<br/><a href='index.php?car=$car_id&showcomments=true'>". $sth_comments_amount->rowCount() . " Kommentarer</a><hr />";
            //     echo "<hr class='hr'>";
            // }
            

            // if(isset($_GET['showcomments']) && $_GET['showcomments'] == 'true'){
            //     include("Includes/comments_function.php");

            //     $comments = new GBPost($dbh);

            //     $comments->fetchAll($car_id);
                
            //     foreach($comments->getCars() as $comments){
            //     echo "<center>";
            //     echo "<b>Användare: </b>" .  $comments['username'] . "<br />";
            //     echo $comments['content']  . "<br />";
            //     echo $comments['date']  . "<br />";
                
            //     if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
            //         echo "<a href='Includes/delete_comment.php?car=" . $car_id . "&id=" . $comments['id'] . "'>Ta Bort</a><br />";
            //     }
            //    echo "<hr />";
            //     }

            //       if (isset($_SESSION['id']) && $_SESSION['id'] == true){
            //         include('Views/comment.php');
            //     }  
            //     else{
            //         echo "Logga in för att kommentera!<hr/>";
            //     }
            // }
            // echo "</center>";
            echo "</div>";
    }

    

    $query_shopcars = "SELECT id, userID, model, reg, description, manufacturers, year, distance, price, image, date FROM cars ORDER BY date $order";
    $rows_cars = $dbh->query($query_shopcars);
    
    echo "<br/ >";
    if(isset($_GET['car']) == true){
        echo '<a href="index.php"><i class="fas fa-backspace fa-3x"></i></a>';

    while($row = $rows_cars->fetch(PDO::FETCH_ASSOC)){
        // echo "<center>";
        // echo "<br/ >";
        // echo '<div class="home_car"><a href="index.php?car='.$row["id"].'">';            
        // echo '<h4 class="home_car_model">' . $row['model'] . "</h4><br />";
        // echo '<div class="home_car_info">';
        // // echo "<img src='uploads/" . $row['image'] . "'><br />";
        // echo '<h4 class="home_car_year">Årsmodell: <br/>' . $row['year'] . "</h4>";
        // echo '<h4 class="home_car_distance">Miltal(km): <br/>' . $row['distance'] . "</h4>";
        // echo '<h4 class="home_car_price">Pris: <br/>' . $row['price'] . "</h4>";
        // echo '<h4 class="home_car_date"> Publicerades: <br/>' . $row['date'] . "</h4>";
        // echo "<br/ >";
        // echo "</div>";
        // echo "</a></div>";  
        
        // echo "<div class='tbl'>";

        // echo "<table>";
        // echo "<colgroup span={4}></colgroup>";

        // // div för car data
        
        // echo "<thead>";
        // echo '<tr class="top">';
        // echo "<th>Regnr</th>";
        // echo "<th>Model</th>";
        // echo "<th>Märke</th>";
        // echo '<th className="notOnPhone">Årsmodell</th>';
        // echo '<th className="notOnPhone">Miltal</th>';
        // echo '<th>Pris</th>';
        // echo '</tr>';
        // echo "</thead>";

        // echo "<tbody>";
        // echo "<tr class='bot'>";
        // echo "<td>Regnr</td>";
        // echo "<td>" . $row['Model'] . "</td>";
        // echo "<td>" . $row['manufacturers'] . "</td>";
        // echo '<td>' . $row['year'] . '</td>';
        // echo '<td>' . $row['distance'] . '</td>';
        // echo '<td>' . $row['price'] . '</td>';
        // echo '<td><a href="index.php?car='.$row["id"].'"><i class="fas fa-pen fa-2x"></a></td>';
        // echo "</tr>";
        // echo "</tbody>";
        // echo "</div>";


        // echo "</center>";
        }     
    } else {
                    // echo "<div class='tbl'>";


        echo '<table>';

        echo "<thead>";
            echo '<tr class="top">';
            echo "<th>Märke</th>";
            echo "<th>Model</th>";
            echo "<th>Regnr</th>";
            echo '<th className="notOnPhone">Årsmodell</th>';
            echo '<th className="notOnPhone">Miltal</th>';
            echo '<th>Pris</th>';
            echo '</tr>';
            echo "</thead>";

            echo '</table>';

        while($row = $rows_cars->fetch(PDO::FETCH_ASSOC)){
            //echo "<center>";
            // echo '<div class="home_car"><a href="index.php?car='.$row["id"].'">';            
            // echo '<h4 class="home_car_model">' . $row['model'] . "</h4><br />";
            // echo '<div class="home_car_info">';
            // // echo "<img src='uploads/" . $row['image'] . "'><br />";
            // echo '<h4 class="home_car_year">Årsmodell: <br/>' . $row['year'] . "</h4>";
            // echo '<h4 class="home_car_distance">Miltal(km): <br/>' . $row['distance'] . "</h4>";
            // echo '<h4 class="home_car_price">Pris: <br/>' . $row['price'] . "</h4>";
            // echo '<h4 class="home_car_date"> Publicerades: <br/>' . $row['date'] . "</h4>";
            // echo "<br/ >";
            // echo "</div>";
            // echo "</a></div>";



            echo "<div class='tbl'>";

            echo '<a href="index.php?car='.$row["id"].'">';
            echo '<table>';
            
            echo "<colgroup span={4}></colgroup>";

            // div för car data
            // echo "<thead>";
            // echo '<tr class="top">';
            // echo "<th>Regnr</th>";
            // echo "<th>Model</th>";
            // echo "<th>Märke</th>";
            // echo '<th className="notOnPhone">Årsmodell</th>';
            // echo '<th className="notOnPhone">Miltal</th>';
            // echo '<th>Pris</th>';
            // echo '</tr>';
            // echo "</thead>";

            echo '<tbody>';
            echo '<tr class="bot">';
            echo "<td>" . $row['manufacturers'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['reg'] . "</td>";            
            echo '<td>' . $row['year'] . '</td>';
            echo '<td>' . $row['distance'] . '</td>';
            echo '<td>' . $row['price'] . '</td>';
            // echo '<th><i class="fas fa-eye fa-2x"></a></th>';
            echo "</tr>";
            echo "</tbody>";
            echo "</div>";
            echo "</table>";
            echo '</a>';



            //echo "</center>";
        
    }
}

    ?>