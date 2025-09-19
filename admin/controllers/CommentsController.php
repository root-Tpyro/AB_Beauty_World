<?php
include "models/CommentsModel.php";

class CommentsController extends Controller
{
    use CommentsModel;

    public function index()
    {
        $data = $this->modelRead();
        $numPage = $this->modelTotalPage();
        $this->loadView("CommentsView.php", ["data" => $data, "numPage" => $numPage]);
    }

    public function reply()
    {
        $id = $_POST['id'];
        $admin_reply = $_POST['admin_reply'];

        // Gọi trực tiếp hàm từ trait
        $this->updateReply($id, $admin_reply);

        // Quay lại trang danh sách
        header("location:index.php?controller=comments&action=index");
    }
}
