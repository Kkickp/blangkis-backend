<?php
include "config.php";

$fullname = "User Railway";
$username = "railwayuser";
$password = password_hash("12345", PASSWORD_DEFAULT);

$sql = "INSERT INTO users (fullname, username, password)
        VALUES ('$fullname', '$username', '$password')";

if ($conn->query($sql)) {
  echo "INSERT USER BERHASIL";
} else {
  echo "ERROR: " . $conn->error;
}
