<?php $this->layoutPath = "LayoutTrangTrong.php"; ?>

<style>
    .btn-custom-black {
        background-color: #000 !important;
        color: #fff !important;
        border: none !important;
        padding: 10px 30px;
        font-size: 16px;
        transition: all 0.3s ease;
        display: inline-block;
        text-decoration: none;
    }

    .btn-custom-black:hover {
        background-color: #333 !important;
        color: #f1f1f1 !important;
    }
</style>

<div class="container" style="margin-top: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card shadow-lg rounded" style="padding: 30px; border: 1px solid #eee;">
                <?php
                $message = $_SESSION["verify_message"] ?? "";
                $isSuccess = strpos($message, '✅') !== false;
                unset($_SESSION["verify_message"]);
                ?>
                <div style="font-size: 50px; color: <?= $isSuccess ? '#28a745' : '#dc3545' ?>;">
                    <?= $isSuccess ? '✔️' : '❌' ?>
                </div>
                <h2 class="mt-3" style="color: <?= $isSuccess ? '#28a745' : '#dc3545' ?>;">
                    <?= $isSuccess ? 'Xác minh thành công' : 'Xác minh thất bại' ?>
                </h2>
                <p style="margin-top: 15px; font-size: 18px;">
                    <?= $message ?>
                </p>

                <?php if ($isSuccess): ?>
                    <a href="index.php?controller=account&action=login" class="btn-custom-black mt-4">
                        Đăng nhập ngay
                    </a>
                <?php else: ?>
                    <a href="index.php" class="btn btn-danger mt-4" style="padding: 10px 30px; font-size: 16px;">
                        Quay lại trang chủ
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>