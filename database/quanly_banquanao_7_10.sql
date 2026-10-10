-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 07, 2026 lúc 11:31 AM
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
-- Cơ sở dữ liệu: `quanly_banquanao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblcart`
--

CREATE TABLE `tblcart` (
  `MaGioHang` int(10) NOT NULL,
  `MaNguoiDung` int(10) NOT NULL,
  `MaChiTietSP` int(10) NOT NULL,
  `SoLuongThem` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tblcart`
--

INSERT INTO `tblcart` (`MaGioHang`, `MaNguoiDung`, `MaChiTietSP`, `SoLuongThem`) VALUES
(1, 1, 3, 5),
(4, 1, 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblcategory`
--

CREATE TABLE `tblcategory` (
  `MaDanhMuc` int(10) NOT NULL,
  `TenDanhMuc` varchar(50) NOT NULL,
  `MoTa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tblcategory`
--

INSERT INTO `tblcategory` (`MaDanhMuc`, `TenDanhMuc`, `MoTa`) VALUES
(7, 'Áo', 'Áo áo áo'),
(8, 'Quần', 'Quần Quần Quần'),
(9, 'test1', 'demo1 description'),
(10, 'Tất', 'Giữ ấm, thấm hút mồ hôi'),
(11, 'sịp boxxer', '...\r\n'),
(12, 'Ao ', ''),
(14, 'testttt', 'testtttttttttttttttttttttt'),
(15, 'ád', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblproduct`
--

CREATE TABLE `tblproduct` (
  `MaSanPham` int(11) NOT NULL,
  `MaDanhMucSP` int(11) NOT NULL,
  `TenSanPham` varchar(100) NOT NULL,
  `AnhSanPham` varchar(255) NOT NULL,
  `Gia` float NOT NULL,
  `ThuongHieu` varchar(50) NOT NULL,
  `MoTa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tblproduct`
--

INSERT INTO `tblproduct` (`MaSanPham`, `MaDanhMucSP`, `TenSanPham`, `AnhSanPham`, `Gia`, `ThuongHieu`, `MoTa`) VALUES
(17, 7, 'Áo 3 lỗ', '', 100000, 'VN', 'abvccc'),
(18, 9, 'demopd1', '', 200000, 'ABC', 'XYZ'),
(19, 7, 'Áo thun', '', 200000, 'LA', 'los angeleslos angeleslos angeleslos angeles'),
(20, 10, 'Tất cổ ngắn', '', 10000, 'Nike', 'ABCXYZ'),
(22, 11, 'Mixilíp', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAMAAzAMBEQACEQEDEQH/', 36000, 'Mixishop', '[Coolmate x MixiGaming] Quần Lót Nam Trunk Mixilip Hoạ Tiết Trái Tim'),
(23, 12, 'Áo giữ nhiệt', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAJQAmAMBEQACEQEDEQH/', 110000, 'LuisDior', 'Siêu ấm, thoáng'),
(24, 7, 'Áo Kaki', '', 400000, 'Jp', 'none'),
(25, 9, 'áo abc', '', 100000, '.', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblproductdetail`
--

CREATE TABLE `tblproductdetail` (
  `MaChiTietSP` int(10) NOT NULL,
  `MaSanPham` int(10) NOT NULL,
  `Size` varchar(5) NOT NULL,
  `Mau` varchar(10) NOT NULL,
  `SoLuong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tblproductdetail`
--

INSERT INTO `tblproductdetail` (`MaChiTietSP`, `MaSanPham`, `Size`, `Mau`, `SoLuong`) VALUES
(1, 17, 'S', 'Đỏ', 100),
(2, 22, 'XL', 'Đen, đỏ', 111111),
(3, 17, 'L', 'Xanh', 12345),
(4, 20, 'L', 'Trắng', 100),
(6, 20, 'S', 'Trắng', 99),
(7, 24, 'M', 'Đen', 95),
(8, 25, 'S', 'Đen', 1000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbluser`
--

INSERT INTO `tbluser` (`id`, `user_name`, `password`, `full_name`, `phone`, `address`, `role`) VALUES
(1, 'nguyenvana', 'abc123', 'Nguyen Van A', '0123456789', 'Yen Bai', 'Khach hang'),
(4, 'huy1219', 'Huyanh1234#', 'Nguyễn Xuân Huy', '0913657483', 'Phường Văn Phú, Thôn Bình Lục, Tỉnh Lào Cai', 'Khách hàng'),
(5, 'daohainam123', 'sdfghj', 'Đào Hải Nam', '0987654328', 'Tuyên Quang', 'Khách hàng'),
(6, 'huy111', 'ggg1234', 'Nguyễn Huy', '04386758392', 'xyz', 'Khách hàng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`MaGioHang`),
  ADD KEY `MaChiTietSP` (`MaChiTietSP`),
  ADD KEY `MaNguoiDung` (`MaNguoiDung`,`MaChiTietSP`);

--
-- Chỉ mục cho bảng `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`MaDanhMuc`);

--
-- Chỉ mục cho bảng `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `fk_sanpham_danhmuc` (`MaDanhMucSP`);

--
-- Chỉ mục cho bảng `tblproductdetail`
--
ALTER TABLE `tblproductdetail`
  ADD PRIMARY KEY (`MaChiTietSP`),
  ADD KEY `fk_chitiet_sanpham` (`MaSanPham`) USING BTREE;

--
-- Chỉ mục cho bảng `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `MaGioHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `MaDanhMuc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `tblproductdetail`
--
ALTER TABLE `tblproductdetail`
  MODIFY `MaChiTietSP` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tblcart`
--
ALTER TABLE `tblcart`
  ADD CONSTRAINT `tblcart_ibfk_1` FOREIGN KEY (`MaNguoiDung`) REFERENCES `tbluser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblcart_ibfk_2` FOREIGN KEY (`MaChiTietSP`) REFERENCES `tblproductdetail` (`MaChiTietSP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD CONSTRAINT `fk_sanpham_danhmuc` FOREIGN KEY (`MaDanhMucSP`) REFERENCES `tblcategory` (`MaDanhMuc`);

--
-- Các ràng buộc cho bảng `tblproductdetail`
--
ALTER TABLE `tblproductdetail`
  ADD CONSTRAINT `fk_chitiet_sanpham` FOREIGN KEY (`MaSanPham`) REFERENCES `tblproduct` (`MaSanPham`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
