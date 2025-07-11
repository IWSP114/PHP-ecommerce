<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");

$userLoggedIn = false; // Set to true if user is logged in
$userName = ""; // Example user name
$cartItemCount = 0; // Example cart items
if (isset($_COOKIE['user'])) {
    $userLoggedIn = true;
    $userName = $_COOKIE['user'];
    $cartItemCount = 0;
}
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