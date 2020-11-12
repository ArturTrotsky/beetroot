<html>
<body>
<?php if (!empty($_GET['error'])) {
    if ($_GET['error'] == 2) {
        echo "<h3>Login " . $_GET['login'] . " is already in use</h3>";
    }
}
?>

<form action="/homework15/register.php" method="post">
    <p>
        <label>Login</label>
        <input type="text" name="login" value="">
    </p>
    <p>
        <label>Password</label>
        <input type="password" name="password" value="">
    </p>
    <input type="submit" value="Register">
</form>
</body>
</html>
















