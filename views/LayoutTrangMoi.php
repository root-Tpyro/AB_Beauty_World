<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="content-language" content="vi" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="robots" content="noodp,index,follow" />
    <meta name="revisit-after" content="1 days" />
    <title>Media Mart</title>
    <link rel="canonical" href="index.html">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Flex row */
        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        /* Grid cột chia 4 */
        .grid-4 {
            flex: 1 1 calc(25% - 20px);
        }

        .grid-3 {
            flex: 1 1 calc(33.333% - 20px);
        }

        .grid-2 {
            flex: 1 1 calc(50% - 20px);
        }

        .grid-1 {
            flex: 1 1 100%;
        }

        /* Slide cơ bản */
        .carousel {
            position: relative;
            overflow: hidden;
        }

        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease;
        }

        .carousel-item {
            min-width: 100%;
        }

        .carousel-item img {
            width: 100%;
            display: block;
        }

        /* Footer */
        footer {
            background: #f5f5f5;
            padding: 40px 20px;
        }

        .footer-row {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }

        .footer-col {
            flex: 1 1 25%;
        }

        .bottom-footer {
            text-align: center;
            padding: 15px;
            background: #ddd;
            margin-top: 20px;
        }
    </style>
</head>

<body class="index">
    <!-- header -->
    <?php
    include "controllers/HeaderController.php";
    $obj = new HeaderController();
    $obj->index();
    ?>
    <!-- end header -->

    <div class="content">
        <div class="container">
            <!-- slide -->
            <div class="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item"><img src="assets/frontend/images/banner2.png" alt="Ảnh 1"></div>
                    <div class="carousel-item"><img src="assets/frontend/images/banner3.png" alt="Ảnh 2"></div>
                    <div class="carousel-item"><img src="assets/frontend/images/banner4.png" alt="Ảnh 3"></div>
                </div>
            </div>
            <!-- end slide -->

            <!-- main -->
            <div class="main">
                <?php if (isset($this) && property_exists($this, 'view')) {
                    echo $this->view;
                } ?>
            </div>
            <!-- end main -->
        </div>
    </div>

    <!-- Services -->
    <div class="privacy">
        <div class="container">
            <div class="row">
                <div class="grid-3">
                    <div class="service-box">Giao hàng miễn phí</div>
                </div>
                <div class="grid-3">
                    <div class="service-box">Khuyến mại</div>
                </div>
                <div class="grid-3">
                    <div class="service-box">Hoàn trả lại tiền</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <style>
        footer {
            background: #f5f5f5;
            padding: 40px 20px;
        }

        .footer-row {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }

        .footer-col {
            flex: 1 1 25%;
            min-width: 220px;
        }

        .footer-col h3 {
            font-size: 16px;
            margin-bottom: 10px;
            color: #333;
        }

        .footer-col ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-col ul li {
            margin-bottom: 8px;
        }

        .footer-col ul li a {
            color: #666;
            text-decoration: none;
        }

        .footer-col ul li a:hover {
            color: #000;
        }

        .bottom-footer {
            border-top: 1px solid #ddd;
            margin-top: 30px;
            padding-top: 15px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .bottom-footer ul {
            list-style: none;
            display: flex;
            gap: 15px;
            padding: 0;
            margin: 0;
        }

        .bottom-footer a {
            color: #333;
            text-decoration: none;
        }
    </style>
    <footer>
        <div class="container">
            <div class="footer-row">
                <!-- Cột 1 -->
                <div class="footer-col">
                    <h3>THÔNG TIN AB Beauty World</h3>
                    <ul>
                        <li><a href="https://mediamart.vn/he-thong-sieu-thi">Hệ thống 350 Siêu thị</a></li>
                        <li><a href="https://mediamart.vn/thong-tin-chung/gioi-thieu-cong-ty">Giới thiệu công ty</a></li>
                        <li><a href="https://mediamart.vn/tuyen-dung">Tuyển dụng</a></li>
                        <li><a href="https://mediamart.vn/chinh-sach-chung/quy-dinh-thanh-toan">Phương thức thanh toán</a></li>
                    </ul>
                </div>

                <!-- Cột 2 -->
                <div class="footer-col">
                    <h3>HỖ TRỢ KHÁCH HÀNG</h3>
                    <ul>
                        <li><a href="https://mediamart.vn/ho-tro-mua-hang/huong-dan-mua-hang-online">Hướng dẫn mua hàng Online</a></li>
                        <li><a href="https://mediamart.vn/uu-dai-tra-gop">Mua hàng trả góp</a></li>
                        <li><a href="https://mediamart.vn/chinh-sach-chung/chinh-sach-doi-tra-hang">Chính sách đổi trả</a></li>
                        <li><a href="https://mediamart.vn/chinh-sach-chung/chinh-sach-giao-nhan">Giao hàng & lắp đặt</a></li>
                        <li><a href="https://mediamart.vn/chinh-sach-chung/quy-dinh-bao-mat">Chính sách bảo mật</a></li>
                        <li><a href="https://tracuuhoadon.mediamart.com.vn/">In hóa đơn điện tử</a></li>
                    </ul>
                </div>

                <!-- Cột 3 -->
                <div class="footer-col">
                    <h3>TỔNG ĐÀI HỖ TRỢ</h3>
                    <ul>
                        <li><a href="tel:19006788">Bán hàng: 1900 6788</a></li>
                        <li><a href="tel:19006743">Bảo hành: 1900 6743</a></li>
                        <li><a href="tel:19006741">Khiếu nại: 1900 6741</a></li>
                    </ul>
                </div>

                <!-- Cột 4 -->
                <div class="footer-col">
                    <h3>Theo dõi AB Beauty World</h3>
                    <div>
                        <a href="https://www.facebook.com/DienmayMediaMart"><img src="assets/frontend/images/fb.png" alt="Facebook"></a>
                        <a href="https://www.youtube.com/c/CongtyMediamart"><img src="assets/frontend/images/yt.png" alt="YouTube"></a>
                        <a href="https://www.tiktok.com/@mediamart.official"><img src="assets/frontend/images/tt.png" alt="TikTok"></a>
                    </div>
                    <div style="margin-top: 15px">
                        <a href="https://apps.apple.com/vn/app/mediamartvn/id1572630752">
                            <img style="width:45%" src="https://cdn.mediamart.vn/images/menu/mediamart-ios-app_4b5435b9.png" alt="iOS App">
                        </a>
                        <a href="#">
                            <img style="width:45%" src="https://cdn.mediamart.vn/images/menu/mediamart-android-app_0f2f434d.png" alt="Android App">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Thanh toán -->
            <div class="payments-method" style="margin:20px 0; text-align:center;">
                <img src="assets/frontend/100/047/633/themes/517833/assets/payments-method221b.png" alt="Phương thức thanh toán">
            </div>

            <!-- Bottom footer -->
            <div class="bottom-footer">
                <div class="footer-bottom-left">© Bản quyền MediaMart</div>
                <div class="footer-bottom-right">
                    <ul>
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Giới thiệu</a></li>
                        <li><a href="#">Tin tức</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>