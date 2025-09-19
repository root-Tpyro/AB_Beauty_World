<?php
// load LayoutTrangMoi.php
$this->layoutPath = "LayoutTrangMoi.php";
?>
<style>
  /* ===== Reset ===== */
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  img {
    max-width: 100%;
    display: block;
  }

  /* ===== Container ===== */
  .special-collection {
    margin: 40px 0;
  }

  .tabs-container h2 {
    font-size: 22px;
    margin-bottom: 15px;
  }

  /* ===== Product Grid ===== */
  .product-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    gap: 20px;
  }

  .product-item {
    position: relative;
  }

  .product-grid {
    border: 1px solid #ddd;
    border-radius: 6px;
    overflow: hidden;
    background: #fff;
    transition: transform 0.3s ease;
    height: 350px;
  }

  .product-grid:hover {
    transform: translateY(-5px);
  }

  /* Ảnh */
  .product-grid .image img {
    width: 100%;
    height: 200px;
    object-fit: cover;
  }

  /* Info */
  .product-grid .info {
    padding: 10px;
  }

  .product-grid .name {
    font-size: 14px;
    margin: 5px 0;
  }

  .product-grid .price-box {
    font-size: 14px;
  }

  .old-price {
    text-decoration: line-through;
    color: #888;
  }

  .new-price {
    font-weight: bold;
    color: #d0021b;
  }

  /* Wishlist */
  .wishlist-btn {
    position: absolute;
    right: 10px;
    top: 10px;
  }

  .wishlist-btn a {
    display: inline-block;
    width: 36px;
    height: 36px;
    background: red;
    color: #fff;
    border-radius: 50%;
    text-align: center;
    line-height: 36px;
    font-size: 16px;
  }

  /* Discount Badge */
  .discount-badge {
    position: absolute;
    left: 10px;
    top: 10px;
    background: black;
    color: #fff;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    text-align: center;
    line-height: 30px;
    font-size: 12px;
  }

  /* Nút thêm giỏ */
  .action-btn .button {
    display: inline-block;
    background: #28a745;
    color: #fff;
    padding: 6px 10px;
    border-radius: 4px;
    text-decoration: none;
  }

  .action-btn .button:hover {
    background: #218838;
  }

  /* Banner */
  .widebanner img {
    width: 100%;
    margin: 20px 0;
  }
</style>
<!-- Sản phẩm hot -->
<div class="special-collection">
  <div class="tabs-container">
    <h2>SẢN PHẨM HOT</h2>
  </div>
  <div class="product-list">
    <?php
    $products = $this->modelHotProducts();
    foreach ($products as $rows):
    ?>
      <div class="product-item">
        <div class="discount-badge"><?php echo $rows->discount; ?>%</div>
        <div class="wishlist-btn">
          <a href="index.php?controller=wishlist&action=create&id=<?php echo $rows->id; ?>">
            <i class="fas fa-heart"></i>
          </a>
        </div>
        <div class="product-grid">
          <div class="image">
            <a href="#">
              <img src="assets/upload/products/<?php echo $rows->photo; ?>" alt="<?php echo $rows->name; ?>">
            </a>
          </div>
          <div class="info">
            <h3 class="name">
              <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>">
                <?php echo $rows->name; ?>
              </a>
            </h3>
            <p class="price-box">
              <span class="old-price"><?php echo number_format($rows->price); ?>₫</span>
            </p>
            <p class="price-box">
              <span class="new-price"><?php echo number_format($rows->price - ($rows->price * $rows->discount) / 100); ?>₫</span>
            </p>
            <p class="rating">
              <?php for ($i = 1; $i <= 5; $i++): ?>
                <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=<?php echo $i; ?>">
                  <img src="assets/frontend/images/star.jpg">
                </a>
              <?php endfor; ?>
            </p>
            <div class="action-btn">
              <a href="index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>" class="button">Thêm vào giỏ hàng</a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Banner -->
<div class="widebanner">
  <img src="assets/frontend/images/banner5.png" alt="Banner">
</div>

<!-- Danh mục sản phẩm -->
<?php
$categories = $this->modelGetCategories();
foreach ($categories as $rowsCategories):
?>
  <div class="special-collection">
    <div class="tabs-container">
      <h2><?php echo $rowsCategories->name; ?></h2>
    </div>
    <div class="product-list">
      <?php
      $products = $this->modelGetProducts($rowsCategories->id);
      foreach ($products as $rows):
      ?>
        <div class="product-item">
          <div class="discount-badge"><?php echo $rows->discount; ?>%</div>
          <div class="wishlist-btn">
            <a href="index.php?controller=wishlist&action=create&id=<?php echo $rows->id; ?>">
              <i class="fas fa-heart"></i>
            </a>
          </div>
          <div class="product-grid">
            <div class="image">
              <a href="#">
                <img src="assets/upload/products/<?php echo $rows->photo; ?>" alt="<?php echo $rows->name; ?>">
              </a>
            </div>
            <div class="info">
              <h3 class="name">
                <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>">
                  <?php echo $rows->name; ?>
                </a>
              </h3>
              <p class="price-box">
                <span class="old-price"><?php echo number_format($rows->price); ?>₫</span>
              </p>
              <p class="price-box">
                <span class="new-price"><?php echo number_format($rows->price - ($rows->price * $rows->discount) / 100); ?>₫</span>
              </p>
              <p class="rating">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                  <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=<?php echo $i; ?>">
                    <img src="assets/frontend/images/star.jpg">
                  </a>
                <?php endfor; ?>
              </p>
              <div class="action-btn">
                <a href="index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>" class="button">Thêm vào giỏ hàng</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endforeach; ?>

<!-- Banner 2 -->
<div class="widebanner">
  <img src="assets/frontend/images/banner8.png" alt="Banner">
</div>