<?php
declare(strict_types=1);
require_once dirname(__FILE__, 1) . DIRECTORY_SEPARATOR . 'config.php';

$products = json_decode(file_get_contents(ROOT_PATH . DIRECTORY_SEPARATOR . 'products.json'), true);

if (!empty($_POST['products'])) {
    $_SESSION['products'] = $_POST['products'];
    header('location: /shop/cart.php');
    die();
}

require_once ROOT_PATH . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'products.php';