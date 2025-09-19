<?php $this->layoutPath = "LayoutTrangMat.php"; ?>
<div class="container" style="margin-top: 40px;">
    <div class="row align-items-stretch"> <!-- thêm align-items-stretch để 2 cột cao bằng nhau -->
        <!-- Cột trái: Thông tin khách hàng -->
        <div class="col-md-6 d-flex flex-column">
            <div class="card flex-grow-1" style="padding: 20px;"> <!-- thêm card cho đẹp và full chiều cao -->
                <h3 style="color: green;">👤 Thông tin khách hàng</h3>
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
                <div style="text-align: right; margin-top: auto;">
                    <a href="index.php?controller=customer&action=edit" class="btn btn-warning">✏️ Cập nhật thông tin</a>
                </div>
            </div>
        </div>

        <!-- Cột phải: Thông tin đơn hàng + thanh toán -->
        <div class="col-md-6 d-flex flex-column">
            <div class="card flex-grow-1" style="padding: 20px;"> <!-- thêm card cho đồng đều -->
                <h3 style="color: purple;">📦 Thông tin đơn hàng</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>SL</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION["cart"] as $item): ?>
                            <tr>
                                <td><img src="assets/upload/products/<?php echo $item["photo"]; ?>" style="width: 50px;"></td>
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

                <!-- Phương thức thanh toán -->
                <form action="/qr/checkout.php" method="post" style="margin-top: 20px;">
                    <div class="card" style="padding: 20px; margin-bottom: 20px;">

                        <h5>Phương thức thanh toán</h5>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="payos" value="payos" checked>
                            <label class="form-check-label" for="payos">
                                Thanh toán chuyển khoản (Quét mã VietQR) <strong style="color: #F8E21C;">VietQR </strong>
                            </label>
                            <div style="font-size: 14px; color: gray; margin-left: 25px;">
                                Thanh toán đơn hàng qua payOS tiện lợi và miễn phí.
                                Hầu hết App ngân hàng Việt Nam đã hỗ trợ mã VietQR trên payOS.
                            </div>
                        </div>

                        <div style="font-size: 13px; color: gray; margin-top: 10px;">
                            Thông tin cá nhân của bạn sẽ được sử dụng để xử lý đơn hàng, tăng trải nghiệm sử dụng website,
                            và cho các mục đích cụ thể khác đã được mô tả trong
                            <a href="chinh-sach-rieng-tu.html" target="_blank">chính sách riêng tư</a> của chúng tôi.
                        </div>
                    </div>

                    <!-- Nút đặt hàng -->
                    <div style="text-align: center;">
                        <button type="submit" class="btn btn-lg" style="background-color: #F8E21C; color: white; border: none;">Đặt hàng</button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Spinner khi submit -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector("form[action='checkout.php']");

        const loadingSpinner = document.getElementById("loadingSpinner");

        if (form) {
            form.addEventListener("submit", function() {
                if (loadingSpinner) {
                    loadingSpinner.style.display = "block";
                }
            });
        }
    });
</script>