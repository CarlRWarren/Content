<!DOCTYPE html>
<html>
<head>
  <title>Content Website</title>
  <link href='../styles/style.css', rel='stylesheet'>
</head>
<body>
    <?php 
      session_start();
      $_SESSION['currentPage'] = $_SERVER['REQUEST_URI']; 
    ?>