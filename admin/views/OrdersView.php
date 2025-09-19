<!-- load file layout chung -->
<?php $this->layoutPath = "Layout.php"; ?>
<div class="col-md-12">
    <h2 style="text-align: center">Đơn hàng</h2>
    <div class="panel panel-primary">
        <div class="panel-heading">List Orders</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Tên</th>
                    <th>Số điện thoại</th>
                    <th>Ngày đặt</th>
                    <th>Phương thức thanh toán</th> <!-- Thêm cột mới -->
                    <th style="width:150px; text-align: center;">Trạng thái</th>
                    <th style="width:150px;">Vận chuyển</th>
                </tr>
                <?php foreach ($listRecord as $rows): ?>
                    <?php
                    // lấy bản ghi customer
                    $customer = $this->modelGetCustomers($rows->customer_id);
                    ?>
                    <tr>
                        <td><?php echo $rows->id; ?></td> <!-- Mã đơn hàng -->
                        <td><?php echo $customer->name; ?></td>
                        <td><?php echo $customer->phone; ?></td>
                        <td>
                            <?php
                            $date = Date_create($rows->create_at);
                            echo Date_format($date, "d/m/Y");
                            ?>
                        </td>
                        <td><?php echo $rows->payment_method; ?></td> <!-- Hiển thị payment method -->
                        <td style="text-align: center;">
                            <?php if ($rows->status == 1): ?>
                                <span class="label label-primary">Đã giao hàng</span>
                            <?php else: ?>
                                <span class="label label-danger">Chưa giao hàng</span>
                            <?php endif; ?>
                        </td>
                        <td style="text-align: center;">
                            <a href="index.php?controller=orders&action=detail&id=<?php echo $rows->id; ?>" class="label label-success">Chi tiết</a>
                            <?php if ($rows->status == 0): ?>
                                <a href="index.php?controller=orders&action=delivery&id=<?php echo $rows->id; ?>" class="label label-info">Giao hàng</a>
                            <?php endif; ?>
                        </td>
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
                <li class="page-item">
                    <?php for ($i = 1; $i <= $numPage; $i++): ?>
                        <a href="index.php?controller=users&action=read&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                    <?php endfor; ?>
                </li>
            </ul>
        </div>
    </div>
</div>