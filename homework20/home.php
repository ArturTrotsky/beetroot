<?php

require_once 'config.php';
require_once FUNCTIONS_PATH . 'system.php';

if (empty($_SESSION['username'])) {
    if (!empty($_COOKIE['username'])) {
        list($userName, $time, $signature) = explode(':', $_COOKIE['username']);
        if (generateSignature($userName, $time) == $signature) {
            $_SESSION['username'] = $userName;
        } else {
            header("Location: /homework20/templates/login.php");
            die();
        }
    } else {
        header("Location: /homework20/templates/login.php");
        die();
    }
}
header("Location: /homework20/templates/home.php");
