<?php

    $username = 'root';
    $password = '0vUhga';
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
    $traveltime = $_REQUEST['traveltime'];
    $arrivetime = $_REQUEST['arrivetime'];
    $deptime = $_REQUEST['deptime'];
    $price = $_REQUEST['price'];

    //user
    $firstName = $_REQUEST['fname'];
    $lastName = $_REQUEST['lname'];
    $phNo = $_REQUEST['phno'];
    $email = $_REQUEST['email'];
    $address = $_REQUEST['address'];

    
    // insert airline data to db
    if ($client == "1") {
        print($client);
        
        $sql = "INSERT INTO Airline(id,airlineName, category, createdAt,updatedAt) VALUES ('".$airlineId."', '".$airlineName."', '".$airlineCategory."','2021-05-21','2021-05-21 ')";

        if(mysqli_query($link, $sql)) {
            print("stored");
        } else {
            print("failed");
        }
    }

    // insert aircraft data to db
    else if ($client == "2") {
        print($client);
        
        $sql = "INSERT INTO Aircraft(id, 	aircraftName ,from_,to_,seatingCapacity,createdAt,updatedAt,AirlineId,travelHours,departureDateTime,ArrivalDateTime, price ) VALUES ('".$aircraftID."', '".$aircraftName."', '".$origin."', '".$destination."', '".$capacity."',SYSDATE(),SYSDATE(),'".$airline."','".$traveltime."','".$deptime."','".$arrivetime."','".$price."')";

        if(mysqli_query($link, $sql)) {
            print("stored");
        } else {
            print("failed");
        }
    }

    // insert user data to db
    else if ($client == "3") {
        print($client);
        
        $sql = "INSERT INTO User(id,firstName,lastName,phoneNumber,email,residentialAddress,createdAt,updatedAt) VALUES (11,'".$firstName."', '".$lastName."', '".$phNo."', '".$email."', '".$address."', SYSDATE(),SYSDATE())";

        if(mysqli_query($link, $sql)) {
            print("stored");
        } else {
            print("failed");
        }
    }
    

?>