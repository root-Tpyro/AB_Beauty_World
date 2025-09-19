<?php $this->layoutPath = "LayoutTrangTrong.php"; ?>

<style>
    .container {
        margin-top: 40px;
        text-align: center;
    }

    .total-price {
        color: red;
        font-weight: bold;
    }

    .btn-primary {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 10px;
        font-weight: 500;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

<div class="container">
    <h2 style="color: green;">🎉 Đơn hàng thành công!</h2>

    <?php if (!empty($_SESSION["last_order_total"])): ?>
        <p>
            Tổng giá bạn đã mua từ trang web của chúng tôi:
            <span class="total-price">
                <?= number_format($_SESSION["last_order_total"]) ?>₫
            </span>
        </p>
    <?php endif; ?>

    <p>Chúng tôi sẽ liên hệ sớm nhất có thể.</p>
    <p>Vui lòng xem chi tiết đơn hàng của bạn tại đây:</p>

    <a href="index.php?controller=customerorders&action=index" class="btn btn-primary">👉 Nhấp vào đây</a>
</div>

<!-- React toast container -->
<div id="order-toast" style="position: fixed; top: 80px; right: 30px; z-index: 9999;"></div>

<!-- ReactJS + Babel -->
<script src="https://unpkg.com/react@18/umd/react.development.js"></script>
<script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>

<script type="text/babel">
    function OrderToast() {
        const [show, setShow] = React.useState(false);

        React.useEffect(() => {
            const params = new URLSearchParams(window.location.search);
            if (params.get("status") === "success") {
                setShow(true);
            }
        }, []);

        if (!show) return null;

        return null;  // Không hiển thị bất kỳ thông báo nào
    }

    const root = document.getElementById("order-toast");
    if (root) {
        ReactDOM.createRoot(root).render(<OrderToast />);
    }
</script>