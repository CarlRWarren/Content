<?php
    $imagedir = "images/";
    $imagepath = $imagedir.basename($_FILES["fileUpload"]["name"]);
    $imagetype = strtolower(pathinfo($imagepath, PATHINFO_EXTENSION));

    move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $imagepath);
    echo "<img src=".$imagepath.">";

?>