<?php
session_start();

// ✅ Chỉ cho phép từ localhost truy cập (dev mode)
$allowedOrigins = [
    'http://localhost:3000',
    'http://localhost:5173'
];

$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
if (in_array($origin, $allowedOrigins)) {
    header("Access-Control-Allow-Origin: $origin");
    header("Access-Control-Allow-Credentials: true");
}

// ✅ Xử lý preflight (OPTIONS)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    exit;
}

// ✅ Trả JSON
header('Content-Type: application/json');

$response = [
    'name' => $_SESSION["customer_name"] ?? null,
    'id'   => $_SESSION["customer_id"] ?? null
];

// --- Nếu user đã login thì thêm tin nhắn chào (chỉ 1 lần) ---
if (!empty($_SESSION["customer_id"])) {
    $user_id = $_SESSION["customer_id"];

    $conn = new mysqli("localhost", "root", "", "datawebsite");
    if (!$conn->connect_error) {
        // Kiểm tra đã có tin nhắn chào chưa
        $check = $conn->prepare("SELECT COUNT(*) as c FROM chatbox WHERE user_id = ? AND sender='admin'");
        $check->bind_param("i", $user_id);
        $check->execute();
        $count = $check->get_result()->fetch_assoc()['c'];

        if ($count == 0) {
            $welcome = "Xin chào, mình có thể giúp gì cho bạn?";
            $stmt = $conn->prepare("INSERT INTO chatbox 
                (user_id, guest_id, name, message, sender, created_at, is_admin, seen, is_hidden) 
                VALUES (?, NULL, 'Admin', ?, 'admin', NOW(), 1, 1, 0)");
            $stmt->bind_param("is", $user_id, $welcome);
            $stmt->execute();
        }
    }
}

echo json_encode($response);
