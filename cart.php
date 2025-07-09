<?php
// Example cart data - in real use, fetch from session or database
$cartItems = [
    [
        'id' => 1,
        'name' => 'Classic Leather Jacket',
        'price' => 129.99,
        'quantity' => 2,
        'image' => 'images/products/jacket1.jpg',
        'size' => 'M',
        'color' => 'Black',
    ],
    [
        'id' => 2,
        'name' => 'Sporty Sneakers',
        'price' => 79.50,
        'quantity' => 1,
        'image' => 'images/products/sneakers1.jpg',
        'size' => '42',
        'color' => 'White',
    ],
];

// Calculate totals
$subtotal = 0;
foreach ($cartItems as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}
$shipping = $subtotal > 100 ? 0 : 10; // Free shipping over $100
$total = $subtotal + $shipping;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Shopping Cart - ShopEasy</title>
    <link rel="stylesheet" href="./styles/cart.css" />
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="cart-page container">
        <h1>Your Shopping Cart</h1>

        <?php if (empty($cartItems)): ?>
            <p>Your cart is empty. <a href="products.php">Start shopping</a>.</p>
        <?php else: ?>
            <div class="cart-items">
                <?php foreach ($cartItems as $item): ?>
                    <div class="cart-item">
                        <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" />
                        <div class="item-details">
                            <h2><?php echo htmlspecialchars($item['name']); ?></h2>
                            <p>Size: <?php echo htmlspecialchars($item['size']); ?> | Color: <?php echo htmlspecialchars($item['color']); ?></p>
                            <p>Price: $<?php echo number_format($item['price'], 2); ?></p>
                            <form method="post" action="update_cart.php" class="quantity-form">
                                <label for="qty-<?php echo $item['id']; ?>">Quantity:</label>
                                <input type="number" id="qty-<?php echo $item['id']; ?>" name="quantity" value="<?php echo $item['quantity']; ?>" min="1" />
                                <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>" />
                                <button type="submit" title="Update quantity"><i class="fa fa-refresh"></i></button>
                            </form>
                            <form method="post" action="remove_from_cart.php" class="remove-form">
                                <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>" />
                                <button type="submit" title="Remove item" class="remove-btn"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                        <div class="item-total">
                            $<?php echo number_format($item['price'] * $item['quantity'], 2); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="cart-summary">
                <div class="summary-details">
                    <p>Subtotal: <span>$<?php echo number_format($subtotal, 2); ?></span></p>
                    <p>Shipping: <span><?php echo $shipping === 0 ? 'Free' : '$' . number_format($shipping, 2); ?></span></p>
                    <p class="total">Total: <span>$<?php echo number_format($total, 2); ?></span></p>
                </div>

                <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
            </div>
        <?php endif; ?>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>