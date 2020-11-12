<?php
require_once dirname(__FILE__, 1) . DIRECTORY_SEPARATOR . 'bre' . DIRECTORY_SEPARATOR . 'config.php';

if (!empty($_POST['login']) && !empty($_POST['password'])) {
    if (file_exists('users.json')) {
        $users = file_get_contents('users.json');
        $users = json_decode($users, true);
        foreach ($users as $user) {
            if ($user['login'] == $_POST['login']) {              // если логин занят
                header("Location: /homework15/view/register.php?error=2&login=" . $_POST["login"]);
                die();
            }
        }
        $users[] = ['login' => $_POST['login'], 'password' => $_POST['password']];
        file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'users.json', json_encode($users));
        $time = time();
        $cookie = $_POST['login'] . ':' . $time . ':' . generateSignature($_POST['login'], $time);
        setcookie('username', $cookie, time() + (10 * 365 * 24 * 60 * 60));

        header("Location: /homework15/home.php");
        die();
    }
} else
    header("Location: /homework15/view/register.php");