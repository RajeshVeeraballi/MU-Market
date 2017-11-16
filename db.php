<?php
    session_start();
    $servername = "mysql1003.mochahost.com";
    $username = "w1marcy_MUM_REL";
    $password = "m0nmouth2017$";
    $dbname='w1marcy_MUM';

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
    }
?>
