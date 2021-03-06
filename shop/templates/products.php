<?php
?>
<div class="main_page">
    <form method="post" action="/shop/index.php">
        <table border="1">
            <caption>All Products</caption>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Select</th>
            </tr>
            <?php
            foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['quantity']; ?></td>
                    <td><input type="checkbox" name="products[]" value="<?php echo $product['name']; ?>"></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <input type="submit" value="Order">
    </form>
</div>