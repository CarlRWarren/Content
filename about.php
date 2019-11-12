<?php 
    session_start();

    $_SESSION['currentPage'] = $_SERVER['REQUEST_URI'];

    if (!isset($_SESSION['user'])) 
    {
        header("Location: /Content/login.php");   
    }
?>
<?php include 'header.php'; ?>
<h1>About</h1>
<?php
    echo "Hello ".$_SESSION['user']."!";
?>
<a href="/Content/index">Home</a>
<?php include 'footer.php'; ?>