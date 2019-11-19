<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include 'includes/dbconfig.php';
        $query = "update pages ";

        $shouldSet = true;
        
        if(isset($_POST['Header'])){
            if($shouldSet){
                $query .= "SET Header='".$mysqli->real_escape_string($_POST['Header'])."'";
                $shouldSet = false;
            }
            else{
                $query .= ",Header='".$mysqli->real_escape_string($_POST['Header'])."'";
            }
        }
        if(isset($_POST['Content'])){
            if($shouldSet){
                $query .= "SET Content='".$mysqli->real_escape_string($_POST['Content'])."'";
                $shouldSet = false;
            }
            else{
                $query .= ",Content='".$mysqli->real_escape_string($_POST['Content'])."'";
            }
        }
        
        $query .= " WHERE PAGE_ID=".$_POST['PageID'];
        
        if(! $mysqli->query($query) ) {
            echo "Database Error: Unable to update record.";
        }else{
            exit();
        }
        $mysqli->close();
    }
    ?>