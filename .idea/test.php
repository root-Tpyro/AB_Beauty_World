<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Danh sách biến chưa khai báo (gây lỗi Notice)
echo $cogangthoi;

// Một số echo có nội dung để dễ thấy trên trình duyệt
echo "<br>Testing display of undefined variables...";
echo "<br>If error reporting is on, you should see multiple Notice-level messages above.";
