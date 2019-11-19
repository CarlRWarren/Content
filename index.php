<!-- Start Session -->
    <?php 
        session_start();
        $_SESSION['currentPage'] = $_SERVER['REQUEST_URI'];

        include 'header.php'; 
    ?>
<!-- Log In Check -->
    <?php
        if(isset($_SESSION['user'])){
            echo 'Hello '.$_SESSION['user'];
            echo '<a href="/Content/logout">logout</a>';
        }
        else{
            echo '<a href="/Content/login">login</a>';
        }
    ?>
<!-- Page Content -->
    <?php
    include 'header.php';
    include 'dbconfig.php';

    $query = "Select * from pages Where PAGE_ID = 1";

    $result = $mysqli->query($query);
    if($result != null) {
        $row = $result->fetch_assoc();
        extract($row);
        
        echo "<h1 class=Header id=Header contenteditable=true>".$Header."</h1>";
        echo "<div id='Content' class='content_container'>".$Content."</div>";
    }
    ?>
    <button onclick="Save(<?php echo $PAGE_ID?>)">Save Changes</button>

    <script src="save_changes.js"></script>
    <script src="file_upload.js"></script>
<?php include 'footer.php'; ?>