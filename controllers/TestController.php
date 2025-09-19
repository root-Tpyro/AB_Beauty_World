<?php
class TestController extends Controller
{
    public function test()
    {
        // Ghi log kiểm tra xem hàm test() có được gọi không
        file_put_contents("logs/logs.txt", "[" . date("Y-m-d H:i:s") . "] Gọi TestController::test()\n", FILE_APPEND);

        $this->loadView("TestView.php");
    }
}
