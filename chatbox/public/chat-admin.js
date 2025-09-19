const socket = io("https://chat.xmart.io.vn"); // đường dẫn VPS chat server

const chatBox = document.getElementById("chatBox");
const messageInput = document.getElementById("messageInput");
const sendBtn = document.getElementById("sendBtn");

function appendMsg(name, msg, sender) {
  const div = document.createElement("div");
  div.classList.add("msg");
  div.innerHTML = `<span class="${sender}">${name}:</span> ${msg}`;
  chatBox.appendChild(div);
  chatBox.scrollTop = chatBox.scrollHeight;
}

sendBtn.addEventListener("click", () => {
  const message = messageInput.value.trim();
  if (!message) return;

  const msgObj = {
    username: ADMIN_NAME,
    message: message,
    sender: "admin",
    user_id: USER_ID
  };

  socket.emit("chat message", msgObj); // Gửi socket realtime
  fetch("/admin/index.php?controller=chat&action=save", {
    method: "POST",
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(msgObj)
  });

  appendMsg(ADMIN_NAME, message, "admin");
  messageInput.value = "";
});

socket.on("chat message", (msg) => {
  // Nếu là user gửi thì hiện vào khung
  if (msg.sender !== "admin") {
    appendMsg(msg.name, msg.message, "user");
  }
});
