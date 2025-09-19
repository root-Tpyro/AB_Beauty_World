<?php
trait CartModel
{
    public function cartAdd($id)
    {
        if (isset($_SESSION['cart'][$id])) {
            //nếu đã có sp trong giỏ hàng thì số lượng lên 1
            $_SESSION['cart'][$id]['number']++;
        } else {
            //lấy thông tin sản phẩm từ CSDL và lưu vào giỏ hàng
            //$product = db::get_one("select * from products where id=$id");
            //---
            //PDO
            $conn = Connection::getInstance();
            $query = $conn->prepare("select * from products where id=:id");
            $query->execute(array("id" => $id));
            $query->setFetchMode(PDO::FETCH_OBJ);
            $product = $query->fetch();
            //---

            $_SESSION['cart'][$id] = array(
                'id' => $id,
                'name' => $product->name,
                'photo' => $product->photo,
                'number' => 1,
                'price' => $product->price
            );
        }
    }
    /**
     * Cập nhật số lượng sản phẩm
     * @param int
     * @param int
     */
    public function cartUpdate($id, $number)
    {
        if ($number == 0) {
            //xóa sp ra khỏi giỏ hàng
            unset($_SESSION['cart'][$id]);
        } else {
            $_SESSION['cart'][$id]['number'] = $number;
        }
    }
    /**
     * Xóa sản phẩm ra khỏi giỏ hàng
     * @param int
     */
    public function cartDelete($id)
    {
        unset($_SESSION['cart'][$id]);
    }
    /**
     * Tổng giá trị giỏ hàng
     */
    public function cartTotal()
    {
        $total = 0;
        foreach ($_SESSION['cart'] as $product) {
            $total += $product['price'] * $product['number'];
        }
        return $total;
    }
    /**
     * Số sản phẩm có trong giỏ hàng
     */
    public function cartNumber()
    {
        $number = 0;
        foreach ($_SESSION['cart'] as $product) {
            $number += $product['number'];
        }
        return $number;
    }
    /**
     * Danh sách sản phẩm trong giỏ hàng
     */
    public function cartList()
    {
        return $_SESSION['cart'];
    }
    /**
     * Xóa giỏ hàng
     */
    public function cartDestroy()
    {
        $_SESSION['cart'] = array();
    }
    //=============
    //checkout
    public function cartCheckOut($payment_method)
    {
        $conn = Connection::getInstance();
        $customer_id = $_SESSION["customer_id"];

        // Kiểm tra giỏ hàng
        if (!isset($_SESSION["cart"]) || count($_SESSION["cart"]) == 0) {
            echo "Giỏ hàng trống.";
            return;
        }

        // Thêm đơn hàng
        $query = $conn->prepare("INSERT INTO orders SET customer_id=:customer_id, create_at=NOW(), payment_method=:payment_method");
        $query->execute([
            "customer_id" => $customer_id,
            "payment_method" => $payment_method
        ]);
        $order_id = $conn->lastInsertId();

        $total = 0;
        foreach ($_SESSION["cart"] as $product) {
            $query = $conn->prepare("INSERT INTO orderdetails SET order_id=:order_id, product_id=:product_id, price=:price, number=:number");
            $query->execute([
                "order_id" => $order_id,
                "product_id" => $product["id"],
                "price" => $product["price"],
                "number" => $product["number"]
            ]);
            $total += $product["price"] * $product["number"];
        }
        $_SESSION["last_order_total"] = $total;

        // Gửi email
        require("PHPMailer-master/src/PHPMailer.php");
        require("PHPMailer-master/src/SMTP.php");
        require("PHPMailer-master/src/Exception.php");

        // Lấy thông tin khách
        $query = $conn->prepare("SELECT * FROM customers WHERE id = :id");
        $query->execute(["id" => $customer_id]);
        $customer = $query->fetch(PDO::FETCH_OBJ);

        if (!$customer) {
            echo "Không tìm thấy thông tin khách hàng.";
            return;
        }

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
        $mail->addAddress($customer->email, $customer->name);
        $mail->CharSet = "UTF-8";
        $mail->Subject = "Đơn hàng #$order_id tại MediaMart";

        $body = "<h3>🧾 Cảm ơn bạn đã đặt hàng tại MediaMart!</h3>";
        $body .= "<p>Thông tin đơn hàng:</p><table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse;'>";
        $body .= "<tr><th>Sản phẩm</th><th>SL</th><th>Giá</th><th>Thành tiền</th></tr>";
        foreach ($_SESSION["cart"] as $product) {
            $body .= "<tr>
			<td>{$product['name']}</td>
			<td>{$product['number']}</td>
			<td>" . number_format($product['price']) . "đ</td>
			<td>" . number_format($product['price'] * $product['number']) . "đ</td>
		</tr>";
        }
        $body .= "</table>";
        $body .= "<p><strong>Tổng đơn:</strong> " . number_format($total) . "đ</p>";
        $body .= "<p><strong>Phương thức thanh toán:</strong> " . $payment_method . "</p>";
        $body .= "<p>Chúng tôi sẽ xử lý đơn hàng và liên hệ với bạn sớm nhất.</p>";
        $body .= "<p>Trân trọng,<br>MediaMart</p>";

        $mail->Body = $body;

        if (!$mail->Send()) {
            echo "Lỗi gửi mail: " . $mail->ErrorInfo;
        } else {
            unset($_SESSION["cart"]);
        }
    }
}
