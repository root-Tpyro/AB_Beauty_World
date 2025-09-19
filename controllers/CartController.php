<?php
include "models/CartModel.php";
class CartController extends Controller
{
    public function confirmPayment()
    {
        $method = $_GET["method"] ?? "";

        // Các phương thức offline và online
        $offline = ["cod"];
        $online = ["momo", "vnpay"];
        $qr = ["qr"]; // thêm nhóm QR riêng

        // Kiểm tra xem có thông tin khách hàng không
        $email = $_SESSION["customer_email"] ?? "";
        if (!$email) {
            echo "Không tìm thấy thông tin khách hàng.";
            return;
        }

        // Lấy thông tin khách hàng
        $conn = Connection::getInstance();
        $query = $conn->prepare("SELECT * FROM customers WHERE email = :email LIMIT 1");
        $query->execute(["email" => $email]);
        $customer = $query->fetch(PDO::FETCH_OBJ);

        // Nếu là thanh toán khi nhận hàng
        if (in_array($method, $offline)) {
            $this->loadView("OfflinePaymentView.php", [
                "customer" => $customer,
                "method" => $method
            ]);
        }
        // Nếu là thanh toán online (momo, vnpay)
        else if (in_array($method, $online)) {
            $this->loadView("OnlinePaymentView.php", [
                "customer" => $customer,
                "method" => $method
            ]);
        }
        // Nếu là thanh toán QR
        else if (in_array($method, $qr)) {
            $this->loadView("QRView.php", [
                "customer" => $customer,
                "method" => $method
            ]);
        }
        // Các trường hợp còn lại
        else {
            echo "Phương thức thanh toán không hợp lệ.";
        }
    }



    //ke thua class CartModel
    use CartModel;
    //ham tao
    public function __construct()
    {
        //neu gio hang chua ton tai thi khoi tao no
        if (isset($_SESSION["cart"]) == false)
            $_SESSION["cart"] = array();
    }
    //them san pham vao gio hang
    public function create()
    {
        $id = $_GET["id"] ?? 0;
        $this->cartAdd($id);

        // DEBUG LOG


        $_SESSION['toast_message'] = ' Đã thêm sản phẩm vào giỏ hàng';

        header("Location: index.php?controller=cart");
        exit();
    }


    //hien thi gio hang
    public function index()
    {
        $this->loadView("CartView.php");
    }
    //xoa san pham khoi gio hang
    public function delete()
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        //goi ham cartDelete de them san pham vao gio hang
        $this->cartDelete($id);
        //quay tro lai trang gio hang
        header("location:index.php?controller=cart");
    }
    //xoa toan bo gio hang
    public function destroy()
    {
        //goi ham cartDestroy de xoa gio hang
        $this->cartDestroy($id);
        $_SESSION['toast_message'] = 'Đã xóa toàn bộ giỏ hàng';
        //quay tro lai trang gio hang
        header("location:index.php?controller=cart");
    }
    //cap nhat nhieu san pham
    public function update()
    {
        //duyet cac phan tu trong session array
        foreach ($_SESSION["cart"] as $product) {
            $id = $product["id"];
            $quantity = $_POST["product_$id"];
            //goi ham cartUpdate de update lai so luong
            $this->cartUpdate($id, $quantity);
        }
        $_SESSION['toast_message'] = 'cập nhập thành công';
        //quay tro lai trang gio hang
        header("location:index.php?controller=cart");
    }
    //thanh toan gio hang
    public function checkout()
    {
        if (!isset($_SESSION["customer_email"])) {
            header("location:index.php?controller=account&action=login");
            exit();
        }

        $payment_method = isset($_POST["payment_method"]) ? $_POST["payment_method"] : 'COD';

        // Tiến hành lưu đơn hàng
        $this->cartCheckOut($payment_method);

        // Redirect sang trang thành công với param để React đọc
        header("Location: index.php?controller=cart&action=success&status=success");
        exit();
    }


    public function success()
    {
        $status = $_GET['status'] ?? '';
        $orderCode = $_GET['orderCode'] ?? null;

        // Nếu là thanh toán thành công và có mã đơn hàng
        if ($status === 'PAID' && $orderCode) {
            $conn = Connection::getInstance();
            $query = $conn->prepare("SELECT SUM(price * number) AS total FROM orderdetails WHERE order_id = :order_id");
            $query->execute(["order_id" => $orderCode]);
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $_SESSION["last_order_total"] = $row['total'] ?? 0;
        }

        $this->layoutPath = "views/LayoutTrangTrong.php";
        $this->loadView("SuccessView.php");
    }



    public function momoPayment()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

            $orderInfo = "Thanh toán qua ATM MoMo";
            $amount = isset($_POST['total_momo']) ? $_POST['total_momo'] : 0;
            $orderId = time() . "";
            $redirectUrl = "https://xmart.io.vn/index.php?controller=cart&action=momoCallback";
            $ipnUrl = "https://xmart.io.vn/index.php?controller=cart&action=momoCallback";

            $extraData = "";

            $requestId = time() . "";
            $requestType = "payWithATM";

            // Tạo chữ ký bảo mật
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData .
                "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode .
                "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;

            $signature = hash_hmac("sha256", $rawHash, $secretKey);

            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );

            // Gửi request
            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);

            if (isset($jsonResult['payUrl'])) {
                header('Location: ' . $jsonResult['payUrl']);
                exit();
            } else {
                echo "Lỗi khi tạo đơn hàng MoMo: ";
                print_r($jsonResult);
            }
        }
    }

    // Hàm hỗ trợ gửi POST request
    private function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        ));
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function momoCallback()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $orderId = $_GET["orderId"] ?? null;
            $resultCode = $_GET["resultCode"] ?? null;

            if ($resultCode == "0") { // Thanh toán thành công
                $payment_method = "Momo";

                // Cập nhật đơn hàng
                $this->cartCheckOut($payment_method);

                // Chuyển đến trang SuccessView và truyền thông báo
                header("Location: index.php?controller=cart&action=success&message=" . urlencode("Thanh toán MoMo thành công!"));
                exit();
            } else {
                // Chuyển đến trang giỏ hàng với thông báo lỗi
                header("Location: index.php?controller=cart&message=" . urlencode("Thanh toán MoMo thất bại!"));
                exit();
            }
        } else {
            echo "Không có dữ liệu từ MoMo!";
            exit();
        }
    }



    public function selectPayment()
    {
        // Nếu chưa đăng nhập thì bắt đăng nhập
        if (!isset($_SESSION["customer_email"])) {
            header("location:index.php?controller=account&action=login");
            exit();
        }

        // Load view để người dùng chọn phương thức thanh toán
        $this->loadView("SelectPaymentView.php");
    }
}
