<?php
header("Content-Type: application/json; charset=UTF-8");
$conn = new mysqli("localhost", "root", "", "datawebsite");
if ($conn->connect_error) {
  echo json_encode(["error" => "Database connection failed"]);
  exit;
}

// Lấy AUTO_INCREMENT của bảng guest_sessions
$res = $conn->query("SHOW TABLE STATUS LIKE 'guest_sessions'");
$row = $res->fetch_assoc();
$next_id = $row['Auto_increment'];

// Sinh guest_id chuẩn
$new_guest_id = "Khách" . (100100 + $next_id);

// Lưu vào bảng guest_sessions
$stmt = $conn->prepare("INSERT INTO guest_sessions (guest_id) VALUES (?)");
$stmt->bind_param("s", $new_guest_id);
$stmt->execute();

// --- Thêm câu chào vào bảng chatbox ---
$welcome = "Xin chào, mình có thể giúp gì cho bạn?";
$stmt2 = $conn->prepare("INSERT INTO chatbox (user_id, guest_id, name, message, sender, created_at, is_admin, seen, is_hidden) 
                         VALUES (NULL, ?, 'Admin', ?, 'admin', NOW(), 1, 1, 0)");
$stmt2->bind_param("ss", $new_guest_id, $welcome);
$stmt2->execute();

echo json_encode(["guest_id" => $new_guest_id]);
