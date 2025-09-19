<?php
//load file layout.php vao day
$this->layoutPath = "Layout.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>User</title>
    <link href="../assets/admin/layout1/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Thống kê tổng quan</h1>
        <div class="row mt-4" style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: space-between;">
            <div style="flex: 1 1 23%; background-color: #00a65a; color: white; padding: 20px; border-radius: 10px; min-width: 200px;">
                <h2><?= $totalOrders ?></h2>
                <p>Đơn Hàng</p>
                <a href="index.php?controller=orders" style="color: white;">Xem thêm &raquo;</a>
            </div>
            <div style="flex: 1 1 23%; background-color: #00c0ef; color: white; padding: 20px; border-radius: 10px; min-width: 200px;">
                <h2><?= $totalPosts ?></h2>
                <p>Bài Viết</p>
                <a href="index.php?controller=news" style="color: white;">Xem thêm &raquo;</a>
            </div>
            <div style="flex: 1 1 23%; background-color: #f39c12; color: white; padding: 20px; border-radius: 10px; min-width: 200px;">
                <h2><?= $totalProducts ?></h2>
                <p>Sản Phẩm</p>
                <a href="index.php?controller=products" style="color: white;">Xem thêm &raquo;</a>
            </div>
            <div style="flex: 1 1 23%; background-color: #605ca8; color: white; padding: 20px; border-radius: 10px; min-width: 200px;">
                <h2><?= $totalCustomers ?></h2>
                <p>Người Dùng</p>
                <a href="index.php?controller=customers" style="color: white;">Xem thêm &raquo;</a>
            </div>
        </div>
    </div>

    <!-- Biểu đồ doanh thu -->
    <div class="mt-5">
        <h3>Biểu đồ doanh thu theo tháng</h3>
        <canvas id="revenueChart" width="600" height="300"></canvas>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const doanhThu = <?= json_encode($monthlyRevenue); ?>;

        const ctx = document.getElementById('revenueChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    'Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                    'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
                ],
                datasets: [{
                    label: 'Doanh Thu (VNĐ)',
                    data: doanhThu,
                    borderColor: '#4c51bf',
                    backgroundColor: 'rgba(76, 81, 191, 0.2)',
                    fill: true,
                    tension: 0.3,
                    pointRadius: 6,
                    pointHoverRadius: 8,
                    pointBackgroundColor: '#4c51bf',
                    pointBorderColor: '#fff',
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.parsed.y.toLocaleString('vi-VN') + ' đ';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString('vi-VN') + ' đ';
                            }
                        },
                        title: {
                            display: true,
                            text: 'Đơn vị: VNĐ'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Tháng trong năm'
                        }
                    }
                }
            }
        });
    </script>

</body>

</html>