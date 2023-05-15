-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 04:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_account`
--

CREATE TABLE `tb_account` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_account`
--

INSERT INTO `tb_account` (`id`, `name`, `username`, `password`, `email`, `role`) VALUES
(2, 'nguyên khang', 'khang', 'khang', 'nguyenkhangdev@gmail.com', 1),
(12, 'lop truong', 'loptruong22', 'loptruong22', 'loptruong22@gmail.com', 0),
(13, 'lop truong', 'loptruong111', 'loptruong111', 'loptruong111@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_exam`
--

CREATE TABLE `tb_exam` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `time` varchar(5) NOT NULL,
  `userMake` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_exam`
--

INSERT INTO `tb_exam` (`id`, `name`, `time`, `userMake`) VALUES
(1, 'Lịch sử', '10', 'loptruong111'),
(2, 'Sinh học', '15', 'loptruong22'),
(3, 'Tin học', '5', 'loptruong22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_question`
--

CREATE TABLE `tb_question` (
  `id` int(5) NOT NULL,
  `question_no` varchar(500) NOT NULL,
  `question` varchar(200) NOT NULL,
  `opt1` varchar(200) NOT NULL,
  `opt2` varchar(200) NOT NULL,
  `opt3` varchar(200) NOT NULL,
  `opt4` varchar(200) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `idExam` int(5) NOT NULL,
  `category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_question`
--

INSERT INTO `tb_question` (`id`, `question_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `idExam`, `category`) VALUES
(1, '1', 'Tư liệu hiện vật là?', 'di tích, đồ vật của người xưa còn được giữ lại trong lòng đất hay trên mặt đất.', 'những lời mô tả về các hiện vật của người xưa được lưu truyền lại.', 'đồ dùng mà thầy cô giáo em sử dụng để dạy học.', 'bản ghi chép, nhật kí hành trình của các nhà thám hiểm trong quá khứ.', 'bản ghi chép, nhật kí hành trình của các nhà thám hiểm trong quá khứ.', 1, 'Lịch sử'),
(2, '2', 'Những tấm Bia ghi tên Tiến sĩ thời xưa ở Văn Miếu (Hà Nội) thuộc loại tư liệu nào dưới đây?', 'tư liệu truyền miệng.', 'tư liệu chữ viết và truyền miệng.', 'tư liệu hiện vật.', 'tư liệu hiện vật và chữ viết.', 'tư liệu hiện vật và chữ viết.', 1, 'Lịch sử'),
(3, '3', 'Một thiên niên kỉ tương ứng với: ', '10 năm', '100 năm', '1000 năm', '10000 năm', '100 năm', 1, 'Lịch sử'),
(4, '4', 'Người tinh khôn xuất hiện vào khoảng thời gian nào?', 'Khoảng 60 vạn năm trước', 'Khoảng 15 vạn năm trước', 'Khoảng 4 vạn năm trước', 'Khoảng 10 vạn năm trước', 'Khoảng 60 vạn năm trước', 1, 'Lịch sử'),
(5, '5', 'Xã hội nguyên thuỷ đã trải qua những giai đoạn phát triển nào?', 'Bầy người nguyên thuỷ, công xã thị tộc, bộ lạc', 'Bầy người nguyên thuỷ, Người tinh khôn', 'Bầy người nguyên thuỷ, Người tối cổ', 'Bầy người nguyên thuỷ, công xã thị tộc', 'Bầy người nguyên thuỷ, công xã thị tộc', 1, 'Lịch sử'),
(6, '6', 'Công cụ lao động của Người tối cổ chủ yếu được chế tác từ', 'đá', 'sắt', 'chì', 'đồng thau', 'đồng thau', 1, 'Lịch sử'),
(8, '7', 'Xã hội nguyên thuỷ tan rã là do', 'tư hữu xuất hiện', 'xã hội chưa phân hoá giàu nghèo', 'con người có mối quan hệ bình đẳng', 'công cụ lao động bằng đá được sử dụng phổ biến', 'tư hữu xuất hiện', 1, 'Lịch sử'),
(9, '8', 'Con sông có tác động đến sự hình thành nền văn minh Ai Cập là', 'sông Ti-grơ', 'sông Hằng', 'Trường Giang', 'sông Nin', 'sông Nin', 1, 'Lịch sử');

-- --------------------------------------------------------

--
-- Table structure for table `tb_result`
--

CREATE TABLE `tb_result` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `exam_type` varchar(100) NOT NULL,
  `total_question` varchar(10) NOT NULL,
  `correct_answer` varchar(10) NOT NULL,
  `wrong_answer` varchar(10) NOT NULL,
  `exam_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_result`
--

INSERT INTO `tb_result` (`id`, `username`, `exam_type`, `total_question`, `correct_answer`, `wrong_answer`, `exam_time`) VALUES
(1, 'loptruong111', 'Sử', '9', '7', '2', '10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_account`
--
ALTER TABLE `tb_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_exam`
--
ALTER TABLE `tb_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_question`
--
ALTER TABLE `tb_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_result`
--
ALTER TABLE `tb_result`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_account`
--
ALTER TABLE `tb_account`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_exam`
--
ALTER TABLE `tb_exam`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_question`
--
ALTER TABLE `tb_question`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_result`
--
ALTER TABLE `tb_result`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
