<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include 'dbconfig.php';
        $query = "update pages set ";
        if(isset($_POST['Header'])){
            $query .= "Header='".$mysqli->real_escape_string($_POST['Header'])."'";
        }
        // if(isset($_POST['content'])){
        //     $query .= "Content='".$mysqli->real_escape_string($_POST['content'])."',";
        // }
        // if(isset($_POST['image'])){
        //     $query .= "ImageName='".$mysqli->real_escape_string($_POST['image'])."'";
        // }
        
        $query .= " Where PAGE_ID=2"; //$mysqli->real_escape_string($_REQUEST['2'])
        
        if(! $mysqli->query($query) ) {
            echo "Database Error: Unable to update record.";
        }else{
            exit();
        }
        $mysqli->close();
    }
    ?>