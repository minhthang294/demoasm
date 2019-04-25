-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 29, 2018 lúc 11:25 AM
-- Phiên bản máy phục vụ: 10.1.30-MariaDB
-- Phiên bản PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: asm
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng category
--

CREATE TABLE category (
  catId int NOT NULL,
  catName varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng category
--

INSERT INTO category (catId, catName) VALUES
(1, 'Bags'),
(2, 'Watches'),
(3, 'Shoes');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng product
--

CREATE TABLE product (
  proId int NOT NULL,
  proName varchar(100) NOT NULL,
  proImage varchar(100) NOT NULL,
  proDes varchar(500) NOT NULL,
  prPrice float NOT NULL,
  catId int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng product
--

INSERT INTO product (proId, proName, proImage, proDes, prPrice, catId) VALUES
(1, 'Watches', 'images/pro1.jpg', 'Its never too late or too early to get a watch!', 10, 2),
(2, 'Leather', 'images/pro2.jpg', 'When you really need to carry extra stuff', 300, 1),
(3, 'Vans', 'images/pro3.jpg', 'You might carry it in some comfortable shoes.', 20, 3),
(4, 'Adidas', 'images/pro4.jpg', 'You might carry it in some comfortable shoes.', 60, 3),
(5, 'Nike', 'images/pro5.JPG', 'You might carry it in some comfortable shoes.', 90, 3),
(6, 'Rolex', 'images/pro6.jpg', 'Its never too late or too early to get a watch!', 60, 2),
(7, 'Philip Patek', 'images/pro7.jpg', 'Its never too late or too early to get a watch!', 60, 2),
(9, 'Vanna Bolala', 'images/pro8.jpg', 'When you really need to carry extra stuff', 69, 1),
(11, 'Niko niKe', 'images/pro9.jpg', 'You will buy this product because bitch', 919.54, 1),
(14, 'Hahh shdhsd -hihi', 'images/pro6.jpg', 'Hihihishdihsidihi', 2388.25, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng promote
--

CREATE TABLE promote (
  adId int NOT NULL,
  adImage varchar(100) DEFAULT NULL,
  adCaption varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng promote
--

INSERT INTO promote (adId, adImage, adCaption) VALUES
(1, 'images/slide1.jpg', 'New collection'),
(2, 'images/slide2.jpg', 'Get discount!'),
(3, 'images/slide3.jpg', 'Only now for $10');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng category
--
ALTER TABLE category
  ADD PRIMARY KEY (catId);

--
-- Chỉ mục cho bảng product
--
ALTER TABLE product
  ADD PRIMARY KEY (proId),
  ADD KEY fk_foreign_catid (catId);

--
-- Chỉ mục cho bảng promote
--
ALTER TABLE promote
  ADD PRIMARY KEY (adId);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng category
--
ALTER TABLE category
  MODIFY catId int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng promote
--
ALTER TABLE promote
  MODIFY adId int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng product
--
ALTER TABLE product
  ADD CONSTRAINT fk_foreign_catid FOREIGN KEY (catId) REFERENCES category (catId) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
