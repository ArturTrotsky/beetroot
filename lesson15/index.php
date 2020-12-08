<?php
/*$users = [
    ['login' => 'login1', 'password' => 1],
    ['login' => 'login2', 'password' => 2],
    ['login' => 'login3', 'password' => 3],
    ['login' => 'login4', 'password' => 4],
    ['login' => 'login5', 'password' => 5],
    ['login' => 'login6', 'password' => 6]
];

file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'users.json', json_encode($users));

die();*/

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'config.php';

if (!empty($_POST['login']) && !empty($_POST['password'])) {
    $dirName = ROOT_PATH . DIRECTORY_SEPARATOR . 'lesson15' . DIRECTORY_SEPARATOR;
    if (file_exists($dirName . 'users.json')) {
        $users = file_get_contents($dirName . 'users.json');
        $users = json_decode($users, true);
        foreach ($users as $user) {
            if ($user['login'] == $_POST['login'] && $user['password'] == $_POST['password']) {
                $_SESSION['username'] = $user['login'];
                if (!empty($_POST['remember'])) {
                    $time = time();
                    $cookie = $user['login'] . ':' . $time . ':' . generateSignature($user['login'], $time);
                    setcookie('username', $cookie, time() + (10 * 365 * 24 * 60 * 60));
                }
                header("Location: /lesson15/home.php");
                die();
            }
        }
    }
    header("Location: /lesson15/#login.php?error=1");
    die();
}
