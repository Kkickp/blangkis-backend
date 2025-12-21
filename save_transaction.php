<?php
include "config.php";

$total = $_POST['total'];
$paid = $_POST['paid'];
$change = $_POST['change'];
$paket = $_POST['paket'];
$tujuan = $_POST['tujuan'];
$bukti = $_FILES['bukti']['name'];

move_uploaded_file(
  $_FILES['bukti']['tmp_name'],
  "uploads/" . $bukti
);

$conn->query("INSERT INTO transactions VALUES (
  NULL, '$total', '$paid', '$change',
  '$paket', '$tujuan', '$bukti', NOW()
)");

echo json_encode(["status" => "success"]);
?>
