<?php
function env_clean(string $key): string {
    $v = getenv($key);
    if ($v === false) return '';
    // buang spasi, newline, tanda = di awal/akhir
    $v = trim($v);
    $v = ltrim($v, '=');
    return $v;
}

$host = env_clean('DB_HOST');
$user = env_clean('DB_USER');
$pass = env_clean('DB_PASS');
$db   = env_clean('DB_NAME');

$mysqli = mysqli_init();

/* SSL untuk TiDB Cloud */
$mysqli->ssl_set(
    NULL,
    NULL,
    __DIR__ . '/ca.pem',
    NULL,
    NULL
);

var_dump($host, $user, $db);
exit;

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
    die('Koneksi gagal: ' . $mysqli->connect_error);
}

$conn = $mysqli;
