-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2025 at 09:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `c_ID` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_ID`, `c_name`) VALUES
(1, 'เครื่องเขียน'),
(2, 'อุปกรณ์กีฬา'),
(3, 'เครื่องแบบ'),
(4, 'อุปกรณ์งานฝีมือ');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_ID` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_detail` text DEFAULT NULL,
  `p_price` decimal(10,2) NOT NULL,
  `p_total` int(11) NOT NULL,
  `c_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_ID`, `p_name`, `p_detail`, `p_price`, `p_total`, `c_ID`) VALUES
(1, 'ปากกา', 'ปากกาเจล K35 ขนาดหัว 0.5mm ด้ามจับมียางกันลื่น', 20.00, 10, 1),
(2, 'ลูกขนไก่', 'GRAND SPORT', 35.00, 10, 2),
(3, 'ผ้าพันคอลูกเสือ-เนตรนารี', 'สำหรับลูกเสือและเนตรนารี ระดับมัธยมศึกษา', 50.00, 8, 3),
(4, 'สะดึง', 'ใช้สำหรับปักผ้า', 15.00, 12, 4),
(5, 'ยางลบ', 'STAEDTLER ยางลบ', 5.00, 10, 1),
(6, 'กบเหลาดินสอ', 'Master Art กบเหลาดินสอ', 20.00, 9, 1),
(7, 'ดินสอ', 'STAEDTLER ดินสอ HB', 5.00, 19, 1),
(8, 'ดินสอกด', 'PENTEL ดินสอกด รุ่น Caplet A105 ขนาด 0.5 มม', 30.00, 4, 1),
(9, 'ไส้ดินสอกด', 'PENTAL C275S ไส้ดินสอกด 0.5 มม. 2B ', 12.00, 6, 1),
(13, 'ถุงเท้าสีพื้น', 'GOLDCITY ถุงเท้าสีพื้น รุ่น SO04 free-size', 29.00, 12, 3),
(14, 'ปากกาเคมี 2 หัว', 'ตราม้า ปากกาเคมี 2 หัวสีน้ำเงิน 2 มม./1-5 มม.', 12.00, 24, 1),
(15, 'หมึกเติมปากกาเคมี', 'Pilot หมึกเติมปากกาเคมี  สีเขียว 30 cc.', 33.00, 24, 1),
(16, 'เทปOPP', 'UNITAPE เทปOPP สีชา 2 1/2 นิ้วx45 หลา', 47.00, 12, 1),
(17, 'กรรไกร', 'กรรไกร Panda 206 6 นิ้ว', 30.00, 15, 1),
(18, 'เสื้อเชิ้ตนักเรียนชาย', 'เสื้อเชิ้ตนักเรียนชายตราสมอ – สีขาว', 220.00, 20, 3),
(19, 'เสื้อนักเรียนหญิง', 'เสื้อนักเรียนหญิงมัธยมปลายตราสมอ - สีขาว', 230.00, 20, 3),
(20, 'โพสอิท', 'Page Marker 670-5AP โพสอิทพลาสเทลคละสี 1.5x5 ซม.5x100', 60.00, 12, 1),
(21, 'คลิปดำ', 'คลิปดำ ตราช้าง E112', 14.00, 12, 1),
(22, 'เทปผ้า', 'เทปผ้า LION สีเขียว 24 มม.x 8 หลา', 22.00, 20, 1),
(23, 'ลูกตะกร้อ', 'ตระกร้อนิยมไทย ตระกร้อเดี่ยว ผลิตจากพลาสติกใยสังเคราะห์มาตรฐาน', 79.00, 12, 2),
(24, 'ไหมพรม', 'ไหมพรม Eagle เส้นใหญ่ขนาดเส้นประมาณ 4 ม.ม. น้ำหนัก 40 กรัม', 25.00, 20, 4),
(25, 'แฟ้มห่วง', 'แฟ้มห่วง flamingo 9013A สีฟ้า', 45.00, 10, 1),
(26, 'ลวดเสียบกระดาษ', 'ลวดเสียบกระดาษแบบกลม ตราม้า No.00', 10.00, 25, 1),
(28, 'เชือกกระโดดไนล่อน', 'FBT เชือกกระโดดไนล่อน ความยาว 10 ฟุต', 60.00, 15, 2),
(29, 'ลูกวอลเลย์บอล', 'NEW STAR วอลเล่ย์บอล 3 สี', 269.00, 5, 2),
(30, 'ไม้แบดมินตัน', 'FBT ไม้แบดมินตัน (คู่)', 320.00, 5, 2),
(31, 'ลูกปิงปอง', 'FBT ลูกปิงปอง LIFTING (1กล่อง 3ลูก)', 25.00, 10, 2),
(32, 'ลูกฟุตบอล', 'FIVE STAR ลูกฟุตบอล หนังเย็บ หนังนุ่ม', 550.00, 10, 2),
(33, 'ไม้ปิงปอง', 'Grand Sport ไม้ปิงปอง Hitter', 295.00, 5, 2),
(34, 'ลูกบาสเก็ตบอล', 'Super Star บาสเก็ตบอลสีส้ม', 330.00, 10, 2),
(35, 'ถุงเท้าฟุตบอล', 'FBT ถุงเท้าฟุตบอล', 89.00, 12, 2),
(36, 'ลูกแบด', 'FBT ลูกแบด ลูกขนไก่ (1กล่อง 3ลูก)', 120.00, 12, 2),
(37, 'นกหวีด', 'FBT นกหวีด', 45.00, 12, 2),
(38, 'กางเกงนักเรียนชายสีดำ', 'กางเกงนักเรียนชาย ตราสมอ - สีดำ', 250.00, 20, 3),
(41, 'กระโปรงนักเรียนหญิง', 'กระโปรวนักเรียนหญิง ตราสมอ - สีกรม', 250.00, 20, 3),
(42, 'รองเท้าผ้าใบนักเรียนชาย', 'Breaker รองเท้าผ้าใบนักเรียนชาย - สีดำ', 329.00, 10, 3),
(43, 'รองเท้าผ้าใบนักเรียน สีขาว', 'นันยาง รองเท้าผ้าใบนักเรียน ชาย-หญิง สีขาว', 299.00, 20, 3),
(46, 'เข็มขัดลูกเสือ นักเรียนชาย', 'เข็มขัดลูกเสือหนังผสม สีน้ำตาล หัวทองเหลือง', 89.00, 10, 3),
(48, 'เข็มขัดเนตรนารี', 'เข็มขัดเนตรนารีหนังผสม พร้อมหัว', 90.00, 10, 3),
(49, 'หมวกลูกเสือสามัญ มัธยม', 'หมวกลูกเสือสามัญ สีแดงเลือดหมู มัธยม1-3', 95.00, 10, 3),
(50, 'หมวกเนตรนารี', 'หมวกเนตรนารีสีเขียว สำหรับ ประถม-มัธยม', 95.00, 10, 3),
(51, 'อินธนู ลูกเสือ', 'อินธนูลูกเสือ สำหรับ ม.1-3', 40.00, 15, 3),
(52, 'อินธนู เนตรนารี', 'อินธนูเนตรนารี สำหรับม.1-3', 40.00, 15, 3),
(53, 'เข็มเย็บมือ', 'Tulip เข็มสำหรับเย็บผ้า เบอร์9', 155.00, 10, 4),
(54, 'เข็มโครเชต์', 'เข็มโครเชต์ Tulip no.10', 250.00, 12, 4),
(55, 'ด้าย/ไหมปักซาชิโกะสีพื้น', 'ด้าย/ไหมปักซาชิโกะสีพื้น แบรนด์ OLYMPUS ความยาว 20 เมตร', 50.00, 15, 4),
(56, 'ชอลค์สามเหลี่ยมเขียน', 'Clover ชอลค์สามเหลี่ยมพร้อมที่ลับคมชอลค์', 85.00, 10, 4),
(57, 'สายวัดมาตรฐาน', 'Hoechstmass สายวัดมาตรฐาน ขนาดใหญ่', 65.00, 10, 4),
(58, 'กรรไกรงานฝีมือขนาดเล็ก', 'กรรไกรงานฝีมือขนาดเล็ก 3/4 นิ้ว', 265.00, 15, 4),
(59, 'กรรไกรตัดผ้า', 'กรรไกรตัดผ้า ขนาด 8 นิ้ว', 230.00, 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `p_ID` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `sale_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `p_name_copy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `user_id`, `p_ID`, `quantity`, `total_price`, `sale_date`, `p_name_copy`) VALUES
(3, 2, 1, 1, 20.00, '2025-03-19 07:10:41', 'ปากกา'),
(4, 2, 3, 1, 50.00, '2025-03-22 16:34:15', 'ผ้าพันคอลูกเสือ-เนตรนารี'),
(5, 2, 2, 1, 35.00, '2025-03-22 16:36:07', 'ลูกขนไก่'),
(6, 2, 4, 1, 15.00, '2025-03-22 16:36:07', 'สะดึง'),
(7, 2, 8, 1, 30.00, '2025-03-23 13:46:09', 'ดินสอกด'),
(8, 2, 9, 1, 12.00, '2025-03-23 13:46:09', 'ไส้ดินสอกด'),
(9, 2, 7, 1, 5.00, '2025-03-23 13:54:57', 'ดินสอ'),
(10, 2, 6, 1, 20.00, '2025-03-23 13:54:57', 'กบเหลาดินสอ'),
(11, 2, 4, 1, 15.00, '2025-03-23 15:11:20', 'สะดึง'),
(12, 2, 3, 1, 50.00, '2025-03-23 15:11:20', 'ผ้าพันคอลูกเสือ-เนตรนารี'),
(13, 2, 1, 1, 20.00, '2025-03-26 10:55:47', 'ปากกา'),
(14, 2, 2, 1, 35.00, '2025-03-26 10:55:47', 'ลูกขนไก่'),
(15, 2, 4, 1, 15.00, '2025-03-26 10:55:47', 'สะดึง'),
(18, 2, 11, 1, 12.00, '2025-04-19 18:16:48', 'ลูกปิงปอง'),
(19, 2, 12, 2, 110.00, '2025-04-19 18:17:40', 'หมวกลูกเสือ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','staff') NOT NULL DEFAULT 'staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role`) VALUES
(2, 'admin', '$2y$10$A04YJ1unTh/qUinFArrncOsKX.zHl15aMulqTyHMoHSMqiCbashlu', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_ID`),
  ADD KEY `c_ID` (`c_ID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `p_ID` (`p_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `c_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
