<?php

    $username = 'root';
    $password = 'preetimm66';
    $db = 'airline_db';
    $host = 'localhost';

    // $conn = mysql_connect($host, $username, $password);
      
    // if(! $conn ) {
    // die('Could not connect: ' . mysql_error());
    // }
    // else{
    //     print("succ");
    // }
    $link = mysqli_init();
    $success = mysqli_real_connect(
        $link, $host, $username, $password, $db
    );
    if (!$success) {
        die("Connection failed: " . $conn->connect_error);
    }
    else {
        print("success");
    }

    $client = $_REQUEST['id']; 

    //airline data
    $airlineName = $_REQUEST['airname'];
    $airlineId = $_REQUEST['airid'];
    $airlineCategory = $_REQUEST['aircat'];

    //aircraft
    $aircraftID = $_REQUEST['aircid'];
    $aircraftName = $_REQUEST['aircname'];
    $airline = $_REQUEST['airline'];
    $capacity = $_REQUEST['cap'];
    $origin = $_REQUEST['origin'];
    $destination = $_REQUEST['dest'];
    $airlineID = $_REQUEST['dest'];

    
    // insert airline data to db
    if ($client == "1") {
        print($client);
        
        $sql = "INSERT INTO AirlineVALUES (15,'".$airlineId."', '".$airlineName."', '".$airlineCategory."','2021-05-21','2021-05-21 ')";

        if(mysqli_query($link, $sql)) {
            print("stored");
        } else {
            print("failed");
        }
    }

    // insert aircraft data to db
    else if ($client == "2") {
        print($client);
        
        $sql = "INSERT INTO Aircraft VALUES (1,'".$aircraftID."', '".$aircraftName."', '".$origin."', '".$destination."', '".$capacity."','2021-05-21','2021-05-21','".$airline."')";

        if(mysqli_query($link, $sql)) {
            print("stored");
        } else {
            print("failed");
        }
    }

    // insert user and booking data to db
    // else if ($client == "2") {
    //     print($client);
        
    //     $sql = "INSERT INTO Aircraft VALUES (1,'".$aircraftID."', '".$aircraftName."', '".$origin."', '".$destination."', '".$capacity."','2021-05-21','2021-05-21','".$airline."')";

    //     if(mysqli_query($link, $sql)) {
    //         print("stored");
    //     } else {
    //         print("failed");
    //     }
    // }
    

?>