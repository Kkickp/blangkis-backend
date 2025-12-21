<?php
function clean($key) {
    $v = getenv($key);
    if ($v === false) return '';

    // buang semua karakter non hostname
    $v = trim($v);
    $v = ltrim($v, '=');
    $v = preg_replace('/[^a-zA-Z0-9\.\-@_]/', '', $v);

    return $v;
}

$host = clean('DB_HOST');
$user = clean('DB_USER');
$pass = clean('DB_PASS');
$db   = clean('DB_NAME');

/* DEBUG SEKALI SAJA */
if (str_starts_with($host, '=')) {
    die("HOST MASIH KOTOR: [$host]");
}

$mysqli = mysqli_init();

$mysqli->ssl_set(
    NULL,
    NULL,
    __DIR__ . '/ca.pem',
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
echo "KONEKSI DATABASE BERHASIL";
