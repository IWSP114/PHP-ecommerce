<?php
$userLoggedIn = false; // Set to true if user is logged in
$userName = "John Doe"; // Example user name
$cartItemCount = 3; // Example cart items
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="styles/header.css">
</head>
<body>
    <header class="ecom-header">
        <div class="logo">
            <a href="/"><img src="images/header/logo.png" alt="Logo"></a>
        </div>
        <nav class="main-nav">
            <ul>
                <li><a href="/shop.php">Shop</a></li>
                <li><a href="/deals.php">Deals</a></li>
                <li><a href="/about.php">About Us</a></li>
                <li><a href="/contact.php">Contact</a></li>
            </ul>
        </nav>
        <div class="header-actions">
            <form class="search-bar" action="/search.php" method="get">
                <input type="text" name="q" placeholder="Search products...">
                <button type="submit">
                    <div class="search-icon-container">
                        <image class="search-icon" src="./images/header/search.png" />
                    </div>
                </button>
            </form>
            <div class="user-links">
                <?php if ($userLoggedIn): ?>
                    <a href="/account.php">Hello, <?php echo htmlspecialchars($userName); ?></a>
                    <a href="/logout.php">Logout</a>
                <?php else: ?>
                    <a href="/login.php">Login</a>
                    <a href="/register.php">Register</a>
                <?php endif; ?>
            </div>
            <div class="cart">
                <a href="/cart.php">Cart (<?php echo $cartItemCount; ?>)</a>
            </div>
        </div>
    </header>
</body>
</html>