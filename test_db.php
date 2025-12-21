<?php
include "config.php";

$result = $conn->query("SELECT DATABASE() as db");
$row = $result->fetch_assoc();

echo "DATABASE AKTIF: " . $row['db'];
