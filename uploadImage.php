<?php
    if(isset($_POST['fileUpload']))
        {
            $imagedir = "images/";
            if(file_exists($imagedir.$_FILES["fileUpload"]["name"])) {
                //display image
            }
            else {

                $imagepath = $imagedir.basename($_FILES["fileUpload"]["name"]);
                
                $newPath = str_replace(' ', '+', $imagepath);
                
                $imagetype = strtolower(pathinfo($newPath, PATHINFO_EXTENSION));
                
                move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $newPath);
            }
        }
?>