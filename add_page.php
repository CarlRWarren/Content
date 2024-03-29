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
        $count = 0;
        while(file_exists("pages/".$filename.".php")){
            if($count > 0){
                $filename = substr_replace($filename, "", -1);
            }
            else if($count >= 10){
                $filename = substr_replace($filename, "", -2);
            }
            else if($count >= 100){
                $filename = substr_replace($filename, "", -3);
            }
            $count++;
            $filename = $filename.$count;
        }
        $file = fopen("pages/".$filename.".php", "w") or die("Unable to open file!");

        include 'includes/dbconfig.php';

        $txt = "<?php include '../includes/page_content.php';
                      include '../includes/footer.php'; ?>";
    
        
        fwrite($file, $txt);
        

        //INSERT INTO `pages` (`PARENT_ID`, `Header`, `Content`, `File_Name`) VALUES (NULL, "New Page", "Dummy Text", "New_Page.php");

        $query = 'insert into `pages` (`PARENT_ID`, `Header`, `Content`, `File_Name`) VALUES (';
            if(isset($_GET['subpage'])) {
                $query .= '"'.$_GET['id'].'",';
            }
            else{
                $query .= 'NULL,';
            }
            $newFileName = "New Page";
            $query .= '"'.$newFileName.'",';
            $query .= '"This is where your text goes!",';
            $query .= '"'.$filename.'.php")';

        $mysqli->query($query);

        fclose($file);
        header("Location: pages/".$filename.".php");
    ?>