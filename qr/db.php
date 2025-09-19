<?php
$host = 'localhost';
$user = 'xmartiov_cnmoi';
$pass = 'ngiang12';
$db = 'xmartiov_datawebsite';

$conn = new mysqli($host, $user, $pass, $db);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
