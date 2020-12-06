<?php
declare(strict_types=1);
require_once 'config.php';
require_once CLASSES_PATH . 'User.php';
require_once CLASSES_PATH . 'Admin.php';

$user1 = new User('Alex', '12345678', 'alex@ukr.net');

$admin = new Admin('adminName', '12345', 'admin@email');
$admin->register($pdo);

//Блокировка пользователя
$user2 = new User('Alex', '12345678', 'alex@ukr.net', 1);
$admin2 = new Admin('adminName', '12345', 'admin@email', 13);
$admin->block($user2, $pdo);
$admin->block($admin2, $pdo);


/*регистрация пользователя в базе данных
$userId1 = $user1->register($pdo);*/

//использование __call
/*$user1->setEmail('set_email@email');
var_dump($user1->getEmail());*/

//использование __get
//var_dump($user1->password);

//использование __set __get
//$user1->password = '2222';
//var_dump($user1->password);

//использование __set __get
//$user1->cardnumber = '12345678';
//var_dump($user1->cardnumber);


echo '<br><br>';
//$isChanged = $user1->changePassword('12345678', '1111');
//echo($isChanged ? 'password change to ' . $user1->getPassword() : 'password was incorrect');

// echo($user1->login('user@user', '12345678') ? 'you are logged' : 'email or password incorrect');


