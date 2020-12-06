<?php
var_dump($_POST);

require_once 'config.php';

$login = $_POST['login'];
$password = $_POST['password'];

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

var_dump($login, $password); die();

$stmt = $pdo->query("
    SELECT
        `login`, `password`
    FROM
        `users`
    WHERE
        `login` = $login
    AND 
        `password` = $password
    ");

$result = $stmt->fetch();
var_dump($result);