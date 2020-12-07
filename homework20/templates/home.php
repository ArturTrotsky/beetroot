<?php

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'config.php';

if ($_SESSION['name']) {
    echo 'Hello, ' . $_SESSION['name'] . "<br>";
    echo "<a href=\"/homework20/logout.php\">Logout</a></h4>";
} else header("Location: /homework20/templates/login.php");