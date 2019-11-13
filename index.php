<?php 
    session_start();
    $_SESSION['currentPage'] = $_SERVER['REQUEST_URI'];
?>
<?php include 'header.php'; ?>
<h1>Home</h1>
<?php
    if(isset($_SESSION['user'])){
        echo 'Hello '.$_SESSION['user'];
        echo '<a href="/Content/logout">logout</a>';
    }
    else{
        echo '<a href="/Content/login">login</a>';
    }

    if(isset($_POST)) {
        EditContent();
    }

    function EditContent() {

    }
?>

<a href="/Content/about">About</a>
<br />
<div class="content_container">
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
</div>

<form action="uploadImage" method="post" enctype="multipart/form-data">
    <input type="file" name="fileUpload" class="fileinput" id="file">
    <input type="submit" value="Upload!">
</form>

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