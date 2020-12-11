<?php

declare(strict_types=1);
require_once dirname(__FILE__, 1) . DIRECTORY_SEPARATOR . 'config.php';
require_once CLASSES_PATH . 'User.php';
require_once CLASSES_PATH . 'Worker.php';


/*Создайте объект этого класса "Иван", возраст 25, зарплата 1000. Создайте второй объект этого класса "Вася",
возраст 26, зарплата 2000. Найдите сумму зарплат Ивана и Васи.*/
$ivan = new Worker();
$ivan->setAge(25);
$ivan->setSalary(1000);

$vasya = new Worker();
$vasya->setAge(26);
$vasya->setSalary(2000);

$salary = $ivan->getSalary() + $vasya->getSalary();
var_dump($salary);