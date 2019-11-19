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
    <form id="form" action="" method="post">
        <input id="HeaderInput" type="hidden" name="header">
        <input id="ContentInput" type="hidden" name="content">
        <input type="hidden" name="id" value="<?php echo $PAGE_ID; ?>">
    </form>
    <button onclick="Save()">Save Changes</button>

    <script src="save_changes.js"></script>
    <script src="file_upload.js"></script>
<?php include 'footer.php'; ?>