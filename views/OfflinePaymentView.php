<style>
    h3 {
        font-size: 28px;
        font-weight: bold;
    }

    .table th,
    .table td {
        font-size: 18px;
        vertical-align: middle;
    }

    .button.black {
        background-color: #F8E21C;
        /* Hồng đậm */
        color: white;
        padding: 15px 30px;
        font-size: 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        margin-top: 20px;
        transition: background-color 0.3s ease;
    }

    .button.black:hover {
        background-color: #333;
    }

    .btn-warning {
        font-size: 18px;
        padding: 10px 20px;
        border-radius: 6px;
    }
</style>




<?php $this->layoutPath = "LayoutTrangTrong.php"; ?>
<div class="container" style="margin-top: 40px;">
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
    <!-- Nút chọn thanh toán bằng tiền mặt -->
    <form action="index.php?controller=cart&action=checkout" method="post">
        <input type="hidden" name="payment_method" value="COD">
        <button type="submit" class="button black">Đặt Ngay</button>
    </form>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector("form[action*='cart&action=checkout']");
            const loadingSpinner = document.getElementById("loadingSpinner");

            if (form) {
                form.addEventListener("submit", function() {
                    loadingSpinner.style.display = "block";
                });
            }
        });
    </script>