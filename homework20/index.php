<?php

require_once 'config.php';
require_once FUNCTIONS_PATH . 'db.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {

    $user = getUser($pdo, $_POST['email'], $_POST['password']);

    if (!$user) {
        header("Location: /homework20/templates/login.php?error=1");
        die();
    }
}

header('location: /homework20/templates/login.php');