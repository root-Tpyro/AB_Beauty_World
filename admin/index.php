<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Load các file cốt lõi từ thư mục cha
include "../application/Connection.php";
include "../application/Controller.php";

// Lấy controller và action từ URL (mặc định: Home/index)
$controller = isset($_GET["controller"]) ? $_GET["controller"] : "Home";
$action = isset($_GET["action"]) ? $_GET["action"] : "index";

// Chuyển tên controller thành PascalCase (VD: customer-orders => CustomerOrders)
$controller = str_replace(' ', '', ucwords(strtolower(str_replace('-', ' ', $controller))));
$classController = $controller . "Controller";
$fileController = "controllers/" . $classController . ".php";

// Gọi controller nếu tồn tại
if (file_exists($fileController)) {
	include $fileController;
	$obj = new $classController();

	if (method_exists($obj, $action)) {
		$obj->$action();
	} else {
		echo "❌ Không tìm thấy phương thức '$action' trong controller '$classController'";
	}
} else {
	echo "❌ Không tìm thấy file controller '$fileController'.";
}
