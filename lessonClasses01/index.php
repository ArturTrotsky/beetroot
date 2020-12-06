<?php
declare(strict_types=1);
require_once 'config.php';
require_once CLASSES_PATH . 'User.php';

$user1 = new User('11', '11', 'email@email');

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


