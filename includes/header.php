<?php 
  session_start();
  $_SESSION['currentPage'] = $_SERVER['REQUEST_URI']; 
  if(!isset($_SESSION['theme'])){
    $_SESSION['theme'] = "1";
  }

  if(isset($_POST['style'])) {
    $_SESSION['theme'] = $_POST['style']; 
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Content Website</title>
  <script src="https://kit.fontawesome.com/a935b82506.js" crossorigin="anonymous"></script>
  <link href='../styles/style.css', rel='stylesheet'>
  <?php
    echo "<link href='../styles/style".$_SESSION['theme'].".css', rel='stylesheet'>";
  ?>
</head>
<body>
    