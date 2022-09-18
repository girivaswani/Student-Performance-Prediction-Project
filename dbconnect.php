<?php
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "root";
    $database = "spp";
    // Create a database connection
    $con = mysqli_connect($server, $username, $password, $database);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

?>