<?php
trait ProductsModel
{
	public function modelTotalCategories()
	{
		$conn = Connection::getInstance();
		$query = $conn->query("SELECT COUNT(*) as total FROM categories WHERE parent_id = 0");
		$result = $query->fetch();
		return $result->total;
	}


	//lay danh sach cac ban ghi, co phan trang
	public function modelGetCategoriesPaginated($limit, $offset)
	{
		$conn = Connection::getInstance();
		$query = $conn->prepare("SELECT * FROM categories WHERE parent_id = 0 ORDER BY id DESC LIMIT :limit OFFSET :offset");
		$query->bindParam(':limit', $limit, PDO::PARAM_INT);
		$query->bindParam(':offset', $offset, PDO::PARAM_INT);
		$query->execute();
		return $query->fetchAll();
	}
	public function modelGetProducts($categoryId)
	{
		$conn = Connection::getInstance();
		$query = $conn->prepare("SELECT * FROM products WHERE category_id IN (SELECT id FROM categories WHERE id = :category_id OR parent_id = :category_id) ORDER BY id DESC");
		$query->execute(['category_id' => $categoryId]);
		return $query->fetchAll();
	}


	public function modelRead($recordPerPage)
	{
		$category_id = isset($_GET["category_id"]) && is_numeric($_GET["category_id"]) ? $_GET["category_id"] : 0;
		//lay bien page truyen tu url
		$page = isset($_GET["page"]) && is_numeric($_GET["page"]) && $_GET["page"] > 0 ? $_GET["page"] - 1 : 0;
		//lay tu ban ghi nao
		$from = $page * $recordPerPage;
		//---
		$sqlOrder = " order by id desc ";
		//lay bien order truyen tu url
		$order = isset($_GET["order"]) ? $_GET["order"] : "";
		switch ($order) {
			case "priceAsc":
				$sqlOrder = " order by price asc ";
				break;
			case "priceDesc":
				$sqlOrder = " order by price desc ";
				break;
			case "nameAsc":
				$sqlOrder = " order by name asc ";
				break;
			case "nameDesc":
				$sqlOrder = " order by name desc ";
				break;
		}
		//---
		//lay bien ket noi
		$conn = Connection::getInstance();
		$query = $conn->query("select * from products where category_id in (select id from categories where id=$category_id or parent_id=$category_id) $sqlOrder limit $from,$recordPerPage");
		//lay tat ca ket qua tra ve
		$result = $query->fetchAll();
		//---
		return $result;
	}
	//ham tinh tong so ban ghi
	public function modelTotal()
	{
		$category_id = isset($_GET["category_id"]) && is_numeric($_GET["category_id"]) ? $_GET["category_id"] : 0;
		//lay bien ket noi
		$conn = Connection::getInstance();
		$query = $conn->query("select id from products where category_id in (select id from categories where id=$category_id or parent_id=$category_id)");
		//ham rowCount: dem so ket qua tra ve
		return $query->rowCount();
	}
	//lay mot ban ghi tuong ung voi id truyen vao
	public function modelGetRecord($id)
	{
		//lay bien ket noi
		$conn = Connection::getInstance();
		$query = $conn->query("select * from products where id=$id");
		//tra ve mot ban ghi
		return $query->fetch();
	}
	//lay mot ban ghi tuong ung voi id truyen vao
	public function getCategory($category_id)
	{

		//lay bien ket noi
		$conn = Connection::getInstance();
		$query = $conn->query("select name from categories where id=$category_id");
		$record = $query->fetch();
		return $query->rowCount() > 0 ? $record->name : "";
	}
	public function modelAddComment($productId, $comment, $rating, $customerId)
	{
		// Khi đăng nhập thành công


		$conn = Connection::getInstance();
		$query = $conn->prepare("INSERT INTO comments (product_id, customer_id, comment, rating, created_at) VALUES (:product_id, :customer_id, :comment, :rating, NOW())");
		$query->execute([
			'product_id' => $productId,
			'customer_id' => $customerId,  // Truyền đúng customer_id
			'comment' => $comment,
			'rating' => $rating
		]);
	}


	public function modelGetComments($productId)
	{
		$conn = Connection::getInstance();
		$query = $conn->prepare("
		SELECT c.comment, c.rating, c.created_at, c.admin_reply, cu.name AS customer_name
		FROM comments c
		LEFT JOIN customers cu ON c.customer_id = cu.id
		WHERE c.product_id = :product_id
		ORDER BY c.created_at DESC
	");
		$query->execute(['product_id' => $productId]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}



	// Thêm vào trong ProductsModel
	public function modelGetCustomerName($customerId)
	{
		$conn = Connection::getInstance();
		$query = $conn->prepare("SELECT name FROM customers WHERE id = :customer_id");
		$query->execute(['customer_id' => $customerId]);
		$result = $query->fetch();

		// Kiểm tra xem có dữ liệu không và trả về tên khách hàng
		return $result ? $result->name : 'Khách hàng không xác định';
	}
	public function getCommentsByProductId($product_id)
	{
		$sql = "SELECT * FROM comments WHERE product_id = :product_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);  // Đảm bảo trả về mảng đối tượng
	}
}
