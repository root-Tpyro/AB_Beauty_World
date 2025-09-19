<?php $this->layoutPath = "LayoutTrangTrong.php"; ?>
<div class="container" style="margin-top: 40px;">

    <!-- Thông tin đơn hàng -->
    <h3 style="color: purple;">📦 Thông tin đơn hàng</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ảnh</th>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION["cart"] as $item): ?>
                <tr>
                    <td><img src="assets/upload/products/<?php echo $item["photo"]; ?>" style="width: 60px;"></td>
                    <td><?php echo $item["name"]; ?></td>
                    <td><?php echo number_format($item["price"]); ?>₫</td>
                    <td><?php echo $item["number"]; ?></td>
                    <td><?php echo number_format($item["price"] * $item["number"]); ?>₫</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align: right;"><b>Tổng cộng:</b></td>
                <td><b><?php echo number_format($this->cartTotal()); ?>₫</b></td>
            </tr>
        </tfoot>
    </table>

    <!-- Thông tin khách hàng -->
    <h3 style="margin-top: 30px; color: green;">👤 Thông tin khách hàng</h3>
    <table class="table table-striped table-bordered" style="font-size: 16px;">
        <tr>
            <th>Họ tên</th>
            <td><?php echo isset($customer->name) ? $customer->name : "Chưa đăng nhập"; ?></td>
        </tr>
        <tr>
            <th>Số điện thoại</th>
            <td><?php echo isset($customer->phone) ? $customer->phone : ""; ?></td>
        </tr>
        <tr>
            <th>Địa chỉ</th>
            <td><?php echo isset($customer->address) ? $customer->address : ""; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo isset($customer->email) ? $customer->email : ""; ?></td>
        </tr>
    </table>
    <div style="text-align: right; margin-top: 10px;">
        <a href="index.php?controller=customer&action=edit" class="btn btn-warning">✏️ Cập nhật thông tin</a>
    </div>

    <!-- Giao diện xác nhận thanh toán MoMo -->
    <div style="margin-top: 40px; background-color: #fef6f2; border-radius: 12px; padding: 30px; text-align: center; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
        <h4 style="color: #F8E21C;"><span style="font-size: 22px;">💰</span> Thanh toán Online - MoMo</h4>
        <p style="margin-top: 10px;">Quý khách vui lòng xác nhận để tiến hành thanh toán qua ví MoMo.</p>
        <form action="index.php?controller=cart&action=momoPayment" method="post" style="margin-top: 20px;">
            <input type="hidden" name="total_momo" value="<?php echo $this->cartTotal(); ?>">
            <input type="hidden" name="payment_method" value="Momo">
            <button type="submit" class="btn btn-default"
                style="background-color: #F8E21C; color: white; font-weight: bold; padding: 12px 30px;
               border: none; border-radius: 6px; font-size: 16px; cursor: pointer; transition: 0.3s;">
                🚀 Xác nhận thanh toán MoMo
            </button>
        </form>
    </div>
</div>