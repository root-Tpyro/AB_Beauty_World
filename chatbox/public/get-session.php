<?php
session_start();
header('Content-Type: application/json');

echo json_encode([
    'name' => $_SESSION["customer_name"] ?? null,
    'id' => $_SESSION["customer_id"] ?? null
]);
