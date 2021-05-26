<?php
    $conn = mysqli_connect("localhost", "root", "0vUhga", "airline_db");
    $user= urldecode($_GET['user']);
    
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
            
           
            <form action="" method="post" class="client-form">

        
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

                
               
                <label for="dest"><b>Destination</b></label>
               
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
                <input type="date" placeholder="Travel Date" name="tdate" id="tdate" value="2019-01-01"  class="mb-2">
                <br/>
                <button type="submit" name="search" class="btn btn-primary  mb-2">Search</button>
                <button type="submit" name="connect" class="btn btn-primary">Search with connecting flights</button>
                </div>
                <button name="history" type="submit" class="btn btn-primary history">Get travel history</button>

                
            
            </div>

            <div class="client-table">
                <?php  
                    if(array_key_exists('history', $_POST)) {
                        echo '<p class="client-head"> Travel History: </p>
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
                if(array_key_exists('connect', $_POST)) {
                $origin = $_POST["origin"];
                $dest = $_POST["dest"];
                $travelDate = $_POST["tdate"];
                $endDate = $_POST["rdate"];

                echo '<p class="client-head">Connecting Flights from '.$origin.' to '.$dest.': </p> 
                <table class="table">
                    <thead>
                        <tr>
                        
                        <th scope="col">From</th>
                        <th scope="col">Connect</th>
                        <th scope="col">To</th>
                        
                        <th scope="col">Total Price</th>
                        <th scope="col">Total Duration</th>
                        <th scope="col">Departure Time</th>
                        <th scope="col">Arrival Time</th>
                        
                        </tr>
                    </thead>
                    <tbody>';
                    $sql = mysqli_prepare($conn, "SELECT A1.from_ as 'from',A2.from_ as 'connect' ,A2.to_ as 'to', A1.price+A2.price as 'price', A1.travelHours+A2.travelHours as 'duration', A1.departureDateTime as 'dtime',  A2.ArrivalDateTime  as 'atime' FROM Aircraft A1 join Aircraft A2 on (A1.to_ = A2.from_) where A1.from_ = '$origin' and A2.to_ = '$dest' ");
                    
                    mysqli_stmt_execute($sql);
                    
                        mysqli_stmt_bind_result($sql, $from, $connect, $to, $price, $duration, $dtime, $atime);
                        
                        while(mysqli_stmt_fetch($sql)){
                            
                           
                            echo  '<tr><td>'. $from .' </td><td> '. $connect .
                            ' </td><td> '. $to .' </td><td> $'. $price .' </td><td> '. $duration.' hrs </td><td>'. $dtime .'</td><td>'. $atime .
                            '</td></tr>' ;
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
                        $sql = mysqli_prepare($conn, "SELECT  Aircraft.from_ as 'from',  Aircraft.to_ as 'to',  Airline.airlineName as 'airname',  Aircraft.price as 'price', Aircraft.travelHours as 'duration', Aircraft.departureDateTime as 'dtime',  Aircraft.ArrivalDateTime  as 'atime', Aircraft.AirlineId FROM  Aircraft INNER JOIN  Airline ON  Aircraft.AirlineId =  Airline.id  where  Aircraft.from_ = '$origin' and  Aircraft.to_ = '$dest' and (Aircraft.departureDateTime>'$travelDate') ");
                        mysqli_stmt_execute($sql);
                        mysqli_stmt_bind_result($sql, $from, $to, $airname, $price, $duration, $dtime, $atime, $airlineId);
                        
                        while(mysqli_stmt_fetch($sql)){
                            echo '<input type="text" hidden name="from" id="from" value="'. $from.'" >
                            <input type="text" hidden name="to" id="to" value="'. $to.'" >
                            <input type="text" hidden name="price" id="price" value="'. $price.'" >
                            <input type="text" hidden name="duration" id="duration" value="'. $duration.'" >
                            <input type="text" hidden name="dtime" id="dtime" value="'. $dtime.'" >
                            <input type="text" hidden name="atime" id="atime" value="'. $atime.'" >
                            <input type="text" hidden name="airlineId" id="airlineId" value="'. $airlineId.'" >';
                            echo  '<tr><td>'. $from .' </td><td> '. $to .' </td><td> '. $airname .' </td><td> $'. $price .' </td><td> '. $duration.' hrs </td><td>'. $dtime .'</td><td>'. $atime .'</td><td>
                            <button type="submit" name="booknow" class="btn btn-warning">Book Now</button>
                            </td></tr>' ;
                        }
                        echo ' </tbody>
                        </table>';
                }
                if(array_key_exists('booknow', $_POST)) {
                    $from = $_POST["from"];
                    $to = $_POST["to"];
                    $price = $_POST["price"];
                    $duration = $_POST["duration"];
                    $dtime = $_POST["dtime"];
                    $atime = $_POST["atime"];
                    $airlineId = $_POST["airlineId"];


                    $query = mysqli_prepare($conn, "INSERT INTO Booking(id, from_, to_, price, travelDuration, departureDateTime, ArrivalDateTime, createdAt, updatedAt, userId, AirlineId) VALUES (13, '$from', '$to', '$price', '$duration', '$dtime', '$atime',SYSDATE(),SYSDATE(), 1, '$airlineId')");
                    mysqli_stmt_execute($query);


                }
                ?>
            </div>
            </form>
        </div>
    
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    
</html>