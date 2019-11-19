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
        $filename = "New_Page";
        $file = fopen("pages/".$filename.".php", "w") or die("Unable to open file!");

        include 'includes/dbconfig.php';

        $txt = "<?php include '../includes/page_content.php';
                      include '../includes/footer.php'; ?>";
    
        
        fwrite($file, $txt);
        

        //INSERT INTO `pages` (`PARENT_ID`, `Header`, `Content`, `File_Name`) VALUES (NULL, "New Page", "Dummy Text", "New_Page.php");

        $query = 'insert into `pages` (`PARENT_ID`, `Header`, `Content`, `File_Name`) VALUES (';
        if(isset($_GET['subpage'])){
            $query .= '"1",';//.$_GET['id'].'",';
        }
        else{
            $query .= 'NULL,';
        }
        
        $newFileName = "New Page";
        $query .= '"'.$newFileName.'",';
        $query .= '"Here is where your text goes!",';
        $query .= '"'.$filename.'.php")';

        $mysqli->query($query);

        fclose($file);
        header("Location: pages/".$filename.".php");
    ?>