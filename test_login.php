<?php
$_POST = [];
$data = [
  "username" => "username_yang_ada",
  "password" => "password_asli"
];

$ch = curl_init("https://blangkis-backend-production.up.railway.app/login.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
curl_close($ch);

echo $response;
