<?php

require_once 'config.php';
require_once FUNCTIONS_PATH . 'db.php';
require_once FUNCTIONS_PATH . 'system.php';

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $user = registerUser($pdo, $_POST['name'], $_POST['email'], $_POST['password']);
    if (!$user) {
        header("Location: /homework20/templates/register.php?error=2&email=" . $_POST['email']);
        die();
    } else {
        $time = time();
        $cookie = $_POST['name'] . ':' . $time . ':' . generateSignature($_POST['name'], $time);
        setcookie('username', $cookie, time() + (10 * 365 * 24 * 60 * 60));

        header("Location: /homework20/home.php");
        die();
    }
} else {
    header("Location: /homework20/templates/register.php");
}