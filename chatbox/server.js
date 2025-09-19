const express = require('express');
const http = require('http');
const { Server } = require('socket.io');
const path = require('path');
const cors = require('cors');
const db = require('./db'); // Kết nối MySQL

const app = express();
const server = http.createServer(app);
const io = new Server(server, {
  cors: {
    origin: '*',
    methods: ['GET', 'POST']
  }
});

app.use(cors());
app.use(express.static(path.join(__dirname, 'public')));
app.use(express.json()); // cần để đọc body POST

const usersOnline = new Map(); // Lưu trạng thái online

app.get('/', (req, res) => {
  res.send('✅ Socket.IO server đang hoạt động.');
});

// API lấy lịch sử tin nhắn
app.get('/chatbox', (req, res) => {
  const { user_id, guest_id } = req.query;
  let sql = 'SELECT name, message, user_id, guest_id, sender, is_admin, seen, created_at FROM chatbox WHERE 1=1';
  const params = [];

  if (user_id) {
    sql += ' AND user_id = ?';
    params.push(user_id);
  } else if (guest_id) {
    sql += ' AND guest_id = ?';
    params.push(guest_id);
  } else {
    return res.json([]);
  }

  sql += ' ORDER BY created_at ASC LIMIT 100';

  db.query(sql, params, (err, results) => {
    if (err) return res.status(500).json({ error: 'DB error' });
    res.json(results);
  });
});
app.post('/api/hide-user', (req, res) => {
  const { user_id, guest_id } = req.body;

  const paramField = user_id ? 'user_id' : 'guest_id';
  const paramValue = user_id || guest_id;

  const sql = `
    UPDATE chatbox 
    SET is_hidden = 1 
    WHERE ${paramField} = ?
  `;

  db.query(sql, [paramValue], (err) => {
    if (err) {
      console.error('❌ Lỗi khi ẩn user:', err);
      return res.status(500).json({ success: false });
    }
    res.json({ success: true });
  });
});

// API danh sách người online (cho admin)
app.get('/api/users', (req, res) => {
  const sql = `
  SELECT 
    COALESCE(user_id, 0) AS user_id,
    guest_id,
    name,
    MAX(created_at) AS last_message_time,
    SUBSTRING_INDEX(GROUP_CONCAT(message ORDER BY created_at DESC SEPARATOR '|||'), '|||', 1) AS last_message
  FROM chatbox
   WHERE is_hidden = 0
  GROUP BY user_id, guest_id, name
  ORDER BY last_message_time DESC
`;

  db.query(sql, (err, results) => {
    if (err) return res.status(500).json({ error: 'DB error' });

    const mergedUsers = new Map();

    results.forEach(user => {
      const key = user.user_id ? `user_${user.user_id}` : `guest_${user.guest_id}`;

      if (!mergedUsers.has(key)) {
        mergedUsers.set(key, user);
      } else {
        const existing = mergedUsers.get(key);
        if (existing.name === 'Admin' && user.name !== 'Admin') {
          mergedUsers.set(key, user);
        }
        if (new Date(user.last_message_time) > new Date(existing.last_message_time)) {
          mergedUsers.set(key, user);
        }
      }
    });

    const users = Array.from(mergedUsers.values());
    const finalUsers = [];
    let pending = users.length;
    if (pending === 0) return res.json([]);

    users.forEach(user => {
      const key = user.user_id ? `user_${user.user_id}` : `guest_${user.guest_id}`;
      const online = usersOnline.get(key);
      const paramField = user.user_id ? 'user_id' : 'guest_id';
      const paramValue = user.user_id || user.guest_id;

      const sqlUnread = `
        SELECT COUNT(*) AS unread 
        FROM chatbox 
        WHERE seen = 0 AND sender = 'user' AND ${paramField} = ?
      `;

      db.query(sqlUnread, [paramValue], (err, result) => {
        const unread = result?.[0]?.unread || 0;

        finalUsers.push({
          ...user,
          isOnline: online ? online.isOnline : false,
          lastSeen: online ? online.lastSeen : null,
          unread,
           last_message: user.last_message || ''
        });

        pending--;
        if (pending === 0) {
          res.json(finalUsers);
        }
      });
    });
  });
});

// SOCKET.IO xử lý kết nối
io.on('connection', (socket) => {
  console.log('🔌 Kết nối mới:', socket.id);

  socket.on('identify', (user) => {
    const { user_id, guest_id, name, is_admin } = user;

    if (is_admin) {
      socket.join('admin');
      socket.is_admin = true;
      console.log('👨‍💼 Admin đã kết nối.');
      return;
    }

    const key = user_id ? `user_${user_id}` : `guest_${guest_id}`;
    socket.key = key;
    socket.user = user;
    socket.join(key);

    usersOnline.set(key, {
      user,
      isOnline: true,
      lastSeen: new Date().toISOString()
    });

    console.log(`✅ Đã xác định: ${name} (${key})`);

    io.to('admin').emit('new user', {
      ...user,
      isOnline: true
    });
  });

 socket.on('mark seen', ({ user_id, guest_id }) => {
  const paramField = user_id ? 'user_id' : 'guest_id';
  const paramValue = user_id || guest_id;

  const sql = `
    UPDATE chatbox 
    SET seen = 1 
    WHERE seen = 0 AND sender = 'user' AND ${paramField} = ?
  `;

  db.query(sql, [paramValue], (err) => {
    if (err) {
      console.error('❌ Không thể đánh dấu đã xem:', err);
    } else {
      console.log(`👁 Tin nhắn từ ${paramField}=${paramValue} đã được đánh dấu là đã xem.`);
      
      // Gửi sự kiện cho phía người dùng để họ đổi "đã gửi" => "đã xem"
      const room = user_id ? `user_${user_id}` : `guest_${guest_id}`;
      io.to(room).emit('seen');

      // Cũng gửi về cho admin nếu cần
      socket.emit('seen updated', { user_id, guest_id });
    }
  });
});


  socket.on('chat message', (msg) => {
    const { name, message, user_id, guest_id, sender = 'user' } = msg;
    const created_at = new Date().toISOString();

    const sql = `
      INSERT INTO chatbox (name, message, user_id, guest_id, sender, is_admin, seen, created_at)
      VALUES (?, ?, ?, ?, ?, ?, ?, NOW())
    `;

    db.query(sql, [
      name,
      message,
      user_id || null,
      guest_id || null,
      sender,
      sender === 'admin' ? 1 : 0,
      0
    ], (err) => {
      if (err) console.error('❌ Lỗi DB:', err);
    });

    const key = user_id ? `user_${user_id}` : `guest_${guest_id}`;
    const messageData = {
      name,
      message,
      sender,
      user_id,
      guest_id,
      is_admin: sender === 'admin' ? 1 : 0,
      created_at,
      seen: 0
    };
  // 👉 Bỏ ẩn user nếu trước đó bị ẩn
  const unhideSql = `
    UPDATE chatbox 
    SET is_hidden = 0 
    WHERE (user_id = ? OR guest_id = ?)
  `;
  db.query(unhideSql, [user_id || null, guest_id || null], (err) => {
    if (err) console.error('❌ Lỗi khi bỏ ẩn user:', err);
  });

    if (sender === 'admin') {
      io.to(key).emit('chat message', messageData);
      socket.emit('chat message', messageData);
    } else {
      io.to('admin').emit('chat message', messageData);
      io.to(key).emit('chat message', messageData);
    }
  });

  socket.on('disconnect', () => {
    console.log('🔌 Mất kết nối:', socket.id);
    const key = socket.key;

    if (key && usersOnline.has(key)) {
      const data = usersOnline.get(key);
      data.isOnline = false;
      data.lastSeen = new Date().toISOString();
      usersOnline.set(key, data);

      io.to('admin').emit('user disconnected', {
        ...data.user,
        isOnline: false
      });
    }
  });
});

// API mark-seen dùng POST
app.post('/api/mark-seen', (req, res) => {
  const { user_id, guest_id } = req.body;

  const paramField = user_id ? 'user_id' : 'guest_id';
  const paramValue = user_id || guest_id;

  const sql = `
    UPDATE chatbox 
    SET seen = 1 
    WHERE seen = 0 AND sender = 'user' AND ${paramField} = ?
  `;

  db.query(sql, [paramValue], (err) => {
    if (err) {
      console.error('❌ Lỗi khi mark seen:', err);
      return res.status(500).json({ success: false });
    }
    res.json({ success: true });
  });
});

const PORT = process.env.PORT || 3000;
server.listen(PORT, () => {
  console.log(`🚀 Server đang chạy tại http://localhost:${PORT}`);
});
