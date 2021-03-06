<?php

function getCategoryIdByName(object $connection, string $name): string
{
    $stmt = $connection->prepare("
        SELECT
            `id`
        FROM
            `categories`
        WHERE
              `name` = :name
    ");
    $stmt->execute(['name' => $name]);
    return $stmt->fetch();
}

function addProduct(object $connection, string $name, float $price, int $quantity, int $categoryId): int
{
    $stmt = $connection->prepare("
        INSERT INTO `products`(`price`, `quantity`, `category_id`, `name`)
        VALUES(:price, :quantity, :category_id, :name)
    ");

    return $stmt->execute(
        [
            'price' => $price,
            'quantity' => $quantity,
            'category_id' => $categoryId,
            'name' => $name
        ]
    );
}

function getAllProducts(object $connection, int $page, int $perPage = 100): array
{
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $stmt = $connection->query("SELECT * FROM products LIMIT" . $perPage . "OFFSET" . ($page - 1) * $perPage);
    return $stmt->fetchAll();
}

function createCart(object $connection, int $userId): int
{
    $stmt = $connection->prepare("
        INSERT INTO `cart` (
            `user_id`
        )
        VALUES
            (
                :user_id
            )"
    );

    $stmt->execute(
        [
            'user_id' => $userId
        ]
    );

    return $connection->lastInsertId();
}

function addProductToCart(object $connection, int $cartId, int $productId, int $quantity = 1): int
{
    $stmt = $connection->prepare("
        INSERT INTO `cart_products` (
            `cart_id`,
            `product_id`,
            `quantity`,
            `order_date`
        )
        VALUES (
                :cart_id,
                :product_id,
                :quantity,
                DATE(NOW())
        )"
    );

    return $stmt->execute(
        [
            'cart_id' => $cartId,
            'product_id' => $productId,
            'quantity' => $quantity,
        ]
    );
}

function clearCart(object $connection, int $cartId): int
{
    $stmt = $connection->prepare("
        DELETE
        FROM
            `cart_products`
        WHERE
            cart_id = :cart_id"
    );

    return $stmt->execute(
        [
            'cart_id' => $cartId
        ]
    );
}

function getCartProducts(object $connection, int $cartId)
{
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $stmt = $connection->prepare("
        SELECT
            products.*
        FROM
            `products`
        INNER JOIN cart_products ON cart_products.product_id = products.id
        WHERE
            cart_products.cart_id = :cart_id");

    $stmt->execute(
        [
            'cart_id' => $cartId
        ]
    );

    return $stmt->fetchAll();
}

