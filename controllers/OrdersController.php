<?php
class OrdersController extends Controller { // Phải kế thừa Controller
    public function index() {
        $this->loadView("OrdersView.php");
    }
}
?>
