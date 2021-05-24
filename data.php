<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
<link rel="shortcut icon" href="#">
</head>
<body>
    
    <div class="d-flex justify-content-between m-3" >
        <div class="w-25">
            <h3> Insert Airline </h3>
            <form action="user_db.php?id=1" method="post" >
                <div class="d-flex flex-column bd-highlight mb-3">
                <label for="airline"><b>Airline Name</b></label>
                <input type="text" placeholder="Airline Name" name="airname" id="airname" required>

                <label for="airid"><b>Airline Id</b></label>
                <input type="text" placeholder="Airline Id" name="airid" id="airid" required>

                <label for="aircat"><b>Airline Category</b></label>
                <input type="text" placeholder="Airline Category" name="aircat" id="aircat" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            
        </div>
        <div class="w-25">
            <h3> Insert Aircraft </h3>
            <form action="user_db.php?id=2" method="post">
            <div class="d-flex flex-column bd-highlight mb-3">
                <label for="aircid"><b>Aircraft ID</b></label>
                <input type="text" placeholder="Aircraft ID" name="aircid" id="aircid" required>

                <label for="aircname"><b>Aircraft Name</b></label>
                <input type="text" placeholder="Aircraft Name" name="aircname" id="aircname" required>

                <label for="airline"><b>Airline</b></label>
                <input type="text" placeholder="Airline" name="airline" id="airline" required>

                <label for="cap"><b>Seating Capacity</b></label>
                <input type="number" placeholder="Seating Capacity" name="cap" id="cap" required>

                <label for="origin"><b>Origin</b></label>
                <input type="text" placeholder="Origin" name="origin" id="origin" required>

                <label for="dest"><b>Destination</b></label>
                <input type="text" placeholder="Destination" name="dest" id="dest" required>

                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
        <div class="w-25">
            <h3> Insert User </h3>
            <form action="user_db.php?id=3" method="post">
            <div class="d-flex flex-column bd-highlight mb-3">
                <label for="fname"><b>First Name</b></label>
                <input type="text" placeholder="First Name" name="fname" id="fname" required>

                <label for="lname"><b>Last Name</b></label>
                <input type="text" placeholder="Last Name" name="lname" id="lname" required>

                <label for="phno"><b>Phone Number</b></label>
                <input type="number" placeholder="Phone Number" name="phno" id="phno" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Email" name="email" id="email" required>
                </div>
                <button type="button" class="btn btn-primary">Register</button>
            </form>
        </div>
        
       
       

    </div>

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>