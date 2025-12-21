<?php
function cleanEnv($key) {
  return ltrim(trim(getenv($key)), '=');
}

$host = cleanEnv("DB_HOST");
$user = cleanEnv("DB_USER");
$pass = cleanEnv("DB_PASS");
$db   = cleanEnv("DB_NAME");

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
  $user,
  $pass,
  $db,
  4000,
  NULL,
  MYSQLI_CLIENT_SSL
);

if ($mysqli->connect_error) {
  die("Koneksi gagal: " . $mysqli->connect_error);
}

$conn = $mysqli;
?>

