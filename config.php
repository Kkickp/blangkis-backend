<?php
$conn = new mysqli(
  "gateway01.ap-southeast-1.prod.aws.tidbcloud.com",
  "xxxxxxxx.root",
  "PASSWORD_ASLI_TIDB",
  "blangkis_db",
  4000
);

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

echo "Koneksi ke TiDB Cloud BERHASIL";
?>
