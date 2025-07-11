<?php
// Example array of deal products (normally fetched from database)
$deals = [
    [
        'id' => 5,
        'name' => 'Wireless Bluetooth Headphones',
        'is_deals' => true,
        'original_price' => 89.99,
        'deal_price' => 59.99,
        'image' => 'images/products/headphones.jpg',
        'description' => 'High-quality sound with noise cancellation.'
    ],
    [
        'id' => 6,
        'name' => 'Smart Fitness Watch',
        'is_deals' => true,
        'original_price' => 149.99,
        'deal_price' => 99.99,
        'image' => 'images/products/fitness-watch.jpg',
        'description' => 'Track your health and activities with style.'
    ],
    [
        'id' => 7,
        'name' => 'Portable Power Bank 10000mAh',
        'is_deals' => true,
        'original_price' => 39.99,
        'deal_price' => 24.99,
        'image' => 'images/products/powerbank.jpg',
        'description' => 'Charge your devices on the go.'
    ],
    [
        'id' => 8,
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
            Loading
        </div>
    </main>

    <?php include 'footer.php'; // Your site footer ?>
</body>
<script src="jquery-3.7.1.min.js"></script>
<script src="./ajax/deals.js"></script>
</html>
