<?php
$host = trim(getenv("DB_HOST"));
$user = trim(getenv("DB_USER"));   // HARUS root@cluster
$pass = trim(getenv("DB_PASS"));
$db   = trim(getenv("DB_NAME"));

$mysqli = mysqli_init();

if (!file_exists(__DIR__ . "/ca.pem")) {
  die("CA PEM TIDAK DITEMUKAN");
}

$mysqli->ssl_set(
  NULL,
  NULL,
  __DIR__ . "/ca.pem",
  NULL,
  NULL
);

$mysqli->real_connect(
  $host,
  $user,
  $pass,
  $db,
  4000,
  NULL,
  MYSQLI_CLIENT_SSL | MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT
);

if ($mysqli->connect_error) {
  die("Koneksi gagal: " . $mysqli->connect_error);
}

$conn = $mysqli;
echo "KONEKSI OK";
?>
