<?php
    include '../includes/header.php';
    include '../includes/menu.php';

    include '../includes/dbconfig.php';
    $query = "Select * from pages Where File_Name = '".basename($_SERVER['PHP_SELF'])."'";

    $result = $mysqli->query($query);
    if($result != null) {
        $row = $result->fetch_assoc();
        extract($row);
        if(isset($_SESSION['admin'])){
            if($_SESSION['admin'] == true){
                echo "<h1 class=Header id=Header contenteditable=true>".$Header."</h1>";
                
                echo "<div id='image-area' class='box flex-col'>";
                    if($Image_Name != NULL && $Image_Name != ""){
                        echo "<img id='image_ref' src=".$Image_Name." class='box flex-row'>";
                    }
                    echo "Image Link: <input id='image' name='image_input' type='text' class='box flex-row'>";
                echo "</div>";
                echo "<div id='Content' class='content_container' contenteditable='true'>".$Content."</div>";
                if($PAGE_ID != 1){
                    echo "<form action='../delete_page.php' method='post'><input type='hidden' name='pageID' value='".$PAGE_ID."'><input id='deleteBtn' type='submit' value='Delete'></form>";
                }
            }
        }
        else{
            echo "<h1 class=Header id=Header>".$Header."</h1>";
            if($Image_Name != NULL && $Image_Name != ""){
                echo "<img id='image_ref' src=".$Image_Name.">";
            }
            echo "<div id='Content' class='content_container'>".$Content."</div>";
        }
    }
    ?>
<button id="saveBtn" onclick="Save(<?php echo $PAGE_ID?>)">Save</button>

<script src="../scripts/save_changes.js"></script>
<script src="../scripts/file_upload.js"></script>