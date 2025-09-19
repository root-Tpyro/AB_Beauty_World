<?php
include "models/TransModel.php";

class TransController extends Controller
{
    use TransModel;

    public function index()
    {
        $data = $this->modelRead();
        $numPage = $this->modelTotalPage();
        $this->loadView("TransView.php", ["data" => $data, "numPage" => $numPage]);
    }
}
