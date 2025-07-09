<?php
// Example array of products (in real use, fetch from database)
$products = [
    [
        'id' => 1,
        'name' => 'Classic Leather Jacket',
        'price' => 129.99,
        'image' => 'images/products/jacket1.jpg',
        'description' => 'Premium quality leather jacket, perfect for any season.'
    ],
    [
        'id' => 2,
        'name' => 'Sporty Sneakers',
        'price' => 79.50,
        'image' => 'images/products/sneakers1.jpg',
        'description' => 'Comfortable and stylish sneakers for everyday wear.'
    ],
    [
        'id' => 3,
        'name' => 'Elegant Wristwatch',
        'price' => 199.00,
        'image' => 'images/products/watch1.jpg',
        'description' => 'Water-resistant wristwatch with a sleek design.'
    ],
    [
        'id' => 4,
        'name' => 'Casual Denim Jeans',
        'price' => 59.99,
        'image' => 'images/products/jeans1.jpg',
        'description' => 'Classic fit denim jeans made from durable fabric.'
    ],
    // Add more products as needed
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Products - ShopKeeper</title>
    <link rel="stylesheet" href="./styles/shop.css" />
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="products-page">
        <h1>Our Products</h1>
        <div class="products-grid">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" />
                    <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                    <p class="price">$<?php echo number_format($product['price'], 2); ?></p>
                    <p class="description"><?php echo htmlspecialchars($product['description']); ?></p>
                    <form action="cart.php" method="post" class="add-to-cart-form">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>" />
                        <button type="submit">Add to Cart</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <?php include 'footer.php'; // Your site footer ?>
</body>
</html>