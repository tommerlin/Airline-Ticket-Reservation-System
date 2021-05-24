<?php

    $username = 'root';
    $password = '0vUhga';
    $db = 'airline_db';
    $host = 'localhost';

    $link = mysqli_init();
    $success = mysqli_real_connect(
        $link, $host, $username, $password, $db
    );
    if (!$success) {
        die("Connection failed: " . $conn->connect_error);
    }
    else {
        die("Connection success: " . $conn->connect_success);
    }

    // $user_sql = "CREATE TABLE User (id int NOT NULL AUTO_INCREMENT, uuid char(36) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL, firstName varchar(255) DEFAULT NULL,lastName varchar(255) DEFAULT NULL, phoneNumber varchar(255) DEFAULT NULL, email varchar(255) DEFAULT NULL, residentialAddress varchar(255) DEFAULT NULL, createdAt datetime NOT NULL, updatedAt datetime NOT NULL, PRIMARY KEY (id), UNIQUE KEY uuid (uuid))";

    // if(mysqli_query($link, $user_sql)) {
    //     print("User table created");
    // } else {
    //     print("User table failed");
    // }

    // $aircraft_sql = "CREATE TABLE Aircraft (id int NOT NULL AUTO_INCREMENT, uuid char(36) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL, aircraftName varchar(255) DEFAULT NULL,from_ varchar(255) DEFAULT NULL, to_ varchar(255) DEFAULT NULL, seatingCapacity varchar(255) DEFAULT NULL, createdAt datetime NOT NULL, updatedAt datetime NOT NULL, AirlineId int NOT NULL,PRIMARY KEY (id),UNIQUE KEY uuid (uuid),KEY AirlineId (AirlineId),CONSTRAINT Aircraft_ibfk_1 FOREIGN KEY (AirlineId) REFERENCES Airline (id) ON DELETE CASCADE ON UPDATE CASCADE )";
    // if(mysqli_query($link, $aircraft_sql)) {
    //     print("Aircraft table created");
    // } else {
    //     print("Aircraft table failed");
    // }

    // $airline_sql = "CREATE TABLE Airline (id int NOT NULL AUTO_INCREMENT,uuid char(36) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,airlineName varchar(255) DEFAULT NULL,category ENUM('legacy','lcc','ulcc') DEFAULT 'legacy',createdAt datetime NOT NULL,updatedAt datetime NOT NULL,PRIMARY KEY (id),UNIQUE KEY uuid (uuid)) ";

    // if(mysqli_query($link, $airline_sql)) {
    //     print("Airline table created");
    // } else {
    //     print("Airline table failed");
    // }

    // $booking_sql = "CREATE TABLE Booking (id int NOT NULL AUTO_INCREMENT,uuid char(36) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL, from_ varchar(255) DEFAULT NULL,to_ varchar(255) DEFAULT NULL,price varchar(255) DEFAULT NULL,travelDuration varchar(255) DEFAULT NULL,departureDateTime varchar(255) DEFAULT NULL,ArrivalDateTime varchar(255) DEFAULT NULL,createdAt datetime NOT NULL,updatedAt datetime NOT NULL,UserId int NOT NULL,AirlineId int DEFAULT NULL,PRIMARY KEY (id),UNIQUE KEY uuid (uuid),KEY UserId (UserId),KEY AirlineId (AirlineId),CONSTRAINT Booking_ibfk_1 FOREIGN KEY (UserId) REFERENCES User (id) ON DELETE CASCADE ON UPDATE CASCADE,CONSTRAINT Booking_ibfk_2 FOREIGN KEY (AirlineId) REFERENCES Airline (id) ON DELETE SET NULL ON UPDATE CASCADE)";

    // if(mysqli_query($link, $booking_sql)) {
    //     print("Booking table created");
    // } else {
    //     print("Booking table failed");
    // }
?>
