<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "pal-bil";
    $dbconnect =new PDO("mysql::host=$host;dbname=$db", $user, $pass);
    $row=$dbconnect->prepare("select * from cars");
    $row->execute();
    $data=array();
    foreach($row as $result)

    {
        $jsonformat['id']=$result['id'];
        $jsonformat['title']=$result['title'];
        $jsonformat['manufacturers']=$result['manufacturers'];
        $jsonformat['year']=$result['year'];
        $jsonformat['distance']=$result['distance'];
        $jsonformat['description']=$result['description'];
        array_push($data,$jsonformat);
    }

    echo json_encode($data);

?>