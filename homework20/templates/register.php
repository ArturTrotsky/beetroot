<html>
<body>
<?php if (!empty($_GET['error'])) {
    if ($_GET['error'] == 2) {
        echo "<h3>Email " . $_GET['email'] . " is already in use</h3>";
    }
}
?>

<form action="/homework20/register.php" method="post">
    <p>
        <label>Name</label>
        <input type="text" name="name" value="">
    </p>
    <p>
        <label>Email</label>
        <input type="text" name="email" value="">
    </p>
    <p>
        <label>Password</label>
        <input type="password" name="password" value="">
    </p>
    <input type="submit" value="Register">
</form>

<form action="/homework20/templates/login.php">
    <input type="submit" value="Back to Sign In">
</form>

</body>
</html>
