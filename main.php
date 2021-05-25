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
        header("Location: http://localhost/Airline-Ticket-Reservation-System/client.php?user=". urlencode($email));
    }

?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="main-container ">
        <div class="heading">
            <h3>Airline Booking System</h3>
            <div class="buttons">
                <button type="submit" class="btn btn-warning">
                    <a href="data.php">Add new Data</a>
                </button>
                <button type="submit" class="btn btn-warning">
                <?php
                    echo '<a href="airline.php?user=",urlencode($email),">Airline Details</a>';
                ?>
                </button>
                <button type="submit" class="btn btn-warning">
                <a href="main.php">User Details</a>
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


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
