<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="main-container">
        
        <form action="user_db.php" method="post" class="d-flex flex-column bd-highlight mb-3 w-25">
            <label for="fname"><b>First Name</b></label>
            <input type="text" placeholder="First Name" name="fname" id="fname" required class="mb-2">

            <label for="lname"><b>Last Name</b></label>
            <input type="text" placeholder="Last Name" name="lname" id="lname" required class="mb-2">

            <label for="phno"><b>Phone Number</b></label>
            <input type="number" placeholder="Phone Number" name="phno" id="phno" required class="mb-2">

            
            <button type="button" class="btn btn-primary">Sign In</button>
        </form>

        <form action="user_db.php" method="post">

            <label for="sdate"><b>Find total hours travelled between</b></label>
            <input type="date" placeholder="Start Date" name="sdate" id="sdate" required>

            <label for="edate"><b>and</b></label>
            <input type="date" placeholder="End Date" name="edate" id="edate" required>

            <button type="button" class="btn btn-primary">Submit</button>
        </form>
        <p>Total hours traveled: </p>
        <form action="user_db.php" method="post">
        <form action="user_db.php" method="post">


<button type="button" class="btn btn-primary">Get travel history</button>
</form>

<form action="user_db.php" method="post">

        <label for="origin"><b>Origin</b></label>
                <input type="text" placeholder="Origin" name="origin" id="origin" required>

                <label for="dest"><b>Destination</b></label>
                <input type="text" placeholder="Destination" name="dest" id="dest" required>
            <button type="button" class="btn btn-primary">Submit</button>
            </form>
    </div>
   
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
    <?php
        require_once 'db.php';
    ?>
</html>