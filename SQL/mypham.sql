-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 17, 2023 lúc 03:07 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mypham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaChiTietHoaDon` int(11) NOT NULL,
  `TongTien` double NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `MaHoaDon` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaChiTietHoaDon`, `TongTien`, `MaSanPham`, `MaHoaDon`, `SoLuong`) VALUES
(132, 198000, 2, 222, 2),
(133, 1380000, 4, 222, 3),
(134, 460000, 4, 223, 1),
(135, 99000, 2, 224, 1),
(136, 460000, 4, 225, 1),
(137, 9, 2, 227, 1),
(138, 198000, 2, 228, 2),
(139, 99000, 2, 229, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MaGioHang` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`MaGioHang`, `SoLuong`, `MaKhachHang`, `MaSanPham`) VALUES
(116, 4, 1, 2),
(117, 3, 1, 4),
(120, 2, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHoaDon` int(11) NOT NULL,
  `TongTien` double NOT NULL,
  `NgayLap` date NOT NULL,
  `MaNhanVien` int(11) DEFAULT NULL,
  `MaKhachHang` int(11) DEFAULT NULL,
  `DiaChiGiaoHang` varchar(100) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `HoTen` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHoaDon`, `TongTien`, `NgayLap`, `MaNhanVien`, `MaKhachHang`, `DiaChiGiaoHang`, `HoTen`, `SoDienThoai`, `Email`) VALUES
(222, 1578000, '2023-11-30', NULL, 1, '12, Nguyễn Văn Bảo', 'Nguyễn Văn Qúy', '0923913789', 'myphamdep@gmail.com'),
(223, 460000, '2023-12-01', NULL, 1, '12, Nguyễn Văn Bảo', 'Nguyễn Văn Qúy', '0816977959', 'myphamdep@gmail.com'),
(224, 99000, '2023-12-03', NULL, 1, '12, Nguyễn Văn Bảo', 'Nguyễn Văn Qúy', '0816977959', 'myphamdep@gmail.com'),
(225, 460000, '2023-12-03', NULL, 1, '12, Nguyễn Văn Bảo', 'Nguyễn Văn Qúy', '0816977959', 'myphamdep@gmail.com'),
(227, 99000, '2023-12-08', 1, NULL, 'OFFLINE', 'do van truong', '0987612345', 'dotruong@gmail.com'),
(228, 198000, '2023-12-09', NULL, 2, '20 Dương Quảng Hàm', 'Đỗ Vân Trường', '0905371627', 'dotruong0701@gmail.com'),
(229, 99000, '2023-12-09', NULL, 2, '80 Dương Quảng Hàm', 'Đỗ Vân Trường', '0705371627', 'dotruong0701@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKhachHang` int(11) NOT NULL,
  `HoTen` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `trangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `HoTen`, `SoDienThoai`, `DiaChi`, `MatKhau`, `Email`, `trangThai`) VALUES
(1, 'Đỗ Vân Linh', '0923913789', '40 Dương Quảng Hàm - p5 - gò vấp', '', 'dotruong0704@gmail.com', 1),
(2, 'Lâm Ngọc Long', '0923913691', ' ', '7d046ff5d7dc56da3f0b1e20bec27c12', 'lamngoclong1004@gmail.com', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loainhanvien`
--

CREATE TABLE `loainhanvien` (
  `MaLoaiNhanVien` int(11) NOT NULL,
  `TenLoaiNhanVien` varchar(100) NOT NULL,
  `GhiChu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loainhanvien`
--

INSERT INTO `loainhanvien` (`MaLoaiNhanVien`, `TenLoaiNhanVien`, `GhiChu`) VALUES
(1, 'Bán Hàng', 'Bán hàng tại khu vực Gò Vấp'),
(2, 'Quản lý kho', 'Quản lý kho tại khu vực Gò Vấp'),
(3, 'Admin', 'Chủ của hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`MaLoai`, `TenLoai`, `GhiChu`) VALUES
(1, 'Kem Nền', 'Kem nền che khuyết điểm'),
(2, 'Mascara', 'Làm cong mí mắt'),
(3, 'Phấn phủ', 'Phấn phủ làm mịn da'),
(4, 'Son Môi', 'Son dưỡng ẩm môi vào ban đêm'),
(5, 'Sữa rữa mặt', 'Sữa rữa mặt làm sáng da'),
(6, 'Kem chống nẳng', 'Kem chống nắng cho da dầu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNhaCungCap` int(11) NOT NULL,
  `TenNhaCungCap` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNhaCungCap`, `TenNhaCungCap`, `GhiChu`) VALUES
(1, 'MQ SKIN', 'Cung cấp các sản phẩm mỹ phẩm nghiên về thảo dược.'),
(2, 'Mascara', 'Làm cong mi mắt'),
(3, 'Naunau', 'Cung cấp các sản phẩm có mùi hương cuốn hút.'),
(4, 'Skina', 'Cung cấp các sản phẩm chăm sóc da từ thảo mộc tự nhiên.'),
(5, 'Titione', 'Cung cấp các sản phẩm thân thiện với người dùng.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` int(11) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `MatKhau` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `SoDienThoai` varchar(15) NOT NULL,
  `DiaChi` varchar(200) NOT NULL,
  `LoaiNhanVien` int(11) NOT NULL,
  `trangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNhanVien`, `HoTen`, `MatKhau`, `Email`, `SoDienThoai`, `DiaChi`, `LoaiNhanVien`, `trangThai`) VALUES
(1, 'Trần Tuấn Anh', 'Long12345!', 'lamngoclong1004@gmail.com', '0923913691', '91 Nguyễn Văn Bảo, Gò Vấp, Hồ Chí Minh', 1, 1),
(2, 'Trương Ngọc Bình', 'Le#45skjdc', 'truongngocbinh@gmail.com', '0789665431', '200 Phan Xích Long, Phú Nhuận, Hồ Chí Minh', 2, 1),
(3, 'Lý Hữu Cảnh', 'cKskl0987!', 'lyhuucanh@gmail.com', '0987666555', '22 Nguyễn Thái Sơn, Gò Vấp, Hồ Chí Minh', 1, 1),
(4, 'Trần Minh Dự', '1234#Liubs', 'tranminhdu@gmail.com', '0788654332', '33 Lê Đức Thọ, Gò Vấp, Hồ Chí Minh', 2, 1),
(5, 'Lê Hoàng Hữu', 'sjsxab123#', 'lehoanghuu@gmail.com', '0998765443', '1 Phan Xích Long, Phú Nhuận, Hồ Chí Minh', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `noidungdanhgia`
--

CREATE TABLE `noidungdanhgia` (
  `MaDanhGia` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `ThoiGianDanhGia` date NOT NULL,
  `NoiDungDanhGia` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` char(200) NOT NULL,
  `SoSao` int(11) NOT NULL,
  `MaKhachHang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `noidungdanhgia`
--

INSERT INTO `noidungdanhgia` (`MaDanhGia`, `MaSanPham`, `ThoiGianDanhGia`, `NoiDungDanhGia`, `HinhAnh`, `SoSao`, `MaKhachHang`) VALUES
(1, 1, '2023-10-16', 'Kem rất tốt, sử dụng cảm thấy rất an toàn và hiệu quả.', '', 0, 1),
(2, 2, '2023-10-22', 'Sản phẩm đúng như mô tả, sẽ ủng hộ shop tiếp.', '', 0, 0),
(3, 3, '2023-10-23', 'Phấn đẹp, rất lâu phai.', '', 0, 0),
(14, 1, '2023-12-14', 'Sản phẩm đẹp quá', '', 3, 1),
(15, 2, '2023-12-01', '', '', 3, 0),
(16, 2, '2023-12-01', '', '', 3, 0),
(17, 2, '2023-12-01', 'Sản phẩm rất tuyệt', '', 3, 0),
(18, 2, '2023-12-01', 'Sản phẩm tốt quá', '', 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudathang`
--

CREATE TABLE `phieudathang` (
  `MaDatHang` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThoiGianDatHang` date NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `phieudathang`
--

INSERT INTO `phieudathang` (`MaDatHang`, `SoLuong`, `ThoiGianDatHang`, `MaKhachHang`, `MaSanPham`) VALUES
(1, 2, '2023-10-01', 2, 2),
(2, 4, '2023-10-02', 2, 2),
(3, 1, '2023-10-03', 3, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieukiemtrakho`
--

CREATE TABLE `phieukiemtrakho` (
  `NgayKiemTra` date NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `MaNhanVien` int(11) NOT NULL,
  `TrangThaiKiemTra` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MaPhieuKiemTraKho` tinyint(4) NOT NULL,
  `PhieuShow` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `phieukiemtrakho`
--

INSERT INTO `phieukiemtrakho` (`NgayKiemTra`, `MaSanPham`, `MaNhanVien`, `TrangThaiKiemTra`, `MaPhieuKiemTraKho`, `PhieuShow`) VALUES
('2023-11-25', 1, 1, 'sản phẩm ổn không hư hỏng', 6, 1),
('2023-11-22', 2, 2, 'sản phẩm ổn không hư hỏng', 7, 1),
('2023-11-22', 3, 3, 'sản phẩm ổn không hư hỏng', 8, 1),
('2023-11-22', 4, 4, 'sản phẩm ổn không hư hỏng', 9, 1),
('2023-11-22', 3, 4, 'sản phẩm ổn không hư hỏng', 10, 1),
('2023-12-06', 5, 2, 'sản phẩm ổn không hư hỏng', 20, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhapkho`
--

CREATE TABLE `phieunhapkho` (
  `MaPhieuNhapKho` int(11) NOT NULL,
  `NgayLapPhieuNhapKho` date NOT NULL,
  `TrangThaiPhieuNhapKho` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `MaNhanVien` int(11) NOT NULL,
  `PhieuShow` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhapkho`
--

INSERT INTO `phieunhapkho` (`MaPhieuNhapKho`, `NgayLapPhieuNhapKho`, `TrangThaiPhieuNhapKho`, `MaSanPham`, `MaNhanVien`, `PhieuShow`) VALUES
(1, '2023-10-30', 'Chưa duyệt', 1, 1, 1),
(2, '2023-10-30', 'Chưa duyệt', 2, 2, 1),
(3, '2023-10-30', 'Được duyệt', 3, 3, 1),
(4, '2023-10-30', 'Được duyệt', 4, 4, 1),
(21, '2023-11-14', 'Được duyệt', 1, 1, 1),
(22, '2023-11-14', 'Được duyệt', 1, 1, 0),
(23, '2023-11-16', 'Được duyệt', 3, 3, 0),
(24, '2023-11-16', 'Được duyệt', 3, 3, 0),
(25, '2023-11-16', 'Được duyệt', 3, 3, 0),
(26, '2023-11-16', 'Được duyệt', 3, 3, 0),
(27, '2023-11-28', 'Được duyệt', 1, 1, 1),
(28, '2023-11-28', 'Được duyệt', 1, 1, 0),
(29, '2023-11-22', 'Được duyệt', 5, 2, 1),
(30, '2023-11-22', 'Được duyệt', 5, 2, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieutrahang`
--

CREATE TABLE `phieutrahang` (
  `MaPhieuTraHang` int(10) NOT NULL,
  `MaChiTietDonHang` int(11) NOT NULL,
  `ThoiGianTraHang` date NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `LyDoTraHang` varchar(100) NOT NULL,
  `HinhAnh` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieutrahang`
--

INSERT INTO `phieutrahang` (`MaPhieuTraHang`, `MaChiTietDonHang`, `ThoiGianTraHang`, `SoLuong`, `LyDoTraHang`, `HinhAnh`) VALUES
(1, 1, '2023-12-21', 12, 'Hàng bị hỏng', '134a'),
(2, 133, '2023-12-01', 2, 'Hàng bị vỡ', 'hinh anh 123'),
(3, 132, '2023-12-09', 0, '', 'hinh anh 123'),
(4, 132, '2023-12-09', 0, '', 'hinh anh 123'),
(5, 132, '2023-12-09', 0, '', 'hinh anh 123'),
(6, 132, '2023-12-09', 0, '', 'hinh anh 123'),
(7, 132, '2023-12-09', 0, '', 'hinh anh 123'),
(8, 132, '2023-12-09', 0, '', 'hinh anh 123'),
(9, 132, '2023-12-09', 0, '', 'hinh anh 123'),
(10, 132, '2023-12-09', 0, '', 'hinh anh 123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuxuatkho`
--

CREATE TABLE `phieuxuatkho` (
  `MaPhieuXuatKho` int(11) NOT NULL,
  `NgayLapPhieuXuatKho` date NOT NULL,
  `TrangThaiPhieuXuatKho` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaNhanVien` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `PhieuShow` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `phieuxuatkho`
--

INSERT INTO `phieuxuatkho` (`MaPhieuXuatKho`, `NgayLapPhieuXuatKho`, `TrangThaiPhieuXuatKho`, `MaNhanVien`, `MaSanPham`, `PhieuShow`) VALUES
(1, '2023-11-02', 'Chưa duyệt', 1, 1, 1),
(2, '2023-11-08', 'Chưa duyệt', 2, 2, 1),
(5, '2023-11-14', 'Được duyệt', 1, 1, 1),
(6, '2023-11-15', 'Được duyệt', 3, 3, 1),
(7, '2023-11-15', 'Được duyệt', 3, 3, 0),
(8, '2023-11-22', 'Được duyệt', 1, 1, 1),
(9, '2023-11-22', 'Được duyệt', 1, 1, 1),
(10, '2023-11-23', 'Được duyệt', 4, 5, 0),
(11, '2023-11-23', 'Được duyệt', 4, 5, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SoLuongTon` int(11) NOT NULL DEFAULT 1,
  `MoTa` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `GiaBan` double NOT NULL,
  `GiaNhap` double NOT NULL,
  `ThuongHieu` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhAnh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `HanSuDung` date DEFAULT NULL,
  `LoaiSanPham` int(11) NOT NULL,
  `NhaCungCap` int(11) NOT NULL,
  `trangThai` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `SoLuongTon`, `MoTa`, `GiaBan`, `GiaNhap`, `ThuongHieu`, `HinhAnh`, `HanSuDung`, `LoaiSanPham`, `NhaCungCap`, `trangThai`) VALUES
(1, 'Mascara GECOMO', 5, 'Mascara làm cong mi mắt.', 179000, 79000, 'GECOMO', 'a1.jpg', '2024-10-23', 1, 1, 1),
(2, 'Phấn phủ PRAMY', 922, 'Phấn phủ làm mịn da', 99000, 39000, 'PRAMY', 'a2.jpg', '2025-10-15', 2, 2, 1),
(4, 'Sữa rửa mặt Simple', 87, 'Sữa rửa mặt làm mịn da', 89000, 59000, 'Simple', 'a4.jpg', '2025-11-13', 4, 4, 1),
(5, 'Sữa rửa mặt Hada Labo', 8, 'Sữa rửa mặt làm sáng da', 100000, 90000, 'Hada Labo', 'a5.jpg', '2023-11-29', 4, 5, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MaChiTietHoaDon`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MaGioHang`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHoaDon`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKhachHang`);

--
-- Chỉ mục cho bảng `loainhanvien`
--
ALTER TABLE `loainhanvien`
  ADD PRIMARY KEY (`MaLoaiNhanVien`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNhaCungCap`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNhanVien`);

--
-- Chỉ mục cho bảng `noidungdanhgia`
--
ALTER TABLE `noidungdanhgia`
  ADD PRIMARY KEY (`MaDanhGia`),
  ADD KEY `MaSanPham` (`MaSanPham`),
  ADD KEY `MaKhachHang` (`MaKhachHang`);

--
-- Chỉ mục cho bảng `phieudathang`
--
ALTER TABLE `phieudathang`
  ADD PRIMARY KEY (`MaDatHang`),
  ADD KEY `MaKhachHang` (`MaKhachHang`,`MaSanPham`);

--
-- Chỉ mục cho bảng `phieukiemtrakho`
--
ALTER TABLE `phieukiemtrakho`
  ADD PRIMARY KEY (`MaPhieuKiemTraKho`),
  ADD KEY `MaSanPham` (`MaSanPham`,`MaNhanVien`);

--
-- Chỉ mục cho bảng `phieunhapkho`
--
ALTER TABLE `phieunhapkho`
  ADD PRIMARY KEY (`MaPhieuNhapKho`),
  ADD KEY `MaSanPham` (`MaSanPham`,`MaNhanVien`);

--
-- Chỉ mục cho bảng `phieutrahang`
--
ALTER TABLE `phieutrahang`
  ADD PRIMARY KEY (`MaPhieuTraHang`);

--
-- Chỉ mục cho bảng `phieuxuatkho`
--
ALTER TABLE `phieuxuatkho`
  ADD PRIMARY KEY (`MaPhieuXuatKho`),
  ADD KEY `MaNhanVien` (`MaNhanVien`,`MaSanPham`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `LoaiSanPham` (`LoaiSanPham`,`NhaCungCap`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `MaChiTietHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MaGioHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `loainhanvien`
--
ALTER TABLE `loainhanvien`
  MODIFY `MaLoaiNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MaNhaCungCap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `noidungdanhgia`
--
ALTER TABLE `noidungdanhgia`
  MODIFY `MaDanhGia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `phieudathang`
--
ALTER TABLE `phieudathang`
  MODIFY `MaDatHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `phieukiemtrakho`
--
ALTER TABLE `phieukiemtrakho`
  MODIFY `MaPhieuKiemTraKho` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `phieunhapkho`
--
ALTER TABLE `phieunhapkho`
  MODIFY `MaPhieuNhapKho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `phieutrahang`
--
ALTER TABLE `phieutrahang`
  MODIFY `MaPhieuTraHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `phieuxuatkho`
--
ALTER TABLE `phieuxuatkho`
  MODIFY `MaPhieuXuatKho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
