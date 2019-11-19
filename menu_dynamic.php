<!-- dbconfig.php -->
<!-- Query database for main pages (where parent_id = null) -->
<!-- Query database for sub pages (where parent_id = ID) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<div class="navbar">

<?php
    session_start();
    
    include 'dbconfig.php';
    
    $query = "select * from pages where PARENT_ID IS NULL";
    $result = $mysqli->query($query);
    $num_results = $result->num_rows;
    
    if($num_results > 0) {
        while( $row = $result->fetch_assoc() ) {
            extract($row);
            echo "<div class='subnav'>";
            echo "<button class='subnavbtn'><a href=/Content/".$File_Name.">".$Header."</a><i class='fa fa-caret-down'></i></button>";
            echo "<div class='subnav-content'>";
            $subquery = "select * from pages where PARENT_ID = ".$PAGE_ID;
            $subresult = $mysqli->query($subquery);
            $sub_results = $result->num_rows;
            if($sub_results > 0){
                while ($subrow = $subresult->fetch_assoc()){
                    extract($subrow);
                    echo "<a href='/Content/".$File_Name.">".$Header."</a>";
                }
                if(isset($_SESSION['user'])){
                    echo '<a href="/Content/add_page">Add sub-category</a>';
                }
            }
            echo "</div>";
            echo "</div>";
        }
    }
    ?>
</div>



