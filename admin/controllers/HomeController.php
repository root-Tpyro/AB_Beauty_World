<?php
class HomeController extends Controller
{
	// Hàm tạo - kiểm tra đăng nhập
	public function __construct()
	{
		$this->authentication();
	}

	public function index()
	{
		$conn = Connection::getInstance();

		$totalOrders = $conn->query("SELECT COUNT(*) FROM orders")->fetchColumn();
		$totalPosts = $conn->query("SELECT COUNT(*) FROM news")->fetchColumn();
		$totalProducts = $conn->query("SELECT COUNT(*) FROM products")->fetchColumn();
		$totalCustomers = $conn->query("SELECT COUNT(*) FROM customers")->fetchColumn();


		// Tính doanh thu theo tháng
		$monthlyRevenue = [];
		for ($month = 1; $month <= 12; $month++) {
			$year = date('Y');
			$start = "$year-" . str_pad($month, 2, '0', STR_PAD_LEFT) . "-01";
			$end = date("Y-m-t", strtotime($start));

			$query = $conn->prepare("
		SELECT SUM(od.price * od.number) AS revenue
		FROM orderdetails od
		JOIN orders o ON od.order_id = o.id
		WHERE o.create_at BETWEEN :start AND :end
	");
			$query->execute([
				":start" => $start,
				":end" => $end
			]);

			$row = $query->fetch(PDO::FETCH_ASSOC);
			$monthlyRevenue[] = round($row["revenue"] ?? 0, 0);
		}

		// Truyền dữ liệu sang view
		$this->loadView("HomeView.php", [
			"totalOrders" => $totalOrders,
			"totalPosts" => $totalPosts,
			"totalProducts" => $totalProducts,
			"totalCustomers" => $totalCustomers,
			"monthlyRevenue" => $monthlyRevenue
		]);
	}
}
