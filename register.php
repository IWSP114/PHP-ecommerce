<?php
// You can process registration logic here if needed
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register - ShopKeeper</title>
    <link rel="stylesheet" href="./styles/register.css">
</head>

<body>
    <div class="register-container">
        <form class="register-form" action="register.php" method="post">
            <h2>Create Your Account</h2>
            <div class="input-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" required>
            </div>
            <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <ul style="list-style-type:circle;">
                <li>At least 1 Upper case, and 1 lower case character</li>
                <li>At least 8 digit of character</li>
                <li>Including special character(!,@,#,$,%,^...)</li>
            </ul>
            <p class="error-message" style="color:red;"></p>
            <button type="submit">Register</button>
            <div class="register-links">
                <a href="login.php">Already have an account? Login</a>
            </div>
        </form>
    </div>
</body>
<script src="./jquery-3.7.1.min.js"></script>
<script src="./ajax/post-script.js"></script>

</html>