<?php
declare(strict_types=1);

/*Создать текстовый файл, содержащий данные зарегистрированного пользователя (имя, логин, пароль, емейл, язык),
далее создать php файл, который будет две функции: одна будет принимать имя файла и возвращать массив с пользователями,
вторая — будет принимать логин, пароль и массив пользователей, и возвращать данные пользователя с указанным логином
и паролем, или сообщение, если пользователь не найден.*/

function getUsersFromFile($filename)
{
    $users = [];
    $f = fopen(__DIR__ . DIRECTORY_SEPARATOR . $filename, "r");
    if (!$f) {
        echo 'Error file';
        die();
    }
    while (!feof($f)) {
        $users[] = explode(" ", str_replace(PHP_EOL, '', fgets($f, 1000)));
    }
    fclose($f);

    return $users;
}

function findUser(string $login, string $password, array $users)
{
    $findUser = null;
    foreach ($users as $user) {
        if ($login == $user[1] && $password == $user[2]) {
            $findUser = $user;
            break;
        }
    }
    return $findUser;
}

$filename = 'users.txt';
$users = getUsersFromFile($filename);
$user = findUser('Login1', 'Password1', $users);
echo ($user) ? 'LOGIN: ' . $user[1] . ', PASSWORD: ' . $user[2] : 'user not found';


