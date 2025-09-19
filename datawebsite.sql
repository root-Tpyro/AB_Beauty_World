-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 19, 2025 lúc 04:44 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `datawebsite`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `displayhomepage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `displayhomepage`) VALUES
(2, 1, 'Máy Giặt & Máy Sấy', 0),
(5, 4, 'Máy Chiếu', 0),
(9, 8, 'Galaxy A', 0),
(10, 8, 'Galaxy Note', 0),
(11, 8, 'Galaxy S', 0),
(12, 7, 'Galaxy Watch Active', 0),
(14, 7, 'Galaxy Watch', 0),
(15, 7, 'Galaxy Fit', 0),
(16, 4, 'Thiết Bị Nghe Nhìn', 0),
(17, 4, 'Lifestyle TVs', 0),
(18, 4, 'TVs', 0),
(19, 1, 'Máy Hút Bụi', 0),
(20, 1, 'Dụng Cụ Nhà Bếp', 0),
(21, 8, 'Galaxy Z', 0),
(22, 8, 'Galaxy M', 0),
(24, 23, 'Galaxy Tab S', 0),
(25, 23, 'Galaxy Tab A', 0),
(26, 23, 'Phụ Kiện', 0),
(29, 27, 'Galaxy Tab A', 0),
(30, 27, 'Galaxy Tab S', 0),
(31, 1, 'Tủ Lạnh', 0),
(33, 32, 'Màn Hình Thông Minh', 0),
(34, 32, 'Màn Hình Độ Phân Giải Cao', 0),
(35, 32, 'Màn Hình Odyssey', 0),
(40, 37, 'Apple', 0),
(41, 0, 'Nước hoa', 1),
(42, 0, 'Chăm Sóc Da Mặt', 1),
(43, 0, 'Make Up', 1),
(44, 0, 'Thực Phẩm Chức Năng', 1),
(45, 0, 'Chăm Sóc Cá Nhân', 1),
(46, 41, 'Nước Hoa Nam', 0),
(47, 41, 'Nước Hoa Nữ', 0),
(48, 42, 'Tẩy trang', 0),
(49, 42, 'Sửa rửa mặt', 0),
(50, 42, 'Tẩy tế bào chết', 0),
(51, 43, 'Phấn nền - Kem nền', 0),
(52, 43, 'Phấn phủ', 0),
(53, 43, 'Son lì', 0),
(54, 44, 'Làm đẹp', 0),
(55, 44, 'Bổ sung', 0),
(56, 45, 'Dầu gội', 0),
(57, 45, 'Dầu xả', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` between 1 and 5),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `customer_id` int(11) NOT NULL,
  `admin_reply` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `comment`, `rating`, `created_at`, `customer_id`, `admin_reply`) VALUES
(133, 77, 'Sản phẩm rất tuyệt vời!', 5, '2025-09-07 11:14:18', 47, NULL),
(134, 81, 'Mẫu mã chưa đẹp lắm!', 4, '2025-09-07 11:14:37', 47, NULL),
(135, 64, 'Sản phẩm này dùng rất thích!', 5, '2025-09-07 11:15:04', 47, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `verify_token` varchar(255) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`, `phone`, `password`, `verify_token`, `is_verified`) VALUES
(44, 'Đỗ Nhật Giang', 'giang8b07@gmail.com', '549/36 Lê Văn Thọ, Quận Gò vấp TP HCM', '097416764855', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1),
(45, 'Đỗ Nhật Giang', 'giang8b07@gmail.comg', '549/36 Lê Văn Thọ, Quận Gò vấp', '0974167648', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1),
(47, 'Hoàng Tiến', 'koahtpyro@gmail.com', 'HCM', '113', 'e10adc3949ba59abbe56e057f20f883e', 'd7c067555d42c7748a00039fc89a325c', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(4000) NOT NULL,
  `content` text NOT NULL,
  `hot` int(11) NOT NULL DEFAULT 0,
  `photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `name`, `description`, `content`, `hot`, `photo`) VALUES
(9, 'Bí quyết làm đẹp của phụ nữ', '<p><span style=\"font-size:14px\">Chi nh&aacute;nh Starbucks tại&nbsp;<a href=\"https://thanhnien.vn/han-quoc/\" rel=\"noopener noreferrer\" target=\"_blank\" title=\"Hàn Quốc\">H&agrave;n Quốc</a>&nbsp;sẽ cung cấp ốp lưng phi&ecirc;n bản giới hạn cho d&ograve;ng Galaxy S22 v&agrave; Galaxy Buds2.</span></p>\r\n', '<p>Theo&nbsp;<em>GSMArena</em>, thương hiệu Starbucks tại&nbsp;<a href=\"https://thanhnien.vn/ky-su-han-quoc-xay-bia-mo-cho-internet-explorer-post1469960.html\" title=\"Kỹ sư Hàn Quốc xây bia mộ cho Internet Explorer\">H&agrave;n Quốc</a>&nbsp;đ&atilde; hợp t&aacute;c với Samsung để ra mắt một số mẫu ốp lưng độc đ&aacute;o cho d&ograve;ng&nbsp;<a href=\"https://thanhnien.vn/samsung-lien-tiep-gap-rac-roi-voi-galaxy-s22-post1447671.html\" title=\"Samsung liên tiếp gặp rắc rối với Galaxy S22 \">Galaxy S22</a>&nbsp;v&agrave; Galaxy Buds2. C&aacute;c phụ kiện độc quyền tr&ecirc;n sẽ c&oacute; mặt tr&ecirc;n ứng dụng v&agrave; cửa h&agrave;ng Starbuck tại quốc gia n&agrave;y từ ng&agrave;y 28.6 theo giờ địa phương.</p>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Starbucks tung ốp lưng cho Galaxy S22 và Galaxy Buds 2 - ảnh 1\" src=\"https://image.thanhnien.vn/w2048/Uploaded/2022/aohuoue/2022_06_27/samsung-starbucks-galaxy-s22-6600.jpg\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Ốp lưng cho thế hệ Galaxy S22 của Samsung đến từ sự hợp t&aacute;c với Starbucks</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Với&nbsp;<a href=\"https://thanhnien.vn/bo-sac-45w-cho-galaxy-s22-va-s22-ultra-co-tot-hon-bo-sac-25w-post1437944.html\" title=\"Bộ sạc 45W cho Galaxy S22+ và S22 Ultra có tốt hơn bộ sạc 25W?\">Galaxy S22 Ultra</a>, ốp lưng sẽ dựa tr&ecirc;n thiết kế vỏ silicon c&oacute; d&acirc;y đeo với h&igrave;nh bi&ecirc;n lai của Starbucks. C&ograve;n ốp lưng cho Galaxy S22 bỏ d&acirc;y đeo để c&oacute; logo lớn, v&agrave; ốp lưng S22 + c&oacute; d&ograve;ng &ldquo;Count the stars in your Galaxy&rdquo;.</p>\r\n\r\n<p>Hộp đựng cho tai nghe Buds 2 c&oacute; hai phi&ecirc;n bản, một bản m&agrave;u xanh l&aacute; c&acirc;y v&agrave; logo Starbucks. Bản c&ograve;n lại biến hộp sạc tr&ocirc;ng như ly c&agrave; ph&ecirc;. Hai phi&ecirc;n bản n&agrave;y tương th&iacute;ch với Galaxy Buds2, Galaxy Buds Live v&agrave; Galaxy Buds Pro.</p>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Starbucks tung ốp lưng cho Galaxy S22 và Galaxy Buds 2 - ảnh 2\" src=\"https://image.thanhnien.vn/w2048/Uploaded/2022/aohuoue/2022_06_27/samsung-starbucks-galaxy-s22-2-2681.jpg\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Hộp cho tai nghe Galaxy Buds 2 của Starbucks tại H&agrave;n Quốc</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Tất cả c&aacute;c phụ kiện n&agrave;y đều được l&agrave;m bằng vật liệu th&acirc;n thiện với m&ocirc;i trường. Vẫn chưa r&otilde; c&aacute;c chi nh&aacute;nh Starbucks kh&aacute;c trong khu vực c&oacute; cung cấp c&aacute;c phụ kiện tương tự hay kh&ocirc;ng.</p>\r\n', 1, '1757243503_thc-phm-bo-v-sc-khe-megabeauty-collagen_b22fc342f6564efc80f681bdc4de921e_master.png'),
(10, 'Cocoon ra măt sản phẩm mới', '<p><span style=\"font-size:14px\">Samsung đ&atilde; ch&iacute;nh thức tiết lộ chiếc Galaxy XCover6 Pro - chiếc điện thoại tầm trung với thiết kế si&ecirc;u bền c&oacute; thể hoạt động trong m&ocirc;i trường ngo&agrave;i trời lẫn c&ocirc;ng nghiệp.</span></p>\r\n', '<p><span style=\"font-size:14px\">Theo&nbsp;<em>Neowin</em>, Galaxy XCover6 Pro l&agrave; thiết bị si&ecirc;u bền đầu ti&ecirc;n của&nbsp;<a href=\"https://thanhnien.vn/post-1471380.html\" target=\"_blank\">Samsung</a>&nbsp;c&oacute; hỗ trợ mạng 5G. Đ&acirc;y l&agrave; thiết bị kế nhiệm XCover5 được ra mắt v&agrave;o năm ngo&aacute;i. Sản phẩm c&oacute; thiết kế đạt chứng nhận MIL-STD-810H, xếp hạng IP68 v&agrave; k&iacute;nh cường lực Corning Gorilla Glass Victus+.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">N&oacute;i một c&aacute;ch đơn giản, Samsung đang cung cấp một thiết bị c&oacute; thể chống chọi với&nbsp;<a href=\"https://thanhnien.vn/thoi-tiet/\" rel=\"noopener noreferrer\" target=\"_blank\" title=\"thời tiết\">thời tiết</a>&nbsp;khắc nghiệt, chịu va đập, nước bắn v&agrave; thậm ch&iacute; v&ocirc; t&igrave;nh ng&acirc;m nước trong một thời gian ngắn. Samsung đ&atilde; sử dụng nhựa t&aacute;i chế cho một số bộ phận của thiết bị, đảm bảo t&iacute;nh bền vững v&agrave; c&aacute;c kh&iacute;a cạnh th&acirc;n thiện với m&ocirc;i trường.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">XCover6 Pro c&oacute; m&agrave;n h&igrave;nh 6,6 inch độ ph&acirc;n giải Full HD+ với tốc độ l&agrave;m mới 120 Hz. Sản phẩm sử dụng tấm nền PLS LCD thay v&igrave; OLED. C&ocirc;ng ty tuy&ecirc;n bố thiết bị đ&atilde; tăng độ nhạy cảm ứng, c&oacute; nghĩa m&agrave;n h&igrave;nh tr&ecirc;n điện thoại c&oacute; thể hoạt động ngay cả khi đeo găng tay hoặc tay ướt.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Ở mặt sau, điện thoại đi k&egrave;m camera k&eacute;p với cảm biến ch&iacute;nh 50 MP c&oacute; khẩu độ f/1.8 v&agrave; cảm biến si&ecirc;u rộng 8 MP c&oacute; khẩu độ f/2.2. Ở mặt trước m&aacute;y đi k&egrave;m camera selfie 13 MP đặt gọn trong một notch h&igrave;nh giọt nước.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">XCover6 Pro trang bị chip Snapdragon 778G, RAM 6 GB v&agrave; bộ nhớ trong 128 GB c&oacute; thể mở rộng qua khe cắm thẻ nhớ microSD. Điểm nổi bật của điện thoại đ&oacute; l&agrave; trang bị&nbsp;<a href=\"https://thanhnien.vn/post-916072.html\" target=\"_blank\">pin rời</a>&nbsp;dung lượng 4.050 mAh. Người d&ugrave;ng c&oacute; thể sạc thiết bị bằng cổng USB-C hoặc phụ kiện độc quyền kết nối qua hai ch&acirc;n cắm ở dưới c&ugrave;ng thiết bị. Samsung sẽ kh&ocirc;ng trang bị bộ sạc k&egrave;m theo hộp của điện thoại.</span></p>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><img alt=\"Samsung trình làng smartphone 5G siêu bền với pin tháo rời - ảnh 2\" src=\"https://image.thanhnien.vn/w2048/Uploaded/2022/aybunux/2022_06_30/3645-6180.jpg\" /></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p><span style=\"font-size:14px\">C&aacute;c th&ocirc;ng số kỹ thuật ch&iacute;nh của Galaxy XCover 6 Pro</span></p>\r\n\r\n			<p><span style=\"font-size:14px\">SAMSUNG</span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><span style=\"font-size:14px\">XCover6 Pro chạy tr&ecirc;n nền tảng Android 12 với lớp t&ugrave;y biến One UI v&agrave; được Samsung hứa hẹn cung cấp đến 4 bản n&acirc;ng cấp cho hệ điều h&agrave;nh v&agrave; 5 năm&nbsp;<a href=\"https://thanhnien.vn/post-1083887.html\" target=\"_blank\">cập nhật bảo mật</a>. Điều n&agrave;y đảm bảo người d&ugrave;ng c&oacute; thể sử dụng thiết bị trong một thời gian rất d&agrave;i. Samsung cho biết bằng c&aacute;ch cung cấp c&aacute;c bản cập nhật d&agrave;i hạn sẽ gi&uacute;p giảm lượng r&aacute;c thải điện tử.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Galaxy XCover6 Pro sẽ bắt đầu c&oacute; mặt từ th&aacute;ng 7.2022 tại một số thị trường chọn lọc tr&ecirc;n khắp c&aacute;c khu vực ch&acirc;u &Acirc;u, ch&acirc;u &Aacute; v&agrave; Trung Đ&ocirc;ng. Samsung chưa x&aacute;c nhận gi&aacute; của thiết bị, tuy nhi&ecirc;n c&oacute; khả năng trong tầm 499 USD như tiền nhiệm của n&oacute;</span></p>\r\n', 1, '1757243465_nuoc-tay-trang-bi-dao-cocoon-500ml-36687-1_56988de7475144ea825fa9f07096490f_master.jpg'),
(14, 'Top nước hoa đang được giới trẻ ưa chuộng', '<p>Bạn đang t&igrave;m kiếm một chiếc laptop mạnh mẽ để phục vụ học tập, l&agrave;m việc hay giải tr&iacute; m&agrave; vẫn muốn tối ưu chi ph&iacute;? Đừng bỏ lỡ cơ hội sở hữu&nbsp;<a href=\"https://www.thegioididong.com/may-doi-tra/laptop\" rel=\"noopener\" target=\"_blank\" title=\"Laptop cũ\">laptop cũ</a>&nbsp;tại&nbsp;<a href=\"https://www.thegioididong.com/\" rel=\"noopener\" target=\"_blank\" title=\"Thế Giới Di Động\">Thế Giới Di Động</a>&nbsp;với ưu đ&atilde;i cực hấp dẫn! Tổng hợp c&aacute;c chương tr&igrave;nh đặc biệt, bạn c&oacute; thể tiết kiệm đến 40% so với m&aacute;y mới.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<h3><strong>1. Tổng hợp ưu đ&atilde;i</strong></h3>\r\n\r\n<p>- Ưu đ&atilde;i HSSV đến 200K (&Aacute;p dụng tại cửa h&agrave;ng).</p>\r\n\r\n<p>- Hỗ trợ trả g&oacute;p qua Nh&agrave; t&agrave;i ch&iacute;nh.</p>\r\n\r\n<p>- Gi&aacute; ngon v&agrave; tiết kiệm l&ecirc;n đến 40% so với m&aacute;y mới.</p>\r\n\r\n<h3><strong>2. Mua laptop đ&atilde; sử dụng tại TGDĐ c&oacute; ưu điểm g&igrave;?</strong></h3>\r\n\r\n<p>- Gi&aacute; b&aacute;n tiết kiệm hơn nhiều so với m&aacute;y mới, gi&uacute;p bạn dễ d&agrave;ng sở hữu laptop cấu h&igrave;nh tốt với chi ph&iacute; hợp l&yacute;.</p>\r\n\r\n<p>- Nguồn gốc r&otilde; r&agrave;ng, minh bạch, chỉ thu mua m&aacute;y ch&iacute;nh h&atilde;ng, được kiểm tra kỹ lưỡng trước khi b&aacute;n lại.</p>\r\n\r\n<p>- Cam kết chất lượng với quy tr&igrave;nh kiểm định nghi&ecirc;m ngặt, đảm bảo m&aacute;y hoạt động ổn định, ngoại h&igrave;nh đẹp.</p>\r\n\r\n<p>- Ch&iacute;nh s&aacute;ch bảo h&agrave;nh tốt với thời gian đa dạng.</p>\r\n\r\n<p>- C&oacute; thể mua trực tiếp tại cửa h&agrave;ng to&agrave;n quốc hoặc online, dễ d&agrave;ng kiểm tra t&igrave;nh trạng m&aacute;y, chọn mẫu ph&ugrave; hợp nhu cầu.</p>\r\n\r\n<p><img alt=\"Laptop đã sử dụng deal ngon, tiết kiệm đến 40% tại Thế Giới Di Động\" src=\"https://cdnv2.tgdd.vn/mwg-static/common/News/1577581/1.jpg\" /></p>\r\n\r\n<p>Sản phẩm lỗi kĩ thuật th&aacute;ng đầu ti&ecirc;n:</p>\r\n\r\n<p>- &Aacute;p dụng bảo h&agrave;nh hoặc ho&agrave;n tiền ph&iacute; 10% gi&aacute; trị ho&aacute; đơn.</p>\r\n\r\n<p>Từ th&aacute;ng thứ 2 trở đi:</p>\r\n\r\n<p>- Kh&ocirc;ng &aacute;p dụng đổi trả.</p>\r\n\r\n<p>- &Aacute;p dụng bảo h&agrave;nh h&atilde;ng nếu sản phẩm c&ograve;n thời gian bảo h&agrave;nh của h&atilde;ng v&agrave; đủ điều kiện bảo h&agrave;nh của h&atilde;ng.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '1757243431_moschino-toy-2_3b9a49d1383f464a9611a1113849ecb9_master.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `number`, `price`) VALUES
(244, 250, 62, 1, 2000),
(245, 251, 62, 1, 2000),
(246, 252, 62, 1, 2000),
(247, 253, 62, 1, 2000),
(248, 253, 56, 1, 26900000),
(249, 254, 76, 1, 296100),
(250, 254, 67, 1, 261000),
(251, 254, 82, 1, 168750);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `create_at` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `payment_method` enum('COD','Momo','QR') NOT NULL,
  `order_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `create_at`, `status`, `payment_method`, `order_code`) VALUES
(249, 44, '0000-00-00', 0, 'QR', 248),
(250, 44, '2025-05-07', 1, 'QR', 250),
(251, 44, '2025-05-07', 0, 'QR', 251),
(252, 44, '2025-05-07', 0, 'QR', 252),
(253, 44, '2025-05-07', 0, 'Momo', NULL),
(254, 47, '2025-09-07', 0, 'COD', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(4000) NOT NULL,
  `content` text NOT NULL,
  `hot` int(11) NOT NULL DEFAULT 0,
  `photo` varchar(500) NOT NULL,
  `price` float NOT NULL,
  `discount` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `stock` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `content`, `hot`, `photo`, `price`, `discount`, `category_id`, `stock`) VALUES
(64, 'Nước Hoa Nữ Narciso Rodriguez Narciso Eau De Parfum Cristal 30ml.', '<p>Năm 2022, một &ldquo;n&agrave;ng thơ&rdquo; mới Narciso Rodriguez l&agrave;&nbsp;<strong>Narciso Cristal EDP</strong>&nbsp;xuất hiện, tiếp tục l&agrave;m xao xuyến biết bao con tim thiếu nữ bởi hương thơm nhẹ nh&agrave;ng v&agrave; gợi cảm. Bậc thầy điều chế Natalie Gracia- Cetto l&agrave; người đứng sau hương thơm n&agrave;y. Thiết kế từ thủy tinh vu&ocirc;ng vức c&ugrave;ng m&agrave;u hồng c&aacute;nh sen dịu d&agrave;ng, nước hoa Narciso Rodriguez Cristal hớp hồn người kh&aacute;c từ &aacute;nh nh&igrave;n đầu ti&ecirc;n.</p>\r\n\r\n<p><strong>Hương đầu:</strong>&nbsp;Chanh Bergamot, Hoa cam, Hoa lan Nam Phi<br />\r\n<strong>Hương giữa:</strong>&nbsp;Hoa hồng, Hoa nh&agrave;i, Hoa trắng, Xạ hương<br />\r\n<strong>Hương cuối:</strong>&nbsp;Benzoin, Gỗ Cashmere, Hổ ph&aacute;ch, Tuyết t&ugrave;ng</p>\r\n', '<p><br />\r\n<strong>Narciso Rodriguez Cristal - Hương thơm nồng n&agrave;n đắm say</strong><br />\r\n- Hương thơm nắm giữ khoảnh khắc tỏa s&aacute;ng từ b&ecirc;n trong của người phụ nữ với nốt hương khởi đầu tươi s&aacute;ng, nốt hương trung t&acirc;m tinh tế thuần khiết c&ugrave;ng nốt hương lắng lại tr&ecirc;n da đầy gợi cảm. Khi hương thơm khai mở, vầng h&agrave;o quang lan tỏa của hoa cam rực rỡ chiếu s&aacute;ng len lỏi đến từng c&aacute;nh hoa mềm mại của những đ&oacute;a hồng căng mọng h&ograve;a quyện c&ugrave;ng những c&aacute;nh hoa trắng tinh khiết. Hương thơm dần biến chuyển, đọng lại l&agrave; nốt hương kinh điển của xạ hương trung t&acirc;m, dấu ấn ri&ecirc;ng biệt kh&ocirc;ng thể nhầm lẫn của nước hoa NARCISO.<br />\r\n<br />\r\n- Hương xạ được nhấn mạnh bởi nốt gỗ thanh lịch v&agrave; kh&iacute;a cạnh ấm &aacute;p của tuyết t&ugrave;ng v&agrave; cashmeran, đem đến cho tổng thể m&ugrave;i hương sự b&iacute; ẩn, v&agrave; lan tỏa. Một tuyệt t&aacute;c nghệ thuật h&ograve;a quyện giữa sự nhẹ nh&agrave;ng v&agrave; s&acirc;u lắng, một hương thơm chứa đựng &aacute;nh s&aacute;ng lan tỏa đối lập c&ugrave;ng sự nồng n&agrave;n. Gracia-Cetto chia sẻ: &lsquo;T&ocirc;i muốn tạo ra hương thơm n&agrave;y d&agrave;nh tặng cho vẻ đẹp nữ t&iacute;nh tỏa s&aacute;ng b&ecirc;n trong bằng c&aacute;ch l&agrave;m nổi bật hương thơm hoa cỏ, sự tươi s&aacute;ng v&agrave; hương gỗ xạ hương gợi cảm&rsquo;.<br />\r\n<br />\r\n- Hương thơm của Cristal được v&iacute; như vi&ecirc;n pha l&ecirc; lấp l&aacute;nh với nhiều mặt cắt tỏa s&aacute;ng, c&agrave;ng nh&igrave;n c&agrave;ng y&ecirc;u, c&agrave;ng ch&igrave;m đắm trong n&eacute;t đẹp tự nhi&ecirc;n. Lớp hương ban đầu rực rỡ của từng t&eacute;p cam mọng nước, tr&agrave;n đầy nhựa sống, &ldquo;n&agrave;ng&rdquo; đang soi chiếu &aacute;nh h&agrave;o quang của m&igrave;nh l&ecirc;n những c&aacute;nh hoa lan v&agrave; hoa cam tinh khiết th&ecirc;m phần gợi cảm. Lớp hương trung t&acirc;m như cả vườn hoa sặc sỡ hương sắc với những c&aacute;nh hoa mềm mại, ng&aacute;t thơm của hồng, h&ograve;a nh&agrave;i ki&ecirc;u sa, hoa trắng.<br />\r\n<br />\r\n- Note xạ hương được tăng cường c&agrave;ng l&agrave;m cho hương thơm th&ecirc;m phần lan tỏa mạnh mẽ đồng thời tạo n&eacute;t b&iacute; ẩn khiến cho đối phương bị khi&ecirc;u kh&iacute;ch nhiều hơn. Nước hoa Narciso Rodriguez Cristal kh&eacute;p lại trong v&ograve;ng tay ấm &aacute;p của note gỗ c&ugrave;ng hổ ph&aacute;ch ngọt lịm tim. Tất cả những n&eacute;t tươi trẻ, thơ mộng, cuốn h&uacute;t của tuổi thanh xu&acirc;n như được chứa đựng trong Cristal, hương thơm hứa hẹn sự cuốn h&uacute;t bất diệt gi&agrave;nh cho những ai tr&oacute;t y&ecirc;u &ldquo;n&agrave;ng thơ&rdquo; mới của nh&agrave; Narciso Rodriguez.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://lh3.googleusercontent.com/GuuNc_4czqVnCyPpWxoOAVl94nG6qYy107cJk6mVxZUkNZfQm48jEWrQd56T6fUH5KMgozOJVX2xIrANtKcW1XGZ1SsqBa6Z=rw\" /></p>\r\n\r\n<p><img src=\"https://cdn.cosmetics.vn/nuoc-hoa/v/narciso-rodriguez-narciso-eau-de-perfume-edp-spray-30ml-3423222055608-1.jpg\" /></p>\r\n\r\n<p><br />\r\n<strong>Narciso Rodriguez Cristal - Thiết kế nữ t&iacute;nh, quyển rũ</strong><br />\r\nVẫn mang thiết kế của c&aacute;c d&ograve;ng Narciso nhỏ gọn, xinh xắn trước đ&oacute;, d&aacute;ng chai vu&ocirc;ng vứt của Cristal kh&ocirc;ng hề th&ocirc; cứng khi được kho&aacute;c l&ecirc;n m&igrave;nh bộ c&aacute;nh hồng pastel đầy nữ t&iacute;nh v&agrave; gợi cảm. Thiết kế thủy tinh trong suốt tinh tế để lộ m&agrave;u nước &aacute;nh hồng nhẹ nh&agrave;ng quyến rũ.<br />\r\n<br />\r\nNếu bạn l&agrave; một t&iacute;n đồ y&ecirc;u m&agrave;u hồng, th&igrave; chắc chắn Narciso Rodriguez Cristal sẽ khiến n&agrave;ng đốn tim bởi vẻ đẹp nh&atilde; nhặn, thanh tho&aacute;t của bao b&igrave; cho đến hương thơm đầy gọi mời v&agrave; l&ocirc;i cuốn.</p>\r\n\r\n<p><strong>Thương hiệu:</strong>&nbsp;Narciso Rodriguez<br />\r\n<strong>Xuất xứ:</strong>&nbsp;France<br />\r\n<strong>Nh&oacute;m hương:</strong>&nbsp;Hương gỗ hoa cỏ xạ hương<br />\r\n<strong>Phong c&aacute;ch:</strong>&nbsp;Nữ t&iacute;nh, Quyến rũ, Tinh tế</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, '1757239168_Narciso.jpg', 1610400, 20, 47, 1),
(65, 'Nước Hoa Nam Montblanc Legend For Men Edp 100ml.', '<p>Thương hiện&nbsp;<strong>Mont Blanc</strong>&nbsp;đ&atilde; cho giới thiệu mẫu nước hoa d&agrave;nh cho ph&aacute;i nam mới mang t&ecirc;n&nbsp;<strong>Legend</strong>, được ra mắt v&agrave;o th&aacute;ng 4/2011.&nbsp;<strong>Montblanc Legend EDP&nbsp;</strong>l&agrave; một m&ugrave;i hương d&agrave;nh cho những người đ&agrave;n &ocirc;ng tự tin v&agrave; c&oacute; đam m&ecirc;. Hương thơm tinh tế v&agrave; rất nổi bật. Người s&aacute;ng chế ra m&ugrave;i hương nước hoa n&agrave;y l&agrave; Olivier Pescheux. Hương thơm Fougere n&agrave;y với một m&ugrave;i hương nam t&iacute;nh, kh&ocirc; r&aacute;o, thể hiện sự mạnh mẽ v&agrave; đồng thời cũng nhẹ nh&agrave;ng, thẳng thắng v&agrave; b&iacute; ẩn.</p>\r\n', '<p>Chai nước hoa c&oacute; th&acirc;n h&igrave;nh nặng trĩu c&ugrave;ng với những đường cong mềm mại&nbsp;được l&agrave;m bằng thủy tinh&nbsp;đen tuyền v&agrave; kim loại. Thiết kế n&agrave;y được lấy cảm hứng từ thiết kế b&uacute;t&nbsp;Meisterst&uuml;ck. thiết kế tối giản nhưng v&ocirc; c&ugrave;ng sang trọng, rất th&iacute;ch hợp với kh&aacute;i niệm của&nbsp;<strong>Montblanc Legend EDP .</strong></p>\r\n\r\n<p>Legend l&agrave; một m&ugrave;i hương nam t&iacute;nh, hấp dẫn những người đ&agrave;n &ocirc;ng can đảm v&agrave;&nbsp;tự tin.<strong>&nbsp;Montblanc Legend EDP&nbsp;</strong>c&oacute; hương thơm nổi bật v&agrave;&nbsp;tinh tế. M&ugrave;i hương tuy đơn giản song mạnh mẽ nhưng lại kh&ocirc;ng qu&aacute; nồng nặc.&nbsp;<strong>Legend&nbsp;</strong>sẽ gi&uacute;p bạn để lại ấn tượng bất cứ nơi n&agrave;o bạn đặt ch&acirc;n đến.</p>\r\n\r\n<p>Một m&ugrave;i hương tươi m&aacute;t, gợi cảm, Thể hiện sự nam t&iacute;nh nhưng kh&ocirc;ng g&acirc;y kh&oacute; chịu cho những người xung quanh với độ lưu hương tuyệt hảo</p>\r\n\r\n<p><img src=\"https://file.hstatic.net/200000117693/file/montblanc_legend_edp_100mlg_08982981a3fa4719b5c4896f67a4ac25_grande.jpg\" /></p>\r\n\r\n<p>Đ&acirc;y l&agrave; m&ugrave;i hương fougere cổ điển nhưng rất tinh tế với m&ugrave;i r&ecirc;u sồi. Lớp hương đầu &nbsp;mở ra l&agrave; hương cam bergamot, cỏ roi ngựa v&agrave; oải hương. Lớp hương giữa l&agrave; hương hoa l&agrave;i, gỗ tuyết t&ugrave;ng trắng v&agrave; quả mận miền nam. Lớp hương cuối pha trộn hương r&ecirc;u nh&acirc;n tạo với ambroxan,&nbsp;hương gỗ đ&agrave;n hương, đậu tonka.</p>\r\n\r\n<p><img src=\"https://file.hstatic.net/200000117693/file/montblanc_legend_edp_100mlff_1dab37b6641048478ef4c25dbaeca93d_grande.jpg\" /></p>\r\n\r\n<p><strong>C&aacute;ch sử dụng đề xuất d&agrave;nh cho bạn:</strong></p>\r\n\r\n<ul>\r\n	<li>Nước hoa mang lại m&ugrave;i hương cho cơ thể bạn th&ocirc;ng qua việc tiếp x&uacute;c l&ecirc;n da v&agrave; phản ứng với hơi ấm tr&ecirc;n cơ thể của bạn. Việc được tiếp x&uacute;c với c&aacute;c bộ phận như cổ tay, khuỷu tay, sau tai, g&aacute;y, cổ trước l&agrave; những vị tr&iacute; được ưu ti&ecirc;n h&agrave;ng đầu trong việc sử dụng nước hoa bởi sự k&iacute;n đ&aacute;o v&agrave; thuận lợi trong việc tỏa m&ugrave;i hương.</li>\r\n	<li>Sau khi sử dụng, xịt nước hoa l&ecirc;n cơ thể, tr&aacute;nh d&ugrave;ng tay ch&agrave; x&aacute;t hoặc l&agrave;m kh&ocirc; da bằng những vật dụng kh&aacute;c, điều n&agrave;y ph&aacute; vỡ c&aacute;c tầng hương trong nước hoa, khiến n&oacute; c&oacute; thể thay đổi m&ugrave;i hương hoặc bay m&ugrave;i nhanh hơn.</li>\r\n	<li>Để chai nước hoa c&aacute;ch vị tr&iacute; cần d&ugrave;ng nước hoa trong khoảng 15-20cm v&agrave; xịt mạnh, dứt kho&aacute;t để mật đổ phủ của nước hoa được rộng nhất, tăng độ b&aacute;m tỏa tr&ecirc;n da của bạn.</li>\r\n	<li>Phần cổ tay được xịt nước hoa thường c&oacute; nhiều t&aacute;c động như l&uacute;c rửa tay, đeo v&ograve;ng, đồng hồ, do đ&oacute; để đảm bảo m&ugrave;i hương được duy tr&igrave;, bạn n&ecirc;n sử dụng nước hoa ở cổ tay ở tần suất nhiều hơn l&uacute;c cần thiết.</li>\r\n	<li>Nước hoa c&oacute; thể b&aacute;m tốt hay kh&ocirc;ng tốt t&ugrave;y thuộc v&agrave;o thời gian, kh&ocirc;ng gian, cơ địa, chế độ sinh hoạt, ăn uống của bạn, việc sử dụng một loại nước hoa trong thời gian d&agrave;i c&oacute; thể khiến bạn bị quen m&ugrave;i, dẫn đến hiện tượng kh&ocirc;ng nhận biết được m&ugrave;i hương. Mang theo nước hoa b&ecirc;n m&igrave;nh hoặc trang bị những mẫu mini tiện dụng để gi&uacute;p bản th&acirc;n lu&ocirc;n tự tin mọi l&uacute;c mọi nơi.</li>\r\n</ul>\r\n\r\n<p><strong>Bảo quản nước hoa:</strong></p>\r\n\r\n<ul>\r\n	<li>Nước hoa phổ th&ocirc;ng (Designer) thường kh&ocirc;ng c&oacute; hạn sử dụng, ở một số Quốc gia, việc ghi ch&uacute; hạn sử dụng l&agrave; điều bắt buộc để h&agrave;ng h&oacute;a được b&aacute;n ra tr&ecirc;n thị trường. Hạn sử dụng ở một số d&ograve;ng nước hoa được ch&uacute; th&iacute;ch từ 24 đến 36 th&aacute;ng, v&agrave; t&iacute;nh từ ng&agrave;y bạn mở sản phẩm v&agrave; sử dụng lần đầu ti&ecirc;n.</li>\r\n	<li>Nước hoa l&agrave; tổng hợp của nhiều th&agrave;nh phần hương liệu tự nhi&ecirc;n v&agrave; tổng hợp, n&ecirc;n bảo quản nước hoa ở những nơi kh&ocirc; tho&aacute;ng, m&aacute;t mẻ, tr&aacute;nh nắng, n&oacute;ng hoặc qu&aacute; lạnh, lưu &yacute; kh&ocirc;ng để nước hoa trong cốp xe, những nơi c&oacute; nhiệt độ n&oacute;ng lạnh thất thường...</li>\r\n</ul>\r\n', 0, '1757239343_Montblanc_Legend.jpg', 2100000, 25, 46, 1),
(66, 'Nước Hoa Nữ Moschino Toy 2 Edp 30ml (Moschino Toy 2 EDP 30ml).', '<p><strong>Nước Hoa Nữ Moschino Toy 2 EDP</strong>&nbsp;</p>\r\n\r\n<p><strong>Moschino</strong>&nbsp;được biết đến l&agrave; một c&aacute;i t&ecirc;n&nbsp;<strong>nổi loạn, ph&aacute; c&aacute;ch</strong>&nbsp;v&agrave; lu&ocirc;n mang đậm dấu ấn ri&ecirc;ng trong ng&agrave;nh thời trang cao cấp &Yacute;. D&ograve;ng nước hoa&nbsp;<strong>Moschino</strong>&nbsp;kế thừa tinh thần đ&oacute; &ndash; tươi mới, trẻ trung, t&aacute;o bạo v&agrave; đầy m&agrave;u sắc.</p>\r\n\r\n<p>Sau th&agrave;nh c&ocirc;ng vang dội của&nbsp;<strong>Moschino Toy</strong>&nbsp;&ndash; chai nước hoa h&igrave;nh ch&uacute; gấu b&ocirc;ng ra mắt năm 2014, thương hiệu tiếp tục chiều l&ograve;ng người h&acirc;m mộ bằng phi&ecirc;n bản nữ t&iacute;nh hơn &ndash;&nbsp;<strong>Moschino Toy 2</strong>, ra mắt năm&nbsp;<strong>2018</strong>&nbsp;v&agrave; ch&iacute;nh thức tr&igrave;nh l&agrave;ng trong&nbsp;<strong>buổi tr&igrave;nh diễn thời trang xu&acirc;n 2019</strong>&nbsp;tại Milan với&nbsp;<strong>Kendall Jenner</strong>&nbsp;l&agrave;m gương mặt đại diện.</p>\r\n\r\n<p>Toy 2 l&agrave; kết quả của sự s&aacute;ng tạo từ&nbsp;<strong>hai bậc thầy nước hoa</strong>:&nbsp;<strong>Alberto Morillas</strong>&nbsp;v&agrave;&nbsp;<strong>Fabrice Pellegrin</strong>, mang đến một&nbsp;<strong>m&ugrave;i hương độc đ&aacute;o, nhẹ nh&agrave;ng v&agrave; sảng kho&aacute;i</strong>, rất ph&ugrave; hợp với kh&ocirc;ng kh&iacute;&nbsp;<strong>m&ugrave;a Xu&acirc;n - H&egrave;</strong>, đặc biệt l&agrave; những c&ocirc; g&aacute;i y&ecirc;u th&iacute;ch phong c&aacute;ch&nbsp;<strong>trẻ trung, hiện đại nhưng vẫn mềm mại, nữ t&iacute;nh.</strong></p>\r\n', '<p><img src=\"https://file.hstatic.net/200000117693/file/1564039203.602_7afe4d244c1b4cffae202f42adb37136_grande.jpg\" /></p>\r\n\r\n<p>Moschino Toy 2 Eau De Parfum mở đầu bằng&nbsp;<strong>sự b&ugrave;ng nổ sảng kho&aacute;i</strong>&nbsp;của&nbsp;<strong>quả qu&yacute;t hồng, t&aacute;o xanh v&agrave; hoa mộc lan</strong>, mang đến cảm gi&aacute;c&nbsp;<strong>m&aacute;t l&agrave;nh, đầy năng lượng</strong>&nbsp;như một buổi sớm m&ugrave;a h&egrave; nhẹ t&ecirc;nh.</p>\r\n\r\n<p>Tầng hương giữa dịu d&agrave;ng hơn với&nbsp;<strong>hoa mẫu đơn, hoa nh&agrave;i v&agrave; quả l&yacute; chua trắng</strong>, tạo n&ecirc;n một sự nữ t&iacute;nh&nbsp;<strong>tinh tế, thanh lịch</strong>, vừa đủ ngọt ng&agrave;o nhưng kh&ocirc;ng hề g&acirc;y gắt.</p>\r\n\r\n<p>Cuối c&ugrave;ng, sự ấm &aacute;p v&agrave; l&ocirc;i cuốn đến từ&nbsp;<strong>gỗ đ&agrave;n hương, xạ hương v&agrave; amberwood</strong>, bao trọn lấy cơ thể như một c&aacute;i &ocirc;m nhẹ nh&agrave;ng,&nbsp;<strong>vừa mềm mại vừa gợi cảm</strong>.</p>\r\n\r\n<ul>\r\n	<li><strong>Hương đầu:</strong>&nbsp;Quả qu&yacute;t hồng, Quả t&aacute;o xanh, Hoa mộc lan</li>\r\n	<li><strong>Hương giữa:</strong>&nbsp;Hoa mẫu đơn, Quả l&yacute; chua trắng, Hoa nh&agrave;i</li>\r\n	<li><strong>Hương cuối:</strong>&nbsp;Gỗ đ&agrave;n hương, Amberwood, Xạ hương</li>\r\n</ul>\r\n\r\n<p><img alt=\"Nước hoa Nữ Moschino Toy 2\" src=\"https://bizweb.dktcdn.net/thumb/grande/100/516/042/products/moschino-toy-2-la-jolie-perfumes03-1716443513572.jpg?v=1716443518843\" /></p>\r\n\r\n<p>Moschino Toy 2&nbsp;<strong>g&acirc;y ấn tượng mạnh mẽ ngay từ c&aacute;i nh&igrave;n đầu ti&ecirc;n</strong>&nbsp;bởi&nbsp;<strong>h&igrave;nh tượng ch&uacute; gấu Teddy quen thuộc</strong>, lần n&agrave;y được&nbsp;<strong>chế t&aacute;c từ thủy tinh trong suốt</strong>&nbsp;kết hợp&nbsp;<strong>thủy tinh mờ sang trọng</strong>, lộ r&otilde; dung dịch nước hoa b&ecirc;n trong.</p>\r\n\r\n<p><strong>Phần đầu chai</strong>&nbsp;ch&iacute;nh l&agrave; chiếc nắp mang h&igrave;nh đầu ch&uacute; gấu, điểm th&ecirc;m&nbsp;<strong>chiếc v&ograve;ng cổ m&agrave;u v&agrave;ng kim loại &aacute;nh sang trọng</strong>, tạo n&ecirc;n một thiết kế&nbsp;<strong>tinh tế nhưng vẫn vui tươi v&agrave; s&aacute;ng tạo</strong>&nbsp;&ndash; đậm chất Moschino.</p>\r\n\r\n<p>Bao b&igrave; b&ecirc;n ngo&agrave;i cũng&nbsp;<strong>t&aacute;i hiện h&igrave;nh d&aacute;ng ch&uacute; gấu</strong>&nbsp;y hệt chai nước hoa b&ecirc;n trong, tạo n&ecirc;n tổng thể đồng nhất, nổi bật giữa v&ocirc; v&agrave;n sản phẩm tr&ecirc;n kệ trưng b&agrave;y.</p>\r\n\r\n<p><img src=\"https://file.hstatic.net/200000117693/file/moschini-toy-2-1-jpg-1584503321-18032020104841_45220de66d6b491d8c39fb55fdbf57d6_grande.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Th&ocirc;ng tin chi tiết sản phẩm</strong></h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Thương hiệu</strong>: Moschino</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Nh&agrave; s&aacute;ng tạo</strong>: Alberto Morillas &amp; Fabrice Pellegrin</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Nồng độ</strong>: Eau De Parfum (EDP)</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Độ lưu hương</strong>: 6 &ndash; 8 tiếng</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Tỏa hương</strong>: Trong b&aacute;n k&iacute;nh khoảng 1 c&aacute;nh tay</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Phong c&aacute;ch</strong>: Trẻ trung &ndash; Tươi m&aacute;t &ndash; Dịu d&agrave;ng</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Giới t&iacute;nh</strong>: Nữ</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Nh&oacute;m hương</strong>: Floral Woody Musk (Hương hoa cỏ, gỗ v&agrave; xạ hương)</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Dung t&iacute;ch phổ biến</strong>: 30ml</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Xuất xứ</strong>: Italy</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Năm ph&aacute;t h&agrave;nh</strong>: 2018</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Thời điểm khuy&ecirc;n d&ugrave;ng</strong>: Xu&acirc;n, Hạ, Thu &ndash; Ban ng&agrave;y</p>\r\n	</li>\r\n</ul>\r\n', 0, '1757239463_moschino-toy-2_3b9a49d1383f464a9611a1113849ecb9_master.jpg', 864600, 40, 47, 1),
(67, 'Nước Tẩy Trang Bí Đao 500ml.', '<p>Nước Tẩy Trang Cocoon Chiết Xuất B&iacute; Đao L&agrave;m Sạch Da Winter Melon Micellar Water 500ml&nbsp;l&agrave;&nbsp;nước tẩy trang&nbsp;đến từ&nbsp;thương hiệu mỹ phẩm thuần chay Cocoon&nbsp;của Việt Nam,&nbsp;gi&uacute;p l&agrave;m sạch lớp trang điểm, kh&oacute;i bụi tr&ecirc;n da một c&aacute;ch nhẹ nh&agrave;ng, th&ocirc;ng tho&aacute;ng lỗ ch&acirc;n l&ocirc;ng, v&agrave; kiểm so&aacute;t dầu nhờn hiệu quả.</p>\r\n', '<h3><strong>Loại da ph&ugrave; hợp:</strong></h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Da dầu</p>\r\n	</li>\r\n	<li>\r\n	<p>Da mụn</p>\r\n	</li>\r\n</ul>\r\n\r\n<h3><strong>C&ocirc;ng dụng:&nbsp;</strong></h3>\r\n\r\n<ul>\r\n	<li>L&agrave;m sạch lớp trang điểm, bụi bẩn v&agrave; b&atilde; nhờn tr&ecirc;n bề mặt da&nbsp;</li>\r\n	<li>L&agrave;m sạch da bụi bẩn v&agrave; dầu thừa, sạch lớp trang điểm&nbsp;</li>\r\n	<li>Mang đến l&agrave;n da sạch v&agrave; mềm mịn</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://file.hstatic.net/200000117693/file/8936104220827_cocoon_nuoc_tay_trang_bi_dao__01__a8ece1873ad647b7b3900f669cae371f_grande.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Ưu thế nổi bật:</strong></h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Th&agrave;nh phần<strong>&nbsp;B&iacute; đao</strong>&nbsp;l&agrave;m m&aacute;t, l&agrave;m giảm nhiệt, kh&aacute;ng vi&ecirc;m v&agrave; diệt khuẩn gi&uacute;p giảm t&igrave;nh trạng mụn trứng c&aacute;, mụn vi&ecirc;m.</p>\r\n	</li>\r\n	<li>\r\n	<p>Th&agrave;nh phần&nbsp;<strong>Rau m&aacute;</strong>&nbsp;tăng sinh collagen cho l&agrave;n da, kh&aacute;ng vi&ecirc;m, l&agrave;m dịu c&aacute;c vết đỏ v&agrave; giảm k&iacute;ch ứng.</p>\r\n	</li>\r\n	<li>\r\n	<p>Tinh dầu<strong>&nbsp;tr&agrave;m tr&agrave;</strong>&nbsp;giảm mụn trứng c&aacute;, vết thương, c&ocirc;n tr&ugrave;ng cắn.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>T</strong>&aacute;c dụng bảo vệ tế b&agrave;o da khỏi căng thẳng từ m&ocirc;i trường b&ecirc;n ngo&agrave;i như bức xạ UV, &ocirc; nhiễm m&ocirc;i trường v&agrave; tăng khả năng giữ ẩm cho da dưới t&aacute;c động của nhiệt độ v&agrave; kh&oacute;i bụi.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>C</strong>&oacute; khả năng kh&aacute;ng khuẩn v&agrave; diệt khuẩn g&acirc;y mụn.</p>\r\n	</li>\r\n	<li>\r\n	<p>Loại bỏ mọi lớp trang điểm, dầu thừa, bụi bẩn tr&ecirc;n da dầu nhờn một c&aacute;ch tối ưu, đảm bảo l&agrave;n da sạch th&ocirc;ng tho&aacute;ng kh&ocirc;ng g&acirc;y b&iacute;t tắc lỗ ch&acirc;n l&ocirc;ng.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://file.hstatic.net/200000117693/file/8936104220827_cocoon_nuoc_tay_trang_bi_dao__05__a7c0c8caf0864c78846aca66aefebb59_grande.jpg\" /></p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<h3><strong>Hướng dẫn sử dụng:</strong></h3>\r\n\r\n<p>Thấm đều sản phẩm l&ecirc;n b&ocirc;ng tẩy trang, nhẹ nh&agrave;ng lau khắp mặt để l&agrave;m sạch lớp trang điểm v&agrave; bụi bẩn. Dịu nhẹ cho v&ugrave;ng m&ocirc;i v&agrave; mắt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://file.hstatic.net/200000117693/file/review-chan-thuc-2-loai-nuoc-tay-trang-cocoon_777b00eec5de4d00aff692e0d65f93a0_grande.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Xuất xứ&nbsp;thương hiệu</strong>&nbsp;&nbsp; Việt Nam</p>\r\n\r\n<p><strong>Điều kiện bảo quản</strong>&nbsp;&nbsp;&nbsp;&nbsp; Nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t. Tr&aacute;nh &aacute;nh nắng trực tiếp v&agrave; nhiệt độ cao. Đậy nắp k&iacute;n sau khi sử dụng.</p>\r\n\r\n<p><strong>Hạn sử dụng</strong>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;3 năm kể từ ng&agrave;y sản xuất</p>\r\n', 0, '1757239570_nuoc-tay-trang-bi-dao-cocoon-500ml-36687-1_56988de7475144ea825fa9f07096490f_master.jpg', 261000, 10, 48, 1),
(68, 'Nước Tẩy Trang Evoluderm Cho Da Khô Và Nhạy Cảm 500ml.', '<h1><em><strong>Nước Tẩy Trang Evoluderm Cho Da Kh&ocirc; V&agrave; Nhạy Cảm 500ml</strong></em></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em><strong>Evoluderm&nbsp;</strong>l&agrave; thương hiệu xuất xứ Ph&aacute;p được ch&iacute;nh thức s&aacute;ng lập bởi Nathalie &amp; Gabriel v&agrave;o năm 2004. Khởi đầu từ niềm đam m&ecirc; về mỹ phẩm chăm s&oacute;c da ấp ủ từ những năm 1984, họ đ&atilde; hợp t&aacute;c c&ugrave;ng c&aacute;c nh&agrave; khoa học với tham vọng ph&aacute;t triển một thương hiệu mỹ phẩm ri&ecirc;ng, đạt c&aacute;c ti&ecirc;u chuẩn về chất lượng, vừa t&uacute;i tiền của mọi người, v&agrave; kể từ đ&oacute; thương hiệu Evoluderm ch&iacute;nh thức ra đời. C&aacute;c sản phẩm Evoluderm sau đ&oacute; nhanh ch&oacute;ng được ph&acirc;n phối rộng khắp tại 4 Ch&acirc;u lục v&agrave; 60 quốc gia tr&ecirc;n to&agrave;n cầu.&nbsp;</em></p>\r\n', '<h2><strong>TH&Ocirc;NG TIN CHI TIẾT</strong></h2>\r\n\r\n<p>Tấy trang l&agrave; một bước tuy đơn giản nhưng kh&aacute; quan trọng đối với l&agrave;n da, bởi sau một ng&agrave;y l&agrave;m việc v&agrave; tiếp x&uacute;c với m&ocirc;i trường b&ecirc;n ngo&agrave;i, hoặc sau một lớp kem trang điểm, da của bạn sẽ phải &ldquo;chiến đấu&rdquo; để chống lại c&aacute;c bụi bẩn, cặn b&atilde; hoặc h&oacute;a chất.&nbsp;</p>\r\n\r\n<p>Việc tẩy trang giống như một vũ kh&iacute; đắc lực hỗ trợ cho l&agrave;n da trong qu&aacute; tr&igrave;nh &ldquo;chiến đấu&rdquo; ấy. Nếu c&oacute; sự hỗ trợ của tẩy trang, l&agrave;n da sẽ kh&ocirc;ng cần phải &ldquo;gồng m&igrave;nh&rdquo; l&ecirc;n để t&aacute;i tạo l&agrave;n da. Ngo&agrave;i ra, c&aacute;c th&agrave;nh phần trong nước tẩy trang hiện nay cũng gi&uacute;p dưỡng ẩm cho da v&agrave; gi&uacute;p đẩy nhanh qu&aacute; tr&igrave;nh t&aacute;i tạo da.&nbsp;</p>\r\n\r\n<p><strong>Nước Tẩy Trang Evoluderm Cho Da Kh&ocirc; V&agrave; Nhạy Cảm 500ml</strong><strong>&nbsp;</strong>với cam kết&nbsp;kh&ocirc;ng paraben, kh&ocirc;ng acohol&nbsp; đ&atilde; được kiểm nghiệm da liễu chắc chắn sẽ l&agrave;m bất cứ bạn g&aacute;i n&agrave;o cũng y&ecirc;n t&acirc;m.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>C&Ocirc;NG&nbsp;DỤNG</strong></h3>\r\n\r\n<p>- Nhẹ nh&agrave;ng l&agrave;m sạch dầu nhờn, bụi bẩn c&ugrave;ng lớp trang điểm cứng đầu tr&ecirc;n da.</p>\r\n\r\n<p>- Gi&uacute;p da kh&ocirc; tho&aacute;ng, sạch s&acirc;u ho&agrave;n to&agrave;n.</p>\r\n\r\n<p>- Dưỡng ẩm dịu nhẹ l&agrave;n da, bổ sung độ ẩm cho da mềm mịn v&agrave; tươi m&aacute;t hơn.</p>\r\n\r\n<p>- Sản phẩm sử dụng được cho cả mắt, mặt v&agrave; m&ocirc;i.</p>\r\n\r\n<p>- Th&agrave;nh phần an to&agrave;n, dịu nhẹ kh&ocirc;ng g&acirc;y k&iacute;ch ứng da.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://file.hstatic.net/200000117693/file/nuoc_tay_trang_evoluderm_cho_da_de_kich_ung___nhay_cam_500ml_5dc77dc400714ca58de590c903242aff_grande.png\" /></p>\r\n\r\n<p><em>Dong-san-pham-nuoc-tay-trang-Evoluderm</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>TH&Ocirc;NG SỐ SẢN PHẨM&nbsp;</strong></h2>\r\n\r\n<p>-&nbsp;<strong>Dung t&iacute;ch:&nbsp;</strong>500ml</p>\r\n\r\n<p>-&nbsp;<strong>Loại da:</strong>&nbsp;Da kh&ocirc; v&agrave; da nhạy cảm&nbsp;</p>\r\n\r\n<p>-&nbsp;<strong>Đối tượng</strong>: ph&ugrave; hợp cho nam v&agrave; nữ&nbsp;</p>\r\n\r\n<p>-&nbsp;<strong>Xuất xứ:</strong>&nbsp;Ph&aacute;p&nbsp;</p>\r\n\r\n<p>-&nbsp;<strong>Thương hiệu:&nbsp;</strong>Evoluderm</p>\r\n\r\n<p>-&nbsp;<strong>HSD:</strong>&nbsp;3 Năm kể từ ng&agrave;y sản xuất.&nbsp;&nbsp;</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<h2><strong>HƯỚNG DẪN SỬ DỤNG&nbsp;</strong></h2>\r\n\r\n<p>- D&ugrave;ng b&ocirc;ng tẩy trang thấm một lượng vừa đủ r&ocirc;̀i lau nhẹ nh&agrave;ng l&ecirc;n da. Đ&ocirc;́i với vùng mắt m&ocirc;i có th&ecirc;̉ lau nhẹ 2-3 l&acirc;̀n đ&ecirc;̉ ra mắt lớp n&ecirc;̀n matte.</p>\r\n\r\n<p>- Kh&ocirc;ng cần rửa lại với nước<strong>.</strong></p>\r\n', 0, '1757239661_nuoc_tay_trang_evoluderm_cho_da_kho_va_nhay_cam_500ml1_ca9d5ae53aeb4b529671c4814379c58f_master.png', 139750, 57, 48, 1),
(69, 'Gel Rửa Mặt Tràm Trà 0.5% BHA Có Độ pH Thấp Cosrx Low pH Good Morning Gel Cleanser 150ml.', '<p><strong>Gel Rửa Mặt Cosrx Tr&agrave;m Tr&agrave;, 0.5% BHA C&oacute; Độ pH Thấp</strong>&nbsp;l&agrave; d&ograve;ng&nbsp;sữa rửa mặt&nbsp;đến từ&nbsp;thương hiệu mỹ phẩm Cosrx&nbsp;của H&agrave;n Quốc, với độ pH l&yacute; tưởng 4.5 - 5.5 sản phẩm an to&agrave;n v&agrave; dịu nhẹ tr&ecirc;n mọi l&agrave;n da ngay cả l&agrave;n da nhạy cảm v&agrave; da mụn. Gel rửa mặt chứa 0,5% BHA tự nhi&ecirc;n v&agrave; chiết xuất tr&agrave;m tr&agrave; l&agrave;m sạch s&acirc;u lỗ ch&acirc;n l&ocirc;ng, hỗ trợ kh&aacute;ng khuẩn, l&agrave;m sạch mụn đồng thời tẩy da chết nhẹ nh&agrave;ng.</p>\r\n', '<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://media.hcdn.vn/catalog/product/g/e/gel-rua-mat-cosrx-tram-tra-0-5-bha-co-do-ph-thap-150ml-3-1742179497.jpg\" /></p>\r\n\r\n<p><img src=\"https://media.hcdn.vn/catalog/product/g/e/gel-rua-mat-cosrx-tram-tra-0-5-bha-co-do-ph-thap-150ml-2-1742179497.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Ưu thế nổi bật của&nbsp;Gel Rửa Mặt Cosrx Low pH Good Morning Gel Cleanser:</strong></p>\r\n\r\n<p>-&nbsp;<strong>Độ pH l&yacute; tưởng 4.5 - 5.5</strong>&nbsp;kh&ocirc;ng g&acirc;y kh&ocirc; căng da sau khi rửa mặt, giữ độ ẩm c&acirc;n bằng tự nhi&ecirc;n cho da.</p>\r\n\r\n<p>-&nbsp;<strong>Chiết xuất</strong>&nbsp;<strong>tinh dầu tr&agrave;m tr&agrave;</strong>&nbsp;<strong>kết hợp với</strong>&nbsp;<strong>0,5% BHA tự nhi&ecirc;n</strong>&nbsp;c&oacute; khả năng kh&aacute;ng khuẩn, loại bỏ mụn, tẩy tế b&agrave;o chết nhẹ nh&agrave;ng mang lại l&agrave;n da sạch tho&aacute;ng.</p>\r\n\r\n<p>-<strong>&nbsp;Allantoin</strong>&nbsp;c&oacute; c&ocirc;ng dụng l&agrave;m dịu, dưỡng ẩm l&agrave;n da giữ da mềm mại sau khi rửa mặt.</p>\r\n\r\n<p>- Kết cấu dạng gel trong suốt v&agrave; c&oacute; khả năng tạo bọt nhẹ nh&agrave;ng gi&uacute;p loại sạch bụi bẩn dư thừa tr&ecirc;n da.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Combo 2 Gel Rửa Mặt Cosrx Tràm Trà, 0.5% BHA Có Độ pH Thấp 150ml | Hasaki.vn\" src=\"https://media.hcdn.vn/catalog/product/c/o/combo-2-gel-rua-mat-cosrx-tram-tra-0-5-bha-co-do-ph-thap-150ml-4-1742179588.jpg\" /></p>\r\n\r\n<p><img src=\"https://product.hstatic.net/200000610091/product/274341923_478559290526958_2708590857027187682_n_f779a90d02334db29c465820d89349ae_1024x1024.jpg\" /></p>\r\n\r\n<p><img src=\"https://product.hstatic.net/1000006063/product/cosrxe_copy_a61497119128422d95fd935fa799fd27_1024x1024_6e508da641df4c0e9e1ccd158673811c_1024x1024.jpg\" /></p>\r\n\r\n<p><img src=\"https://product.hstatic.net/1000006063/product/10_0fb51d3cd1fd402ab42521b69a5fe553_1024x1024.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Gel Rửa Mặt Cosrx Low pH Good Morning Gel Cleanser ph&ugrave; hợp với loại da n&agrave;o?</strong></p>\r\n\r\n<p>Sản phẩm ph&ugrave; hợp với mọi loại da.&nbsp;Đặc biệt da nhạy cảm, da kh&ocirc; v&agrave; da mụn.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Đối tượng sử dụng&nbsp;Gel Rửa Mặt Cosrx Low pH Good Morning Gel Cleanser:</strong></p>\r\n\r\n<p>- Da nhạy cảm, dễ l&ecirc;n mụn.</p>\r\n\r\n<p>- Da kh&ocirc; sần hay c&oacute; tế b&agrave;o chết.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Độ an to&agrave;n:</strong></p>\r\n\r\n<p>- Kh&ocirc;ng cồn</p>\r\n\r\n<p>- Kh&ocirc;ng chất tẩy rửa (Sulfates)</p>\r\n\r\n<p>- Kh&ocirc;ng hương liệu ho&aacute; học (Phthalates)</p>\r\n\r\n<p>- Kh&ocirc;ng Paraben</p>\r\n\r\n<p>- Kh&ocirc;ng thử nghiệm tr&ecirc;n động vật</p>\r\n\r\n<p><em><strong>*Lưu &yacute;:</strong>&nbsp;</em>Sản phẩm kh&ocirc;ng chứa hương liệu nhưng c&oacute; th&agrave;nh phần Tr&agrave;m tr&agrave; v&agrave; BHA do đ&oacute; sẽ c&oacute; m&ugrave;i hương đặc biệt từ c&aacute;c th&agrave;nh phần n&agrave;y.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Bảo quản:</strong></p>\r\n\r\n<p>Nơi kh&ocirc; r&aacute;o tho&aacute;ng m&aacute;t.</p>\r\n\r\n<p>Tr&aacute;nh &aacute;nh nắng trực tiếp, nơi c&oacute; nhiệt độ cao hoặc ẩm ướt.</p>\r\n\r\n<p>Đậy nắp k&iacute;n sau khi sử dụng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Ng&agrave;y sản xuất:</strong>&nbsp;Xem chi tiết tr&ecirc;n bao b&igrave;.</p>\r\n\r\n<p><strong>Hạn sử dụng:</strong>&nbsp;3 năm kể từ ng&agrave;y sản xuất.</p>\r\n', 0, '1757239749_8809416470511-back_4803797258414d04947fd70ab7a65090_master.jpg', 109000, 64, 49, 1),
(70, 'Sữa Rửa Mặt Dành Cho Da Nhạy Cảm Cetaphil Gentle Skin Cleanser 500ml.', '<p><strong>Sữa Rửa Mặt Cetaphil Gentle Skin Cleanser</strong>&nbsp;từ thương hiệu&nbsp;Cetaphil&nbsp;với c&ocirc;ng thức khoa học mới cho l&agrave;n da nhạy cảm,&nbsp;gi&uacute;p l&agrave;m sạch da, loại bỏ bụi bẩn, ph&ugrave; hợp cho mọi loại da, kh&ocirc;ng l&agrave;m kh&ocirc; da v&agrave; duy tr&igrave; h&agrave;ng r&agrave;o bảo vệ da suốt ng&agrave;y d&agrave;i.</p>\r\n\r\n<p>Được chứng minh l&acirc;m s&agrave;ng c&oacute; khả năng l&agrave;m sạch s&acirc;u, loại bỏ ho&agrave;n to&agrave;n bụi bẩn, v&agrave; tạp chất tr&ecirc;n da một c&aacute;ch dịu nhẹ nhưng vẫn duy tr&igrave; độ ẩm tự nhi&ecirc;n để bảo vệ da khỏi t&igrave;nh trạng kh&ocirc; r&aacute;p,&nbsp;<strong>Sữa Rửa Mặt&nbsp;Cetaphil Mới&nbsp;</strong>với c&ocirc;ng thức l&agrave;nh t&iacute;nh kh&ocirc;ng g&acirc;y k&iacute;ch ứng sẽ an to&agrave;n cho mọi loại da, kể cả da nhạy cảm.</p>\r\n', '<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Sữa rửa mặt cho da nhạy cảm Cetaphil Gentle Skin Cleanser\" src=\"https://www.cetaphil.com.vn/dw/image/v2/BGGN_PRD/on/demandware.static/-/Sites-galderma-vn-m-catalog/default/dw6edd4824/Cetaphil-Gentle-Skin-Cleanser/Cetaphi-GSC-500mL.png?sw=900&amp;sh=900&amp;sm=fit&amp;q=85\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Ưu thế nổi bật của&nbsp;Sữa Rửa Mặt Cetaphil Gentle Skin Cleanser:</strong></p>\r\n\r\n<p>- C&ocirc;ng thức khoa học mới với sự kết hợp 3 th&agrave;nh phần l&agrave;nh t&iacute;nh:&nbsp;<strong>Niacinamide (Vitamin B3), Panthenol (Pro-vitamin B5)</strong>&nbsp;v&agrave;&nbsp;<strong>Glycerin</strong>&nbsp;đ&atilde; tạo ra cơ chế đặc biệt gi&uacute;p th&uacute;c đẩy qu&aacute; tr&igrave;nh sản sinh Ceramides tự nhi&ecirc;n của da v&agrave; tổng hợp Fillaggrin c&oacute; dụng bảo vệ h&agrave;ng r&agrave;o tự nhi&ecirc;n của da gi&uacute;p cải thiện khả năng phục hồi của l&agrave;n da nhạy cảm.</p>\r\n\r\n<p>- Sản phẩm nổi bật với 6 KH&Ocirc;NG: Kh&ocirc;ng x&agrave; ph&ograve;ng, kh&ocirc;ng paraben, kh&ocirc;ng sulfat, kh&ocirc;ng hương liệu, kh&ocirc;ng dầu kho&aacute;ng &amp; kh&ocirc;ng thử nghiệm tr&ecirc;n động vật.</p>\r\n\r\n<p>- 95% người d&ugrave;ng cảm thấy l&agrave;n da của họ được l&agrave;m sạch nhưng kh&ocirc;ng g&acirc;y kh&ocirc; da sau khi d&ugrave;ng sản phẩm.</p>\r\n\r\n<p>- Tăng cường lipid v&agrave; protein c&oacute; trong h&agrave;ng r&agrave;o bảo vệ tự nhi&ecirc;n của da - những th&agrave;nh phần quan trọng trong việc duy tr&igrave; h&agrave;ng r&agrave;o bảo vệ da lu&ocirc;n khỏe mạnh.</p>\r\n\r\n<p>- Sản phẩm được kiểm nghiệm l&acirc;m s&agrave;ng l&agrave; an to&agrave;n với da nhạy cảm &amp; được tin d&ugrave;ng bởi c&aacute;c b&aacute;c sĩ da liễu.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Sữa Rửa Mặt Cetaphil Gentle Skin Cleanse Dịu Nhẹ Cho Da Nhạy Cảm Chai 500ml\" src=\"https://i.imgur.com/COY0TlS.png\" /></p>\r\n\r\n<p><img src=\"https://down-vn.img.susercontent.com/file/vn-11134201-7ras8-mal78rq3f6jb19\" /></p>\r\n\r\n<p><img src=\"https://down-vn.img.susercontent.com/file/vn-11134201-7ras8-mal78s2kwv4ce9\" /></p>\r\n\r\n<p><img src=\"https://down-vn.img.susercontent.com/file/vn-11134201-7ras8-mal78rqxdyonc6\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Sữa Rửa Mặt Cetaphil Gentle Skin Cleanser&nbsp;ph&ugrave; hợp với loại da n&agrave;o?</strong></p>\r\n\r\n<p>Sản phẩm d&agrave;nh cho mọi loại da, đặc biệt l&agrave; da nhạy cảm.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Đối tượng sử dụng&nbsp;Sữa Rửa Mặt Cetaphil Gentle Skin Cleanser:</strong></p>\r\n\r\n<p>- Da kh&ocirc;,&nbsp;thiếu độ ẩm - thiếu nước.</p>\r\n\r\n<p>- Da nhạy cảm, dễ k&iacute;ch ứng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Độ an to&agrave;n:</strong></p>\r\n\r\n<p>- Kh&ocirc;ng hương liệu</p>\r\n\r\n<p>- Kh&ocirc;ng paraben</p>\r\n\r\n<p>- Kh&ocirc;ng sulfat</p>\r\n\r\n<p>- Kh&ocirc;ng dầu kho&aacute;ng</p>\r\n\r\n<p>- Kh&ocirc;ng x&agrave; ph&ograve;ng</p>\r\n\r\n<p>- Kh&ocirc;ng g&acirc;y k&iacute;ch ứng</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>C&aacute;ch bảo quản</strong></p>\r\n\r\n<p>Bảo quản nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng trực tiếp hoặc nơi c&oacute; nhiệt độ cao / ẩm ướt.</p>\r\n\r\n<p>Tr&aacute;nh xa tầm tay trẻ em.</p>\r\n\r\n<p>Đậy nắp k&iacute;n sau khi sử dụng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Ng&agrave;y sản xuất:&nbsp;</strong>Xem chi tiết tr&ecirc;n bao b&igrave;</p>\r\n\r\n<p><strong>Hạn sử dụng:&nbsp;</strong>36 th&aacute;ng kể từ ng&agrave;y sản xuất</p>\r\n', 1, '1757239823_cetaphil_gentle_skin_cleanser_500ml_-_3499320013048_087cca0a8591469da8ac066521247ae1_master.png', 409500, 10, 49, 1),
(71, 'Tẩy Tế Bào Chết Hương Oải Hương (Natural Exfoliating Sugar Scrub - Lavender Harvest).', '<p>Lớp tế b&agrave;o chết gi&agrave; nua sẽ l&agrave;m cho da k&eacute;m mịn m&agrave;ng, nhanh l&atilde;o h&oacute;a, sỉn m&agrave;u v&agrave; kh&oacute; hấp thu c&aacute;c dưỡng chất khi d&ugrave;ng sản phẩm dưỡng da. Sản phẩm c&oacute; chứa tinh dầu dưỡng da thi&ecirc;n nhi&ecirc;n, gi&uacute;p l&agrave;m mềm da. Hạt đường li ti gi&uacute;p tẩy nhẹ nh&agrave;ng tế b&agrave;o chết tr&ecirc;n cơ thể, gi&uacute;p da mịn m&agrave;ng, căng b&oacute;ng tự nhi&ecirc;n. Th&agrave;nh phần 100% thi&ecirc;n nhi&ecirc;n kh&ocirc;ng k&iacute;ch ứng da với hương thơm tự nhi&ecirc;n hoa Oải Hương</p>\r\n', '<p><img src=\"https://file.hstatic.net/200000117693/file/t_huong_oai_huong__natural_exfoliating_sugar_scrub_-_lavender_harvest__e4fac2893a7249c4940e48f374a909a7_grande.jpg\" /></p>\r\n\r\n<ul>\r\n	<li><strong>Tẩy tế b&agrave;o chết hương oải hương (Natural Exfoliating Sugar Scrub - Lavender Harvest)</strong>&nbsp;l&agrave; sản phẩm được chiết xuất từ đường tan c&ugrave;ng bơ ca cao, tinh dầu oải hương,&hellip; gi&uacute;p loại bỏ tế b&agrave;o chết, mang lại l&agrave;n da mịn m&agrave;ng v&agrave; s&aacute;ng m&agrave;u, nu&ocirc;i dưỡng l&agrave;n da khỏe với hương thơm ngọt ng&agrave;o.</li>\r\n	<li>Nhẹ nh&agrave;ng l&agrave;m sạch da, loại bỏ tế b&agrave;o chết, t&aacute;i tạo l&agrave;n da mới m&agrave; kh&ocirc;ng l&agrave;m kh&ocirc; da, trả lại bạn l&agrave;n da mềm mại v&agrave; mịn m&agrave;ng.</li>\r\n	<li>Đồng thời hương hoa lan dịu nhẹ lưu lại tr&ecirc;n da mang đến cho bạn cảm gi&aacute;c sảng kho&aacute;i, dễ chịu suốt cả ng&agrave;y.</li>\r\n</ul>\r\n', 1, '1757239913_t_huong_oai_huong__natural_exfoliating_sugar_scrub_-_lavender_harvest__6332cef63cd043bd9216bb5ce2b4c09c_master.jpg', 175000, 50, 50, 1),
(72, 'Phấn Nước Đơn Lemonade SPF50+ PA+++ Matte Addict Cushion A02 Natural (Không Face Filler) 15g', '<p>Chưa c&oacute; m&ocirc; tả cho sản phẩm n&agrave;y</p>\r\n', '', 0, '1757239969_d87bc8490094288b0a2908ff50c4da5_large_29e530342f1d453495d9f176c50ca191_17b25d6294a24d7d8166ee0494ef6958_master.jpg', 163473, 50, 51, 1),
(73, 'Kem Nền Espoir Pro Tailor Foundation Be Velvet # Petal.', '<p>Kem Nền Espoir Pro Tailor Foundation Be Velvet SPF22 nằm trong bộ sưu tập mới nhất của nh&agrave; Espoir với sắc đỏ quyền lực, c&ugrave;ng chất kem mỏng nhẹ, mềm mịn sử dụng c&ocirc;ng thức Comfort Velvet Formula cho lớp nền mềm mượt kh&ocirc;ng g&acirc;y kh&ocirc; da hay bết r&iacute;t. Đặc biệt, sản phẩm chứa bột sapphire trắng bền vững (ALUMINA) gi&uacute;p lớp nền bền m&agrave;u v&agrave; kh&ocirc;ng bị xuống tone suốt ng&agrave;y d&agrave;i.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://mint07.com/wp-content/uploads/2023/01/kem-nen-espoir-pro-tailor-foundation-be-velvet-spf22.jpg\"><img alt=\"Kem Nền Espoir Pro Tailor Foundation Be Velvet SPF22\" src=\"https://mint07.com/wp-content/uploads/2023/01/kem-nen-espoir-pro-tailor-foundation-be-velvet-spf22.jpg\" style=\"height:1500px; width:1500px\" title=\"Kem Nền Espoir Pro Tailor Foundation Be Velvet SPF22\" /></a></p>\r\n\r\n<p><a href=\"https://mint07.com/wp-content/uploads/2023/01/kem-nen-espoir-pro-tailor-foundation-be-velvet-spf22-3.png\"><img alt=\"Kem Nền Espoir Pro Tailor Foundation Be Velvet SPF22\" src=\"https://mint07.com/wp-content/uploads/2023/01/kem-nen-espoir-pro-tailor-foundation-be-velvet-spf22-3.png\" style=\"height:680px; width:771px\" title=\"Kem Nền Espoir Pro Tailor Foundation Be Velvet SPF22\" /></a></p>\r\n\r\n<p><a href=\"https://mint07.com/wp-content/uploads/2023/01/kem-nen-espoir-pro-tailor-foundation-be-velvet-spf22-4.jpg\"><img alt=\"Kem Nền Espoir Pro Tailor Foundation Be Velvet SPF22\" src=\"https://mint07.com/wp-content/uploads/2023/01/kem-nen-espoir-pro-tailor-foundation-be-velvet-spf22-4.jpg\" style=\"height:715px; width:716px\" title=\"Kem Nền Espoir Pro Tailor Foundation Be Velvet SPF22\" /></a></p>\r\n\r\n<p><strong>Loại da:&nbsp;</strong>Mọi loại da.</p>\r\n\r\n<p><strong>T&ocirc;ng m&agrave;u:</strong></p>\r\n\r\n<p>20 Vanilla: Da S&aacute;ng<br />\r\n21 Ivory: Da Trung B&igrave;nh S&aacute;ng<br />\r\n22 Petal: Da Tự Nhi&ecirc;n</p>\r\n\r\n<h3><strong>Ưu điểm nổi bật:</strong></h3>\r\n\r\n<ul>\r\n	<li>Sử dụng&nbsp;<strong>c&ocirc;ng thức Comfort Velvet Formula</strong>&nbsp;cho lớp nền mượt mịn kh&ocirc;ng g&acirc;y kh&ocirc; da hay bết r&iacute;t.</li>\r\n	<li>Chứa&nbsp;<strong>bột sapphire trắng bền vững (ALUMINA)&nbsp;</strong>gi&uacute;p lớp nền bền m&agrave;u v&agrave; kh&ocirc;ng bị xuống tone suốt ng&agrave;y d&agrave;i.</li>\r\n	<li>C&oacute; khả năng che phủ ở mức kh&aacute;, gi&uacute;p che được c&aacute;c khuyết điểm vừa phải.</li>\r\n	<li>C&oacute;&nbsp;<strong>chỉ số chống nắng SPF22 PA++</strong>&nbsp;gi&uacute;p bảo vệ da khỏi c&aacute;c t&aacute;c hại của tia UV</li>\r\n	<li>Sản phẩm đạt chứng nhận thuần chay, an to&agrave;n l&agrave;nh t&iacute;nh cho da nhạy cảm.</li>\r\n	<li>Kh&ocirc;ng chứa c&aacute;c th&agrave;nh phần độc hại như:&nbsp;<strong>Paraben, talc, polyacrylamide, sắc tố Tar, imidazolidinyl ur&ecirc;, triethanolamine.</strong></li>\r\n</ul>\r\n\r\n<p><strong>Kết cấu sản phẩm:&nbsp;</strong>Chất kem mềm mịn, mỏng nhẹ, gi&uacute;p lớp nền căng b&oacute;ng tự nhi&ecirc;n.</p>\r\n\r\n<h3><strong>Hướng dẫn sử dụng</strong>:&nbsp;</h3>\r\n\r\n<p>Lấy một lượng cushion bằng b&ocirc;ng m&uacute;t, chấm c&aacute;c điểm tr&ecirc;n da v&agrave; t&aacute;n nhẹ nh&agrave;ng để phấn nước được trải đều tr&ecirc;n bề mặt. C&oacute; thể dặm th&ecirc;m ở những v&ugrave;ng c&oacute; nhiều khuyết điểm.</p>\r\n\r\n<p><strong>Bảo quản:</strong>&nbsp;nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t v&agrave; đ&oacute;ng kĩ nắp sản phẩm sau khi sử dụng</p>\r\n\r\n<p><strong>Quy c&aacute;ch đ&oacute;ng g&oacute;i:</strong>&nbsp;30g</p>\r\n\r\n<p><strong>Xuất xứ:</strong>&nbsp;H&agrave;n Quốc</p>\r\n\r\n<h3><strong>Thương hiệu:</strong></h3>\r\n\r\n<p><strong>Espoir</strong>&nbsp;l&agrave; thương hiệu mỹ phẩm đến từ tập đo&agrave;n Amore Pacific,&nbsp;là hãng mỹ ph&acirc;̉m chuy&ecirc;n v&ecirc;̀ makeup.&nbsp;Espoir l&agrave; đại diện cho ph&acirc;n kh&uacute;c sản phẩm trang điểm cao cấp với thiết kế v&agrave; phong c&aacute;ch hiện đại.Tại Việt Nam, Espoir m&ocirc;̣t cái t&ecirc;n kh&ocirc;ng quá mới lạ,&nbsp;&nbsp;thương hiệu được y&ecirc;u th&iacute;ch tr&ecirc;n thị trường bởi chất lượng cao m&agrave; gi&aacute; cả cực k&igrave; phải chăng v&agrave; được nhiều kh&aacute;ch h&agrave;ng lựa chọn, tin d&ugrave;ng.</p>\r\n', 1, '1757240037_kem-nen-espoir-pro-tailor-foundation-be-velvet-spf22-1-65656cf5ca542_bbd4beefe0ec4ae880c8ffcea0f79e73_master.jpg', 520, 35, 51, 1),
(74, 'Phấn Phủ Nâng Tông Silkygirl Let It Grow Tone Up Powder 7G.', '<p>Phấn phủ n&acirc;ng t&ocirc;ng Silkygirl Let It Glow Tone up Powder l&agrave; sản phẩm phấn phủ dạng n&eacute;n, c&oacute; m&agrave;u với kết cấu hạt phấn si&ecirc;u mịn tạo lớp che phủ ho&agrave;n hảo. Phấn phủ gi&uacute;p h&uacute;t lượng dầu thừa v&agrave; loại bỏ độ b&oacute;ng để c&oacute; một lớp che phủ. Sản phẩm n&agrave;y kh&ocirc;ng những gi&uacute;p bạn xua đi nỗi lo b&oacute;ng dầu tr&ecirc;n da mặt m&agrave; c&ograve;n c&oacute; khả năng trang điểm v&agrave; hiệu chỉnh sắc da hiệu quả.&nbsp;</p>\r\n', '<h3><strong>Th&agrave;nh phần v&agrave; c&ocirc;ng dụng:&nbsp;</strong></h3>\r\n\r\n<p>Phấn phủ n&acirc;ng t&ocirc;ng Silkygirl Let It Glow Tone up Powder sở hữu c&aacute;c đặc t&iacute;nh nổi bật như:&nbsp;</p>\r\n\r\n<p>+ Kết cấu mềm mượt</p>\r\n\r\n<p>+ L&agrave;m s&aacute;ng da với hiệu ứng mềm mịn</p>\r\n\r\n<p>+ Hiệu ứng mịn, mỏng &amp; l&agrave;m mờ khuyết điểm nhẹ</p>\r\n\r\n<p>+ Kh&ocirc;ng chứa hương liệu</p>\r\n\r\n<p>+ Th&agrave;nh phần c&oacute; chứa Tea Tree Leaf Oil &amp; Bisabolol l&agrave;m dịu da</p>\r\n\r\n<p>+ Phấn dạng n&eacute;n c&oacute; t&ocirc;ng m&agrave;u hồng nhả gi&uacute;p l&agrave;n da của bạn s&aacute;ng khỏe.</p>\r\n\r\n<p>+ Chất phấn mỏng mịn, dễ d&agrave;ng&nbsp;</p>\r\n\r\n<h3><strong>Đối tượng sử dụng:&nbsp;</strong></h3>\r\n\r\n<p>C&ocirc;ng thức d&agrave;nh cho l&agrave;n da ch&acirc;u &Aacute;, ph&ugrave; hợp với mọi t&ocirc;ng da</p>\r\n\r\n<h3><strong>Hướng dẫn sử dụng:&nbsp;</strong></h3>\r\n\r\n<p>D&ugrave;ng b&ocirc;ng phấn hoặc cọ trang điểm t&aacute;n nhẹ nh&agrave;ng đều khắp cổ &amp; mặt. Th&iacute;ch hợp sử dụng mỗi ng&agrave;y.&nbsp;</p>\r\n\r\n<p><strong>Nơi sản xuất:&nbsp;</strong>Thailand&nbsp;</p>\r\n\r\n<p><strong>Điều kiện bảo quản:</strong>&nbsp;Tr&aacute;nh &aacute;nh nắng trực tiếp. Để nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t. Đậy nắp k&iacute;n sau khi sử dụng.&nbsp;</p>\r\n', 1, '1757240111_1__4__f99dd44b9977429f9c63a03233e8af01_master.jpg', 155200, 20, 52, 1),
(75, 'Son Lì BOM My Lipstick 3.5g #809 My Chily Red - Đỏ Nâu', '<p>Chưa c&oacute; m&ocirc; tả cho sản phẩm n&agrave;y</p>\r\n', '', 0, '1757240182_tled_a9e4fe78a11c486695c29b38f5d41184_bb89841cb9104d51af1a7c09183b5a73_588041853e5547808a092c4d5fabb406_master.jpg', 85500, 75, 53, 1),
(76, 'Son Lì Mịn Môi L\'Oreal Color Richie Intense Volumne Matte #666 I Win.', '<p>Son Thỏi Mịn L&igrave;, Căng Mướt L&#39;oreal Color Riche Intense Volume Matte Lipstick l&agrave; son thỏi cao cấp đến từ thương hiệu L&#39;Oreal nổi bật với thiết kế thanh lịch, v&ocirc; c&ugrave;ng sang trọng với chất son chuẩn mịn l&igrave;, căng mướt với hiệu ứng nhung mịn, l&acirc;u tr&ocirc;i lướt nhẹ nh&agrave;ng tr&ecirc;n m&ocirc;i. Son c&ograve;n bổ sung th&ecirc;m Hyaluronic Acid gi&uacute;p kh&oacute;a ẩm, cho đ&ocirc;i m&ocirc;i cuốn h&uacute;t, căng mướt cả ng&agrave;y d&agrave;i.</p>\r\n', '<h3><strong>Đặc trưng: &nbsp; &nbsp;</strong></h3>\r\n\r\n<p>- L&#39;oreal Color Riche Intense Volume Matte Lipstick nổi bật với thiết kế thanh lịch, sang trọng với đầu son v&aacute;t cong mềm mại.</p>\r\n\r\n<p>- Chất son mềm, mượt c&ugrave;ng hiệu ứng nhung mịn kh&ocirc;ng để lộ v&acirc;n m&ocirc;i, kh&ocirc;ng l&agrave;m kh&ocirc; m&ocirc;i.</p>\r\n\r\n<p>- Son l&ecirc;n m&agrave;u chuẩn, độ bền m&agrave;u cao.</p>\r\n\r\n<p>- Hiệu ứng nhung mịn - l&igrave; - nhẹ t&ecirc;nh - m&agrave;u l&ecirc;n chuẩn, chỉ sau 1 lần lướt tr&ecirc;n m&ocirc;i.</p>\r\n\r\n<p>- Son l&ecirc;n m&agrave;u cực chuẩn ngay từ lần quẹt đầu ti&ecirc;n gi&uacute;p đ&ocirc;i m&ocirc;i lu&ocirc;n căng mọng, quyến rũ, cho ph&aacute;i đẹp lu&ocirc;n tự tin, nổi bật mọi l&uacute;c mọi nơi. &nbsp;</p>\r\n\r\n<p>- Bảng m&agrave;u trendy, ph&ugrave; hợp l&agrave;n da Ch&acirc;u &Aacute;.</p>\r\n\r\n<h3><strong>Bảng M&agrave;u:</strong></h3>\r\n\r\n<p><strong>Son Kem L&igrave;, Mịn Mượt Nhẹ M&ocirc;i L&rsquo;Oreal Paris Chiffon Signature Matte Liquid Lipstick c&oacute; c&aacute;c m&agrave;u sau: &nbsp;</strong></p>\r\n\r\n<p>-&nbsp;<strong>129 I LEAD:</strong>&nbsp;Cam Đỏ Đất</p>\r\n\r\n<p>-&nbsp;<strong>275 LA TERRA ATTITUDE:&nbsp;</strong>Cam Ch&aacute;y</p>\r\n\r\n<p>-&nbsp;<strong>276 LE LEATHER LIBERATED:</strong>&nbsp;N&acirc;u Gạch</p>\r\n\r\n<p>-&nbsp;<strong>339 LE WOOD BRULANT:</strong>&nbsp;N&acirc;u Đỏ</p>\r\n\r\n<p>-&nbsp;<strong>666 I WIN:</strong>&nbsp;Đỏ Lạnh</p>\r\n', 1, '1757240246_son-thoi-loreal-color-riche-666_862f47a496fb4df5bc12ee27edd24899_master.png', 296100, 10, 53, 1);
INSERT INTO `products` (`id`, `name`, `description`, `content`, `hot`, `photo`, `price`, `discount`, `category_id`, `stock`) VALUES
(77, 'Viên Uống Dhc Hoa Hồng Làm Thơm Cơ Thể Bulgarian Rose Capsule (30 Ngày).', '<p><strong>Vi&ecirc;n Uống Dầu Hoa Hồng DHC Bulgarian Rose Capsule&nbsp;l&agrave;<a href=\"https://thegioiskinfood.com/collections/thuc-pham-chuc-nang\">&nbsp;vi&ecirc;n uống</a></strong>&nbsp;với th&agrave;nh phần&nbsp;ch&iacute;nh l&agrave; vitamin E v&agrave; tinh chất dầu hoa hồng dồi d&agrave;o&nbsp;dưỡng chất&nbsp;gi&uacute;p xua tan cảm gi&aacute;c tự ti về m&ugrave;i cơ thể nhờ hương thơm hoa hồng ngọt ng&agrave;o tỏa ra từ b&ecirc;n trong cơ thể, cải thiện l&agrave;n&nbsp;da săn chắc, mịn m&agrave;ng hơn, mang đến cảm gi&aacute;c tự tin, thoải m&aacute;i&nbsp;c&ugrave;ng l&agrave;n da tươi trẻ, rạng rỡ&nbsp;thuộc thương hiệu&nbsp;<strong><a href=\"https://thegioiskinfood.com/collections/DHC\">DHC</a>&nbsp;</strong>đến từ Nhật Bản.</p>\r\n', '<p><img alt=\"[Gói 60 Viên/30 Ngày] Viên Uống Dầu Hoa Hồng DHC Bulgarian Rose Capsule\" src=\"https://file.hstatic.net/1000006063/file/688_9987d495cf434ace982c6a912581d8d6_master.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&bull; Đặc trưng:</strong></p>\r\n\r\n<p>-<strong>&nbsp;Vi&ecirc;n Uống Dầu Hoa Hồng DHC Bulgarian Rose Capsule</strong>&nbsp;, chứa tinh dầu&nbsp;hoa hồng&nbsp;<strong>Bulgarian</strong>&nbsp;c&oacute;&nbsp;h&agrave;m lượng&nbsp;vitamin c&ugrave;ng c&aacute;c chất chống oxy h&oacute;a dồi d&agrave;o c&oacute; khả năng&nbsp;cấp ẩm, thu nhỏ lỗ ch&acirc;n l&ocirc;ng, ngăn ngừa vi khuẩn g&acirc;y mụn, l&agrave;m mờ vết th&acirc;m mụn, mang lại l&agrave;n da ẩm mịn, đều m&agrave;u c&ugrave;ng&nbsp;với hương thơm dịu ngọt, thanh m&aacute;t.</p>\r\n\r\n<p>- Chứa&nbsp;<strong>vitamin E</strong>&nbsp;l&agrave; th&agrave;nh phần dưỡng ẩm cao, th&uacute;c đẩy qu&aacute; tr&igrave;nh phục hồi v&agrave; t&aacute;i tạo da, c&oacute; khả năng ngăn qu&aacute; tr&igrave;nh h&igrave;nh th&agrave;nh&nbsp;nếp nhăn, chống l&atilde;o h&oacute;a tr&ecirc;n da v&agrave; bảo vệ da khỏi c&aacute;c t&aacute;c hại b&ecirc;n ngo&agrave;i.</p>\r\n\r\n<p>- Sử dụng&nbsp;<strong>100</strong>%&nbsp;<strong>tinh dầu hoa hồng&nbsp;</strong>thi&ecirc;n nhi&ecirc;n đ&atilde; được cấp chứng nhận đạt ti&ecirc;u chuẩn chất lượng từ trung t&acirc;m nghi&ecirc;n cứu&nbsp;Quốc Gia về hoa hồng.</p>\r\n\r\n<p>- Mỗi ng&agrave;y d&ugrave;ng 2 vi&ecirc;n uống hoa hồng DHC tương đương với 28 b&ocirc;ng hoa tươi, cung cấp hương hoa hồng ngọt ng&agrave;o&nbsp;từ b&ecirc;n trong gi&uacute;p cơ thể tỏa ra m&ugrave;i thơm nhẹ nh&agrave;ng,&nbsp;cải thiện m&ugrave;i cơ thể hiểu quả.</p>\r\n\r\n<p><strong>&bull; Đối tượng khuy&ecirc;n d&ugrave;ng:</strong></p>\r\n\r\n<p>- D&agrave;nh cho những bạn tự ti về&nbsp;<strong>m&ugrave;i cơ thể, m&ugrave;i hơi thở</strong></p>\r\n\r\n<p>- D&agrave;nh cho những bạn c&oacute; l&agrave;n da mất sức sống, k&eacute;m săn chắc,&nbsp;bạn muốn thưởng thức m&ugrave;i hương hoa hồng</p>\r\n\r\n<p><strong>&bull; Hướng dẫn sử dụng:</strong>&nbsp;Uống 2 vi&ecirc;n/ng&agrave;y (uống với nước hoặc nước ấm). D&ugrave;ng theo liều khuyến c&aacute;o v&agrave; tr&aacute;nh sử dụng qu&aacute; liều.</p>\r\n\r\n<p><strong>***Lưu &yacute;:</strong></p>\r\n\r\n<p>- Thực phẩm n&agrave;y kh&ocirc;ng phải l&agrave; thuốc, kh&ocirc;ng c&oacute; t&aacute;c dụng thay thế thuốc chữa bệnh.</p>\r\n\r\n<p>- Dừng uống khi ph&aacute;t hiện bất thường. Kh&ocirc;ng sử dụng cho người mẫn cảm với bất cứ th&agrave;nh phần n&agrave;o của sản phẩm.</p>\r\n\r\n<p>- Tham khảo &yacute; kiến b&aacute;c sỹ trước khi d&ugrave;ng, nếu bạn đang d&ugrave;ng thuốc kh&aacute;c hoặc đang điều trị tại bệnh viện.</p>\r\n\r\n<p>- Để xa tầm tay trẻ em.</p>\r\n\r\n<p>- Sử dụng ngay sau khi mở bao b&igrave;. Đ&oacute;ng nắp sản phẩm ngay sau khi sử dụng.&nbsp;</p>\r\n\r\n<p><img alt=\"[Gói 60 Viên/30 Ngày] Viên Uống Dầu Hoa Hồng DHC Bulgarian Rose Capsule\" src=\"https://file.hstatic.net/1000006063/file/vien-uong-dhc-hoa-hong-lam-thom-co-the-30-ngay-2_498618db9af24244938d0205cc13de40.jpg\" /></p>\r\n\r\n<p><img alt=\"[Gói 60 Viên/30 Ngày] Viên Uống Dầu Hoa Hồng DHC Bulgarian Rose Capsule\" src=\"https://file.hstatic.net/1000006063/file/vien-uong-dhc-hoa-hong-lam-thom-co-the-30-ngay-3_ce6f49a87226494ab1bed0c3eb78df75.jpg\" /></p>\r\n\r\n<p><img alt=\"[Gói 60 Viên/30 Ngày] Viên Uống Dầu Hoa Hồng DHC Bulgarian Rose Capsule\" src=\"https://file.hstatic.net/1000006063/file/vien-uong-dhc-hoa-hong-lam-thom-co-the-30-ngay-9_29d6fd0a6e134df1891bc90598386874.jpg\" /></p>\r\n\r\n<p><strong>&bull; Thương hiệu:</strong>&nbsp;DHC &nbsp;</p>\r\n\r\n<p>DHC (Daigaku Honyaku Center) l&agrave; một trong những thương hiệu mỹ phẩm được y&ecirc;u th&iacute;ch nhất tại Nhật Bản v&agrave; nhiều quốc gia kh&aacute;c tr&ecirc;n thế giới. Với phương ch&acirc;m &ldquo;High quality &ndash; Low price &ndash; Safety&rdquo; (Chất lượng cao &ndash; Gi&aacute; thấp &ndash; An to&agrave;n), DHC ng&agrave;y c&agrave;ng ph&aacute;t triển mạnh mẽ v&agrave; đạt được nhiều th&agrave;nh tựu nổi bật. DHC đ&atilde; c&oacute; hơn 67.000 nh&agrave; ph&acirc;n phối tr&ecirc;n to&agrave;n thế giới với hơn 14 triệu hội vi&ecirc;n online, v&agrave; l&agrave; thương hiệu mỹ phẩm c&oacute; doanh số b&aacute;n h&agrave;ng trực tuyến cao nhất Nhật Bản trong 19 năm (từ năm 2000 đến năm 2018). C&aacute;c sản phẩm mỹ phẩm v&agrave; thực phẩm chức năng của DHC được y&ecirc;u th&iacute;ch hơn cả. DHC ng&agrave;y c&agrave;ng ph&aacute;t triển mạnh mẽ v&agrave; ng&agrave;y c&agrave;ng khẳng định được t&ecirc;n tuổi của thương hiệu tr&ecirc;n thị trường l&agrave;m đẹp. &nbsp;</p>\r\n\r\n<p><strong>&bull; Xuất Xứ thương hiệu:</strong>&nbsp;Nhật Bản &nbsp;</p>\r\n\r\n<p><strong>&bull; Số lượng:&nbsp;</strong>60 vi&ecirc;n/30 ng&agrave;y &nbsp;</p>\r\n\r\n<p><strong>&bull; Hạn sử dụng:&nbsp;</strong>36 th&aacute;ng kể từ ng&agrave;y sản xuất. Sử dụng tốt nhất trước thời gian ghi tr&ecirc;n bao b&igrave;.</p>\r\n', 1, '1757240365_0dcc010a64bdc05bd10cf7784952ae7a_ce1b85b25d7a40039b9434c61d22a452_master.jpg', 510000, 22, 44, 1),
(78, 'Viên Uống Làm Đẹp Hotchland Nutrition Mega Beauty Collagen 90 Viên.', '<h3><strong>Vi&ecirc;n Uống L&agrave;m Đẹp Hotchland Nutrition Mega Beauty Collagen 90 Vi&ecirc;n</strong></h3>\r\n\r\n<p>MegaBeauuty Collagen - giải ph&aacute;p bổ sung dưỡng chất cho da, hạn chế qu&aacute; tr&igrave;nh l&atilde;o h&oacute;a, hỗ trợ giảm nếp nhăn, giảm kh&ocirc; da. Hỗ trợ t&oacute;c, m&oacute;ng tay chắc khỏe v&agrave; b&oacute;ng mượt.<br />\r\nSản phẩm kh&ocirc;ng phải l&agrave; thuốc v&agrave; kh&ocirc;ng c&oacute; t&aacute;c dụng thay thế thuốc chữa bệnh<br />\r\nChắc hẳn ai trong ch&uacute;ng ta cũng từng nghe tới c&ocirc;ng dụng tuyệt vời m&agrave; collagen mang lại cho cơ thể, đặc biệt l&agrave; trong c&ocirc;ng cuộc trẻ h&oacute;a l&agrave;n da, chống l&atilde;o h&oacute;a, x&oacute;a mờ nếp nhăn, cải thiện c&aacute;c vấn đề li&ecirc;n qua đến da. Tuy nhi&ecirc;n bước v&agrave;o độ tuổi 25, lượng collagen m&agrave; cơ thể tổng hợp được bắt đầu &iacute;t đi, v&agrave; giảm dần khi tuổi c&agrave;ng tăng dần. V&igrave; vậy việc chủ động bổ sung collagen l&agrave; rất cần thiết để c&oacute; một l&agrave;n da lu&ocirc;n tươi trẻ v&agrave; s&aacute;ng mịn.<br />\r\nMegaBeauty sẽ gi&uacute;p bạn cung cấp đầy đủ collagen v&agrave; vitamin C ho&agrave;n to&agrave;n tự nhi&ecirc;n cho cơ thể một c&aacute;ch nhanh ch&oacute;ng v&agrave; tiện lợi</p>\r\n', '<p><img src=\"https://file.hstatic.net/200000117693/file/thc-phm-bo-v-sc-khe-megabeauty-collagen_1bbef831daac4629aa44d1a6ba3c04d8_grande.jpg\" /></p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<h3><strong>MegaBeauty Collagen c&oacute; t&aacute;c dụng</strong></h3>\r\n\r\n<p>- Gi&uacute;p trẻ h&oacute;a l&agrave;n da, chống l&atilde;o h&oacute;a, phục hồi v&agrave; nu&ocirc;i dưỡng tế b&agrave;o da<br />\r\n- Gi&uacute;p l&agrave;n da lu&ocirc;n căng mịn, giảm nếp nhăn tr&ecirc;n da<br />\r\n- T&oacute;c, m&oacute;ng tay chắc khỏe, b&oacute;ng mượt v&agrave; s&aacute;ng hơn<br />\r\n- Hỗ trợ chống kh&ocirc; da, phục hồi da chảy xệ<br />\r\n- Hỗ trợ chống &ocirc;xy h&oacute;a, tăng sức đề kh&aacute;ng cho cơ thể<br />\r\n&nbsp;</p>\r\n\r\n<h3><strong>Th&agrave;nh phần</strong></h3>\r\n\r\n<p>- Ưu điểm vượt trội của Collagen v&agrave; Vitamin C MegaBeauty<br />\r\n- So với collagen thường Hydrolyzed Collagen Powder hay c&ograve;n gọi l&agrave; collagen thủy ph&acirc;n c&oacute; những ưu điểm vượt trội hơn. C&ocirc;ng nghệ thủy ph&acirc;n gi&uacute;p ph&aacute; vỡ sự li&ecirc;n kết của c&aacute;c ph&acirc;n tử collagen th&ocirc;ng qua đ&oacute; chia nhỏ c&aacute;c chuỗi collagen, khiến cơ thể hấp thụ một c&aacute;ch dễ d&agrave;ng hơn.<br />\r\n- Collagen thủy ph&acirc;n c&oacute; h&agrave;m lượng dưỡng chất v&agrave; độ tinh khiết cao hơn, ngo&agrave;i ra collagen thủy ph&acirc;n kh&ocirc;ng g&acirc;y b&eacute;o ph&igrave; như collagen thường. B&ecirc;n cạnh việc l&agrave;m đẹp da dưỡng t&oacute;c m&oacute;ng, collagen thủy ph&acirc;n c&ograve;n gi&uacute;p hỗ trợ giảm c&acirc;n, chống l&atilde;o h&oacute;a, bảo vệ sụn khớp,<br />\r\n- Collagen type I v&agrave; III chứa lượng lớn trong da, m&oacute;ng, t&oacute;c g&acirc;n, cơ,<br />\r\n- V&igrave; vậy với mục ti&ecirc;u l&agrave;m đẹp da v&agrave; t&oacute;c m&oacute;ng th&igrave; Collagen type I v&agrave; III như MegaBeauty l&agrave; lựa chọn th&iacute;ch hợp.<br />\r\n- B&ecirc;n cạnh đ&oacute; trong mỗi vi&ecirc;n uống MegaBeauty Collagen c&ograve;n bổ sung th&ecirc;m h&agrave;m lượng 30mg vitamin C gi&uacute;p cơ thể hấp thụ collagen dễ d&agrave;ng hơn. Nguy&ecirc;n nh&acirc;n l&agrave; do viatmin C khi đưa v&agrave;o cơ thể qua c&aacute;c phản ứng sẽ tạo th&agrave;nh một chất gọi l&agrave; Procollagen( c&ograve;n gọi l&agrave; tiền collagen) chất n&agrave;y sau đ&oacute; sẽ được đưa ra b&ecirc;n ngo&agrave;i tế b&agrave;o v&agrave; tổng hợp th&agrave;nh collagen</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<h3><strong>Đối tượng sử dụng</strong></h3>\r\n\r\n<p>- Người tr&ecirc;n 18 tuổi c&oacute; nhu cầu bổ sung collagen l&agrave;m đẹp da, t&oacute;c, m&oacute;ng. Người c&oacute; dấu hiệu l&atilde;o h&oacute;a như nhăn da, n&aacute;m da, sạm da kh&ocirc; da, t&oacute;c, m&oacute;ng kh&ocirc; dễ g&atilde;y do qu&aacute; tr&igrave;nh l&atilde;o h&oacute;a v&agrave; thiếu hụt collagen<br />\r\n&nbsp;</p>\r\n\r\n<h3><strong>Hướng dẫn sử dụng</strong></h3>\r\n\r\n<p>- Uống mỗi ng&agrave;y 2 vi&ecirc;n, trước bữa ăn 30 ph&uacute;t khi bụng đ&oacute;i.<br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<h3><strong>Lưu &yacute;</strong></h3>\r\n\r\n<p>- Kh&ocirc;ng sử dụng sản phẩm n&agrave;y đối với phụ nữ c&oacute; thai v&agrave; cho con b&uacute;<br />\r\n- Tham khảo &yacute; kiến chuy&ecirc;n gia trước khi d&ugrave;ng sản phẩm n&agrave;y nếu bạn đang d&ugrave;ng bất cứ sản phẩm n&agrave;o kh&aacute;c<br />\r\n- Kh&ocirc;ng d&ugrave;ng sản phẩm khi tem ni&ecirc;m phong kh&ocirc;ng c&ograve;n nguy&ecirc;n vẹn<br />\r\n&nbsp;</p>\r\n\r\n<h3><strong>Bảo quản</strong></h3>\r\n\r\n<p>- Nơi kh&ocirc; r&aacute;o, nhiệt độ dưới 30 độ C, để xa tầm tay trẻ em</p>\r\n', 1, '1757240442_thc-phm-bo-v-sc-khe-megabeauty-collagen_b22fc342f6564efc80f681bdc4de921e_master.png', 576000, 20, 54, 1),
(79, 'Dầu Gội Thorakao Hoa Bưởi Ngăn Ngừa Rụng Tóc (500ml) - Việt Nam.', '<p><strong>Dầu Gội Thorakao Hoa Bưởi Ngăn Ngừa Rụng T&oacute;c 500ml</strong></p>\r\n\r\n<ul>\r\n	<li>L&agrave;m sạch t&oacute;c v&agrave; da đầu</li>\r\n	<li>Ngăn ngừa rụng t&oacute;c hiệu quả</li>\r\n	<li>Đem lại cho bạn m&aacute;i t&oacute;c d&agrave;y v&agrave; &oacute;ng mượt</li>\r\n	<li>Độ PH c&acirc;n bằng, th&iacute;ch hợp cho mọi loại t&oacute;c.</li>\r\n	<li>Ngăn ngừa g&agrave;u hữu hiệu, do đ&oacute; bạn sẽ kh&ocirc;ng cảm thấy kh&oacute; chịu ngứa v&igrave; g&agrave;u.</li>\r\n	<li>T&iacute;ch hợp chung dầu xả trong c&ocirc;ng thức, tiện lợi hơn khi sử dụng</li>\r\n</ul>\r\n', '<ul>\r\n	<li>&nbsp;\r\n	<p><img src=\"https://file.hstatic.net/200000117693/file/10363423_833522730027760_2406673568762889626_o_85dd9c3ac9d842b69ceffc62643502ae_grande.jpg\" /></p>\r\n\r\n	<p><img src=\"https://file.hstatic.net/200000117693/file/8934727010412__2__426250e771444cb186dfad54d17599a1_grande.jpg\" /><br />\r\n	H&igrave;nh ảnh thực tế sản phẩm tại chuỗi si&ecirc;u thị&nbsp;<strong>AB Beauty World</strong><br />\r\n	&nbsp;</p>\r\n\r\n	<p>&nbsp;</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>- Tinh dầu trong&nbsp;quả bưởi&nbsp;c&oacute; đặc t&iacute;nh chống oxy h&oacute;a v&agrave; l&agrave;m sạch. Tuyệt vời cho da đầu nhờn, th&uacute;c đẩy sự ph&aacute;t triển t&oacute;c khỏe mạnh, v&agrave; cũng c&oacute; thể gi&uacute;p l&agrave;m giảm t&igrave;nh trạng da đầu ngứa, cho t&oacute;c v&agrave; da đầu sạch khỏe, dễ chịu..</p>\r\n\r\n<p>- Tinh dầu bưởi&nbsp;với h&agrave;m lượng vitamin C cao cũng c&oacute; t&aacute;c dụng nhất định với l&agrave;n da, tăng sức đề kh&aacute;ng cho da cũng như l&agrave;m chậm qu&aacute; tr&igrave;nh l&atilde;o h&oacute;a, ngăn ngừa v&agrave; trị mụn hiệu quả</p>\r\n\r\n<p>- Thorakao với những quy tr&igrave;nh nghi&ecirc;n cứu v&agrave; sản xuất hiện đại đ&atilde; đưa tinh dầu chiết xuất từ loại tr&aacute;i quen thuộc n&agrave;y để sản xuất ra những sản phẩm chất lượng, chăm s&oacute;c m&aacute;i t&oacute;c bạn một c&aacute;ch tốt nhất<br />\r\n&nbsp;</p>\r\n\r\n<p><img src=\"https://file.hstatic.net/200000117693/file/tachaitinhdaubuoigkbu-1529309772310779653506_fe56989401be4f22b98d5c8c8fc61389_grande.jpg\" /></p>\r\n\r\n<p>&nbsp;Dầu gội hoa bưởi&nbsp;với m&ugrave;i thơm dịu d&agrave;ng từ hoa bưởi, kh&ocirc;ng hăng nồng m&agrave; thoang thoảng tạo cảm gi&aacute;c thư th&aacute;i, dễ chịu đảm bảo gi&uacute;p da đầu &ecirc;m dịu chỉ sau một v&agrave;i lần gội<br />\r\n&nbsp;</p>\r\n\r\n<h3><strong>Hướng dẫn sử dụng</strong></h3>\r\n\r\n<p>L&agrave;m ướt t&oacute;c, lấy một lượng vừa đủ&nbsp;<strong>dầu gội hoa bưởi 500ml,&nbsp;</strong>tạo bọt rồi&nbsp;massage nhẹ nh&agrave;ng tr&ecirc;n da đầu, xả lại kỹ bằng nước sạch. Kh&ocirc;ng cần d&ugrave;ng th&ecirc;m dầu xả Sau khi gội xong,<br />\r\n<strong>lưu &yacute;&nbsp;</strong>n&ecirc;n thấm hết nước, hong kh&ocirc; t&oacute;c, tr&aacute;nh để hầm b&iacute; t&oacute;c sẽ khiến dễ sản sinh g&agrave;u ngứa kh&oacute; chịu<br />\r\n&nbsp;</p>\r\n\r\n<p><img src=\"https://file.hstatic.net/200000117693/file/daugoi_jzye_4a7cba1f06c24e42aa231c3b75536a70_grande.jpg\" /><br />\r\nN&ecirc;n gội đầu đều đặn từ 2 - 3 lần/ tuần để t&oacute;c lu&ocirc;n được chăm s&oacute;c một c&aacute;ch tốt nhất, gi&uacute;p t&oacute;c lu&ocirc;n sạch khỏe<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Điều Kiện Bảo Quản:&nbsp;</strong>Nơi kh&ocirc; tho&aacute;ng,&nbsp;Tr&aacute;nh xa tầm tay trẻ em.<br />\r\n<strong>Thương hiệu:</strong>&nbsp;THORAKAO<br />\r\n<strong>Sản xuất tại :</strong>&nbsp;Việt Nam&nbsp;<br />\r\n<strong>Dung T&iacute;ch:</strong>&nbsp;500ml<br />\r\n<strong>Hạn Sử&nbsp;Dụng:&nbsp;</strong>3 năm kể từ ng&agrave;y sản xuất</p>\r\n\r\n<p><em><strong>Thorakao</strong>&nbsp;được th&agrave;nh lập từ năm 1961, với một số mặt h&agrave;ng truyền thống kem dưỡng da tr&acirc;n ch&acirc;u, dầu gội đầu Hoa bưởi, x&agrave; b&ocirc;ng thơm, nước b&oacute;ng t&oacute;c Parafine &amp; Brillantine mang nh&atilde;n hiệu&nbsp;<strong>Thorakao</strong>.&nbsp;Sản phẩm với thương hiệu&nbsp;<strong>Thorakao</strong>&nbsp;nhanh ch&oacute;ng nổi tiếng, chiếm được l&ograve;ng người ti&ecirc;u d&ugrave;ng v&agrave; đ&atilde; c&oacute; bằng s&aacute;ng chế số 1779 ng&agrave;y 15/11/1968 được b&aacute;n rộng r&atilde;i tr&ecirc;n to&agrave;n miền Nam, Việt Nam l&uacute;c bấy giờ. Năm 1969 h&atilde;ng đ&atilde; mở chi nh&aacute;nh tại Campuchia v&agrave; bắt đầu xuất khẩu sản phẩm sang c&aacute;c sang c&aacute;c nước &ETH;&ocirc;ng Nam &Aacute;.</em></p>\r\n\r\n<p><em>Với sản phẩm đa dạng, được người ti&ecirc;u d&ugrave;ng y&ecirc;u th&iacute;ch như l&agrave; sữa rửa mặt nghệ, kem thoa da dưa leo, dầu gội d&acirc;u tằm, kem Tr&acirc;n ch&acirc;u&hellip;C&ocirc;ng ty đ&atilde; mở rộng thị trường của m&igrave;nh ngo&agrave;i thị trường quốc nội, đ&atilde; b&aacute;n sang nhiều nước kh&aacute;c như Singapore, &ETH;&agrave;i Loan, Campuchia, L&agrave;o, Trung Quốc, H&agrave;n Quốc, &Uacute;c, New Zealand, Thụy Sỹ, Mỹ, Ả Rập Saudi, DuBai, Ai Cập, Nga, C&aacute;c nước Ch&acirc;u Phi&hellip;</em></p>\r\n', 0, '1757240513_661e6d_4e5483e97cff4989823a2f4e8536075a_master.png', 57950, 5, 56, 1),
(80, 'Dầu Gội Khô Evoluderm Cho Mọi Loại Tóc 400ml.', '<p><strong>Dầu gội kh&ocirc; Evoluderm cho mọi loại t&oacute;c 400ml</strong>&nbsp;&nbsp;được chiết xuất từ c&aacute;c th&agrave;nh phần Teabutane, propane, alcohol, denat, oryza sativa starch,&hellip; gi&uacute;p m&aacute;i t&oacute;c của&nbsp;bạn sạch sẽ, kh&ocirc;ng cần xả bằng nước&nbsp;nhưng&nbsp;vẫn kh&ocirc;ng bị bết.&nbsp;Dầu gội c&ograve;n bổ sung dưỡng chất cần thiết gi&uacute;p cho bạn một m&aacute;t t&oacute;c&nbsp;bồng bềnh.&nbsp;Giữ lại kiểu t&oacute;c l&acirc;u hơn m&agrave; kh&ocirc;ng cần tiếp x&uacute;c với m&aacute;y tạo kiểu. Th&agrave;nh phần an to&agrave;n n&ecirc;n rất th&iacute;ch hợp cho người bị ốm hay người mới sinh.&nbsp;Vừa nhanh vừa tiện lợi.</p>\r\n\r\n<p>Bạn c&oacute; hẹn m&agrave; qu&ecirc;n mất chưa gội đầu? Bạn qu&aacute; bận bịu v&agrave; kh&ocirc;ng c&oacute; thời gian l&agrave;m sạch t&oacute;c?&nbsp;Bạn đội mũ bảo hiểm ra nhiều mồ h&ocirc;i l&agrave;m t&oacute;c bết d&iacute;nh?&nbsp;Bạn l&agrave; người mới sinh nở hay đang nằm viện? Bạn c&oacute; tin rằng kh&ocirc;ng cần d&ugrave;ng nước m&agrave; t&oacute;c bạn vẫn sạch đẹp v&agrave; &oacute;ng ả kh&ocirc;ng.&nbsp;Nếu việc đứng dưới v&ograve;i sen l&agrave;m bạn ớn lạnh, bạn bị bệnh hoặc mệt mỏi trong người th&igrave; h&atilde;y bỏ qua bước gội đầu bằng nước v&agrave; h&atilde;y d&ugrave;ng dầu gội kh&ocirc;&nbsp;<strong>Dầu gội kh&ocirc; Evoluderm cho mọi loại t&oacute;c 400ml</strong>&nbsp;để thay thế.&nbsp;&nbsp;Chỉ cần bỏ ra 5 ph&uacute;t l&agrave; bạn đ&atilde; c&oacute; ngay m&aacute;i t&oacute;c b&oacute;ng mượt v&agrave; mềm mại.</p>\r\n', '<p><img src=\"https://file.hstatic.net/200000117693/file/dau_goi_kho_evoluderm_cho_moi_loai_toc_400ml1_8a00ae9e28ba46c8bfad9f72fca249c4_grande.png\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>C&Ocirc;NG&nbsp;DỤNG</strong></h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Gi&uacute;p l&agrave;m sạch m&aacute;i t&oacute;c m&agrave; kh&ocirc;ng cần nước.</p>\r\n	</li>\r\n	<li>\r\n	<p>L&agrave;m cho m&aacute;i t&oacute;c bồng bềnh v&agrave; giữ nếp t&oacute;c l&acirc;u hơn.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><img src=\"https://file.hstatic.net/200000117693/file/dau_goi_kho_evoluderm_cho_moi_loai_toc_400ml_1111ed02abcc4ab8b30b9e484ebf3173_grande.jpg\" /></p>\r\n\r\n<h3><br />\r\n<strong>TH&Agrave;NH&nbsp;PHẦN</strong></h3>\r\n\r\n<p>BUTANE, PROPANE, ALCOHOL DENAT., ORYZA SATIVA STARCH, PARFUM, CETRIMONIUM CHLORIDE.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://file.hstatic.net/200000117693/file/dau_goi_kho_evoluderm_cho_moi_loai_toc_400ml2_2c80fd17ce6542f4b8005c1c3268237e_grande.jpg\" /></p>\r\n\r\n<h3><br />\r\n<strong>C&Aacute;CH&nbsp;D&Ugrave;NG</strong></h3>\r\n\r\n<p>&ndash; Lắc đều chai trước khi sử dụng.</p>\r\n\r\n<p>&ndash; Đặt v&ograve;i xịt c&aacute;ch t&oacute;c khoảng 15cm, lật từng lớp t&oacute;c v&agrave; xịt v&agrave;o ch&acirc;n t&oacute;c.</p>\r\n\r\n<p>&ndash; Lấy tay xoa đều đến khi dầu gội thấm đều cả t&oacute;c.</p>\r\n\r\n<p>&ndash; D&ugrave;ng lược chải cho t&oacute;c v&agrave;o nếp, nếu bạn muốn sạch hơn th&igrave; lấy khăn lau bọt dư trước khi chải.</p>\r\n\r\n<p>Lưu &yacute;: Sản phẩm chỉ c&oacute; c&ocirc;ng dụng tạm thời, kh&ocirc;ng thể thay thế ho&agrave;n to&agrave;n cho dầu gội n&ecirc;n bạn vẫn phải l&agrave;m sạch lại t&oacute;c theo c&aacute;ch th&ocirc;ng thường nh&eacute;!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://file.hstatic.net/200000117693/file/dau-goi-kho-evoluderm-dry-shampoo-400ml3_98ac7f63f97e4ecc8c7054ba1dfafb3f_grande.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>HSD:</strong>&nbsp;3 Năm kể từ ng&agrave;y sản xuất. Xem chi tiết DATE tr&ecirc;n bao b&igrave;&nbsp;</p>\r\n\r\n<p><strong>Nơi sản xuất sản phẩm:</strong>&nbsp;Ph&aacute;p&nbsp;</p>\r\n\r\n<p><strong>Xuất xứ thương hiệu:</strong>&nbsp;Ph&aacute;p</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em><strong>Evoluderm&nbsp;</strong>l&agrave; thương hiệu xuất xứ Ph&aacute;p được ch&iacute;nh thức s&aacute;ng lập bởi Nathalie &amp; Gabriel v&agrave;o năm 2004. Khởi đầu từ niềm đam m&ecirc; về mỹ phẩm chăm s&oacute;c da ấp ủ từ những năm 1984, họ đ&atilde; hợp t&aacute;c c&ugrave;ng c&aacute;c nh&agrave; khoa học với tham vọng ph&aacute;t triển một thương hiệu mỹ phẩm ri&ecirc;ng, đạt c&aacute;c ti&ecirc;u chuẩn về chất lượng, vừa t&uacute;i tiền của mọi người, v&agrave; kể từ đ&oacute; thương hiệu Evoluderm ch&iacute;nh thức ra đời. C&aacute;c sản phẩm Evoluderm sau đ&oacute; nhanh ch&oacute;ng được ph&acirc;n phối rộng khắp tại 4 Ch&acirc;u lục v&agrave; 60 quốc gia tr&ecirc;n to&agrave;n cầu.&nbsp;</em></p>\r\n\r\n<p><em>Mỹ phẩm Evoluderm dần chinh phục cảm t&igrave;nh của kh&aacute;ch h&agrave;ng bởi sự an to&agrave;n v&agrave; hiệu quả m&agrave; n&oacute; mang đến. C&ocirc;ng thức ti&ecirc;n tiến được nghi&ecirc;n cứu v&agrave; kiểm nghiệm tại c&aacute;c ph&ograve;ng th&iacute; nghiệm của Ph&aacute;p. Hầu hết sản phẩm kh&ocirc;ng chứa paraben, kh&ocirc;ng thử nghiệm tr&ecirc;n động vật v&agrave; sử dụng c&aacute;c nguy&ecirc;n liệu tự nhi&ecirc;n th&acirc;n thiện với m&ocirc;i trường. Evoluderm gi&uacute;p bạn l&agrave;m đẹp ho&agrave;n to&agrave;n tự nhi&ecirc;n từ đầu đến ch&acirc;n với sự đa dạng chủng loại về c&aacute;c sản phẩm chăm s&oacute;c da, t&oacute;c v&agrave; to&agrave;n th&acirc;n. B&ecirc;n cạnh đ&oacute;, c&aacute;c d&ograve;ng sản phẩm sữa tắm gội d&agrave;nh cho b&eacute; y&ecirc;u của Evoluderm cũng được nhiều b&agrave; mẹ ở khắp mọi nơi tin d&ugrave;ng.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, '1757240585_dau_goi_kho_evoluderm_cho_moi_loai_toc_400ml_63cb33420aee4b19beee52020a90fc32_master.jpg', 169000, 48, 56, 1),
(81, 'Dầu Xả Thảo Dược Giảm Gãy Rụng Tóc Kerasys Oriental Premium Conditioner 600ml.', '<p><strong>Kerasys</strong>&nbsp;l&agrave; thương hiệu chăm s&oacute;c t&oacute;c chuy&ecirc;n nghiệp của H&agrave;n Quốc, nổi tiếng với c&aacute;c d&ograve;ng sản phẩm chuy&ecirc;n biệt d&agrave;nh cho từng loại da đầu v&agrave; từng loại t&oacute;c kh&aacute;c nhau, gi&uacute;p nu&ocirc;i dưỡng v&agrave; cải thiện t&oacute;c một c&aacute;ch khoa học v&agrave; c&oacute; hệ thống. C&aacute;c d&ograve;ng sản phẩm của<strong>&nbsp;KERASYS</strong>&nbsp;được chiết xuất ho&agrave;n to&agrave;n từ tự nhi&ecirc;n. Th&ecirc;m v&agrave;o đ&oacute;, c&aacute;c sản phẩm hiện đang lưu h&agrave;nh đều đạt c&aacute;c chứng chỉ quốc tế về chất lượng ISO, được cấp giấy ph&eacute;p C&ocirc;ng bố chất lượng của Bộ Y tế, ...v&agrave; đặc biệt chứng nhận LOHAS (lifestyles of Health Sustainability), một trong những chứng nhận h&agrave;ng đầu thế giới về sản phẩm mang t&iacute;nh an to&agrave;n, bền vững hiện nay.</p>\r\n', '<p><img src=\"https://file.hstatic.net/200000117693/file/1_ae4ec0ab00ee4e1bb7f30233cbba52cc_grande.png\" /></p>\r\n\r\n<p><strong>Dầu&nbsp;xả cao cấp H&agrave;n Quốc KeraSys Oriental Premium</strong>&nbsp;với&nbsp;tinh dầu hạt tr&agrave;&nbsp;gi&uacute;p tạo th&agrave;nh&nbsp;lớp m&agrave;ng vững chắc bảo vệ da đầu&nbsp;khỏi những t&aacute;c động xấu v&agrave; bổ sung cho da đầu th&agrave;nh phần lipid c&ograve;n thiếu, gi&uacute;p m&aacute;i t&oacute;c d&agrave;y, khỏe mạnh, su&ocirc;n mềm, &oacute;ng mượt</p>\r\n\r\n<p><img src=\"https://file.hstatic.net/200000117693/file/51xz6zrfeql_7e1daaa7a6a649ed8b8cb64d314a31ed_grande.jpg\" /></p>\r\n\r\n<p><br />\r\nChất xơ c&oacute; trong th&agrave;nh phần<strong>&nbsp;Keratin</strong>&nbsp;sẽ gi&uacute;p cho m&aacute;i t&oacute;c bị hư tổn trở n&ecirc;n khỏe v&agrave; mềm mượt hơn. Kết quả thực tế được kiểm nghiệm tại c&aacute;c viện nghi&ecirc;n cứu h&agrave;ng đầu thế giới, t&oacute;c mềm hơn 1.6 lần v&agrave; cải thiện 79% t&igrave;nh trạng&nbsp; xơ gẫy chỉ sau 5 lần sử dụng<br />\r\nKerasys được sản xuất dưới quy tr&igrave;nh khắt khe tăng 2.5 lần dưỡng t&oacute;c, gi&uacute;p t&oacute;c chắc khỏe, su&ocirc;n mượt. Sau khi sử dụng, t&oacute;c sẽ được bảo vệ bởi 1 lớp m&agrave;ng mỏng tr&aacute;nh hư tổn từ c&aacute;c t&aacute;c động b&ecirc;n ngo&agrave;i đồng thời rất &ecirc;m dịu, kh&ocirc;ng g&acirc;y k&iacute;ch ứng cho da đầu.</p>\r\n\r\n<p><img src=\"https://file.hstatic.net/200000117693/file/51hdquvrefl._sy355__3e41f7e96d4e4974a27c13262ebbb01e_grande.jpg\" /></p>\r\n\r\n<h2><strong>Th&agrave;nh phần v&agrave; c&ocirc;ng dụng:</strong></h2>\r\n\r\n<ul>\r\n	<li>Một sự pha trộn tuyệt vời của Protein l&uacute;a mỳ v&agrave; chiết xuất từ hạt hoa tr&agrave; trắng, gi&uacute;p nu&ocirc;i dưỡng bảo vệ c&acirc;n bằng độ ẩm cho t&oacute;c.</li>\r\n	<li>Th&agrave;nh phần chống tia cực t&iacute;m được th&ecirc;m v&agrave;o vi&ecirc;n nang lipsome lipid, bảo vệ hiệu quả cho t&oacute;</li>\r\n</ul>\r\n\r\n<h2><strong>Hướng dẫn sử dụng:</strong></h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Lấy một lượng dầu vừa đủ ra l&ograve;ng b&agrave;n tay thoa đều l&ecirc;n t&oacute;c từ th&acirc;n tới ngọn, massage nhẹ nh&agrave;ng trong v&agrave;i ph&uacute;t gi&uacute;p cho dầu xả thấm s&acirc;u v&agrave;o t&oacute;c, sau đ&oacute; xả sạch bằng nước&nbsp;</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><img src=\"https://file.hstatic.net/200000117693/file/3_4b6c0dc306434d54b75f5532e3e5c68f_grande.png\" /></p>\r\n\r\n<p>- Xuất xứ: H&agrave;n Quốc<br />\r\n- Thương hiệu:&nbsp;<strong>Kerasys</strong><br />\r\n- Dung t&iacute;ch: 600ml</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, '1757240666_ea339c41b7fce178e5d6636f1dbc730b22ebb9cf_8a580a1c67c643a787ccccd0762893ed_master.png', 229000, 0, 57, 1),
(82, 'Dầu Xả Kiểm Soát Dầu Moist Diane Extra Fresh & Hydrate Treatment 450ml.', '<p>Dầu xả Moist Diane Extra Fresh &amp; Hydrate Treatment kiểm so&aacute;t dầu thừa, phục hồi chuy&ecirc;n s&acirc;u hư tổn của t&oacute;c, cho m&aacute;i t&oacute;c tơi bồng bềnh.<br />\r\nLoại bỏ b&atilde; nhờn, t&oacute;c su&ocirc;n mượt, th&ocirc;ng tho&aacute;ng:<br />\r\nTruyền sức sống từ hỗn hợp c&aacute;c loại tinh dầu thực vật Organic l&agrave;m mịn v&agrave; mềm từng sợi t&oacute;c nhưng vẫn mang lại cảm gi&aacute;c th&ocirc;ng tho&aacute;ng, s&aacute;ng b&oacute;ng cho m&aacute;i t&oacute;c.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p><img src=\"https://file.hstatic.net/200000117693/file/4560119224743-2_da1fa2b3688346d8838271120798d984_grande.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>Th&agrave;nh phần v&agrave;&nbsp;</strong><strong>C&ocirc;ng dụng:&nbsp;</strong></h2>\r\n\r\n<p>Chiết xuất từ tinh dầu Organic gi&uacute;p loại bỏ b&atilde; nhờn của t&oacute;c, t&oacute;c tơi bồng bềnh tho&aacute;ng m&aacute;t suốt 48h.&nbsp;<br />\r\n+ Tinh dầu Hương Thảo Organic:&nbsp;&nbsp;thư gi&atilde;n da đầu v&agrave; loại bỏ g&agrave;u. K&iacute;ch th&iacute;ch nang t&oacute;c v&agrave; nu&ocirc;i dưỡng t&oacute;c khỏe mạnh.<br />\r\n+ Tinh dầu Tr&agrave;m tr&agrave; Organic: c&oacute; t&aacute;c dụng l&agrave;m sạch da đầu, trị g&agrave;u v&agrave; loại bỏ dầu thừa tr&ecirc;n da đầu gi&uacute;p da đầu sạch, ch&acirc;n t&oacute;c chắc khỏe.<br />\r\n+ &nbsp;Tinh dầu Bạc h&agrave; Organic:&nbsp;hạn chế lượng dầu v&agrave; l&agrave;m m&aacute;t da đầu, gi&uacute;p cho m&aacute;i t&oacute;c mềm mại, kh&ocirc;ng bết d&iacute;nh.<br />\r\nDưỡng ẩm chuy&ecirc;n s&acirc;u:<br />\r\nWaterfowl Feather Keratin gi&uacute;p phụ hồi s&acirc;u lớp biểu b&igrave; t&oacute;c v&agrave; cung cấp độ ẩm s&acirc;u v&agrave;o từng sợi t&oacute;c để l&agrave;m ẩm m&aacute;i t&oacute;c t&oacute;c kh&ocirc; v&agrave; hư tổn.<br />\r\nMang lại cảm gi&aacute;c sảng kho&aacute;i:<br />\r\nM&ugrave;i bưởi tươi, hương cam qu&yacute;t mang lại cho bản cảm gi&aacute;c &nbsp;thực sự sảng kho&aacute;i, dễ chịu.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://file.hstatic.net/200000117693/file/dau-goi-moist-diane-extra-fresh-hydrate3_9066f372a97448e28bfa1afc56192446_grande.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>C&aacute;ch sử dụng:&nbsp;</strong></h2>\r\n\r\n<p>Sau khi gội đầu với dầu gội Moist Diane Extra Fresh &amp; Hydrate , lấy một lượng vừa đủ dầu xả ra l&ograve;ng b&agrave;n tay. Xoa đều dầu xả l&ecirc;n phần th&acirc;n v&agrave; ngọn t&oacute;c, tr&aacute;nh xoa l&ecirc;n phần da đầu. M&aacute;t xa nhẹ nh&agrave;ng khoảng 3 ph&uacute;t rồi rửa sạch lại bằng nước.</p>\r\n\r\n<p>&nbsp;* Bạn n&ecirc;n sử dụng trọn bộ sản phẩm Fresh &amp; Hydrate để mang lại hiệu quả tốt nhất&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://file.hstatic.net/200000117693/file/a104ca79042fb4f994ae03cce21c064a_b9e50e1937d143429d83c7dc10c8521a_grande.jpg\" /></p>\r\n\r\n<p><em><strong>*T&ugrave;y thuộc v&agrave;o chất t&oacute;c v&agrave; da đầu sẽ cho kết quả kh&ocirc;ng giống nhau.</strong></em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Xuất xứ:</strong>&nbsp;Nhật Bản</p>\r\n\r\n<p><strong>Bảo quản:&nbsp;</strong>Nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng trực tiếp v&agrave; để xa tầm tay trẻ em&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em><strong>Moist Diane&nbsp;</strong>l&agrave; thương hiệu dầu gội tinh dầu Organic kh&ocirc;ng chứa silicon thuộc tập đo&agrave;n NatureLab của Nhật Bản. Tập đo&agrave;n NatureLab sau 22 năm hoạt động đ&atilde; sở hữu 8 c&ocirc;ng ty, c&oacute; hơn 70 thương hiệu, hơn 1000 sản phẩm mang t&iacute;nh ti&ecirc;n phong với chất lượng cao v&agrave; thiết kế độc đ&aacute;o. C&aacute;c sản phẩm của NatureLab c&oacute; mặt tr&ecirc;n khắp nước Nhật với 40.000 cửa h&agrave;ng, trở th&agrave;nh hiện tượng tr&ecirc;n thị trường h&oacute;a mỹ phẩm m&agrave; c&aacute;c tập đo&agrave;n đa quốc gia cũng phải d&egrave; chừng.&nbsp;</em></p>\r\n\r\n<p><em>Tuy mới ra mắt tại Nhật Bản từ năm 2013, nhưng&nbsp;<strong>Moist Diane</strong>&nbsp;đ&atilde; c&oacute; sự ph&aacute;t triển thần tốc, chiếm giữ vị tr&iacute; số 1 tại thị trường Nhật Bản v&agrave; đang trở th&agrave;nh thương hiệu ấn tượng tại c&aacute;c nước Ch&acirc;u &Aacute;. Thương hiệu&nbsp;<strong>Moist Diane&nbsp;</strong>đ&atilde; b&aacute;n được 68.07 triệu chai v&agrave; li&ecirc;n tục đạt được những giải thưởng danh gi&aacute;:&nbsp;</em></p>\r\n\r\n<p><em>+ Her World Hair Awards &ndash; Dầu gội tốt nhất cho t&oacute;c thường được trao cho d&ograve;ng sản phẩm Moist Diane Botanical Moist Shampoo.&nbsp;</em></p>\r\n\r\n<p><em>+ Watsons HWB (Health, Wellness, Beauty) Award &ndash; Sản phẩm chăm s&oacute;c t&oacute;c thi&ecirc;n nhi&ecirc;n b&aacute;n chạy nhất: Moist Diane Botanical Moist Shampoo.&nbsp;</em></p>\r\n\r\n<p><em>+ CLEO Body Award 2017 &ndash; Mặt nạ dưỡng t&oacute;c tốt nhất được trao cho sản phẩm Moist Diane Extra Damage Repair Hair Mask.&nbsp;</em></p>\r\n\r\n<p><em>+ The Singapore Women&#39;s Weekly Hair Awards &ndash; Chăm s&oacute;c t&oacute;c tốt nhất cho t&oacute;c dầu&nbsp;</em></p>\r\n\r\n<p><em><strong>Moist Diane</strong>&nbsp;li&ecirc;n tục cải tiến v&agrave; cho ra đời những d&ograve;ng sản phẩm mới chất lượng cao.&nbsp;&nbsp;<strong>H&atilde;y để Moist Diane Perfect Beauty chăm s&oacute;c v&agrave; mang tới vẻ đẹp ho&agrave;n hảo cho m&aacute;i t&oacute;c của bạn!</strong></em></p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '1757240736_dau_xa_moist_diane_extra_fresh___hydrate_treatment_450ml_69ec13ebc6b347c0b06686f4f707065d_master.jpg', 168750, 25, 57, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qr_trans`
--

CREATE TABLE `qr_trans` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `payer_name` varchar(255) DEFAULT NULL,
  `payer_account` varchar(50) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `reference_code` varchar(255) DEFAULT NULL,
  `order_code` varchar(50) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `transaction_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `qr_trans`
--

INSERT INTO `qr_trans` (`id`, `order_id`, `payer_name`, `payer_account`, `amount`, `description`, `reference_code`, `order_code`, `currency`, `transaction_datetime`) VALUES
(45, 249, 'DO NHAT GIANG', '0974167648', 2000.00, 'Thanh toan don hang demo', 'FT25118290692388', '248', 'VND', '2025-04-28 09:32:28'),
(46, 252, 'DO NHAT GIANG', '0974167648', 2000.00, 'Thanh toan don hang', 'FT25127863910758', '252', 'VND', '2025-05-07 15:49:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`id`, `product_id`, `star`) VALUES
(24, 11, 4),
(25, 11, 3),
(26, 11, 5),
(27, 11, 5),
(28, 11, 5),
(29, 32, 5),
(30, 21, 5),
(31, 30, 3),
(32, 43, 3),
(33, 42, 5),
(34, 32, 5),
(35, 20, 5),
(36, 28, 5),
(37, 25, 2),
(38, 6, 3),
(39, 6, 5),
(40, 28, 5),
(41, 56, 1),
(42, 61, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(10, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(12, 'Doanh nghiệp bán bàn', 'giiau@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(13, 'Do Nhat Giang', 'giang@3g.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(14, 'giang', 'giang8b07@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlists`
--

INSERT INTO `wishlists` (`id`, `customer_id`, `product_id`, `productName`, `price`, `image`) VALUES
(58, 47, 70, 'Sữa Rửa Mặt Dành Cho Da Nhạy Cảm Cetaphil Gentle Skin Cleanser 500ml.', '409500', '1757239823_cetaphil_gentle_skin_cleanser_500ml_-_3499320013048_087cca0a8591469da8ac066521247ae1_master.png'),
(59, 47, 71, 'Tẩy Tế Bào Chết Hương Oải Hương (Natural Exfoliating Sugar Scrub - Lavender Harvest).', '175000', '1757239913_t_huong_oai_huong__natural_exfoliating_sugar_scrub_-_lavender_harvest__6332cef63cd043bd9216bb5ce2b4c09c_master.jpg'),
(60, 47, 82, 'Dầu Xả Kiểm Soát Dầu Moist Diane Extra Fresh & Hydrate Treatment 450ml.', '168750', '1757240736_dau_xa_moist_diane_extra_fresh___hydrate_treatment_450ml_69ec13ebc6b347c0b06686f4f707065d_master.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `fk_customer_comment` (`customer_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `qr_trans`
--
ALTER TABLE `qr_trans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `productId` (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `qr_trans`
--
ALTER TABLE `qr_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_customer_comment` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `qr_trans`
--
ALTER TABLE `qr_trans`
  ADD CONSTRAINT `qr_trans_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
