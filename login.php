<?php
include "config.php";

$data = json_decode(file_get_contents("php://input"), true);

$username = $data['username'];
$password = $data['password'];

$result = $conn->query("SELECT * FROM users WHERE username='$username'");
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
  echo json_encode([
    "status" => "success",
    "user" => $user
  ]);
} else {
  echo json_encode(["status" => "failed"]);
}
?>
