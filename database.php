<?php
    //CONNECT TO MYSQL DATABASE USING MYSQLI
    $host   = "Localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "rockshop";

    $conn = mysqli_connect($host, $dbUser, $dbPass, $dbName);
    
    if(!$conn){
        echo 'Connection Failed!!'. mysqli_connect_error();
    }
?>