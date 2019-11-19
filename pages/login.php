<?php
    session_start();

    if(!empty($_POST))
    {
        if(isset($_POST["user"]) && isset($_POST["pass"]))
        {
            if($_POST["user"] === "admin" && $_POST['pass'] === "pass")
            {
                $_SESSION['user'] = $_POST["user"];
                header('Location: '.$_SESSION['currentPage']);
            }
            else
            {
                echo "The username or password was incorrect.";
            }
        }
    }
?>

<?php include "../includes/header.php"; ?>
<h1>Login</h1>

<form action='' method="post">
    Username:
    <input id="username" type="text" name="user">
    Password:
    <input id="password" type="password" name="pass">
    <input type="submit" value="Submit">
</form>

<?php include "../includes/footer.php"; ?>