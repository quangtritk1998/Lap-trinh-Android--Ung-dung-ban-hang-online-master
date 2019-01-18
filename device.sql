-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 10, 2019 lúc 12:50 PM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `device`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `ID` int(11) NOT NULL,
  `CustomerName` varchar(200) NOT NULL,
  `PhoneNumber` int(11) NOT NULL,
  `Email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `devicetype`
--

CREATE TABLE `devicetype` (
  `ID` int(11) NOT NULL,
  `ProductName` varchar(200) NOT NULL,
  `Image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `devicetype`
--

INSERT INTO `devicetype` (`ID`, `ProductName`, `Image`) VALUES
(1, 'Điện thoai', 'https://cdn.tgdd.vn/Products/Images/42/114111/iphone-x-256gb-h2-400x460-400x460.png'),
(2, 'Laptop', 'https://hanoicomputercdn.com/media/product/43208_1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `ID` int(11) NOT NULL,
  `OrderCode` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(200) NOT NULL,
  `Price` int(11) NOT NULL,
  `Number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`ID`, `OrderCode`, `ProductID`, `ProductName`, `Price`, `Number`) VALUES
(12, 6, 4, 'Laptop HP 15 da0054TU i3 7020U/4GB/500GB/Win10/(4ME68PA)', 21980000, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `ProductName` varchar(200) NOT NULL,
  `Price` int(11) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `ProductDetail` varchar(1000) NOT NULL,
  `ProductID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ID`, `ProductName`, `Price`, `Image`, `ProductDetail`, `ProductID`) VALUES
(4, 'Laptop HP 15 da0054TU i3 7020U/4GB/500GB/Win10/(4ME68PA)', 10990000, 'https://cdn.tgdd.vn/Products/Images/44/177770/hp-15-da0054tu-4me68pa-thumb-600x600.jpg', 'HP 15 da0054TU sở hữu thiết kế đơn giản, nhưng cũng không kém phần sang trọng và tinh tế với chất liệu từ nhựa cùng họa tiết vân tròn đồng tâm đẹp mắt. Máy với độ dày chỉ 22.5 mm cùng trọng lượng chỉ 1.77 kg tiện lợi cho người dùng mang máy theo sử dụng.', 2),
(5, 'Laptop HP Pavilion 14 ce0021TU i3 8130U/4GB/1TB/Win10/(4MF00PA)', 12990000, 'https://cdn.tgdd.vn/Products/Images/44/177638/hp-pavilion-14-ce0021tu-i-4mf00pa-33397-ava1-600x600.jpg', 'Đặc điểm nổi bật của HP Pavilion 14 ce0021TU i3 8130U/4GB/1TB/Win10/(4MF00PA)\r\n\r\nBộ sản phẩm chuẩn: Dây nguồn, Sách hướng dẫn, Thùng máy, Adapter sạc\r\n\r\nBên cạnh thiết kế mỏng nhẹ, thời trang phù hợp cho việc di chuyển hằng ngày đến công sở, lớp học. Là một chiếc laptop văn phòng - HP Pavilion 14 ce0021TU sở hữu cấu hình vừa đủ mạnh xử lý tốt các ứng dụng văn phòng, đồ hoạ cơ bản cùng mức giá bán hấp dẫn sẽ phù hợp với học sinh, sinh viên hay những người thường xuyên sử dụng với những ứng dụng không quá nặng.\r\nThiết kế mỏng nhẹ, dễ dàng di chuyển\r\nĐược hoàn thiện từ chất liệu nhựa, các cạnh được bo cong cứng cáp với trọng lượng chỉ 1.59 kg và dày 17.79 mm giúp việc mang vác hằng ngày đến công ty của bạn trở nên dễ dàng và thuận tiện hơn.', 2),
(6, 'Điện thoại Samsung Galaxy Note 9', 22990000, 'https://cdn.tgdd.vn/Products/Images/42/154897/samsung-galaxy-note-9-black-400x460-400x460.png', 'Chiếc điện thoại Samsung mới vẫn thừa hưởng lối thiết kế vô cùng quyến rũ từ đàn anh của mình với thân hình mạnh mẽ và được cách điệu bởi những đường cong mềm mại.', 1),
(7, 'Điện thoại Samsung Galaxy J4', 3490000, 'https://cdn.tgdd.vn/Products/Images/42/160730/samsung-galaxy-j4-plus-pink-400x460.png', 'Samsung Galaxy J4+ sở hữu cho mình camera chính với độ phân giải 13 MP cùng khẩu độ lớn f/1.9.\r\n\r\nCamera chính trên điện thoại Samsung Galaxy J4+\r\n\r\nMáy cho khả năng lấy nét nhanh giúp bạn bắt trọn mọi khoảnh khắc trong cuộc sống.', 1),
(8, 'Điện thoại OPPO A3s 32GB', 4690000, 'https://cdn.tgdd.vn/Products/Images/42/183994/oppo-a3s-32gb-400x460.png', 'Thiết kế thời trang với màu sắc sang trọng\r\nOPPO A3s sở hữu cho mình vẻ bề ngoài sang trọng và tinh tế không kém gì các thiết bị cao cấp.', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `devicetype`
--
ALTER TABLE `devicetype`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `devicetype`
--
ALTER TABLE `devicetype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
