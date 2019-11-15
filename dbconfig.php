<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pages";

    $mysqli = new mysqli($host, $username, $password, $dbname);

    if(mysqli_connect_errno()) {
        echo "Error: Could not connect to database.";
        exit;
    }
?>