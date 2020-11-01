<?php
$f = fopen(__DIR__ . DIRECTORY_SEPARATOR . "users.txt", "r");
if (!$f) {
    echo 'Error file';
    die();
}
while (!feof($f)) {
    $users[] = explode(" ", str_replace(PHP_EOL, '', fgets($f, 1000)));
}
fclose($f);