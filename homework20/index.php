<?php

require_once 'config.php';
require_once FUNCTIONS_PATH . 'db.php';
require_once FUNCTIONS_PATH . 'system.php';


if (!empty($_POST['email']) && !empty($_POST['password'])) {

    $user = getUser($pdo, $_POST['email'], $_POST['password']);

    if ($user) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];
        if (!empty($_POST['remember'])) {
            $time = time();
            $cookie = $user['name'] . ':' . $time . ':' . generateSignature($user['name'], $time);
            setcookie('name', $cookie, time() + (10 * 365 * 24 * 60 * 60));
        }
        header("Location: /homework20/templates/home.php");
        die();
    } else {
        header("Location: /homework20/templates/login.php?error=1");
        die();
    }
}

header('location: /homework20/templates/login.php');