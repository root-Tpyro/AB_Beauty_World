<!doctype html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="content-language" content="vi" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="robots" content="noodp,index,follow" />
  <meta name="revisit-after" content="1 days" />
  <meta name="keywords" content="">
  <title>Media Mart</title>
  <link rel="canonical" href="index.html">
  <!-- CSS -->


  <!-- JS -->


</head>
<style>
  .container {
    max-width: 1400px !important;

    width: 100%;
  }
</style>

<body class="index">
  <!-- header -->
  <?php
  // Load MVC -> controller
  include "controllers/HeaderController.php";
  $obj = new HeaderController();
  $obj->index();
  ?>
  <!-- end header -->

  <div class="content">
    <div class="container">
      <h1 style="display:none;">User</h1>
      <div class="row">
        <div class="col-md-12">
          <!-- slide -->
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active"><img src="assets/frontend/images/banner2.png" alt="Ảnh 1"></div>
              <div class="item"><img src="assets/frontend/images/banner3.png" alt="Ảnh 2"></div>
              <div class="item"><img src="assets/frontend/images/banner4.png" alt="Ảnh 3"></div>
            </div>
          </div>
          <!-- end slide -->
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-md-12">
          <!-- main -->
          <?php if (isset($this) && property_exists($this, 'view')) {
            echo $this->view;
          } ?>
          <!-- end main -->
        </div>
      </div>
    </div>
  </div>

  <!-- Services -->
  <div class="privacy">
    <div class="container">
      <style>
        .service-box {
          text-align: center;
          padding: 30px 10px;
          border-radius: 10px;
          transition: all 0.3s ease;
        }

        .service-icon {
          width: 80px;
          height: 80px;
          margin: 0 auto 20px;
          background: #f2f2f2;
          border-radius: 50%;
          display: flex;
          align-items: center;
          justify-content: center;
        }

        .service-icon img {
          width: 40px;
          height: 40px;
        }

        .service-box:hover {
          background-color: #fafafa;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .service-title {
          font-weight: 600;
          font-size: 16px;
          margin-bottom: 10px;
          color: #333;
        }

        .service-desc {
          font-size: 14px;
          color: #666;
        }
      </style>

      <div class="row text-center">
        <div class="col-sm-4">
          <div class="service-box">
            <div class="service-icon">
              <img src="assets/frontend/100/047/633/themes/517833/assets/ico-service-1221b.png" alt="Giao hàng miễn phí">
            </div>
            <div class="service-title">Giao hàng miễn phí</div>
            <div class="service-desc">Miễn phí giao hàng trong nội thành Hà Nội</div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="service-box">
            <div class="service-icon">
              <img src="assets/frontend/100/047/633/themes/517833/assets/ico-service-2221b.png" alt="Khuyến mại">
            </div>
            <div class="service-title">Khuyến mại</div>
            <div class="service-desc">Khuyến mại sản phẩm nếu đơn hàng trên 1.000.000đ</div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="service-box">
            <div class="service-icon">
              <img src="assets/frontend/100/047/633/themes/517833/assets/ico-service-3221b.png" alt="Hoàn trả lại tiền">
            </div>
            <div class="service-title">Hoàn trả lại tiền</div>
            <div class="service-desc">Nếu sản phẩm không đảm bảo chất lượng hoặc không đúng miêu tả</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer id="footer">
    <div class="top-footer">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-3">
            <h3>THÔNG TIN AB Beauty World</h3>
            <ul class="list-unstyled">
              <li><a href="https://mediamart.vn/he-thong-sieu-thi">Hệ thống 350 Siêu thị</a></li>
              <li><a href="https://mediamart.vn/thong-tin-chung/gioi-thieu-cong-ty">Giới thiệu công ty</a></li>
              <li><a href="https://mediamart.vn/tuyen-dung">Tuyển dụng</a></li>
              <li><a href="https://mediamart.vn/chinh-sach-chung/quy-dinh-thanh-toan">Phương thức thanh toán</a></li>
            </ul>
          </div>

          <div class="col-xs-12 col-sm-3">
            <h3>HỖ TRỢ KHÁCH HÀNG</h3>
            <ul class="list-unstyled">
              <li><a href="https://mediamart.vn/ho-tro-mua-hang/huong-dan-mua-hang-online">Hướng dẫn mua hàng Online</a></li>
              <li><a href="https://mediamart.vn/uu-dai-tra-gop">Mua hàng trả góp</a></li>
              <li><a href="https://mediamart.vn/chinh-sach-chung/chinh-sach-doi-tra-hang">Chính sách đổi trả</a></li>
              <li><a href="https://mediamart.vn/chinh-sach-chung/chinh-sach-giao-nhan">Giao hàng & lắp đặt</a></li>
              <li><a href="https://mediamart.vn/chinh-sach-chung/quy-dinh-bao-mat">Chính sách bảo mật</a></li>
              <li><a href="https://tracuuhoadon.mediamart.com.vn/">In hóa đơn điện tử</a></li>
            </ul>
          </div>

          <div class="col-xs-12 col-sm-3">
            <h3>TỔNG ĐÀI HỖ TRỢ</h3>
            <ul class="list-unstyled">
              <li><a href="tel:19006788">Bán hàng: 1900 6788</a></li>
              <li><a href="tel:19006743">Bảo hành: 1900 6743</a></li>
              <li><a href="tel:19006741">Khiếu nại: 1900 6741</a></li>
            </ul>
          </div>

          <div class="col-xs-12 col-sm-3">
            <h3>Theo dõi AB Beauty World</h3>
            <ul class="list-unstyled">
              <li>
                <a href="https://www.facebook.com/DienmayMediaMart"><img src="assets/frontend/images/fb.png" alt="Facebook"></a>
                <a href="https://www.youtube.com/c/CongtyMediamart"><img src="assets/frontend/images/yt.png" alt="YouTube"></a>
                <a href="https://www.tiktok.com/@mediamart.official"><img src="assets/frontend/images/tt.png" alt="TikTok"></a>
              </li>
              <li style="margin-top: 15px">
                <a href="https://apps.apple.com/vn/app/mediamartvn/id1572630752">
                  <img style="width:45%" src="https://cdn.mediamart.vn/images/menu/mediamart-ios-app_4b5435b9.png" alt="iOS App">
                </a>
                <a href="#">
                  <img style="width:45%" src="https://cdn.mediamart.vn/images/menu/mediamart-android-app_0f2f434d.png" alt="Android App">
                </a>
              </li>
            </ul>
          </div>
        </div>

        <div class="payments-method">
          <img src="assets/frontend/100/047/633/themes/517833/assets/payments-method221b.png?1481775169361" alt="Phương thức thanh toán">
        </div>
      </div>
    </div>

    <div class="bottom-footer">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-5">© Bản quyền MediaMart</div>
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

  <!-- Scripts -->

</body>

</html>