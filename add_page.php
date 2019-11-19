<!-- Start Session -->
    <?php 
        session_start();

        $_SESSION['currentPage'] = $_SERVER['REQUEST_URI'];

        if (!isset($_SESSION['user'])) 
        {
            header("Location: /Content/login.php");   
        }
    ?>
<!-- Create Page -->
    <?php
        $filename = "NewPage";
        $file = fopen("pages/".$filename.".php", "w") or die("Unable to open file!");

        include 'includes/dbconfig.php';

        $txt = "<?php include 'includes/header.php'; 
                      include 'menu_dynamic.php';?>"
                      echo "<h1 class=Header id=Header contenteditable=true>".$filename."</h1>";
                      "<?php include 'includes/footer.php' ?>";
    
        
        fwrite($file, $txt);
        fclose($file);

        $query = "insert into pages set ";
        if($_GET['subpage'] == true){
            $query .= "PARENT_ID=".$_GET['id'].",";
        }
        else{
            $query .= "PARENT_ID=NULL,";
        }
        $query .= "Header=".$filename.",";
        $query .= "File_Name=".$filename.".php";

        header("Location: pages/".$filename.".php");
    ?>