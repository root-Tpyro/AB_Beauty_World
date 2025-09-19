<?php
include "models/WishlistModel.php";
class WishlistController extends Controller
{
    use WishlistModel;

    public function index()
    {
        if (!isset($_SESSION["customer_email"])) {
            header("location:index.php?controller=account&action=login");
            exit();
        }
        $wishlist = $this->getWishlist();
        $this->loadView("WishlistView.php", ["wishlist" => $wishlist]);
    }

    public function create()
    {
        if (!isset($_SESSION["customer_email"])) {
            header("location:index.php?controller=account&action=login");
            exit();
        }
        $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;
        $this->modelAdd($id);
        $_SESSION['toast_message'] = ' Đã thêm sản phẩm danh sách yêu thích';
        header("location:index.php?controller=wishlist");
    }

    public function delete()
    {
        if (!isset($_SESSION["customer_email"])) {
            header("location:index.php?controller=account&action=login");
            exit();
        }
        $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;
        $this->modelDelete($id);
        header("location:index.php?controller=wishlist");
    }
}
