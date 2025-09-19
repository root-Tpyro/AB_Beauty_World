<?php
//load LayoutTrangChu.php
$this->layoutPath = "LayoutTrangChu.php";
?>
<style>
    .simple-pagination .page-link {
        display: inline-block;
        margin: 0 5px;
        text-decoration: none;
        color: #333;
        font-size: 16px;
        transition: color 0.2s;
    }

    .simple-pagination .page-link:hover {
        color: #007bff;
    }

    .simple-pagination .page-link.active {
        font-weight: bold;
        color: #007bff;
    }
</style>
<?php foreach ($data['categories'] as $rowsCategories): ?>
    <!-- category product -->
    <div class="special-collection">
        <div class="tabs-container">
            <div class="row" style="margin-top:10px;">
                <div class="head-tabs head-tab1 col-lg-11">
                    <h2><?php echo $rowsCategories->name; ?></h2>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="tabs-content row">
            <div id="content-taba4" class="content-tab content-tab-proindex">

                <?php
                $products = $this->modelGetProducts($rowsCategories->id);
                ?>
                <?php foreach ($products as $rows): ?>
                    <!-- box product -->
                    <div class="col-xs-6 col-md-2 col-sm-6 " style="position: relative;">
                        <!-- Discount label -->
                        <div style="position: absolute; width: 30px; line-height: 30px; border-radius: 30px; background: black; color:white; text-align: center;">
                            <?php echo $rows->discount; ?>%
                        </div>

                        <!-- Wishlist Button -->
                        <div style="position: absolute; right: 10px; top: 60px;">
                            <a href="index.php?controller=wishlist&action=create&id=<?php echo $rows->id; ?>"
                                style="display: inline-block; width: 36px; height: 36px; background-color: red; color: white; border-radius: 50%; text-align: center; line-height: 36px; font-size: 18px;">
                                <i class="fas fa-heart"></i>
                            </a>
                        </div>

                        <div class="product-grid" id="product-1168979" style="height: 350px; overflow: hidden;">
                            <div class="image"> <a href="#"><img src="assets/upload/products/<?php echo $rows->photo; ?>" title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>" class="img-responsive"></a> </div>
                            <div class="info">
                                <h3 class="name"><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h3>
                                <p class="price-box"> <span class="special-price"> <span style="text-decoration:line-through;"> <?php echo number_format($rows->price); ?></span> ₫ </span> </p>
                                <p class="price-box"> <span class="special-priceg"> <span class="price product-priceg"> <?php echo number_format($rows->price - ($rows->price * $rows->discount) / 100); ?> </span>₫ </span> </p>
                                <p class="price-box"> <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=1"><img src="assets/frontend/images/star.jpg"></a> <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=2"><img src="assets/frontend/images/star.jpg"></a> <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=3"><img src="assets/frontend/images/star.jpg"></a> <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=4"><img src="assets/frontend/images/star.jpg"></a> <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=5"><img src="assets/frontend/images/star.jpg"></a> </p>
                                <div class="action-btn">
                                    <form>
                                        <a href="index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>" class="button">Thêm vào giỏ hàng</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end box product -->
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <!-- /category product -->
<?php endforeach; ?>

<!-- Pagination -->
<div class="simple-pagination" style="text-align: center; margin: 20px 0;">
    <?php for ($i = 1; $i <= $data['totalPages']; $i++): ?>
        <a href="index.php?controller=products&action=list&page=<?php echo $i; ?>"
            class="page-link <?php echo ($i == $data['currentPage']) ? 'active' : ''; ?>">
            <?php echo $i; ?>
        </a>
    <?php endfor; ?>

    <?php if ($data['currentPage'] < $data['totalPages']): ?>
        <a href="index.php?controller=products&action=list&page=<?php echo $data['currentPage'] + 1; ?>" class="page-link">Trang sau »</a>
    <?php endif; ?>
</div>

<!-- adv -->
<!-- hot news -->