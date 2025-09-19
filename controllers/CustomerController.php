<?php
class CustomerController extends Controller
{
    public function edit()
    {
        // kiểm tra đăng nhập
        if (!isset($_SESSION["customer_email"])) {
            header("location:index.php?controller=account&action=login");
            exit();
        }

        $email = $_SESSION["customer_email"];
        $conn = Connection::getInstance();
        $query = $conn->prepare("SELECT * FROM customers WHERE email = :email");
        $query->execute(["email" => $email]);
        $customer = $query->fetch(PDO::FETCH_OBJ);

        // load view cập nhật, truyền dữ liệu khách hàng
        $this->loadView("CustomerEditView.php", ["customer" => $customer]);
    }

    public function update()
    {
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $email = $_SESSION["customer_email"];
        $method = isset($_POST['method']) ? $_POST['method'] : 'qr'; // Nếu không có thì mặc định 'cod'

        $conn = Connection::getInstance();
        $query = $conn->prepare("UPDATE customers SET name = :name, phone = :phone, address = :address WHERE email = :email");
        $query->execute([
            "name" => $name,
            "phone" => $phone,
            "address" => $address,
            "email" => $email
        ]);

        header("location:index.php?controller=cart&action=confirmPayment&method=$method");
        exit();
    }
}
