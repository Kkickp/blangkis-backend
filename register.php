=<?php
header("Content-Type: application/json");
include "config.php";

$data = json_decode(file_get_contents("php://input"), true);

$fullname = $data['fullname'];
$username = $data['username'];
$password = $data['password'];

// cek username
$cek = $conn->query("SELECT id FROM users WHERE username='$username'");
if ($cek->num_rows > 0) {
  echo json_encode([
    "status" => "failed",
    "message" => "Username sudah terdaftar"
  ]);
  exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);

if ($conn->query(
  "INSERT INTO users (fullname, username, password)
   VALUES ('$fullname', '$username', '$hash')"
)) {
  echo json_encode([
    "status" => "success",
    "message" => "Registrasi berhasil"
  ]);
} else {
  echo json_encode([
    "status" => "failed",
    "message" => $conn->error
  ]);
}
