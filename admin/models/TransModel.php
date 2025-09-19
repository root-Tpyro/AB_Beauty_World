<?php
trait TransModel
{
    public function modelRead()
    {
        $recordPerPage = 25;
        $page = isset($_GET["page"]) && $_GET["page"] > 0 ? $_GET["page"] - 1 : 0;
        $from = $page * $recordPerPage;
        $conn = Connection::getInstance();
        $query = $conn->query("SELECT * FROM qr_trans ORDER BY id DESC LIMIT $from, $recordPerPage");
        return $query->fetchAll();
    }

    public function modelTotalPage()
    {
        $recordPerPage = 25;
        $conn = Connection::getInstance();
        $query = $conn->query("SELECT id FROM qr_trans");
        $total = $query->rowCount();
        return ceil($total / $recordPerPage);
    }
}
