<!--Создать текстовый файл в любом редакторе, каждая строка которого содержит логин и пароль пользователя,
отделенных пробелом в виде
login pass
login1 123456
затем создать форму ввода логина и пароля на html, при сабмите формы считывать содержимое файла и
проверять правильно ли пользователь ввел логин и пароль, в случае правильного ввода вывести логин на экран и
так же создать новый файл или перезаписать значение в существующем, используя логин в качестве имени файла,
в этот файл заносить число правильных попыток входа для данного пользователя.-->

<html>
<body>
<form action="" method="post">
    <p>
        <label>Login</label>
        <input type="text" name="login" value="">
    </p>
    <p>
        <label>Password</label>
        <input type="password" name="password" value="">
    </p>
    <input type="submit" value="Sing In">
</form>
</body>
</html>
<?php

$f = fopen(__DIR__ . DIRECTORY_SEPARATOR . "users.txt", "r");

if (!$f) {
    echo 'Error file';
    die();
}

while (!feof($f)) {
    $user = explode(" ", str_replace(PHP_EOL, '', fgets($f, 1000)));
    if (!empty($_POST)) {
        if ($_POST['login'] == $user[0] && $_POST['password'] == $user[1]) {
            $userFilename = __DIR__ . DIRECTORY_SEPARATOR . $user[0];
            if (file_exists($userFilename)) {
                $fOld = fopen($userFilename, 'r+');
                $digit = fgets($fOld, 1000);
                fclose($fOld);
                $fNew = fopen($userFilename, 'w+');
                fwrite($fNew, ++$digit);
            } else {
                $fNew = fopen($userFilename, 'w+');
                fwrite($fNew, '1');
            }
            fclose($fNew);
            echo $user[0];
            break;
        }
    }
}
fclose($f);