<?php 
    //load file layout.php
    $this->layoutPath = "Layout.php";
?>
<div class="col-md-12">
    <h2 style="text-align: center">Quản lý khách hàng</h2>
    <div style="margin-bottom:5px;">
        <a href="index.php?controller=customers&action=create" class="btn btn-primary">Thêm khách hàng</a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Danh sách khách hàng</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>ID</th>
                    <th>Họ và tên</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Mật khẩu</th>
                    <th style="width:120px;">Chức năng</th>
                </tr>
                <?php foreach($data as $rows): ?>
                <tr>
                    <td><?php echo $rows->id ?></td>
                    <td><?php echo $rows->name ?></td>
                    <td><?php echo $rows->email ?></td>
                    <td><?php echo $rows->address ?></td>
                    <td><?php echo $rows->phone ?></td>
                    <td><?php echo $rows->password ?></td>
                    <td style="text-align:center;">
                        <a href="index.php?controller=customers&action=update&id=<?php echo $rows->id; ?>">
                            <img style="width: 18px" src="../assets/frontend/images/edit.png" alt="update">
                        </a>&nbsp;
                        <a href="index.php?controller=customers&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Bạn có chắc chắn muốn xóa?');">

                            <img style="width: 18px" src="../assets/frontend/images/delete.png" alt="delete">
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <ul class="pagination">
                <li class="page-item disabled"><a href="#" class="page-link">Trang</a></li>
                <?php for($i = 1; $i <= $numPage; $i++): ?>
                <li class="page-item"><a href="index.php?controller=customers&page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>