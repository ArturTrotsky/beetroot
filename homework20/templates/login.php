<html>
<body>

<?php if (!empty($_GET['error'])): ?>
    <h3>Login or Password is invalid!</h3>
<?php endif; ?>

<form action="/homework20/index.php" method="post">
    <p>
        <label>Email</label>
        <input type="text" name="email" value="">
    </p>
    <p>
        <label>Password</label>
        <input type="password" name="password" value="">
    </p>
    <div>
        <input type="checkbox" name="remember" id="remember"/>
        <label for="remember-me">Remember me</label>
    </div>
    <input type="submit" value="Sing In">
</form>
<h4>or <a href="/homework20/templates/register.php">register</a></h4>

</body>
</html>