<style>
  .admin-reply {
    margin-top: 15px;
    margin-left: 20px;
    padding: 10px;
    background-color: #f1f1f1;
    border-left: 4px solid #007bff;
    border-radius: 5px;
  }

  .admin-reply-header {
    font-weight: bold;
    margin-bottom: 5px;
    display: flex;
    align-items: center;
  }

  .admin-label {
    background-color: #007bff;
    color: #fff;
    font-size: 12px;
    padding: 2px 6px;
    border-radius: 4px;
    margin-right: 10px;
  }

  .reply-title {
    color: #333;
  }

  .admin-reply-content {
    margin-top: 5px;
    color: #444;
  }

  .admin-reply-time {
    font-size: 12px;
    color: #888;
    margin-top: 5px;
  }

  /* Cải thiện phần tiêu đề "Bình luận" */
  .comments-section h3 {
    color: #007bff;
    /* Màu xanh dương cho tiêu đề */
    font-size: 32px;
    /* Tăng kích thước chữ tiêu đề */
    font-weight: bold;
    /* Đậm chữ */
    margin-bottom: 20px;
    /* Thêm khoảng cách phía dưới */
    text-transform: uppercase;
    /* Chữ in hoa */
    letter-spacing: 2px;
    /* Khoảng cách giữa các chữ */
    border-bottom: 2px solid #007bff;
    /* Đường gạch dưới */
    padding-bottom: 10px;
    /* Thêm padding dưới để tạo khoảng cách */
  }

  /* Cải thiện phần bình luận */
  .comment {
    background-color: #f9f9f9;
    /* Màu nền nhẹ cho mỗi bình luận */
    border: 1px solid #ddd;
    /* Đường viền nhẹ quanh bình luận */
    padding: 15px;
    margin-bottom: 15px;
    border-radius: 8px;
    /* Bo góc cho bình luận */
  }

  .comment p {
    margin: 8px 0;
    /* Khoảng cách giữa các đoạn văn trong bình luận */
  }

  .comment strong {
    color: #333;
    /* Màu chữ đậm cho tên khách hàng và đánh giá */
  }

  /* Cải thiện phần textarea */
  textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    resize: vertical;
    /* Cho phép người dùng thay đổi kích thước textarea theo chiều dọc */
    font-size: 16px;
    min-height: 150px;
    /* Chiều cao tối thiểu của textarea */
    margin-bottom: 10px;
    /* Khoảng cách dưới textarea */
  }

  /* Cải thiện phần sao đánh giá */
  .star-rating {
    display: flex;
    justify-content: space-between;
    width: 200px;
    margin-bottom: 10px;
  }

  .star-rating input[type="radio"] {
    display: none;
  }

  .star-rating label {
    font-size: 30px;
    color: #ccc;
    /* Màu xám cho các sao chưa được chọn */
    cursor: pointer;
    transition: color 0.2s;
  }

  .star-rating input[type="radio"]:checked~label,
  .star-rating label:hover,
  .star-rating label:hover~label {
    color: gold;
    /* Màu vàng khi sao được chọn */
  }

  /* Cải thiện phần nút gửi bình luận */
  button {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  button:hover {
    background-color: #0056b3;
    /* Màu sắc khi hover vào nút */
  }

  /* Cải thiện phần hiển thị thông báo */
  p {
    font-size: 16px;
    color: #555;
  }

  a {
    color: #007bff;
    text-decoration: none;
  }

  a:hover {
    text-decoration: underline;
  }

  form .star-rating {
    margin-bottom: 20px;
  }

  form .star-rating input {
    display: none;
  }

  form .star-rating label {
    font-size: 24px;
    color: #ccc;
    cursor: pointer;
    transition: color 0.3s;
  }

  form .star-rating input:checked~label,
  form .star-rating label:hover,
  form .star-rating label:hover~label {
    color: gold;
  }

  form button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    font-size: 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  form button:hover {
    background-color: #0056b3;
  }

  /* Cải thiện phần chưa có bình luận */
  .comments-section p {
    font-size: 1.1em;
    color: #666;
  }

  .star-rating {
    direction: rtl;
    display: inline-flex;
    font-size: 24px;
  }

  .star-rating input[type="radio"] {
    display: none;
  }

  .star-rating label {
    color: #ccc;
    cursor: pointer;
    transition: color 0.2s;
  }

  .star-rating input[type="radio"]:checked~label,
  .star-rating label:hover,
  .star-rating label:hover~label {
    color: gold;
  }
</style>

<?php
//load LayoutTrangChu.php
$this->layoutPath = "LayoutTrangTrong.php";
?>
<div class="top">
  <div class="row">
    <div class="col-xs-12 col-md-6 product-image">
      <div class="featured-image">
        <img src="assets/upload/products/<?php echo $record->photo; ?>" style="width: 100%;" class="img-responsive" />
      </div>
      <!--
      <div class="box-image">
        <ul>
          <li><img src="assets/upload/products/132195017985165066_1.jpg" id="img-1"></li>
          <li><img src="assets/upload/products/132195018346013007_2.jpg" id="img-2"></li>
          <li><img src="assets/upload/products/132195018673480610_3.jpg" id="img-3"></li>
          <li><img src="assets/upload/products/132195019156699102_4.jpg" id="img-4"></li>
          <li><img src="assets/upload/products/132195019983557925_6.jpg" id="img-5"></li>
          <li><img src="assets/upload/products/132195020344748063_7.jpg" id="img-6"></li>
        </ul>
      </div>
      -->
      <script type="text/javascript">
        $(document).ready(function() {
          //---
          $("#img-1").click(function() {
            $(".featured-image img").fadeOut(function() {
              //lay duong dan cua id=img-1
              var srcImg = $("#img-1").attr("src");
              $(".featured-image img").attr("src", srcImg);
              $(".featured-image img").fadeIn();
            });
          });
          //---
          //---
          $("#img-2").click(function() {
            $(".featured-image img").fadeOut(function() {
              //lay duong dan cua id=img-2
              var srcImg = $("#img-2").attr("src");
              $(".featured-image img").attr("src", srcImg);
              $(".featured-image img").fadeIn();
            });
          });
          //---
          //---
          $("#img-3").click(function() {
            $(".featured-image img").fadeOut(function() {
              //lay duong dan cua id=img-3
              var srcImg = $("#img-3").attr("src");
              $(".featured-image img").attr("src", srcImg);
              $(".featured-image img").fadeIn();
            });
          });
          //---
          //---
          $("#img-4").click(function() {
            $(".featured-image img").fadeOut(function() {
              //lay duong dan cua id=img-4d
              var srcImg = $("#img-4").attr("src");
              $(".featured-image img").attr("src", srcImg);
              $(".featured-image img").fadeIn();
            });
          });
          //---
          //---
          $("#img-5").click(function() {
            $(".featured-image img").fadeOut(function() {
              //lay duong dan cua id=img-5
              var srcImg = $("#img-5").attr("src");
              $(".featured-image img").attr("src", srcImg);
              $(".featured-image img").fadeIn();
            });
          });
          //---
          //---
          $("#img-6").click(function() {
            $(".featured-image img").fadeOut(function() {
              //lay duong dan cua id=img-6
              var srcImg = $("#img-6").attr("src");
              $(".featured-image img").attr("src", srcImg);
              $(".featured-image img").fadeIn();
            });
          });
          //---
        });
      </script>
    </div>
    <div class="col-xs-12 col-md-6 info">

      <h1 itemprop="name"><?php echo $record->name; ?></h1>
      <p class="vendor"> Category:&nbsp; <span> <?php echo $this->getCategory($record->category_id); ?> </span></p>





      <p itemprop="price" class="price-box product-price-box"> <span class="special-price"> <span class="price product-price" style="text-decoration:line-through;"> <?php echo number_format($record->price); ?>₫ </span></span></p>
      <p itemprop="price" class="price-box product-price-box"> <span class="special-price"> <span class="price product-price"> <?php echo number_format($record->price - ($record->price * $record->discount) / 100); ?>₫ </span></span></p>
      <p><strong>Tình trạng:</strong>
        <?php echo (isset($record->stock) && $record->stock == 0) ? '<span style="color: black;">Hết hàng</span>' : '<span style="color: black;">Còn hàng</span>'; ?>
      </p>
      </p>
      <a href="index.php?controller=cart&action=create&id=<?php echo $record->id; ?>" class="btn btn-primary">Cho vào giỏ hàng</a>
      <!-- rating -->
      <!-- Tình trạng kho -->


      <div style="border:1px solid #dddddd; margin-top: 15px;">
        <h4 style="padding-left: 10px;">Rating</h4>
        <table style="width: 100%;">
          <tr>
            <td style="width: 80%; padding-left: 10px;"><img src="assets/frontend/images/star.jpg"></td>
            <td><span class="label label-primary"><?php echo $this->getStar($record->id, 1); ?> vote</span></td>
          </tr>
          <tr>
            <td style="width: 80%; padding-left: 10px;"><img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"></td>
            <td><span class="label label-warning"><?php echo $this->getStar($record->id, 2); ?> vote</span></td>
          </tr>
          <tr>
            <td style="width: 80%; padding-left: 10px;"><img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"></td>
            <td><span class="label label-danger"><?php echo $this->getStar($record->id, 3); ?> vote</span></td>
          </tr>
          <tr>
            <td style="width: 80%; padding-left: 10px;"><img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"></td>
            <td><span class="label label-info"><?php echo $this->getStar($record->id, 4); ?> vote</span></td>
          </tr>
          <tr>
            <td style="width: 80%; padding-left: 10px;"><img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"></td>
            <td><span class="label label-success"><?php echo $this->getStar($record->id, 5); ?> vote</span></td>
          </tr>
        </table>
        <br>
      </div>
      <!-- /rating -->
    </div>

  </div>
  <div class="middle" style="padding-top: 20px;">
    <?php echo $record->description; ?>
    <?php echo $record->content; ?>
  </div

    <div class="comments-section" style="margin-top: 30px;">
  <h3 style="font-size: 24px; color: #333; font-weight: bold;">Bình luận</h3>

  <?php if (!empty($comments) && is_array($comments)): ?>
    <?php foreach ($comments as $comment): ?>
      <div class="comment" style="margin-bottom: 20px; border-bottom: 1px solid #ddd; padding-bottom: 15px;">
        <!-- Hiển thị phần Đánh giá (sao) -->
        <p><strong>Đánh giá:
            <?php for ($i = 0; $i < $comment->rating; $i++): ?>
              <span style="color: gold;">&#9733;</span>
            <?php endfor; ?>
          </strong></p>

        <!-- Hiển thị phần Khách hàng -->
        <p><strong>Khách hàng:</strong> <?php echo htmlspecialchars($comment->customer_name); ?></p>

        <!-- Hiển thị phần bình luận -->
        <p><?php echo nl2br(htmlspecialchars($comment->comment)); ?></p>

        <!-- Hiển thị ngày tạo -->

        <p><small>Ngày tạo: <?php echo htmlspecialchars($comment->created_at); ?></small></p>



        <?php if (!empty($comment->admin_reply)): ?>
          <div class="admin-reply" style="margin-top: 10px; padding: 12px 16px; background-color: #f0f4ff; border-left: 4px solid #0056d2; border-radius: 6px;">
            <p style="margin: 0;">
              <strong style="color: #0056d2; font-weight: 600; font-size: 15px;">
                <i class="fas fa-user-shield" style="margin-right: 6px;"></i>Quản trị viên:
              </strong>
              <?= nl2br(htmlspecialchars($comment->admin_reply)) ?>
            </p>
            <small style="color: #666; display: block; margin-top: 4px;">— Phản hồi từ quản trị viên</small>
          </div>
        <?php endif; ?>







      </div>




    <?php endforeach; ?>
  <?php else: ?>
    <p>Chưa có bình luận nào.</p>
  <?php endif; ?>

  <!-- Form thêm bình luận (chỉ hiển thị khi đã đăng nhập) -->
  <?php if (isset($_SESSION['customer_id']) && $_SESSION['customer_id'] > 0): ?>
    <form action="index.php?controller=products&action=addComment" method="post">
      <input type="hidden" name="product_id" value="<?= $record->id ?>">

      <!-- Textarea cho phần bình luận -->
      <textarea name="comment" placeholder="Thêm bình luận..." rows="4" style="width: 100%; padding: 10px; font-size: 14px; border-radius: 4px;" required></textarea>

      <!-- Đánh giá sao -->
      <div class="star-rating" style="margin: 10px 0;">
        <?php for ($i = 5; $i >= 1; $i--): ?>
          <input type="radio" id="star<?= $i ?>" name="rating" value="<?= $i ?>" required>
          <label for="star<?= $i ?>" style="font-size: 20px;">&#9733;</label>
        <?php endfor; ?>
      </div>

      <!-- Nút gửi bình luận -->
      <button type="submit" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px;">Gửi bình luận</button>
    </form>
  <?php else: ?>
    <p>Vui lòng <a href="index.php?controller=account&action=login" style="color: #007bff; text-decoration: none;">đăng nhập</a> để có thể bình luận.</p>
  <?php endif; ?>

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