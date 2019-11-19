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
        $file = fopen($filename.".php", "w") or die("Unable to open file!");

    // add database call
    
    $txt = "<?php include 'header.php'; include 'menu_dynamic.php';?>
            
    <?php include 'footer.php' ?>";
    
        
        fwrite($file, $txt);
        fclose($file);

        header("Location: ".$filename.".php");

            /*
        if(array_key_exists('CreatePage', $_POST)) {
            $fileName = "New Page";
            $file = fopen($fileName.".php", "w") or die("Unable to open file!");
            // Remember to add all necessary elements for a default page(i.e: Navbar / styling)
            $txt = 
            fwrite($file, $txt);
            fclose($file);
        
            header("Location: ".$fileName.".php");
        }
        */
    ?>