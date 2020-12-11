<?php
require_once dirname(__FILE__, 1) . DIRECTORY_SEPARATOR . 'config.php';
require_once CLASSES_PATH . 'Cart.php';

$products = Cart::getProducts($pdo, ($_SESSION['cart_id'] ?? 0));

require_once ROOT_PATH . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'cart.php';