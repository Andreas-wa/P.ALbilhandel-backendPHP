    <?php    
 
    $order = 'desc';

    if (isset($_GET['car'])){

        $car_id = $_GET['car'];
        $query_car_data = "SELECT id, userID, title, description, manufacturers, year, distance, image, date FROM cars WHERE id = $car_id";
        $return = $dbh->query($query_car_data);
        $row = $return->fetch(PDO::FETCH_ASSOC);

        $query_username = "SELECT users.username FROM users JOIN cars ON cars.userID = users.id WHERE cars.id = $car_id";
        $return_username = $dbh->query($query_username);
        $row_username = $return_username->fetch(PDO::FETCH_ASSOC);

        $query_comments_amount = "SELECT id FROM comments WHERE carID=:car_id";
        $sth_comments_amount = $dbh->prepare($query_comments_amount);         
        $sth_comments_amount->bindParam(':car_id', $car_id);
        $return_comments_amount = $sth_comments_amount->execute();

            echo "<div class='car_wrapper'>";
            echo "<div class='car_header'>";
            echo "<div class='car-title'>";
            echo "<h3>" . $row['title'] . "</h3>";
            echo "</div>";
            // echo "Säljare: " . $row_username['username'] . "<br />";
            echo "Märke: " . $row['manufacturers'] . "<br />";
            echo "<br />";
            echo "Årsmodell: " . $row['year'] . "<br />";
            echo "<br />";
            echo "Miltal: " . $row['distance'] . "<br />";
            echo "</div>";
            echo "<center>";
            echo "<br />";
            echo "<div class='car-description'>";
            echo $row['description'] . "<br />";
            echo "<img src='uploads/" . $row['image'] . "'><br />";
            echo "</div>";
            echo $row['date'];
            echo "</center>";
            echo "<div class='car_footer'>";
            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
            echo "<center><a href='index.php?page=editcar&car=" . $car_id . "'>Redigera inlägg</a></center>";
            echo "</br>";
            echo "<center><a href='Includes/delete_car.php?car=" . $car_id . "'><i class='fas fa-trash-alt fa-2x'></i></a></center>";
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
            
            if (isset($_GET['showcomments']) && $_GET['showcomments'] == 'true'){
                echo "<div class='comments_link'>";
                echo "<br/><a href='index.php?car=$car_id'>". $sth_comments_amount->rowCount() . " Kommentarer</a><hr />";
                echo "</div>";
            }
            else{
                echo "<br/><a href='index.php?car=$car_id&showcomments=true'>". $sth_comments_amount->rowCount() . " Kommentarer</a><hr />";
                echo "<hr class='hr'>";
            }
            

            if(isset($_GET['showcomments']) && $_GET['showcomments'] == 'true'){
                include("Includes/comments_function.php");

                $comments = new GBPost($dbh);

                $comments->fetchAll($car_id);
                
                foreach($comments->getCars() as $comments){
                echo "<center>";
                echo "<b>Användare: </b>" .  $comments['username'] . "<br />";
                echo $comments['content']  . "<br />";
                echo $comments['date']  . "<br />";
                
                if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
                    echo "<a href='Includes/delete_comment.php?car=" . $car_id . "&id=" . $comments['id'] . "'>Ta Bort</a><br />";
                }
               echo "<hr />";
                }

                  if (isset($_SESSION['id']) && $_SESSION['id'] == true){
                    include('Views/comment.php');
                }  
                else{
                    echo "Logga in för att kommentera!<hr/>";
                }
            }
            echo "</center>";
            echo "</div>";
            echo "</div>";
    }


    $query_shopcars = "SELECT id, userID, title, description, manufacturers, year, distance, image, date FROM cars ORDER BY date $order";
    $rows_cars = $dbh->query($query_shopcars);
    
    echo "<br/ >";
    if(isset($_GET['car']) == true){
    while($row = $rows_cars->fetch(PDO::FETCH_ASSOC)){
        // echo "<center>";
        echo "<br/ >";

        echo '<a href="index.php?car='.$row["id"].'">' . $row['title'] . "</a><br />";
        echo "<img src='uploads/" . $row['image'] . "'><br />";

        echo "<h4>Publicerades: " . $row['date'] . "</h4>";
        echo "<br/ >";

        // echo "</center>";
        }     
    } else {
        while($row = $rows_cars->fetch(PDO::FETCH_ASSOC)){
            //echo "<center>";

            echo '<a href="index.php?car='.$row["id"].'">' . $row['title'] . "</a><br />";
            echo "<img src='uploads/" . $row['image'] . "'><br />";

            echo $row['date'];
            echo "<br/ >";



            //echo "</center>";
        
    }
}

    ?>