<?php
trait AccountModel
{
	public function modelRegister()
	{
		$name = $_POST["name"];
		$email = $_POST["email"];
		$address = $_POST["address"];
		$phone = $_POST["phone"];
		$password = $_POST["password"];
		//kiểm tra nếu email không tồn tại trong bảng customers thì insert
		$conn = Connection::getInstance();
		$check = $conn->prepare("select id from customers where email=:var_email");
		$check->execute(array("var_email" => $email));
		if ($check->rowCount() == 0) {
			$password = md5($password);
			$token = md5(uniqid(rand(), true)); // tạo token xác minh ngẫu nhiên

			// Lưu tài khoản kèm token
			$query = $conn->prepare("insert into customers set name=:var_name,email=:var_email,address=:var_address,phone=:var_phone,password=:var_password,verify_token=:token,is_verified=0");
			$query->execute(array(
				"var_name" => $name,
				"var_email" => $email,
				"var_address" => $address,
				"var_phone" => $phone,
				"var_password" => $password,
				"token" => $token
			));

			// Gửi email xác minh
			require("PHPMailer-master/src/PHPMailer.php");
			require("PHPMailer-master/src/SMTP.php");
			require("PHPMailer-master/src/Exception.php");


			$mail = new PHPMailer\PHPMailer\PHPMailer();
			$mail->IsSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'ssl';
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 465;
			$mail->IsHTML(true);
			$mail->Username = "giang8b07@gmail.com";
			$mail->Password = "zokdgmreyavloevy";
			$mail->SetFrom("giang8b07@gmail.com", "MediaMart");
			$mail->AddAddress($email);

			$mail->CharSet = "UTF-8"; // ✔️ Giúp hiển thị tiếng Việt đúng
			$mail->Subject = "=?UTF-8?B?" . base64_encode("Xác nhận tài khoản") . "?=";
			$mail->Subject = "Xác nhận tài khoản của bạn tại MediaMart";
			$verifyLink = "http://localhost:8080/MediaMart/index.php?controller=account&action=verify&token=$token";

			$mail->Body = '
					<div style="font-family: Arial, sans-serif; max-width: 600px; margin: auto; padding: 30px; border: 1px solid #eee; border-radius: 10px; background-color: #fafafa;">
						<h2 style="color: #2c3e50;">🛒 MediaMart - Xác minh tài khoản</h2>
						<p style="font-size: 16px; color: #333;">
							Chào bạn,
						</p>
						<p style="font-size: 16px; color: #333;">
							Cảm ơn bạn đã đăng ký tài khoản tại <strong>MediaMart</strong>. Vui lòng nhấn nút bên dưới để xác minh email và kích hoạt tài khoản của bạn.
						</p>
						<div style="text-align: center; margin: 30px 0;">
							<a href="' . $verifyLink . '" 
							   style="background-color: #007bff; color: #fff; padding: 12px 24px; text-decoration: none; font-size: 16px; border-radius: 5px; display: inline-block;" 
							   onmouseover="this.style.backgroundColor=\'#e83e8c\'" 
							   onmouseout="this.style.backgroundColor=\'#007bff\'">
								Xác minh tài khoản
							</a>
						</div>
						<p style="font-size: 14px; color: #666;">
							Nếu bạn không thực hiện yêu cầu này, vui lòng bỏ qua email này.
						</p>
						<p style="font-size: 14px; color: #999; text-align: center; margin-top: 40px;">
							&copy; ' . date("Y") . ' MediaMart. Mọi quyền được bảo lưu.
						</p>
					</div>';


			if ($mail->Send()) {
				header("location:index.php?controller=account&action=register&notify=checkmail");
			} else {
				echo "Lỗi gửi mail: " . $mail->ErrorInfo;
			}
		} else {
			header("location:index.php?controller=account&action=register&notify=exists");
		}
	}

	public function modelLogin()
	{
		$email = $_POST["email"];
		$password = md5($_POST["password"]);
		$conn = Connection::getInstance();

		// 👇 Lấy thêm `name` luôn cho tiện
		$query = $conn->prepare("SELECT id, email, name FROM customers WHERE email = :email AND password = :password");
		$query->execute(["email" => $email, "password" => $password]);

		if ($query->rowCount() > 0) {
			$record = $query->fetch();
			$_SESSION["customer_email"] = $record->email;
			$_SESSION["customer_id"] = $record->id;
			$_SESSION["customer_name"] = $record->name; // 👈 Gán thêm tên người dùng

			return true;
		}
		return false;
	}

	public function modelVerify()
	{
		if (isset($_GET['token'])) {
			$token = $_GET['token'];
			$conn = Connection::getInstance();
			$query = $conn->prepare("SELECT id FROM customers WHERE verify_token = :token AND is_verified = 0");
			$query->execute(["token" => $token]);

			if ($query->rowCount() > 0) {
				$update = $conn->prepare("UPDATE customers SET is_verified = 1, verify_token = NULL WHERE verify_token = :token");
				$update->execute(["token" => $token]);
				$_SESSION["verify_message"] = "✅ Xác minh tài khoản thành công! Bạn có thể <a href='index.php?controller=account&action=login'>đăng nhập</a>.";
			} else {
				$_SESSION["verify_message"] = "❌ Token không hợp lệ hoặc tài khoản đã xác minh.";
			}
		} else {
			$_SESSION["verify_message"] = "❌ Thiếu token xác minh.";
		}
	}
}
