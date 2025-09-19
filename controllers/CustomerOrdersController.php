<?php
include_once "models/CustomerOrdersModel.php";

class CustomerOrdersController extends Controller
{
    use CustomerOrdersModel;  // Sử dụng Trait

    // Hiển thị danh sách đơn hàng của khách hàng
    public function index()
    {
        // Lấy ID khách hàng từ session (giả sử khách đã đăng nhập)
        $customer_id = $_SESSION["customer_id"] ?? 0;

        // Lấy danh sách đơn hàng của khách hàng
        $listRecord = $this->modelGetOrdersByCustomer($customer_id, 25);  // Truyền số bản ghi mỗi trang là 25

        // Load view và truyền dữ liệu
        $this->loadView("CustomerOrdersView.php", ["listRecord" => $listRecord]);
    }

    // Chi tiết đơn hàng
    public function detail()
    {
        // Lấy id từ URL
        $id = isset($_GET['id']) ? $_GET['id'] : 0;

        // Kiểm tra xem id có hợp lệ không
        if ($id > 0) {
            // Lấy chi tiết đơn hàng từ model
            $orderDetail = $this->modelGetOrderDetail($id);

            // Lấy các sản phẩm trong đơn hàng
            $orderDetails = $this->modelGetOrderDetails($id);

            // Lấy thông tin khách hàng
            $customer = $this->modelGetCustomers($orderDetail->customer_id);

            // Truyền dữ liệu vào view
            $this->loadView("CustomerDetailView.php", [
                "orderDetail" => $orderDetail,
                "orderDetails" => $orderDetails,
                "customer" => $customer
            ]);
        } else {
            // Nếu không có id hợp lệ, có thể chuyển hướng hoặc thông báo lỗi
            echo "Invalid order ID";
        }
    }
    public function modelGetProducts($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("SELECT * FROM products WHERE id = :id");
        $query->execute(["id" => $id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
