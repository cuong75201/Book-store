-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 13, 2025 lúc 03:58 AM
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
-- Cơ sở dữ liệu: `bookstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `ID_Cart` int(11) NOT NULL,
  `ID_Khachhang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `ID_Chi_Tiet` int(11) NOT NULL,
  `ID_Don_Hang` int(11) DEFAULT NULL,
  `ID_Sach` int(11) DEFAULT NULL,
  `So_Luong` int(11) NOT NULL,
  `Don_Gia` decimal(10,2) NOT NULL,
  `Thanh_Tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_quyen`
--

CREATE TABLE `chi_tiet_quyen` (
  `MaQuyen` int(11) NOT NULL,
  `ID_ChucNang` int(11) NOT NULL,
  `Action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucnang`
--

CREATE TABLE `chucnang` (
  `ID_ChucNang` int(11) NOT NULL,
  `Ten_ChucNang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctiet_pnh`
--

CREATE TABLE `ctiet_pnh` (
  `ID_sach` int(11) NOT NULL,
  `ID_pnh` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` int(11) NOT NULL,
  `thanh_tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia_sach`
--

CREATE TABLE `danh_gia_sach` (
  `ID_sach` int(11) NOT NULL,
  `ID_Khachhang` int(11) NOT NULL,
  `danh_gia` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `ID_The_Loai` int(11) NOT NULL,
  `Ten_The_Loai` varchar(100) NOT NULL,
  `Mo_Ta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `ID_Don_Hang` int(11) NOT NULL,
  `ID_Khach_Hang` int(11) DEFAULT NULL,
  `Ngay_Dat_Hang` datetime NOT NULL,
  `Tong_Tien` decimal(10,2) DEFAULT NULL,
  `Trang_Thai` varchar(50) DEFAULT NULL,
  `Phuong_Thuc_Thanh_Toan` int(11) DEFAULT NULL,
  `Dia_Chi_Giao_Hang` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ID_Khach_Hang` int(11) NOT NULL,
  `Ten_Khach_Hang` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Mat_Khau` varchar(255) NOT NULL,
  `So_Dien_Thoai` varchar(15) DEFAULT NULL,
  `Dia_Chi` text DEFAULT NULL,
  `Ngay_Dang_Ky` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ncc`
--

CREATE TABLE `ncc` (
  `ID_NCC` int(11) NOT NULL,
  `Ten_NCC` varchar(100) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `LienHe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `ID_NV` int(11) NOT NULL,
  `Ten_NV` varchar(100) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `SDT` varchar(10) NOT NULL,
  `Luong` int(11) NOT NULL,
  `MaQuyen` int(11) NOT NULL,
  `Mat_khau` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomquyen`
--

CREATE TABLE `nhomquyen` (
  `MaQuyen` int(11) NOT NULL,
  `TenQuyen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pnh`
--

CREATE TABLE `pnh` (
  `ID_PNH` int(11) NOT NULL,
  `ID_NCC` int(11) NOT NULL,
  `Ngay_Nhap` date NOT NULL,
  `Tong_Tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pttt`
--

CREATE TABLE `pttt` (
  `ID_PTTT` int(11) NOT NULL,
  `Ten_PTTT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `ID_Sach` int(11) NOT NULL,
  `Ten_Sach` varchar(200) NOT NULL,
  `Tac_Gia` varchar(100) DEFAULT NULL,
  `Ten_Nha_Xuat_Ban` varchar(100) DEFAULT NULL,
  `Nam_Xuat_Ban` int(11) DEFAULT NULL,
  `ID_The_Loai` int(11) DEFAULT NULL,
  `Gia_Ban` decimal(10,2) NOT NULL,
  `So_Luong_Ton` int(11) DEFAULT 0,
  `Mo_Ta` text DEFAULT NULL,
  `ID_Cart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID_Cart`),
  ADD KEY `ID_Khachhang` (`ID_Khachhang`);

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`ID_Chi_Tiet`),
  ADD KEY `ID_Don_Hang` (`ID_Don_Hang`),
  ADD KEY `ID_Sach` (`ID_Sach`);

--
-- Chỉ mục cho bảng `chi_tiet_quyen`
--
ALTER TABLE `chi_tiet_quyen`
  ADD PRIMARY KEY (`MaQuyen`,`ID_ChucNang`),
  ADD KEY `MaQuyen` (`MaQuyen`),
  ADD KEY `ID_ChucNang` (`ID_ChucNang`);

--
-- Chỉ mục cho bảng `chucnang`
--
ALTER TABLE `chucnang`
  ADD PRIMARY KEY (`ID_ChucNang`);

--
-- Chỉ mục cho bảng `ctiet_pnh`
--
ALTER TABLE `ctiet_pnh`
  ADD PRIMARY KEY (`ID_sach`,`ID_pnh`),
  ADD KEY `ID_sach` (`ID_sach`,`ID_pnh`),
  ADD KEY `ID_pnh` (`ID_pnh`);

--
-- Chỉ mục cho bảng `danh_gia_sach`
--
ALTER TABLE `danh_gia_sach`
  ADD PRIMARY KEY (`ID_sach`,`ID_Khachhang`),
  ADD KEY `ID_sach` (`ID_sach`,`ID_Khachhang`),
  ADD KEY `ID_Khachhang` (`ID_Khachhang`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`ID_The_Loai`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`ID_Don_Hang`),
  ADD KEY `ID_Khach_Hang` (`ID_Khach_Hang`),
  ADD KEY `Phuong_Thuc_Thanh_Toan` (`Phuong_Thuc_Thanh_Toan`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ID_Khach_Hang`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Chỉ mục cho bảng `ncc`
--
ALTER TABLE `ncc`
  ADD PRIMARY KEY (`ID_NCC`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`ID_NV`),
  ADD KEY `MaQuyen` (`MaQuyen`);

--
-- Chỉ mục cho bảng `nhomquyen`
--
ALTER TABLE `nhomquyen`
  ADD PRIMARY KEY (`MaQuyen`);

--
-- Chỉ mục cho bảng `pnh`
--
ALTER TABLE `pnh`
  ADD PRIMARY KEY (`ID_PNH`),
  ADD KEY `ID_NXB` (`ID_NCC`);

--
-- Chỉ mục cho bảng `pttt`
--
ALTER TABLE `pttt`
  ADD PRIMARY KEY (`ID_PTTT`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`ID_Sach`),
  ADD KEY `ID_The_Loai` (`ID_The_Loai`),
  ADD KEY `ID_Cart` (`ID_Cart`),
  ADD KEY `Tac_Gia` (`Tac_Gia`),
  ADD KEY `ID_Nha_Xuat_Ban` (`Ten_Nha_Xuat_Ban`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `ID_Cart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `ID_Chi_Tiet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chucnang`
--
ALTER TABLE `chucnang`
  MODIFY `ID_ChucNang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `ID_The_Loai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `ID_Don_Hang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ID_Khach_Hang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ncc`
--
ALTER TABLE `ncc`
  MODIFY `ID_NCC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `ID_NV` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pnh`
--
ALTER TABLE `pnh`
  MODIFY `ID_PNH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pttt`
--
ALTER TABLE `pttt`
  MODIFY `ID_PTTT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `ID_Sach` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`ID_Cart`) REFERENCES `sach` (`ID_Cart`);

--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`ID_Don_Hang`) REFERENCES `don_hang` (`ID_Don_Hang`),
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`ID_Sach`) REFERENCES `sach` (`ID_Sach`);

--
-- Các ràng buộc cho bảng `chucnang`
--
ALTER TABLE `chucnang`
  ADD CONSTRAINT `chucnang_ibfk_1` FOREIGN KEY (`ID_ChucNang`) REFERENCES `chi_tiet_quyen` (`ID_ChucNang`);

--
-- Các ràng buộc cho bảng `ctiet_pnh`
--
ALTER TABLE `ctiet_pnh`
  ADD CONSTRAINT `ctiet_pnh_ibfk_1` FOREIGN KEY (`ID_pnh`) REFERENCES `pnh` (`ID_PNH`);

--
-- Các ràng buộc cho bảng `danh_gia_sach`
--
ALTER TABLE `danh_gia_sach`
  ADD CONSTRAINT `danh_gia_sach_ibfk_1` FOREIGN KEY (`ID_sach`) REFERENCES `sach` (`ID_Sach`),
  ADD CONSTRAINT `danh_gia_sach_ibfk_2` FOREIGN KEY (`ID_Khachhang`) REFERENCES `khach_hang` (`ID_Khach_Hang`);

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`ID_Khach_Hang`) REFERENCES `khach_hang` (`ID_Khach_Hang`);

--
-- Các ràng buộc cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD CONSTRAINT `khach_hang_ibfk_1` FOREIGN KEY (`ID_Khach_Hang`) REFERENCES `cart` (`ID_Khachhang`);

--
-- Các ràng buộc cho bảng `ncc`
--
ALTER TABLE `ncc`
  ADD CONSTRAINT `ncc_ibfk_1` FOREIGN KEY (`ID_NCC`) REFERENCES `pnh` (`ID_NCC`);

--
-- Các ràng buộc cho bảng `nhomquyen`
--
ALTER TABLE `nhomquyen`
  ADD CONSTRAINT `nhomquyen_ibfk_1` FOREIGN KEY (`MaQuyen`) REFERENCES `nhanvien` (`MaQuyen`);

--
-- Các ràng buộc cho bảng `pttt`
--
ALTER TABLE `pttt`
  ADD CONSTRAINT `pttt_ibfk_1` FOREIGN KEY (`ID_PTTT`) REFERENCES `don_hang` (`Phuong_Thuc_Thanh_Toan`);

--
-- Các ràng buộc cho bảng `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`ID_The_Loai`) REFERENCES `danh_muc` (`ID_The_Loai`),
  ADD CONSTRAINT `sach_ibfk_2` FOREIGN KEY (`ID_Sach`) REFERENCES `ctiet_pnh` (`ID_sach`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
