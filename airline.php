<?php

    $username = 'root';
    $password = 'preetimm66';
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
  
    
       <div class="main-container m-3 d-flex justify-content-around m-3">
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


    
<div class="w-25">
            <form action="" method="post" class="d-flex flex-column bd-highlight mb-3">   
                <label for="hrair"><b>Airline Name</b></label>
                    <?php 
                        $sql = "SELECT * FROM Airline";
                        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                        // echo $result[1];
                        echo '<select name="airline" id="airline" class="mb-2" required>';
                        while( $row = mysqli_fetch_array($result)){
                            echo "<option value='" . $row['airlineName'] . "'>" . $row['airlineName'] . "</option>";
                        }
                        echo "</select>";
                    ?>
                <label for="lname"><b>Aircraft Name</b></label>
                    <?php 
                        $sql = "SELECT * FROM Aircraft";
                        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                        // echo $result[1];
                        echo '<select name="aircraft" id="aircraft" class="mb-2" required>';
                        while( $row = mysqli_fetch_array($result)){
                            echo "<option value='" . $row['aircraftName'] . "'>" . $row['aircraftName'] . "</option>";
                        }
                        echo "</select>";
                    ?>
                <label for="sdate"><b>Start Date</b></label>
                <input type="date" placeholder="Start Date" name="sdate" id="sdate" required class="mb-2">

                <label for="edate"><b>End Date</b></label>
                <input type="date" placeholder="End Date" name="edate" id="edate" required class="mb-2">

                <label for="lname"><b>Destination </b></label>
                    <?php 
                        $sql = "SELECT * FROM Aircraft";
                        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                        // echo $result[1];
                        echo '<select name="dest" id="dest" class="mb-2" required>';
                        while( $row = mysqli_fetch_array($result)){
                            echo "<option value='" . $row['to_'] . "'>" . $row['to_'] . "</option>";
                        }
                        echo "</select>";
                    ?>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php
                if (isset($_POST['submit'])) {
                    $airline = $_POST["airline"];
                    $aircraft = $_POST["aircraft"];
                    $startDate = $_POST["sdate"];
                    $endDate = $_POST["edate"];
                    $destination = $_POST["dest"];

                    echo $airline ;
                    echo $aircraft;
                    echo $startDate;
                    echo $endDate;
                    echo $destination;
            
                }
            ?>
        </div>
        
        <div class="d-flex flex-column bd-highlight mb-3 w-25">

            <button type="button" class="btn btn-primary mb-2">Get hours traveled by airline</button>


            <button type="button" class="btn btn-primary mb-2">Get hours traveled by aircraft</button>
            <button type="button" class="btn btn-primary mb-2">Get number of aircrats in airline</button>
              
            <button type="button" class="btn btn-primary mb-2">Get most visited city between the dates</button>
            <button type="button" class="btn btn-primary mb-2">Get passengers with destination between dates</button>
            <button type="button" class="btn btn-primary mb-2">Get aircrafts which does not have destination</button>
        </div>

        <div class="d-flex flex-column bd-highlight mb-3 w-25 ">
<?php 
        $sql = "SELECT SUM(Aircraft.travelHours) as 'Total Travel Hours' FROM Aircraft join Airline on Aircraft.AirlineId = Airline.id where Aircraft.AirlineId = (select id from Airline where Airline.airlineName = 'Emirates') and Aircraft.departureDateTime between '2021-01-20' and '2021-08-10'";
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));   
        $row= mysqli_fetch_assoc($result);   
        echo '<p> Number or hours travelled by airLine: ';
        echo $row['Total Travel Hours'];
        echo " hrs</p>";
    ?>
<?php 
        $sql = "SELECT SUM(travelHours) as 'Aircraft Travel Hours' FROM Aircraft where aircraftName = 'Airbus A380-800' AND createdAt between '2021-05-21' and '2021-05-25' ";
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));   
        $row= mysqli_fetch_assoc($result);   
        echo '<p> Number or hours travelled by aircraft: ';
        echo $row['Aircraft Travel Hours'];
        echo " hrs</p>";
    ?>
<?php  
        $sql = "SELECT count(aircraftName) as 'No of Aircraft' FROM Aircraft where AirlineId = (SELECT id from Airline where airlineName = 'Emirates' )";
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));   
        $row= mysqli_fetch_assoc($result);   
        echo '<p> Number or airlines: ';
        echo $row['No of Aircraft'];
        echo "</p>";
    ?> 
    
    <?php  
        $sql = "SELECT count(aircraftName) as 'No of Aircraft' FROM Aircraft where AirlineId = (SELECT id from Airline where airlineName = 'Emirates' )";
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));   
        $row= mysqli_fetch_assoc($result);   
        echo '<p> Arjun will give query';
        echo $row['No of Aircraft'];
        echo "</p>";
    ?> 

    <?php  
        $sql = "SELECT  User.firstName as 'fname', User.lastName as 'lname', User.phoneNumber as 'num',  Booking.to_ as 'dest' FROM  Booking inner join  User on  Booking.UserId =  User.id where  Booking.to_ = 'London' and  Booking.departureDateTime between '2021-02-20' and '2021-07-20'";
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));   
        echo '<p> List of passengers: ';
        while( $row = mysqli_fetch_array($result)){
            echo  "<p>".$row['fname']." ". $row['lname']." ". $row['num']." ". $row['dest']. "</p>" ;
        }
        echo "</p> <br/>";
    ?> 

<?php  
        $sql = "SELECT  Aircraft.aircraftName as 'Name',  Aircraft.from_ as 'Source Location',  Aircraft.AirlineId as 'AirId', Aircraft.seatingCapacity as 'Cap' FROM  Aircraft where  Aircraft.from_ <> 'Dubai'";
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));   
        $row= mysqli_fetch_assoc($result);   
        echo '<p> List of aircrafts';
        while( $row = mysqli_fetch_array($result)){
            echo  "<p>".$row['Name']." ". $row['Source Location']." ". $row['AirId']." ". $row['Cap']. "</p>" ;
        }
        echo "</p>";
    ?> 

    </div>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
    
</html>