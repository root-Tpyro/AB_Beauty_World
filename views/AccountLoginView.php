<?php
//load LayoutTrangTrong.php
$this->layoutPath = "LayoutTrangTrong2.php";
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
    /* bo tròn nhẹ */
    font-size: 14px;
    outline: none;
    transition: all 0.2s ease;
  }

  .input-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 4px rgba(0, 123, 255, 0.25);
  }

  .remember-forgot label {
    text-transform: none !important;
    /* giữ nguyên kiểu chữ */
    font-size: 14px;
    /* chỉnh cho mềm hơn */
    color: #333;
    /* màu chữ đẹp hơn */
  }

  .remember-forgot {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 14px;
    margin-top: 8px;
  }

  .remember-forgot a {
    color: #007bff;
    text-decoration: none;
  }

  .remember-forgot a:hover {
    text-decoration: underline;
  }

  .button {
    display: block;
    /* block để margin auto hoạt động */
    margin: 20px auto 0;
    /* căn giữa */
    padding: 12px 50px;
    /* tăng padding ngang để nút dài hơn */
    background: #007bff;
    border: none;
    border-radius: 25px;
    color: #fff;
    font-size: 15px;
    cursor: pointer;
    transition: background 0.2s;
    font-weight: bold;
    width: auto;
    /* auto để theo nội dung + padding */
    min-width: 160px;
    /* tối thiểu 160px để cân đối */
    text-align: center;
  }


  .button:hover {
    background: #0056b3;
  }

  .form-group {
    margin-bottom: 28px;
    /* tăng từ 20px -> 28px */
  }

  .title span {
    font-weight: 700;
    /* đậm hơn */
    font-size: 20px;
    /* tăng size nếu muốn */
    color: #222;
    /* chữ rõ, đậm màu */
  }

  .register-link {
    margin-top: 25px;
    font-size: 14px;
    padding-bottom: 20px;
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
  <?php if (isset($_GET["notify"]) && $_GET["notify"] == "success"): ?>
    <p style="color: green; font-weight: bold;">Đăng ký thành công, vui lòng đăng nhập</p>
  <?php endif; ?>

  <div class="row" style="margin-top:50px;">
    <div class="col-md-9">
      <div class="wrapper-form">
        <form method="post" action="index.php?controller=account&action=loginPost">
          <input name="__RequestVerificationToken" type="hidden" value="token_here" />

          <p class="title"><span>Đăng nhập tài khoản</span></p>

          <!-- Email -->
          <div class="form-group">
            <label>Email:<b id="req">*</b></label>
            <input type="email" class="input-control" name="email" placeholder="Email" required>
          </div>

          <!-- Password -->
          <div class="form-group">
            <label>Mật khẩu:<b id="req">*</b></label>
            <input type="password" class="input-control" name="password" placeholder="Mật khẩu" required>

            <div class="remember-forgot" style="margin-top: 20px;">
              <label>
                <input type="checkbox" name="remember"> Nhớ mật khẩu
              </label>
              <a href="index.php?controller=account&action=forgot">Quên mật khẩu</a>
              <!-- </div> -->
            </div>

            <!-- Nút login -->
            <input type="submit" class="button" value="Đăng nhập">

            <!-- Đăng ký -->
            <p class="register-link">
              Bạn chưa có tài khoản?
              <a href="index.php?controller=account&action=register">ĐĂNG KÝ NGAY</a>
            </p>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
// Lấy từ session
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
<!-- Link Font Awesome (để lấy icon) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">