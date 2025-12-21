<?php
$mysqli = mysqli_init();

/* SET SSL */
$mysqli->ssl_set(
  NULL,               // key
  NULL,               // cert
  __DIR__ . "/ca.pem",// CA certificate
  NULL,               // capath
  NULL                // cipher
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
