<?php
header("Content-Type: application/json");
include "config.php";

$data = json_decode(file_get_contents("php://input"), true);

$fullname = $data['fullname'];
$username = $data['username'];
$password = $data['password'];

// Cek username sudah ada atau belum
$cek = $conn->query("SELECT * FROM users WHERE username='$username'");
if ($cek->num_rows > 0) {
    echo json_encode([
        "status" => "failed",
        "message" => "Username sudah digunakan"
    ]);
    exit;
}

// Hash password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Simpan user
$conn->query("
  INSERT INTO users (fullname, username, password)
  VALUES ('$fullname', '$username', '$hashedPassword')
");

echo json_encode([
  "status" => "success",
  "message" => "Registrasi berhasil"
]);
?>
