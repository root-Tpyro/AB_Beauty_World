<?php 
trait CustomersModel {
    // Lấy danh sách khách hàng có phân trang
    public function modelRead($recordPerPage) {            
        $page = isset($_GET["page"]) && is_numeric($_GET["page"]) && $_GET["page"] > 0 ? $_GET["page"] - 1 : 0;
        $from = $page * $recordPerPage;

        // Kết nối database
        $conn = Connection::getInstance();
        $query = $conn->query("SELECT * FROM customers ORDER BY id DESC LIMIT $from, $recordPerPage");

        return $query->fetchAll();
    }

    // Tính tổng số bản ghi
    public function modelTotal() {
        $conn = Connection::getInstance();
        $query = $conn->query("SELECT id FROM customers");
        return $query->rowCount();
    }

    // Lấy một bản ghi theo ID
    public function modelGetRecord($id) {
        $conn = Connection::getInstance();
        $query = $conn->prepare("SELECT * FROM customers WHERE id = :id");
        $query->execute(["id" => $id]);
        return $query->fetch();
    }

    // Cập nhật khách hàng
    public function modelUpdate($id) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];

        // Mã hóa password nếu có nhập
        $passwordHash = !empty($password) ? md5($password) : null;

        $conn = Connection::getInstance();
        $query = $conn->prepare("UPDATE customers SET name=:name, email=:email, address=:address, phone=:phone WHERE id=:id");
        $query->execute([":name" => $name, ":email" => $email, ":address" => $address, ":phone" => $phone, ":id" => $id]);

        if ($passwordHash) {
            $query = $conn->prepare("UPDATE customers SET password=:password WHERE id=:id");
            $query->execute([":password" => $passwordHash, ":id" => $id]);
        }
    }

    // Thêm khách hàng mới
    public function modelCreate() {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $password = md5($_POST["password"]);

        $conn = Connection::getInstance();
        $query = $conn->prepare("INSERT INTO customers (name, email, address, phone, password) VALUES (:name, :email, :address, :phone, :password)");
        $query->execute([":name" => $name, ":email" => $email, ":address" => $address, ":phone" => $phone, ":password" => $password]);
    }

    // Xóa khách hàng
    public function modelDelete($id) {
        $conn = Connection::getInstance();
        $conn->query("DELETE FROM customers WHERE id = $id");
    }
}
?>
