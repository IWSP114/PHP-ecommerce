<?php
  if(isset($_POST["username"], $_POST["password"])) {
    http_response_code(200); // Set success status
    setcookie("user", $_POST["username"], time() + 3600, "/"); // Set cookie for 1 hour
    echo json_encode(["success" => true]);
    exit;

  } else {
    http_response_code(400); // Set error status
    echo json_encode(["error" => "Please fill all the required data!"]);
    exit;
  }
?>