<?php
  include("../database.php");

  if(isset($_POST["username"], $_POST["password"])) {

    $username = htmlspecialchars($_POST["username"]) ?? '';
    $password = htmlspecialchars($_POST['password']) ?? '';
    $hashedPassword = hash('sha256', $password);

    $stmt = $conn->prepare("SELECT * FROM Users WHERE UserName = ? AND Password = ? LIMIT 1;");
    $stmt->execute([$username, $hashedPassword]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result) {
      http_response_code(200); // Set success status
      setcookie("user", $_POST["username"], time() + 3600, "/"); // Set cookie for 1 hour
      echo json_encode(["success" => true]);
      exit;
    }

      http_response_code(409); // Set error status
      echo json_encode(["error" => "The user already exist!"]);
      exit;

  } else {
    http_response_code(400); // Set error status
    echo json_encode(["error" => "Please fill all the required data!"]);
    exit;
  }
?>