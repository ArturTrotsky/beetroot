<!--Создать текстовый файл, содержащий данные товаров (имя, цена, количество), далее создать php страницу
которая будет содержать товары данного файла. Пользователь может выбрать несколько товаров на странице и
нажать кнопку заказать, после нажатия кнопки заказать необходимо сохранить выбранные товары в сессию,
после перезагрузки страницы отобразить выбранные ранее товары, получив их из сессии.-->

<?php

/*$products = [
    ['name' => 'Apple iPhone 11 Pro Max', 'price' => 47999, 'quantity' => 15],
    ['name' => 'Apple Watch Series 6 GPS', 'price' => 15799, 'quantity' => 21],
    ['name' => 'Samsung Galaxy S20', 'price' => 32999, 'quantity' => 17],
    ['name' => 'Samsung Galaxy Watch 3', 'price' => 10999, 'quantity' => 19],
    ['name' => 'Xiaomi Mi 10T Pro', 'price' => 15999, 'quantity' => 23],
    ['name' => 'Xiaomi Mi Smart Band 4 NFC', 'price' => 1299, 'quantity' => 14]
];

file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'products.json', json_encode($products));*/


$products = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'products.json');
$products = json_decode($products, true);

if (!empty($_POST)) {
    session_start();
    $_SESSION['cart'] = array_intersect_key($products, $_POST);
    var_dump($_SESSION);
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Store</title>
</head>
<body>
<form method="post" action="">
    <table border="1">
        <caption><h2>GADGET STORE</h2></caption>
        <?php for ($i = 0; $i < count($products); $i++) {
            if ($i == 0) {
                echo "<tr>";
                foreach ($products[$i] as $key => $value) {
                    echo "<th>$key</th>";
                }
                echo "<th>Add to Cart</th>";
                echo "</tr>";
            }
            echo "<tr>";
            foreach ($products[$i] as $value) {
                echo "<td>$value</td>";
            }
            echo "<td><input type=\"checkbox\" name=$i /></td>";
            echo "</tr>";
        } ?>
    </table>
    <input type="submit" value="Buy selected products">
</form>
</body>
</html>