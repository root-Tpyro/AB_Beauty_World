<?php


trait WishlistModel
{
	public function modelAdd($id)
	{
		if (!isset($_SESSION["customer_id"])) {
			return;
		}

		$customer_id = $_SESSION["customer_id"];

		// Kết nối database
		$conn = Connection::getInstance();

		// Kiểm tra sản phẩm đã có trong wishlist chưa
		$query = $conn->prepare("SELECT * FROM wishlists WHERE customer_id = :customer_id AND product_id = :product_id");
		$query->execute(["customer_id" => $customer_id, "product_id" => $id]);

		if ($query->rowCount() == 0) {
			// Nếu chưa có, lấy thông tin sản phẩm từ bảng products
			$query = $conn->prepare("SELECT * FROM products WHERE id = :id");
			$query->execute(["id" => $id]);
			$product = $query->fetch(PDO::FETCH_OBJ);

			if ($product) {
				// Thêm vào bảng wishlists
				$query = $conn->prepare("INSERT INTO wishlists (customer_id, product_id, productName, price, image) VALUES (:customer_id, :product_id, :productName, :price, :image)");
				$query->execute([
					"customer_id" => $customer_id,
					"product_id" => $id,
					"productName" => $product->name,
					"price" => $product->price,
					"image" => $product->photo
				]);
			}
		}
	}

	public function modelDelete($id)
	{
		if (!isset($_SESSION["customer_id"])) {
			return;
		}

		$customer_id = $_SESSION["customer_id"];
		$conn = Connection::getInstance();

		// Xóa sản phẩm khỏi wishlist
		$query = $conn->prepare("DELETE FROM wishlists WHERE customer_id = :customer_id AND product_id = :product_id");
		$query->execute(["customer_id" => $customer_id, "product_id" => $id]);
	}

	public function getWishlist()
	{
		if (!isset($_SESSION["customer_id"])) {
			return [];
		}

		$customer_id = $_SESSION["customer_id"];
		$conn = Connection::getInstance();

		// Lấy danh sách sản phẩm trong wishlist
		$query = $conn->prepare("SELECT * FROM wishlists WHERE customer_id = :customer_id");
		$query->execute(["customer_id" => $customer_id]);

		return $query->fetchAll(PDO::FETCH_OBJ);
	}
}
