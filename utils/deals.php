<?php
  include("../database.php");
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("SELECT * FROM Products WHERE IS_DUEL = TRUE LIMIT 50;");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
  }
?>