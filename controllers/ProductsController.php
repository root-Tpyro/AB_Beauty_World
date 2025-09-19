<?php
//load file model
include "models/ProductsModel.php";
class ProductsController extends Controller
{
	//ke thua class ProductsModel
	use ProductsModel;
	//liet ke so ban ghi
	public function list()
	{
		// Load layout
		$this->layoutPath = "LayoutTrangChu.php";

		// Lấy trang hiện tại từ URL
		$currentPage = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
		$categoriesPerPage = 2;

		// Tính offset
		$offset = ($currentPage - 1) * $categoriesPerPage;

		// Lấy danh mục cho trang hiện tại
		$categories = $this->modelGetCategoriesPaginated($categoriesPerPage, $offset);

		// Lấy sản phẩm theo danh mục
		$products = [];
		foreach ($categories as $category) {
			$products[$category->id] = $this->modelGetProducts($category->id);
		}

		// Tính tổng số trang
		$totalCategories = $this->modelTotalCategories();
		$totalPages = ceil($totalCategories / $categoriesPerPage);

		// Truyền dữ liệu cho view
		$this->loadView("ProductListView.php", [
			'categories' => $categories,
			'products' => $products,
			'currentPage' => $currentPage,
			'totalPages' => $totalPages
		]);
	}


	public function categories()
	{
		//quy dinh so ban ghi mot trang
		$recordPerPage = 20;
		//tinh so trang
		//ham ceil la ham lay tran. VD: ceil(2.1) = 3
		$numPage = ceil($this->modelTotal() / $recordPerPage);
		//lay danh sach cac ban ghi co phan trang
		$data = $this->modelRead($recordPerPage);
		//goi view, truyen du lieu ra view
		$this->loadView("ProductsCategoriesView.php", ["data" => $data, "numPage" => $numPage]);
	}
	//chi tiet san pham
	public function detail()
	{
		$id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : 0;

		// Lấy chi tiết sản phẩm
		$record = $this->modelGetRecord($id);

		// Lấy tất cả bình luận của sản phẩm
		$comments = $this->modelGetComments($id);

		// Truyền dữ liệu vào view: thông tin sản phẩm và các bình luận
		$this->loadView("ProductsDetailView.php", [
			"record" => $record,
			"comments" => $comments  // Truyền các bình luận vào view
		]);
	}

	//danh gia so sao
	public function rating()




	{
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;





		$star = isset($_GET["star"]) ? $_GET["star"] : 0;




		//insert thong tin vao bao rating
		$conn = Connection::getInstance();
		$query = $conn->prepare("insert into rating set product_id=:var_product_id, star=:var_star");
		$query->execute(array("var_product_id" => $id, "var_star" => $star));
		//di chuyen den trang chi tiet san pham
		header("location:index.php?controller=products&action=detail&id=$id");
	}
	//lay so sao tuong ung voi id truyen vao
	public function getStar($id, $star)
	{
		$conn = Connection::getInstance();
		$query = $conn->query("select id from rating where product_id=$id and star=$star");
		//dem so ban ghi tra ve
		return $query->rowCount();
	}
	public function ajax()
	{
		//lay bien key truyen tu url
		$key = isset($_GET["key"]) ? $_GET["key"] : "";
		$conn = Connection::getInstance();
		$query = $conn->query("select * from products where name like '%$key%'");
		$result = $query->fetchAll();
		$strResult = "";
		foreach ($result as $rows)
			$strResult = $strResult . "<li><img src='assets/upload/products/{$rows->photo}'><a href='index.php?controller=products&action=detail&id={$rows->id}'>{$rows->name}</a></li>";
		echo $strResult;
	}
	public function addComment()
	{
		$productId = isset($_POST['product_id']) ? $_POST['product_id'] : 0;
		$comment = isset($_POST['comment']) ? $_POST['comment'] : '';
		$rating = isset($_POST['rating']) ? $_POST['rating'] : 0;

		// Kiểm tra nếu khách hàng đã đăng nhập
		if (isset($_SESSION['customer_id']) && $_SESSION['customer_id'] > 0) {
			$customerId = $_SESSION['customer_id'];

			// Thêm bình luận vào CSDL
			if ($productId > 0 && !empty($comment)) {
				$this->modelAddComment($productId, $comment, $rating, $customerId);
			}
			$_SESSION['toast_message'] = ' Gửi bình luận thành công';



			// Lấy chi tiết sản phẩm
			$record = $this->modelGetRecord($productId);
			// Lấy các bình luận của sản phẩm
			$comments = $this->modelGetComments($productId);

			// Truyền dữ liệu vào view
			$this->loadView("ProductsDetailView.php", [
				'record' => $record,
				'comments' => $comments
			]);
		} else {
			// Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập hoặc thông báo
			header("Location: index.php?controller=account&action=login");
			exit();
		}
	}


	// Giả sử bạn có một phương thức trong controller để lấy tên khách hàng từ ID
	public function getCustomerNameById($customer_id)
	{
		$sql = "SELECT name FROM customers WHERE id = :customer_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);
		$stmt->execute();
		$customer = $stmt->fetch(PDO::FETCH_ASSOC);
		return $customer ? $customer['name'] : 'Khách vãng lai';  // Trả về tên khách hàng hoặc 'Khách vãng lai'
	}
}
