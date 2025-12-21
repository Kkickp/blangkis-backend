=<?php
$mysqli = mysqli_init();

$mysqli->ssl_set(
  NULL,
  NULL,
  __DIR__ . "/ca.pem",
  NULL,
  NULL
);

$mysqli->real_connect(
  getenv("DB_HOST"),
  getenv("DB_USER"),
  getenv("DB_PASS"),
  getenv("DB_NAME"),
  4000,
  NULL,
  MYSQLI_CLIENT_SSL
);

if ($mysqli->connect_error) {
  die("Koneksi gagal: " . $mysqli->connect_error);
}

$conn = $mysqli;
?>

