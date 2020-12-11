<?php
declare(strict_types=1);
require_once dirname(__FILE__, 1) . DIRECTORY_SEPARATOR . 'config.php';
require_once CLASSES_PATH . 'Product.php';
require_once CLASSES_PATH . 'Cart.php';

// $product = Product::create($pdo, 'productName', 12345, 67890, 1 ); // Добавление продукта в базу данных

$_SESSION['user_id'] = 1;

$products =  Product::getAll($pdo);

if (!empty($_POST['products'])) {
    if (!empty($_SESSION['cart_id'])) {
        Cart::clear($pdo, $_SESSION['cart_id']);
    } else {
        $cart = Cart::create($pdo, $_SESSION['user_id']);
        $_SESSION['cart_id'] = $cart->getId();
    }
    foreach ($_POST['products'] as $product) {
        Product::addToCart($pdo, $_SESSION['cart_id'], (int)$product);
    }

    header('location: /homework22/cart.php');
    die();
}

require_once ROOT_PATH . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'products.php';