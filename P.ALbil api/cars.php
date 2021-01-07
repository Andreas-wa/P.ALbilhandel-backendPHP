<?php
    class cars{

        // Connection
        private $conn;

        // Table
        private $db_table = "cars";

        // Columns
        public $id;
        public $title;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getcars(){
            $sqlQuery = "SELECT id, title, manufacturers, year, distance, description, image FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // READ single
        public function getSinglecar(){
            $sqlQuery = "SELECT
                        id, 
                        title,
                        manufacturers,
                        year,
                        distance,
                        description,
                        image
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->id = $dataRow['id'];
            $this->title = $dataRow['title'];
            $this->manufacturers = $dataRow['manufacturers'];
            $this->year = $dataRow['year'];
            $this->distance = $dataRow['distance'];
            $this->description = $dataRow['description'];
            $this->image = $dataRow['image'];

        }                
    }
?>