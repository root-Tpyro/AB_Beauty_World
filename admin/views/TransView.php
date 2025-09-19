<?php
//load file layout.php
$this->layoutPath = "Layout.php";
?>
<div class="col-md-12">
    <h2 style="text-align: center">Quản lý giao dịch QR</h2>
    <div class="panel panel-primary">
        <div class="panel-heading">Danh sách giao dịch</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Người thanh toán</th>
                    <th>Số tài khoản</th>
                    <th>Số tiền</th>
                    <th>Mô tả</th>
                    <th>Mã tham chiếu</th>

                    <th>Loại tiền</th>
                    <th>Thời gian giao dịch</th>
                </tr>
                <?php foreach ($data as $rows): ?>
                    <tr>
                        <td><?php echo $rows->order_id; ?></td>
                        <td><?php echo $rows->payer_name; ?></td>
                        <td><?php echo $rows->payer_account; ?></td>
                        <td><?php echo number_format($rows->amount, 0, ',', '.'); ?> VND</td>
                        <td><?php echo $rows->description; ?></td>
                        <td><?php echo $rows->reference_code; ?></td>

                        <td><?php echo $rows->currency; ?></td>
                        <td><?php echo $rows->transaction_datetime; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination {
                    padding: 0px;
                    margin: 0px;
                }
            </style>
            <ul class="pagination">
                <li class="page-item disabled"><a href="#" class="page-link">Trang</a></li>
                <?php for ($i = 1; $i <= $numPage; $i++): ?>
                    <li class="page-item"><a href="index.php?controller=trans&action=index&page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>