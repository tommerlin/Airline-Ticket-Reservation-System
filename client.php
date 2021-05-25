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
        <form action="user_db.php" method="post" >
            <label for="fname"><b>First Name</b></label>
            <input type="text" placeholder="First Name" name="fname" id="fname" required class="mb-2">

            <label for="lname"><b>Last Name</b></label>
            <input type="text" placeholder="Last Name" name="lname" id="lname" required class="mb-2">

            <label for="phno"><b>Phone Number</b></label>
            <input type="number" placeholder="Phone Number" name="phno" id="phno" required class="mb-2">

            <br/>
            <button type="button" class="btn btn-primary">Sign In</button>
        </form>

        <form action="user_db.php" method="post">

            <label for="sdate"><b>Find total hours travelled between</b></label>
            <input type="date" placeholder="Start Date" name="sdate" id="sdate" required class="mb-2">

           <br/>
            <input type="date" placeholder="End Date" name="edate" id="edate" required class="mb-2">
            <br/>
            <button type="button" class="btn btn-primary mb-2" >Submit</button>
            
            <?php 
                $sql = "SELECT SUM(Booking.travelDuration) as 'Travel Duration' FROM Booking inner join User on Booking.UserId = User.id where Booking.UserId = (select id from  User where   User.firstName='Bruce') and   Booking.departureDateTime between '2021-02-05' and '2021-08-20'";
                $result = mysqli_query($link, $sql) or die(mysqli_error($link));   
                $row= mysqli_fetch_assoc($result);   
                echo '<p>Total hours traveled: ';
                echo $row['Travel Duration'];
                echo " hrs</p>";
            ?>
            
        </form>
       
        
        <form  method="post">
        <button name="btn1" type="submit" class="btn btn-primary">Get travel history</button>
       
        </form>

        <form action="user_db.php" method="post">
                <label for="origin"><b>Origin</b></label>
                <input type="text" placeholder="Origin" name="origin" id="origin" required class="mb-2">
                <label for="dest"><b>Destination</b></label>
                <input type="text" placeholder="Destination" name="dest" id="dest" required class="mb-2">
                <label for="origin"><b>Travel Date</b></label>
                <input type="date" placeholder="Travel Date" name="tdate" id="tdate" required class="mb-2">
                <label for="dest"><b>Return Date</b></label>
                <input type="date" placeholder="Return Date" name="rdate" id="rdate" required class="mb-2">
                <br/>
            <button type="button" class="btn btn-primary">Submit</button>
        </form>
        </div>
        <div class="travel-history-table">
       
               
            <?php  
            if(array_key_exists('btn1', $_POST)) {
                echo "<p> Travel History: </p>
                <table class= 'table '>
                    <thead>
                        <tr>
                        <th scope= 'col '>User Name</th>
                        <th scope= 'col '>From</th>
                        <th scope= 'col '>To</th>
                        <!-- <th scope= 'col '>Airline</th> -->
                        <th scope= 'col '>Price</th>
                        <th scope= 'col '>Duration</th>
                        <th scope= 'col '>Departure Time</th>
                        <th scope= 'col '>Arrival Time</th>
                        </tr>
                    </thead>
                    <tbody> ";
                $sql = "SELECT  Booking.from_ as  'from', Booking.to_ as 'to', Booking.price as 'price', Booking.travelDuration as 'duration', Booking.departureDateTime as 'dtime', Booking.ArrivalDateTime as 'atime',  User.firstName as 'fname',  User.lastName as 'lname' FROM  Booking inner join  User on  Booking.UserId =  User.id where  User.firstName = 'Steve'";
                $result = mysqli_query($link, $sql) or die(mysqli_error($link)); 
                
                while( $row = mysqli_fetch_array($result)){
                    echo  "<tr><td>".$row['fname']." ". $row['lname']." </td><td>". $row['from']." </td><td> ". $row['to']." </td><td> ". $row['price']." </td><td> ". $row['duration']."</td><td>". $row['dtime']."</td><td>". $row['atime']."</td></tr>" ;
                }
                echo " </tbody>
                </table>";
            }
            ?>
            
           
        </div>







        <div class="client-table">
       <p> Flights from Origin to destin: </p>
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
            <tbody>
               

                <?php 
                $sql = "SELECT Aircraft.from_ as 'from', Aircraft.to_  as 'to', Airline.airlineName as 'airname' FROM Aircraft inner join Airline on Aircraft.AirlineId = Airline.id where Airline.id= (select AirlineId from Aircraft where Aircraft.from_ = 'Cochin' and Aircraft.to_ = 'Canada')";
                $result = mysqli_query($link, $sql) or die(mysqli_error($link)); 
                while( $row = mysqli_fetch_array($result)){
                    echo  "<tr><td>".$row['from']." </td><td> ". $row['to']." </td><td> ". $row['airname']. "</td> <td><button type='submit' class='btn btn-warning'><a href='##'>Book Now</a></button></td></tr>" ;
                }
            ?>
            </tbody>
            </table>
        </div>

       

    </div>
   
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
    <?php
        require_once 'db.php';
    ?>
</html>