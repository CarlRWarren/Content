<?php
    $imagedir = "images/";
    $imagepath = $imagedir.basename($_FILES["fileUpload"]["name"]);
    $newPath = str_replace(' ', '+', $imagepath);

    $imagetype = strtolower(pathinfo($newPath, PATHINFO_EXTENSION));
    
    if(file_exists($newPath)) {
        echo "<img src=".$newPath.">";
    }
    else{
        move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $newPath);
        echo "<img src=".$newPath.">";
    }
?>