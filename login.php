<?php
// You can process login logic here if needed
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - ShopEasy</title>
    <link rel="stylesheet" href="./styles/login.css">
</head>
<body>
    <div class="login-container">
        <form class="login-form" action="login.php" method="post">
            <h2>Login to Your Account</h2>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required autofocus>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <div class="login-links">
                <a href="forgot-password.php">Forgot Password?</a>
                <span> | </span>
                <a href="register.php">Create Account</a>
                <p class="error-message" style="color:red;"></p>
            </div>
        </form>
    </div>
</body>
<script src="./jquery-3.7.1.min.js"></script>
<script src="./post-script.js"></script>
</html>