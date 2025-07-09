<?php
// Example array of deal products (normally fetched from database)
$deals = [
    [
        'id' => 101,
        'name' => 'Wireless Bluetooth Headphones',
        'is_deals' => true,
        'original_price' => 89.99,
        'deal_price' => 59.99,
        'image' => 'images/products/headphones.jpg',
        'description' => 'High-quality sound with noise cancellation.'
    ],
    [
        'id' => 102,
        'name' => 'Smart Fitness Watch',
        'is_deals' => true,
        'original_price' => 149.99,
        'deal_price' => 99.99,
        'image' => 'images/products/fitness-watch.jpg',
        'description' => 'Track your health and activities with style.'
    ],
    [
        'id' => 103,
        'name' => 'Portable Power Bank 10000mAh',
        'is_deals' => true,
        'original_price' => 39.99,
        'deal_price' => 24.99,
        'image' => 'images/products/powerbank.jpg',
        'description' => 'Charge your devices on the go.'
    ],
    [
        'id' => 104,
        'name' => 'Wireless Ergonomic Mouse',
        'is_deals' => true,
        'original_price' => 49.99,
        'deal_price' => 29.99,
        'image' => 'images/products/mouse.jpg',
        'description' => 'Comfortable design for long hours of use.'
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Deals - ShopKeeper</title>
    <link rel="stylesheet" href="./styles/deals.css" />
</head>
<body>
    <?php include 'header.php'; // Your site header ?>

    <main class="deals-page">
        <h1>Hot Deals & Discounts</h1>
        <div class="deals-grid">
            <?php foreach ($deals as $deal): ?>
                <div class="deal-card">
                    <img src="<?php echo htmlspecialchars($deal['image']); ?>" alt="<?php echo htmlspecialchars($deal['name']); ?>" />
                    <h2><?php echo htmlspecialchars($deal['name']); ?></h2>
                    <p class="description"><?php echo htmlspecialchars($deal['description']); ?></p>
                    <p class="price">
                        <span class="deal-price">$<?php echo number_format($deal['deal_price'], 2); ?></span>
                        <span class="original-price">$<?php echo number_format($deal['original_price'], 2); ?></span>
                    </p>
                    <form action="cart.php" method="post" class="add-to-cart-form">
                        <input type="hidden" name="product_id" value="<?php echo $deal['id']; ?>" />
                        <button type="submit">Buy Now</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <?php include 'footer.php'; // Your site footer ?>
</body>
</html>
