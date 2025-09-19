<?php
function log_debug($message)
{
    $logFile = __DIR__ . '/webhook.log';
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($logFile, "[$timestamp] $message" . PHP_EOL, FILE_APPEND);
}

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    http_response_code(200);
    echo json_encode(["message" => "✅ Webhook endpoint is ready!"]);
    exit;
}

try {
    $body = file_get_contents('php://input');
    log_debug("Raw input: " . $body);

    if (!$body) {
        throw new Exception("No content received");
    }

    $webhook = json_decode($body, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("Invalid JSON: $body");
    }

    $data = $webhook['data'] ?? null;
    if (!$data) {
        throw new Exception("Missing 'data' field");
    }

    $order_code = $data['orderCode'] ?? null;
    if (!$order_code) {
        throw new Exception("Missing 'orderCode' in data");
    }

    $stmt_order = $pdo->prepare("SELECT id, payment_method FROM orders WHERE order_code = :order_code LIMIT 1");
    $stmt_order->execute([':order_code' => $order_code]);
    $order = $stmt_order->fetch(PDO::FETCH_ASSOC);

    if (!$order) {
        throw new Exception("Order not found for order_code: $order_code");
    }

    $order_id = $order['id'];
    $payment_method = $order['payment_method'];

    // Ghi vào bảng qr_trans
    $insert_stmt = $pdo->prepare("INSERT INTO qr_trans (
        order_id, payer_name, payer_account, amount, description, reference_code,
        order_code, currency, transaction_datetime
    ) VALUES (
        :order_id, :payer_name, :payer_account, :amount, :description, :reference_code,
        :order_code, :currency, :transaction_datetime
    )");

    $insert_stmt->execute([
        ':order_id' => $order_id,
        ':payer_name' => $data['counterAccountName'] ?? '',
        ':payer_account' => $data['counterAccountNumber'] ?? '',
        ':amount' => (int) ($data['amount'] ?? 0),
        ':description' => $data['description'] ?? '',
        ':reference_code' => $data['reference'] ?? '',
        ':order_code' => $order_code,
        ':currency' => $data['currency'] ?? 'VND',
        ':transaction_datetime' => $data['transactionDateTime'] ?? date('Y-m-d H:i:s'),
    ]);

    $code = $data['code'] ?? null;
    if ($code === '00') {
        // Lấy thông tin khách hàng
        $stmt_customer = $pdo->prepare("SELECT c.email, c.name FROM customers c
            JOIN orders o ON o.customer_id = c.id
            WHERE o.id = :order_id LIMIT 1");
        $stmt_customer->execute([':order_id' => $order_id]);
        $customer = $stmt_customer->fetch(PDO::FETCH_ASSOC);

        // Lấy danh sách sản phẩm trong đơn hàng
        $stmt_items = $pdo->prepare("SELECT p.name, od.number, od.price
            FROM orderdetails od
            JOIN products p ON p.id = od.product_id
            WHERE od.order_id = :order_id");
        $stmt_items->execute([':order_id' => $order_id]);
        $order_items = $stmt_items->fetchAll(PDO::FETCH_ASSOC);

        // Tính tổng đơn hàng
        $total = 0;
        foreach ($order_items as $item) {
            $total += $item['price'] * $item['number'];
        }

        if ($customer) {
            require_once __DIR__ . '/../PHPMailer-master/src/PHPMailer.php';
            require_once __DIR__ . '/../PHPMailer-master/src/SMTP.php';
            require_once __DIR__ . '/../PHPMailer-master/src/Exception.php';

            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465;
            $mail->IsHTML(true);
            $mail->Username = "giang8b07@gmail.com";
            $mail->Password = "zokdgmreyavloevy";
            $mail->SetFrom("giang8b07@gmail.com", "MediaMart");
            $mail->addAddress($customer['email'], $customer['name']);
            $mail->CharSet = "UTF-8";
            $mail->Subject = "🎉 Đơn hàng đã thanh toán thành công!";

            $body = "<h3>🧾 Cảm ơn bạn đã đặt hàng tại MediaMart!</h3>";
            $body .= "<p>Thông tin đơn hàng <strong>$order_code</strong>:</p>";
            $body .= "<table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse;'>";
            $body .= "<tr><th>Sản phẩm</th><th>SL</th><th>Giá</th><th>Thành tiền</th></tr>";
            foreach ($order_items as $product) {
                $body .= "<tr>
                    <td>{$product['name']}</td>
                    <td>{$product['number']}</td>
                    <td>" . number_format($product['price']) . "đ</td>
                    <td>" . number_format($product['price'] * $product['number']) . "đ</td>
                </tr>";
            }
            $body .= "</table>";
            $body .= "<p><strong>Tổng đơn:</strong> " . number_format($total) . "đ</p>";
            $body .= "<p><strong>Phương thức thanh toán:</strong> $payment_method</p>";
            $body .= "<p>Chúng tôi sẽ xử lý đơn hàng và liên hệ với bạn sớm nhất.</p>";
            $body .= "<p>Trân trọng,<br>MediaMart</p>";

            $mail->Body = $body;

            if (!$mail->Send()) {
                log_debug("❌ Email error: " . $mail->ErrorInfo);
            } else {
                log_debug("📧 Email sent to {$customer['email']}");
            }
        } else {
            log_debug("❌ Customer not found for order_id $order_id");
        }
    }

    log_debug("✅ Webhook processed for order_code: $order_code");
    http_response_code(200);
    echo json_encode(["message" => "✅ Webhook processed successfully"]);
} catch (Throwable $e) {
    log_debug("❌ Error: " . $e->getMessage());
    http_response_code(200); // Luôn trả 200 để PayOS không báo lỗi
    echo json_encode([
        "message" => "Received with error (but 200 sent to PayOS)",
        "error" => $e->getMessage()
    ]);
}
