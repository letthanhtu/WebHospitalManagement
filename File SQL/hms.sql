-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2024 lúc 01:25 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hms`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', 'admin@123', '11-10-2024 11:42:05 AM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(1, 'Tai Mũi Họng', 1, 1, 200000, '2024-10-30', '9:15 AM', '2024-10-15 03:42:11', 1, 1, NULL),
(2, 'Nội Tiết', 2, 2, 350000, '2024-10-29', '2:45 PM', '2024-10-16 09:08:54', 1, 1, NULL),
(3, 'Tai Mũi Họng', 1, 1, 200000, '2024-11-22', '12:00 AM', '2024-11-19 16:54:41', 1, 1, NULL),
(4, 'Sản Phụ Khoa', 8, 2, 500000, '2024-11-20', '9:30 AM', '2024-11-19 18:29:52', 1, 1, NULL),
(5, 'Chấn Thương Chỉnh Hình', 5, 4, 500000, '2024-11-21', '10:00 AM', '2024-11-19 21:02:13', 1, 1, NULL),
(6, 'Nội Khoa', 6, 4, 400000, '2024-11-20', '11:15 AM', '2024-11-19 21:04:50', 0, 1, '2024-11-19 21:08:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'Tai Mũi Họng', 'Nguyễn Văn Nam', '123 Phố Huế, Hà Nội', '200000', 84987654321, 'vannam@doctor.com', 'a9c226e09fbc9d498000a3e243713067', '2024-10-10 11:16:52', '0000-00-00 00:00:00'),
(2, 'Nội Tiết', 'Trần Thị B', '456 Nguyễn Trãi, TP Hồ Chí Minh', '350000', 84912345678, 'tranthib@doctor.com', 'f925916e2754e5e03f75dd58a5733251', '2024-10-10 18:06:41', '2024-10-14 02:26:28'),
(3, 'Da Liễu', 'Hoàng Quốc Bảo', '234 Nguyễn Huệ, Huế', '200000', 84984455667, 'bao.dalieuhue@doctor.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2024-10-04 05:00:00', NULL),
(4, 'Nhi Khoa', 'Phạm Minh Châu', '789 Lý Thường Kiệt, Đà Nẵng', '250000', 84933445566, 'phamminhchau@doctor.com', 'f925916e2754e5e03f75dd58a5733251', '2024-10-16 02:12:23', '2024-10-14 02:26:30'),
(5, 'Chấn Thương Chỉnh Hình', 'Lê Quốc Hùng', '56 Pasteur, TP Hồ Chí Minh', '500000', 84955667788, 'lequochung@doctor.com', 'f925916e2754e5e03f75dd58a5733251', '2024-10-16 02:13:11', '2024-10-14 03:26:28'),
(6, 'Nội Khoa', 'Nguyễn Phương Anh', '34 Đinh Tiên Hoàng, Hà Nội', '400000', 84966778899, 'nguyenphuonganh@doctor.com', 'f925916e2754e5e03f75dd58a5733251', '2024-10-16 02:14:11', '2024-10-14 02:10:28'),
(7, 'Sản Phụ Khoa', 'Trần Hoàng Yến', '23 Hai Bà Trưng, TP Hồ Chí Minh', '300000', 84977889900, 'tranhoangyen@doctor.com', 'f925916e2754e5e03f75dd58a5733251', '2024-10-16 02:15:18', '2024-10-14 01:26:28'),
(8, 'Sản Phụ Khoa', 'Lê Thị Thanh Tú', '56 Đường 3 Tháng 2, Phường 12, Quận 10,Tp.HCM', '500000', 987172563, 'thanhtu@doctor.com', '289cdbbb6b857eeb9e4fd5e6dd2a0097', '2024-11-19 18:26:25', NULL),
(9, 'Chẩn Đoán Hình Ảnh', 'Nguyễn Văn Kiên', '123 Hai Bà Trưng, Hà Nội', '450000', 84986677889, 'kien.chandoan@doctor.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2024-10-06 07:00:00', NULL),
(10, 'Phẫu Thuật Tổng Quát', 'Trần Minh Đức', '456 Điện Biên Phủ, TP HCM', '500000', 84987788990, 'duc.pttongquat@doctor.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2024-10-07 08:00:00', NULL),
(11, 'Nha Khoa', 'Lê Thanh Hương', '789 Võ Thị Sáu, Nha Trang', '300000', 84988899001, 'huong.nhakhoa@doctor.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2024-10-08 09:00:00', NULL),
(12, 'Gây Mê Hồi Sức', 'Phạm Quốc Anh', '321 Pasteur, TP HCM', '600000', 84989900112, 'anh.gayme@doctor.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2024-10-09 10:00:00', NULL),
(13, 'Giải Phẫu Bệnh', 'Nguyễn Thị Tâm', '123 Lê Lợi, Đà Nẵng', '550000', 84990011223, 'tam.giaiphau@doctor.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2024-10-10 11:00:00', NULL),
(14, 'Chăm Sóc Răng Miệng', 'Trần Thị Linh', '321 Nguyễn Trãi, TP HCM', '250000', 84991122334, 'linh.chamsoc@doctor.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2024-10-11 12:00:00', NULL),
(15, 'Chuyên Gia Da Liễu', 'Hoàng Minh Tú', '456 Nguyễn Văn Linh, Đà Nẵng', '450000', 84992233445, 'tu.dalieuchuyen@doctor.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2024-10-12 13:00:00', NULL),
(16, 'Chuyên Gia Nội Tiết', 'Nguyễn Quốc Phong', '789 Võ Nguyên Giáp, Hà Nội', '400000', 84993344556, 'phong.noitiet@doctor.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2024-10-13 14:00:00', NULL),
(17, 'Chuyên Gia Thần Kinh', 'Phạm Thanh Sơn', '123 Phan Chu Trinh, TP HCM', '600000', 84994455667, 'son.thankinh@doctor.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2024-10-14 15:00:00', NULL),
(18, 'Gây Mê Hồi Sức', 'Gia Bảo', 'Biên Hòa, Đồng Nai', '300000', 658413524, 'giabao@doctor.com', 'b6c6cfe1a7ba5eac0f984f3ef97c8490', '2024-11-19 23:13:17', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 1, 'vannam@doctor.com', 0x3a3a3100000000000000000000000000, '2024-10-16 05:19:33', NULL, 1),
(2, 1, 'vannam@doctor.com', 0x3a3a3100000000000000000000000000, '2024-10-16 09:01:03', '16-10-2024 02:37:32 PM', 1),
(3, 1, 'vannam@doctor.com', 0x3a3a3100000000000000000000000000, '2024-11-19 16:55:30', NULL, 1),
(4, NULL, 'thanhtu@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-19 18:22:40', NULL, 0),
(5, NULL, 'thanhtu@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-19 18:22:45', NULL, 0),
(6, 5, 'lequochung@doctor.com', 0x3a3a3100000000000000000000000000, '2024-11-19 21:25:13', NULL, 1),
(7, 1, 'vannam@doctor.com', 0x3a3a3100000000000000000000000000, '2024-11-19 22:19:03', '20-11-2024 03:49:15 AM', 1),
(8, 1, 'vannam@doctor.com', 0x3a3a3100000000000000000000000000, '2024-11-19 22:22:50', NULL, 1),
(9, 1, 'vannam@doctor.com', 0x3a3a3100000000000000000000000000, '2024-11-20 00:21:29', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(1, 'Chấn Thương Chỉnh Hình', '2024-10-09 18:09:46', '2024-10-14 09:26:47'),
(2, 'Nội Khoa', '2024-10-09 18:09:46', '2024-10-14 09:26:56'),
(3, 'Sản Phụ Khoa', '2024-10-09 18:09:46', '2024-10-14 09:26:56'),
(4, 'Da Liễu', '2024-10-09 18:09:46', '2024-10-14 09:26:56'),
(5, 'Nhi Khoa', '2024-10-09 18:09:46', '2024-10-14 09:26:56'),
(6, 'Chẩn Đoán Hình Ảnh', '2024-10-09 18:09:46', '2024-10-14 09:26:56'),
(7, 'Phẫu Thuật Tổng Quát', '2024-10-09 18:09:46', '2024-10-14 09:26:56'),
(8, 'Nhãn Khoa', '2024-10-09 18:09:46', '2024-10-14 09:26:56'),
(9, 'Gây Mê Hồi Sức', '2024-10-09 18:09:46', '2024-10-14 09:26:56'),
(10, 'Giải Phẫu Bệnh', '2024-10-09 18:09:46', '2024-10-14 09:26:56'),
(11, 'Tai Mũi Họng', '2024-10-09 18:09:46', '2024-10-14 09:26:56'),
(12, 'Chăm Sóc Răng Miệng', '2024-10-09 18:09:46', '2024-10-14 09:26:56'),
(13, 'Chuyên Gia Da Liễu', '2024-10-09 18:09:46', '2024-10-14 09:26:56'),
(14, 'Chuyên Gia Nội Tiết', '2024-10-09 18:09:46', '2024-10-14 09:26:56'),
(15, 'Chuyên Gia Thần Kinh', '2024-10-09 18:09:46', '2024-10-14 09:26:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblcontactus`
--

INSERT INTO `tblcontactus` (`id`, `fullname`, `email`, `contactno`, `message`, `PostingDate`, `AdminRemark`, `LastupdationDate`, `IsRead`) VALUES
(1, 'Nguyễn Văn Nam', 'vannam@doctor.com', 1425362514, 'Trang web tiện lợi khi có thể đặt lịch trước và bác sĩ có thể quản lý hồ sơ của tôi một cách tự động, hiệu quả', '2024-10-20 16:52:03', 'Duyệt', '2024-11-19 19:44:22', 1),
(2, 'Trần Thị B', 'tranthib@doctor.com', 1111122233, 'Tôi cần Bạn giúp tôi Đặt một anh bác sĩ Đẹp trai ', '2024-10-23 13:13:41', 'Liên hệ với bệnh nhân', '2024-11-19 19:27:04', 1),
(3, 'Nguyễn Văn A', 'nguyenvana@example.com', 987654321, 'Trang web rất dễ sử dụng, giao diện thân thiện và thao tác mượt mà. Cảm ơn đội ngũ!', '2024-11-19 19:25:26', NULL, NULL, 0),
(4, 'Trần Thị Bích', 'tranbich@example.com', 976543210, 'Dịch vụ tốt, nhưng cần cải thiện tốc độ tải trang ở một số khu vực.', '2024-11-19 19:25:26', NULL, NULL, 0),
(5, 'Hoàng Quốc Cường', 'hoangcuong@example.com', 912345678, 'Tôi rất hài lòng với tính năng đặt lịch khám. Nên bổ sung thêm phần thông báo tự động.', '2024-11-19 19:25:26', NULL, NULL, 0),
(6, 'Lê Thu Hương', 'lehuong@example.com', 901234567, 'Hệ thống quản lý khá tốt, tuy nhiên đôi khi bị lỗi khi cập nhật thông tin bệnh nhân.', '2024-11-19 19:25:26', NULL, NULL, 0),
(7, 'Phạm Văn Dũng', 'phamdung@example.com', 934567890, 'Giao diện đẹp, thông tin rõ ràng. Mong muốn có thêm phần hỗ trợ qua chat trực tuyến.', '2024-11-19 19:25:26', NULL, NULL, 0),
(8, 'Tuấn Hưng', 'hung@gmail.com', 598564654, 'Hệ thống trang web đẹp đẽ, dễ sử dụng, giúp tôi tốn ít thời gian hơn khi chờ đợi khám bệnh vì đã dặt lịch hẹn trước trên hệ thống', '2024-11-19 22:41:27', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`, `CreationDate`) VALUES
(1, 2, '80/120', '110', '85', '97', 'Dolo,\r\nLevocit 5mg', '2024-10-16 09:07:16'),
(2, 3, '120/80 mmHg', '5.8 mmol/L', '42kg', '32(độ C)', 'Thuốc giảm ho và kháng sinh', '2024-11-19 17:03:15'),
(3, 4, '130/89 mmHg', '6.8 mmol/L', '52', '32(độ C)', ' Azithromycin 500mg, Metformin 850mg', '2024-11-19 21:41:31'),
(4, 4, '130/89 mmHg', '6.8 mmol/L', '52', '32(độ C)', ' Azithromycin 500mg, Metformin 850mg', '2024-11-19 21:42:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp(),
  `OpenningTime` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `OpenningTime`) VALUES
(1, 'aboutus', 'Giới thiệu', '<ul style=\"padding: 0px; margin-right: 0px; margin-bottom: 1.313em; margin-left: 1.655em;\" times=\"\" new=\"\" roman\";=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" center;=\"\" background-color:=\"\" rgb(255,=\"\" 246,=\"\" 246);\"=\"\"><li style=\"text-align: left;\"><font color=\"#000000\">Hệ thống Quản lý Bệnh viện (WECARE) được thiết kế để thay thế hệ thống thủ công, dựa trên giấy hiện có tại các bệnh viện. Hệ thống mới này giúp quản lý các thông tin sau: thông tin bệnh nhân, tình trạng phòng bệnh, lịch làm việc của nhân viên và phòng mổ, cũng như hóa đơn bệnh nhân. Các dịch vụ này được cung cấp một cách hiệu quả và tiết kiệm chi phí, với mục tiêu giảm thiểu thời gian và nguồn lực cần thiết cho các nhiệm vụ này.</font></li><li style=\"text-align: left;\"><font color=\"#000000\">Một phần quan trọng trong hoạt động của bất kỳ bệnh viện nào là việc thu thập, quản lý và truy xuất kịp thời lượng thông tin lớn. Các thông tin này bao gồm: thông tin cá nhân và lịch sử bệnh tật của bệnh nhân, thông tin nhân viên, lịch phòng và khoa, lịch làm việc của nhân viên, lịch phòng mổ và danh sách chờ các dịch vụ. Tất cả thông tin này phải được quản lý một cách hiệu quả và tiết kiệm chi phí để tài nguyên của bệnh viện có thể được sử dụng một cách tối ưu. WECARE sẽ tự động hóa việc quản lý bệnh viện, giúp tăng hiệu quả và giảm thiểu sai sót. Mục tiêu của hệ thống là chuẩn hóa dữ liệu, hợp nhất dữ liệu, đảm bảo tính toàn vẹn của dữ liệu và giảm thiểu sự không nhất quán.</font></li></ul>', NULL, NULL, '2020-05-20 07:21:52', NULL),
(2, 'contactus', 'Thông Tin Liên Hệ', 'Thới Tam Thôn, HoocMon, Thành phố Hồ Chí Minh', 'info@gmail.com', 1122334455, '2020-10-20 07:24:07', '8 giờ sáng đến 8 giờ tối');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` bigint(10) DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext DEFAULT NULL,
  `PatientAge` int(10) DEFAULT NULL,
  `PatientMedhis` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `Docid`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientAge`, `PatientMedhis`, `CreationDate`, `UpdationDate`) VALUES
(1, 1, 'Nguyễn Văn A', 452463210, 'nguyenvana@gmail.com', 'Nam', 'Không xác định', 32, 'Sốt, Cảm lạnh', '2024-05-16 05:23:35', NULL),
(2, 1, 'Trần Thị B', 4545454545, 'tranthib@gmail.com', 'Nữ', 'Không xác định', 45, 'Sốt', '2024-05-16 09:01:26', NULL),
(3, 1, 'Phương Linh', 845245262, 'phuonglinh@gmail.com', 'Nữ', '456 Nguyễn Trãi, TP Hồ Chí Minh', 20, 'Bệnh dạ dày', '2024-11-19 17:00:52', '2024-11-19 22:33:26'),
(4, 5, 'Tuấn Hưng', 546235154, 'hung@gmail.com', 'Nam', 'quận 12', 20, 'Bệnh tim', '2024-11-19 21:26:52', '2024-11-19 21:38:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 1, 'hongloan@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-15 03:41:48', NULL, 1),
(2, 2, 'phuonglinh@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-16 09:08:06', '16-10-2024 02:41:06 PM', 1),
(3, 1, 'hongloan@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-19 16:53:02', '19-11-2024 11:51:25 PM', 1),
(4, 3, 'thanhtu@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-19 18:18:44', NULL, 1),
(5, 3, 'thanhtu@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-19 18:26:53', '19-11-2024 11:57:14 PM', 1),
(6, 2, 'phuonglinh@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-19 18:29:13', NULL, 1),
(7, 4, 'hung@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-19 20:56:24', NULL, 1),
(8, 4, 'hung@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-19 21:43:12', '20-11-2024 03:27:05 AM', 1),
(9, NULL, 'ngoclinh@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-19 22:01:54', NULL, 0),
(10, 6, 'ngoclinh@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-19 22:02:11', NULL, 1),
(11, 1, 'hongloan@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-20 00:18:39', NULL, 1),
(12, 1, 'hongloan@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-20 00:21:02', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`, `updationDate`) VALUES
(1, 'Hồng Loan', '789 Lý Thường Kiệt', 'Đà Nẵng', 'Nữ', 'hongloan@gmail.com', 'd78f838360034c1834bc715bf20a53b8', '2024-10-20 12:13:56', '0000-00-00 00:00:00'),
(2, 'Phương Linh', '23 Hai Bà Trưng', 'TP Hồ Chí Minh', 'Nữ', 'phuonglinh@gmail.com', '009b35b6a859335651d384702f545a04', '2024-10-21 13:15:32', '2024-11-19 18:28:58'),
(3, 'Thanh Tú', '56 Đường 3 Tháng 2, Phường 12, Quận 10,', 'Hồ Chí Minh', 'female', 'thanhtu@gmail.com', '289cdbbb6b857eeb9e4fd5e6dd2a0097', '2024-11-19 18:18:30', NULL),
(4, 'Tuấn Hưng', 'quận 12', 'Thành Phố Hồ Chí Minh', 'Nam', 'hung@gmail.com', '87cfe89dd6e63c2ae0a206cecc4c3b64', '2024-11-19 20:44:48', '2024-11-19 21:53:53'),
(6, 'Ngọc Linh', 'Quận 10', 'Thành Phố Hồ Chí Minh', 'Nam', 'ngoclinh@gmail.com', '009b35b6a859335651d384702f545a04', '2024-11-19 22:01:29', '2024-11-19 22:02:28');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
