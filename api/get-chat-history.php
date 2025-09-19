<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");

$mysqli = new mysqli('localhost', 'root', '', 'datawebsite');
if ($mysqli->connect_error) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

$user_id = $_GET['user_id'] ?? null;
$guest_id = $_GET['guest_id'] ?? null;

if ($user_id) {
    $stmt = $mysqli->prepare("SELECT name, message, is_admin, sender, created_at FROM chatbox WHERE user_id = ? ORDER BY created_at ASC");
    $stmt->bind_param("s", $user_id);
} elseif ($guest_id) {
    $stmt = $mysqli->prepare("SELECT name, message, is_admin, sender, created_at FROM chatbox WHERE guest_id = ? ORDER BY created_at ASC");
    $stmt->bind_param("s", $guest_id);
} else {
    echo json_encode([]);
    exit;
}

$stmt->execute();
$result = $stmt->get_result();

$messages = [];
while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

echo json_encode($messages);
