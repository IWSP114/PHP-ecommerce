<?php
if (isset($_POST["fullname"], $_POST["email"], $_POST["username"], $_POST["password"])) {

  $password = htmlspecialchars($_POST['password']) ?? '';

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

  $hashedPassword = hash('sha256',$password);

  http_response_code(200); // Set success status
  setcookie("user", $_POST["username"], time() + 3600, "/"); // Set cookie for 1 hour
  echo json_encode(["success" => true]);
  exit;
} else {
  http_response_code(400); // Set error status
  echo json_encode(["error" => "Please fill all the required data!"]);
  exit;
}
