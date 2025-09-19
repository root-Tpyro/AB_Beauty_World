<?php
//load LayoutTrangTrong.php
$this->layoutPath = "LayoutTrangTrong.php";
?>
<style>
  .form-group {
    margin-bottom: 20px;
  }

  .form-group label {
    font-weight: bold;
    display: block;
    margin-bottom: 6px;
  }

  .form-group label b#req {
    color: red;
    margin-left: 3px;
  }

  .input-control {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 14px;
    outline: none;
    transition: all 0.2s ease;
  }

  .input-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 4px rgba(0, 123, 255, 0.25);
  }

  /* bỏ text-align: center khỏi toàn bộ form */
  .form-group {
    margin-bottom: 20px;
    text-align: left;
    /* label + input căn trái gọn gàng */
  }

  /* chỉ căn giữa nút */
  .button {
    display: inline-block;
    padding: 12px 60px;
    /* thay vì 12px 40px */
    width: 150px;
    background: #007bff;
    border: none;
    border-radius: 25px;
    color: #fff;
    font-size: 15px;
    cursor: pointer;
    margin: 20px auto 0;
    /* tự động căn giữa */
    transition: background 0.2s;
    font-weight: bold;
  }

  /* dùng block + margin auto để nút ra giữa */
  form .button {
    display: block;
  }


  .title span {
    font-weight: 700;
    font-size: 20px;
    color: #222;
  }

  .register-link {
    margin-top: 25px;
    font-size: 14px;
    padding-bottom: 20px;
    text-align: center;
  }

  .register-link a {
    color: #007bff;
    font-weight: bold;
    text-decoration: none;
  }

  .register-link a:hover {
    text-decoration: underline;
  }
</style>

<div class="template-customer">
  <?php if (isset($_GET["notify"]) && $_GET["notify"] == "exists"): ?>
    <p style="color:red; font-weight:bold;">Email đã tồn tại!</p>
  <?php elseif (isset($_GET["notify"]) && $_GET["notify"] == "checkmail"): ?>
    <p style="color:green; font-weight:bold;">Đăng ký thành công! Vui lòng kiểm tra email để xác minh tài khoản.</p>
  <?php endif; ?>

  <div class="row" style="margin-top:50px; justify-content:center;">
    <div class="col-md-9">
      <div class="wrapper-form">
        <form method="post" action="index.php?controller=account&action=registerPost">
          <input name="__RequestVerificationToken" type="hidden" value="token_here" />

          <p class="title"><span>Đăng ký tài khoản</span></p>

          <!-- Họ tên -->
          <div class="form-group">
            <label>Họ và tên:</label>
            <input type="text" name="name" class="input-control" placeholder="Nhập họ và tên">
          </div>

          <!-- Email -->
          <div class="form-group">
            <label>Email:<b id="req">*</b></label>
            <input type="email" name="email" class="input-control" placeholder="Nhập email" required>
          </div>

          <!-- Địa chỉ -->
          <div class="form-group">
            <label>Địa chỉ:</label>
            <input type="text" name="address" class="input-control" placeholder="Nhập địa chỉ">
          </div>

          <!-- Điện thoại -->
          <div class="form-group">
            <label>Điện thoại:</label>
            <input type="text" name="phone" class="input-control" placeholder="Nhập số điện thoại">
          </div>

          <!-- Mật khẩu -->
          <div class="form-group">
            <label>Mật khẩu:<b id="req">*</b></label>
            <input type="password" name="password" class="input-control" placeholder="Nhập mật khẩu" required>
          </div>

          <!-- Nút đăng ký -->
          <input type="submit" class="button" value="Đăng ký">

          <!-- Link đăng nhập -->
          <p class="register-link">
            Bạn đã có tài khoản?
            <a href="index.php?controller=account&action=login">ĐĂNG NHẬP NGAY</a>
          </p>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
// Toast notification
$toastMessage = $_SESSION['toast_message'] ?? null;
$toastType = $_SESSION['toast_type'] ?? null;
unset($_SESSION['toast_message'], $_SESSION['toast_type']);
?>

<script>
  window.toastMessage = <?= json_encode($toastMessage) ?>;
  window.toastType = <?= json_encode($toastType) ?>;
</script>

<div id="toast-root"></div>
<script type="module" src="/MediaMart/vite-project/dist/assets/index-BnlVD72Y.js"></script>