-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 28, 2023 lúc 05:02 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phan2_bai2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img`
--

CREATE TABLE `img` (
  `id` int(11) NOT NULL,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `img`
--

INSERT INTO `img` (`id`, `img1`, `img2`) VALUES
(1, 'img/hoodieFront.webp', 'img/hoodieBack.webp'),
(2, 'img/light1.webp', 'img/light2.webp'),
(3, 'img/sweater1.webp', 'img/sweater1_2.webp'),
(4, 'img/sweater2.webp', 'img/sweater2_2.webp'),
(5, 'img/sweaterRose.webp', 'img/sweaterRose_2.webp'),
(6, 'img/tshirt1.webp', 'img/tshirt1_2.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desciption` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `desciption`, `price`) VALUES
(1, 'Hoodie', 'The Blackpink hoodie is a must-have for any fan of the K-pop girl group. Made from high-quality materials, this hoodie is both comfortable and stylish. It features the group\'s name and logo prominently displayed on the front, making it clear to everyone that you\'re a fan. The hoodie is available in a classic black color, making it easy to pair with other items in your wardrobe.', 100),
(2, 'Light Stick', 'The Blackpink light stick is a must-have accessory for any fan of the K-pop girl group. This light stick is not only practical for concerts and events but also a great way to show your support for the group. The light stick is designed with the iconic Blackpink logo and features the group\'s signature pink color, making it instantly recognizable as a Blackpink accessory.', 200),
(3, 'Jisoo Sweater', 'The Blackpink Jisoo sweater is a must-have for any fan of the K-pop group. Made from high-quality materials, this sweater is both stylish and comfortable. It features the image of the group\'s member, Jisoo, on the front, making it clear to everyone that you\'re a fan of the group. The sweater is available in a classic black color, making it easy to pair with other items in your wardrobe.\n\nThe sweater is made from a soft and comfortable cotton blend material that is perfect for cooler weather. It features a comfortable crew neckline and long sleeves, providing extra warmth and comfort. The sweater also has a ribbed hemline and cuffs, ensuring a snug fit that stays in place.', 30),
(4, 'Jenni Sweater', 'The Blackpink Jennie sweater is a stylish and comfortable clothing item that is perfect for fans of the K-pop group. This sweater features the image of the group\'s member, Jennie, on the front and is made from high-quality materials to ensure both durability and comfort. With its trendy design and comfortable fit, the Blackpink Jennie sweater is a great addition to any fan\'s wardrobe.', 50),
(5, 'Rose Sweater', 'The Blackpink Rose sweater is a must-have for any fan of the K-pop group. Made from high-quality materials, this sweater is both stylish and comfortable. It features the image of the group\'s member, Rose, on the front, making it clear to everyone that you\'re a fan of the group. The sweater is available in a classic black color, making it easy to pair with other items in your wardrobe.\n\nThe sweater is made from a soft and cozy cotton blend material that is perfect for cooler weather. It features a comfortable crew neckline and long sleeves, providing extra warmth and comfort. The sweater also has a ribbed hemline and cuffs, ensuring a snug fit that stays in place.', 60),
(6, 'T-shirt', 'The shirt is made from a soft and durable cotton material that is breathable and easy to care for. It features a comfortable crew neckline and short sleeves, making it perfect for wearing on warm days or layering under a jacket or hoodie. The shirt is als', 40);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
