<?php
require_once dirname(__FILE__, 1) . DIRECTORY_SEPARATOR . 'bre' . DIRECTORY_SEPARATOR . 'config.php';

foreach ($_COOKIE as $key => $value) setcookie($key, '', time() - 3600, '/');

session_unset();
session_destroy();
header("Location: /homework15/view/login.php");
