<style>
  .Toastify__toast--success {
    background-color: white !important;
    color: black !important;
    /* Adjust text color to black for contrast */
    border: 2px solid #F8E21C !important;
    /* Add pink border */
  }

  .Toastify__toast--success .Toastify__toast-icon {
    color: #F8E21C !important;
    /* Keep the icon pink */
  }

  .Toastify__progress-bar--success {
    background-color: #F8E21C !important;
    /* Pink progress bar */
  }


  #fullScreenLoader {
    display: none;
    position: fixed;
    z-index: 9999;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: white;
    justify-content: center;
    align-items: center;
  }

  #fullScreenLoader .loader {
    width: 48px;
    height: 48px;
    border: 5px solid #cce5ff;
    border-top: 5px solid #007bff;
    border-radius: 50%;
    animation: spin 1s linear infinite;
  }

  @keyframes spin {
    to {
      transform: rotate(360deg);
    }
  }
</style>

<!doctype html>
<!--[if !IE]><!-->
<html lang="vi">
<!--<![endif]-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta http-equiv="content-language" content="vi" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="robots" content="noodp,index,follow" />
  <meta name='revisit-after' content='1 days' />
  <meta name="keywords" content="">
  <title>Media Mart</title>
  <link rel="shortcut icon" href="assets/frontend/100/047/633/themes/517833/assets/favicon221b.png" type="image/x-icon" />
  <link href='assets/frontend/100/047/633/themes/517833/assets/font-awesome.min221b.css?1481775169361' rel='stylesheet' type='text/css' />
  <link href='assets/frontend/100/047/633/themes/517833/assets/bootstrap.min221b.css?1481775169361' rel='stylesheet' type='text/css' />
  <link href='assets/frontend/100/047/633/themes/517833/assets/owl.carousel221b.css?1481775169361' rel='stylesheet' type='text/css' />
  <link href='assets/frontend/100/047/633/themes/517833/assets/responsive221b.css?1481775169361' rel='stylesheet' type='text/css' />
  <link href='assets/frontend/100/047/633/themes/517833/assets/styles.scss221b.css?1481775169361' rel='stylesheet' type='text/css' />
  <script src='assets/frontend/100/047/633/themes/517833/assets/jquery.min221b.js?1481775169361' type='text/javascript'></script>
  <script src='assets/frontend/100/047/633/themes/517833/assets/bootstrap.min221b.js?1481775169361' type='text/javascript'></script>
  <script src='assets/frontend/assets/themes_support/api.jquerya87f.js?4' type='text/javascript'></script>
  <link href='assets/frontend/100/047/633/themes/517833/assets/bw-statistics-style221b.css?1481775169361' rel='stylesheet' type='text/css' />
</head>

<body class="index">
  <!-- header -->
  <?php
  //load MVC bang tay -> load file controller
  include "controllers/HeaderController.php";
  $obj = new HeaderController();
  $obj->index();
  ?>
  <!-- end header -->
  <div class="content">
    <div class="container">
      <h1 style="display:none;">Media Mart</h1>
      <div class="row">
        <div class="col-xs-12 col-md-3">
          <!-- end support -->
          <!-- hot news -->

          <!-- end hot news -->
          <!-- adv -->

          <!-- end adv -->

        </div>
        <div class="col-xs-12 col-md-9">
          <!-- main -->

          <?php echo $this->view; ?>

          <!-- end main -->
        </div>
      </div>
      <!-- adv -->
      <!-- <div class="widebanner"> <a href="#"><img src="assets\frontend\images\banner8.png" alt="#" class="img-responsive"></a> </div> -->
      <!-- end adv -->

    </div>
  </div>

  <footer id="footer">
    <div class="top-footer">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-3">
            <h3>THÔNG TIN MEDIAMART</h3>
            <ul class="list-unstyled">
              <li><a href="https://mediamart.vn/he-thong-sieu-thi">Hệ thống 350 Siêu thị (8:00-21:30)</a></li>
              <li><a href="https://mediamart.vn/thong-tin-chung/gioi-thieu-cong-ty">Giới thiệu công ty</a></li>
              <li><a href="https://mediamart.vn/tuyen-dung">Tuyển dụng</a></li>
              <li><a href="https://mediamart.vn/chinh-sach-chung/quy-dinh-thanh-toan">Phương thức thanh toán</a></li>
            </ul>
          </div>
          <div class="col-xs-12 col-sm-3">
            <h3>Hỗ trợ khách hàng</h3>
            <ul class="list-unstyled">
              <li><a href="https://mediamart.vn/ho-tro-mua-hang/huong-dan-mua-hang-online">Hướng dẫn mua hàng Online</a></li>
              <li><a href="https://mediamart.vn/uu-dai-tra-gop">Mua hàng trả góp</a></li>
              <li><a href="https://mediamart.vn/chinh-sach-chung/chinh-sach-doi-tra-hang">Chính sách bảo hành, đổi trả</a></li>
              <li><a href="https://mediamart.vn/chinh-sach-chung/chinh-sach-giao-nhan">Giao hàng và lắp đặt</a></li>
              <li><a href="https://mediamart.vn/chinh-sach-chung/quy-dinh-bao-mat">Chính sách bảo mật TT cá nhân</a></li>
              <li><a href="https://tracuuhoadon.mediamart.com.vn/">In hóa đơn điện tử</a></li>
            </ul>
          </div>
          <div class="col-xs-12 col-sm-3">
            <h3>Tổng đài gọi hỗ trợ</h3>
            <ul class="list-unstyled">
              <li><a href="tel:19006788">Bán hàng: 1900 6788</a></li>
              <li><a href="tel:19006743">Bảo hành: 1900 6743</a></li>
              <li><a href="tel:19006741">Khiếu nại: 1900 6741</a></li>
            </ul>
          </div>
          <div class="col-xs-12 col-sm-3">
            <h3>Theo dõi AB Beauty World trên</h3>
            <ul class="list-unstyled">
              <li>
                <a style="margin-left: 10px" href="https://www.facebook.com/DienmayMediaMart" title="MediaMart Facebook Fanpage">
                  <img src="assets/frontend/images/fb.png" alt="MediaMart Facebook Fanpage">
                </a>
                <a style="margin-left: 10px" href="https://www.youtube.com/c/CongtyMediamart" title="MediaMart Youtube Channel">
                  <img src="assets/frontend/images/yt.png" alt="MediaMart Youtube Channel">
                </a>
                <a style="margin-left: 10px" href="https://www.tiktok.com/@mediamart.official" title="MediaMart Tiktok Channel">
                  <img src="assets/frontend/images/tt.png" alt="MediaMart Tiktok Channel">
                </a>
              </li>
              <h3 style="margin-top: 15px">Theo dõi AB Beauty World trên</h3>
              <li>
                <a href="https://apps.apple.com/vn/app/mediamartvn/id1572630752" title="MediaMart iOS App">
                  <img style="witdh: 45%" src="assets/frontend/images/ios.png" alt="MediaMart iOS App">
                </a>
                <a href="#" title="MediaMart Android App">
                  <img style="witdh: 45%" src="assets/frontend/images/chplay.png" alt="MediaMart Android App">
                </a>
              </li>
            </ul>

          </div>
        </div>
        <div class="payments-method"> <img src="assets/frontend/100/047/633/themes/517833/assets/payments-method221b.png?1481775169361" alt="Phương thức thanh toán" title="Phương thức thanh toán"> </div>
      </div>
    </div>
    <div class="bottom-footer">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-5"> © Bản quyền User</div>
          <div class="col-xs-12 col-sm-7">
            <ul class="list-unstyled">
              <li><a href="#">Trang chủ</a></li>
              <li><a href="#">Giới thiệu</a></li>
              <li><a href="#">Tin tức</a></li>
              <li><a href="#">Liên hệ</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src='assets/frontend/100/047/633/themes/517833/assets/owl.carousel.min221b.js?1481775169361' type='text/javascript'></script>
  <script src='assets/frontend/100/047/633/themes/517833/assets/responsive-menu221b.js?1481775169361' type='text/javascript'></script>
  <script src='assets/frontend/100/047/633/themes/517833/assets/elevate-zoom221b.js?1481775169361' type='text/javascript'></script>
  <script src='assets/frontend/100/047/633/themes/517833/assets/main221b.js?1481775169361' type='text/javascript'></script>
  <script src='assets/frontend/100/047/633/themes/517833/assets/ajax-cart221b.js?1481775169361' type='text/javascript'></script>

</body>

</html>


</body>

</html>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form[action*='cart&action=checkout']");
    const loader = document.getElementById("fullScreenLoader");

    if (form && loader) {
      form.addEventListener("submit", function() {
        loader.style.display = "flex"; // Hiện overlay loading
      });
    }
  });
</script>