<?php
$this->layoutPath = "Layout.php";
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <title>Quản trị Chat</title>
    <style>
        #messages li .sender {
            font-size: 25px;
            font-weight: 500;
            color: #003366;
            /* Xanh đen cho user */
            /* Xanh dương đẹp */
            /* margin-bottom: 4px; */
            transform: scale(0.7);
            transform-origin: left top;
            margin-bottom: -12px;
        }

        #messages li.admin .sender {
            font-size: 13px;
            /* nhỏ hơn */
            font-weight: 300;
            color: rgba(255, 255, 255, 0.6);
            /* trắng mờ hơn */
            transform: scale(0.8);
            transform-origin: left top;
            margin-bottom: -6px;
            /* chỉnh khoảng cách nếu cần */
        }


        #messages li .text {
            font-size: 15px;
            font-weight: normal;
            color: #000;
            /* Đen cho User */
        }

        #messages li.admin .text {
            color: #ffffff;
            /* ✅ Trắng cho Admin */
        }

        #messages li .meta {
            font-size: 10px;
            /* Nhỏ ngay từ đầu */
            transform: scale(0.85);
            /* Thu nhỏ nhẹ để cân */
            transform-origin: left top;
            /* Căn từ góc trái trên */
            color: rgba(0, 0, 0, 0.4);
            margin-top: 0px;
        }

        #messages li.admin .meta {
            color: rgba(255, 255, 255, 0.4);
            font-size: 10px;
            transform: scale(0.8);
            transform-origin: right top;
        }

        #messages li .text {
            font-size: 15px;
            font-weight: normal;
            /* không đậm */
            color: #000;
            /* màu đen */
        }


        /* Thay block <style> trong <head> bằng đoạn sau */
        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
            vertical-align: middle;
        }

        .online {
            background-color: #28a745;
            /* Xanh lá */
        }

        .offline {
            background-color: #aaa;
            /* Xám */
        }





        body {
            font-family: "Segoe UI", sans-serif;
            background: #f7f9fb;
            margin: 0;
            padding: 0;
        }

        .chat-container {
            max-width: 1200px;
            margin: 40px auto;
        }

        .chat-header {
            background: #fff;
            padding: 15px 20px;
            border-radius: 12px 12px 0 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border-bottom: 1px solid #ddd;
        }

        .chat-header h2 {
            margin: 0;
            font-size: 20px;
        }

        .chat-main {
            display: flex;
            height: 600px;
        }

        .user-list-panel {
            width: 30%;
            background: #fff;
            padding-top: 10px;

            border-radius: 0 0 0 12px;
            height: 100%;
            overflow-y: auto;
            border-right: 1px solid #ccc;

            /* <-- Thêm dòng này để có đường kẻ đen ngăn cách */
        }

        li.selected-user {

            background: #f4f4f4 !important;
        }


        .user-list-title {
            font-size: 18px;
            font-weight: 600;
            padding-bottom: 10px;
            margin-bottom: 0px;
            border-bottom: 2px solid #ccc;
        }

        .chatbox-panel {
            flex: 1;
            background: #fff;
            border-radius: 0 12px 12px 0;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
            display: flex;
            flex-direction: column;
            height: 100%;
            /* padding: 10px 15px; */

            /* Cho đường chia chiều ngang */
        }

        .chatbox-title {
            font-size: 18px;
            font-weight: 600;
            padding-bottom: 10px;
            margin-bottom: 15px;
            border-bottom: 2px solid #ccc;
        }

        #messages {
            list-style: none;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            overflow-y: auto;
            scroll-behavior: smooth;
            flex-grow: 1;
        }

        #messages li.user,
        #messages li.admin {
            display: inline-block;
            padding: 12px 16px;
            border-radius: 18px;
            max-width: 70%;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.05);
            word-wrap: break-word;
            animation: fadeIn 0.2s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #messages li.user {
            background: #f1f0f0;
            color: #000;
            align-self: flex-start;
            border-radius: 16px 16px 16px 0;
        }

        #messages li.admin {
            background: linear-gradient(to bottom right, #6a9cfb, #3e4a89);
            color: white;
            align-self: flex-end;
            border-radius: 16px 16px 0 16px;
        }


        #messages .text {
            font-size: 15px;
            font-weight: 600;
            color: inherit;
            margin-bottom: 4px;
        }






        #input-area {
            display: flex;
        }
    </style>


</head>

<body>
    <div class="chat-container">

        <div class="chat-header">
            <h2>📨 Quản lý tin nhắn</h2>
        </div>

        <div class="chat-main">
            <!-- Danh sách người dùng -->
            <div class="user-list-panel">
                <h4 class="user-list-title">Danh sách người dùng</h4>

                <ul id="user-list" style="list-style: none; padding: 0;"></ul>

                <script>
                    function getColorFromName(str) {
                        const vibrantColors = [
                            "#e6194b", // đỏ tươi
                            "#f58231", // cam tươi
                            "#ffe119", // vàng tươi
                            "#3cb44b", // xanh lá tươi
                            "#00a08b", // xanh ngọc tươi
                            "#4363d8", // xanh dương tươi
                            "#f032e6", // hồng tím tươi
                            "#42d4f4", // xanh trời tươi
                            "#bfef45", // xanh chanh tươi
                            "#fabed4", // hồng baby
                            "#aaffc3", // xanh mint
                            "#e6beff", // lavender
                            "#ff7f50" // san hô tươi
                        ];


                        let hash = 0;
                        for (let i = 0; i < str.length; i++) {
                            hash = str.charCodeAt(i) + ((hash << 5) - hash);
                        }
                        return vibrantColors[Math.abs(hash) % vibrantColors.length];
                    }


                    let selectedUser = null;

                    function loadUsers() {
                        fetch("http://localhost:3000/api/users")
                            .then(res => res.json())
                            .then(users => {
                                users.sort((a, b) => new Date(b.last_message_time) - new Date(a.last_message_time));

                                const userList = document.getElementById("user-list");
                                userList.innerHTML = '';

                                users.forEach(user => {
                                    if (user.name === "Admin") return;

                                    const li = document.createElement("li");
                                    li.style.position = "relative"; // để nút X có thể định vị góc phải trên

                                    li.style.display = "flex";
                                    li.style.alignItems = "center";
                                    li.style.justifyContent = "space-between";
                                    li.style.padding = "10px";
                                    li.style.borderRadius = "10px";
                                    li.style.cursor = "pointer";
                                    li.style.transition = "background 0.2s ease";
                                    li.onmouseover = () => li.style.background = "#f2f2f2";
                                    li.onmouseout = () => li.style.background = "";

                                    // Trái: avatar + thông tin
                                    const leftDiv = document.createElement("div");
                                    leftDiv.style.display = "flex";
                                    leftDiv.style.alignItems = "center";
                                    leftDiv.style.gap = "10px";

                                    // Avatar tròn
                                    const avatar = document.createElement("div");
                                    avatar.style.width = "36px";
                                    avatar.style.height = "36px";
                                    avatar.style.borderRadius = "50%";
                                    avatar.style.background = getColorFromName(user.user_id || user.guest_id || user.name);

                                    avatar.style.display = "flex";
                                    avatar.style.alignItems = "center";
                                    avatar.style.justifyContent = "center";
                                    avatar.style.fontWeight = "bold";
                                    avatar.style.color = "#fff";
                                    avatar.style.fontSize = "14px";
                                    avatar.textContent = user.name.charAt(0).toUpperCase();
                                    avatar.style.position = "relative";

                                    // Dot trạng thái online
                                    const dot = document.createElement("span");
                                    dot.style.width = "10px";
                                    dot.style.height = "10px";
                                    dot.style.borderRadius = "50%";
                                    dot.style.background = user.isOnline ? "#28a745" : "#aaa";
                                    dot.style.position = "absolute";
                                    dot.style.bottom = "2px";
                                    dot.style.right = "2px";
                                    avatar.appendChild(dot);

                                    // Tên và tin nhắn mới
                                    const infoDiv = document.createElement("div");
                                    infoDiv.style.display = "flex";
                                    infoDiv.style.flexDirection = "column";

                                    const name = document.createElement("span");
                                    name.textContent = user.name;
                                    name.style.fontWeight = "600";

                                    const lastMsg = document.createElement("span");
                                    lastMsg.textContent = user.last_message || "(Không có tin nhắn)";
                                    lastMsg.style.color = "#666";
                                    lastMsg.style.fontSize = "12px";
                                    lastMsg.style.whiteSpace = "nowrap";
                                    lastMsg.style.overflow = "hidden";
                                    lastMsg.style.textOverflow = "ellipsis";
                                    lastMsg.style.maxWidth = "150px";

                                    // Tạo wrapper để chứa tên và nút ❌
                                    const nameWrapper = document.createElement("div");
                                    nameWrapper.style.display = "flex";
                                    nameWrapper.style.alignItems = "center";
                                    nameWrapper.style.gap = "6px"; // khoảng cách giữa tên và nút

                                    nameWrapper.appendChild(name);

                                    // Nút ẩn (❌) - chuyển vào đây
                                    // Nút ẩn (❌)
                                    const hideBtn = document.createElement("button");
                                    hideBtn.textContent = "×";
                                    hideBtn.style.position = "absolute";
                                    hideBtn.style.top = "6px";
                                    hideBtn.style.right = "8px";
                                    hideBtn.style.width = "24px";
                                    hideBtn.style.height = "24px";
                                    hideBtn.style.display = "none"; // 🚩 Ẩn mặc định
                                    hideBtn.style.alignItems = "center";
                                    hideBtn.style.justifyContent = "center";
                                    hideBtn.style.border = "1px solid #ccc";
                                    hideBtn.style.borderRadius = "4px";
                                    hideBtn.style.background = "#fff";
                                    hideBtn.style.color = "#000";
                                    hideBtn.style.fontSize = "16px";
                                    hideBtn.style.cursor = "pointer";
                                    hideBtn.title = "Ẩn trò chuyện";

                                    // 👉 Bỏ confirm, click là ẩn luôn
                                    hideBtn.onclick = (e) => {
                                        e.stopPropagation();
                                        fetch("http://localhost:3000/api/hide-user", {
                                            method: "POST",
                                            headers: {
                                                "Content-Type": "application/json"
                                            },
                                            body: JSON.stringify({
                                                user_id: user.user_id || null,
                                                guest_id: user.guest_id || null
                                            })
                                        }).then(() => loadUsers());
                                    };

                                    // 👉 Chỉ hiện khi di chuột tới vùng góc phải
                                    li.addEventListener("mousemove", (e) => {
                                        const rect = li.getBoundingClientRect();
                                        const offsetX = e.clientX - rect.left;

                                        if (offsetX > rect.width - 40) { // vùng 40px bên phải
                                            hideBtn.style.display = "flex";
                                        } else {
                                            hideBtn.style.display = "none";
                                        }
                                    });

                                    li.addEventListener("mouseleave", () => {
                                        hideBtn.style.display = "none"; // chuột ra ngoài → ẩn luôn
                                    });





                                    // Gắn vào infoDiv
                                    infoDiv.appendChild(nameWrapper);
                                    infoDiv.appendChild(lastMsg);


                                    leftDiv.appendChild(avatar);
                                    leftDiv.appendChild(infoDiv);

                                    // Phải: Nút ẩn + badge chưa đọc
                                    const rightDiv = document.createElement("div");
                                    rightDiv.style.display = "flex";
                                    rightDiv.style.alignItems = "center";
                                    rightDiv.style.gap = "8px";

                                    // Badge số tin chưa đọc
                                    if (user.unread && user.unread > 0) {
                                        const badge = document.createElement("div");
                                        badge.textContent = user.unread > 99 ? "99+" : user.unread;

                                        // Style badge nhỏ hơn và đẩy xuống
                                        badge.style.background = "red";
                                        badge.style.color = "white";
                                        badge.style.fontSize = "10px"; // Nhỏ hơn
                                        badge.style.padding = "1px 5px"; // Gọn lại
                                        badge.style.borderRadius = "999px";
                                        badge.style.fontWeight = "bold";
                                        badge.style.minWidth = "18px"; // Thu gọn
                                        badge.style.textAlign = "center";
                                        badge.style.position = "relative";
                                        badge.style.top = "6px"; // Dịch xuống
                                        badge.style.display = "inline-block";

                                        rightDiv.appendChild(badge);
                                    } else {
                                        const empty = document.createElement("div");
                                        empty.style.width = "18px"; // Khớp kích thước badge mới
                                        rightDiv.appendChild(empty);
                                    }




                                    // Gộp
                                    li.appendChild(leftDiv);
                                    li.appendChild(rightDiv);

                                    li.onclick = () => {
                                        // 👉 Xóa tất cả selected trước
                                        document.querySelectorAll("#user-list li").forEach(item => item.classList.remove("selected-user"));
                                        li.classList.add("selected-user");

                                        selectedUser = user;

                                        // Gửi socket thông báo đã xem đến người dùng
                                        socket.emit("mark seen", {
                                            user_id: user.user_id || null,
                                            guest_id: user.guest_id || null
                                        });

                                        // Gửi yêu cầu đánh dấu đã đọc
                                        fetch("http://localhost:3000/api/mark-seen", {
                                            method: "POST",
                                            headers: {
                                                "Content-Type": "application/json"
                                            },
                                            body: JSON.stringify({
                                                user_id: user.user_id || null,
                                                guest_id: user.guest_id || null
                                            })
                                        }).then(() => {
                                            loadUsers(); // Load lại danh sách để cập nhật badge
                                            loadChat(user); // Load nội dung chat
                                        });
                                    };

                                    // Nếu user này là selectedUser hiện tại → đánh dấu lại
                                    if (
                                        selectedUser &&
                                        ((user.user_id && selectedUser.user_id === user.user_id) ||
                                            (user.guest_id && selectedUser.guest_id === user.guest_id))
                                    ) {
                                        li.classList.add("selected-user");
                                    }

                                    userList.appendChild(li);
                                    li.appendChild(hideBtn);

                                });
                            });
                    }


                    loadUsers();
                </script>

            </div>

            <!-- Khung trò chuyện -->
            <div class="chatbox-panel" id="chatbox">

                <h3 class="chatbox-title">💬 Cuộc trò chuyện</h3>
                <ul id="messages"></ul>
                <div id="input-area"></div>
            </div>
        </div>
        <script src="https://cdn.socket.io/4.5.4/socket.io.min.js"></script>


</body>


</html>
<script>
    function loadChat(user) {
        const params = new URLSearchParams();
        if (user.user_id) params.append("user_id", user.user_id);
        if (user.guest_id) params.append("guest_id", user.guest_id);

        fetch("http://localhost:3000/chatbox?" + params.toString())
            .then(res => res.json())
            .then(messages => {
                const ul = document.getElementById("messages");
                ul.innerHTML = '';
                messages.forEach(msg => {
                    const li = document.createElement("li");
                    li.className = Number(msg.is_admin) === 1 ? 'admin' : 'user';
                    li.innerHTML = `
  <div class="sender">${msg.name}</div>
  <div class="text">${msg.message}</div>
  <div class="meta">${formatTimestamp(msg.created_at)}</div>
`;



                    ul.appendChild(li);
                });
                ul.scrollTop = ul.scrollHeight;
            });
    }

    function formatTimestamp(str) {
        const d = new Date(str);
        return `${d.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })} ${d.toLocaleDateString()}`;
    }
</script>
<script>
    const socket = io("http://localhost:3000", {
        transports: ["websocket"]
    });

    socket.on("connect", () => {
        socket.emit("identify", {
            user_id: 0,
            guest_id: null,
            name: "Admin",
            is_admin: true
        });
    });
    socket.on("new user", user => {
        if (selectedUser &&
            ((user.user_id && user.user_id == selectedUser.user_id) ||
                (user.guest_id && user.guest_id == selectedUser.guest_id))) {
            selectedUser.isOnline = true;
        }
        loadUsers();
    });

    socket.on("user disconnected", user => {
        if (selectedUser &&
            ((user.user_id && user.user_id == selectedUser.user_id) ||
                (user.guest_id && user.guest_id == selectedUser.guest_id))) {
            selectedUser.isOnline = false;
        }
        loadUsers();
    });

    document.getElementById("input-area").innerHTML = `
 <style>
  .chat-input-container {
    display: flex;
    align-items: center;
    gap: 10px;
    border-top: 1px solid #eee;
    padding: 12px 16px;
    background: #fff;
    border-radius: 0 0 12px 12px;
  }

  #m {
    flex: 1;
    padding: 10px 14px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 999px;
    outline: none;
    transition: border 0.2s;
    background: #f9f9f9;
  }

  #m:focus {
    border-color: #4169E1;
    background: #fff;
  }

  #sendBtn {
    padding: 10px 18px;
    background-color: #4169E1;
    color: white;
    border: none;
    border-radius: 999px;
    cursor: pointer;
    font-weight: 600;
    transition: background-color 0.2s;
    white-space: nowrap;
  }

  #sendBtn:hover {
    background-color: #3151b5;
  }
</style>

  <div class="chat-input-container">
    <input id="m" placeholder="Nhập tin nhắn..." />
    <button id="sendBtn">Gửi</button>
  </div>
`;

    document.getElementById("m").addEventListener("keydown", function(e) {
        if (e.key === "Enter" && !e.shiftKey) {
            e.preventDefault();
            document.getElementById("sendBtn").click();
        }
    });

    document.getElementById("sendBtn").onclick = () => {
        const message = document.getElementById("m").value.trim();
        if (!message || !selectedUser) return;

        socket.emit("chat message", {
            name: "Admin",
            message: message,
            user_id: selectedUser.user_id || null,
            guest_id: selectedUser.guest_id || null,
            sender: "admin",
            is_admin: 1
        });

        document.getElementById("m").value = "";
    };

    socket.on("chat message", (msg) => {
        const isCurrent = selectedUser && (
            // Nếu là user đã đăng nhập → so user_id
            (msg.user_id && selectedUser.user_id && msg.user_id == selectedUser.user_id) ||
            // Nếu là khách → so guest_id (chỉ khi chưa có user_id)
            (!msg.user_id && msg.guest_id && selectedUser.guest_id && msg.guest_id == selectedUser.guest_id)
        );


        if (isCurrent) {
            const ul = document.getElementById("messages");
            const li = document.createElement("li");
            li.className = msg.is_admin == 1 ? 'admin' : 'user';
            li.innerHTML = `
  <div class="bubble">
    <div class="sender">${msg.name}</div>
    <div class="text">${msg.message}</div>
    <div class="meta">${formatTimestamp(msg.created_at)}</div>
  </div>
`;

            ul.appendChild(li);
            ul.scrollTop = ul.scrollHeight;

            // ✅ Gửi socket thông báo đã xem
            // ✅ Chuẩn bị payload: ưu tiên user_id, fallback guest_id
            const payload = {};
            if (msg.user_id) {
                payload.user_id = msg.user_id; // nếu có user_id thì chỉ gửi user_id
            } else if (msg.guest_id) {
                payload.guest_id = msg.guest_id; // nếu là guest thì gửi guest_id
            }

            // ✅ Gửi socket thông báo đã xem
            socket.emit("mark seen", payload);

            // ✅ Gửi thêm yêu cầu cập nhật DB
            fetch("http://localhost:3000/api/mark-seen", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(payload)
            }).then(() => loadUsers());
        } else {
            loadUsers();
        }


    });
</script>