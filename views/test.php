<?php
include "LayoutTrangChu.php";
?>

<div class="template-cart" style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px; margin-top:20px;">
    <!-- Cột trái: danh sách sản phẩm -->
    <div class="cart-left">
        <div class="breadcrumb" style="margin: 20px 0; font-size: 16px;">
            <a href="index.php" style="text-decoration:none; color:#333;">Trang chủ</a>
            <span style="margin: 0 8px;">›</span>
            <span style="font-weight: bold; color:#000;">
                Giỏ hàng (<?php echo $this->cartNumber(); ?> sản phẩm)
            </span>
        </div>

        <?php if (!empty($_SESSION["cart"])): ?>
            <!-- Tiêu đề cột -->
            <div class="cart-header" style="display:flex; font-weight:bold; border-bottom:2px solid #ddd; padding:10px 0;">
                <div style="flex:1;">Sản phẩm</div>
                <div style="width:150px; text-align:center;">Giá tiền</div>
                <div style="width:120px; text-align:center;">Số lượng</div>
                <div style="width:150px; text-align:center;">Thành tiền</div>
                <div style="width:60px; text-align:center;"></div>
            </div>

            <!-- Danh sách sản phẩm -->
            <?php foreach ($_SESSION["cart"] as $product): ?>
                <div class="cart-item" style="display:flex; align-items:center; border-bottom:1px solid #eee; padding:15px 0;">
                    <!-- Ảnh + tên -->
                    <div style="flex:1; display:flex; align-items:center;">
                        <div style="width:80px; flex-shrink:0;">
                            <img src="assets/upload/products/<?php echo $product['photo']; ?>" style="width:100%; border-radius:4px;" />
                        </div>
                        <div style="padding-left:15px;">
                            <a href="index.php?controller=products&action=detail&id=<?php echo $product['id']; ?>"
                                style="font-weight:bold; font-size:15px; color:#000; text-decoration:none;">
                                <?php echo $product['name']; ?>
                            </a>
                        </div>
                    </div>
                    <!-- Giá -->
                    <div style="width:150px; text-align:center; color:red;">
                        <?php echo number_format($product['price']); ?>₫
                    </div>
                    <!-- Số lượng -->
                    <div style="width:120px; text-align:center;">
                        <input type="number" min="1" value="<?php echo $product['number']; ?>"
                            name="product_<?php echo $product['id']; ?>"
                            style="width:60px; padding:4px; text-align:center;" readonly>
                    </div>
                    <!-- Thành tiền -->
                    <div style="width:150px; text-align:center; font-weight:bold;">
                        <?php echo number_format($product['number'] * $product['price']); ?>₫
                    </div>
                    <!-- Xóa -->
                    <div style="width:60px; text-align:center;">
                        <a href="index.php?controller=cart&action=delete&id=<?php echo $product['id']; ?>"
                            style="color:red; font-size:18px;">✕</a>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Nút tiếp tục mua hàng -->
            <div style="margin-top:15px; text-align:right;">
                <a href="index.php" style="text-decoration:none; font-weight:bold; color:#333;">
                    ← Tiếp tục mua hàng
                </a>
            </div>
        <?php else: ?>
            <div style="color: red; text-align: center; padding:20px;">Giỏ hàng của bạn đang trống.</div>
        <?php endif; ?>
    </div>

    <!-- Cột phải: hóa đơn -->
    <?php if ($this->cartNumber() > 0): ?>
        <div class="cart-right" style="border:1px solid #ddd; border-radius:6px; padding:20px; background:#f9f9f9;">
            <h3 style="margin-bottom:20px; font-size:18px; border-bottom:1px solid #ddd; padding-bottom:10px;">
                Hóa đơn của bạn
            </h3>
            <div style="display:flex; justify-content:space-between; margin-bottom:10px;">
                <span>Tạm tính:</span>
                <span><?php echo number_format($this->cartTotal()); ?>₫</span>
            </div>
            <div style="display:flex; justify-content:space-between; margin-bottom:10px;">
                <span>Giảm giá:</span>
                <span>0₫</span>
            </div>
            <div style="display:flex; justify-content:space-between; font-weight:bold; color:red; font-size:18px; margin-top:15px;">
                <span>Tổng cộng:</span>
                <span><?php echo number_format($this->cartTotal()); ?>₫</span>
            </div>
            <p style="font-size:12px; color:#666; margin-top:5px;">(Đã bao gồm VAT)</p>

            <a href="index.php?controller=cart&action=selectPayment"
                style="display:block; background:#FF6600; color:#fff; text-align:center; 
                      padding:12px 0; border-radius:6px; font-weight:bold; margin-top:20px; 
                      text-decoration:none; font-size:16px;">
                Tiến hành đặt hàng
            </a>
        </div>
    <?php endif; ?>
</div>
<style>
    .content {
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
    }

    #footer {
        margin-top: auto !important;
    }
</style>