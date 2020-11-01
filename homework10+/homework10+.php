<!--Домашнее задание 10+:
Подбор пароля из 1-4 знаков и символов a-z 0-9 -->

<?php
// echo $crypted = sha1('a');    // 86f7e437faa5a7fce15d1ddcb9eaeaea377667b8
// echo $crypted = sha1('a4');   // 21440dba05ffe31f6c6bf299dd8da0ff0a5fff52
// echo $crypted = sha1('bk8');  // 3c578fe471878e63b1b04fd6948522910b292c1a
// echo $crypted = sha1('b5k8'); // 7342185e9960cc00f1995e9277f970fa9090a7c0

$pass = '3c578fe471878e63b1b04fd6948522910b292c1a';
$symbols = array_merge(range(0, 9), range('a', 'z'));

$plainpass = null;

for ($i = 0; $i < count($symbols); $i++) {
    $plainpass = $symbols[$i];
    if (sha1($plainpass) === $pass || md5($plainpass) === $pass) {
        echo $plainpass;
        break 1;
    }
    for ($j = 0; $j < count($symbols); $j++) {
        $plainpass = $symbols[$i] . $symbols[$j];
        if (sha1($plainpass) === $pass || md5($plainpass) === $pass) {
            echo $plainpass;
            break 2;
        }
        for ($k = 0; $k < count($symbols); $k++) {
            $plainpass = $symbols[$i] . $symbols[$j] . $symbols[$k];
            if (sha1($plainpass) === $pass || md5($plainpass) === $pass) {
                echo $plainpass;
                break 3;
            }
            for ($g = 0; $g < count($symbols); $g++) {
                $plainpass = $symbols[$i] . $symbols[$j] . $symbols[$k] . $symbols[$g];
                if (sha1($plainpass) === $pass || md5($plainpass) === $pass) {
                    echo $plainpass;
                    break 4;
                }
            }
        }
    }
}