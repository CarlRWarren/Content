<!-- dbconfig.php -->
<!-- Query database for main pages (where parent_id = null) -->
<!-- Query database for sub pages (where parent_id = ID) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="navbar">
    <div class="subnav">
        <button class="subnavbtn"><a href="/Content/index">Home</a><i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
            <?php 
                session_start();
                
                if (isset($_SESSION['user'])) 
                {
                    echo '<a href="/Content/add_page">Add sub-category</a>';
                }
            ?>            
        </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn"><a href="/Content/about">About</a><i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
            <a href="/Content/about_mission">Mission</a>
            <a href="/Content/about_history">History</a>
            <?php 
                $_SESSION['currentPage'] = $_SERVER['REQUEST_URI'];
                if (isset($_SESSION['user'])) 
                {
                    echo '<a href="/Content/add_page">Add sub-category</a>';
                }
            ?> 
        </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn"><a href="/Content/contact">Contact</a><i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
            <a href="/Content/contact_email">Email</a>
            <a href="/Content/contact_locations">Locations</a>
            <?php 
                $_SESSION['currentPage'] = $_SERVER['REQUEST_URI'];
                if (isset($_SESSION['user'])) 
                {
                    echo '<a href="/Content/add_page">Add sub-category</a>';
                }
            ?> 
        </div>
    </div>
    <div class="subnav">
        <?php 
            $_SESSION['currentPage'] = $_SERVER['REQUEST_URI'];
            if (isset($_SESSION['user'])) 
            {
                echo '<a href="/Content/add_page">Add Category</a>';
            }
        ?> 
    </div>
</div>
