<?php


class Cart
{
    private $id;
    private $user_id;

    public function __construct(int $id, int $user_id)
    {

        if (!empty($id)) {
            $this->id = $id;
        }

        $this->user_id = $user_id;
    }

    static public function create(object $connection, int $user_id): Cart
    {
        $stmt = $connection->prepare("
            INSERT INTO `cart` (
                `user_id`
            )
            VALUES
                (
                    :user_id
                )
            ");

        $stmt->execute(
            [
                'user_id' => $user_id
            ]
        );

        $id = $connection->lastInsertId();
        return new Cart($id, $user_id);
    }

    public function getId(): int
    {
        return $this->id;
    }

    static public function clear(object $connection, int $cartId): int
    {
        $stmt = $connection->prepare("
            DELETE FROM
                `cart_products`
            WHERE
                cart_id = :cart_id
        ");

        return $stmt->execute(
            [
                'cart_id' => $cartId
            ]
        );
    }

    public function getProducts(object $connection, int $cartId): array
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
}