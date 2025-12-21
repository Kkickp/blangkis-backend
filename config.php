<?php
$host = "gateway01.ap-southeast-1.prod.aws.tidbcloud.com";
$user = getenv("DB_USER");   // masih aman pakai env
$pass = getenv("DB_PASS");
$db   = getenv("DB_NAME");

$mysqli = mysqli_init();

$mysqli->ssl_set(
  NULL,
  NULL,
  __DIR__ . "/ca.pem",
  NULL,
  NULL
);

$mysqli->real_connect(
  $host,
  trim($user),
  trim($pass),
  trim($db),
  4000,
  NULL,
  MYSQLI_CLIENT_SSL
);

if ($mysqli->connect_error) {
  die("Koneksi gagal: " . $mysqli->connect_error);
}

$conn = $mysqli;
echo "KONEKSI OK";
