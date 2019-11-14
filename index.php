<?php 
        session_start();
        $_SESSION['currentPage'] = $_SERVER['REQUEST_URI'];

        include 'header.php'; 
    ?>
    <h1>Home</h1>
<?php
    //LOGGED IN?
        if(isset($_SESSION['user'])){
            echo 'Hello '.$_SESSION['user'];
            echo '<a href="/Content/logout">logout</a>';
        }
        else{
            echo '<a href="/Content/login">login</a>';
        }


    //CREATE PAGE
        if(array_key_exists('CreatePage', $_POST)){
            $fileName = "New Page";
            $file = fopen($fileName.".php", "w") or die("Unable to open file!");
            // Remember to add all necessary elements for a default page(i.e: Navbar / styling)
            $txt = "<?php include 'header.php'; ?> 
                    <h1>".$fileName."</h1>
                    <div class='content'></div>
                    <?php include 'footer.php' ?>";
            fwrite($file, $txt);
            fclose($file);
        
            header("Location: ".$fileName.".php");
        }
    ?>
<a href="/Content/about">About</a> <br />
<div class="content_container">
    <!-- Test code snippets for in-browser editing -->

        <!-- <div class="tooltip_test">Hey there
            <span class="tooltip">Testing</span>
        </div> -->

        <!-- testing to edit content -->
        <div contenteditable="true" class="edit_test" id="edit">
            This is some text.
        </div>
        <!-- <button onclick="EditText()">Edit</button> -->
        <!-- <form action="" method="post">
            <input type="submit" value="Edit">
        </form> -->
    
    <!-- Create Page Form -->
        <form method="post">
            <input type="submit" value="Create Page" name="CreatePage">
        </form>
    </div>

<!-- Form for image upload -->
<form id="imageform" action="uploadImage" method="post" enctype="multipart/form-data">
    <input type="file" name="fileUpload" class="fileinput" id="file" accept=".png,.jpg,.jpeg">
    <!-- <input type="submit" value="Upload!"> -->
</form>

<!-- Script testing file upload automatically on selection -->
    <script>
        var image = document.getElementById("file");
        var form = document.getElementById("imageform");
        image.addEventListener("change", function(e) {
            if(image.value !== ""){
                //alert("Selected");
                form.submit();
                //async file upload
            }
        });
    </script>

<!-- Potential script for editing text in-browser -->
    <!-- <script>
        function EditText() {
            var edit = document.getElementById("edit");
            var textbox = document.createElement('input');
            textbox.setAttribute("type", "text");
            textbox.value = edit.innerHTML;
            edit.parentNode.replaceChild(textbox, edit);
            console.log(textbox);
        }
    </script> -->

<?php include 'footer.php'; ?>