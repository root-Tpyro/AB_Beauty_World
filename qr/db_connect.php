<?php
// ../MediaMart/db_connect.php

$host = 'localhost';
$user = 'xmartiov_cnmoi';
$pass = 'ngiang12';
$db = 'xmartiov_datawebsite';       // hoặc mật khẩu DB nếu có
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // Ghi log nếu lỗi
    file_put_contents(__DIR__ . '/log.txt', date('[Y-m-d H:i:s] ') . 'DB ERROR: ' . $e->getMessage() . PHP_EOL, FILE_APPEND);
    http_response_code(500);
    echo json_encode(["message" => "❌ Database connection failed"]);
    exit;
}
