<?php
    include '../includes/header.php';
    include '../includes/menu.php';

    include '../includes/dbconfig.php';
    $query = "Select * from pages Where File_Name = '".basename($_SERVER['PHP_SELF'])."'"; //place .php after depending on how stored in database

    $result = $mysqli->query($query);
    if($result != null) {
        $row = $result->fetch_assoc();
        extract($row);
        
        echo "<h1 class=Header id=Header contenteditable=true>".$Header."</h1>";
        echo "<div id='Content' class='content_container'>".$Content."</div>";
    }
    ?>
<button onclick="Save(<?php echo $PAGE_ID?>)">Save Changes</button>

<script src="../scripts/save_changes.js"></script>
<script src="../scripts/file_upload.js"></script>