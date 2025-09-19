<?php
trait CustomerOrdersModel
{

    // Hàm lấy danh sách đơn hàng của khách hàng
    public function modelGetOrdersByCustomer($customer_id, $recordPerPage)
    {
        // Tính tổng số đơn hàng của khách hàng
        $total = $this->modelTotalByCustomer($customer_id);

        // Tính số trang
        $numPage = ceil($total / $recordPerPage);

        // Lấy trang hiện tại từ URL
        $page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"] - 1 : 0;

        // Tính số bản ghi cần lấy
        $from = $page * $recordPerPage;

        // Truy vấn lấy danh sách đơn hàng của khách hàng
        $conn = Connection::getInstance();
        $query = $conn->prepare("SELECT * FROM orders WHERE customer_id = :customer_id ORDER BY create_at DESC LIMIT :from, :recordPerPage");
        $query->bindParam(":customer_id", $customer_id, PDO::PARAM_INT);
        $query->bindParam(":from", $from, PDO::PARAM_INT);
        $query->bindParam(":recordPerPage", $recordPerPage, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // Hàm lấy tổng số đơn hàng của khách hàng
    private function modelTotalByCustomer($customer_id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("SELECT id FROM orders WHERE customer_id = :customer_id");
        $query->bindParam(":customer_id", $customer_id, PDO::PARAM_INT);
        $query->execute();

        return $query->rowCount();
    }

    // Hàm lấy chi tiết đơn hàng
    public function modelGetOrderDetail($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("SELECT * FROM orders WHERE id = :id");
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetch(PDO::FETCH_OBJ);
    }

    // Hàm lấy chi tiết sản phẩm trong đơn hàng
    public function modelGetOrderDetails($order_id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("SELECT * FROM orderdetails WHERE order_id = :order_id");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function modelGetCustomers($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("SELECT * FROM customers WHERE id = :id");
        $query->execute(["id" => $id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
