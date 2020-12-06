<?php
declare(strict_types=1);
require_once 'config.php';
require_once CLASSES_PATH . 'User.php';

$user1 = new User('11', '11', '1emawil@email1');
$userId1 = $user1->register($pdo);


//$isChanged = $user1->changePassword('12345678', '1111');
//echo($isChanged ? 'password change to ' . $user1->getPassword() : 'password was incorrect');

echo($user1->login('user@user', '12345678') ? 'you are logged' : 'email or password incorrect');


