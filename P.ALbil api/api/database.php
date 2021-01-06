<?php

// // PHP SETTINGS
//     $host = "localhost";
//     $user = "root";
//     $pass = "";
//     $db = "pal-bil";

//     // MAKE CONNECTION
//     try {
//         $dsn = "mysql:host=$host;dbname=$db;";
//         $dbh = new PDO($dsn, $user, $pass);

//     } catch(PDOException $e) {
//         // ON ERROR
//         echo "Error! ". $e->getMessage() ."<br />";
//         die;
//     }
    class Database {
        private $host = "localhost";
        private $database_name = "pal-bil";
        private $username = "root";
        private $password = "";

        public $conn;

        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }  
?>