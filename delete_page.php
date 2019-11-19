<?php
    include 'includes/dbconfig.php';

    $query = "delete from pages where PARENT_ID = ".$_POST['pageID'];
    $mysqli->query($query);

    $query = "delete from pages where PAGE_ID = ".$_POST['pageID'];
    $mysqli->query($query);


    header("Location: pages/index.php");
?>