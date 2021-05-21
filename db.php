<?php 
    $user = 'root';
    $password = '';
    $db = 'airline_db';
    $host = 'localhost';

    $link = mysqli_init();
    $success = mysqli_real_connect(
        $link, $host, $user, $password, $db
    );
?>