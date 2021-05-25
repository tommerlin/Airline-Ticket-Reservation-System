<?php
    $conn = mysqli_connect("localhost", "root", "0vUhga", "airline_db");


    $email = $_POST["email"];
    $phNo = $_POST["phno"];
    // echo $email;

    $sql = mysqli_prepare($conn, "SELECT COUNT(*) FROM User WHERE email = '$email' AND phoneNumber = '$phNo'");
    mysqli_stmt_execute($sql);
    mysqli_stmt_bind_result($sql, $result);
    mysqli_stmt_fetch($sql);  
    if($result){
        header("Location: http://localhost/Airline-Ticket-Reservation-System/client.php?user=". urlencode(($email)));
    }
?>
<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="main-container">
            <div class="heading">
                <h3>Airline Booking System</h3>
                <div class="buttons">
                    <button type="submit" class="btn btn-warning">
                        <a href="data.php">Add new Data</a>
                    </button>
                    <button type="submit" class="btn btn-warning">
                        <a href="airline.php">Airline Details</a>
                    </button>
                    <button type="submit" class="btn btn-warning">
                    <a href="client.php">User Details</a>
                    </button>
                </div>
            </div>
            <div class="client-details">
                <form action="" method="post" >
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Email ID" name="email" id="email" required class="mb-2">

                    <label for="phno"><b>Phone Number</b></label>
                    <input type="text" placeholder="Phone Number" name="phno" id="phno" required class="mb-2">

                    <br/>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </form>
            </div>
        </div>
    </body>