<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/db.php';

session_start();

use PayOS\PayOS;

$CLIENT_ID = 'c8e5a933-24cd-44ae-98b9-9455bc5c83e4';
$API_KEY = '27ef0e85-abaa-4588-acac-1238c73cd241';
$CHECKSUM_KEY = '65505ebf42b5365da6e5597bb03d76a3c4aa79c170edea6ded21f80f71ef4566';

$payOS = new PayOS($CLIENT_ID, $API_KEY, $CHECKSUM_KEY);

// Hàm tính tổng tiền
function getCartTotal()
{
    $total = 0;
    if (isset($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $item) {
            $total += $item["price"] * $item["number"];
        }
    }
    return $total;
}

$totalAmount = getCartTotal();
if ($totalAmount <= 0) {
    die("Giỏ hàng trống hoặc tổng tiền không hợp lệ.");
}

$customer_id = $_SESSION['customer_id'] ?? 0;
$create_at = date('Y-m-d H:i:s');
$status = 0;
$payment_method = 'QR';

// B1: Insert đơn hàng trước
$stmt = $conn->prepare("INSERT INTO orders (customer_id, create_at, status, payment_method) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isis", $customer_id, $create_at, $status, $payment_method);
$stmt->execute();
$order_id = $stmt->insert_id;
$stmt->close();

// Cập nhật order_code với order_id
$update_stmt = $conn->prepare("UPDATE orders SET order_code = ? WHERE id = ?");
$update_stmt->bind_param("ii", $order_id, $order_id);
$update_stmt->execute();
$update_stmt->close();

// B2: Insert vào bảng orderdetails
if (isset($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $item) {
        $product_id = $item['id']; // Lấy ID sản phẩm
        $quantity = $item['number']; // Số lượng
        $price = $item['price']; // Giá sản phẩm

        // Insert vào orderdetails
        $orderdetails_stmt = $conn->prepare("INSERT INTO orderdetails (order_id, product_id, number, price) VALUES (?, ?, ?, ?)");
        $orderdetails_stmt->bind_param("iiii", $order_id, $product_id, $quantity, $price);
        $orderdetails_stmt->execute();
    }
}

// B3: Tạo link thanh toán
$data = [
    "orderCode" => $order_id, // Sử dụng order_id làm orderCode
    "amount" => $totalAmount,
    "description" => "Thanh toán đơn hàng",
    "returnUrl" => "http://xmart.io.vn/index.php?controller=cart&action=success&status=success",


    "cancelUrl" => "http://xmart.io.vn/index.php?controller=cart"
];

try {
    $response = $payOS->createPaymentLink($data);
    header("Location: " . $response['checkoutUrl']);
    exit;
} catch (\Throwable $th) {
    echo "Lỗi: " . $th->getMessage();
}

// B4: Xóa giỏ hàng sau khi thanh toán thành công
// B4: Xóa giỏ hàng sau khi thanh toán thành công
unset($_SESSION["cart"]);
session_write_close(); // Lưu lại thay đổi của session ngay lập tức
