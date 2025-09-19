<?php
$this->layoutPath = "Layout.php";
?>
<div class="col-md-12">
    <h2 style="text-align: center">Quản lý bình luận sản phẩm</h2>
    <div class="panel panel-primary">
        <div class="panel-heading">Danh sách bình luận</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Mã ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Tên Khách hàng</th>
                    <th>Bình luận</th>
                    <th>Rating</th>
                    <th>Thời gian</th>
                    <th>Phản hồi Admin</th>
                </tr>
                <?php foreach ($data as $rows): ?>
                    <tr>
                        <td><?php echo $rows->id; ?></td>
                        <td><?php echo htmlspecialchars($rows->product_name); ?></td>
                        <td><?php echo htmlspecialchars($rows->customer_name); ?></td>

                        <td><?php echo $rows->comment; ?></td>
                        <td><?php echo $rows->rating; ?>/5</td>
                        <td><?php echo $rows->created_at; ?></td>
                        <td>
                            <!-- Form phản hồi admin -->
                            <form method="post" action="index.php?controller=comments&action=reply" style="margin:0;">
                                <input type="hidden" name="id" value="<?php echo $rows->id; ?>">
                                <textarea name="admin_reply" rows="2" style="width:100%;"><?php echo htmlspecialchars($rows->admin_reply); ?></textarea>
                                <button type="submit" class="btn btn-sm btn-primary" style="margin-top:5px;">Gửi</button>
                            </form>
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
                <li class="page-item disabled"><a href="#" class="page-link">Trang</a></li>
                <?php for ($i = 1; $i <= $numPage; $i++): ?>
                    <li class="page-item"><a href="index.php?controller=comments&action=index&page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>