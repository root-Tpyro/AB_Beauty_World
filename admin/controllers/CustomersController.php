<?php 
// Load file model
include "models/CustomersModel.php";

class CustomersController extends Controller {
    // Kế thừa CustomersModel
    use CustomersModel;

    // Liệt kê danh sách khách hàng
    public function index() {
        $recordPerPage = 4;
        $numPage = ceil($this->modelTotal() / $recordPerPage);
        $data = $this->modelRead($recordPerPage);
        $this->loadView("CustomersView.php", ["data" => $data, "numPage" => $numPage]);
    }

    // Cập nhật khách hàng
    public function update() {
        $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : 0;
        $action = "index.php?controller=customers&action=updatePost&id=$id";
        $record = $this->modelGetRecord($id);
        $this->loadView("CustomersForm.php", ["record" => $record, "action" => $action]);
    }

    // Xử lý cập nhật khách hàng
    public function updatePost() {
        $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : 0;
        $this->modelUpdate($id);
        header("location:index.php?controller=customers");
    }

    // Thêm khách hàng mới
    public function create() {
        $action = "index.php?controller=customers&action=createPost";
        $this->loadView("CustomersForm.php", ["action" => $action]);        
    }

    // Xử lý thêm khách hàng mới
    public function createPost() {
        $this->modelCreate();
        header("location:index.php?controller=customers");
    }

    // Xóa khách hàng
    public function delete() {
        $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : 0;
        $this->modelDelete($id);
        header("location:index.php?controller=customers");
    }
}
?>
