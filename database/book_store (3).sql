-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th5 17, 2025 lúc 06:11 AM
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
-- Cơ sở dữ liệu: `book_store`
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

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`ID_Chi_Tiet`, `ID_Don_Hang`, `ID_Sach`, `So_Luong`, `Don_Gia`, `Thanh_Tien`) VALUES
(1, 5, 170, 2, 50000.00, 100000),
(2, 5, 171, 2, 70000.00, 140000),
(3, 6, 210, 2, 40000.00, 80000),
(4, 7, 183, 4, 50000.00, 200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_phieu_nhap`
--

CREATE TABLE `chi_tiet_phieu_nhap` (
  `ID_CTietPhieuNhap` int(11) NOT NULL,
  `ID_PhieuNhap` int(11) DEFAULT NULL,
  `ID_Sach` int(11) DEFAULT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaNhap` decimal(15,2) NOT NULL,
  `TrangThai` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_phieu_nhap`
--

INSERT INTO `chi_tiet_phieu_nhap` (`ID_CTietPhieuNhap`, `ID_PhieuNhap`, `ID_Sach`, `SoLuong`, `GiaNhap`, `TrangThai`) VALUES
(1, 1, 321, 10, 50000.00, 1),
(2, 1, 321, 5, 75000.00, 1),
(3, 2, 321, 7, 60000.00, 1),
(4, 2, 321, 12, 45000.00, 1),
(5, 3, 321, 3, 52000.00, 1),
(6, 3, 321, 8, 47000.00, 1),
(7, 1, 321, 10, 50000.00, 1),
(8, 1, 321, 5, 75000.00, 1),
(9, 2, 321, 7, 60000.00, 1),
(10, 2, 321, 12, 45000.00, 1),
(11, 3, 321, 3, 52000.00, 1),
(12, 3, 321, 8, 47000.00, 1),
(13, 1, 321, 10, 50000.00, 1),
(14, 1, 321, 5, 75000.00, 1),
(15, 2, 321, 7, 60000.00, 1),
(16, 2, 321, 12, 45000.00, 1),
(17, 3, 321, 3, 52000.00, 1),
(18, 3, 321, 8, 47000.00, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_quyen`
--

CREATE TABLE `chi_tiet_quyen` (
  `idchitiet` int(11) NOT NULL,
  `MaQuyen` int(11) NOT NULL,
  `hanhdong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_quyen`
--

INSERT INTO `chi_tiet_quyen` (`idchitiet`, `MaQuyen`, `hanhdong`) VALUES
(10, 1, 1),
(11, 1, 2),
(12, 1, 3),
(13, 1, 4),
(14, 1, 5),
(15, 1, 6),
(16, 1, 7),
(17, 1, 8),
(27, 6, 1),
(28, 6, 6),
(30, 7, 1),
(31, 7, 5);

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

--
-- Đang đổ dữ liệu cho bảng `ctiet_pnh`
--

INSERT INTO `ctiet_pnh` (`ID_sach`, `ID_pnh`, `so_luong`, `don_gia`, `thanh_tien`) VALUES
(269, 1, 2, 100000, 200000),
(269, 2, 2, 100000, 300000),
(296, 3, 3, 150000, 450000);

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

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`ID_The_Loai`, `Ten_The_Loai`, `Mo_Ta`) VALUES
(1, 'SÁCH MẦM NON', ''),
(2, 'SÁCH THIẾU NHI', ''),
(3, 'SÁCH KĨ NĂNG', ''),
(4, 'SÁCH KINH DOANH', ''),
(5, 'SÁCH MẸ VÀ BÉ', ''),
(6, 'SÁCH VĂN HỌC', ''),
(7, 'SÁCH THAM KHẢO', ''),
(8, 'NOTEBOOK', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dia_chi`
--

CREATE TABLE `dia_chi` (
  `ID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Ten_Nguoi_Nhan` varchar(255) NOT NULL,
  `Dia_Chi` text NOT NULL,
  `So_Dien_Thoai` varchar(15) NOT NULL,
  `Mac_Dinh` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dia_chi`
--

INSERT INTO `dia_chi` (`ID`, `Email`, `Ten_Nguoi_Nhan`, `Dia_Chi`, `So_Dien_Thoai`, `Mac_Dinh`) VALUES
(1, 'ntuanaanh2k5@gmail.com', 'Tuan Anh', '213', '0968403295', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `ID_Don_Hang` int(11) NOT NULL,
  `ID_Khach_Hang` int(11) DEFAULT NULL,
  `Ngay_Dat_Hang` datetime NOT NULL,
  `Tong_Tien` int(11) DEFAULT NULL,
  `Trang_Thai` varchar(50) DEFAULT NULL,
  `Phuong_Thuc_Thanh_Toan` int(11) DEFAULT NULL,
  `Dia_Chi_Giao_Hang` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`ID_Don_Hang`, `ID_Khach_Hang`, `Ngay_Dat_Hang`, `Tong_Tien`, `Trang_Thai`, `Phuong_Thuc_Thanh_Toan`, `Dia_Chi_Giao_Hang`) VALUES
(5, 36, '2025-05-12 12:07:53', 240000, '4', 1, '220 An Duong Vuong,5, Ho Chi Minh'),
(6, 36, '2025-05-14 08:32:27', 80000, '3', 1, '220 An Duong Vuong, 5, Ho Chi Minh'),
(7, 38, '2025-05-14 08:36:54', 200000, '3', 1, '110 ADV,5,Ho Chi Minh');

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
  `Ngay_Dang_Ky` date DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `Trang_Thai` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`ID_Khach_Hang`, `Ten_Khach_Hang`, `Email`, `Mat_Khau`, `So_Dien_Thoai`, `Dia_Chi`, `Ngay_Dang_Ky`, `status`, `Trang_Thai`) VALUES
(36, 'Cường Trần', 'cuong2982005@gmail.com', '$2y$10$Q4Q8PxaooJZJZdD5ZlMVe.eg4iUJ904mV6el0yiSz983aXfps5k7m', NULL, NULL, '2025-04-05', 0, 1),
(37, 'nguy a', 'ntuanaanh2k5@gmail.com', '$2y$10$WLDLrWGryMmC15g.Otw99uxwdUVC9mbaYPq32oX0d/goOk2sZ9J4.', NULL, NULL, '2025-04-10', 0, 1),
(38, 'Cường Trần', 'abc123@gmail.com', '$2y$10$RslvYqBSTGWNAlcRqPc2RuCH1KwZMMW0C.ADaEH2v1C0ad7aNaHrS', NULL, NULL, '2025-05-12', 0, 1),
(39, 'Cường Trần', '3123560006@sv.sgu.edu.vn', '$2y$10$ri/pK1c6/ukOs1.IPr8yi.toHfntRx9laDOQZq6.zXVZlzmZS58uy', NULL, NULL, '2025-05-16', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ncc`
--

CREATE TABLE `ncc` (
  `ID_NCC` int(11) NOT NULL,
  `Ten_NCC` varchar(100) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `LienHe` varchar(100) NOT NULL,
  `Trang_Thai` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ncc`
--

INSERT INTO `ncc` (`ID_NCC`, `Ten_NCC`, `DiaChi`, `LienHe`, `Trang_Thai`) VALUES
(2, 'Phương Nam', 'Pham Ngoc Thach, Binh Thanh, Ho Chi Minh', '0914151611', 1);

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
  `MaQuyen` int(11) DEFAULT NULL,
  `Mat_khau` varchar(100) NOT NULL,
  `TrangThai` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`ID_NV`, `Ten_NV`, `DiaChi`, `SDT`, `Luong`, `MaQuyen`, `Mat_khau`, `TrangThai`) VALUES
(1, 'Trần Hồ Hoàng Cường', '220 An Duong Vuong, Quan Binh Tan,Ho Chi Minh', '0363589035', 50000, 1, '0192023a7bbd73250516f069df18b500', 1),
(3, 'Tran Chi Luc', '220 An Duong Vuong, Quan Binh Tan, Ho Chi Minh', '0123456789', 50000, 6, '0192023a7bbd73250516f069df18b500', 1),
(4, 'Tran Van A', '220 An Duong Vuong, Quan Binh Tan, Ho Chi Minh', '0123123123', 50000, 7, '0192023a7bbd73250516f069df18b500', 1),
(5, 'Tran Van B', '220 An Duong Vuong, Quan Binh Tan, Ho Chi Minh', '0987654321', 50000, 6, '0192023a7bbd73250516f069df18b500', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `ID_NCC` int(11) NOT NULL,
  `Ten_NCC` varchar(255) NOT NULL,
  `Dia_Chi` text DEFAULT NULL,
  `SDT` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `TrangThai` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`ID_NCC`, `Ten_NCC`, `Dia_Chi`, `SDT`, `Email`, `TrangThai`) VALUES
(1, 'Công ty Sách ABC', '123 Đường A, Quận 1, TP.HCM', '0909123456', 'contact@abcbooks.vn', 1),
(2, 'Nhà Sách XYZ', '456 Đường B, Quận 3, TP.HCM', '0909765432', 'info@xyzbooks.vn', 1),
(3, 'Phân phối Văn Hóa', '789 Đường C, Quận 5, TP.HCM', '0912345678', 'sales@vnhphoi.vn', 1),
(4, 'Công ty Sách ABC', '123 Đường A, Quận 1, TP.HCM', '0909123456', 'contact@abcbooks.vn', 1),
(5, 'Nhà Sách XYZ', '456 Đường B, Quận 3, TP.HCM', '0909765432', 'info@xyzbooks.vn', 1),
(6, 'Phân phối Văn Hóa', '789 Đường C, Quận 5, TP.HCM', '0912345678', 'sales@vnhphoi.vn', 1),
(7, 'Công ty Sách ABC', '123 Đường A, Quận 1, TP.HCM', '0909123456', 'contact@abcbooks.vn', 1),
(8, 'Nhà Sách XYZ', '456 Đường B, Quận 3, TP.HCM', '0909765432', 'info@xyzbooks.vn', 1),
(9, 'Phân phối Văn Hóa', '789 Đường C, Quận 5, TP.HCM', '0912345678', 'sales@vnhphoi.vn', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomquyen`
--

CREATE TABLE `nhomquyen` (
  `MaQuyen` int(11) NOT NULL,
  `TenQuyen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhomquyen`
--

INSERT INTO `nhomquyen` (`MaQuyen`, `TenQuyen`) VALUES
(1, 'Admin'),
(6, 'Nhân viên nhập hàng'),
(7, 'Nhân viên xuất hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieu_nhap`
--

CREATE TABLE `phieu_nhap` (
  `ID_PhieuNhap` int(11) NOT NULL,
  `NgayNhap` datetime NOT NULL,
  `ID_NCC` int(11) DEFAULT NULL,
  `TongTien` decimal(15,2) DEFAULT 0.00,
  `TrangThai` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieu_nhap`
--

INSERT INTO `phieu_nhap` (`ID_PhieuNhap`, `NgayNhap`, `ID_NCC`, `TongTien`, `TrangThai`) VALUES
(1, '2025-05-10 09:30:00', 1, 0.00, 1),
(2, '2025-05-11 14:15:00', 2, 0.00, 1),
(3, '2025-05-12 10:00:00', 3, 0.00, 1),
(4, '2025-05-10 09:30:00', 1, 0.00, 1),
(5, '2025-05-11 14:15:00', 2, 0.00, 1),
(6, '2025-05-12 10:00:00', 3, 0.00, 1),
(7, '2025-05-10 09:30:00', 1, 0.00, 1),
(8, '2025-05-11 14:15:00', 2, 0.00, 1),
(9, '2025-05-12 10:00:00', 3, 0.00, 1);

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

--
-- Đang đổ dữ liệu cho bảng `pnh`
--

INSERT INTO `pnh` (`ID_PNH`, `ID_NCC`, `Ngay_Nhap`, `Tong_Tien`) VALUES
(1, 2, '2025-05-14', 200000),
(2, 2, '2025-05-14', 200000),
(3, 2, '2025-05-14', 450000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pttt`
--

CREATE TABLE `pttt` (
  `ID_PTTT` int(11) NOT NULL,
  `Ten_PTTT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `pttt`
--

INSERT INTO `pttt` (`ID_PTTT`, `Ten_PTTT`) VALUES
(1, 'Chuyển khoản ngân hàng'),
(2, 'Thanh toán khi nhận hàng');

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
  `ID_DanhMuc` int(11) DEFAULT NULL,
  `ID_TheLoai` int(11) NOT NULL,
  `Gia_Ban` decimal(10,2) NOT NULL,
  `GiamGia(%)` int(11) NOT NULL,
  `So_Luong_Ton` int(11) DEFAULT 0,
  `Mo_Ta` text DEFAULT NULL,
  `Images` varchar(1000) NOT NULL,
  `ID_Cart` int(11) DEFAULT NULL,
  `TrangThai` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`ID_Sach`, `Ten_Sach`, `Tac_Gia`, `Ten_Nha_Xuat_Ban`, `Nam_Xuat_Ban`, `ID_DanhMuc`, `ID_TheLoai`, `Gia_Ban`, `GiamGia(%)`, `So_Luong_Ton`, `Mo_Ta`, `Images`, `ID_Cart`, `TrangThai`) VALUES
(163, 'Take Note - Văn 9! (Gáy Lò Xo)', 'Nguyễn Quốc Khánh, Ngô Minh Hương, Phạm Ngọc Minh', 'Hà Nội', 2024, 1, 1, 64000.00, 0, 100, ' <div class=\'container-fluid product-description-wrapper\'><p>Take Note - Văn 9!\r\n\r\nBạn đang tìm kiếm một phương pháp học văn hiệu quả, dễ nhớ, dễ hiểu và dễ áp dụng?\r\n\r\nCuốn \"Take Note! Văn 9\" chính là trợ thủ đắc lực dành cho bạn!\r\n\r\nVới hình ảnh minh họa dễ thương và cách trình bày sáng tạo, cuốn sách này giúp các bạn học sinh lớp 9 nắm bắt nội dung chương trình ngữ văn theo sách giáo khoa mới nhất một cách nhanh chóng và nhẹ nhàng. Không chỉ vậy, cuốn sách còn giúp các bạn=>\r\n\r\n- Tăng khả năng ghi nhớ kiến thức\r\n\r\n- Hiểu sâu các tác phẩm văn học quan trọng\r\n\r\n- Áp dụng hiệu quả vào bài kiểm tra và bài thi.\r\n\r\nHãy để \"Take Note! Văn 9\" đồng hành cùng bạn trên con đường chinh phục môn văn nhé! Liên hệ ngay với Nhà sách Minh Thắng để sở hữu trợ thủ đắc lực này ngay thôi nào</p></div>', '8.1.jpg', NULL, 1),
(164, 'Sổ Tay Lịch Sử - Everything You Need To Ace History In One Big Fat Notebook', 'Hà Văn Minh', 'Dân Trí', 2024, 8, 15, 298350.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Sổ Tay Lịch Sử - Everything You Need To Ace History In One Big Fat Notebook\n\n- BẠN CÓ BIẾT - giúp học sinh bổ sung kiến thức MỚI, những câu chuyện văn hoá, lịch sử mà trong sách giáo khoa không có.\n\n- Hình ảnh minh họa trực quan cho các sự kiện, địa danh, nhân vật; thể hiện qua các nét vẽ sinh động, dễ hiểu.\n\n- Có phần câu hỏi trắc nghiệm và đáp án để học sinh kiểm tra lại các kiến thức đã học\n\n- Câu hỏi ôn tập kiến thức đều bám sát nội dung chương trình học và cấu trúc đề thi THPT\n\n- Trợ thủ đắc lực hướng dẫn tự học hoàn chỉnh cho học sinh\n\nVới sự đồng hành của SỔ TAY LỊCH SỬ, bạn SẼ=>\n\n- Có tư duy bao quát\n\n- Ghi nhớ kiến thức trọng tâm\n\n- Biết cách tìm từ khóa\n\n- Có thêm kiến thức xã hội\n\n- Ứng dụng lịch sử vào cuộc sống\n\nSỔ TAY LỊCH SỬ,GỒM=>\n\n- 60 bài học, 22 phần về kiến thức bám sát chương trình Lịch sử Việt Nam và thế giới lớp 10, 11, 12\n\n- “Mục tiêu bài học”=> những kiến thức, sự kiện, mốc thời gian, nhân vật lịch sử được highlight, kẻ bảng biểu, sơ đồ tư duy\n\n- “Bạn có biết”=> những kiến thức về văn hóa, xã hội, câu chuyện lịch sử thú vị không có trong SGK\n\n- Kiến thức đi theo tiến trình lịch sử, có độ logic, khoa học cao\n\n- Các chủ đề được chia nhỏ giúp học sinh dễ dàng tiếp cận và xử lí.\n\n- Đặc biệt trong phần nội dung quan trọng đều được trình bày sơ đồ hóa cực dễ hiểu.</p></div>', '8.2.jpg', NULL, 1),
(165, 'Sổ Tay Đội Viên', 'Nhiều Tác Giả', 'Trẻ', 2018, 8, 15, 35700.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Sổ Tay Đội Viên\n\nSách trang bị những kỹ năng cần thiết cho đội viên thiếu niên tiền phong Hồ Chí Minh=> những vấn đề chung về tổ chức Đội=> lịch sử hình thành, phát triển; những biểu trưng, quy định, kỹ năng đội viên; Những bài hát dùng trong sinh hoạt Đội; Những kỹ năng thực hành xã hội cần thiết của người đội viên.</p></div>', '8.3.jpg', NULL, 1),
(166, 'Sổ Tay Viết Văn', 'Tô Hoài', 'Kim Đồng', 2022, 8, 15, 51000.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Tô Hoài không chỉ là nhà văn lớn của văn đàn Việt Nam mà còn là bậc thầy trên giảng đường truyền thụ cảm hứng sáng tác. Qua những bài viết của ông về công việc viết văn cùng những kỹ năng “bí truyền” tư duy ngôn ngữ, từ quan sát, ghi chép, tới viết truyện ngắn, truyện dài, ký, hồi ký, xây dựng nhân vật… Sổ tay viết văn xứng là cuốn cẩm nang có giá trị, hữu ích dành cho những người yêu thích tìm hiểu và sáng tác văn chương.</p></div>', '8.4.jpg', NULL, 1),
(167, 'Sổ Tay Tiếng Anh - Lớp 9', 'Mai Lan Hương, Hà Thanh Uyên', 'Đà Nẵng', 2020, 8, 15, 15000.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Sổ Tay Tiếng Anh - Lớp 9</p></div>', '8.5.jpg', NULL, 1),
(168, 'Sổ Tay Tiếng Anh 10 (Tái Bản 2022)', 'Mai Lan Hương, Hà Thanh Uyên', 'Đà Nẵng', 2022, 8, 15, 24000.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Sổ Tay Tiếng Anh 10\n\nVới cách trình bày ngắn gọn, dễ hiểu đã qua giản lược và lưu lại những điểm mấu chốt, cuốn sách giúp bạn tóm tắt lại những điểm ngữ pháp, cấu trúc, các thì trong tiếng Anh… để củng cố kiến thức và có thể sử dụng chúng một cách nhuyễn hơn.\n\nSỔ TAY TIẾNG ANH 10 sẽ giúp bạn tóm tắt kiến thức ngữ pháp cơ bản của Tiếng Anh; bảng động từ bất quy tắc đầy đủ nhât; cấu trúc câu trong Tiếng Anh và giới thiệu đến bạn những tình huống giao tiếp thông dụng trong Tiếng Anh</p></div>', '8.6.jpg', NULL, 1),
(169, 'Sổ Tay Ngữ Pháp Và Bài Tập Tiếng Anh Lớp 10-11-12', 'Dương Hương', 'Đại Học Quốc Gia Hà Nội', 2023, 8, 15, 62300.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Sổ Tay Ngữ Pháp Và Bài Tập Tiếng Anh Lớp 10-11-12\n\n1. Sách hệ thống các kiến thức trọng tâm của chương trình học\n\nCuốn sách được thiết kế dựa trên khung chương trình môn tiếng Anh Trung học phổ thông của Bộ Giáo dục và Đào tạo. Điều này đảm bảo rằng nội dung của sách tương ứng với chương trình học của lớp 10, 11 và 12, giúp học sinh nắm vững kiến thức cần thiết.\n\n2. Chia thành các chủ đề=> Mỗi chủ đề bao gồm 3 phần cốt lõi=>\n\n- Kiến thức trọng tâm=> Chương trình giới thiệu các cấu trúc ngữ pháp tiếng Anh một cách ngắn gọn và trọng tâm. Ví dụ minh họa cụ thể giúp học sinh hiểu rõ ngữ pháp và dễ dàng ghi nhớ.\n\n- Bài tập vận dụng=> Các bài tập đa dạng được sắp xếp một cách hợp lý và thiết kế sinh động, giúp kích thích sự hứng thú của học sinh trong quá trình học tập. Bài tập này giúp học sinh luyện tập và trau dồi kiến thức một cách nhuần nhuyễn, từ việc nhận biết ngữ pháp đến việc áp dụng vào thực tế.\n\n- Lời giải chi tiết=> Cuốn sách cung cấp lời giải chi tiết cho các bài tập. Lời giải được trình bày rõ ràng và cụ thể, bao gồm dịch nghĩa tiếng Việt. Điều này giúp học sinh tự đánh giá năng lực của họ và nâng cao hiểu biết trong quá trình học tập.\n\n3. Được thiết kế hấp dẫn=>\n\nCuốn sách được thiết kế với hình ảnh, màu sắc, và bố cục sinh động để thu hút sự chú ý của học sinh. Điều này làm cho việc học ngữ pháp trở nên thú vị hơn và tạo động lực cho học sinh.</p></div>', '8.7.jpg', NULL, 1),
(170, 'Sổ Tay Tiếng Anh Lớp 11 (2021)', 'Mai Lan Hương, Hà Thanh Uyên', 'Đà Nẵng', 2020, 8, 15, 14000.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Sổ Tay Tiếng Anh Lớp 11\n\nMỗi đơn vị bài học gồm=> Glossary (bảng từ vựng), Grammar (ngữ pháp), Sentence patterns (mẫu câu).</p></div>', '8.8.jpg', NULL, 1),
(171, 'Sổ Tay Khoa Học Bỏ Túi', 'The Usborne', 'Lao Động', 2021, 8, 16, 182000.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>SỔ TAY KHOA HỌC BỎ TÚI\n\nCuốn Sổ tay khoa học bỏ túi sẽ giải quyết tất cả những thắc mắc của cuộc sống quanh ta, từ tự nhiên đến khoa học và công nghệ. Lối văn phong đơn giản và hình ảnh minh họa chi tiết, tươi sáng kết hợp với nhau để trả lời các câu hỏi theo từng bước rõ ràng.\n\nNgoài ra, bạn còn có thể truy cập vào Trang web Liên kết nhanh của Usborne để tìm hiểu thêm nhiều điều thú vị=> www.usborne-quicklinks.com</p></div>', '8.9.jpg', NULL, 1),
(172, 'Take Note Vào 10 - Ghi Chú Nhanh Ôn Thi Cấp Tốc Vào Lớp 10 - Tiếng Anh', 'Vy Ngọc', 'Hà Nội', 2023, 8, 16, 105000.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Take Note Vào 10 - Ghi Chú Nhanh Ôn Thi Cấp Tốc Vào Lớp 10 - Tiếng Anh\n\nƯu điểm của cuốn sách Take Note vào 10 - Ghi chú nhanh ôn thi cấp tốc vào lớp 10 Tiếng Anh=>\n\n- Đầy đủ và chi tiết nhất về các chuyên đề trọng tâm 100% có trong đề thi\n\n- Bổ sung lý thuyết, kiến thức căn bản một cách bài bản, dễ hiểu, dễ vận dụng\n\n- Lộ trình kiến thức khoa học từ cơ bản đến nâng cao\n\n- Đáp án, lời giải chi tiết, rõ ràng</p></div>', '8.1.jpg', NULL, 1),
(173, 'Sổ Tay Vật Lý Trung Học Phổ Thông (Lớp 10-11-12)', 'Nguyễn Phú Đồng', 'NXB Đồng Nai', 2016, 8, 16, 59400.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Sổ Tay Vật Lý Trung Học Phổ Thông (Lớp 10-11-12)\n\n“Sổ tay Vật lí Trung học phổ thông” là cuốn sách tổng hợp các kiến thức cơ bản và nâng cao về Vật lí Trung học phổ thông dành cho các em học sinh từ lớp 10 đến lớp 12 và những em học sinh ôn tập thi Trung học phổ thông quốc gia.\n\nVới mong muốn cẩm nang sẽ thật tiện ích cho các em, trong mỗi chủ đề chúng tôi tóm lược những kiến thức cơ bản, bổ sung những kiến thức nâng cao và nêu những kĩ năng cần thiết cho việc vận dụng kiến thức để giải các dạng bài tập thường gặp. Với cách trình bày này chúng tôi hi vọng sẽ giúp các em vừa nắm và vận dụng được kiến thức vừa có cái nhìn bao quát về chương trình Vật lí Trung học phổ thông trải dài từ lớp 10 đến lớp 12. Đặc biệt là phần Một số phương pháp giải nhanh bài tập trắc nghiệm Vật lí luyện thi THPT quốc gia giới thiệu đến các em một số phương pháp chọn lọc và kĩ thuật sử dụng các phương pháp đó để giải nhanh bài tập trắc nghiệm Vật lí 12, phục vụ cho việc học, ôn tập và thi THPT quốc gia đạt hiệu quả.</p></div>', '8.11.jpg', NULL, 1),
(174, 'Sổ Tay Tiếng Nhật Thương Mại', 'Cao Lê Dung Chi', 'NXB Đại Học Sư Phạm', 2016, 8, 16, 63700.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Sách Sổ Tay Tiếng Nhật Thương Mại gồm 4 chương=>\n\nChương 1 là phần tóm tắt những nguyên tắc cơ bản trong viết văn bản thương mại và các kính ngữ thường được sử dụng trong các văn bản này. Nếu người học kết hợp với các nội dung kính ngữ đã học từ trước nên nay thì sẽ phát huy hiệu quả cao hơn\n\nTrong chương 2, chương 3, các tác giả nêu các mẫu câu cụ thể cho từng loại văn bản, diễn gải các điểm trọng tâm của cách viết. Ngoài ra, các tác giả đã biên soạn phần bài tập nhằm giúp người học kiểm tra mức độ tự tin trong việc hiểu kính ngữ và thử sức với việc hiểu văn bản. Mong là các bạn sẽ tận dụng có hiệu quả phần này.\n\nTrong chương 4, các tác giả tập trung vào mẫu mail thương mại là phần không thể thiếu trong công việc thường ngày hiện nay đồng thời giới thiệu cách viết các mẫu văn bản khác</p></div>', '8.12.jpg', NULL, 1),
(175, 'Sổ Tay Tiếng Nhật Thông Dụng', 'Minh Nhật', 'NXB Đồng Nai', 2018, 8, 16, 53400.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Sổ Tay Tiếng Nhật Thông Dụng=> Cung cấp cho người đọc kiến thức thông dụng nhất về tiếng Nhật</p></div>', '8.13.jpg', NULL, 1),
(176, 'Sổ Tay Toán Cấp 3', 'Phạm Hồng Phượng', 'NXB Tổng Hợp TPHCM', 2016, 8, 16, 48300.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Sổ Tay Toán Cấp 3\n\nNhằm giúp các em có tài liệu để tra cứu nhanh kiến thức Toán học một cách thuận tiện, nhanh chóng và chính xác. Nhà sách trực tuyến Newshop.vn xin trân trọng giới thiệu cuốn sách=> Sổ Tay Toán Cấp 3 Lớp 10-11-12 .\n\nCuốn sách đã hệ thống đầy đủ, khoa học các kiến thức Toán học THPT và được trình bày theo logic phát triển của kiến thức với một bố cục chặt chẽ. Nội dung chương trình của các lớp 10 - 11 - 12 và của các chương trong từng lớp được trình bày rõ ràng, đầy đủ và dễ hiểu.\n\nĐể thuận tiện cho việc học tập, tra cứu của các em học sinh, cuốn sách được chia làm=>\n\n- Lớp 10=> Gồm 6 chương đại số và 3 chương hình học\n\n- Lớp 11=> Gồm 5 chương đại số và 3 chương hình học\n\n- Lớp 12=> Gồm 4 chương đại số và 2 chương hình học\n\nHi vọng rằng cuốn sách sẽ là người bạn thân thiết, đồng hành cùng các em trong quá trình học tập bộ môn Toán học.</p></div>', '8.14.jpg', NULL, 1),
(177, 'Sổ Tay Kiến Thức Toán 6', 'Đỗ Duy Đồng, Dương Đức Kim, Nguyễn Vĩnh Cận, Vũ Thế Hựu', 'Tổng Hợp Thành Phố Hồ Chí Minh', 2024, 8, 16, 10800.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Sổ Tay Kiến Thức Toán 6\n\nToán là một môn học quan trọng trong chương trình đào tạo của Bộ giáo Dục Và Đào Tạo. Việc có một nền tảng Toán học vững chắc sẽ là bệ phóng giúp các em thuận lợi hơn cho việc học các cấp cao hơn. Việc bước vào lớp 6 là một bước ngoặc. Thay đổi môi trường cũng như chương trình học có thể khiến các em bỡ ngỡ, nhất thời chưa thể thích nghi được. Nhằm tạo điều kiện cho các em củng cố kiến thức và có thể tự ôn luyện thêm tại nhà, nhà sách Newshop xin hân hạnh giới thiệu cuốn sách Sổ tay kiến thức Toán 6. Sổ tay Kiến Thức Toán Lớp 6 sẽ là công cụ hỗ trợ đắc lực cho quá trình học toán của các em lớp 6, quyển sách được thiết kế nhỏ gọn dễ dàng sử dụng, quyển sách này giúp các em học sinh lớp 6 sử dụng ôn tập nắm vững kiến thức toán 6.</p></div>', '8.15.jpg', NULL, 1),
(178, 'Sổ Tay Học Phật (Tập 1)', 'Minh Huệ', 'NXB Tôn Giáo', 2019, 8, 16, 20060.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>SỔ TAY HỌC PHẬT - TẬP 1\n\n1. Tổ Thế Thân tu tập 12 năm hướng về Phật Di Lặc mà không thấy được kim thân của Phật Di Lặc. Ngài chán nản bỏ động tu, đi ra ngoài. Khi nhìn thấy một con chó ghẻ nằm bên đường, ngài khởi từ tâm, định dùng lưỡi liếm những vết lở loét, giòi bọ của nó để chữa trị, thì con chó bỗng biến mất và kim thân Phật Di Lặc hiện ra rực rỡ.\n(Luận văn Tiến sĩ, nghiên cứu về Đại Sư  Thế Thân của Lê Mạnh Thát,\nbảo vệ tại Hoa Kỳ)\n\n2. Một người nữ nếu có đọc một bài kệ kinh Đại Bửu Tích thì kiếp sau sẽ không làm người nữ nữa. Bửu Tràng Đà la ni có năng lực chuyển nữ thành nam.\n\n3. Khi thành đệ tử Phật, Xá Lợi Phất 2 tuần sau chứng quả A La Hán, Mục Kiền Liên thì sau một tuần.\n\n4. Ngài Ni Đề sau khi xuất gia, tu 4 tháng chứng A La Hán. Phật nói ông từng là Tam Tạng Pháp sư thời Phật Ca Diếp. Ông có một đệ tử chứng quả Tu Đà Hoàn mà ông không hay biết. Một hôm ông bệnh, nhờ đệ tử đổ phân, quả báo ông phải gánh chịu là 500 đời phải hốt phân.\n\n5. Một ngày nọ vua Ba Tư Nặc thỉnh Phật và chư tăng vào cung thọ trai. Trong đó có một vị tỳ kheo hơi thở có mùi thơm của hoa sen bát ngát. Vua nghi ngờ ông dùng ma thuật để quyến rũ cung nữ, nên kêu ông đi súc miệng, nhưng càng súc càng thơm. Vua thắc mắc, Phật bảo thời quá khứ vị tỳ kheo này thường tán thán công hạnh chư Phật, nên có phước báo như thế.\n\n6. Ông Lâm ở Đài Loan phóng sanh một con rùa lớn. Ông bỏ ra rất nhiều tiền để mua nó và có khắc tên ông vì sợ người ta bắt ăn thịt. Mười sáu năm sau, con trai ông bị rơi xuống biển, sống sót nhờ con rùa ấy đưa vào bờ.\n\n7. Kiếp trước, thiền sư Ô Sào và Bạch Cư Dị là hai người bạn đồng tu. Bạch Cư Dị hỏi=>\n- Nhà anh giàu không?\nÔ Sào trả lời=>\n- Cha tôi giàu lắm, tiền không biết làm gì cho hết. Tôi thấy vậy chán quá nên đi tu.\nÔ Sào hỏi lại=>\n- Nhà anh giàu không?\nBạch Cư Dị nói=>\n- Nhà tôi nghèo lắm, thiếu thốn mọi thứ nên tôi chán quá tôi đi tu. Mong sao kiếp sau tôi làm một ông quan thật giàu.\nChính tâm nguyện đó mà Ô Sào phải đầu thai theo bạn để chuyển mê khai ngộ. \nKiếp lai sinh, quả thật Bạch Cư Dị là một Quan Thị lang, một ông quan có tâm hồn thi sĩ, bạn với thơ và rượu, và ông có nhân duyên gặp lại ngài Ô Sào. Ông hỏi thiền sư, đại ý Phật Pháp là gì. Ô Sào trả lời=>\nChư ác mạc tác\nChúng thiện phụng hành\nTự tịnh kỳ ý\nThị chư Phật giáo.\nQuan Thị lang nói, điều đó con nít lên 3 cũng biết. Ô Sào tiếp lời, nhưng ông già 80 làm không được.\nHai người bạn, một tăng một tục, cũng là trường hợp của Tô Đông Pha và thiền sư Phật Ấn. Họ cũng có nhân duyên làm bạn bè nhiều kiếp, Và Phật Ấn cũng muốn thức tỉnh Tô Đông Pha, mong Hàn Lâm học sĩ đừng dấn bước quá sâu vào mê lộ.\nPhật Ấn biết Tô có 7 người thiếp nên một hôm hỏi… mượn một. Tô Đông Pha cả cười đồng ý, sai người thiếp thứ 7 đến, dặn rằng=>\n- Nàng cứ đến xem hòa thượng xử sự ra sao.\n\nĐêm đó hòa thượng sắp xếp một phòng cho cô nghỉ. Cô đinh ninh hòa thượng sẽ đến phòng mình nhưng chờ hoài không thấy, cô tò mò hé cửa xem hòa thượng đang làm gì bên ngoài, thì thấy ngài cho đốt 7 chiếc lò đỏ rực, suốt đêm bước qua bước lại 7 cái lò ấy. Sáng hôm sau cô trở về thuật lại chuyện đêm qua cho Tô Đông Pha nghe. Ông này lập tức hiểu điều ngài muốn nhắn gởi. Có 7 người thiếp như có 7 lò than hồng, người tu hành thì đã bước qua ái dục.\n\n8. Do có “tuệ phân tích” mà có thể nói về một đề tài nói hoài không hết. Có vị tuy đã chứng A La Hán mà không có “tuệ phân tích” này.\n\n9. Một bầy khỉ nhìn thấy Chư Tăng đảnh lễ Xá lợi Tóc và Răng của Đức Phật, khi Chư Tăng đi rồi, chúng cũng ra lạy. Kết quả là bầy khỉ được sanh thiên, 500 con khỉ sanh về Đao Lợi Thiên.\n\n10. Trong truyện “Hạt đậu biết nhảy”, một bà mẹ dặn con trai khi sang Ấn Độ buôn bán nhớ mua về cho bà một hạt Xá lợi Phật. Nhưng anh này lần nào cũng quên. Dù bà đã tha thiết dặn đi dặn lại, nhưng anh vẫn quên. Đến khi sực nhớ, anh ta lượm một cái răng chó đem về nói dối với mẹ là Xá lợi Phật. Bà mừng rỡ, cung kính tôn trí và hằng ngày đảnh lễ. Cho tới một ngày, hạt Xá lợi giả đó cũng tỏa hào quang.\n\n11. Tụng một đoạn kinh Pháp Cú cho đứa trẻ khóc đêm nghe=>\nNếu ai biết Pháp Cú\nTự mình hộ trì giới\nXa lìa sự sát sanh\nNói thật, không nói dối\nTự bỏ điều phi nghĩa\nGiải thoát đường quỷ thần.</p></div>', '8.16.jpg', NULL, 1),
(179, 'Sổ Tay Học Phật (Tập 2)', 'Minh Huệ', 'NXB Tôn Giáo', 2019, 8, 16, 20060.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>SỔ TAY HỌC PHẬT - TẬP 2\n\n1. Tổ Thế Thân tu tập 12 năm hướng về Phật Di Lặc mà không thấy được kim thân của Phật Di Lặc. Ngài chán nản bỏ động tu, đi ra ngoài. Khi nhìn thấy một con chó ghẻ nằm bên đường, ngài khởi từ tâm, định dùng lưỡi liếm những vết lở loét, giòi bọ của nó để chữa trị, thì con chó bỗng biến mất và kim thân Phật Di Lặc hiện ra rực rỡ.\n(Luận văn Tiến sĩ, nghiên cứu về Đại Sư  Thế Thân của Lê Mạnh Thát,\nbảo vệ tại Hoa Kỳ)\n\n2. Một người nữ nếu có đọc một bài kệ kinh Đại Bửu Tích thì kiếp sau sẽ không làm người nữ nữa. Bửu Tràng Đà la ni có năng lực chuyển nữ thành nam.\n\n3. Khi thành đệ tử Phật, Xá Lợi Phất 2 tuần sau chứng quả A La Hán, Mục Kiền Liên thì sau một tuần.\n\n4. Ngài Ni Đề sau khi xuất gia, tu 4 tháng chứng A La Hán. Phật nói ông từng là Tam Tạng Pháp sư thời Phật Ca Diếp. Ông có một đệ tử chứng quả Tu Đà Hoàn mà ông không hay biết. Một hôm ông bệnh, nhờ đệ tử đổ phân, quả báo ông phải gánh chịu là 500 đời phải hốt phân.\n\n5. Một ngày nọ vua Ba Tư Nặc thỉnh Phật và chư tăng vào cung thọ trai. Trong đó có một vị tỳ kheo hơi thở có mùi thơm của hoa sen bát ngát. Vua nghi ngờ ông dùng ma thuật để quyến rũ cung nữ, nên kêu ông đi súc miệng, nhưng càng súc càng thơm. Vua thắc mắc, Phật bảo thời quá khứ vị tỳ kheo này thường tán thán công hạnh chư Phật, nên có phước báo như thế.\n\n6. Ông Lâm ở Đài Loan phóng sanh một con rùa lớn. Ông bỏ ra rất nhiều tiền để mua nó và có khắc tên ông vì sợ người ta bắt ăn thịt. Mười sáu năm sau, con trai ông bị rơi xuống biển, sống sót nhờ con rùa ấy đưa vào bờ.\n\n7. Kiếp trước, thiền sư Ô Sào và Bạch Cư Dị là hai người bạn đồng tu. Bạch Cư Dị hỏi=>\n- Nhà anh giàu không?\nÔ Sào trả lời=>\n- Cha tôi giàu lắm, tiền không biết làm gì cho hết. Tôi thấy vậy chán quá nên đi tu.\nÔ Sào hỏi lại=>\n- Nhà anh giàu không?\nBạch Cư Dị nói=>\n- Nhà tôi nghèo lắm, thiếu thốn mọi thứ nên tôi chán quá tôi đi tu. Mong sao kiếp sau tôi làm một ông quan thật giàu.\nChính tâm nguyện đó mà Ô Sào phải đầu thai theo bạn để chuyển mê khai ngộ. \nKiếp lai sinh, quả thật Bạch Cư Dị là một Quan Thị lang, một ông quan có tâm hồn thi sĩ, bạn với thơ và rượu, và ông có nhân duyên gặp lại ngài Ô Sào. Ông hỏi thiền sư, đại ý Phật Pháp là gì. Ô Sào trả lời=>\nChư ác mạc tác\nChúng thiện phụng hành\nTự tịnh kỳ ý\nThị chư Phật giáo.\nQuan Thị lang nói, điều đó con nít lên 3 cũng biết. Ô Sào tiếp lời, nhưng ông già 80 làm không được.\nHai người bạn, một tăng một tục, cũng là trường hợp của Tô Đông Pha và thiền sư Phật Ấn. Họ cũng có nhân duyên làm bạn bè nhiều kiếp, Và Phật Ấn cũng muốn thức tỉnh Tô Đông Pha, mong Hàn Lâm học sĩ đừng dấn bước quá sâu vào mê lộ.\nPhật Ấn biết Tô có 7 người thiếp nên một hôm hỏi… mượn một. Tô Đông Pha cả cười đồng ý, sai người thiếp thứ 7 đến, dặn rằng=>\n- Nàng cứ đến xem hòa thượng xử sự ra sao.\n\nĐêm đó hòa thượng sắp xếp một phòng cho cô nghỉ. Cô đinh ninh hòa thượng sẽ đến phòng mình nhưng chờ hoài không thấy, cô tò mò hé cửa xem hòa thượng đang làm gì bên ngoài, thì thấy ngài cho đốt 7 chiếc lò đỏ rực, suốt đêm bước qua bước lại 7 cái lò ấy. Sáng hôm sau cô trở về thuật lại chuyện đêm qua cho Tô Đông Pha nghe. Ông này lập tức hiểu điều ngài muốn nhắn gởi. Có 7 người thiếp như có 7 lò than hồng, người tu hành thì đã bước qua ái dục.\n\n8. Do có “tuệ phân tích” mà có thể nói về một đề tài nói hoài không hết. Có vị tuy đã chứng A La Hán mà không có “tuệ phân tích” này.\n\n9. Một bầy khỉ nhìn thấy Chư Tăng đảnh lễ Xá lợi Tóc và Răng của Đức Phật, khi Chư Tăng đi rồi, chúng cũng ra lạy. Kết quả là bầy khỉ được sanh thiên, 500 con khỉ sanh về Đao Lợi Thiên.\n\n10. Trong truyện “Hạt đậu biết nhảy”, một bà mẹ dặn con trai khi sang Ấn Độ buôn bán nhớ mua về cho bà một hạt Xá lợi Phật. Nhưng anh này lần nào cũng quên. Dù bà đã tha thiết dặn đi dặn lại, nhưng anh vẫn quên. Đến khi sực nhớ, anh ta lượm một cái răng chó đem về nói dối với mẹ là Xá lợi Phật. Bà mừng rỡ, cung kính tôn trí và hằng ngày đảnh lễ. Cho tới một ngày, hạt Xá lợi giả đó cũng tỏa hào quang.\n\n11. Tụng một đoạn kinh Pháp Cú cho đứa trẻ khóc đêm nghe=>\nNếu ai biết Pháp Cú\nTự mình hộ trì giới\nXa lìa sự sát sanh\nNói thật, không nói dối\nTự bỏ điều phi nghĩa\nGiải thoát đường quỷ thần.</p></div>', '8.17.jpg', NULL, 1),
(180, 'Sổ Tay Học Phật (Tập 6)', 'Minh Huệ', 'NXB Tôn Giáo', 2019, 8, 16, 20060.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>SỔ TAY HỌC PHẬT - TẬP 6\n\n1. Tổ Thế Thân tu tập 12 năm hướng về Phật Di Lặc mà không thấy được kim thân của Phật Di Lặc. Ngài chán nản bỏ động tu, đi ra ngoài. Khi nhìn thấy một con chó ghẻ nằm bên đường, ngài khởi từ tâm, định dùng lưỡi liếm những vết lở loét, giòi bọ của nó để chữa trị, thì con chó bỗng biến mất và kim thân Phật Di Lặc hiện ra rực rỡ.\n(Luận văn Tiến sĩ, nghiên cứu về Đại Sư  Thế Thân của Lê Mạnh Thát,\nbảo vệ tại Hoa Kỳ)\n\n2. Một người nữ nếu có đọc một bài kệ kinh Đại Bửu Tích thì kiếp sau sẽ không làm người nữ nữa. Bửu Tràng Đà la ni có năng lực chuyển nữ thành nam.\n\n3. Khi thành đệ tử Phật, Xá Lợi Phất 2 tuần sau chứng quả A La Hán, Mục Kiền Liên thì sau một tuần.\n\n4. Ngài Ni Đề sau khi xuất gia, tu 4 tháng chứng A La Hán. Phật nói ông từng là Tam Tạng Pháp sư thời Phật Ca Diếp. Ông có một đệ tử chứng quả Tu Đà Hoàn mà ông không hay biết. Một hôm ông bệnh, nhờ đệ tử đổ phân, quả báo ông phải gánh chịu là 500 đời phải hốt phân.\n\n5. Một ngày nọ vua Ba Tư Nặc thỉnh Phật và chư tăng vào cung thọ trai. Trong đó có một vị tỳ kheo hơi thở có mùi thơm của hoa sen bát ngát. Vua nghi ngờ ông dùng ma thuật để quyến rũ cung nữ, nên kêu ông đi súc miệng, nhưng càng súc càng thơm. Vua thắc mắc, Phật bảo thời quá khứ vị tỳ kheo này thường tán thán công hạnh chư Phật, nên có phước báo như thế.\n\n6. Ông Lâm ở Đài Loan phóng sanh một con rùa lớn. Ông bỏ ra rất nhiều tiền để mua nó và có khắc tên ông vì sợ người ta bắt ăn thịt. Mười sáu năm sau, con trai ông bị rơi xuống biển, sống sót nhờ con rùa ấy đưa vào bờ.\n\n7. Kiếp trước, thiền sư Ô Sào và Bạch Cư Dị là hai người bạn đồng tu. Bạch Cư Dị hỏi=>\n- Nhà anh giàu không?\nÔ Sào trả lời=>\n- Cha tôi giàu lắm, tiền không biết làm gì cho hết. Tôi thấy vậy chán quá nên đi tu.\nÔ Sào hỏi lại=>\n- Nhà anh giàu không?\nBạch Cư Dị nói=>\n- Nhà tôi nghèo lắm, thiếu thốn mọi thứ nên tôi chán quá tôi đi tu. Mong sao kiếp sau tôi làm một ông quan thật giàu.\nChính tâm nguyện đó mà Ô Sào phải đầu thai theo bạn để chuyển mê khai ngộ. \nKiếp lai sinh, quả thật Bạch Cư Dị là một Quan Thị lang, một ông quan có tâm hồn thi sĩ, bạn với thơ và rượu, và ông có nhân duyên gặp lại ngài Ô Sào. Ông hỏi thiền sư, đại ý Phật Pháp là gì. Ô Sào trả lời=>\nChư ác mạc tác\nChúng thiện phụng hành\nTự tịnh kỳ ý\nThị chư Phật giáo.\nQuan Thị lang nói, điều đó con nít lên 3 cũng biết. Ô Sào tiếp lời, nhưng ông già 80 làm không được.\nHai người bạn, một tăng một tục, cũng là trường hợp của Tô Đông Pha và thiền sư Phật Ấn. Họ cũng có nhân duyên làm bạn bè nhiều kiếp, Và Phật Ấn cũng muốn thức tỉnh Tô Đông Pha, mong Hàn Lâm học sĩ đừng dấn bước quá sâu vào mê lộ.\nPhật Ấn biết Tô có 7 người thiếp nên một hôm hỏi… mượn một. Tô Đông Pha cả cười đồng ý, sai người thiếp thứ 7 đến, dặn rằng=>\n- Nàng cứ đến xem hòa thượng xử sự ra sao.\n\nĐêm đó hòa thượng sắp xếp một phòng cho cô nghỉ. Cô đinh ninh hòa thượng sẽ đến phòng mình nhưng chờ hoài không thấy, cô tò mò hé cửa xem hòa thượng đang làm gì bên ngoài, thì thấy ngài cho đốt 7 chiếc lò đỏ rực, suốt đêm bước qua bước lại 7 cái lò ấy. Sáng hôm sau cô trở về thuật lại chuyện đêm qua cho Tô Đông Pha nghe. Ông này lập tức hiểu điều ngài muốn nhắn gởi. Có 7 người thiếp như có 7 lò than hồng, người tu hành thì đã bước qua ái dục.\n\n8. Do có “tuệ phân tích” mà có thể nói về một đề tài nói hoài không hết. Có vị tuy đã chứng A La Hán mà không có “tuệ phân tích” này.\n\n9. Một bầy khỉ nhìn thấy Chư Tăng đảnh lễ Xá lợi Tóc và Răng của Đức Phật, khi Chư Tăng đi rồi, chúng cũng ra lạy. Kết quả là bầy khỉ được sanh thiên, 500 con khỉ sanh về Đao Lợi Thiên.\n\n10. Trong truyện “Hạt đậu biết nhảy”, một bà mẹ dặn con trai khi sang Ấn Độ buôn bán nhớ mua về cho bà một hạt Xá lợi Phật. Nhưng anh này lần nào cũng quên. Dù bà đã tha thiết dặn đi dặn lại, nhưng anh vẫn quên. Đến khi sực nhớ, anh ta lượm một cái răng chó đem về nói dối với mẹ là Xá lợi Phật. Bà mừng rỡ, cung kính tôn trí và hằng ngày đảnh lễ. Cho tới một ngày, hạt Xá lợi giả đó cũng tỏa hào quang.\n\n11. Tụng một đoạn kinh Pháp Cú cho đứa trẻ khóc đêm nghe=>\nNếu ai biết Pháp Cú\nTự mình hộ trì giới\nXa lìa sự sát sanh\nNói thật, không nói dối\nTự bỏ điều phi nghĩa\nGiải thoát đường quỷ thần.</p></div>', '8.18.jpg', NULL, 1),
(181, 'Sổ Tay Học Phật (Tập 4)', 'Minh Huệ', 'NXB Tôn Giáo', 2019, 8, 16, 20060.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>SỔ TAY HỌC PHẬT - TẬP 4\n\n1. Tổ Thế Thân tu tập 12 năm hướng về Phật Di Lặc mà không thấy được kim thân của Phật Di Lặc. Ngài chán nản bỏ động tu, đi ra ngoài. Khi nhìn thấy một con chó ghẻ nằm bên đường, ngài khởi từ tâm, định dùng lưỡi liếm những vết lở loét, giòi bọ của nó để chữa trị, thì con chó bỗng biến mất và kim thân Phật Di Lặc hiện ra rực rỡ.\n(Luận văn Tiến sĩ, nghiên cứu về Đại Sư  Thế Thân của Lê Mạnh Thát,\nbảo vệ tại Hoa Kỳ)\n\n2. Một người nữ nếu có đọc một bài kệ kinh Đại Bửu Tích thì kiếp sau sẽ không làm người nữ nữa. Bửu Tràng Đà la ni có năng lực chuyển nữ thành nam.\n\n3. Khi thành đệ tử Phật, Xá Lợi Phất 2 tuần sau chứng quả A La Hán, Mục Kiền Liên thì sau một tuần.\n\n4. Ngài Ni Đề sau khi xuất gia, tu 4 tháng chứng A La Hán. Phật nói ông từng là Tam Tạng Pháp sư thời Phật Ca Diếp. Ông có một đệ tử chứng quả Tu Đà Hoàn mà ông không hay biết. Một hôm ông bệnh, nhờ đệ tử đổ phân, quả báo ông phải gánh chịu là 500 đời phải hốt phân.\n\n5. Một ngày nọ vua Ba Tư Nặc thỉnh Phật và chư tăng vào cung thọ trai. Trong đó có một vị tỳ kheo hơi thở có mùi thơm của hoa sen bát ngát. Vua nghi ngờ ông dùng ma thuật để quyến rũ cung nữ, nên kêu ông đi súc miệng, nhưng càng súc càng thơm. Vua thắc mắc, Phật bảo thời quá khứ vị tỳ kheo này thường tán thán công hạnh chư Phật, nên có phước báo như thế.\n\n6. Ông Lâm ở Đài Loan phóng sanh một con rùa lớn. Ông bỏ ra rất nhiều tiền để mua nó và có khắc tên ông vì sợ người ta bắt ăn thịt. Mười sáu năm sau, con trai ông bị rơi xuống biển, sống sót nhờ con rùa ấy đưa vào bờ.\n\n7. Kiếp trước, thiền sư Ô Sào và Bạch Cư Dị là hai người bạn đồng tu. Bạch Cư Dị hỏi=>\n- Nhà anh giàu không?\nÔ Sào trả lời=>\n- Cha tôi giàu lắm, tiền không biết làm gì cho hết. Tôi thấy vậy chán quá nên đi tu.\nÔ Sào hỏi lại=>\n- Nhà anh giàu không?\nBạch Cư Dị nói=>\n- Nhà tôi nghèo lắm, thiếu thốn mọi thứ nên tôi chán quá tôi đi tu. Mong sao kiếp sau tôi làm một ông quan thật giàu.\nChính tâm nguyện đó mà Ô Sào phải đầu thai theo bạn để chuyển mê khai ngộ. \nKiếp lai sinh, quả thật Bạch Cư Dị là một Quan Thị lang, một ông quan có tâm hồn thi sĩ, bạn với thơ và rượu, và ông có nhân duyên gặp lại ngài Ô Sào. Ông hỏi thiền sư, đại ý Phật Pháp là gì. Ô Sào trả lời=>\nChư ác mạc tác\nChúng thiện phụng hành\nTự tịnh kỳ ý\nThị chư Phật giáo.\nQuan Thị lang nói, điều đó con nít lên 3 cũng biết. Ô Sào tiếp lời, nhưng ông già 80 làm không được.\nHai người bạn, một tăng một tục, cũng là trường hợp của Tô Đông Pha và thiền sư Phật Ấn. Họ cũng có nhân duyên làm bạn bè nhiều kiếp, Và Phật Ấn cũng muốn thức tỉnh Tô Đông Pha, mong Hàn Lâm học sĩ đừng dấn bước quá sâu vào mê lộ.\nPhật Ấn biết Tô có 7 người thiếp nên một hôm hỏi… mượn một. Tô Đông Pha cả cười đồng ý, sai người thiếp thứ 7 đến, dặn rằng=>\n- Nàng cứ đến xem hòa thượng xử sự ra sao.\n\nĐêm đó hòa thượng sắp xếp một phòng cho cô nghỉ. Cô đinh ninh hòa thượng sẽ đến phòng mình nhưng chờ hoài không thấy, cô tò mò hé cửa xem hòa thượng đang làm gì bên ngoài, thì thấy ngài cho đốt 7 chiếc lò đỏ rực, suốt đêm bước qua bước lại 7 cái lò ấy. Sáng hôm sau cô trở về thuật lại chuyện đêm qua cho Tô Đông Pha nghe. Ông này lập tức hiểu điều ngài muốn nhắn gởi. Có 7 người thiếp như có 7 lò than hồng, người tu hành thì đã bước qua ái dục.\n\n8. Do có “tuệ phân tích” mà có thể nói về một đề tài nói hoài không hết. Có vị tuy đã chứng A La Hán mà không có “tuệ phân tích” này.\n\n9. Một bầy khỉ nhìn thấy Chư Tăng đảnh lễ Xá lợi Tóc và Răng của Đức Phật, khi Chư Tăng đi rồi, chúng cũng ra lạy. Kết quả là bầy khỉ được sanh thiên, 500 con khỉ sanh về Đao Lợi Thiên.\n\n10. Trong truyện “Hạt đậu biết nhảy”, một bà mẹ dặn con trai khi sang Ấn Độ buôn bán nhớ mua về cho bà một hạt Xá lợi Phật. Nhưng anh này lần nào cũng quên. Dù bà đã tha thiết dặn đi dặn lại, nhưng anh vẫn quên. Đến khi sực nhớ, anh ta lượm một cái răng chó đem về nói dối với mẹ là Xá lợi Phật. Bà mừng rỡ, cung kính tôn trí và hằng ngày đảnh lễ. Cho tới một ngày, hạt Xá lợi giả đó cũng tỏa hào quang.\n\n11. Tụng một đoạn kinh Pháp Cú cho đứa trẻ khóc đêm nghe=>\nNếu ai biết Pháp Cú\nTự mình hộ trì giới\nXa lìa sự sát sanh\nNói thật, không nói dối\nTự bỏ điều phi nghĩa\nGiải thoát đường quỷ thần.</p></div>', '8.19.jpg', NULL, 1),
(182, 'Sổ Tay Học Phật (Tập 5)', 'Minh Huệ', 'NXB Tôn Giáo', 2019, 8, 16, 20060.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>SỔ TAY HỌC PHẬT - TẬP 5\n\n1. Tổ Thế Thân tu tập 12 năm hướng về Phật Di Lặc mà không thấy được kim thân của Phật Di Lặc. Ngài chán nản bỏ động tu, đi ra ngoài. Khi nhìn thấy một con chó ghẻ nằm bên đường, ngài khởi từ tâm, định dùng lưỡi liếm những vết lở loét, giòi bọ của nó để chữa trị, thì con chó bỗng biến mất và kim thân Phật Di Lặc hiện ra rực rỡ.\n(Luận văn Tiến sĩ, nghiên cứu về Đại Sư  Thế Thân của Lê Mạnh Thát,\nbảo vệ tại Hoa Kỳ)\n\n2. Một người nữ nếu có đọc một bài kệ kinh Đại Bửu Tích thì kiếp sau sẽ không làm người nữ nữa. Bửu Tràng Đà la ni có năng lực chuyển nữ thành nam.\n\n3. Khi thành đệ tử Phật, Xá Lợi Phất 2 tuần sau chứng quả A La Hán, Mục Kiền Liên thì sau một tuần.\n\n4. Ngài Ni Đề sau khi xuất gia, tu 4 tháng chứng A La Hán. Phật nói ông từng là Tam Tạng Pháp sư thời Phật Ca Diếp. Ông có một đệ tử chứng quả Tu Đà Hoàn mà ông không hay biết. Một hôm ông bệnh, nhờ đệ tử đổ phân, quả báo ông phải gánh chịu là 500 đời phải hốt phân.\n\n5. Một ngày nọ vua Ba Tư Nặc thỉnh Phật và chư tăng vào cung thọ trai. Trong đó có một vị tỳ kheo hơi thở có mùi thơm của hoa sen bát ngát. Vua nghi ngờ ông dùng ma thuật để quyến rũ cung nữ, nên kêu ông đi súc miệng, nhưng càng súc càng thơm. Vua thắc mắc, Phật bảo thời quá khứ vị tỳ kheo này thường tán thán công hạnh chư Phật, nên có phước báo như thế.\n\n6. Ông Lâm ở Đài Loan phóng sanh một con rùa lớn. Ông bỏ ra rất nhiều tiền để mua nó và có khắc tên ông vì sợ người ta bắt ăn thịt. Mười sáu năm sau, con trai ông bị rơi xuống biển, sống sót nhờ con rùa ấy đưa vào bờ.\n\n7. Kiếp trước, thiền sư Ô Sào và Bạch Cư Dị là hai người bạn đồng tu. Bạch Cư Dị hỏi=>\n- Nhà anh giàu không?\nÔ Sào trả lời=>\n- Cha tôi giàu lắm, tiền không biết làm gì cho hết. Tôi thấy vậy chán quá nên đi tu.\nÔ Sào hỏi lại=>\n- Nhà anh giàu không?\nBạch Cư Dị nói=>\n- Nhà tôi nghèo lắm, thiếu thốn mọi thứ nên tôi chán quá tôi đi tu. Mong sao kiếp sau tôi làm một ông quan thật giàu.\nChính tâm nguyện đó mà Ô Sào phải đầu thai theo bạn để chuyển mê khai ngộ. \nKiếp lai sinh, quả thật Bạch Cư Dị là một Quan Thị lang, một ông quan có tâm hồn thi sĩ, bạn với thơ và rượu, và ông có nhân duyên gặp lại ngài Ô Sào. Ông hỏi thiền sư, đại ý Phật Pháp là gì. Ô Sào trả lời=>\nChư ác mạc tác\nChúng thiện phụng hành\nTự tịnh kỳ ý\nThị chư Phật giáo.\nQuan Thị lang nói, điều đó con nít lên 3 cũng biết. Ô Sào tiếp lời, nhưng ông già 80 làm không được.\nHai người bạn, một tăng một tục, cũng là trường hợp của Tô Đông Pha và thiền sư Phật Ấn. Họ cũng có nhân duyên làm bạn bè nhiều kiếp, Và Phật Ấn cũng muốn thức tỉnh Tô Đông Pha, mong Hàn Lâm học sĩ đừng dấn bước quá sâu vào mê lộ.\nPhật Ấn biết Tô có 7 người thiếp nên một hôm hỏi… mượn một. Tô Đông Pha cả cười đồng ý, sai người thiếp thứ 7 đến, dặn rằng=>\n- Nàng cứ đến xem hòa thượng xử sự ra sao.\n\nĐêm đó hòa thượng sắp xếp một phòng cho cô nghỉ. Cô đinh ninh hòa thượng sẽ đến phòng mình nhưng chờ hoài không thấy, cô tò mò hé cửa xem hòa thượng đang làm gì bên ngoài, thì thấy ngài cho đốt 7 chiếc lò đỏ rực, suốt đêm bước qua bước lại 7 cái lò ấy. Sáng hôm sau cô trở về thuật lại chuyện đêm qua cho Tô Đông Pha nghe. Ông này lập tức hiểu điều ngài muốn nhắn gởi. Có 7 người thiếp như có 7 lò than hồng, người tu hành thì đã bước qua ái dục.\n\n8. Do có “tuệ phân tích” mà có thể nói về một đề tài nói hoài không hết. Có vị tuy đã chứng A La Hán mà không có “tuệ phân tích” này.\n\n9. Một bầy khỉ nhìn thấy Chư Tăng đảnh lễ Xá lợi Tóc và Răng của Đức Phật, khi Chư Tăng đi rồi, chúng cũng ra lạy. Kết quả là bầy khỉ được sanh thiên, 500 con khỉ sanh về Đao Lợi Thiên.\n\n10. Trong truyện “Hạt đậu biết nhảy”, một bà mẹ dặn con trai khi sang Ấn Độ buôn bán nhớ mua về cho bà một hạt Xá lợi Phật. Nhưng anh này lần nào cũng quên. Dù bà đã tha thiết dặn đi dặn lại, nhưng anh vẫn quên. Đến khi sực nhớ, anh ta lượm một cái răng chó đem về nói dối với mẹ là Xá lợi Phật. Bà mừng rỡ, cung kính tôn trí và hằng ngày đảnh lễ. Cho tới một ngày, hạt Xá lợi giả đó cũng tỏa hào quang.\n\n11. Tụng một đoạn kinh Pháp Cú cho đứa trẻ khóc đêm nghe=>\nNếu ai biết Pháp Cú\nTự mình hộ trì giới\nXa lìa sự sát sanh\nNói thật, không nói dối\nTự bỏ điều phi nghĩa\nGiải thoát đường quỷ thần.</p></div>', '8.2.jpg', NULL, 1),
(183, '50 Đề Minh Họa Tốt Nghiệp THPT 2025 - Môn Toán', 'Nhiều Tác Giả', 'Dân Trí', 2024, 7, 13, 159.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>50 Đề Minh Họa Tốt Nghiệp THPT 2025 - Môn Toán\n\n- Bản luyện đề trắc nghiệm 2025 theo định dạng mới nhất của bộ Giáo Dục.\n\n- Các câu hỏi được thiết kế theo định hướng đánh giá năng lực, gắn với bối cảnh có giá trị nhất định về thực tiễn và khoa học, phù hợp với chương trình giáo dục mới.\n\n- Xây dựng và phát triển mở rộng ma trận cấu trúc đề thi minh họa năm 2025 của Bộ Giáo dục\n\n- 100% bài tập có lời giải chi tiết, video hướng dẫn từng ID và livestream đầy đủ 50 đề\n\n*** Về nội dung=>\n\n- Mỗi đề đều gồm 50 câu hỏi được phân bố theo các mức độ từ nhận biết, thông hiểu đến vận dụng, vận dụng cao.\n\n- Với các câu ở mức độ thông hiểu=> tác giả cài cắm nhiều câu bẫy, dễ mắc sai lầm, đòi hỏi các em không chỉ nắm chắc lí thuyết mà còn phải hết sức cẩn thận, tỉnh táo, không chủ quan mới có thể chọn đúng.\n\n- Với các câu ở mức độ vận dụng và đặc biệt là vận dụng cao=> tác giả đã cố gắng sáng tạo thêm để các em chủ động xử lí bài tập HAY - LẠ - KHÓ từ nhiều hướng khác nhau.\n\n*** Đối tượng sử dụng=>\n\n- Học sinh lớp 12 chuẩn bị ôn thi cho kì thi tốt nghiệp TNPT 2025, ôn thi đánh giá năng lực.\n\n- Học sinh lớp 11 muốn luyện đề thi TNPT sớm.\n\n- Là nguồn tư liệu cung cấp bộ đề thi thử chất lượng, đầy đủ cho quý thầy giáo, cô giáo ôn luyện thi tham khảo.</p></div>', '7.1.jpg', NULL, 1),
(184, '25 Đề Ôn Thi Đánh Giá Năng Lực Đại Học Quốc Gia TP. HCM', 'Nhiều Tác Giả', 'Dân Trí', 2024, 7, 13, 199.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>25 đề luyện thi đánh giá năng lực Đại học Quốc gia Thành phố Hồ Chí Minh” được chia thành 3 phần như sau =>\n\nPHẦN 1. SỬ DỤNG NGÔN NGỮ\n\nPHẦN 2. TOÁN HỌC\n\nPHẦN 3=> TƯ DUY KHOA HỌC\n\n+ Về tổng quan hình thức=>\n\nCuốn sách được biên soạn gồm 25 đề thi, mỗi đề được tách riêng và chế bản theo phông chữ và trình bày như đề thi thật. Điều này giúp cho thí sinh làm quen, không còn lạ lẫm với định dạng của đề thi thật.\n\n+ Về nội dung, bố cục=> Mỗi đề thi gồm 3 phần chi tiết=>\n\n- Phần ngôn ngữ.\n\n- Phần toán học.\n\n- Phần giải quyết vấn đề.\n\nĐược biên soạn theo đúng ma trận đề thi thật đã được các thầy cô tại Moon.vn dày công nghiên cứu. Các câu hỏi, vấn đề được biên soạn mang tính đa dạng, phong phú và được phân bố hợp lý đảm bảo tính chặt chẽ và mức độ phù hợp theo định hướng đánh giá năng lực.\n\nĐối tượng sử dụng sách \"25 đề ôn thi đánh giá năng lực ĐHQG TP.HCM\"=>\n\n- Học sinh lớp 12 ôn thi đánh giá năng lực trường ĐHQG. HCM xét tuyển vào các trường Đại học.\n\n- Là nguồn tư liệu chất lượng, đầy đủ cho quý thầy giáo, cô giáo ôn luyện thi tham khảo.</p></div>', '7.2.jpg', NULL, 1),
(185, 'Bộ Đề Ôn Thi Tuyển Sinh Lớp 10 - Môn Ngữ Văn (Theo Cấu Trúc Đề Thi Của Thành Phố Hồ Chí Minh)', 'Nguyễn Phước Bảo Khôi', 'Đại Học Sư Phạm Thành Phố Hồ Chí Minh', 2024, 7, 13, 82.50, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Bộ Đề Ôn Thi Tuyển Sinh Lớp 10 - Môn Ngữ Văn giúp các em tự trang bị những kiến thức, kĩ năng quan trọng, đồng thời có định hướng đúng và có thể vận dụng tốt vào quá trình làm bài trong học tập, thi cử và hoàn thành tốt bài thi vào lớp 10.\n\nVới nội dung phong phú, đa dạng, hi vọng cuốn sách sẽ là nguồn tài liệu bổ ích giúp các em tự học, tự ôn luyện nhằm vươn lên học khá, giỏi môn Ngữ Văn. Điểm đặc biệt của cuốn sách này là định hướng cho các em cách luyện giải các đề thi thử hiệu quả.</p></div>', '7.3.jpg', NULL, 1),
(186, '50 Đề Thực Chiến Luyện Thi Tiếng Anh Vào Lớp 10 (Có Đáp Án)', 'Bùi Văn Vinh, ThS Thái Vân Anh, Đỗ Thị Lan Anh, Nguyễn Thị Phương Anh', 'Hà Nội', 2025, 7, 13, 111.20, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Cuốn sách 50 ĐỂ THỰC CHIẾN LUYỆN THI TIẾNG ANH VÀO LỚP 10 ra đời với mong muốn trở thành người bạn đồng hành đáng tin cậy của các em học sinh trong quá trình ôn luyện môn tiếng Anh. Được biên soạn theo cấu trúc và nội dung của đề thi minh họa mới nhất, cuốn sách này sẽ cung cấp cho các em 50 đề thi sát với kỳ thi thực tế vào lớp 10, từ đó giúp các em làm quen với các dạng bài, nâng cao khả năng phân tích và giải quyết vấn đề một cách nhanh chóng, chính xác.\n\nHy vọng rằng cuốn sách này sẽ là người bạn đồng hành đáng tin cậy, giúp các em chuẩn bị tốt nhất cho kỳ thi vào lớp 10 môn Tiếng Anh. Chúc các em sẽ đạt được kết quả cao và mở ra một chương mới đầy hứa hẹn trong hành trình học tập của mình!</p></div>', '7.4.jpg', NULL, 1),
(187, 'Đề Ôn Thi Tốt Nghiệp Trung Học Phổ Thông - Môn Tiếng Anh (Theo Chương Trình Giáo Dục Phổ Thông 2018)', 'Nhiều Tác Giả', 'Giáo Dục Việt Nam', 2025, 7, 13, 98.60, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Cấu trúc sách gồm hai phần chính\n\nPhần 1=> Đề ôn luyện\n\nCung cấp 20 đề ôn tập được biên soạn bám sát yêu cầu cần đạt của Chương trình GDPT 2018.\n\nCấu trúc đề thi được xây dựng theo Quyết định số 764/QĐ-BGDĐT và đề tham khảo của Bộ GD&ĐT.\n\nGiúp học sinh làm quen với định dạng đề thi, cải thiện tốc độ và độ chính xác khi làm bài.\n\nPhần 2=> Gợi ý trả lời\n\nCung cấp đáp án chi tiết và giải thích rõ ràng từng câu hỏi, giúp học sinh hiểu sâu bản chất của từng kiến thức.\n\nHỗ trợ học sinh củng cố kiến thức, ghi nhớ lâu và áp dụng hiệu quả trong bài thi.\n\nĐịnh hướng phương pháp làm bài thi để tối ưu hóa thời gian và điểm số.\n\nCuốn sách \"Đề ôn thi tốt nghiệp THPT môn Tiếng Anh\" là tài liệu quan trọng giúp học sinh xây dựng chiến lược làm bài hiệu quả, tăng tốc ôn tập và tự tin bước vào kỳ thi với sự chuẩn bị tốt nhất. Với nội dung bám sát đề thi chính thức, phần giải thích chi tiết và phương pháp học tập khoa học, sách không chỉ hỗ trợ ôn thi tốt nghiệp THPT mà còn là nền tảng hữu ích cho những học sinh có nguyện vọng xét tuyển vào Đại học, Cao đẳng. Việc luyện đề thường xuyên sẽ giúp học sinh tối ưu hóa thời gian làm bài, nâng cao kỹ năng tư duy ngôn ngữ và đạt kết quả cao trong kỳ thi.</p></div>', '7.5.jpg', NULL, 1),
(188, 'Ôn Tập Luyện Thi Trung Học Phổ Thông Quốc Gia 2022 - Môn Ngữ Văn', 'Thái Quang Vinh', 'NXB Đại Học Quốc Gia TP.HCM', 2022, 7, 13, 89.25, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Ôn Tập Luyện Thi Trung Học Phổ Thông Quốc Gia 2022 - Môn Ngữ Văn\n\nSách được biên soạn theo chuẩn kiến thức và kỹ năng chương trình THPT. Sách tổng hợp các kiến thức để các em dễ dàng nắm bắt.\n\nBên cạnh đó, sách đưa ra một số đề thi mẫu nhằm rèn luyện kỹ năng giải đề thi, làm quen với cấu trúc đề thi một cách hiệu quả.</p></div>', '7.6.jpg', NULL, 1),
(189, 'Cấu Trúc Các Dạng Đề Thi Môn Toán 12 (Ôn Luyện Thi ĐH-CĐ 2013)', 'Nguyễn Tất Thu, Nguyễn Phú Khánh', 'NXB Đại Học Quốc Gia TP.HCM', 2013, 7, 13, 30.48, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Cấu Trúc Các Dạng Đề Thi Môn Toán 12 (Ôn Luyện Thi ĐH-CĐ 2013)</p></div>', '7.7.jpg', NULL, 1),
(190, 'Rèn Luyện Và Ôn Tập Thi Tốt Nghiệp THPT Quốc Gia - Tuyển Tập 166 Bài Làm Văn Chọn Lọc 12', 'Thái Quang Vinh, Trần Lê Thảo Linh', 'NXB Đại Học Quốc Gia TP.HCM', 2019, 7, 13, 57.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Gồm những bài làm văn được biên soạn theo chương trình hiện hành.\n\nĐược viết bởi rất nhiều giọng văn để thỏa mãn trình độ của mọi đối tượng học sinh.\n\nVới tính chất đa dạng về đề tài ở những kiểu văn khác nhàu và những bài mang tính định hướng.</p></div>', '7.8.jpg', NULL, 1),
(191, 'Học Tốt Hóa Học 12', 'Lê Đình Nguyên', 'NXB Đại Học Quốc Gia TP.HCM', 2016, 7, 14, 29.40, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Học Tốt Hóa Học 12</p></div>', '7.9.jpg', NULL, 1),
(192, 'Học Tốt Tiếng Anh 12', 'Hoàng Lệ Thu', 'NXB Đại Học Quốc Gia Hà Nội', 2017, 7, 14, 40.30, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Quyển sách Học Tốt Tiếng Anh 12 (Tập 1 Và 2) của tác giả Hoàng Lệ Thu được biên soạn sát với chương trình chuẩn của sách giáo khoa theo chương trình thí điểm năm học mới. Quyển sách này nhằm hỗ trợ các em học sinh lớp 12 học tốt môn Tiếng Anh lớp 6 với những dạng bài tập cơ bản và nâng cao.</p></div>', '7.10.jpg', NULL, 1),
(193, 'Hướng Dẫn Ôn Thi Tốt Nghiệp Trung Học Phổ Thông - Môn Vật Lí (Theo Chương Trình Giáo Dục Phổ Thông 2018)', 'Nguyễn Đức Hiệp , Trần Hoàng Nghiêm, Lê Cao Phan, Nguyễn Trọng Sửu', 'Giáo Dục Việt Nam', 2024, 7, 14, 55250.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Cấu trúc của sách gồm các phần chính sau=>\n\nPhần một. Ôn tập theo chủ đề=> bao gồm kiến thức trọng tâm, các câu hỏi ôn tập của từng chủ đề nhằm giúp học sinh củng cố kiến thức, làm quen với các dạng câu hỏi theo cấu trúc đề thi tốt nghiệp Trung học phổ thông từ năm 2025.\n\nPhần hai. Đề ôn luyện=> bao gồm 08 để ôn luyện được biên soạn bám sát theo cấu trúc quy định trong Quyết định số 764/QĐ-BGDĐT ngày 08 tháng 3 năm 2024 của Bộ Giáo dục và Đào tạo.\n\nPhần ba. Đáp án – Hướng dẫn giải=> gồm đáp án và hướng dẫn giải một số câu hỏi trong từng chủ đề và các đề ôn luyện nhằm giúp học sinh có thể tự học, tự so sánh kết quả bài làm của mình.\n\nVới cấu trúc như trên, các tác giả hi vọng quyển sách sẽ là người bạn đồng hành đáng tin cậy cho các em học sinh trong quá trình ôn luyện để chuẩn bị bước vào Kì thi tốt nghiệp Trung học phổ thông môn Vật lí theo Chương trình giáo dục phổ thông năm 2018.\n\nChúc các em học tập hiệu quả và có một kì thi thành công!</p></div>', '7.11.jpg', NULL, 1),
(194, 'Hướng Dẫn Ôn Thi Vào Lớp 10 - Môn Tiếng Anh (Theo Định Hướng Phát Triển Năng Lực)', 'Nhiều Tác Giả', 'Giáo Dục Việt Nam', 2024, 7, 14, 42.50, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Hướng Dẫn Ôn Thi Vào Lớp 10 - Môn Tiếng Anh (Theo Định Hướng Phát Triển Năng Lực)\n\nSách gồm 3 phần=>\n\n- Phần cơ bản=> 20 đề, mỗi đề gồm 50-60 câu, kiểm tra kiến thức cơ bản theo chương trình tiếng Anh khối THCS của Bộ GD&ĐT\n\n- Phần nâng cao=> 15 đề, mỗi đề gồm 90-100 câu, kiểm tra kiến thức nâng cao, đặc biệt là về ngữ pháp, nhằm giúp các em ôn luyện đề thi vào các trường chuyên hoặc lớp chuyên Anh.\n\n- Một số đề thi tuyển sinh=> gồm các đề thi tuyển sinh lớp 10 và lớp 10 chuyên Anh năm 2015-2023</p></div>', '7.12.jpg', NULL, 1),
(195, 'Ôn Tập Thi Vào Lớp 10 - Môn Ngữ Văn - Năm Học 2025-2026 (Theo Chương Trình GDPT 2018)', 'Nguyễn Thị Nương, Doãn thị Bông, Nguyễn Thị Tuyết Mai', 'Giáo Dục Việt Nam', 2025, 7, 14, 30600.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Ôn Tập Thi Vào Lớp 10 - Môn Ngữ Văn - Năm Học 2025-2026 (Theo Chương Trình GDPT 2018)\n\nĐể phục vụ yêu cầu ôn tập cho kì thi này, chúng tôi đã tổ chức biên soạn sách Ôn tập thi vào lớp 10 môn Ngữ văn năm học 2025-2026 (Theo chương trình GDPT 2018).\n\nCuốn sách luôn bám sát các yêu cầu cần đạt của Chương trình 2018; định hướng kiểm tra, đánh giá của Bộ Giáo dục và Đào tạo; đề thi chính thức một số năm học trước và đề thi minh họa năm học 2025 – 2026 của Sở Giáo dục và Đào tạo Hà Nội.\n\n– Ôn luyện kiến thức\n\n– Các đề luyện tham khảo\n\n– Giới thiệu đề thi chính thức và đề thi minh hoạ\n\n– Đáp án, hướng dẫn đề ôn luyện và đề minh hoạ\n\nTập thể tác giả của bộ sách là các nhà giáo có kinh nghiệm biên soạn SGK hoặc đã và đang trực tiếp giảng dạy, tham gia hướng dẫn ôn luyện cho học sinh trong các kì thi học sinh giỏi, thi tuyển sinh vào lớp 10. Chúng tôi mong rằng bộ sách sẽ là tài liệu mới mẻ, hiệu quả, giúp các em học sinh có sự chuẩn bị tốt nhất cho kì thi.</p></div>', '7.13.jpg', NULL, 1),
(196, 'Hướng Dẫn Ôn Thi Vào Lớp 10 - Môn Toán (Theo Định Hướng Phát Triển Năng Lực)', 'Nhiều Tác Giả', 'Giáo Dục Việt Nam', 2024, 7, 14, 55250.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Hướng Dẫn Ôn Thi Vào Lớp 10 - Môn Toán (Theo Định Hướng Phát Triển Năng Lực)\n\nSách tham khảo - Hướng dẫn ôn thi vào lớp 10 môn Toán theo định hướng phát triển năng lực được biên soạn nhằm giúp các em học sinh lớp 9 có những định hướng cơ bản, thuận lợi cho việc ôn thi tuyển sinh vào lớp 10 cấp Trung học phổ thông.\n\nNội dung cuốn sách bám sát các yêu cầu của Chương trình Giáo dục phổ thông cấp Trung học cơ sở.\n\nCuốn sách này gồm 3 phần=>\n\nPhần một. Ôn tập theo chủ đề=> bao gồm những nội dung cốt lõi, các câu hỏi, bài tập bám sát yêu cầu cần đạt để củng cố kiến thức, làm quen với các dạng câu hỏi và bài tập theo cấu trúc chung.\n\nPhần hai. Đề ôn tập=> bao gồm 10 đề ôn tập nhằm rèn luyện kĩ năng đọc hiểu và làm bài.\n\nPhần ba. Hướng dẫn - Đáp án=> bao gồm đáp án của tất cả các câu hỏi, bài tập trong từng chủ đề cũng như đề ôn tập cùng với các hướng dẫn gợi ý để học sinh có thể tự học, tự kiểm tra, đánh giá kết quả bài làm của mình, qua đó, rút ra kinh nghiệm để hoàn thiện các kĩ năng.\n\nVới cấu trúc như trên, các tác giả hi vọng cuốn sách này sẽ là tài liệu tham khảo hữu ích cho các thầy, cô giáo và các em học sinh trong quá trình chuẩn bị cho kì thi tuyển sinh vào lớp 10.</p></div>', '7.14.jpg', NULL, 1),
(197, 'Luyện Thi Vào Lớp 10 Phổ Thông Và Chuyên - Môn Toán', 'Phan Văn Đức', 'Cty Văn Hóa Sách Việt', 2022, 7, 14, 93750.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Luyện Thi Vào Lớp 10 Phổ Thông Và Chuyên - Môn Toán\n\nVới nội dung hệ thống hóa kiến thức toán THCS và kĩ thuật, kĩ năng giải các dạng toán cơ bản và nâng cao giúp các em học sinh lớp 9 Ôn tập và luyện thi lớp 10 phổ thông và chuyên phù hợp với năng lực của học sinh. Quyển sách giúp các em có cái nhìn tổng quát về các vấn đề thường gặp trong các đề thi tuyển sinh vào lớp 10 trong những năm gần đây.\n\nCấu trúc sách gồm có 4 phần=>\n\n* Phần 1=> hệ thống hóa các nội dung kiến thức đã học và được sắp xếp theo các chủ đề phù hợp.\n\n* Phần 2=> các bài toán và phương pháp giải được phân loại theo từng dạng.\n\n* Phần 3=> bài tập vận dụng giúp học sinh tự luyện, có hướng dẫn giải giúp học sinh tự học khi không có sự trợ giúp.\n\n* Phần 4=> các đề thi tuyển sinh vào lớp 10 trường THPT cũng như trường THPT chuyên trong những năm gần đây, một số đề có hướng dẫn giải cụ thể rõ ràng. Các đề thi được sắp xếp từ dễ đến khó nhưng vẫn không nằm ngoài khuôn khổ những gì các em đã được lĩnh hội nhằm giúp các em tiếp cận chúng phù hợp với năng lực và phát triển năng lực theo chủ trương của Bộ Giáo dục và Đào tạo.\n\nQuyển sách sẽ giúp các em học sinh lớp 9 nắm vững kiến thức và giải quyết được các bài toán từ dễ đến khó qua quá trình trãi nghiệm và sang tạo, chuẩn bị thật tốt cho mình hành trang để vượt qua các kì thi và vững bước vào trường Trung học phổ thông mà mình mong muốn.</p></div>', '7.15.jpg', NULL, 1);
INSERT INTO `sach` (`ID_Sach`, `Ten_Sach`, `Tac_Gia`, `Ten_Nha_Xuat_Ban`, `Nam_Xuat_Ban`, `ID_DanhMuc`, `ID_TheLoai`, `Gia_Ban`, `GiamGia(%)`, `So_Luong_Ton`, `Mo_Ta`, `Images`, `ID_Cart`, `TrangThai`) VALUES
(198, 'Đột Phá Điểm 9+ Tiếng Anh - Bộ Đề Thi Tiếng Anh Vào Lớp 10 - Có Đáp Án', 'Bùi Văn Vinh, Quỳnh Thơm', 'Đại Học Quốc Gia Hà Nội', 2023, 7, 14, 103200.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Đột Phá Điểm 9+ Tiếng Anh - Bộ Đề Thi Tiếng Anh Vào Lớp 10 - Có Đáp Án\n\nĐột Phá Tiếng Anh Điểm 9+, Bộ Đề Thi Tiếng Anh Vào Lớp 10 - Có Đáp Án này sẽ là cẩm nang giúp các em rút ngắn khoảng cách những hạn chế trong hiểu biết của mình để đến với những đề thi vào lớp 10 tầm cỡ quốc gia sát với cấu trúc đề thi chính thức.\n\nĐột Phá Tiếng Anh Điểm 9+, Bộ Đề Thi Tiếng Anh Vào Lớp 10 - Có Đáp Án luyện tập 50 đề thi then chốt, các đề thi rất đa dạng, phong phú và đầy đủ ở mỗi đề tài, bám sát chương trình của các Sở Giáo dục & Đào tạo. Các bài tập được phân cấp rõ ràng từ dễ đến khó, từ đơn giản đến phức tạp. Sau mỗi đề thi sẽ có đáp án cụ thể cho từng đề. Các em sẽ đón nhận ở đó trọn vẹn những gì các em còn thiếu sót để chuẩn bị tốt nhất cho kỳ thi vào lớp 10 sắp tới.</p></div>', '7.16.jpg', NULL, 1),
(199, 'Chiến Thắng Kì Thi 9 Vào 10 Chuyên Lịch Sử', 'Nguyễn Đình Đông', 'NXB Thanh Niên', 2021, 7, 14, 69300.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Chiến Thắng Kì Thi 9 Vào 10 Chuyên Lịch Sử\n\nTrên lộ trình đổi mới kiểm tra, đánh giá đặc biệt là kì thi tuyển sinh lên lớp 10 sẽ có nhiều đổi mới so với kì thi tuyển sinh trước đây. Theo đó, ngoài các môn thi như trước đây, nhiều tỉnh - thành đã đưa môn Lịch sử vào môn thi bắt buộc của kì thi này, sự đổi mới này đã được định hưỡng từ trước. Tuy nhiên, sẽ gây ra những khó khăn nhất định cho các em học sinh lớp 9 sắp bước vào kì thi.\n\nĐể góp phần định hướng những kiến thức trọng tâm cần thiết, thiết lập hệ thống câu hỏi trắc nghiệm và các đề thi mẫu theo chuẩn quy định., xin giới thiệu cuốn Chiến Thắng Kì Thi 9 Vào 10 Chuyên Lịch Sử. Hi vọng cuốn sách là nguồn tư liệu tốt giành cho quý bạn đọc, Thầy, Cô giáo và các bạn học sinh!</p></div>', '7.17.jpg', NULL, 1),
(200, 'Tự Học Vật Lý Lớp 11 - Tập 1', 'Bùi Văn Đặng, Hoàng Quốc Hoàn, Lại Đắc Hợp', 'Dân Trí', 2025, 7, 14, 139000.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Tự Học Vật Lý Lớp 11 - Tập 1\n\nCuốn sách được viết bám sát theo chương trình mới, chúng tôi thực sự tin rằng đây là một tài liệu Vật lý bổ ích, thiết thực không chỉ cho học sinh mà còn cho các bậc phụ huynh và quý thầy, cô giáo.\n\n+ Chương trình chuẩn kết hợp theo cả 3 bộ sách=> Cánh Diều, Kết Nối Tri Thức với Cuộc sống và Chân trời sáng tạo\n\n+ Hệ thống kiến thức rõ ràng theo chủ đề tương ứng với chương trình SGK mới.\n\n+ Có khoá học bài giảng lý thuyết cho mỗi chủ đề.\n\n+ Bài tập có lời giải chi tiết.\n\n+ Hơn 4000 bài tập từ cơ bản đến nâng cao</p></div>', '7.18.jpg', NULL, 1),
(201, 'Phát Triển Năng Lực Và Tư Duy Giải Toán Lớp 11', 'Nguyễn Xuân Mai', 'Dân Trí', 2024, 7, 14, 139.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Phát Triển Năng Lực Và Tư Duy Giải Toán Lớp 11\n\nCác em học sinh thân mến!\n\nMột trong những điểm nổi bật của chương trình giáo dục phổ thông 2018 là chú trọng đến việc hình thành và phát triển năng lực toán học, nhấn mạnh đến ứng dụng của toán học trong các bộ môn khoa học khác và trong thực tiễn. Do đó, việc nâng cao năng lực tư duy giải toán ở cấp trung học phổ thông rất cần thiết.\n\nTrên tay các em là cuốn Nâng cao năng lực tư duy giải toán lớp 11. Cuốn sách gồm 2 mạch nội dung chính là=> Đại số, giải tích và Hình học không gian. Cuốn sách là sự tổng hợp - hệ thống hóa của 3 bộ sách Kết nối tri thức với cuộc sống, Chân trời sáng tạo và Cánh Diều. Do đó, cuốn sách hội tụ đầy đủ các dạng toán từ cơ bản đến nâng cao, số lượng bài tập phong phú, đa dạng và cách giải đơn giản, sáng tạo, ngắn gọn, dễ hiểu.\n\nVới mục tiêu tiết kiệm thời gian và đem lại hiệu quả học tập cao, tác giả hi vọng cuốn sách sẽ mang lại cho các em những giờ học bổ ích, lí thú.\n\nThay cho lời kết, tác giả xin gửi lời cảm ơn chân thành và sâu sắc đến bạn Trần Hữu Trang - người trực tiếp khích lệ và tạo ra ý tưởng để tôi biên soạn cuốn tài liệu này; các bạn Trần Lâm, Phạm Hùng Vương, Huyền Diệu, Thanh Minh..., đã giúp đỡ tôi trong việc hoàn thiện bản thảo; bạn Bùi Thông đã đồng hành cùng tôi trong công tác dựng video bài giảng.\n\nTrong lần xuất bản đầu tiên, mặc dù cố gắng nhưng do năng lực cá nhân còn hạn chế. Tài liệu có thể còn nhiều thiếu sót. Tác giả mong chờ sự góp ý, bổ sung từ các em học sinh và độc giả để lần tái bản sau được tốt hơn. \n\nChúc các em học tốt môn học này!</p></div>', '7.19.jpg', NULL, 1),
(202, 'Tự Học Toán Học 11 - Tập 1 (Theo Chương Trình Sách Giáo Khoa Mới)', 'Lê Văn Tuấn', 'Dân Trí', 2024, 7, 14, 159000.00, 0, 100, '<div class=\'container-fluid product-description-wrapper\'><p>Tự Học Toán Học 11 - Tập 1 (Theo Chương Trình Sách Giáo Khoa Mới)\n\nNhận thấy được những khó khăn mà các bạn học sinh gặp phải trong quá trình tìm kiếm tài liệu, chọn lọc thông tin, kiến thức, cũng như tầm quan trọng của việc học và tự học môn Toán tác giả đã biên soạn bộ sách=> TỰ HỌC TOÁN HỌC LỚP 11 theo chương trình sách giáo khoa mới gồm 2 quyển là tập và tập 2.\n\nSách có hệ thống kiến thức và video bài giảng theo chương trình SGK mới; Đầy đủ các dạng thức câu hỏi mới của Bộ GD&ĐT;\n\nBài tập có lời giải chi tiết dạng text kết hợp video theo mã ID.</p></div>', '7.20.jpg', NULL, 1),
(203, 'Nuôi Dưỡng Trí Tuệ Cảm Xúc Cho Trẻ', 'Anne Lane (Dịch giả=> Thảo Li)', 'NXB Phụ Nữ', 2024, 5, 9, 92.00, 20, 100, '', '5.6.png', NULL, 1),
(204, 'Phép Thuật Trong Nuôi Dạy Trẻ', 'Karen Shaw (Dịch giả=> Nguyệt Ngọc)', 'NXB Phụ Nữ Việt Nam', 2023, 5, 9, 72.00, 20, 100, '', '5.10.png', NULL, 1),
(205, 'Không Gia Đình Nào Hoàn Hảo', 'Lucy Blake (Dịch giả=> Hải Phượng)', 'NXB Phụ Nữ', 2024, 5, 9, 88.00, 20, 100, '', '5.3.png', NULL, 1),
(206, 'Bước Vào Thế Giới Cảm Xúc Bé Nhỏ Của Trẻ', 'Cam Khai Toàn (Dịch giả=> Quỳnh Phương)', 'NXB Phụ nữ Việt Nam', 2023, 5, 9, 56.00, 20, 100, '', '5.9.png', NULL, 1),
(207, 'Combo Phát Triển Trí Thông Minh Cảm Xúc (4 Cuốn)', 'Anne Lane, Rebecca Rolland, Cam Khải Toàn, Alice Eaton', 'NXB Minh Long', 2023, 5, 9, 339.00, 25, 100, '', '5.6.png', NULL, 1),
(208, 'Giáo Dục Giới Tính Cho Con Trai', 'Scott Todnem (Dịch giả=> Hải Phong)', 'NXB Phụ Nữ Việt Nam', 2024, 5, 9, 72.00, 20, 100, '', '5.4.png', NULL, 1),
(209, 'Vượt Qua Âu Lo Khi Làm Cha Mẹ', 'Debra Kissen, Micah Ioffe, Hannah Romain (Dịch giả=> Bùi Minh Chiến)', 'NXB Phụ Nữ Việt Nam', 2023, 5, 9, 108.00, 20, 100, '', '5.1.png', NULL, 1),
(210, 'Những Bài Học Nuôi Dạy Con Độc Đáo Từ Khắp Thế Giới', 'Christine Gross-Loh (Dịch giả=> Trần Mai Loan)', 'NXB Phụ Nữ Việt Nam', 2023, 5, 9, 116.00, 20, 100, '', '5.8.png', NULL, 1),
(211, 'Giáo Dục Giới Tính Cho Con Gái', 'Vanessa Osage (Dịch giả=> Hải Phong)', 'NXB Phụ Nữ Việt Nam', 0, 5, 10, 72.00, 20, 6, '', '5.4.png', NULL, 1),
(212, 'Cha Mẹ Tỉnh Thức', 'Yehudis Smith (Dịch giả=> Bình An)', 'NXB Phụ nữ Việt Nam', 2023, 5, 10, 64.00, 20, 100, '', '5.11.png', NULL, 1),
(213, 'Phương Pháp Giáo Dục Con Của Người Do Thái', 'Hà Minh (Biên soạn)', 'NXB Phụ nữ Việt Nam', 2022, 5, 10, 68.00, 20, 100, '', '5.17.png', NULL, 1),
(214, 'Phương Pháp Giáo Dục Montessori - Phương Pháp Giáo Dục Tối Ưu Dành Cho Trẻ 0-6 Tuổi', 'Ngô Hiếu Huy', 'NXB Phụ Nữ Việt Nam', 2022, 5, 10, 61.00, 20, 100, '', '5.19.png', NULL, 1),
(215, 'Giáo Dục Giới Tính Cho Trẻ Thực Ra Rất Đơn Giản', 'Lớp Học Nhí Thông Thái (Biên soạn=> Phạm Hồng Yến)', 'Nhà Xuất Bản Phụ Nữ Việt Nam', 2022, 5, 10, 64.00, 20, 100, '', '5.14.png', NULL, 1),
(216, 'Tri Thức Cho Một Thai Kỳ Khỏe Mạnh', 'Châu Nguyên (Biên soạn)', 'NXB Phụ Nữ Việt Nam', 2022, 5, 10, 140.00, 20, 100, '', '5.15.png', NULL, 1),
(217, 'Nghe Mẹ Nói Này Con Gái', 'Điệu Hoa (Dịch giả=> Tuệ Văn)', 'NXB Phụ nữ Việt Nam', 2022, 5, 10, 68.00, 20, 100, '', '5.18.png', NULL, 1),
(218, 'Dạy Con Những Bài Học Về Tiền Bạc', 'Phú Gia Ích (Dịch giả=> Phạm Hồng Yến)', 'NXB Phụ nữ Việt Nam', 2022, 5, 10, 68.00, 20, 100, '', '5.12.png', NULL, 1),
(219, 'Combo Bí Quyết Làm Bạn Cùng Con Gái Khi Đến Tuổi Dậy Thì (4 Cuốn)', 'Nhiêu tác giả (Dịch giả=> Nhiêu dịch giả)', 'NXB Phụ Nữ', 2023, 5, 10, 258.00, 25, 100, '', '5.20.png', NULL, 1),
(220, 'Tự Tay Làm Trò Chơi Giáo Dục Sớm Dành Cho Bé Yêu 0 - 3 Tuổi', 'An Tiêu', 'NXB Phụ Nữ Việt Nam', 2022, 5, 10, 55.00, 20, 100, '', '5.16.png', NULL, 1),
(221, 'Sách=> Cuộc Phiêu Lưu Của Thuyền Trưởng Corcoran', 'Alfred Assollant (Dịch giả=> Mai Hương)', 'NXB Văn Học', 2017, 6, 11, 59.00, 20, 100, '', '6.1.png', NULL, 1),
(222, 'Sách=> Tiểu Thuyết Tắt Đèn - Ngô Tất Tố (Tái Bản)', 'Ngô Tất Tố', 'Văn học', 2022, 6, 11, 40.00, 20, 100, '', '6.2.png', NULL, 1),
(223, 'Sách=> Tập Truyện Ngắn Chí Phèo - Nam Cao (Tái Bản)', 'Nam Cao', 'Văn học', 2022, 6, 11, 40.00, 20, 100, '', '6.3.png', NULL, 1),
(224, 'Sách=> Truyện Kiều - Nguyễn Du (Tái Bản)', 'tacgia_Nguyễn Du', 'Văn học', 2022, 6, 11, 54.00, 20, 100, '', '6.4.png', NULL, 1),
(225, 'Sách=> Tập Truyện Ngắn Vợ Nhặt - Kim Lân (Tái Bản)', 'Kim Lân', 'Văn học', 2022, 6, 11, 48.00, 20, 100, '', '6.5.png', NULL, 1),
(226, 'Sách=> Ivanhoe', 'Sir Walter Scott (Dịch giả=> Trần Kiêm)', 'NXB Văn Học', 2018, 6, 11, 112.00, 20, 100, '', '6.6.png', NULL, 1),
(227, 'Sách=> Tập Truyện Ngắn Đời Thừa - Nam Cao (Tái Bản)', 'Nam Cao', 'Văn học', 2022, 6, 11, 33.00, 20, 100, '', '6.7.png', NULL, 1),
(228, 'Sách=> Tiểu Thuyết Số Đỏ - Vũ Trọng Phụng (Tái Bản)', 'Vũ Trọng Phụng', 'Văn học', 2022, 6, 11, 50.00, 20, 100, '', '6.8.png', NULL, 1),
(229, 'Sách=> Tuyển Tập Nam Cao (Tái Bản)', 'Nam Cao', 'Văn học', 2023, 6, 11, 124.00, 20, 100, '', '6.9.png', NULL, 1),
(230, 'Sách=> Tiểu Thuyết Làm Đĩ - Vũ Trọng Phụng (TB)', 'Vũ Trọng Phụng', 'Văn học', 2022, 6, 11, 45.00, 20, 100, '', '6.10.png', NULL, 1),
(231, 'Sách=> Gió Lạnh Đầu Mùa - Thạch Lam (Tái Bản)', 'Thạch Lam', 'Văn học', 2022, 6, 12, 44.00, 20, 100, '', '6.11.png', NULL, 1),
(232, 'Sách=> Hà Nội 36 Phố Phường (Tái Bản)', 'Thạch Lam', 'Văn học', 2022, 6, 12, 40.00, 20, 100, '', '6.12.png', NULL, 1),
(233, 'Sách=> Giông Tố - Vũ Trọng Phụng (Tái Bản)', 'Vũ Trọng Phụng', 'Văn học', 2022, 6, 12, 68.00, 20, 100, '', '6.13.png', NULL, 1),
(234, 'Sách=> Hai Vạn Dặm Dưới Biển (Tái Bản)', 'Jules Verne (dịch giả=> Đỗ Ca Sơn)', 'NXB Văn học', 2022, 6, 12, 81.00, 20, 100, '', '6.14.png', NULL, 1),
(235, 'Sách=> Ông Già Và Biển Cả (Tái Bản)', 'E. Hemingway (dịch giả=> Lê Huy Bắc)', 'NXB Văn học', 2022, 6, 12, 33.00, 20, 100, '', '6.15.png', NULL, 1),
(236, 'Sách=> Chiếc Lá Cuối Cùng - O. Henry (Tái Bản)', 'O. Henry (dịch giả=> Nhiều người dịch)', 'NXB Văn học', 2022, 6, 12, 76.00, 20, 100, '', '6.16.png', NULL, 1),
(237, 'Sách=> Chữ A Màu Đỏ', 'Nathaniel Hawthorne (dịch giả=> Lâm Hoài)', 'NXB Văn học', 2017, 6, 12, 55.00, 20, 100, '', '6.17.png', NULL, 1),
(238, 'Sách=> Nhật Ký Trong Tù - Hồ Chí Minh (Tái Bản)', 'Hồ Chí Minh', 'Văn học', 2022, 6, 12, 64.00, 20, 100, '', '6.18.png', NULL, 1),
(239, 'Sách=> Những Cuộc Phiêu Lưu Của Sherlock Holmes (Tái Bản)', 'Arthur Conan Doyle (dịch giả=> Nhiều người dịch)', 'NXB Văn học', 2022, 6, 12, 63.00, 20, 100, '', '6.19.png', NULL, 1),
(240, 'Sách=> Tuyển Tập Thạch Lam (Tái Bản)', 'Thạch Lam', 'Văn học', 2023, 6, 12, 116.00, 20, 100, '', '6.20.png', NULL, 1),
(241, 'Mê cung phát triển tư duy', 'Hoàng Việt dịch', 'Nhà Xuất Bản Phụ Nữ', 2017, 1, 1, 50000.00, 5, 100, '<div class=\"container-fluid product-description-wrapper\"><p>Sách giúp trẻ phát triển tư duy sáng tạo thông qua các bài tập mê cung thú vị. Nội dung được thiết kế để kích thích trí tưởng tượng và khả năng giải quyết vấn đề của trẻ. Với hình ảnh minh họa sinh động và các thử thách đa dạng, cuốn sách không chỉ mang lại niềm vui mà còn giúp trẻ rèn luyện tư duy logic và sự tập trung.</p></div>', 'mamnon1.jpg', NULL, 1),
(242, 'Các hoạt động giúp trẻ làm quen với chữ viết', 'Nguyễn Minh Thảo', 'Nhà Xuất Bản Giáo Dục Việt Nam', 2018, 1, 1, 55000.00, 10, 90, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách cung cấp các hoạt động thú vị giúp trẻ làm quen với chữ cái thông qua hình ảnh minh họa và bài tập thực hành. Nội dung được biên soạn phù hợp với lứa tuổi mầm non, giúp trẻ phát triển kỹ năng viết và nhận biết mặt chữ một cách tự nhiên. Đây là tài liệu hữu ích cho các bậc phụ huynh và giáo viên trong việc hỗ trợ trẻ học tập.</p></div>', 'mamnon2.jpg', NULL, 1),
(243, 'Tô màu', 'Phạm Ngọc Điệp', 'Nhà Xuất Bản Dân Trí', 2024, 1, 1, 52000.00, 7, 95, '<div class=\"container-fluid product-description-wrapper\"><p>Sách tô màu giúp trẻ phát triển khả năng nhận biết màu sắc và rèn luyện sự khéo léo của đôi tay. Với các hình vẽ đa dạng và chủ đề phong phú, cuốn sách mang đến những giờ phút thư giãn và sáng tạo cho trẻ. Đây là một công cụ tuyệt vời để khơi dậy niềm yêu thích nghệ thuật và khả năng sáng tạo từ sớm.</p></div>', 'mamnon3.jpg', NULL, 1),
(244, 'Kỹ năng sống giúp trẻ phát triển', 'Lam Phương', 'Nhà Xuất Bản Văn Học', 2024, 1, 1, 53000.00, 6, 98, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách cung cấp các bài học kỹ năng sống cơ bản, giúp trẻ phát triển khả năng giao tiếp và ứng xử trong cuộc sống hàng ngày. Nội dung được trình bày qua các câu chuyện ngắn và bài tập thực hành, giúp trẻ dễ dàng tiếp thu và áp dụng. Đây là tài liệu hữu ích để xây dựng nền tảng kỹ năng sống vững chắc cho trẻ.</p></div>', 'mamnon4.jpg', NULL, 1),
(245, 'Số Đếm', 'Gakken', 'Nhà Xuất Bản Văn học-Văn nghệ', 2024, 1, 1, 54000.00, 8, 97, '<div class=\"container-fluid product-description-wrapper\"><p>Sách học số đếm qua hình ảnh sinh động, giúp trẻ làm quen với các con số từ 1 đến 10. Nội dung được thiết kế với các bài tập thực hành thú vị, giúp trẻ phát triển tư duy toán học cơ bản và khả năng nhận biết số lượng. Đây là tài liệu học tập bổ ích dành cho trẻ trong giai đoạn đầu học tập.</p></div>', 'mamnon5.jpg', NULL, 1),
(246, 'Phát triển rèn luyện tư duy não bộ', 'Hoàng Dương dịch', 'Nhà Xuất Bản Phụ Nữ Việt Nam', 2017, 1, 1, 55000.00, 7, 96, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách tập trung vào việc phát triển khả năng tư duy logic và sáng tạo của trẻ thông qua các bài tập và trò chơi trí tuệ. Nội dung được biên soạn bởi các chuyên gia giáo dục, giúp trẻ rèn luyện kỹ năng phân tích, giải quyết vấn đề và tư duy sáng tạo. Đây là một lựa chọn tuyệt vời để kích thích sự phát triển trí não của trẻ.</p></div>', 'mamnon6.jpg', NULL, 1),
(247, 'Chơi cùng các hình khối hình vuông, hình chữ nhật và tam giác', 'Kawa', 'Nhà Xuất Bản Phụ Nữ Việt Nam', 2024, 1, 1, 56000.00, 5, 95, '<div class=\"container-fluid product-description-wrapper\"><p>Sách giúp trẻ nhận biết các hình khối cơ bản như hình vuông, hình chữ nhật và tam giác thông qua các bài tập thực hành và trò chơi thú vị. Nội dung được thiết kế để kích thích trí tưởng tượng và khả năng nhận biết hình học của trẻ. Đây là tài liệu hữu ích để hỗ trợ trẻ trong giai đoạn đầu học tập.</p></div>', 'mamnon7.jpg', NULL, 1),
(248, 'Bé nhận biết thế giới xung quanh-Động vật nuôi', 'Linh Linh', 'Nhà Xuất Bản Văn Học', 2024, 1, 1, 57000.00, 6, 94, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách giới thiệu các loài động vật nuôi quen thuộc trong cuộc sống hàng ngày, giúp trẻ nhận biết và hiểu thêm về thế giới xung quanh. Với hình ảnh minh họa sinh động và thông tin thú vị, cuốn sách không chỉ mang lại kiến thức mà còn khơi dậy tình yêu thiên nhiên ở trẻ.</p></div>', 'mamnon8.jpg', NULL, 1),
(249, 'Su Su nhận biết phương tiện giao thông', 'Trần Ngọc Bảo Hân', 'Nhà Xuất Bản Đồng Nai', 2020, 1, 1, 58000.00, 7, 93, '<div class=\"container-fluid product-description-wrapper\"><p>Sách giúp trẻ nhận biết các phương tiện giao thông phổ biến như xe đạp, ô tô, xe máy, tàu hỏa và máy bay. Nội dung được trình bày qua các hình ảnh minh họa và câu chuyện ngắn, giúp trẻ dễ dàng tiếp thu và ghi nhớ. Đây là tài liệu bổ ích để trẻ hiểu thêm về thế giới xung quanh.</p></div>', 'mamnon9.jpg', NULL, 1),
(250, 'Hương của mùa xuân', 'Jian', 'Nhà Xuất Bản Hà Nội', 2024, 1, 1, 59000.00, 8, 92, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách giới thiệu về các mùa trong năm, đặc biệt là mùa xuân, với những hình ảnh và câu chuyện đầy màu sắc. Nội dung giúp trẻ nhận biết các đặc điểm của mùa xuân, từ hoa lá, thời tiết đến các hoạt động đặc trưng. Đây là tài liệu tuyệt vời để trẻ khám phá và yêu thích thiên nhiên.</p></div>', 'mamnon10.jpg', NULL, 1),
(251, 'Bách khoa về rau củ và trái cây', 'Trần Giang Sơn dịch', 'Nhà Xuất Bản Hà Nội', 2024, 1, 2, 60000.00, 5, 91, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách là một bách khoa toàn thư nhỏ gọn, giúp trẻ nhận biết các loại rau củ và trái cây thông qua hình ảnh minh họa sinh động và thông tin thú vị. Nội dung được trình bày dễ hiểu, phù hợp với trẻ nhỏ, giúp trẻ phát triển khả năng nhận biết và yêu thích các loại thực phẩm tự nhiên. Đây là tài liệu hữu ích để khơi dậy sự tò mò và tình yêu thiên nhiên ở trẻ.</p></div>', 'mamnon11.jpg', NULL, 1),
(252, 'Em nhận biết các loài hoa', 'Sandra Lebrun', 'Nhà Xuất Bản Trẻ', 2024, 1, 2, 61000.00, 6, 90, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách giới thiệu các loài hoa phổ biến với hình ảnh minh họa đẹp mắt và thông tin thú vị. Nội dung được thiết kế để giúp trẻ nhận biết các loài hoa, từ màu sắc, hình dáng đến đặc điểm nổi bật. Đây là tài liệu tuyệt vời để trẻ khám phá thế giới thực vật và phát triển tình yêu thiên nhiên.</p></div>', 'mamnon12.jpg', NULL, 1),
(253, 'Làm quen nhận biết nghề nghiệp 3', 'Hòa Bình', 'Nhà Xuất Bản Thời Đại', 2024, 1, 2, 62000.00, 7, 89, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách giúp trẻ làm quen với các nghề nghiệp phổ biến thông qua hình ảnh minh họa và các câu chuyện ngắn. Nội dung được thiết kế để trẻ dễ dàng hiểu và ghi nhớ, từ đó phát triển nhận thức về các công việc trong xã hội. Đây là tài liệu hữu ích để khơi dậy sự tò mò và định hướng nghề nghiệp cho trẻ từ sớm.</p></div>', 'mamnon13.jpg', NULL, 1),
(254, 'Bách khoa toàn thư cho bé - Đồ vật trong gia đình', 'Bảo Thư', 'Nhà Xuất Bản Hồng Đức', 2024, 1, 2, 63000.00, 8, 88, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách giới thiệu các đồ vật quen thuộc trong gia đình, từ bàn ghế, tủ lạnh đến các vật dụng nhỏ như thìa, dĩa. Với hình ảnh minh họa sinh động và thông tin dễ hiểu, cuốn sách giúp trẻ nhận biết và hiểu thêm về môi trường sống xung quanh. Đây là tài liệu bổ ích để trẻ phát triển nhận thức và kỹ năng quan sát.</p></div>', 'mamnon14.jpg', NULL, 1),
(255, 'Nhận biết những hình cơ bản', 'Phương Huỳnh dịch', 'Nhà Xuất Bản Hồng Đức', 2024, 1, 2, 64000.00, 6, 87, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách giúp trẻ nhận biết các hình học cơ bản như hình vuông, hình tròn, hình tam giác và hình chữ nhật. Nội dung được trình bày qua các bài tập thực hành và trò chơi thú vị, giúp trẻ phát triển tư duy hình học và khả năng quan sát. Đây là tài liệu học tập bổ ích dành cho trẻ trong giai đoạn đầu học tập.</p></div>', 'mamnon15.jpg', NULL, 1),
(256, 'Cảm xúc của con màu gì', 'Jayneen Sanders', 'Nhà Xuất Bản Dân Trí', 2024, 1, 2, 65000.00, 7, 86, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách giúp trẻ nhận biết và hiểu các loại cảm xúc như vui, buồn, giận dữ, sợ hãi. Nội dung được trình bày qua các câu chuyện ngắn và hình ảnh minh họa sinh động, giúp trẻ dễ dàng tiếp thu và học cách quản lý cảm xúc của mình. Đây là tài liệu hữu ích để phát triển trí tuệ cảm xúc cho trẻ.</p></div>', 'mamnon16.jpg', NULL, 1),
(257, 'Thư viện của bé - Nhận biết thời tiết', 'Hồng Vân', 'Nhà Xuất Bản Mỹ Thuật', 2011, 1, 2, 66000.00, 8, 85, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách giới thiệu các loại thời tiết như nắng, mưa, gió, tuyết thông qua hình ảnh minh họa và các câu chuyện ngắn. Nội dung giúp trẻ nhận biết và hiểu thêm về các hiện tượng tự nhiên, từ đó phát triển nhận thức về môi trường xung quanh. Đây là tài liệu bổ ích để trẻ khám phá thế giới tự nhiên.</p></div>', 'mamnon17.jpg', NULL, 1),
(258, 'Sách âm thanh - Các loại nhạc cụ', 'Khánh Vân', 'Nhà Xuất Bản Hà Nội', 2024, 1, 2, 67000.00, 6, 84, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách giới thiệu các loại nhạc cụ phổ biến như đàn piano, guitar, trống, sáo. Với hình ảnh minh họa đẹp mắt và thông tin thú vị, cuốn sách giúp trẻ nhận biết âm thanh và đặc điểm của từng loại nhạc cụ. Đây là tài liệu tuyệt vời để khơi dậy niềm yêu thích âm nhạc ở trẻ.</p></div>', 'mamnon18.jpg', NULL, 1),
(259, 'Cùng đi ngủ khì nào', 'Quỳnh Trang - Thảo Nguyễn', 'Nhà Xuất Bản Dân Trí', 2024, 1, 2, 68000.00, 7, 83, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách giúp trẻ nhận biết các hoạt động trước khi đi ngủ thông qua các câu chuyện ngắn và hình ảnh minh họa đáng yêu. Nội dung được thiết kế để tạo thói quen tốt cho trẻ, từ việc đánh răng, thay đồ ngủ đến việc đọc sách trước khi đi ngủ. Đây là tài liệu hữu ích để xây dựng nếp sống lành mạnh cho trẻ.</p></div>', 'mamnon19.jpg', NULL, 1),
(260, 'Nuôi dưỡng trí tuệ cảm xúc cho trẻ', 'Anne Lane', 'Nhà Xuất Bản Phụ Nữ Việt Nam', 2024, 1, 2, 69000.00, 8, 82, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách tập trung vào việc phát triển trí tuệ cảm xúc cho trẻ thông qua các bài học và câu chuyện thực tế. Nội dung giúp trẻ nhận biết và quản lý cảm xúc, từ đó xây dựng các mối quan hệ tích cực với bạn bè và gia đình. Đây là tài liệu hữu ích để hỗ trợ trẻ phát triển toàn diện.</p></div>', 'mamnon20.jpg', NULL, 1),
(261, 'Giáo dục nhân cách cho trẻ - Học cách tha thứ', 'Watiek Ideo', 'Nhà Xuất Bản Thanh Niên', 2024, 2, 3, 70000.00, 10, 95, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách truyện tranh giáo dục nhân cách, tập trung vào bài học về lòng tha thứ. Nội dung được trình bày qua các câu chuyện ngắn gọn, dễ hiểu, giúp trẻ học cách cảm thông và tha thứ cho người khác. Đây là tài liệu bổ ích để xây dựng nhân cách tốt đẹp cho trẻ.</p></div>', 'thieunhi21.jpg', NULL, 1),
(262, 'Những câu chuyện về tình bạn', 'Nhiều tác giả', 'Nhà Xuất Bản Trẻ', 2022, 2, 3, 72000.00, 8, 90, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách tập hợp những câu chuyện cảm động về tình bạn, giúp trẻ hiểu giá trị của sự sẻ chia, đồng cảm và gắn bó. Với hình ảnh minh họa sinh động và nội dung ý nghĩa, cuốn sách là món quà tuyệt vời để trẻ học cách xây dựng và duy trì tình bạn đẹp.</p></div>', 'thieunhi22.jpg', NULL, 1),
(263, 'Những câu chuyện phiêu lưu kỳ thú', 'Trịnh Minh Thanh', 'Nhà Xuất Bản Dân Trí', 2024, 2, 3, 75000.00, 5, 85, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách kể về những chuyến phiêu lưu kỳ thú của các nhân vật thiếu nhi, giúp trẻ khám phá thế giới qua những câu chuyện hấp dẫn. Nội dung được trình bày sinh động, kích thích trí tưởng tượng và sự tò mò của trẻ. Đây là tài liệu tuyệt vời để trẻ học hỏi và giải trí.</p></div>', 'thieunhi23.jpg', NULL, 1),
(264, 'Truyện cổ tích về lòng dũng cảm', 'Phúc Hải', 'Nhà Xuất Bản Hồng Đức', 2024, 2, 3, 73000.00, 6, 88, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách tập hợp những câu chuyện cổ tích về lòng dũng cảm, giúp trẻ hiểu giá trị của sự kiên cường và lòng can đảm. Nội dung được trình bày qua các câu chuyện ý nghĩa, giúp trẻ học cách đối mặt với khó khăn và vượt qua thử thách trong cuộc sống.</p></div>', 'thieunhi24.jpg', NULL, 1),
(265, 'Mật ngữ rừng xanh', 'Lê Hữu Nam', 'Nhà Xuất Bản Dân Trí', 2024, 2, 3, 74000.00, 7, 87, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách kể về những câu chuyện thú vị trong rừng xanh, giúp trẻ khám phá thế giới động vật và thiên nhiên. Nội dung được trình bày qua các câu chuyện hấp dẫn và hình ảnh minh họa đẹp mắt, khơi dậy tình yêu thiên nhiên và ý thức bảo vệ môi trường ở trẻ.</p></div>', 'thieunhi25.jpg', NULL, 1),
(266, 'Truyện cổ tích về lòng hiếu thảo', 'Phúc Hải', 'Nhà Xuất Bản Hồng Đức', 2024, 2, 3, 76000.00, 8, 86, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách tập hợp những câu chuyện cổ tích về lòng hiếu thảo, giúp trẻ hiểu giá trị của tình yêu thương và sự biết ơn đối với cha mẹ, ông bà. Nội dung ý nghĩa và hình ảnh minh họa sinh động giúp trẻ dễ dàng tiếp thu và học hỏi.</p></div>', 'thieunhi26.jpg', NULL, 1),
(267, 'Động vật kỳ thú - Vương quốc khủng long', 'Bảo tàng khoa học Dolphin Media', 'Nhà Xuất Bản Kim Đồng', 2024, 2, 3, 77000.00, 5, 85, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách đưa trẻ vào thế giới kỳ thú của các loài khủng long, từ những loài ăn cỏ hiền lành đến những loài ăn thịt hung dữ. Với hình ảnh minh họa sống động và thông tin khoa học thú vị, cuốn sách là tài liệu tuyệt vời để trẻ khám phá thế giới động vật cổ đại.</p></div>', 'thieunhi27.jpg', NULL, 1),
(268, 'Những câu chuyện về lòng trung thực', 'Nhiều tác giả', 'Nhà Xuất Bản Trẻ', 2024, 2, 3, 78000.00, 6, 84, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách tập hợp những câu chuyện ý nghĩa về lòng trung thực, giúp trẻ hiểu giá trị của sự thật thà và lòng tin. Nội dung được trình bày qua các câu chuyện ngắn gọn, dễ hiểu, giúp trẻ học cách sống trung thực và đáng tin cậy.</p></div>', 'thieunhi28.jpg', NULL, 1),
(269, 'Bé học cách xin trợ giúp', 'Watiek Ideo - Nindia Maya', 'Nhà Xuất Bản Thanh Niên', 2024, 2, 3, 79000.00, 7, 83, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách truyện tranh giáo dục trẻ cách xin trợ giúp khi gặp khó khăn. Nội dung được trình bày qua các câu chuyện ngắn và hình ảnh minh họa sinh động, giúp trẻ học cách giao tiếp và tìm kiếm sự hỗ trợ từ người lớn hoặc bạn bè.</p></div>', 'thieunhi29.jpg', NULL, 1),
(270, 'Truyện cổ tích hay về tính kiên trì và lòng dũng cảm', 'Chí Thành', 'Nhà Xuất Bản Lao Động', 2024, 2, 3, 80000.00, 8, 82, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách tập hợp những câu chuyện cổ tích hay về tính kiên trì và lòng dũng cảm, giúp trẻ hiểu giá trị của sự bền bỉ và lòng can đảm. Nội dung ý nghĩa và hình ảnh minh họa đẹp mắt giúp trẻ học hỏi và phát triển nhân cách tốt đẹp.</p></div>', 'thieunhi30.jpg', NULL, 1),
(271, 'Tranh truyện danh nhân lịch sử Việt Nam-Trần Quốc Toản', 'Đỗ Biên Thùy', 'Nhà Xuất Bản Trẻ', 2024, 2, 4, 81000.00, 5, 81, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách là một phần trong bộ tranh truyện danh nhân lịch sử Việt Nam, kể về cuộc đời và những chiến công của Trần Quốc Toản - một thiếu niên anh hùng trong lịch sử dân tộc. Với hình ảnh minh họa sống động và nội dung dễ hiểu, cuốn sách giúp trẻ hiểu thêm về lòng yêu nước, tinh thần dũng cảm và sự hy sinh vì đất nước. Đây là tài liệu bổ ích để giáo dục lịch sử và truyền cảm hứng cho thế hệ trẻ.</p></div>', 'thieunhi31.jpg', NULL, 1),
(272, 'Những câu chuyện về lòng biết ơn', 'Nhiều tác giả', 'Nhà Xuất Bản Trẻ', 2024, 2, 4, 82000.00, 6, 80, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách tập hợp những câu chuyện cảm động về lòng biết ơn, giúp trẻ hiểu giá trị của sự tri ân và lòng biết ơn đối với cha mẹ, thầy cô và những người xung quanh. Với nội dung ý nghĩa và hình ảnh minh họa sinh động, cuốn sách là món quà tuyệt vời để giáo dục trẻ về tình yêu thương và sự trân trọng những điều tốt đẹp trong cuộc sống.</p></div>', 'thieunhi32.jpg', NULL, 1),
(273, 'Những câu chuyện về phẩm chất đạo đức', 'Nhiều tác giả', 'Nhà Xuất Bản Mỹ Thuật', 2024, 2, 4, 83000.00, 7, 79, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách tập hợp những câu chuyện ngắn gọn, dễ hiểu về các phẩm chất đạo đức như trung thực, trách nhiệm, và lòng nhân ái. Nội dung được trình bày qua các câu chuyện gần gũi với cuộc sống hàng ngày, giúp trẻ dễ dàng tiếp thu và áp dụng vào thực tế. Đây là tài liệu hữu ích để giáo dục nhân cách và xây dựng nền tảng đạo đức vững chắc cho trẻ.</p></div>', 'thieunhi33.jpg', NULL, 1),
(274, 'Những câu chuyện về lòng vị tha', 'Nhiều tác giả', 'Nhà Xuất Bản Trẻ', 2024, 2, 4, 84000.00, 8, 78, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách tập hợp những câu chuyện ý nghĩa về lòng vị tha, giúp trẻ hiểu giá trị của sự tha thứ và lòng bao dung. Với hình ảnh minh họa đẹp mắt và nội dung dễ hiểu, cuốn sách là tài liệu tuyệt vời để giáo dục trẻ về cách đối xử tốt với mọi người và xây dựng các mối quan hệ tích cực trong cuộc sống.</p></div>', 'thieunhi34.jpg', NULL, 1),
(275, 'Tuyển tập truyện tranh Aesop - Ngỗng và rùa', '...', 'Nhà Xuất Bản Trẻ', 2024, 2, 4, 85000.00, 5, 77, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách nằm trong tuyển tập truyện tranh Aesop, kể lại câu chuyện ngụ ngôn nổi tiếng về ngỗng và rùa. Với hình ảnh minh họa sinh động và nội dung hài hước, cuốn sách không chỉ mang lại niềm vui mà còn giúp trẻ rút ra những bài học quý giá về sự kiên nhẫn, lòng trung thực và tinh thần hợp tác. Đây là tài liệu bổ ích để trẻ vừa học vừa chơi.</p></div>', 'thieunhi35.jpg', NULL, 1),
(276, 'Truyện con chó tên là Trung Thành', 'Luis Sepúlveda', 'Nhà Xuất Bản Hội Nhà Văn', 2024, 2, 4, 86000.00, 6, 76, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách kể về câu chuyện cảm động của một chú chó trung thành, luôn bảo vệ và đồng hành cùng chủ nhân trong mọi hoàn cảnh. Nội dung giàu cảm xúc và hình ảnh minh họa đẹp mắt giúp trẻ hiểu thêm về giá trị của lòng trung thành, tình yêu thương và sự gắn bó. Đây là tài liệu tuyệt vời để giáo dục trẻ về tình cảm và trách nhiệm.</p></div>', 'thieunhi36.jpg', NULL, 1),
(277, 'Những câu chuyện về tình bạn', 'Nhiều tác giả', 'Nhà Xuất Bản Trẻ', 2024, 2, 4, 87000.00, 7, 75, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách tập hợp những câu chuyện ý nghĩa về tình bạn, giúp trẻ hiểu giá trị của sự sẻ chia, đồng cảm và gắn bó. Với hình ảnh minh họa sinh động và nội dung gần gũi, cuốn sách là món quà tuyệt vời để trẻ học cách xây dựng và duy trì tình bạn đẹp trong cuộc sống.</p></div>', 'thieunhi37.jpg', NULL, 1),
(278, '109 câu chuyện về lòng nhân ái', 'Minh Huyền', 'Nhà Xuất Bản Hồng Đức', 2024, 2, 4, 88000.00, 8, 74, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách tập hợp 109 câu chuyện cảm động về lòng nhân ái, giúp trẻ hiểu giá trị của tình yêu thương và sự sẻ chia trong cuộc sống. Nội dung được trình bày qua các câu chuyện ngắn gọn, dễ hiểu, cùng hình ảnh minh họa đẹp mắt, giúp trẻ dễ dàng tiếp thu và học hỏi. Đây là tài liệu hữu ích để giáo dục trẻ về lòng nhân ái và trách nhiệm xã hội.</p></div>', 'thieunhi38.jpg', NULL, 1),
(279, 'Bài học thiếu nhi - Lesson for kids', 'Thích Chân Tính', 'Nhà Xuất Bản Văn Hóa - Văn Nghệ', 2024, 2, 4, 89000.00, 5, 73, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách cung cấp những bài học ý nghĩa dành cho thiếu nhi, giúp trẻ phát triển nhân cách và kỹ năng sống. Nội dung được trình bày qua các câu chuyện ngắn và bài học thực tế, giúp trẻ dễ dàng tiếp thu và áp dụng vào cuộc sống hàng ngày. Đây là tài liệu bổ ích để hỗ trợ các bậc phụ huynh và giáo viên trong việc giáo dục trẻ.</p></div>', 'thieunhi39.jpg', NULL, 1),
(280, 'Truyện cổ tích Việt Nam hay nhất', 'Ngọc Hà', 'Nhà Xuất Bản Dân Trí', 2024, 2, 4, 75000.00, 5, 85, '<div class=\"container-fluid product-description-wrapper\"><p>Cuốn sách tập hợp những câu chuyện cổ tích Việt Nam hay nhất, mang đậm giá trị văn hóa và truyền thống dân tộc. Với nội dung ý nghĩa và hình ảnh minh họa đẹp mắt, cuốn sách giúp trẻ hiểu thêm về lịch sử, văn hóa và các bài học đạo đức sâu sắc. Đây là tài liệu tuyệt vời để trẻ khám phá và yêu thích văn hóa dân gian Việt Nam.</p></div>', 'thieunhi40.jpg', NULL, 1),
(281, 'Kỹ Năng quản lí thời gian', 'Nguyễn Văn Hùng', 'NXB Kim Đồng', 2020, 3, 5, 120000.00, 10, 40, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>KỸ NĂNG QUẢN LÍ THỜI GIAN</strong></span></span></p><p> </p><p>Trong cuộc sống hiện đại, việc quản lý thời gian hiệu quả là một kỹ năng quan trọng giúp bạn cân bằng giữa công việc, học tập và cuộc sống cá nhân. Nhiều người thường cảm thấy áp lực vì không thể hoàn thành công việc đúng hạn, dẫn đến căng thẳng và giảm hiệu suất. Do đó, việc rèn luyện kỹ năng quản lý thời gian là điều cần thiết để đạt được sự thành công và hạnh phúc.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>KỸ NĂNG QUẢN LÍ THỜI GIAN</strong> sẽ giúp bạn rèn luyện tư duy logic và kỹ năng mềm, từ đó xây dựng thói quen quản lý thời gian hiệu quả, giúp bạn tối ưu hóa năng suất và đạt được mục tiêu trong cuộc sống.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kynang41.jpg', NULL, 1),
(282, 'Kỹ Năng giao tiếp ứng xử', 'Trần Thị Lan', 'NXB Trẻ', 2019, 3, 5, 125000.00, 15, 45, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>KỸ NĂNG GIAO TIẾP ỨNG XỬ</strong></span></span></p><p> </p><p>Trong xã hội hiện đại, kỹ năng giao tiếp và ứng xử đóng vai trò quan trọng trong việc xây dựng các mối quan hệ và thành công trong công việc. Nhiều người gặp khó khăn trong việc diễn đạt ý tưởng hoặc xử lý các tình huống xã hội, dẫn đến hiểu lầm và mất cơ hội. Do đó, việc rèn luyện kỹ năng giao tiếp là điều cần thiết để tạo dựng sự tự tin và kết nối hiệu quả.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>KỸ NĂNG GIAO TIẾP ỨNG XỬ</strong> sẽ giúp bạn phát triển kỹ năng giao tiếp và làm việc nhóm, từ đó cải thiện khả năng kết nối với mọi người và đạt được thành công trong cuộc sống.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kynang42.jpg', NULL, 1),
(283, 'Kỹ năng sinh tồn', 'Lê Minh Tuấn', 'NXB Giáo Dục', 2021, 3, 5, 130000.00, 12, 40, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>KỸ NĂNG SINH TỒN</strong></span></span></p><p> </p><p>Trong cuộc sống, việc trang bị kỹ năng sinh tồn là điều cần thiết để đối mặt với những tình huống bất ngờ, từ thiên tai đến các thử thách trong môi trường tự nhiên. Nhiều người cảm thấy lúng túng khi gặp phải những tình huống khó khăn vì thiếu kiến thức và kỹ năng cần thiết. Do đó, việc học cách sinh tồn là vô cùng quan trọng để bảo vệ bản thân và những người xung quanh.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>KỸ NĂNG SINH TỒN</strong> sẽ hỗ trợ bạn phát triển kỹ năng quản lý thời gian và tư duy logic, giúp bạn tự tin đối mặt với mọi thử thách trong cuộc sống.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kynang43.jpg', NULL, 1),
(284, 'Rèn luyện kỹ năng cho sinh viên', 'Phạm Ngọc Ánh', 'NXB Thanh Niên', 2022, 3, 5, 135000.00, 10, 35, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>RÈN LUYỆN KỸ NĂNG CHO SINH VIÊN</strong></span></span></p><p> </p><p>Đối với sinh viên, việc rèn luyện các kỹ năng mềm là yếu tố quan trọng để chuẩn bị cho hành trình học tập và sự nghiệp sau này. Nhiều bạn trẻ gặp khó khăn trong việc xây dựng thói quen tốt và phát triển bản thân, dẫn đến thiếu tự tin khi bước vào môi trường làm việc. Do đó, việc trang bị kỹ năng cần thiết là điều không thể thiếu để thành công.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>RÈN LUYỆN KỸ NĂNG CHO SINH VIÊN</strong> sẽ hướng dẫn bạn cách xây dựng thói quen tốt, từ đó giúp bạn phát triển toàn diện và sẵn sàng cho tương lai.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kynang44.jpg', NULL, 1),
(285, 'Tôi tài giỏi, bạn cũng thế', 'Hoàng Minh Đức', 'NXB Văn Học', 2018, 3, 5, 140000.00, 8, 30, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>TÔI TÀI GIỎI, BẠN CŨNG THẾ</strong></span></span></p><p> </p><p>Trong hành trình phát triển bản thân, việc cải thiện các kỹ năng mềm như thuyết trình và giao tiếp là yếu tố quan trọng giúp bạn tự tin hơn trong học tập và công việc. Nhiều người cảm thấy e ngại khi phải trình bày ý tưởng trước đám đông, dẫn đến bỏ lỡ nhiều cơ hội. Do đó, việc rèn luyện kỹ năng thuyết trình là điều cần thiết để tỏa sáng.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>TÔI TÀI GIỎI, BẠN CŨNG THẾ</strong> sẽ hướng dẫn bạn cách cải thiện kỹ năng thuyết trình, giúp bạn tự tin thể hiện bản thân và đạt được thành công trong mọi lĩnh vực.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kynang45.jpg', NULL, 1),
(286, 'Nghệ thuật giao tiếp ứng xử', 'Vũ Thị Hương', 'NXB Phụ Nữ', 2023, 3, 5, 145000.00, 5, 25, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>NGHỆ THUẬT GIAO TIẾP ỨNG XỬ</strong></span></span></p><p> </p><p>Trong cuộc sống, khả năng giao tiếp và ứng xử là chìa khóa để xây dựng các mối quan hệ bền vững và thành công trong công việc. Nhiều người gặp khó khăn trong việc kiểm soát cảm xúc, dẫn đến những hiểu lầm không đáng có. Do đó, việc học cách quản lý cảm xúc và giao tiếp hiệu quả là điều cần thiết để tạo dựng sự hài hòa.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>NGHỆ THUẬT GIAO TIẾP ỨNG XỬ</strong> sẽ giúp bạn học cách quản lý cảm xúc hiệu quả, từ đó cải thiện kỹ năng giao tiếp và xây dựng các mối quan hệ tốt đẹp.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kynang46.jpg', NULL, 1),
(287, 'Thực hành kỹ năng sống 4', 'Nguyễn Thanh Tâm', 'NXB Lao Động', 2021, 3, 5, 150000.00, 10, 20, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>THỰC HÀNH KỸ NĂNG SỐNG 4</strong></span></span></p><p> </p><p>Trong hành trình trưởng thành, việc phát triển các kỹ năng sống là yếu tố quan trọng giúp bạn tự tin đối mặt với mọi thử thách. Nhiều người trẻ cảm thấy thiếu kỹ năng lãnh đạo, dẫn đến khó khăn trong việc quản lý bản thân và làm việc nhóm. Do đó, việc rèn luyện kỹ năng sống là điều cần thiết để phát triển toàn diện.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>THỰC HÀNH KỸ NĂNG SỐNG 4</strong> sẽ giúp bạn phát triển kỹ năng lãnh đạo, từ đó tự tin dẫn dắt bản thân và người khác trên con đường thành công.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kynang47.jpg', NULL, 1),
(288, 'Soft skills', 'Lê Thị Mai', 'NXB Tổng Hợp', 2019, 3, 5, 155000.00, 15, 15, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>SOFT SKILLS</strong></span></span></p><p> </p><p>Trong cuộc sống và công việc, kỹ năng mềm (soft skills) là yếu tố quan trọng giúp bạn giải quyết các xung đột và xây dựng mối quan hệ hài hòa. Nhiều người gặp khó khăn trong việc xử lý mâu thuẫn, dẫn đến căng thẳng và mất đoàn kết. Do đó, việc rèn luyện kỹ năng mềm là điều cần thiết để thành công.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>SOFT SKILLS</strong> sẽ hướng dẫn bạn cách giải quyết xung đột, từ đó giúp bạn xây dựng các mối quan hệ bền vững và đạt được sự hài hòa trong cuộc sống.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kynang48.jpg', NULL, 1),
(289, 'Kỹ năng sống 1', 'Trần Văn Long', 'NXB Hội Nhà Văn', 2020, 3, 5, 160000.00, 20, 10, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>KỸ NĂNG SỐNG 1</strong></span></span></p><p> </p><p>Trong hành trình trưởng thành, việc xây dựng các mối quan hệ bền vững là yếu tố quan trọng giúp bạn phát triển bản thân và thành công trong cuộc sống. Nhiều người gặp khó khăn trong việc kết nối với người khác, dẫn đến cảm giác cô đơn và thiếu động lực. Do đó, việc rèn luyện kỹ năng sống là điều cần thiết để tạo dựng sự gắn kết.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>KỸ NĂNG SỐNG 1</strong> sẽ hướng dẫn bạn cách xây dựng mối quan hệ bền vững, từ đó giúp bạn tự tin kết nối và phát triển trong mọi lĩnh vực.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kynang49.jpg', NULL, 1),
(290, 'Kỹ năng quản lí cảm xúc', 'Nguyễn Thị Hồng Nhung', 'NXB Thế Giới', 2022, 3, 5, 165000.00, 10, 5, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>KỸ NĂNG QUẢN LÍ CẢM XÚC</strong></span></span></p><p> </p><p>Trong cuộc sống, việc quản lý cảm xúc là yếu tố quan trọng giúp bạn đối mặt với những thử thách và áp lực hàng ngày. Nhiều người gặp khó khăn trong việc kiểm soát cảm xúc, dẫn đến những quyết định thiếu sáng suốt. Do đó, việc rèn luyện kỹ năng quản lý cảm xúc là điều cần thiết để đạt được sự cân bằng và thành công.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>KỸ NĂNG QUẢN LÍ CẢM XÚC</strong> sẽ giúp bạn học cách tư duy sáng tạo và kiểm soát cảm xúc, từ đó tự tin đối mặt với mọi tình huống trong cuộc sống.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kynang50.jpg', NULL, 1),
(291, 'Kỹ năng đi ra ngoài', 'Phạm Văn Nam', 'NXB Kim Đồng', 2018, 3, 6, 170000.00, 5, 50, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>KỸ NĂNG ĐI RA NGOÀI</strong></span></span></p><p> </p><p>Trong cuộc sống hiện đại, việc giao tiếp và đàm phán khi ra ngoài xã hội là kỹ năng quan trọng giúp bạn xây dựng các mối quan hệ và thành công trong công việc. Nhiều người cảm thấy lúng túng khi phải thương lượng hoặc giao tiếp với người lạ. Do đó, việc rèn luyện kỹ năng đàm phán là điều cần thiết để tự tin hơn.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>KỸ NĂNG ĐI RA NGOÀI</strong> sẽ giúp bạn phát triển kỹ năng đàm phán, từ đó tự tin giao tiếp và đạt được mục tiêu trong các tình huống xã hội.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kynang51.jpg', NULL, 1),
(292, 'Cư xử trong gia đình', 'Trần Thị Thu', 'NXB Trẻ', 2021, 3, 6, 175000.00, 10, 45, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>CƯ XỬ TRONG GIA ĐÌNH</strong></span></span></p><p> </p><p>Trong cuộc sống gia đình, việc ứng xử đúng mực là yếu tố quan trọng giúp duy trì sự hòa thuận và hạnh phúc. Nhiều người gặp khó khăn trong việc làm việc hiệu quả dưới áp lực gia đình, dẫn đến căng thẳng và mâu thuẫn. Do đó, việc rèn luyện kỹ năng cư xử là điều cần thiết để xây dựng một gia đình êm ấm.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>CƯ XỬ TRONG GIA ĐÌNH</strong> sẽ hướng dẫn bạn cách làm việc hiệu quả dưới áp lực, từ đó giúp bạn xây dựng mối quan hệ gia đình bền vững và hạnh phúc.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kynang52.jpg', NULL, 1),
(293, 'Kỹ năng viết báo cáo hiệu quả', 'Lê Văn Bình', 'NXB Giáo Dục', 2020, 3, 6, 180000.00, 15, 40, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>KỸ NĂNG VIẾT BÁO CÁO HIỆU QUẢ</strong></span></span></p><p> </p><p>Trong học tập và công việc, kỹ năng viết báo cáo là yếu tố quan trọng giúp bạn trình bày ý tưởng một cách rõ ràng và chuyên nghiệp. Nhiều người cảm thấy thiếu tự tin khi phải viết báo cáo, dẫn đến việc truyền tải thông tin không hiệu quả. Do đó, việc rèn luyện kỹ năng viết là điều cần thiết để thành công.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>KỸ NĂNG VIẾT BÁO CÁO HIỆU QUẢ</strong> sẽ giúp bạn xây dựng sự tự tin, từ đó cải thiện khả năng viết báo cáo và trình bày ý tưởng một cách ấn tượng.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kynang53.jpg', NULL, 1),
(294, 'Kỹ năng thuyết phục trong giao tiếp', 'Nguyễn Thị Ngọc', 'NXB Thanh Niên', 2023, 3, 6, 185000.00, 20, 35, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>KỸ NĂNG THUYẾT PHỤC TRONG GIAO TIẾP</strong></span></span></p><p> </p><p>Trong cuộc sống, kỹ năng thuyết phục và giao tiếp là yếu tố quan trọng giúp bạn tạo ảnh hưởng và xây dựng mối quan hệ. Nhiều người gặp khó khăn trong việc lắng nghe và thuyết phục người khác, dẫn đến hiểu lầm và mất cơ hội. Do đó, việc rèn luyện kỹ năng giao tiếp là điều cần thiết để thành công.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>KỸ NĂNG THUYẾT PHỤC TRONG GIAO TIẾP</strong> sẽ giúp bạn học cách lắng nghe hiệu quả, từ đó cải thiện khả năng thuyết phục và xây dựng các mối quan hệ bền vững.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kynang54.jpg', NULL, 1);
INSERT INTO `sach` (`ID_Sach`, `Ten_Sach`, `Tac_Gia`, `Ten_Nha_Xuat_Ban`, `Nam_Xuat_Ban`, `ID_DanhMuc`, `ID_TheLoai`, `Gia_Ban`, `GiamGia(%)`, `So_Luong_Ton`, `Mo_Ta`, `Images`, `ID_Cart`, `TrangThai`) VALUES
(295, 'Giáo dục kỹ năng sống', 'Phạm Văn Hùng', 'NXB Văn Học', 2019, 3, 6, 190000.00, 10, 30, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>GIÁO DỤC KỸ NĂNG SỐNG</strong></span></span></p><p> </p><p>Trong hành trình trưởng thành, việc giáo dục kỹ năng sống là yếu tố quan trọng giúp bạn đối mặt với những thử thách và giải quyết vấn đề một cách hiệu quả. Nhiều người trẻ cảm thấy lúng túng khi gặp khó khăn, dẫn đến thiếu tự tin và mất phương hướng. Do đó, việc rèn luyện kỹ năng sống là điều cần thiết để phát triển toàn diện.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>GIÁO DỤC KỸ NĂNG SỐNG</strong> sẽ giúp bạn phát triển kỹ năng giải quyết vấn đề, từ đó tự tin đối mặt với mọi thử thách trong cuộc sống.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kynang55.jpg', NULL, 1),
(296, '7 Kỹ năng dọn phòng siêu đẹp', 'Trần Thị Minh', 'NXB Phụ Nữ', 2022, 3, 6, 195000.00, 5, 25, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>7 KỸ NĂNG DỌN PHÒNG SIÊU ĐẸP</strong></span></span></p><p> </p><p>Trong cuộc sống hàng ngày, việc dọn dẹp và sắp xếp không gian sống là kỹ năng quan trọng giúp bạn tạo môi trường sống gọn gàng và thoải mái. Nhiều người gặp khó khăn trong việc đặt mục tiêu và duy trì thói quen dọn dẹp, dẫn đến không gian sống lộn xộn. Do đó, việc rèn luyện kỹ năng dọn dẹp là điều cần thiết để cải thiện chất lượng cuộc sống.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>7 KỸ NĂNG DỌN PHÒNG SIÊU ĐẸP</strong> sẽ hướng dẫn bạn cách đặt mục tiêu và đạt được chúng, từ đó giúp bạn tạo ra không gian sống đẹp mắt và ngăn nắp.</p><p> </p><p>Bởi If cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kynang56.jpg', NULL, 1),
(297, 'Hài hước một chút thế giới sẽ khác đi', 'Nguyễn Văn An', 'NXB Lao Động', 2020, 3, 6, 200000.00, 10, 20, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>HÀI HƯỚC MỘT CHÚT THẾ GIỚI SẼ KHÁC ĐI</strong></span></span></p><p> </p><p>Trong cuộc sống, sự hài hước là yếu tố quan trọng giúp bạn cải thiện tâm trạng và kết nối với mọi người xung quanh. Nhiều người gặp khó khăn trong việc tập trung và ghi nhớ, dẫn đến căng thẳng và giảm hiệu quả công việc. Do đó, việc rèn luyện sự hài hước và tư duy tích cực là điều cần thiết để thay đổi cuộc sống.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>HÀI HƯỚC MỘT CHÚT THẾ GIỚI SẼ KHÁC ĐI</strong> sẽ giúp bạn cải thiện trí nhớ và sự tập trung, từ đó mang lại niềm vui và sự tích cực trong cuộc sống hàng ngày.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kynang57.jpg', NULL, 1),
(298, 'Học cách chọn lựa', 'Lê Thị Thu Hà', 'NXB Tổng Hợp', 2021, 3, 6, 205000.00, 15, 15, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>HỌC CÁCH CHỌN LỰA</strong></span></span></p><p> </p><p>Trong cuộc sống, việc đưa ra các lựa chọn đúng đắn là kỹ năng quan trọng giúp bạn quản lý stress và đạt được mục tiêu. Nhiều người cảm thấy áp lực khi phải đối mặt với những quyết định khó khăn, dẫn đến căng thẳng và mất phương hướng. Do đó, việc học cách chọn lựa là điều cần thiết để sống một cuộc đời ý nghĩa.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>HỌC CÁCH CHỌN LỰA</strong> sẽ giúp bạn học cách quản lý stress, từ đó đưa ra những quyết định sáng suốt và tự tin hơn trong cuộc sống.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kynang58.jpg', NULL, 1),
(299, 'Kỹ năng phòng chống bạo lực học đường', 'Nguyễn Văn Tâm', 'NXB Hội Nhà Văn', 2023, 3, 6, 210000.00, 20, 10, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>KỸ NĂNG PHÒNG CHỐNG BẠO LỰC HỌC ĐƯỜNG</strong></span></span></p><p> </p><p>Trong môi trường học đường, việc phòng chống bạo lực là kỹ năng quan trọng giúp học sinh phát triển tư duy phản biện và bảo vệ bản thân. Nhiều em nhỏ gặp khó khăn trong việc đối mặt với bạo lực, dẫn đến ảnh hưởng tiêu cực đến tâm lý và học tập. Do đó, việc rèn luyện kỹ năng phòng chống bạo lực là điều cần thiết để tạo môi trường học đường an toàn.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>KỸ NĂNG PHÒNG CHỐNG BẠO LỰC HỌC ĐƯỜNG</strong> sẽ giúp bạn phát triển kỹ năng tư duy phản biện, từ đó tự tin đối mặt và giải quyết các tình huống bạo lực học đường.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kynang59.jpg', NULL, 1),
(300, 'Kỹ năng viết', 'Trần Thị Bích', 'NXB Thế Giới', 2019, 3, 6, 215000.00, 10, 5, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>KỸ NĂNG VIẾT</strong></span></span></p><p> </p><p>Trong học tập và công việc, kỹ năng viết là yếu tố quan trọng giúp bạn trình bày ý tưởng một cách rõ ràng và hiệu quả. Nhiều người gặp khó khăn trong việc học tập và viết lách, dẫn đến việc truyền tải thông tin không đạt hiệu quả. Do đó, việc rèn luyện kỹ năng viết là điều cần thiết để thành công.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>KỸ NĂNG VIẾT</strong> sẽ hướng dẫn bạn cách học tập hiệu quả, từ đó cải thiện khả năng viết và trình bày ý tưởng một cách ấn tượng.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kynang60.jpg', NULL, 1),
(301, 'Khởi nghiệp du kích', 'Nguyễn Văn Dũng', 'NXB Kim Đồng', 2022, 4, 7, 200000.00, 5, 30, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>KHỞI NGHIỆP DU KÍCH</strong></span></span></p><p> </p><p>Trong hành trình khởi nghiệp, việc áp dụng các chiến lược kinh doanh sáng tạo là yếu tố quan trọng giúp bạn thành công với nguồn lực hạn chế. Nhiều người mới khởi nghiệp cảm thấy khó khăn khi đối mặt với cạnh tranh khốc liệt. Do đó, việc học các chiến lược kinh doanh thực tiễn là điều cần thiết để vượt qua thử thách.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>KHỞI NGHIỆP DU KÍCH</strong> sẽ cung cấp những chiến lược kinh doanh thực tiễn và hiệu quả, giúp bạn tự tin bắt đầu hành trình khởi nghiệp của mình.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kinhdoanh61.jpg', NULL, 1),
(302, 'Kinh doanh quốc tế', 'Trần Văn Hùng', 'NXB Trẻ', 2020, 4, 7, 210000.00, 10, 25, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>KINH DOANH QUỐC TẾ</strong></span></span></p><p> </p><p>Trong bối cảnh toàn cầu hóa, việc quản lý tài chính cá nhân và hiểu biết về kinh doanh quốc tế là yếu tố quan trọng giúp bạn thành công trên thị trường toàn cầu. Nhiều người gặp khó khăn trong việc quản lý tài chính khi mở rộng kinh doanh ra nước ngoài. Do đó, việc học cách quản lý tài chính hiệu quả là điều cần thiết để phát triển bền vững.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>KINH DOANH QUỐC TẾ</strong> sẽ hướng dẫn bạn cách quản lý tài chính cá nhân hiệu quả, từ đó giúp bạn tự tin mở rộng kinh doanh ra thị trường quốc tế.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kinhdoanh62.jpg', NULL, 1),
(303, 'Kinh doanh là tiền của người khác', 'Lê Thị Hồng', 'NXB Giáo Dục', 2021, 4, 7, 220000.00, 15, 20, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>KINH DOANH LÀ TIỀN CỦA NGƯỜI KHÁC</strong></span></span></p><p> </p><p>Trong thế giới kinh doanh, việc xây dựng thương hiệu cá nhân là yếu tố quan trọng giúp bạn tạo dựng uy tín và thu hút cơ hội. Nhiều người gặp khó khăn trong việc định vị bản thân trên thị trường, dẫn đến thiếu sự nổi bật. Do đó, việc học cách xây dựng thương hiệu cá nhân là điều cần thiết để thành công.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>KINH DOANH LÀ TIỀN CỦA NGƯỜI KHÁC</strong> sẽ cung cấp chiến lược xây dựng thương hiệu cá nhân, giúp bạn tự tin tạo dựng hình ảnh và thành công trong kinh doanh.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kinhdoanh63.jpg', NULL, 1),
(304, 'Luật kinh doanh trong Bất động sản', 'Phạm Văn Tâm', 'NXB Thanh Niên', 2019, 4, 7, 230000.00, 20, 15, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>LUẬT KINH DOANH TRONG BẤT ĐỘNG SẢN</strong></span></span></p><p> </p><p>Trong lĩnh vực bất động sản, việc hiểu biết về luật kinh doanh là yếu tố quan trọng giúp bạn khởi nghiệp thành công từ con số 0. Nhiều người mới bắt đầu gặp khó khăn vì thiếu kiến thức pháp lý, dẫn đến rủi ro trong kinh doanh. Do đó, việc trang bị kiến thức về luật là điều cần thiết để phát triển bền vững.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>LUẬT KINH DOANH TRONG BẤT ĐỘNG SẢN</strong> sẽ hướng dẫn bạn cách khởi nghiệp từ con số 0, từ đó giúp bạn tự tin bước vào lĩnh vực bất động sản với nền tảng pháp lý vững chắc.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kinhdoanh64.jpg', NULL, 1),
(305, 'Nghề giàu làm giàu', 'Nguyễn Thị Lan Anh', 'NXB Thế Giới', 2020, 4, 7, 240000.00, 10, 10, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>NGHỀ GIÀU LÀM GIÀU</strong></span></span></p><p> </p><p>Trong hành trình làm giàu, việc quản lý dự án hiệu quả là yếu tố quan trọng giúp bạn đạt được thành công và phát triển bền vững. Nhiều người gặp khó khăn trong việc tổ chức và quản lý công việc, dẫn đến thất bại trong kinh doanh. Do đó, việc rèn luyện kỹ năng quản lý dự án là điều cần thiết để làm giàu.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>NGHỀ GIÀU LÀM GIÀU</strong> sẽ giúp bạn phát triển kỹ năng quản lý dự án, từ đó tự tin xây dựng con đường làm giàu của riêng mình.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kinhdoanh65.jpg', NULL, 1),
(306, 'Luật doanh nghiệp 2019', 'Trần Văn Long', 'NXB Phụ Nữ', 2021, 4, 7, 250000.00, 5, 5, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>LUẬT DOANH NGHIỆP 2019</strong></span></span></p><p> </p><p>Trong kinh doanh, việc hiểu biết về luật doanh nghiệp là yếu tố quan trọng giúp bạn đầu tư thông minh và giảm thiểu rủi ro. Nhiều doanh nhân gặp khó khăn vì thiếu kiến thức pháp lý, dẫn đến những sai lầm không đáng có. Do đó, việc trang bị kiến thức về luật là điều cần thiết để thành công.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>LUẬT DOANH NGHIỆP 2019</strong> sẽ hướng dẫn bạn cách đầu tư thông minh, từ đó giúp bạn tự tin phát triển doanh nghiệp với nền tảng pháp lý vững chắc.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kinhdoanh66.jpg', NULL, 1),
(307, 'Bí mật tư duy triệu phú', 'Lê Văn Nam', 'NXB Lao Động', 2022, 4, 7, 260000.00, 10, 30, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>BÍ MẬT TƯ DUY TRIỆU PHÚ</strong></span></span></p><p> </p><p>Trong hành trình làm giàu, việc xây dựng đội nhóm hiệu quả là yếu tố quan trọng giúp bạn đạt được thành công và phát triển bền vững. Nhiều doanh nhân gặp khó khăn trong việc quản lý đội nhóm, dẫn đến hiệu suất thấp. Do đó, việc rèn luyện tư duy triệu phú và kỹ năng lãnh đạo là điều cần thiết để thành công.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>BÍ MẬT TƯ DUY TRIỆU PHÚ</strong> sẽ hướng dẫn bạn cách xây dựng đội nhóm hiệu quả, từ đó giúp bạn phát triển tư duy triệu phú và đạt được mục tiêu kinh doanh.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kinhdoanh67.jpg', NULL, 1),
(308, 'Kinh tế vĩ mô', 'Nguyễn Thị Thu', 'NXB Tổng Hợp', 2020, 4, 7, 270000.00, 15, 25, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>KINH TẾ VĨ MÔ</strong></span></span></p><p> </p><p>Trong lĩnh vực kinh doanh, việc hiểu biết về kinh tế vĩ mô là yếu tố quan trọng giúp bạn xây dựng chiến lược marketing hiệu quả. Nhiều doanh nghiệp gặp khó khăn trong việc tiếp cận thị trường do thiếu kiến thức kinh tế. Do đó, việc trang bị kiến thức kinh tế vĩ mô là điều cần thiết để thành công.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>KINH TẾ VĨ MÔ</strong> sẽ cung cấp chiến lược marketing hiện đại, từ đó giúp bạn tự tin phát triển doanh nghiệp trong bối cảnh kinh tế toàn cầu.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kinhdoanh68.jpg', NULL, 1),
(309, 'Mô hình kinh doanh sáng tạo', 'Phạm Thị Ngọc Ánh', 'NXB Hội Nhà Văn', 2021, 4, 7, 280000.00, 20, 20, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>MÔ HÌNH KINH DOANH SÁNG TẠO</strong></span></span></p><p> </p><p>Trong kinh doanh, việc phân tích thị trường là yếu tố quan trọng giúp bạn xây dựng mô hình kinh doanh sáng tạo và hiệu quả. Nhiều doanh nghiệp gặp khó khăn trong việc tìm kiếm cơ hội mới do thiếu kỹ năng phân tích. Do đó, việc học cách phân tích thị trường là điều cần thiết để phát triển bền vững.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>MÔ HÌNH KINH DOANH SÁNG TẠO</strong> sẽ hướng dẫn bạn cách phân tích thị trường, từ đó giúp bạn xây dựng mô hình kinh doanh sáng tạo và thành công.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kinhdoanh69.jpg', NULL, 1),
(310, 'Khách hàng chưa phải thượng đế', 'Nguyễn Văn Hùng', 'NXB Thế Giới', 2023, 4, 7, 290000.00, 10, 15, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>KHÁCH HÀNG CHƯA PHẢI THƯỢNG ĐẾ</strong></span></span></p><p> </p><p>Trong kinh doanh, việc phát triển kỹ năng bán hàng là yếu tố quan trọng giúp bạn chinh phục khách hàng và tăng doanh thu. Nhiều người gặp khó khăn trong việc thuyết phục khách hàng, dẫn đến doanh số thấp. Do đó, việc rèn luyện kỹ năng bán hàng là điều cần thiết để thành công.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>KHÁCH HÀNG CHƯA PHẢI THƯỢNG ĐẾ</strong> sẽ giúp bạn phát triển kỹ năng bán hàng, từ đó tự tin chinh phục khách hàng và đạt được mục tiêu kinh doanh.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kinhdoanh70.jpg', NULL, 1),
(311, '100 ý tưởng PR', 'Trần Thị Lan', 'NXB Kim Đồng', 2019, 4, 8, 300000.00, 5, 10, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>100 Ý TƯỞNG PR</strong></span></span></p><p> </p><p>Trong lĩnh vực kinh doanh, việc xây dựng chiến lược PR hiệu quả là yếu tố quan trọng giúp doanh nghiệp tạo dựng hình ảnh và thu hút khách hàng. Nhiều doanh nghiệp gặp khó khăn trong việc tìm kiếm ý tưởng PR sáng tạo, dẫn đến hiệu quả truyền thông không cao. Do đó, việc học cách quản lý rủi ro và sáng tạo ý tưởng PR là điều cần thiết để thành công.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>100 Ý TƯỞNG PR</strong> sẽ cung cấp những ý tưởng PR sáng tạo và thực tiễn, giúp bạn quản lý rủi ro hiệu quả và nâng cao hình ảnh thương hiệu trên thị trường.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kinhdoanh71.jpg', NULL, 1),
(312, 'Khoa học làm giàu', 'Lê Minh Tuấn', 'NXB Trẻ', 2020, 4, 8, 310000.00, 10, 5, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>KHOA HỌC LÀM GIÀU</strong></span></span></p><p> </p><p>Trong hành trình làm giàu, việc xây dựng chiến lược dài hạn là yếu tố quan trọng giúp bạn đạt được thành công và phát triển bền vững. Nhiều người gặp khó khăn trong việc lập kế hoạch dài hạn, dẫn đến thất bại trong kinh doanh. Do đó, việc học cách xây dựng chiến lược dài hạn là điều cần thiết để làm giàu.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>KHOA HỌC LÀM GIÀU</strong> sẽ hướng dẫn bạn cách xây dựng chiến lược dài hạn, từ đó giúp bạn tự tin trên con đường làm giàu và đạt được mục tiêu tài chính.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kinhdoanh72.jpg', NULL, 1),
(313, 'Kinh doanh của người Do Thái', 'Phạm Ngọc Ánh', 'NXB Giáo Dục', 2021, 4, 8, 320000.00, 15, 30, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>100 Ý TƯỞNG PR</strong></span></span></p><p> </p><p>Trong lĩnh vực kinh doanh, việc xây dựng chiến lược PR hiệu quả là yếu tố quan trọng giúp doanh nghiệp tạo dựng hình ảnh và thu hút khách hàng. Nhiều doanh nghiệp gặp khó khăn trong việc tìm kiếm ý tưởng PR sáng tạo, dẫn đến hiệu quả truyền thông không cao. Do đó, việc học cách quản lý rủi ro và sáng tạo ý tưởng PR là điều cần thiết để thành công.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>100 Ý TƯỞNG PR</strong> sẽ cung cấp những ý tưởng PR sáng tạo và thực tiễn, giúp bạn quản lý rủi ro hiệu quả và nâng cao hình ảnh thương hiệu trên thị trường.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kinhdoanh72.jpg', NULL, 1),
(314, 'Kinh doanh của người Do Thái', 'Lê Văn Nam', 'NXB Kim Đồng', 2024, 4, 8, 320000.00, 15, 30, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>KINH DOANH CỦA NGƯỜI DO THÁI</strong></span></span></p><p> </p><p>Trong kinh doanh, việc quản lý chuỗi cung ứng hiệu quả là yếu tố quan trọng giúp doanh nghiệp tối ưu hóa chi phí và tăng lợi nhuận. Nhiều doanh nghiệp gặp khó khăn trong việc tổ chức chuỗi cung ứng, dẫn đến lãng phí nguồn lực. Do đó, việc học cách quản lý chuỗi cung ứng là điều cần thiết để thành công.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>KINH DOANH CỦA NGƯỜI DO THÁI</strong> sẽ hướng dẫn bạn cách quản lý chuỗi cung ứng hiệu quả, từ đó giúp bạn áp dụng những bài học kinh doanh thành công từ người Do Thái.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kinhdoanh73.jpg', NULL, 1),
(315, 'Luật kinh doanh Bất động sản', 'Phạm Ngọc Ánh', 'NXB Lao Động', 2024, 4, 8, 330000.00, 20, 25, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>LUẬT KINH DOANH BẤT ĐỘNG SẢN</strong></span></span></p><p> </p><p>Trong lĩnh vực bất động sản, việc mở rộng thị trường quốc tế là yếu tố quan trọng giúp doanh nghiệp phát triển và tăng trưởng bền vững. Nhiều doanh nghiệp gặp khó khăn trong việc tiếp cận thị trường mới do thiếu chiến lược phù hợp. Do đó, việc học cách xây dựng chiến lược mở rộng thị trường quốc tế là điều cần thiết để thành công.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>LUẬT KINH DOANH BẤT ĐỘNG SẢN</strong> sẽ cung cấp chiến lược mở rộng thị trường quốc tế, từ đó giúp bạn tự tin phát triển kinh doanh bất động sản trên toàn cầu.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kinhdoanh74.jpg', NULL, 1),
(316, 'Hành trình kinh doanh trực tuyến', 'Trần Văn Long', 'NXB Kim Đồng', 2024, 4, 8, 340000.00, 10, 20, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>HÀNH TRÌNH KINH DOANH TRỰC TUYẾN</strong></span></span></p><p> </p><p>Trong thời đại số hóa, việc quản lý nhân sự hiệu quả là yếu tố quan trọng giúp doanh nghiệp trực tuyến phát triển bền vững. Nhiều doanh nghiệp gặp khó khăn trong việc tổ chức đội ngũ nhân sự, dẫn đến hiệu suất làm việc thấp. Do đó, việc học cách quản lý nhân sự là điều cần thiết để thành công trong kinh doanh trực tuyến.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>HÀNH TRÌNH KINH DOANH TRỰC TUYẾN</strong> sẽ hướng dẫn bạn cách quản lý nhân sự hiệu quả, từ đó giúp bạn xây dựng một doanh nghiệp trực tuyến thành công và phát triển mạnh mẽ.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kinhdoanh75.jpg', NULL, 1),
(317, 'Phân tích hoạt động kinh doanh', 'Phạm Ngọc Ánh', 'NXB Lao Động', 2024, 4, 8, 350000.00, 5, 15, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>PHÂN TÍCH HOẠT ĐỘNG KINH DOANH</strong></span></span></p><p> </p><p>Trong kinh doanh, việc đàm phán hiệu quả là yếu tố quan trọng giúp doanh nghiệp đạt được các thỏa thuận có lợi và phát triển bền vững. Nhiều doanh nhân gặp khó khăn trong việc thương lượng, dẫn đến mất cơ hội hợp tác. Do đó, việc phát triển kỹ năng đàm phán kinh doanh là điều cần thiết để thành công.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>PHÂN TÍCH HOẠT ĐỘNG KINH DOANH</strong> sẽ hướng dẫn bạn cách phát triển kỹ năng đàm phán kinh doanh, từ đó giúp bạn tự tin đạt được các thỏa thuận tốt nhất trong kinh doanh.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kinhdoanh76.jpg', NULL, 1),
(318, 'The learn starup', 'Lê Văn Nam', 'NXB Kim Đồng', 2024, 4, 8, 360000.00, 10, 10, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>THE LEARN STARUP</strong></span></span></p><p> </p><p>Trong hành trình khởi nghiệp, việc phân tích tài chính doanh nghiệp là yếu tố quan trọng giúp bạn đưa ra các quyết định kinh doanh chính xác. Nhiều startup gặp khó khăn trong việc quản lý tài chính, dẫn đến thất bại trong giai đoạn đầu. Do đó, việc học cách phân tích tài chính doanh nghiệp là điều cần thiết để thành công.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>THE LEARN STARUP</strong> sẽ hướng dẫn bạn cách phân tích tài chính doanh nghiệp, từ đó giúp bạn xây dựng một startup vững mạnh và phát triển bền vững.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kinhdoanh77.jpg', NULL, 1),
(319, 'Cái đuôi dài', 'Lê Minh Tuấn', 'NXB Thế Giới', 2024, 4, 8, 370000.00, 15, 5, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>CÁI ĐUÔI DÀI</strong></span></span></p><p> </p><p>Trong kinh doanh, việc quản lý khủng hoảng là yếu tố quan trọng giúp doanh nghiệp vượt qua những giai đoạn khó khăn và phát triển bền vững. Nhiều doanh nghiệp gặp khó khăn trong việc xử lý khủng hoảng, dẫn đến mất uy tín và thiệt hại lớn. Do đó, việc học cách quản lý khủng hoảng là điều cần thiết để thành công.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>CÁI ĐUÔI DÀI</strong> sẽ cung cấp chiến lược quản lý khủng hoảng hiệu quả, từ đó giúp bạn tự tin đối mặt và vượt qua mọi thử thách trong kinh doanh.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kinhdoanh78.jpg', NULL, 1),
(320, 'Quan hệ kinh tế Quốc tế', 'Lê Minh Tuấn', 'NXB Lao Động', 2024, 4, 8, 380000.00, 20, 30, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>QUAN HỆ KINH TẾ QUỐC TẾ</strong></span></span></p><p> </p><p>Trong bối cảnh toàn cầu hóa, việc xây dựng văn hóa doanh nghiệp là yếu tố quan trọng giúp doanh nghiệp tạo dựng sự đoàn kết và phát triển bền vững. Nhiều doanh nghiệp gặp khó khăn trong việc tạo dựng văn hóa doanh nghiệp phù hợp, dẫn đến thiếu sự gắn kết trong đội ngũ. Do đó, việc học cách xây dựng văn hóa doanh nghiệp là điều cần thiết để thành công.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>QUAN HỆ KINH TẾ QUỐC TẾ</strong> sẽ hướng dẫn bạn cách xây dựng văn hóa doanh nghiệp, từ đó giúp bạn tạo dựng một môi trường làm việc hiệu quả và phát triển trong bối cảnh quốc tế.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kinhdoanh79.jpg', NULL, 1),
(321, 'Rich Dad', 'Lê Minh Tuấn', 'NXB Thế Giới', 2024, 4, 8, 390000.00, 10, 25, '<div class=\"container-fluid product-description-wrapper\"><p style=\"text-align=> center;\"><span style=\"color=>#1abc9c\"><span style=\"font-size=>28px\"><strong>RICH DAD</strong></span></span></p><p> </p><p>Trong kinh doanh, việc phát triển kỹ năng lãnh đạo chiến lược là yếu tố quan trọng giúp bạn dẫn dắt doanh nghiệp đạt được thành công và phát triển bền vững. Nhiều nhà lãnh đạo gặp khó khăn trong việc định hướng chiến lược, dẫn đến hiệu quả kinh doanh thấp. Do đó, việc rèn luyện kỹ năng lãnh đạo chiến lược là điều cần thiết để làm giàu.</p><p> </p><p>Hiểu được điều ấy, cuốn sách <strong>RICH DAD</strong> sẽ hướng dẫn bạn cách phát triển kỹ năng lãnh đạo chiến lược, từ đó giúp bạn tự tin dẫn dắt doanh nghiệp và đạt được mục tiêu tài chính.</p><p> </p><p>Bởi cha mẹ chính là \"những người thầy đầu tiên\" của con, nên trong quá trình đọc sách, cha mẹ cần đồng hành cùng con, cần có những khoảng dừng để đặt câu hỏi, quan sát và tương tác với con.</p><p> </p><p>Với nội dung thú vị, hình vẽ đáng yêu, các câu chuyện thực tế đầy mới mẻ và hấp dẫn, mong rằng bộ sách sẽ được các bậc cha mẹ và các em nhỏ yêu thích và đón nhận!</p></div>', 'kinhdoanh80.jpg', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `id_theloai` int(11) NOT NULL,
  `TenTheLoai` varchar(100) NOT NULL,
  `id_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`id_theloai`, `TenTheLoai`, `id_danhmuc`) VALUES
(1, 'Sách phát triển trí tuệ', 1),
(2, 'Sách tập tô', 1),
(3, 'Truyện màu', 2),
(4, 'Truyện chữ', 2),
(5, 'Sách kĩ năng sống', 3),
(6, 'Kĩ năng văn phòng', 3),
(7, 'Quản trị - lãnh đạo', 4),
(8, 'Đầu tư - Tài chính', 4),
(9, 'Sách cho mẹ bầu', 5),
(10, 'Sách giáo dục con', 5),
(11, 'Văn học nước ngoài', 6),
(12, 'Văn học Việt Nam', 6),
(13, 'Sách tiểu học ', 7),
(14, 'Sách trung học', 7),
(15, 'Phong cách sống', 8),
(16, 'Cung hoàng đạo', 8);

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
-- Chỉ mục cho bảng `chi_tiet_phieu_nhap`
--
ALTER TABLE `chi_tiet_phieu_nhap`
  ADD PRIMARY KEY (`ID_CTietPhieuNhap`),
  ADD KEY `ID_PhieuNhap` (`ID_PhieuNhap`),
  ADD KEY `ID_Sach` (`ID_Sach`);

--
-- Chỉ mục cho bảng `chi_tiet_quyen`
--
ALTER TABLE `chi_tiet_quyen`
  ADD PRIMARY KEY (`idchitiet`),
  ADD KEY `MaQuyen` (`MaQuyen`);

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
-- Chỉ mục cho bảng `dia_chi`
--
ALTER TABLE `dia_chi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Email` (`Email`);

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
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Email_2` (`Email`);

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
-- Chỉ mục cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`ID_NCC`);

--
-- Chỉ mục cho bảng `nhomquyen`
--
ALTER TABLE `nhomquyen`
  ADD PRIMARY KEY (`MaQuyen`);

--
-- Chỉ mục cho bảng `phieu_nhap`
--
ALTER TABLE `phieu_nhap`
  ADD PRIMARY KEY (`ID_PhieuNhap`),
  ADD KEY `ID_NCC` (`ID_NCC`);

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
  ADD KEY `ID_The_Loai` (`ID_DanhMuc`),
  ADD KEY `ID_Cart` (`ID_Cart`),
  ADD KEY `Tac_Gia` (`Tac_Gia`),
  ADD KEY `ID_Nha_Xuat_Ban` (`Ten_Nha_Xuat_Ban`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id_theloai`);

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
  MODIFY `ID_Chi_Tiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_phieu_nhap`
--
ALTER TABLE `chi_tiet_phieu_nhap`
  MODIFY `ID_CTietPhieuNhap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_quyen`
--
ALTER TABLE `chi_tiet_quyen`
  MODIFY `idchitiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `chucnang`
--
ALTER TABLE `chucnang`
  MODIFY `ID_ChucNang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `ID_The_Loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `dia_chi`
--
ALTER TABLE `dia_chi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `ID_Don_Hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ID_Khach_Hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `ncc`
--
ALTER TABLE `ncc`
  MODIFY `ID_NCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `ID_NV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `ID_NCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `nhomquyen`
--
ALTER TABLE `nhomquyen`
  MODIFY `MaQuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `phieu_nhap`
--
ALTER TABLE `phieu_nhap`
  MODIFY `ID_PhieuNhap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `pnh`
--
ALTER TABLE `pnh`
  MODIFY `ID_PNH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `pttt`
--
ALTER TABLE `pttt`
  MODIFY `ID_PTTT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `ID_Sach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id_theloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- Các ràng buộc cho bảng `chi_tiet_phieu_nhap`
--
ALTER TABLE `chi_tiet_phieu_nhap`
  ADD CONSTRAINT `chi_tiet_phieu_nhap_ibfk_1` FOREIGN KEY (`ID_PhieuNhap`) REFERENCES `phieu_nhap` (`ID_PhieuNhap`),
  ADD CONSTRAINT `chi_tiet_phieu_nhap_ibfk_2` FOREIGN KEY (`ID_Sach`) REFERENCES `sach` (`ID_Sach`);

--
-- Các ràng buộc cho bảng `ctiet_pnh`
--
ALTER TABLE `ctiet_pnh`
  ADD CONSTRAINT `ctiet_pnh_ibfk_1` FOREIGN KEY (`ID_pnh`) REFERENCES `pnh` (`ID_PNH`),
  ADD CONSTRAINT `ctiet_pnh_ibfk_2` FOREIGN KEY (`ID_sach`) REFERENCES `sach` (`ID_Sach`);

--
-- Các ràng buộc cho bảng `danh_gia_sach`
--
ALTER TABLE `danh_gia_sach`
  ADD CONSTRAINT `danh_gia_sach_ibfk_1` FOREIGN KEY (`ID_sach`) REFERENCES `sach` (`ID_Sach`),
  ADD CONSTRAINT `danh_gia_sach_ibfk_2` FOREIGN KEY (`ID_Khachhang`) REFERENCES `khach_hang` (`ID_Khach_Hang`);

--
-- Các ràng buộc cho bảng `dia_chi`
--
ALTER TABLE `dia_chi`
  ADD CONSTRAINT `dia_chi_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `khach_hang` (`Email`);

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`ID_Khach_Hang`) REFERENCES `khach_hang` (`ID_Khach_Hang`),
  ADD CONSTRAINT `don_hang_ibfk_2` FOREIGN KEY (`Phuong_Thuc_Thanh_Toan`) REFERENCES `pttt` (`ID_PTTT`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`MaQuyen`) REFERENCES `nhomquyen` (`MaQuyen`);

--
-- Các ràng buộc cho bảng `phieu_nhap`
--
ALTER TABLE `phieu_nhap`
  ADD CONSTRAINT `phieu_nhap_ibfk_1` FOREIGN KEY (`ID_NCC`) REFERENCES `nha_cung_cap` (`ID_NCC`);

--
-- Các ràng buộc cho bảng `pnh`
--
ALTER TABLE `pnh`
  ADD CONSTRAINT `pnh_ibfk_1` FOREIGN KEY (`ID_NCC`) REFERENCES `ncc` (`ID_NCC`);

--
-- Các ràng buộc cho bảng `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`ID_DanhMuc`) REFERENCES `danh_muc` (`ID_The_Loai`),
  ADD CONSTRAINT `sach_ibfk_2` FOREIGN KEY (`ID_Cart`) REFERENCES `cart` (`ID_Cart`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
