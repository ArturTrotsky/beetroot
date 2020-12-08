<?php
define('ROOT_PATH', dirname(__FILE__, 1));
define('FUNCTIONS_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR);
define('DB_NAME', 'shop_restored');
define('DB_USER', 'root');
define('DB_PASSWORD', 'formulaone110615');

$dsn = "mysql:host=localhost;port=3306;dbname=" . DB_NAME . ";charset=utf8";
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

session_start();