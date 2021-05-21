<?php
    require_once 'db.php';

    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $phno = $_REQUEST['phno'];
    $email = $_REQUEST['email'];

    $sql = "INSERT INTO user (firstname, lastname, phoneno, email) VALUES ( '".$fname."', '".$lname."', '".$phno."', '".$email."')";

    if(mysqli_query($link, $sql)) {
        print("stored");
    } else {
        print("failed");
    }
?>