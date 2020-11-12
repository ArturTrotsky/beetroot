<?php
/*$users = [
    ['id'=>1, 'login' => 'login1', 'password' => 1, 'email' => login1@test],
    ['id'=>2, 'login' => 'login2', 'password' => 2, 'email' => login2@test],
    ['id'=>3, 'login' => 'login3', 'password' => 3, 'email' => login3@test],
    ['id'=>4, 'login' => 'login4', 'password' => 4, 'email' => login4@test],
    ['id'=>5, 'login' => 'login5', 'password' => 5, 'email' => login5@test],
    ['id'=>6, 'login' => 'login6', 'password' => 6, 'email' => login6@test]
];

file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'users.json', json_encode($users));

die();*/

require_once dirname(__FILE__, 1) . DIRECTORY_SEPARATOR . 'bre' . DIRECTORY_SEPARATOR . 'config.php';

if (!empty($_POST['login']) && !empty($_POST['password'])) {
    if (file_exists('users.json')) {
        $users = file_get_contents('users.json');
        $users = json_decode($users, true);
        foreach ($users as $user) {
            if ($user['login'] == $_POST['login'] && $user['password'] == $_POST['password']) {
                $_SESSION['username'] = $user['login'];
                if (!empty($_POST['remember'])) {
                    $time = time();
                    $cookie = $user['login'] . ':' . $time . ':' . generateSignature($user['login'], $time);
                    setcookie('username', $cookie, time() + (10 * 365 * 24 * 60 * 60));
                }
                header("Location: /homework15/home.php");
                die();
            }
        }
    }
    header("Location: /homework15/view/login.php?error=1");
    die();
} else
    header("Location: /homework15/view/login.php");