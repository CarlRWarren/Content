<?php
    include 'includes/dbconfig.php';

    $query = "select * from pages where PARENT_ID = ".$_POST['pageID'];
    $result = $mysqli->query($query);
    $num_results = $result->num_rows;
    if($num_results > 0){
        while($row = $result->fetch_assoc()){
            extract($row);
            unlink("pages/".$File_Name);
        }
    }
    
    $query = "delete from pages where PARENT_ID = ".$_POST['pageID'];
    $mysqli->query($query);
    
    $query = "select * from pages where PAGE_ID = ".$_POST['pageID'];
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();
    extract($row);
    unlink("pages/".$File_Name);

    $query = "delete from pages where PAGE_ID = ".$_POST['pageID'];
    $mysqli->query($query);

    header("Location: pages/index.php");
?>