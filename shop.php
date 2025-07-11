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
            Loading...
        </div>
        <p class="error-message"></p>
    </main>

    <?php include 'footer.php'; // Your site footer ?>
</body>
<script src="jquery-3.7.1.min.js"></script>
<script src="./ajax/shop.js"></script>
</html>