<div class="main_page">
    <?php if (!empty($products)): ?>
        <table border="1">
            <caption>Selected Products</caption>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
            <?php
            foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['quantity']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <button onclick="window.location.href = '/homework21/';">Back to Shop</button>
    <?php else: ?>
        <h2>Your Cart is Empty</h2>
    <?php endif; ?>
</div>