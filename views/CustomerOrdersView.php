<!-- Load layout chung -->
<?php $this->layoutPath = "LayoutTrangChu.php"; ?>

<div class="col-md-12">
    <h2 style="text-align: center">Đơn hàng của tôi</h2>
    <div class="panel panel-primary">
        <div class="panel-heading">Danh sách đơn hàng</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Phương thức thanh toán</th> <!-- Mới -->
                    <th style="width:150px; text-align: center;">Tình trạng</th>
                    <th style="width:150px;">Chi tiết</th>
                </tr>
                <?php foreach ($listRecord as $rows): ?>
                    <tr>
                        <td><?php echo $rows->id; ?></td>
                        <td>
                            <?php
                            $date = Date_create($rows->create_at);
                            echo Date_format($date, "d/m/Y");
                            ?>
                        </td>
                        <td><?php echo $rows->payment_method; ?></td> <!-- Mới -->
                        <td style="text-align: center;">
                            <?php if ($rows->status == 1): ?>
                                <span class="label label-primary">Đang vận chuyển</span>
                            <?php else: ?>
                                <span class="label label-danger">Đang xử lý</span>
                            <?php endif; ?>
                        </td>
                        <td style="text-align: center;">
                            <a href="index.php?controller=customerorders&action=detail&id=<?php echo $rows->id; ?>" class="label label-success">Xem chi tiết</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</div>