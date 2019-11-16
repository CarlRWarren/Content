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

    $query = "Select * from pages Where PAGE_ID = 2";

    $result = $mysqli->query($query);
    $num_results = $result->num_rows;
    
    if($num_results > 0){
        $row = $result->fetch_assoc();
        extract($row);
        
        echo "<h1 class=Header id=Header contenteditable=true>".$Header."</h1>";
        echo $Content;
    }
    ?>
    <form id="form" action="" method="post">
        <input id="HeaderInput" type="hidden" name="header">
        <input id="ContentInput" type="hidden" name="content">
        <input type="hidden" name="id" value="<?php echo $PAGE_ID; ?>">
    </form>
    <button onclick="Save()">Save Changes</button>

    <script>
        function Save() {
            var hinput = document.getElementById("HeaderInput");
            var cinput = document.getElementById("ContentInput")
            var header = document.getElementById("Header");
            var content = document.getElementById("content")

            hinput.setAttribute("value", header.innerHTML);
            cinput.setAttribute("value", content.innerHTML);

            var xhr;
            if(window.XMLHttpRequest){
                xhr = new XMLHttpRequest();
            }

            var data = "Header=" + header.innerHTML + "&Content=" + content.innerHTML;
            xhr.open("POST", "update_page.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send(data);
        }
    </script>
<?php include 'footer.php'; ?>