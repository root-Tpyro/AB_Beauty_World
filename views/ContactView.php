<?php
//load LayoutTrangTrong.php
$this->layoutPath = "LayoutTrangTrong.php";
?>
<div class="template-customer">
  <h1>Liên hệ</h1>

  <!-- Google Maps -->
  <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.466647272751!2d106.6559664!3d10.852067999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529da38b7df73%3A0x146c7e2a15a10f89!2zNTQ5IMSQLiBMw6ogVsSDbiBUaOG7jSwgUGjGsOG7nW5nIDE1LCBHw7IgVuG6pXAsIEjhu5MgQ2jDrSBNaW5o!5e0!3m2!1svi!2s!4v1746315997230!5m2!1svi!2s"
    width="100%"
    height="450"
    style="border:0;"
    allowfullscreen=""
    loading="lazy">
  </iframe>

  <!-- Contact Info -->


  <!-- Contact Form -->
  <div style="margin-top:30px;">
    <h3>Gửi tin nhắn cho chúng tôi</h3>
    <form method="post" action="index.php?controller=contact&action=sendMessage">
      <div style="margin-bottom: 10px;">
        <input type="text" name="name" placeholder="Họ và tên" required style="width:100%;padding:10px;">
      </div>
      <div style="margin-bottom: 10px;">
        <input type="email" name="email" placeholder="Email" required style="width:100%;padding:10px;">
      </div>
      <div style="margin-bottom: 10px;">
        <input type="text" name="subject" placeholder="Tiêu đề" required style="width:100%;padding:10px;">
      </div>
      <div style="margin-bottom: 10px;">
        <textarea name="message" placeholder="Nội dung" required style="width:100%;padding:10px;height:150px;"></textarea>
      </div>
      <div>
        <button type="submit" style="padding:10px 20px;background:#007bff;color:white;border:none;border-radius:4px;">Gửi</button>
      </div>
    </form>
  </div>
</div>