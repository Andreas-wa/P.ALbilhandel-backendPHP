<?php
    class cars{

        // Connection
        private $conn;

        // Table
        private $db_table = "cars";
        private $db_images = "images";

        // Columns
        public $id;
        public $car_id;
        public $model;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getcars(){
            $sqlQuery = "SELECT id, reg, manufacturers, model, year, distance, price, description FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        public function getcars_images(){
            $sql_image = 'SELECT id, car_id, file_name FROM ' . $this->db_images . '';
            $stmt_image = $this->conn->prepare($sql_image);
            $stmt_image->execute();
            return $stmt_image;
        }


        public function getSingleCarImage(){
            $sql_image = "SELECT
                        id, 
                        car_id,
                        file_name
                      FROM
                      " . $this->db_images ."
                    WHERE 
                       car_id = ?
                    ";

            $stmt_image = $this->conn->prepare($sql_image);

            $stmt_image->bindParam(1, $this->car_id);

            $stmt_image->execute();

            $dataRow = $stmt_image->fetch(PDO::FETCH_ASSOC);
            
            $this->id = $dataRow['id'];
            $this->car_id = $dataRow['car_id'];
            $this->file_name = $dataRow['file_name'];

        }

        
        // READ single
        public function getSinglecar(){
            $sqlQuery = "SELECT
                        id, 
                        reg,
                        manufacturers,
                        model,
                        year,
                        distance,
                        price,
                        description
                      FROM
                        ". $this->db_table . " 
                    WHERE 
                       id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->id = $dataRow['id'];
            $this->reg = $dataRow['reg'];
            $this->manufacturers = $dataRow['manufacturers'];
            $this->model = $dataRow['model'];
            $this->year = $dataRow['year'];
            $this->distance = $dataRow['distance'];
            $this->price = $dataRow['price'];
            $this->description = $dataRow['description'];

        }                
    }
?>