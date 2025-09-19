<?php

trait CommentsModel
{
    public function modelRead()
    {
        $recordPerPage = 25;
        $page = isset($_GET["page"]) && $_GET["page"] > 0 ? (int)$_GET["page"] - 1 : 0;
        $from = $page * $recordPerPage;
        $conn = Connection::getInstance();

        // JOIN với bảng customers và products để lấy tên
        $query = $conn->query("
        SELECT comments.*, customers.name AS customer_name, products.name AS product_name 
        FROM comments 
        JOIN customers ON comments.customer_id = customers.id 
        JOIN products ON comments.product_id = products.id 
        ORDER BY comments.id DESC 
        LIMIT $from, $recordPerPage
    ");

        return $query->fetchAll(PDO::FETCH_OBJ); // nên để dạng object để thống nhất với view
    }


    public function modelTotalPage()
    {
        $recordPerPage = 25;
        $conn = Connection::getInstance();
        $query = $conn->query("SELECT id FROM comments");
        $total = $query->rowCount();
        return ceil($total / $recordPerPage);
    }



    public function updateReply($id, $reply)
    {
        $conn = Connection::getInstance(); // <-- cần thiết
        $query = $conn->prepare("UPDATE comments SET admin_reply = :reply WHERE id = :id");
        $query->execute([
            ':reply' => $reply,
            ':id' => $id
        ]);
    }
}
