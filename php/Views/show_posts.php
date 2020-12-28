
    <?php
    
 
    $order = 'desc';
    

    if (isset($_GET['post'])){

        $post_id = $_GET['post'];
        $query_post_data = "SELECT id, userID, title, description, category, image, date FROM posts WHERE id = $post_id";
        $return = $dbh->query($query_post_data);
        $row = $return->fetch(PDO::FETCH_ASSOC); 

        $query_username = "SELECT users.username FROM users JOIN posts ON posts.userID = users.id WHERE posts.id = $post_id";
        $return_username = $dbh->query($query_username);
        $row_username = $return_username->fetch(PDO::FETCH_ASSOC);

        $query_comments_amount = "SELECT id FROM comments WHERE postID=:post_id";
        $sth_comments_amount = $dbh->prepare($query_comments_amount);         
        $sth_comments_amount->bindParam(':post_id', $post_id);
        $return_comments_amount = $sth_comments_amount->execute();

            echo "<div class='post_wrapper'>";
            echo "<div class='post_header'>";
            echo "Författare: " . $row_username['username'] . "<br />";
            echo "Kategori: " . $row['category'] . "<br />";
            echo "<br />";
            echo "</div>";
            echo "<center>";
            echo "<div class='post-title'>";
            echo "<h4>" . $row['title'] . "</h4>";
            echo "</div>";
            echo "<div class='post-description'>";
            echo $row['description'] . "<br />";
            echo "<img src='uploads/" . $row['image'] . "'><br />";
            echo "</div>";
            echo $row['date'];
            echo "</center>";
            echo "<div class='post_footer'>";
            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
            echo "<center><a href='index.php?page=editpost&post=" . $post_id . "'>Redigera inlägg</a></center>";
            echo "</br>";
            echo "<center><a href='Includes/delete_post.php?post=" . $post_id . "'><i class='fas fa-trash-alt fa-2x'></i></a></center>";
            }
            echo "</br>";
            
            /*$postDeleted = new GBPost($dbh);

            $postDeleted->fetchAll($post_id);

            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
                echo "<a href='Includes/delete_post.php?post=" . $post_id . "&id=" . $postDeleted['id'] . ">Ta bort inlägg</a><br />";
            }

            /*if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
            echo "<button>Redigera Inlägg</button>";}
            echo "</center>";
            */
            
            if (isset($_GET['showcomments']) && $_GET['showcomments'] == 'true'){
                echo "<div class='comments_link'>";
                echo "<br/><a href='index.php?post=$post_id'>". $sth_comments_amount->rowCount() . " Kommentarer</a><hr />";
                echo "</div>";
            }
            else{
                echo "<br/><a href='index.php?post=$post_id&showcomments=true'>". $sth_comments_amount->rowCount() . " Kommentarer</a><hr />";
                echo "<hr class='hr'>";
            }
            

            if(isset($_GET['showcomments']) && $_GET['showcomments'] == 'true'){
                include("Includes/comments_function.php");

                $comments = new GBPost($dbh);

                $comments->fetchAll($post_id);
                
                foreach($comments->getPosts() as $comments){
                echo "<center>";
                echo "<b>Användare: </b>" .  $comments['username'] . "<br />";
                echo $comments['content']  . "<br />";
                echo $comments['date']  . "<br />";
                
                if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
                    echo "<a href='Includes/delete_comment.php?post=" . $post_id . "&id=" . $comments['id'] . "'>Ta Bort</a><br />";
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

    

    $query_blogposts = "SELECT id, userID, title, description, category, image, date FROM posts ORDER BY date $order";
    $rows_posts = $dbh->query($query_blogposts);
    
    echo "<br/ >";
    if(isset($_GET['post']) == true){
    while($row = $rows_posts->fetch(PDO::FETCH_ASSOC)){
        //echo "<center>";
        echo '<a href="index.php?post='.$row["id"].'">' . $row['title'] . "</a><br />";
        //echo "</center>";
        }     
    } else {
        while($row = $rows_posts->fetch(PDO::FETCH_ASSOC)){
            //echo "<center>";
            echo '<a href="index.php?post='.$row["id"].'">' . $row['title'] . "</a><br />";
            //echo "</center>";
        
    }
}

    ?>