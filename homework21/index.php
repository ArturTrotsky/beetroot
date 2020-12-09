<?php
declare(strict_types=1);
require_once dirname(__FILE__, 1) . DIRECTORY_SEPARATOR . 'config.php';
require_once FUNCTIONS_PATH . 'db.php';

$_SESSION['user_id'] = 1;

$products = getAllProducts($pdo, 1, 100);

if (!empty($_POST['products'])) {
    if (!empty($_SESSION['cart_id'])) {

        clearCart($pdo, $_SESSION['cart_id']);

    } else {
        $_SESSION['cart_id'] = createCart($pdo, $_SESSION['user_id']);
    }
    foreach ($_POST['products'] as $product) {
        addProductToCart($pdo, $_SESSION['cart_id'], (int)$product);
    }

    header('location: /homework21/cart.php');
    die();
}

require_once ROOT_PATH . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'products.php';