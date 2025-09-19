<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <title>Chat với hỗ trợ viên</title>
  <style>
    body {
      font-family: sans-serif;
      background: #eef2f5;
    }
    #chatbox {
      width: 100%;
      max-width: 400px;
      margin: 50px auto;
      background: #fff;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
    }
    #chatbox h3 {
      margin: 0;
      padding: 10px;
      background: #2196F3;
      color: white;
      border-radius: 8px 8px 0 0;
    }
    #messages {
      list-style: none;
      margin: 0;
      padding: 10px;
      height: 300px;
      overflow-y: auto;
      border-bottom: 1px solid #eee;
    }
    #messages li {
      margin-bottom: 10px;
      padding: 8px;
      background: #f1f1f1;
      border-radius: 5px;
    }
    #messages li.you {
      background: #d1ecf1;
      text-align: right;
    }
    #input-area {
      display: flex;
    }
    #m {
      flex: 1;
      padding: 10px;
      border: none;
      border-top: 1px solid #ccc;
      border-radius: 0 0 0 8px;
      font-size: 14px;
    }
    #sendBtn {
      border: none;
      background: #2196F3;
      color: white;
      padding: 10px 20px;
      border-top: 1px solid #ccc;
      border-radius: 0 0 8px 0;
      cursor: pointer;
    }
    #sendBtn:hover {
      background: #1976D2;
    }
  </style>
</head>

<body>
  <div id="chatbox">
    <h3>💬 Chat với Hỗ Trợ Viên</h3>
    <ul id="messages"></ul>
    <div id="input-area">
      <input id="m" autocomplete="off" placeholder="Nhập tin nhắn..." />
      <button id="sendBtn">Gửi</button>
    </div>
  </div>

  <!-- Socket.io từ localhost -->
  <script src="http://localhost:3000/socket.io/socket.io.js"></script>
  <script>
  (async () => {
    // Lấy user info từ localhost (API PHP chạy trên XAMPP)
    const res = await fetch("http://localhost/MediaMart/api/get-session.php", {
      credentials: "include"
    });
    const data = await res.json();

  function setCookie(name, value, days) {
  const d = new Date();
  d.setTime(d.getTime() + (days*24*60*60*1000));
  const expires = "expires="+ d.toUTCString();
  document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

function getCookie(name) {
  const cname = name + "=";
  const decodedCookie = decodeURIComponent(document.cookie);
  const ca = decodedCookie.split(';');
  for(let i = 0; i < ca.length; i++) {
    let c = ca[i].trim();
    if (c.indexOf(cname) === 0) {
      return c.substring(cname.length, c.length);
    }
  }
  return "";
}

let guest_id = getCookie('guest_id');
if (!guest_id) {
  const resGuest = await fetch("http://localhost/MediaMart/api/get-guest-id.php");
  const dataGuest = await resGuest.json();
  guest_id = dataGuest.guest_id;
  setCookie('guest_id', guest_id, 30); // lưu 30 ngày
}



    const name = data.name ? data.name : "Guest " + guest_id.slice(-4);
    const user_id = data.id || null;

    // Kết nối socket đến localhost
    const socket = io("http://localhost:3000", { transports: ['websocket'] });

    socket.emit("identify", {
      name: name,
      user_id: user_id,
      guest_id: guest_id
    });

    const messages = document.getElementById('messages');
    const input = document.getElementById('m');
    const sendBtn = document.getElementById('sendBtn');

    // Lấy lịch sử tin nhắn từ API PHP local
    fetch(`http://localhost:3000/chatbox?user_id=${user_id || ''}&guest_id=${guest_id || ''}`)
      .then(res => res.json())
      .then(list => {
        list.forEach(msg => {
          const li = document.createElement("li");
          li.textContent = `${msg.name}: ${msg.message}`;
          li.className = msg.name === name ? "you" : "";
          messages.appendChild(li);
        });
        messages.scrollTop = messages.scrollHeight;
      });

    socket.on('chat message', function (msg) {
      const li = document.createElement("li");
      li.textContent = `${msg.name}: ${msg.message}`;
      li.className = msg.name === name ? "you" : "";
      messages.appendChild(li);
      messages.scrollTop = messages.scrollHeight;
    });

    function send() {
      const text = input.value.trim();
      if (text !== "") {
        const msg = {
          name: name,
          message: text,
          user_id: user_id,
          guest_id: guest_id
        };
        socket.emit('chat message', msg);
        input.value = '';
      }
    }

    sendBtn.addEventListener('click', send);
    input.addEventListener('keypress', function (e) {
      if (e.key === 'Enter') send();
    });
  })();
  </script>
</body>
</html>
