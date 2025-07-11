<?php
include('database.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: /');
  exit;
}
if (!isset($_COOKIE['user'], $_COOKIE['user_id'], $_POST['product_id'])) {
  header('Location: /');
  exit;
}
try {

  $stmt = $conn->prepare("SELECT * FROM Cart WHERE UserID = ? AND ProductID = ? LIMIT 1;");
  $stmt->execute([$_COOKIE['user_id'], $_POST['product_id']]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if($result) {
    $newQty = $result['Quantity'] + 1;
    $stmt = $conn->prepare("UPDATE Cart SET Quantity = ? WHERE UserID = ? AND ProductID = ?");
    $stmt->execute([$newQty, $_COOKIE['user_id'], $_POST['product_id']]);
    echo "<script>alert('Cart item quantity updated');</script>";
  } else {
    $stmt = $conn->prepare("INSERT INTO Cart (UserID, ProductID, Quantity) VALUES (?, ?, ?)");
    $stmt->execute([$_COOKIE['user_id'], $_POST['product_id'], 1]);
    echo "<script>alert('New Cart item inserted');</script>";
  }

  header('Location: ' . $_SERVER['HTTP_REFERER']);
} catch (Exception) {
  echo "<script>alert('Something went wrong!');</script>";
}
?>