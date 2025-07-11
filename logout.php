<?php
session_start();

// Unset all of the session variables.
$_SESSION = [];

// Destroy the session.
session_destroy();

// Optionally, clear the session cookie (for security)
setcookie("user", $_POST["username"], time() - 3600, "/");

// Redirect to login page or homepage
header("Location: login.php");
exit;
?>