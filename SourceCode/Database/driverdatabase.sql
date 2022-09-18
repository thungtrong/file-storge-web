-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 31, 2020 lúc 06:33 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `drivedatabase`
--
CREATE DATABASE IF NOT EXISTS `drivedatabase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `drivedatabase`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blacklist`
--

CREATE TABLE `blacklist` (
  `STT` tinyint(4) NOT NULL,
  `DINHDANG` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blacklist`
--

INSERT INTO `blacklist` (`STT`, `DINHDANG`) VALUES
(1, '.php'),
(2, '.java'),
(3, '.doc'),
(4, '.js'),
(5, '.xlsx'),
(6, '.docx'),
(7, '.python'),
(10, '.m');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chiase`
--

CREATE TABLE `chiase` (
  `MATHUCTHE` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `USERNAME` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chiase`
--

INSERT INTO `chiase` (`MATHUCTHE`, `USERNAME`) VALUES
('FD00000012', 'admin123'),
('FD00000013', 'VNBaoAnh'),
('FD00000020', 'tranhungtrong123'),
('FD00000021', 'tranhungtrong123'),
('FI00000004', 'admin123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chiaseall`
--

CREATE TABLE `chiaseall` (
  `MATHUCTHE` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `IDREAD` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `QUYENTRUYCAP` tinyint(1) NOT NULL DEFAULT 1,
  `TRANGTHAI` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chiaseall`
--

INSERT INTO `chiaseall` (`MATHUCTHE`, `IDREAD`, `QUYENTRUYCAP`, `TRANGTHAI`) VALUES
('FD00000012', 'RH0Wd2ajbN', 1, 1),
('FD00000013', 'cMSUnmhyT5', 0, 1),
('FI00000001', 'f4Yo2DUJkn', 1, 1),
('FI00000004', 'l314j7CevW', 1, 1),
('FI00000005', 'qFrP3zSEvx', 1, 1),
('FI00000006', 'I5Qu0RJYOG', 1, 1),
('FI00000008', 'nau45jcAYD', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ganday`
--

CREATE TABLE `ganday` (
  `MAFILE` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `MOLANCUOI` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ganday`
--

INSERT INTO `ganday` (`MAFILE`, `MOLANCUOI`) VALUES
('FD00000001', '2020-05-30'),
('FD00000002', '2020-05-31'),
('FD00000003', '2020-05-30'),
('FD00000004', '2020-05-30'),
('FD00000005', '2020-05-30'),
('FD00000006', '2020-05-31'),
('FD00000008', '2020-05-28'),
('FD00000009', '2020-05-30'),
('FD00000011', '2020-05-30'),
('FD00000012', '2020-05-31'),
('FD00000013', '2020-05-31'),
('FD00000014', '2020-05-30'),
('FD00000015', '2020-05-31'),
('FD00000016', '2020-05-29'),
('FD00000017', '2020-05-31'),
('FD00000018', '2020-05-29'),
('FD00000019', '2020-05-29'),
('FD00000020', '2020-05-31'),
('FD00000021', '2020-05-31'),
('FD00000022', '2020-05-31'),
('FD00000023', '2020-05-31'),
('FD00000024', '2020-05-31'),
('FD00000025', '2020-05-31'),
('FD00000026', '2020-05-31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitaikhoan`
--

CREATE TABLE `loaitaikhoan` (
  `MATYPE` tinyint(4) NOT NULL,
  `TENLOAI` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `QUYENHAN` tinyint(4) DEFAULT 3,
  `DUNGLUONGMAX` smallint(6) NOT NULL DEFAULT 25,
  `DUNGLUONGUPLOAD` tinyint(4) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitaikhoan`
--

INSERT INTO `loaitaikhoan` (`MATYPE`, `TENLOAI`, `QUYENHAN`, `DUNGLUONGMAX`, `DUNGLUONGUPLOAD`) VALUES
(0, 'ADMIN1', 0, 1000, 10),
(1, 'Tai khoan VIP', 3, 45, 5),
(2, 'Tai khoan cap 2', 3, 35, 4),
(3, 'Tai khoan cap 3', 3, 25, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `matkhaushare`
--

CREATE TABLE `matkhaushare` (
  `MATHUCTHE` varchar(12) NOT NULL,
  `MATKHAU` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `matkhaushare`
--

INSERT INTO `matkhaushare` (`MATHUCTHE`, `MATKHAU`) VALUES
('FD00000012', '0e7c13f031bfd7def63e4683090a497a'),
('FI00000004', '9bda0a5528c98f3128977f8b3848104e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `USERNAME` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD_TK` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `TYPE_TAIKHOAN` tinyint(4) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`USERNAME`, `PASSWORD_TK`, `TYPE_TAIKHOAN`) VALUES
('admin123', '0192023a7bbd73250516f069df18b500', 0),
('kensakuai', '9bda0a5528c98f3128977f8b3848104e', 3),
('tranhungtrong123', '5113f004a1b7d95d86420634eb58c6bc', 1),
('UserNew1', 'ff7382b02af9432d0c16aff9392e85a4', 3),
('VNBaoAnh', 'c9bef12a279303d47eb2ea2148c794e6', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinnguoidung`
--

CREATE TABLE `thongtinnguoidung` (
  `USERNAME` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `FULLNAME` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AVARTA` varchar(100) COLLATE utf8_unicode_ci DEFAULT './ROOT/AVARTA/anhdaidien.png',
  `NGAYSINH` date DEFAULT NULL,
  `GIOITINH` varchar(4) COLLATE utf8_unicode_ci DEFAULT 'Nam',
  `DIENTHOAI` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DUNGLUONGDADUNG` tinyint(4) DEFAULT 0,
  `THUMUCROOT` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtinnguoidung`
--

INSERT INTO `thongtinnguoidung` (`USERNAME`, `FULLNAME`, `EMAIL`, `AVARTA`, `NGAYSINH`, `GIOITINH`, `DIENTHOAI`, `DUNGLUONGDADUNG`, `THUMUCROOT`) VALUES
('admin123', 'ADMIN', 'driverDA@gmail.com', './ROOT/AVARTA/anhdaidien.png', '1980-05-05', 'Nam', '0967835462', 25, 'FD00000001'),
('kensakuai', 'Kensaku Ai', 'kensakuai1475@gmail.com', './ROOT/AVARTA/anhdaidien.png', NULL, 'Nam', NULL, 0, 'FD00000005'),
('tranhungtrong123', 'Trần Hưng Trọng', 'tranhungtrong123@gmail.com', './ROOT/AVARTA/anhdaidien.png', '2000-12-21', 'Nam', '0939943056', 9, 'FD00000002'),
('UserNew1', 'New User', 'user1new@gmail.com', './ROOT/AVARTA/anhdaidien.png', NULL, 'Nam', NULL, 0, 'FD00000004'),
('VNBaoAnh', 'Võ Nguyễn Bảo Anh', 'banhanhvo@gmail.com', './ROOT/AVARTA/anhdaidien.png', NULL, 'Nữ', NULL, 1, 'FD00000006');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thucthe`
--

CREATE TABLE `thucthe` (
  `MATHUCTHE` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `TEN` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `CHUSOHUU` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `NGAYTAO` date DEFAULT NULL,
  `PATH_R` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `TRUCTHUOC` varchar(12) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'FD00000001',
  `TRANGTHAI` bit(1) DEFAULT b'1',
  `DAUSAO` bit(1) DEFAULT b'0',
  `TYPETHUCTHE` bit(1) DEFAULT b'0' COMMENT '0 là Folder, 1 là file',
  `size` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thucthe`
--

INSERT INTO `thucthe` (`MATHUCTHE`, `TEN`, `CHUSOHUU`, `NGAYTAO`, `PATH_R`, `TRUCTHUOC`, `TRANGTHAI`, `DAUSAO`, `TYPETHUCTHE`, `size`) VALUES
('FD00000001', 'ROOT', 'admin123', '2020-04-05', './ROOT', 'FD00000000', b'1', b'0', b'0', 5),
('FD00000002', 'MyDrive', 'tranhungtrong123', '2020-05-05', './ROOT/MyDrive', 'FD00000001', b'1', b'0', b'0', 9),
('FD00000003', 'asas', 'tranhungtrong123', '2020-05-05', './ROOT/MyDrive/asas', 'FD00000002', b'1', b'1', b'0', 0),
('FD00000004', 'dWbPAlrm0c', 'UserNew1', '2020-05-25', './ROOT/dWbPAlrm0c', 'FD00000001', b'1', b'0', b'0', 0),
('FD00000005', 'Jg9i7SX3rv', 'kensakuai', '2020-05-25', './ROOT/Jg9i7SX3rv', 'FD00000001', b'1', b'0', b'0', 0),
('FD00000006', 'xLrDcgtvAU', 'VNBaoAnh', '2020-05-25', './ROOT/xLrDcgtvAU', 'FD00000001', b'1', b'0', b'0', 1),
('FD00000008', 'khsyxv', 'tranhungtrong123', '2020-05-26', './ROOT/MyDrive/asas/khsyxv', 'FD00000003', b'1', b'0', b'0', 0),
('FD00000009', 'aiijx', 'tranhungtrong123', '2020-05-26', './ROOT/MyDrive/asas/aiijx', 'FD00000003', b'1', b'0', b'0', 0),
('FD00000010', 'lxisj', 'tranhungtrong123', '2020-05-26', './ROOT/MyDrive/asas/lxisj', 'FD00000003', b'1', b'0', b'0', 0),
('FD00000011', 'ijxkp', 'tranhungtrong123', '2020-05-26', './ROOT/MyDrive/asas/ijxkp', 'FD00000003', b'1', b'0', b'0', 0),
('FD00000012', 'kjoah2', 'tranhungtrong123', '2020-05-26', './ROOT/MyDrive/kjoah2', 'FD00000002', b'1', b'0', b'0', 4),
('FD00000013', 'assa', 'tranhungtrong123', '2020-05-28', './ROOT/MyDrive/assa', 'FD00000002', b'1', b'0', b'0', 0),
('FD00000014', 'dada', 'tranhungtrong123', '2020-05-28', './ROOT/MyDrive/assa/ad/dada', 'FD00000015', b'1', b'0', b'0', 0),
('FD00000015', 'ad', 'tranhungtrong123', '2020-05-28', './ROOT/MyDrive/assa/ad', 'FD00000013', b'1', b'0', b'0', 0),
('FD00000016', 'czda', 'tranhungtrong123', '2020-05-28', './ROOT/MyDrive/assa/ad/czda', 'FD00000015', b'1', b'0', b'0', 0),
('FD00000017', 'ydf', 'tranhungtrong123', '2020-05-29', './ROOT/MyDrive/kjoah2/ydf', 'FD00000012', b'1', b'0', b'0', 0),
('FD00000018', 'kpzsd', 'VNBaoAnh', '2020-05-29', './ROOT/xLrDcgtvAU/kpzsd', 'FD00000006', b'1', b'0', b'0', 0),
('FD00000019', 'oaisne', 'VNBaoAnh', '2020-05-29', './ROOT/xLrDcgtvAU/oaisne', 'FD00000006', b'1', b'0', b'0', 0),
('FD00000020', 'kshix', 'VNBaoAnh', '2020-05-31', './ROOT/xLrDcgtvAU/kshix', 'FD00000006', b'1', b'0', b'0', 0),
('FD00000021', 'dauyso', 'VNBaoAnh', '2020-05-31', './ROOT/xLrDcgtvAU/dauyso', 'FD00000006', b'1', b'0', b'0', 0),
('FD00000022', 'ts23', 'tranhungtrong123', '2020-05-31', './ROOT/MyDrive/ts23', 'FD00000002', b'0', b'0', b'0', 0),
('FD00000023', 'asddxb', 'tranhungtrong123', '2020-05-31', './ROOT/MyDrive/asddxb', 'FD00000002', b'1', b'0', b'0', 0),
('FD00000024', 'hftjh', 'tranhungtrong123', '2020-05-31', './ROOT/MyDrive/hftjh', 'FD00000002', b'0', b'0', b'0', 0),
('FD00000025', 'asdx', 'tranhungtrong123', '2020-05-31', './ROOT/MyDrive/hftjh/asdx', 'FD00000024', b'1', b'0', b'0', 0),
('FD00000026', 'dffas', 'tranhungtrong123', '2020-05-31', './ROOT/MyDrive/hftjh/dffas', 'FD00000024', b'1', b'0', b'0', 0),
('FI00000001', 'TA2.txt', 'tranhungtrong123', '2020-05-30', './ROOT/MyDrive/TA2.txt', 'FD00000002', b'0', b'0', b'1', 0),
('FI00000003', 'output1.txt', 'tranhungtrong123', '2020-05-30', './ROOT/MyDrive/output1.txt', 'FD00000002', b'1', b'0', b'1', 0),
('FI00000004', 'Untitled.png', 'tranhungtrong123', '2020-05-30', './ROOT/MyDrive/Untitled.png', 'FD00000002', b'1', b'0', b'1', 0),
('FI00000005', 'Lab7.pdf', 'tranhungtrong123', '2020-05-30', './ROOT/MyDrive/Lab7.pdf', 'FD00000002', b'1', b'0', b'1', 0),
('FI00000006', 'Thời gian biểu.png', 'tranhungtrong123', '2020-05-30', './ROOT/MyDrive/kjoah2/Thời gian biểu.png', 'FD00000012', b'1', b'0', b'1', 0),
('FI00000007', 'xu-ly-anh.pdf', 'admin123', '2020-05-30', './ROOT/xu-ly-anh.pdf', 'FD00000001', b'1', b'0', b'1', 0),
('FI00000008', 'Bac-Phan-Jack-K-ICM.mp3', 'tranhungtrong123', '2020-05-30', './ROOT/MyDrive/kjoah2/Bac-Phan-Jack-K-ICM.mp3', 'FD00000012', b'1', b'0', b'1', 4),
('FI00000009', 'socket_p_3_2_1.jpg', 'tranhungtrong123', '2020-05-31', './ROOT/MyDrive/socket_p_3_2_1.jpg', 'FD00000002', b'1', b'0', b'1', 0),
('FI00000011', '75282391_1157386014465398_5127500217603588096_n.jpg', 'VNBaoAnh', '2020-05-31', './ROOT/xLrDcgtvAU/75282391_1157386014465398_5127500217603588096_n.jpg', 'FD00000006', b'0', b'0', b'1', 0),
('FI00000012', 'ÔN-THI-MẠNG-MÁY-TÍNH.pdf', 'VNBaoAnh', '2020-05-31', './ROOT/xLrDcgtvAU/ÔN-THI-MẠNG-MÁY-TÍNH.pdf', 'FD00000006', b'1', b'0', b'1', 0),
('FI00000013', '[hoctap.suctremmt.com]chia ip.pptx', 'VNBaoAnh', '2020-05-31', './ROOT/xLrDcgtvAU/[hoctap.suctremmt.com]chia ip.pptx', 'FD00000006', b'1', b'0', b'1', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thungrac`
--

CREATE TABLE `thungrac` (
  `MATHUCTHE` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `NGAYXOA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thungrac`
--

INSERT INTO `thungrac` (`MATHUCTHE`, `NGAYXOA`) VALUES
('FD00000008', '2020-05-27'),
('FD00000018', '2020-05-29'),
('FD00000022', '2020-05-31'),
('FD00000024', '2020-05-31'),
('FI00000001', '2020-05-31'),
('FI00000011', '2020-05-31');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`STT`);

--
-- Chỉ mục cho bảng `chiase`
--
ALTER TABLE `chiase`
  ADD PRIMARY KEY (`MATHUCTHE`,`USERNAME`),
  ADD KEY `FK_CHIASE_TAIKHOAN` (`USERNAME`);

--
-- Chỉ mục cho bảng `chiaseall`
--
ALTER TABLE `chiaseall`
  ADD PRIMARY KEY (`MATHUCTHE`),
  ADD UNIQUE KEY `IDREAD` (`IDREAD`);

--
-- Chỉ mục cho bảng `ganday`
--
ALTER TABLE `ganday`
  ADD PRIMARY KEY (`MAFILE`);

--
-- Chỉ mục cho bảng `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  ADD PRIMARY KEY (`MATYPE`);

--
-- Chỉ mục cho bảng `matkhaushare`
--
ALTER TABLE `matkhaushare`
  ADD UNIQUE KEY `MATHUCTHE` (`MATHUCTHE`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`USERNAME`),
  ADD KEY `FK_TYPE_TAIKHOAN` (`TYPE_TAIKHOAN`);

--
-- Chỉ mục cho bảng `thongtinnguoidung`
--
ALTER TABLE `thongtinnguoidung`
  ADD PRIMARY KEY (`USERNAME`),
  ADD KEY `FK_THUMUCROOT` (`THUMUCROOT`);

--
-- Chỉ mục cho bảng `thucthe`
--
ALTER TABLE `thucthe`
  ADD PRIMARY KEY (`MATHUCTHE`),
  ADD KEY `FK_TRUCTHUOC` (`CHUSOHUU`);

--
-- Chỉ mục cho bảng `thungrac`
--
ALTER TABLE `thungrac`
  ADD PRIMARY KEY (`MATHUCTHE`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `STT` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chiase`
--
ALTER TABLE `chiase`
  ADD CONSTRAINT `FK_CHIASE_TAIKHOAN` FOREIGN KEY (`USERNAME`) REFERENCES `taikhoan` (`USERNAME`),
  ADD CONSTRAINT `FK_CHIASE_THUCTHE` FOREIGN KEY (`MATHUCTHE`) REFERENCES `thucthe` (`MATHUCTHE`);

--
-- Các ràng buộc cho bảng `chiaseall`
--
ALTER TABLE `chiaseall`
  ADD CONSTRAINT `FK_CHIASEALL` FOREIGN KEY (`MATHUCTHE`) REFERENCES `thucthe` (`MATHUCTHE`);

--
-- Các ràng buộc cho bảng `ganday`
--
ALTER TABLE `ganday`
  ADD CONSTRAINT `FK_GANDAY_THUCTHE` FOREIGN KEY (`MAFILE`) REFERENCES `thucthe` (`MATHUCTHE`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `FK_TYPE_TAIKHOAN` FOREIGN KEY (`TYPE_TAIKHOAN`) REFERENCES `loaitaikhoan` (`MATYPE`);

--
-- Các ràng buộc cho bảng `thongtinnguoidung`
--
ALTER TABLE `thongtinnguoidung`
  ADD CONSTRAINT `FK_THUMUCROOT` FOREIGN KEY (`THUMUCROOT`) REFERENCES `thucthe` (`MATHUCTHE`),
  ADD CONSTRAINT `FK_USERNAME_TAIKHOAN` FOREIGN KEY (`USERNAME`) REFERENCES `taikhoan` (`USERNAME`);

--
-- Các ràng buộc cho bảng `thucthe`
--
ALTER TABLE `thucthe`
  ADD CONSTRAINT `FK_TRUCTHUOC` FOREIGN KEY (`CHUSOHUU`) REFERENCES `taikhoan` (`USERNAME`);

--
-- Các ràng buộc cho bảng `thungrac`
--
ALTER TABLE `thungrac`
  ADD CONSTRAINT `FK_THUNGRAC_THUCTHE` FOREIGN KEY (`MATHUCTHE`) REFERENCES `thucthe` (`MATHUCTHE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
