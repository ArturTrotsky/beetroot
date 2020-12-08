<?php

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'config.php';

if (empty($_SESSION['username'])) {
    if (!empty($_COOKIE['username'])) {
        list($userName, $time, $signature) = explode(':', $_COOKIE['username']);
        if (generateSignature($userName, $time) == $signature) {
            $_SESSION['username'] = $userName;
        } else {
            header("Location: /lesson15/login.php");
            die();
        }
    } else {
        header("Location: /lesson15/login.php");
        die();
    }
}
echo 'Hello, ' . $_SESSION['username'];