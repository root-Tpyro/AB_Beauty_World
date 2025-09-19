<?php
$this->layoutPath = "LayoutTrangTrong.php";
?>

<div class="container" style="max-width: 600px; margin: 60px auto; padding: 40px; border: 1px solid #ddd; border-radius: 12px; background-color: #fffbe6; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
    <h2 style="text-align: center; margin-bottom: 30px; color: #333;"> Chọn phương thức thanh toán</h2>

    <form method="post" id="paymentForm">
        <div class="payment-option" style="margin-bottom: 20px;">
            <label class="option-box">
                <input type="radio" name="payment_method" value="COD" checked>
                <div class="box-content">
                    Thanh toán khi nhận hàng (COD)
                </div>
            </label>

            <label class="option-box">
                <input type="radio" name="payment_method" value="Online">
                <div class="box-content">
                    Thanh toán Online
                </div>
            </label>
        </div>

        <div id="onlineOptions" style="margin-top: 20px; display: none;">
            <label style="font-size: 16px; margin-bottom: 10px; display: block;">Chọn cổng thanh toán:</label>
            <select name="online_gateway" style="padding: 10px 14px; font-size: 16px; border-radius: 8px; width: 100%; border: 1px solid #ccc;">
                <option value="momo">MoMo</option>
                <option value="vnpay">VNPay</option>
                <option value="qr">QR Code</option>
            </select>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <button type="submit"
                style="padding: 12px 30px; font-size: 18px; background-color:F8E21C; color: white; border: none;
                border-radius: 8px; cursor: pointer; box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: background 0.3s ease;">
                Xác nhận thanh toán
            </button>
        </div>
    </form>
</div>

<!-- Custom CSS -->
<style>
    .option-box {
        display: block;
        position: relative;
        border: 2px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
        cursor: pointer;
        transition: 0.3s;
        font-size: 18px;
        background-color: white;
    }

    .option-box:hover {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
    }

    .option-box input[type="radio"] {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .option-box input[type="radio"]:checked+.box-content {
        border: 2px solid #007bff;
        background-color: #eaf4ff;
        color: #007bff;
        font-weight: bold;
    }

    .box-content {
        padding: 10px 15px;
        border-radius: 8px;
        transition: 0.3s;
    }
</style>

<!-- JavaScript xử lý form -->
<script>
    const radioOnline = document.querySelector('input[value="Online"]');
    const onlineOptions = document.getElementById('onlineOptions');

    document.querySelectorAll('input[name="payment_method"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            onlineOptions.style.display = (radioOnline.checked) ? 'block' : 'none';
        });
    });

    document.getElementById('paymentForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const method = document.querySelector('input[name="payment_method"]:checked').value;
        let action = "index.php?controller=cart&action=confirmPayment";

        if (method === "Online") {
            const gateway = document.querySelector('select[name="online_gateway"]').value;
            action += "&method=" + gateway;
        } else {
            action += "&method=cod";
        }

        this.action = action;
        this.submit();
    });
</script>