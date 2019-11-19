<!DOCTYPE html>
<html>
<head>
  <title>Content Website</title>
  <script src="https://kit.fontawesome.com/a935b82506.js" crossorigin="anonymous"></script>
  <link href='../styles/style.css', rel='stylesheet'>
</head>
<body>
    <?php 
      session_start();
      $_SESSION['currentPage'] = $_SERVER['REQUEST_URI']; 
    ?>