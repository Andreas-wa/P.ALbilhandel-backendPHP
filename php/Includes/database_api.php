<?php

    // $host = "localhost";
    // $user = "root";
    // $pass = "";
    // $db = "pal-bil";
    // $dbconnect =new PDO("mysql::host=$host;dbname=$db", $user, $pass);
    // $row=$dbconnect->prepare("select * from cars");
    // $row->execute();
    // $data=array();
    // foreach($row as $result)

    // {
    //     $jsonformat['id']=$result['id'];
    //     $jsonformat['title']=$result['title'];
    //     $jsonformat['manufacturers']=$result['manufacturers'];
    //     $jsonformat['year']=$result['year'];
    //     $jsonformat['distance']=$result['distance'];
    //     $jsonformat['description']=$result['description'];
    //     array_push($data,$jsonformat);
    // }

    // echo json_encode($data);
    // // print_r(json_encode($data));


    $connect = mysqli_connect("localhost", "root", "", "pal-bil");
    $response = array();
    if($connect){
        $sql = "SELECT * FROM cars";
        $result = mysqli_query($connect, $sql);
        if($result){
            header("Content-Type: JSON");
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
                $response[$i]['id'] = $row ['id'];
                $response[$i]['title'] = $row ['title'];
                $response[$i]['year'] = $row ['year'];
                $i++;
            } 
            echo json_encode($response,JSON_PRETTY_PRINT);
        }
    }
    else{
        echo "fuck!";
    }
?>