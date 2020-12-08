<?php

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'bre' . DIRECTORY_SEPARATOR . 'config.php';

if ($_SESSION['username']) {
    echo 'Hello, ' . $_SESSION['username'] . "<br>";
    echo "<a href=\"/homework15/logout.php\">Logout</a></h4>";
} else header("Location: /homework15/view/#login.php");