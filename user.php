<html>
<head></head>
      <body>
          <form action="user_db.php" method="post">
              <div class="container">
                  <h1>Register</h1>
                  <p>Please fill in this form to create an account.</p>
                  <hr>

                  <label for="fname"><b>First Name</b></label>
                  <input type="text" placeholder="First Name" name="fname" id="fname" required>

                  <label for="lname"><b>Last Name</b></label>
                  <input type="text" placeholder="Last Name" name="lname" id="lname" required>

                  <label for="phno"><b>Phone Number</b></label>
                  <input type="number" placeholder="Phone Number" name="phno" id="phno" required>

                  <label for="email"><b>Email</b></label>
                  <input type="text" placeholder="Email" name="email" id="email" required>

                  <button type="submit" class="registerbtn">Register</button>
              </div>

          </form>
      </body>
    <?php
        require_once 'db.php';
    ?>
</html>