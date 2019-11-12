<?php 
    session_start();
    $_SESSION['currentPage'] = $_SERVER['REQUEST_URI'];
?>
<?php include 'header.php'; ?>
<h1>Home</h1>
<?php
    if(isset($_SESSION['user'])){
        echo 'hello '.$_SESSION['user'];
        echo '<a href="/Content/logout">logout</a>';
    }
    else{
        echo '<a href="/Content/login">login</a>';
    }
?>

<a href="/Content/about">About</a>

<?php include 'footer.php'; ?>