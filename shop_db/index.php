<?php
declare(strict_types=1);
require_once dirname(__FILE__, 1) . DIRECTORY_SEPARATOR . 'config.php';
require_once FUNCTIONS_PATH . 'db.php';

$_SESSION['user_id'] = 1;

/*$products = [
    ['name' => 'Apple iPhone 11 Pro Max', 'price' => 47999, 'quantity' => 15, 'category' =>'Apple'],
    ['name' => 'Apple Watch Series 6 GPS', 'price' => 15799, 'quantity' => 21, 'category' =>'Apple'],
    ['name' => 'Samsung Galaxy S20', 'price' => 32999, 'quantity' => 17, 'category' =>'Samsung'],
    ['name' => 'Samsung Galaxy Watch 3', 'price' => 10999, 'quantity' => 19, 'category' =>'Samsung'],
    ['name' => 'Xiaomi Mi 10T Pro', 'price' => 15999, 'quantity' => 23, 'category' =>'Xiaomi'],
    ['name' => 'Xiaomi Mi Smart Band 4 NFC', 'price' => 1299, 'quantity' => 14, 'category' =>'Xiaomi']
];
file_put_contents(ROOT_PATH . DIRECTORY_SEPARATOR.'products.json', json_encode($products));
die();*/

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

    header('location: /shop_db/cart.php');
    die();
}

require_once ROOT_PATH . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'products.php';