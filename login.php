<?php include "header.php"; ?>
<h1>Login</h1>

<form action="/Content/login.php">
    Username:
    <input id="username" type="text" name="user">
    Password:
    <input id="password" type="password" name="pass">
    <input type="submit" value="Submit">
</form>
<?php include "footer.php"; ?>