<?php

require_once dirname(__FILE__, 1) . DIRECTORY_SEPARATOR . 'bre' . DIRECTORY_SEPARATOR . 'config.php';

if (empty($_SESSION['username'])) {
    if (!empty($_COOKIE['username'])) {
        list($userName, $time, $signature) = explode(':', $_COOKIE['username']);
        if (generateSignature($userName, $time) == $signature) {
            $_SESSION['username'] = $userName;
        } else {
            header("Location: /homework15/view/login.php");
            die();
        }
    } else {
        header("Location: /homework15/view/login.php");
        die();
    }
}
header("Location: /homework15/view/home.php");
