<?php


class Product
{
    private $id;
    private $name;
    private $price;
    private $quantity;

    public function __construct(int $id, string $name, int $price, int $quantity, int $category_id)
    {

        if (!empty($id)) {
            $this->id = $id;
        }

        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->category = $category_id;
    }

    public static function create(object $db, string $name, int $price, int $quantity, int $category_id): Product
    {
        $stmt = $db->prepare("
        INSERT INTO `products`(
            `name`,
            `price`,
            `quantity`,
            `category_id`
        )
        VALUES
            (
                :name,
                :price,
                :quantity,
                :category_id
            )
        ");
        $stmt->execute(
            [
                'name' => $name,
                'price' => $price,
                'quantity' => $quantity,
                'category_id' => $category_id
            ]
        );

        $id = $db->lastInsertId();
        return new Product($id, $name, $price, $quantity, $category_id);
    }

    public static function getAll(object $connection): array
    {
        $stmt = $connection->query("SELECT * FROM `products`");
        return $stmt->fetchAll();
    }

    public static function addToCart(object $connection, int $cartId, int $productId, int $quantity = 1): int
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
            )
        ");

        return $stmt->execute(
            [
                'cart_id' => $cartId,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]
        );
    }
}