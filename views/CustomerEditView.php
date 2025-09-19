<?php $this->layoutPath = "LayoutTrangTrong.php"; ?>
<div class="container" style="margin-top: 40px;">
    <h3 style="color: #007bff;">✏️ Cập nhật thông tin khách hàng</h3>
    <form method="post" action="index.php?controller=customer&action=update">
        <input type="hidden" name="method" value="<?php echo isset($_GET['method']) ? $_GET['method'] : 'qr'; ?>">

        <div class="form-group">
            <label>Họ tên</label>
            <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($customer->name); ?>" required>
        </div>
        <div class="form-group">
            <label>Số điện thoại</label>
            <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($customer->phone); ?>" required>
        </div>
        <div class="form-group">
            <label>Địa chỉ</label>
            <input type="text" name="address" class="form-control" value="<?php echo htmlspecialchars($customer->address); ?>" required>
        </div>

        <!-- Đây mới là nút Lưu -->
        <button type="submit" class="btn btn-success">💾 Lưu thông tin</button>

        <!-- Quay lại confirmPayment đúng method luôn -->
        <a href="index.php?controller=cart&action=confirmPayment&method=<?php echo isset($_GET['method']) ? $_GET['method'] : 'qr'; ?>" class="btn btn-secondary">⬅️ Quay lại</a>
    </form>
</div>