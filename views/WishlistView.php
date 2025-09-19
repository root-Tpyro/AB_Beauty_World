<?php
//load LayoutTrangChu.php
$this->layoutPath = "LayoutTrangTrong.php";
?>
<h3>Sản phẩm yêu thích</h3>
<div class="template-cart">
  <div class="table-responsive">
    <table class="table table-cart">
      <thead>
        <tr>
          <th class="image">Ảnh sản phẩm</th>
          <th class="name" style="width: 300px;">Tên sản phẩm</th>
          <th style="width: 50px;">Xóa</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($wishlist)): ?>
          <?php foreach ($wishlist as $product): ?>
            <tr>
              <td><img src="assets/upload/products/<?php echo $product->image; ?>" class="img-responsive" /></td>
              <td><a href="index.php?controller=products&action=detail&id=<?php echo $product->product_id; ?>"><?php echo $product->productName; ?></a></td>
              <td><a href="index.php?controller=wishlist&action=delete&id=<?php echo $product->product_id; ?>"><i class="fa fa-trash"></i></a></td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
          <tr>
            <td colspan="3" style="color: red; text-align: center;">Danh sách yêu thích của bạn đang trống.</td>
          </tr>

          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>


<?php
// Lấy từ session
$toastMessage = $_SESSION['toast_message'] ?? null;
unset($_SESSION['toast_message']);
?>

<!-- Gán toastMessage từ PHP -->
<script>
  window.toastMessage = <?= json_encode($toastMessage); ?>;
</script>


<!-- Div mount React -->
<div id="toast-root"></div>

<!-- Nhúng đúng file React đã build -->
<script type="module" src="/MediaMart/vite-project/dist/assets/index-B0ersNw9.js"></script>