<?php
    $host = "localhost";
    $username = "contentUser";
    $password = "pass";
    $dbname = "website";

    $mysqli = new mysqli($host, $username, $password, $dbname);

    if(mysqli_connect_errno()) {
        echo "Error: Could not connect to database.";
        exit;
    }
?>