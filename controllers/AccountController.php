<?php
//load file model
include "models/AccountModel.php";
class AccountController extends Controller
{
	//ke thua class model
	use AccountModel;
	public function register()
	{
		$this->loadView("AccountRegisterView.php");
	}
	public function registerPost()
	{

		//goi ham model de insert ban ghi
		$this->modelRegister();
	}
	public function login()
	{



		$this->loadView("AccountLoginView.php");
	}
	public function loginPost()
	{
		$result = $this->modelLogin();

		if ($result === true) {
			$_SESSION['toast_message'] = ' Đăng nhập thành công!';
			$_SESSION['toast_type'] = 'success'; // ← thêm dòng này
			header("location:index.php");
			exit;
		} else {
			$_SESSION['toast_message'] = ' Sai email hoặc mật khẩu!';
			$_SESSION['toast_type'] = 'error'; // ← thêm dòng này
			header("location:index.php?controller=account&action=login");
			exit;
		}
	}

	//dang xuat
	public function logout()
	{
		// Xóa toàn bộ thông tin đăng nhập của khách hàng
		unset($_SESSION["customer_email"]);
		unset($_SESSION["customer_id"]);
		unset($_SESSION["customer_name"]);

		// Nếu muốn xóa luôn tất cả session:
		// session_unset();
		// session_destroy();

		header("location:index.php");
	}

	public function verify()
	{
		// Gọi model xử lý xác minh
		$this->modelVerify();
		// Gọi view để hiển thị kết quả xác minh
		$this->loadView("verify.php");
	}
}
