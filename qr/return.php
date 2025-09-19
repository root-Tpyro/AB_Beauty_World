<?php
require_once __DIR__ . '/db_connect.php'; // Kết nối database
session_start();

// Lấy order_id từ URL
if (!isset($_GET['order_id'])) {
    die('Thiếu thông tin order_id.');
}

$order_id = intval($_GET['order_id']); // Ép kiểu an toàn

// ⚡ Update trạng thái đơn hàng thành "Đã thanh toán" (status = 1)
$stmt = $conn->prepare("UPDATE orders SET status = 1 WHERE id = ?");
$stmt->bind_param("i", $order_id);

if ($stmt->execute() && $stmt->affected_rows > 0) {
    // Thành công
    echo "<h2>✅ Thanh toán thành công!</h2>";
    echo "<p>Mã đơn hàng: <strong>#" . htmlspecialchars($order_id) . "</strong></p>";

    // Xóa giỏ hàng sau khi thanh toán
    unset($_SESSION['cart']);

    // Tự động chuyển trang sau 5 giây
    echo '<p>Đang chuyển hướng về trang chủ...</p>';
    echo '<meta http-equiv="refresh" content="5;url=/index.php">';
} else {
    // Thất bại
    echo "<h2>❌ Có lỗi xảy ra khi cập nhật đơn hàng hoặc đơn không tồn tại.</h2>";
}

$stmt->close();
$conn->close();
