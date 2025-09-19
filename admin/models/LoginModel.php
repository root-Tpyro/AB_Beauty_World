<?php

trait LoginModel
{
	public function modelLogin()
	{
		$email = $_POST["email"];
		$password = md5($_POST["password"]);

		// Lấy kết nối CSDL
		$conn = Connection::getInstance();
		$query = $conn->query("SELECT email, password FROM users WHERE email='$email'");

		if ($query->rowCount() > 0) {
			$record = $query->fetch();
			if ($record->password == $password) {
				$_SESSION["email"] = $email;
				header("location:index.php");
				exit();
			} else {
				echo '<script>alert("Bạn cần nhập đúng mật khẩu"); window.location.href="index.php?controller=login";</script>';
				exit();
			}
		} else {
			echo '<script>alert("Tài khoản không tồn tại!"); window.location.href="index.php?controller=login";</script>';
			exit();
		}
	}
}
