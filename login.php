<?php
header("Content-Type: application/json");
include "config.php";

$data = json_decode(file_get_contents("php://input"), true);

$username = $data['username'] ?? '';
$password = $data['password'] ?? '';

$result = $conn->query(
  "SELECT * FROM users WHERE username='$username' LIMIT 1"
);

if ($result->num_rows == 0) {
  echo json_encode([
    "status" => "failed",
    "message" => "User tidak ditemukan"
  ]);
  exit;
}

$user = $result->fetch_assoc();

if (password_verify($password, $user['password'])) {
  echo json_encode([
    "status" => "success",
    "user" => [
      "id" => $user['id'],
      "fullname" => $user['fullname'],
      "username" => $user['username']
    ]
  ]);
} else {
  echo json_encode([
    "status" => "failed",
    "message" => "Password salah"
  ]);
}
