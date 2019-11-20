<!-- dbconfig.php -->
<!-- Query database for main pages (where parent_id = null) -->
<!-- Query database for sub pages (where parent_id = ID) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<div class="navbar">

<?php
include '../includes/dbconfig.php';
    $query = "select * from pages where PARENT_ID IS NULL";
    $result = $mysqli->query($query);
    $num_results = $result->num_rows;

    if($num_results > 0) {
        while( $row = $result->fetch_assoc() ) {
            extract($row);
            echo "<div class='subnav'>";
                echo "<button class='subnavbtn'><a href=../pages/".$File_Name.">".$Header."</a><i class='fa fa-caret-down'></i></button>";
                echo "<div class='subnav-content'>";
                    $subquery = "select * from pages where PARENT_ID = ".$PAGE_ID;
                    $subresult = $mysqli->query($subquery);
                    $sub_results = $result->num_rows;

                    if($sub_results > 0){
                        while ($subrow = $subresult->fetch_assoc()) {
                            extract($subrow);
                            echo "<a href='../pages/".$File_Name."'>".$Header."</a>";
                        }
                    }
                    if(isset($_SESSION['admin'])) {
                        if($_SESSION['admin'] == true){
                            echo "<a class='add-sub-btn' href='../add_page.php?subpage=true&id=".$PAGE_ID."'><i class='fas fa-plus-circle fa-lg'></i></a>";
                        }
                    }
                echo "</div>";
            echo "</div>";
        }
        echo "<div class='subnav no-color'>";
            echo "<button class='subnavbtn no-color-either'>";
                if (isset($_SESSION['admin'])){
                    if($_SESSION['admin'] == true){
                        echo '<a class="no-color" href="../add_page.php"><i class="fas fa-plus-circle fa-lg"></i></a>';
                    }
                }
            echo "</button>";
        echo "</div>";
        
        
        echo "<div id='menu-btn' class='dropdown no-color'>";
            echo "<button class='dropbtn no-color-either'>";
                if (isset($_SESSION['admin'])){
                    if($_SESSION['admin'] == true){
                        echo '<a class="no-color" href="#"><i class="fas fa-bars fa-lg"></i></a>';
                    }
                }
            echo "</button>";
            echo "<div class='dropdown-content'>";
                echo "<form action='' method='post'><input type='hidden' name='style' value='1'></input><input type='submit' value='Theme 1'></input></form>";
                echo "<form action='' method='post'><input type='hidden' name='style' value='2'></input><input type='submit' value='Theme 2'></input></form>";
                echo "<form action='' method='post'><input type='hidden' name='style' value='3'></input><input type='submit' value='Theme 3'></input></form>";
            echo "</div>";
        echo "</div>";
    }

    
?>

</div>




