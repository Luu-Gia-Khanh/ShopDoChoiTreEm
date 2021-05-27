-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th5 27, 2021 lúc 05:48 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopdochoitreem`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `status`) VALUES
(6, 'Đồ Chơi Mô Hình', 1),
(7, 'Lego Duplo Town', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `namecoupon` varchar(255) NOT NULL,
  `codecoupon` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `feature` int(11) NOT NULL,
  `amount_coupon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `coupon`
--

INSERT INTO `coupon` (`id`, `namecoupon`, `codecoupon`, `status`, `feature`, `amount_coupon`) VALUES
(1, 'Test', 'test1234', 1, 1, 20000),
(2, '30/4', 'huyen1234', 1, 0, 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_04_30_093315_admin', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `pquantity` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `productprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderitems`
--

INSERT INTO `orderitems` (`id`, `pid`, `pquantity`, `orderid`, `productprice`) VALUES
(34, 9, 4, 39, 60000),
(35, 12, 1, 40, 799000),
(36, 13, 1, 40, 839000),
(37, 10, 1, 41, 236000),
(38, 9, 1, 41, 60000),
(39, 9, 1, 42, 60000),
(40, 12, 2, 42, 799000),
(41, 9, 3, 43, 60000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `orderstatus` varchar(50) NOT NULL,
  `idpayment` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `uid`, `totalprice`, `orderstatus`, `idpayment`, `timestamp`) VALUES
(39, 1, 192000, 'ordered', 30, '2021-05-05 02:50:17'),
(40, 1, 1618000, 'ordered', 31, '2021-05-05 03:01:45'),
(41, 1, 296000, 'ordered', 32, '2021-05-05 13:53:46'),
(42, 1, 1326400, 'ordered', 33, '2021-05-05 15:20:38'),
(43, 1, 160000, 'ordered', 34, '2021-05-23 23:13:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `paymentmethod` int(11) NOT NULL,
  `paymentstatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`id`, `paymentmethod`, `paymentstatus`) VALUES
(30, 1, 1),
(31, 0, 1),
(32, 0, 1),
(33, 1, 1),
(34, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `cateid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `cateid`, `title`, `price`, `description`, `image`, `date_added`, `status`) VALUES
(9, 6, 'Đồ chơi khám răng cá sấu cho bé', 60000, 'Đồ chơi khám răng cá sấu tạo cho người chơi sự hồi hộp, bất ngờ và cảm giác thú vị khi bạn nhấn vào răng cá sấu và bị cả chiếc hàm cắn lấy ngón tay. Sản phẩm có cách chơi vô cùng đơn giản: cá sấu có 13 răng, người chơi lần lượt nhấn vào từng chiếc răng, khi nhấn trúng chiếc răng đau thì sẽ nghe tiếp \"khập\" đồng thời ngón tay sẽ bị cá sấu cắn và thua cuộc. Mỗi lần chơi, chiếc răng đau sẽ được thiết lập lại ở vị trí khác nhau.', 'do-choi-kham-rang-ca-sau-535.jpg', '2021-05-04 18:22:59', 1),
(10, 6, 'Xe đua F1 điều khiển từ xa, có đèn Led và pin sạc Duka DK81037', 236000, 'Xe đua F1 điều khiển từ xa, có đèn Led và pin sạc Duka DK81037 được thiết kế rất tinh tê và hấp dẫn, xe với 4 chức năng: Tiến - lùi - rẽ trái - rẽ phải, đèn led xinh động, các bé sẽ nhanh chóng nhập vai và thể hiện khả năng, bản lĩnh của một tay đua đích thực. Xe còn giúp bé tăng cường trí thông minh và nâng cao chỉ số cảm súc EQ.', 'xe-dua-f1-dieu-khien-tu-xa-co-den-led-va-pin-sac-duka-dk81037-148.jpg', '2021-05-04 18:33:25', 1),
(12, 6, 'Robot biến hình điều khiển từ xa STRIKE', 799000, 'Điều khiển bằng romote, di chuyển trái phải, tiến lùi. Nhảy múa theo nhạc và khả năng lập trình hành động Điểm mạnh nổi bật: Khả năng biến hình', 'vtk4_2_83.jpg', '2021-05-04 18:44:02', 1),
(13, 7, 'Xe Tải & Xe Xúc Của Bé', 839000, 'Với 2 bạn công nhân xây dựng, một chiếc xe tải, máy xúc có cabin quay và xẻng di động, LEGO® DUPLO® (10931) Xe Tải & Xe Xúc Của Bé là một công trường thu nhỏ tuyệt vời dành cho trẻ từ 2 tuổi.', '09_14588.jpg', '2021-05-04 18:47:41', 1),
(14, 7, 'Bữa Tiệc Sinh Nhật Ngoài Trời', 340000, 'Tiệc sinh nhật ngoài trời luôn là ý tưởng tuyệt vời cho bé khám phá thế giới sống động xung quanh, nào cùng chơi bập bênh và bóng bay. Bộ mô hình còn có bánh kem sinh nhật, những món quà và một chú sóc dễ thương.', '10832_1_138.jpg', '2021-05-04 18:48:56', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `type` enum('admin','member') NOT NULL DEFAULT 'member',
  `username` varchar(45) NOT NULL,
  `email` varchar(80) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_expires` date DEFAULT NULL,
  `date_midifiled` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `type`, `username`, `email`, `pass`, `image`, `date_create`, `date_expires`, `date_midifiled`) VALUES
(1, 'member', 'khanh', 'a@gmail.com', '123456', '', '2021-04-16 06:38:23', NULL, '2021-04-16 06:38:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `usermeta`
--

CREATE TABLE `usermeta` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `usermeta`
--

INSERT INTO `usermeta` (`id`, `uid`, `firstname`, `lastname`, `company`, `address`, `city`, `state`, `country`, `zip`, `mobile`) VALUES
(3, 1, 'luu gia', 'khanh', 'LGK', 'viet nam', 'HCM', 'HCM', 'Việt Nam', 'gPo8j14edi', '0368038738');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pid_orderitems` (`pid`),
  ADD KEY `fk_orderid` (`orderid`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_uid_order` (`uid`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `usermeta`
--
ALTER TABLE `usermeta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_iduser_usermeta` (`uid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `usermeta`
--
ALTER TABLE `usermeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `fk_orderid` FOREIGN KEY (`orderid`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_pid_orderitems` FOREIGN KEY (`pid`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_uid_order` FOREIGN KEY (`uid`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `usermeta`
--
ALTER TABLE `usermeta`
  ADD CONSTRAINT `fk_iduser_usermeta` FOREIGN KEY (`uid`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
