<?php
include("../database.php");


if (isset($_POST["fullname"], $_POST["email"], $_POST["username"], $_POST["password"])) {

  $fullname = htmlspecialchars($_POST["fullname"]) ?? '';
  $email = htmlspecialchars($_POST["email"]) ?? '';
  $username = htmlspecialchars($_POST["username"]) ?? '';
  $password = htmlspecialchars($_POST['password']) ?? '';
  
  // Password unmatch the requirement
  if (
    !preg_match('/[A-Z]/', $password) ||           // at least one uppercase
    !preg_match('/[a-z]/', $password) ||           // at least one lowercase
    !preg_match('/[0-9]/', $password) ||           // at least one digit
    !preg_match('/[\W_]/', $password) ||           // at least one special char
    strlen($password) < 8
  ) {
    http_response_code(400);
    echo json_encode(['error' => 'Password must be at least 8 characters and include upper, lower, digit, and special character.']);
    exit;
  }

  // If the username already existed
  $stmt = $conn->prepare("SELECT * FROM Users WHERE UserName = ? LIMIT 1;");
  $stmt->execute([$username]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if($result) {
    http_response_code(409); // Set error status
    echo json_encode(["error" => "The user already exist!"]);
    exit;
  }

  $hashedPassword = hash('sha256', $password);

  $stmt = $conn->prepare("INSERT INTO Users (FullName, Email, UserName, Password) VALUES (?, ?, ?, ?);");
  $stmt->execute([$fullname, $email, $username, $hashedPassword]);

  http_response_code(200); // Set success status
  setcookie("user", $_POST["username"], time() + 3600, "/"); // Set cookie for 1 hour
  echo json_encode(["register success" => true]);
  exit;
} else {
  http_response_code(400); // Set error status
  echo json_encode(["error" => "Please fill all the required data!"]);
  exit;
}
