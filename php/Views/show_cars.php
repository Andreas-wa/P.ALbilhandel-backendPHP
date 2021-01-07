    <?php    
 
    $order = 'desc';

    if (isset($_GET['car'])){

        $car_id = $_GET['car'];
        $query_car_data = "SELECT id, userID, title, description, manufacturers, year, distance, price, image, date FROM cars WHERE id = $car_id";
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
            
            // div för car data
            echo "<div class='car_wrapper_info'>";
            
            // div för titel
            echo "<div class='car_wrapper_title'>";
            echo "<h3> Rubrik:" . $row['title'] . "</h3>";
            echo "</div>";

            // div för tillverkaren
            // echo "Säljare: " . $row_username['username'] . "<br />";
            echo "<div class='car_wrapper_manufacturers'>";
            echo "Märke: " . $row['manufacturers'] . "<br />";
            echo "</div>";

            echo "<br />";

            // div för årsmodell
            echo "<div class='car_wrapper_year'>";
            echo "Årsmodell: " . $row['year'] . "<br />";
            echo "</div>";
            echo "<br />";
            
            // div för miltal
            echo "<div class='car_wrapper_distance'>";
            echo "Miltal: " . $row['distance'] . "<br />";
            echo "</div>";
            echo "<br />";

            // div för pris
            echo "<div class='car_wrapper_price'>";
            echo "Pris: " . $row['price'] . "<br />";
            echo "</div>";
            echo "<br />";

            // end of car_wrapper_info div
            echo "</div>";
            
            // div för beskrivningen
            echo "<div class='car_wrapper_description'>";
            echo $row['description'] . "<br />";

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


    $query_shopcars = "SELECT id, userID, title, description, manufacturers, year, distance, price, image, date FROM cars ORDER BY date $order";
    $rows_cars = $dbh->query($query_shopcars);
    
    echo "<br/ >";
    if(isset($_GET['car']) == true){
    while($row = $rows_cars->fetch(PDO::FETCH_ASSOC)){
        // echo "<center>";
        echo "<br/ >";
        echo '<div class="home_car"><a href="index.php?car='.$row["id"].'">';            
        echo '<h4 class="home_car_title">' . $row['title'] . "</h4><br />";
        echo '<div class="home_car_info">';
        // echo "<img src='uploads/" . $row['image'] . "'><br />";
        echo '<h4 class="home_car_year">Årsmodell: <br/>' . $row['year'] . "</h4>";
        echo '<h4 class="home_car_distance">Miltal(km): <br/>' . $row['distance'] . "</h4>";
        echo '<h4 class="home_car_price">Pris: <br/>' . $row['price'] . "</h4>";
        echo '<h4 class="home_car_date"> Publicerades: <br/>' . $row['date'] . "</h4>";
        echo "<br/ >";
        echo "</div>";
        echo "</a></div>";


        // echo "</center>";
        }     
    } else {
        while($row = $rows_cars->fetch(PDO::FETCH_ASSOC)){
            //echo "<center>";
            echo '<div class="home_car"><a href="index.php?car='.$row["id"].'">';            
            echo '<h4 class="home_car_title">' . $row['title'] . "</h4><br />";
            echo '<div class="home_car_info">';
            // echo "<img src='uploads/" . $row['image'] . "'><br />";
            echo '<h4 class="home_car_year">Årsmodell: <br/>' . $row['year'] . "</h4>";
            echo '<h4 class="home_car_distance">Miltal(km): <br/>' . $row['distance'] . "</h4>";
            echo '<h4 class="home_car_price">Pris: <br/>' . $row['price'] . "</h4>";
            echo '<h4 class="home_car_date"> Publicerades: <br/>' . $row['date'] . "</h4>";
            echo "<br/ >";
            echo "</div>";
            echo "</a></div>";




            //echo "</center>";
        
    }
}

    ?>