<?php
header("Content-Type: application/json");
include "config.php";

$result = $conn->query("SELECT id, fullname, username FROM users");
$data = [];

while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}

echo json_encode($data);
