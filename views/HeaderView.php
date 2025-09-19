<style>
  .my-search-box {
    position: relative;
    width: 100%;
    max-width: 530px;
    margin-bottom: 55px;

  }

  .my-search-input {
    width: 100%;
    height: 53px !important;
    padding: 0 60px 0 12px;
    /* chừa khoảng bên phải cho nút */
    border: 1px solid #000;
    border-radius: 6px;
    font-size: 14px;
    outline: none;
    box-sizing: border-box;
  }



  .my-search-box .my-search-input {
    width: 100%;
    height: 45px;
    /* padding: 0 60px 0 12px; */
    /* chừa khoảng bên phải cho nút */
    border: 1px solid #000;
    border-radius: 6px;
    font-size: 14px;
    outline: none;
    box-sizing: border-box;
  }

  .my-search-box .my-search-btn i {
    font-size: 10px;
    /* chỉnh icon nhỏ lại */
  }

  .my-search-box .my-search-btn {
    position: absolute;

    right: 4px;

    top: 50%;
    /* đặt giữa container theo trục dọc */
    transform: translateY(-50%);
    /* kéo icon lên đúng giữa */
    height: 45px;
    width: 60px;
    background: #000;
    border: 1px solid #000;

    /* bo góc phải cho đẹp */
    color: #fff !important;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
  }


  /* ----------------------------------------------------------- */
  html,
  body {
    margin: 0;
    padding: 0;
    width: 100%;
  }

  .mid-header {
    background-color: #080808;
    /* nền đen phủ full */
    width: 100%;
    height: 150px;

  }

  .mid-header-container {
    max-width: 1400px;
    /* giữ nội dung gọn trong khung */
    margin: 0 auto;
    /* căn giữa */
    padding: 0 20px;
    width: 100%;
  }

  .mid-header-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
  }

  .header-search {
    flex: 1;
    /* để ô tìm kiếm chiếm hết không gian trống */
  }

  .mid-header .row {
    display: flex;
    align-items: center;
    /* căn giữa theo chiều dọc */
  }

  .logo {
    display: flex;
    justify-content: center;
    /* căn giữa ngang logo trong cột */
    align-items: center;
    /* căn giữa dọc logo trong cột */
    height: 140px;
    /* chiều cao bằng header */
  }

  .logo img {
    max-height: 100px;
    /* giữ giới hạn chiều cao */
    width: auto;
    margin: 0px 0px 0px 0px;
  }


  /*
  /* Input */
  .custom-search-box .custom-input {
    width: 100%;
    padding: 10px 50px 10px 14px;
    height: 53px;
    border: 1px solid #ddd;
    border-radius: 6px;
    background: #fff;
    font-size: 14px;
    outline: none;
    box-sizing: border-box;
  }

  .custom-search-box .custom-input::placeholder {
    color: #9a9a9a;
    font-style: italic;
  }

  /* Button */
  .custom-search-box {
    position: relative;
    /* bắt buộc để nút bám vào trong khung */
    display: inline-block;
    width: 100%;
    /* hoặc width theo thiết kế */
    max-width: 500px;
  }




  .custom-search-box .custom-btn {
    position: absolute;
    /* right: 115px; */

    transform: translateY(-50%);
    height: 44px;
    width: 70px;
    border-radius: 6px;
    background: #000;
    border: 1px solid #fff;
    color: #fff t;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 2;

  }

  /* ------------------ */
  .header-right-vertical {
    display: flex;
    align-items: center;
    gap: 25px;
    position: relative;
    right: 250px;
    top: -30px;
    /* dịch qua trái */
  }

  .header-right-vertical .item a {
    display: flex;
    align-items: center;
    font-size: 19px !important;
    text-decoration: none;
    color: rgba(255, 215, 0, 0.8);
    /* vàng #FFD700 nhưng nhạt bớt */
  }

  .header-right-vertical .item a:hover {
    color: #FFD700;
    /* khi hover thì vàng đậm hơn */
    opacity: 1;
  }


  .header-right-vertical .item i {
    margin-right: 6px;
    /* khoảng cách giữa icon và chữ */
    font-size: 18px;
  }

  .cart-count {
    position: absolute;
    top: -5px;
    right: -10px;
    background: red;
    color: #fff;
    border-radius: 50%;
    font-size: 12px;
    padding: 2px 6px;
  }

  .header-account {
    color: #FFD700;
    /* Vàng */
    opacity: 0.6;
    /* Làm nhạt màu */
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 6px;
    cursor: pointer;
  }

  .yellow-text i {
    color: #FFD700;
    /* Màu vàng */
    opacity: 0.8;
    /* Nhạt giống chữ */
    font-size: 20px;
    /* Tăng kích thước cho rõ */
    font-weight: bold;
    /* Tạo cảm giác dày hơn */
    transition: opacity 0.2s;
  }

  .yellow-text:hover i {
    opacity: 1;
    /* Hover sáng lên */
  }


  /* Icon cũng nhạt theo */
  .yellow-text i {
    font-size: 18px;
  }


  .header-account:hover {
    opacity: 1;
    /* Khi hover sẽ rõ hơn */
  }

  .header-right-vertical .item a span {
    display: flex;
    flex-direction: column;
    /* chữ xếp dọc */
    line-height: 1.4;
    /* khoảng cách giữa các dòng */
    text-align: left;
    /* canh trái chữ */
  }

  .header-right-vertical .item a {
    display: flex;
    align-items: flex-start;
    /* icon nằm trên cùng với chữ */
    gap: 6px;
    text-decoration: none;
    color: rgba(255, 215, 0, 0.8);
  }

  .header-right-vertical .item a:hover {
    color: #FFD700;
  }

  .header-right-vertical .item i {
    font-size: 20px;
    margin-top: 3px;
    /* đẩy icon xuống một chút cho cân */
  }

  .account-text {
    display: flex;
    flex-direction: column;
    font-size: 13px;
    line-height: 1.3;
    text-align: left;
  }


  .header-right-vertical .item a .vertical-text {
    display: flex;
    flex-direction: column;
    /* xếp dọc */
    justify-content: center;
    /* canh giữa theo chiều dọc so với icon */
    line-height: 1.05;
    font-size: 13px;
    /* điều chỉnh cho vừa */
    text-align: left;
    /* căn trái trong khung text */
    white-space: normal;
    /* cho phép xuống dòng */
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<header id="header">

  <!-- top header -->


  <div class="mid-header">
    <div class="mid-header-container">
      <div class="mid-header-row">
        <div class="logo">
          <a href="index.php">
            <img src="assets/frontend/images/logo.png" alt="User" title="User">
          </a>
        </div>


        <div class="header-search">
          <div class="my-search-box">
            <input type="text" placeholder="Tìm sản phẩm bạn mong muốn..." class="my-search-input">
            <button type="submit" class="my-search-btn">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </div>


        <?php
        $numberProduct = 0;
        if (isset($_SESSION["cart"])) {
          foreach ($_SESSION["cart"] as $product) {
            $numberProduct++;
          }
        }
        ?>
        <div class="header-right-vertical">
          <!-- Tài khoản -->
          <!-- Tài khoản -->
          <div class="item">
            <a href="index.php?controller=account&action=login" class="yellow-text account-link">
              <i class="fa fa-user"></i>
              <span class="account-text">
                Đăng nhập / Đăng ký<br>
                <strong>Tài khoản của tôi</strong>
              </span>
            </a>
          </div>


          <!-- Giỏ hàng -->
          <div class="item">
            <a href="index.php?controller=cart" class="yellow-text">
              <i class="fa fa-shopping-cart"></i>
              <span>Giỏ<br>hàng</span>
              <span class="cart-count"><?php echo $numberProduct; ?></span>
            </a>
          </div>

          <!-- Kiểm tra đơn -->
          <div class="item">
            <a href="index.php?controller=orders" class="yellow-text">
              <i class="fa fa-clipboard-list"></i>
              <span>Kiểm tra<br>đơn hàng</span>
            </a>
          </div>
        </div>



      </div>
    </div>
  </div>

  <!-- bottom header -->
  <div class="bottom-header">
    <div class="container-custom">
      <ul class="main-nav">
        <?php
        // load danh mục cha (cấp 1)
        $categories = $this->modelGetCategories();
        foreach ($categories as $rows): ?>
          <li class="has-submenu">
            <a href="index.php?controller=products&action=categories&category_id=<?php echo $rows->id; ?>">
              <?php echo strtoupper($rows->name); ?>
              <?php
              // kiểm tra có danh mục con không
              $categoriesSub = $this->modelGetCategoriesSub($rows->id);
              if (!empty($categoriesSub)): ?>
                <i class="fa fa-caret-down" style="margin-left:5px;"></i>
              <?php endif; ?>
            </a>

            <?php if (!empty($categoriesSub)): ?>
              <ul class="submenu">
                <?php foreach ($categoriesSub as $rowsSub): ?>
                  <li>
                    <a href="index.php?controller=products&action=categories&category_id=<?php echo $rowsSub->id; ?>">
                      <?php echo $rowsSub->name; ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <script>
    function checkLogin() {
      var isLoggedIn = <?php echo isset($_SESSION['customer_email']) ? 'true' : 'false'; ?>;
      if (!isLoggedIn) {
        window.location.href = "index.php?controller=account&action=login";
        return false;
      } else {
        window.location.href = "index.php?controller=wishlist";
      }
    }
  </script>


  <style>
    .bottom-header {
      background: #F8E21C;
      border-top: 2px solid #000;
      border-bottom: 2px solid #000;
    }

    .container-custom {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 15px;
    }

    .main-nav {
      list-style: none;
      display: flex;
      margin: 0;
      padding: 0;
    }

    .main-nav li {
      position: relative;
    }

    .main-nav a {
      display: block;
      padding: 14px 18px;
      text-decoration: none;
      color: #000;
      font-weight: bold;
      font-size: 14px;
      text-transform: uppercase;
    }

    .main-nav li:hover {
      background: #000;
    }

    .main-nav li:hover a {
      color: #F8E21C;
    }

    /* submenu */
    .submenu {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      min-width: 220px;
      background: #fff;
      list-style: none;
      padding: 0;
      margin: 0;
      border: 1px solid #ccc;
      z-index: 999;
    }

    .submenu li a {
      padding: 10px 15px;
      font-weight: normal;
      color: #000;
      text-transform: none;
    }

    .submenu li a:hover {
      background: #f0f0f0;
      color: #000;
    }

    .has-submenu:hover .submenu {
      display: block;
    }
  </style>











  </div>
  <!-- end bottom header -->
</header>