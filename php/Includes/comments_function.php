<?php


class GBpost{

    private $data_base_handler;
    private $order = 'desc';
    private $comments;

    public function __construct($dbh){

    $this->data_base_handler = $dbh;

    }

    public function fetchAll($post_id){
    
        $query = "SELECT comments.id, content, date, postID, userID, users.username FROM comments JOIN users ON users.id = comments.userID WHERE postID = $post_id ORDER BY date $this->order ";
        
        $return_array = $this->data_base_handler->query($query);
        $return_array = $return_array->fetchAll(PDO::FETCH_ASSOC);
        
        $this->comments = $return_array;
        
    }

    public function getPosts(){

        return $this->comments;

    }

};

?>