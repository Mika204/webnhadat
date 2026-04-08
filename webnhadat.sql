-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3308
-- Thời gian đã tạo: Th4 08, 2026 lúc 05:48 PM
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
-- Cơ sở dữ liệu: `webnhadat`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `emailadmin` varchar(100) NOT NULL,
  `passwordadmin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`idadmin`, `emailadmin`, `passwordadmin`) VALUES
(1, 'nguyenvy2006@gmail.com', 'admin12345');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `batdongsan`
--

CREATE TABLE `batdongsan` (
  `idbds` int(11) NOT NULL,
  `idKv` int(11) NOT NULL,
  `tenBds` varchar(255) NOT NULL,
  `gia` decimal(15,2) NOT NULL,
  `diaChi` varchar(255) DEFAULT NULL,
  `moTa` text DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `trangThai` enum('chờ duyệt','đã duyệt','từ chối') DEFAULT 'chờ duyệt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `batdongsan`
--

INSERT INTO `batdongsan` (`idbds`, `idKv`, `tenBds`, `gia`, `diaChi`, `moTa`, `iduser`, `trangThai`) VALUES
(1, 1, 'Nhà phố Quận 1 gần chợ Bến Thành', 8500000000.00, 'Đường Lê Thị Riêng, Phường Bến Thành, Quận 1, Hồ Chí Minh', 'Nhà phố tọa lạc ngay trung tâm Quận 1 – khu vực sầm uất và đắt giá bậc nhất TP.HCM, chỉ vài phút di chuyển đến Chợ Bến Thành. Khu vực xung quanh nhộn nhịp cả ngày lẫn đêm, rất phù hợp để ở, kinh doanh hoặc cho thuê sinh lời cao. Nhà phố có không gian thoáng đãng, thiết kế hiện đại, tận dụng tối đa ánh sáng tự nhiên, mang lại cảm giác thoải mái và tiện nghi.', 2, 'đã duyệt'),
(2, 2, 'Căn hộ Quận 3, 81m² nhà đẹp , ánh sáng tự nhiên, ban công thoáng', 4200000000.00, 'Screc Tower, Đường Trường Sa, Phường 12, Quận 3, Hồ Chí Minh', 'Căn hộ được thiết kế hiện đại, tối ưu diện tích sử dụng, đón ánh sáng tự nhiên tốt, tạo cảm giác rộng rãi và thoải mái. Khu vực xung quanh đầy đủ tiện ích như trường học, siêu thị, quán ăn, quán cà phê và các dịch vụ thiết yếu, đáp ứng mọi nhu cầu sinh hoạt hàng ngày.', 2, 'đã duyệt'),
(3, 3, 'Biệt thự Quận 7,Biệt thự khu Phú Mỹ Hưng', 15000000000.00, 'Mỹ Phước, Phường Tân Phong, Quận 7, Hồ Chí Minh', 'Biệt thự sở hữu thiết kế sang trọng, không gian rộng rãi, nhiều cây xanh và ánh sáng tự nhiên, mang đến cảm giác thoải mái, riêng tư tuyệt đối cho gia chủ. Xung quanh là hệ thống trường quốc tế, bệnh viện, trung tâm thương mại, nhà hàng cao cấp, đáp ứng mọi nhu cầu sinh hoạt và giải trí.', 2, 'đã duyệt'),
(4, 4, 'Nhà phố Quận 10 nằm trong khu vực trung tâm năng động, kết nối thuận tiện đến Quận 1, Quận 3 và các khu vực lân cận', 7000000000.00, '570/1, Đường 3/2, Phường 14, Quận 10, Hồ Chí Minh', 'Khu dân cư đông đúc, an ninh tốt, phù hợp để an cư lâu dài hoặc kết hợp kinh doanh, cho thuê. Nhà có thiết kế hiện đại, không gian thoáng mát, tận dụng tốt ánh sáng tự nhiên, tạo cảm giác thoải mái cho gia chủ.', 2, 'đã duyệt'),
(6, 6, 'Nhà phố Tân Bình, SIÊU PHẨM Có 3 PHÒNG NGỦ 4WC', 4800000000.00, 'Đường Hoàng Bật Đạt, Phường 15, Quận Tân Bình, Hồ Chí Minh', 'Nhà được thiết kế hiện đại, không gian thoáng mát, đầy đủ công năng sử dụng. Gần chợ, trường học, siêu thị và các tiện ích thiết yếu, mang lại cuộc sống tiện nghi cho gia đình.', 2, 'đã duyệt'),
(12, 9, 'căn hộ  RichStar 2 phòng ngủ - 3 tỷ, 3 phòng ngủ - 2WC', 4300000000.00, 'Đường Hòa Bình, Phường Hiệp Tân, Quận Tân Phú, Hồ Chí Minh', 'Cơ hội sở hữu căn hộ đẹp tại khu căn hộ RichStar – một trong những dự án nổi bật với thiết kế hiện đại và tiện ích đầy đủ, phù hợp cho gia đình trẻ hoặc đầu tư sinh lời.', 2, 'đã duyệt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `datlichhen`
--

CREATE TABLE `datlichhen` (
  `id_dat_lich_hen` int(11) NOT NULL,
  `id_nguoi_mua` int(11) NOT NULL,
  `idbds` int(11) NOT NULL,
  `ngayDat` date NOT NULL,
  `tienCoc` decimal(15,2) DEFAULT NULL,
  `trangThai` enum('đã cọc','hoàn thành','hủy') DEFAULT 'đã cọc',
  `pttt` enum('tiền mặt','chuyển khoản') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `datlichhen`
--

INSERT INTO `datlichhen` (`id_dat_lich_hen`, `id_nguoi_mua`, `idbds`, `ngayDat`, `tienCoc`, `trangThai`, `pttt`) VALUES
(17, 3, 6, '2026-04-04', 240000000.00, 'hủy', 'tiền mặt'),
(18, 3, 4, '2026-04-05', 350000000.00, 'đã cọc', 'tiền mặt'),
(21, 4, 6, '2026-04-08', 240000000.00, 'hủy', 'chuyển khoản'),
(22, 3, 12, '2026-04-15', 215000000.00, 'hoàn thành', 'chuyển khoản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `iduser` int(11) NOT NULL,
  `idbds` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`iduser`, `idbds`) VALUES
(2, 6),
(4, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `idHinhanh` int(11) NOT NULL,
  `idbds` int(11) NOT NULL,
  `duong_dan_anh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhanh`
--

INSERT INTO `hinhanh` (`idHinhanh`, `idbds`, `duong_dan_anh`) VALUES
(1, 1, 'uploads/Do7vxGiJtGC1BGiITTeP3aBGpyZBUtRD885bYu4L.jpg'),
(2, 1, 'uploads/jATrNWInHBFcdsCnG0blZM9uxTqxsEyByGsOhNm4.jpg'),
(3, 1, 'uploads/1W0PMRkVN0TI7AWGDq6U2zmzELmHRX4t5sl5Q763.jpg'),
(4, 6, 'uploads/sA7yiIfMTzLKRVZcShzdvM7eBxS2LZVPIjVWPqPf.jpg'),
(5, 6, 'uploads/18IRcgQWb07E7anTP8EF0TEtvZTU18iaB0sB5Obo.jpg'),
(6, 6, 'uploads/E07OFsspa3mnU9TwPLjT8Z83BhPpS1eS4tmIwObV.jpg'),
(7, 6, 'uploads/WQlh0sVLeP3vDd4c5uh6x7XI8EVUKblFk2Y2q8Wt.jpg'),
(8, 4, 'uploads/NQDn108fDrptLHO5BqSZgaCHHv0uRYUx9Uw8ynpk.jpg'),
(9, 4, 'uploads/NGSgvJy4d7F2XETC2c3EAo3u8lxcblcbBRWb7Wvm.jpg'),
(10, 4, 'uploads/dJ18gv7EZQr4rsqgsWnAw6fqeJZ5CbsgD4yx5trY.jpg'),
(11, 3, 'uploads/SA1Feu4nf3YP1iy7vfhcv7mOXPIhNRUpdM3mW0cX.jpg'),
(12, 3, 'uploads/x8wWAxE8FodDaN2a5O97eAWuv2ZNIeACl4Z9JZ7H.jpg'),
(13, 3, 'uploads/gn94HEPKMYTNwO9BqamQyHnSd3SivNczy6t5G0HX.jpg'),
(14, 3, 'uploads/S0sKkf5LoA1FdvdCeI3NDjuEDLdPfIpPsWkteHHM.jpg'),
(15, 2, 'uploads/r5N6YeuvTEQ2CTZCkdyxEp3A7RouUThXqEj1QV2E.jpg'),
(16, 2, 'uploads/Spucbdwhcjqwd9RFrRPMOfThw2gzmnTjbSRHlHYK.jpg'),
(17, 2, 'uploads/sHwDnGfexlulPS36h3PGrXQnnbngRC2U1p0TVIHR.jpg'),
(18, 2, 'uploads/802XuhvdTWUzObygBlirgZwaFznrtziqaCVbDBMn.jpg'),
(23, 12, 'uploads/5UHKdIjYq3t2S5Z1CsFQK9SeBzHRwKzBWJMNvzVG.jpg'),
(24, 12, 'uploads/Cofz3oONw0jMuszwlgdYUxYBU3UJkBoUnxeC64vx.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuvuc`
--

CREATE TABLE `khuvuc` (
  `idKv` int(11) NOT NULL,
  `tenKv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khuvuc`
--

INSERT INTO `khuvuc` (`idKv`, `tenKv`) VALUES
(1, 'Quận 1'),
(2, 'Quận 3'),
(3, 'Quận 7'),
(4, 'Quận 10'),
(5, 'Bình Thạnh'),
(6, 'Tân Bình'),
(8, 'Thủ Đức'),
(9, 'Tân Phú'),
(10, 'Quận 2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2026_03_14_123933_create_admin_table', 0),
(2, '2026_03_14_123933_create_batdongsan_table', 0),
(3, '2026_03_14_123933_create_datlichhen_table', 0),
(4, '2026_03_14_123933_create_giohang_table', 0),
(5, '2026_03_14_123933_create_hinhanh_table', 0),
(6, '2026_03_14_123933_create_khuvuc_table', 0),
(7, '2026_03_14_123933_create_users_table', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`iduser`, `hoten`, `email`, `password`, `diachi`, `sdt`, `created_at`, `updated_at`) VALUES
(2, 'song thương', 'thuong1510@gmail.com', '$2y$10$PnH45khmgsyCaMWWqJpLEeUdu6tT9onpaEjMw1j0bqaQzmq2S/06W', NULL, NULL, '2026-03-15 03:31:58', '2026-03-15 03:31:58'),
(3, 'Vy', 'tuongvy0610@gmail.com', '$2y$10$MkrcOOjZWe8U0nfBZkDwWum10ym6v0b0q3jiQYDb4ZddVn0zUTCcK', NULL, NULL, '2026-03-23 02:12:57', '2026-03-23 02:12:57'),
(4, 'gia hân', 'hannguyen123@gmail.com', '$2y$10$tmOrmdje8lSBLigXJG8KQeBjpNQ5UOiP1nUpmfQrHdomTF8OHV8bG', NULL, NULL, '2026-03-23 10:28:49', '2026-03-23 10:28:49');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`),
  ADD UNIQUE KEY `emailadmin` (`emailadmin`);

--
-- Chỉ mục cho bảng `batdongsan`
--
ALTER TABLE `batdongsan`
  ADD PRIMARY KEY (`idbds`),
  ADD KEY `idKv` (`idKv`),
  ADD KEY `fk_bds_user` (`iduser`);

--
-- Chỉ mục cho bảng `datlichhen`
--
ALTER TABLE `datlichhen`
  ADD PRIMARY KEY (`id_dat_lich_hen`),
  ADD KEY `iduser` (`id_nguoi_mua`),
  ADD KEY `idbds` (`idbds`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`iduser`,`idbds`),
  ADD KEY `idbds` (`idbds`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`idHinhanh`),
  ADD KEY `idbds` (`idbds`);

--
-- Chỉ mục cho bảng `khuvuc`
--
ALTER TABLE `khuvuc`
  ADD PRIMARY KEY (`idKv`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `batdongsan`
--
ALTER TABLE `batdongsan`
  MODIFY `idbds` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `datlichhen`
--
ALTER TABLE `datlichhen`
  MODIFY `id_dat_lich_hen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `idHinhanh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `khuvuc`
--
ALTER TABLE `khuvuc`
  MODIFY `idKv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `batdongsan`
--
ALTER TABLE `batdongsan`
  ADD CONSTRAINT `batdongsan_ibfk_1` FOREIGN KEY (`idKv`) REFERENCES `khuvuc` (`idKv`),
  ADD CONSTRAINT `fk_bds_user` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`);

--
-- Các ràng buộc cho bảng `datlichhen`
--
ALTER TABLE `datlichhen`
  ADD CONSTRAINT `datlichhen_ibfk_1` FOREIGN KEY (`id_nguoi_mua`) REFERENCES `users` (`iduser`),
  ADD CONSTRAINT `datlichhen_ibfk_2` FOREIGN KEY (`idbds`) REFERENCES `batdongsan` (`idbds`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`idbds`) REFERENCES `batdongsan` (`idbds`);

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `hinhanh_ibfk_1` FOREIGN KEY (`idbds`) REFERENCES `batdongsan` (`idbds`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
