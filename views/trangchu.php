<?php
session_start();

// Mô phỏng login form và xử lý POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($email === 'user@example.com' && $password === '123456') {
        $_SESSION['toast_message'] = '✅ Đăng nhập thành công!';
        $_SESSION['toast_type'] = 'success';
    } else {
        $_SESSION['toast_message'] = '❌ Sai email hoặc mật khẩu!';
        $_SESSION['toast_type'] = 'error';
    }
    header('Location: index.php');
    exit;
}

// Lấy dữ liệu toast từ session
$toastMessage = $_SESSION['toast_message'] ?? null;
$toastType = $_SESSION['toast_type'] ?? null;
unset($_SESSION['toast_message'], $_SESSION['toast_type']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Test React Toast with PHP</title>
</head>

<body>
    <h1>Login Form</h1>
    <form method="POST" action="">
        Email: <input type="email" name="email" required /><br />
        Password: <input type="password" name="password" required /><br />
        <button type="submit">Login</button>
    </form>

    <script>
        window.toastMessage = <?= json_encode($toastMessage) ?>;
        window.toastType = <?= json_encode($toastType) ?>;
        console.log("🐘 PHP gửi toast:", window.toastMessage, window.toastType);
    </script>

    <div id="toast-root"></div>
    <script type="module" src="./toastApp.js"></script>
</body>

</html>