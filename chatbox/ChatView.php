<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản trị viên - Chat trực tuyến</title>
    <style>
        body {
            font-family: sans-serif;
            background: #f5f5f5;
        }

        #chatbox {
            width: 400px;
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
            background: #4CAF50;
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
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-top: 1px solid #ccc;
            border-radius: 0 0 8px 0;
            cursor: pointer;
        }

        #sendBtn:hover {
            background: #45a049;
        }
    </style>
</head>

<body>

    <div id="chatbox">
        <h3>💬 Admin Chat Trực Tuyến</h3>
        <ul id="messages"></ul>
        <div id="input-area">
            <input id="m" autocomplete="off" placeholder="Nhập tin nhắn..." />
            <button id="sendBtn">Gửi</button>
        </div>
    </div>

    <script src="https://chat.xmart.io.vn/socket.io/socket.io.js"></script>
    <script>
        // 👉 Kết nối đến socket server
        const socket = io("https://chat.xmart.io.vn", {
            transports: ["websocket"] // đảm bảo dùng websocket
        });

        const messages = document.getElementById('messages');
        const input = document.getElementById('m');
        const sendBtn = document.getElementById('sendBtn');

        const username = "Admin"; // ✅ Danh tính admin

        // Nhận tin nhắn từ server
        socket.on('chat message', function(msg) {
            const li = document.createElement("li");
            li.textContent = `${msg.username}: ${msg.message}`;
            messages.appendChild(li);
            messages.scrollTop = messages.scrollHeight;
        });

        function send() {
            const text = input.value.trim();
            if (text !== "") {
                const msg = {
                    username: username,
                    message: text
                };
                socket.emit('chat message', msg);
                input.value = '';
            }
        }

        sendBtn.addEventListener('click', send);
        input.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') send());
        });
    </script>

</body>

</html>