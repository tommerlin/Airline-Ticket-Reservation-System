<?php
    $conn = mysqli_connect("localhost", "root", "0vUhga", "airline_db");
    $user= urldecode($_GET['user']);
    session_start();
    $_SESSION["user"] = $user;
      
?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="main-container client-page">
            <div class="heading">
                <h3>Airline Booking System</h3>
                <div class="buttons">
                    <button type="submit" class="btn btn-warning">
                        <a href="data.php">Add new Data</a>
                    </button>
                    <button type="submit" class="btn btn-warning">
                    <a href="airline.php?id=<?php echo $user; ?>">Airline Details</a>
                    </button>
                    <button type="submit" class="btn btn-warning">
                    <a href="main.php">User Details</a>
                    </button>
                </div>
            </div>
            <!-- <div class="client-details">
            <form action="user_db.php" method="post" >
                <label for="fname"><b>First Name</b></label>
                <input type="text" placeholder="First Name" name="fname" id="fname" required class="mb-2">

                <label for="lname"><b>Last Name</b></label>
                <input type="text" placeholder="Last Name" name="lname" id="lname" required class="mb-2">

                <label for="phno"><b>Phone Number</b></label>
                <input type="number" placeholder="Phone Number" name="phno" id="phno" required class="mb-2">

                <br/>
                <button type="button" class="btn btn-primary">Sign In</button>
            </form> -->
           
            <form action="" method="post" class="client-form">

                <!-- <label for="sdate"><b>Find total hours travelled between</b></label>
                <input type="date" placeholder="Start Date" name="sdate" id="sdate" value="2019-01-01" required class="mb-2">

                <br/>
                <input type="date" placeholder="End Date" name="edate" id="edate" value="2022-01-01" required class="mb-2">
                <br/>
                <button type="submit" name="getHours" class="btn btn-primary mb-2" >Submit</button> -->
                
                    <?php 
                        // if(array_key_exists('getHours', $_POST)){
                        //     $startDate = $_POST["sdate"];
                        //     $endDate = $_POST["edate"];

                        //     $sql = mysqli_prepare($conn, "SELECT SUM(Booking.travelDuration) as 'Travel Duration' FROM Booking inner join User on Booking.UserId = User.id where Booking.UserId = (select id from  User where   User.email='$user') and   Booking.departureDateTime between '$startDate' and '$endDate'");
                        //     mysqli_stmt_execute($sql);
                        //     mysqli_stmt_bind_result($sql, $result);
                        //     mysqli_stmt_fetch($sql);  
                        //     echo '<p> Total hours traveled: ' . $result . ' hrs</p>';
                        // }
                    ?>
                

                
                <div class="book-input">
                <label for="origin"><b>Origin</b></label>
                <?php 
                        $sql = "SELECT distinct from_ as 'from' FROM Aircraft";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($link));
                        echo '<select name="origin" id="origin" class="mb-2" required>';
                        echo "<option value='null'>Select</option>";
                        while( $row = mysqli_fetch_array($result)){
                            echo "<option value='" . $row['from'] . "'>" . $row['from'] . "</option>";
                        }
                        echo "</select>";
                    ?>
                <br/>


                <!-- <input type="text" placeholder="Origin" name="origin" id="origin"  class="mb-2"> -->
                <label for="dest"><b>Destination</b></label>
                <!-- <input type="text" placeholder="Destination" name="dest" id="dest"  class="mb-2"> -->
                <?php 
                        $sql = "SELECT distinct to_ as 'to' FROM Aircraft";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($link));
                        echo '<select name="dest" id="dest" class="mb-2" required>';
                        echo "<option value='select'>Select</option>";
                        while( $row = mysqli_fetch_array($result)){
                            echo "<option value='" . $row['to'] . "'>" . $row['to'] . "</option>";
                        }
                        echo "</select>";
                    ?>
                <br/>
                
                
                
                <label for="origin"><b>Travel Date</b></label>
                <input type="date" placeholder="Travel Date" name="tdate" id="tdate" value="2021-05-18"  class="mb-2">
                <label for="dest"><b>Return Date</b></label>
            
                <input type="date" placeholder="Return Date" name="rdate" id="rdate" value="2021-05-18"  class="mb-2">
                <br/>
                <button type="submit" name="search" class="btn btn-primary">Search</button>
                </div>
                <button name="history" type="submit" class="btn btn-primary history">Get travel history</button>

                
            </form>
            </div>

            <div class="client-table">
                <?php  
                    if(array_key_exists('history', $_POST)) {
                        echo '<p> Travel History: </p>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope= "col" >User Name</th>
                                <th scope= "col">From</th>
                                <th scope= "col">To</th>
                                <th scope= "col">Price</th>
                                <th scope= "col">Duration</th>
                                <th scope= "col">Departure Time</th>
                                <th scope= "col">Arrival Time</th>
                                </tr>
                            </thead>
                            <tbody> ';
                            $sql_ = mysqli_prepare($conn, "SELECT User.firstName, User.lastName, Booking.from_ , Booking.to_ , Booking.price, Booking.travelDuration, Booking.departureDateTime , Booking.ArrivalDateTime FROM  Booking INNER JOIN  User ON  Booking.UserId =  User.id WHERE User.email = '$user'");
                            mysqli_stmt_execute($sql_);
                            mysqli_stmt_bind_result($sql_, $fname, $lname, $from, $to, $price, $duration, $dtime, $atime);
                            // var_dump($user);
                            while(mysqli_stmt_fetch($sql_)){
                                echo  '<tr><td>'. $fname .' '. $lname .' </td><td>'. $from .' </td><td> '. $to .' </td><td> '. $price .' </td><td> '. $duration.'</td><td>'. $dtime .'</td><td>'. $atime .'</td></tr>' ;
                            }
                            echo ' </tbody>
                            </table>';
                    }
                ?>
            </div>
            <div class="client-table">
            <?php 
                if(array_key_exists('search', $_POST)) {
                    $origin = $_POST["origin"];
                    $dest = $_POST["dest"];
                    $travelDate = $_POST["tdate"];
                    $endDate = $_POST["rdate"];
                    echo $origin;
                    echo $dest;
                    echo $travelDate;
                    echo $endDate;
                    echo '<p> Flights from '.$origin.' to '.$dest.': </p> 
                    <table class="table">
                        <thead>
                            <tr>
                            
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Airline</th>
                            <th scope="col">Price</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Departure Time</th>
                            <th scope="col">Arrival Time</th>
                            <th scope="col">Book Now</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $sql = mysqli_prepare($conn, "SELECT  Aircraft.from_ as 'from',  Aircraft.to_ as 'to',  Airline.airlineName as 'airname',  Aircraft.price as 'price', Aircraft.travelHours as 'duration', Aircraft.departureDateTime as 'dtime',  Aircraft.ArrivalDateTime  as 'atime' FROM  Aircraft INNER JOIN  Airline ON  Aircraft.AirlineId =  Airline.id  where  Aircraft.from_ = '$origin' and  Aircraft.to_ = '$dest' and (Aircraft.departureDateTime>'$travelDate' or Aircraft.ArrivalDateTime<'$endDate') ");
                            mysqli_stmt_execute($sql);
                            mysqli_stmt_bind_result($sql, $from, $to, $airname, $price, $duration, $dtime, $atime);

                echo '<p> Flights from '.$origin.' to '.$dest.': </p> 
                <table class="table">
                    <thead>
                        <tr>
                        
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Airline</th>
                        <th scope="col">Price</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Departure Time</th>
                        <th scope="col">Arrival Time</th>
                        <th scope="col">Book Now</th>
                        </tr>
                    </thead>
                    <tbody>';
                        $sql = mysqli_prepare($conn, "SELECT  Aircraft.from_ as 'from',  Aircraft.to_ as 'to',  Airline.airlineName as 'airname',  Aircraft.price as 'price', Aircraft.travelHours as 'duration', Aircraft.departureDateTime as 'dtime',  Aircraft.ArrivalDateTime  as 'atime' FROM  Aircraft INNER JOIN  Airline ON  Aircraft.AirlineId =  Airline.id  where  Aircraft.from_ = '$origin' and  Aircraft.to_ = '$dest' and (Aircraft.departureDateTime>'$travelDate' or Aircraft.ArrivalDateTime<'$endDate') ");
                        mysqli_stmt_execute($sql);
                        mysqli_stmt_bind_result($sql, $from, $to, $airname, $price, $duration, $dtime, $atime);
                        
                        while(mysqli_stmt_fetch($sql)){
                        
                            echo  '<tr><td>'. $from .' </td><td> '. $to .' </td><td> '. $airname .' </td><td> $'. $price .' </td><td> '. $duration.' hrs </td><td>'. $dtime .'</td><td>'. $atime .'</td><td>
                            <button type="submit" name="booknow" class="btn btn-warning">Book Now</button>
                            </td></tr>' ;
                        }
                        echo ' </tbody>
                        </table>';
                }
                ?>
            </div>
        </div>
    
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    
</html>