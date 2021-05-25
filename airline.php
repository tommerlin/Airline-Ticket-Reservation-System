<?php

    $username = 'root';
    $password = 'preetimm66';
    $db = 'airline_db';
    $host = 'localhost';

    // $link = mysqli_init();
    // $conn = mysqli_real_connect(
    //     $link, $host, $username, $password, $db
    // );
    // if (!$conn) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
//     $conn = mysqli_connect("localhost", "root", "0vUhga", "airline_db");
//     if (mysqli_connect_errno()) {
//         echo "Failed to connect to MySQL: " . mysqli_connect_error();
//         // exit();
//       }
    $conn = mysqli_connect("localhost", "root", "preetimm66", "airline_db");
    
    // if(mysqli_connect_error())
    //     echo "Connection Error.";
    // else
    //     echo "Database Connection Successfully.";
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
                <a href="sign_in.php">User Details</a>
                </button>
            </div>
        </div>
  
    
       <div class="airdata-container">
             <!-- <div>
            <form action="user_db.php" method="post">
            
                <label for="hrair"><b>Total hours by airline</b></label>
                <input type="text" placeholder="Airline Name" name="hrair" id="hrair" required>

                <label for="sdate"><b>Start Date</b></label>
                <input type="date" placeholder="Start Date" name="sdate" id="sdate" required>

                <label for="edate"><b>End Date</b></label>
                <input type="date" placeholder="End Date" name="edate" id="edate" required>

        
                <button type="button" class="btn btn-primary">Submit</button>
                
            </form>
            <p>Total hours: xx </p>
            <form action="user_db.php" method="post">

                <label for="lname"><b>Total hours by aircraft</b></label>
                <input type="text" placeholder="Aircraft Name" name="lname" id="lname" required>
                
                <label for="sdate"><b>Start Date</b></label>
                <input type="date" placeholder="Start Date" name="sdate" id="sdate" required>

                <label for="edate"><b>End Date</b></label>
                <input type="date" placeholder="End Date" name="edate" id="edate" required>

                <button type="button" class="btn btn-primary">Submit</button>
            </form>
            <p>Total hours: xx </p>
            <form action="user_db.php" method="post">
                <label for="name"><b>Total number of aircrafts in: </b></label>
                <input type="text" placeholder="Airline Name" name="name" id="name" required>
                
                <button type="button" class="btn btn-primary">Submit</button>
            </form>
            <p>Total number of aircrafts: xx </p>
            <form action="user_db.php" method="post">
                <label for="name"><b>Most visited city during date </b></label>
                <input type="date" placeholder="Start Date" name="sdate" id="sdate" required>

                <label for="edate"><b>and </b></label>
                <input type="date" placeholder="End Date" name="edate" id="edate" required>
                
                <button type="button" class="btn btn-primary">Submit</button>
            </form>
            <p>Most visited city: xx </p>

            <form action="user_db.php" method="post">

                <label for="lname"><b>List of passengers with destination : </b></label>
                <input type="dest" placeholder="Destination" name="dest" id="dest" required>
                
                <label for="sdate"><b>between the dates</b></label>
                <input type="date" placeholder="Start Date" name="sdate" id="sdate" required> 

    <button type="button" class="btn btn-primary mb-2">Get hours traveled by airline</button>
    <button type="button" class="btn btn-primary mb-2">Get hours traveled by aircraft</button>
   

    <button type="button" class="btn btn-primary mb-2">Get number of aircrats in airline</button>
  

    <button type="button" class="btn btn-primary mb-2">Get most visited city between the dates</button>
    <button type="button" class="btn btn-primary mb-2">Get passengers with destination between dates</button>
    <button type="button" class="btn btn-primary mb-2">Get aircrafts which does not have destination</button>
</div>-->

    <form action="" method="post" class="airline-container">
    
        <div class="input-container">
            <form action="" method="post" class="input-container"> 
                <label for="hrair"><b>Airline Name</b></label>
                    <?php 
                        $sql = "SELECT * FROM Airline";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($link));
                        echo '<select name="airline" id="airline" class="mb-2" required>';
                        while( $row = mysqli_fetch_array($result)){
                            echo "<option value='" . $row['airlineName'] . "'>" . $row['airlineName'] . "</option>";
                        }
                        echo "</select>";
                    ?>
                    <br/>
                <label for="lname"><b>Aircraft Name</b></label>
                    <?php 
                        $sql = "SELECT * FROM Aircraft";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($link));
                        echo '<select name="aircraft" id="aircraft" class="mb-2" required>';
                        while( $row = mysqli_fetch_array($result)){
                            echo "<option value='" . $row['aircraftName'] . "'>" . $row['aircraftName'] . "</option>";
                        }
                        echo "</select>";
                    ?>
                     <br/>
                <label for="sdate"><b>Start Date</b></label>
                <input type="date" placeholder="Start Date" name="sdate" id="sdate" required value="2019-01-01" class="mb-2">
                <br/>
                <label for="edate"><b>End Date</b></label>
                <input type="date" placeholder="End Date" name="edate" id="edate" required value="2022-01-02" class="mb-2">
                <br/>
                <label for="lname"><b>Destination </b></label>
                    <?php 
                        $sql = "SELECT * FROM Aircraft";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($link));
                        echo '<select name="dest" id="dest" class="mb-2" required>';
                        while( $row = mysqli_fetch_array($result)){
                            echo "<option value='" . $row['to_'] . "'>" . $row['to_'] . "</option>";
                        }
                        echo "</select>";
                    ?>
                     <br/>
                </div>
                
                <div class="d-flex flex-column bd-highlight mb-3">
                        <button type="submit" name="btn1" class="btn btn-primary mb-2">Get hours traveled by airline</button>
                        <button type="submit" name="btn2" class="btn btn-primary mb-2">Get hours traveled by aircraft</button>
                        <button type="submit" name="btn3" class="btn btn-primary mb-2">Get number of aircrats in airline</button>  
                        <button type="submit" name="btn4" class="btn btn-primary mb-2">Get most visited city between the dates</button>
                        <button type="submit" name="btn5" class="btn btn-primary mb-2">Get passengers with destination between dates</button>
                        <button type="submit" name="btn6" class="btn btn-primary mb-2">Get aircrafts which does not have destination</button>
                </div>
        </form>

        <div>
            <?php 
                //input values
                $airline = $_POST["airline"];
                $aircraft = $_POST["aircraft"];
                $startDate = $_POST["sdate"];
                $endDate = $_POST["edate"];
                $destination = $_POST["dest"];

                //query
                if(array_key_exists('btn1', $_POST)) {
                    $sql = mysqli_prepare($conn, "SELECT SUM(Aircraft.travelHours) FROM Aircraft JOIN Airline ON Aircraft.AirlineId = Airline.id WHERE Aircraft.AirlineId = (SELECT id FROM Airline WHERE airlineName = '$airline') AND Aircraft.departureDateTime BETWEEN '$startDate' AND '$endDate'");
                    mysqli_stmt_execute($sql);
                    mysqli_stmt_bind_result($sql, $result);
                    mysqli_stmt_fetch($sql);  
                    echo '<p> Number of hours travelled by airline "'.$airline. '": ' . $result . ' hrs</p>';
                    
                }
                else if(array_key_exists('btn2', $_POST)) {
                    $sql = mysqli_prepare($conn, "SELECT SUM(travelHours) FROM Aircraft WHERE aircraftName = '$aircraft' AND createdAt BETWEEN '$startDate' AND '$endDate' ");
                    mysqli_stmt_execute($sql);
                    mysqli_stmt_bind_result($sql, $result);
                    mysqli_stmt_fetch($sql);  
                    echo '<p> Number or hours travelled by aircraft "'.$aircraft.'": ' . $result . ' hrs</p>';   
                    
                }
                else if(array_key_exists('btn3', $_POST)) {
                    $sql = mysqli_prepare($conn, "SELECT COUNT(aircraftName) FROM Aircraft WHERE AirlineId = (SELECT id FROM Airline WHERE airlineName = '$airline' )");
                    mysqli_stmt_execute($sql);
                    mysqli_stmt_bind_result($sql, $result);
                    mysqli_stmt_fetch($sql);  
                    echo '<p> Number of Aircrafts in ' .$airline. ' : ' . $result . '</p>';
                }
                else if(array_key_exists('btn4', $_POST)) {
      
                    $sql = mysqli_prepare($conn,"SELECT Booking.to_ FROM Booking where  Booking.departureDateTime BETWEEN '$startDate' AND '$endDate' group by Booking.to_ order by count(Booking.to_) desc limit 1");
                    mysqli_stmt_execute($sql);
                    mysqli_stmt_bind_result($sql, $result);
                    mysqli_stmt_fetch($sql);  
                    echo '<p> Most visited city between '.$startDate.' and '.$endDate.': '  .$result. ' </p>';
                }
                else if(array_key_exists('btn5', $_POST)) {
                    $sql = mysqli_prepare($conn, "SELECT  User.firstName AS 'fname', User.lastName AS 'lname', User.phoneNumber AS 'num',  Booking.to_ AS 'dest' FROM  Booking INNER JOIN  User ON  Booking.UserId =  User.id WHERE  Booking.to_ = '$destination' AND  Booking.departureDateTime BETWEEN '$startDate' AND '$endDate'");
                    mysqli_stmt_execute($sql);
                    mysqli_stmt_bind_result($sql, $fname, $lname, $phNo, $dest);
                    
                    echo "<p> Passengers who travelled to ".$destination." between given dates</p>";
                    
                    echo "<table class= 'table'>
                    <thead><tr>
                        <th scope= 'col'>User Name</th> <th scope= 'col '>Phone No.</th><th scope= 'col '>Destination</th>
                        </tr> </thead>
                    <tbody> ";
                    while(mysqli_stmt_fetch($sql)){
                        echo '<tr><td> ' . $fname.' '.$lname . '</td><td>'.$phNo.'</td><td>'.$dest.'</td></tr>';
                    }
                    echo " </tbody> </table>";




                }
                
                else if(array_key_exists('btn6', $_POST)) {
                    $sql = mysqli_prepare($conn, "SELECT  Aircraft.aircraftName AS 'Name',  Aircraft.from_ AS 'Source Location',  Aircraft.AirlineId AS 'AirId', Aircraft.seatingCapacity AS 'Cap' FROM  Aircraft WHERE  Aircraft.from_ <> '$destination'");
                    mysqli_stmt_execute($sql);
                    mysqli_stmt_bind_result($sql, $aircraftName, $from, $airlineId, $seat);
                    echo "<p> Aircrafts not from the destionation: ".$destination."</p>";
                    echo "<table class= 'table'>
                    <thead><tr><th scope= 'col '>Airline</th>
                        <th scope= 'col '>From</th> <th scope= 'col '>Air Id</th><th scope= 'col '>Capacity</th>
                        </tr> </thead>
                    <tbody> ";
                    while(mysqli_stmt_fetch($sql)){
                        echo '<tr><td> ' . $aircraftName . '</td><td>'.$from.'</td><td>'.$airlineId.'</td><td>'.$seat.'</td></tr>';
                    }
                    echo " </tbody> </table>";
                }
                
            ?>

        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
    
</html>