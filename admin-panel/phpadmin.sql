-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2018 at 04:07 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_created_day` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_created_day`) VALUES
(1, '2018-04-26 08:45:30'),
(2, '2018-04-26 08:45:30'),
(11, '2018-04-28 09:05:30'),
(27, '2018-05-11 14:17:45'),
(32, '2018-05-14 15:16:06');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(10) NOT NULL,
  `news_created_by` int(10) NOT NULL,
  `news_posted_day` date NOT NULL,
  `news_tittle` varchar(255) NOT NULL,
  `news_image` varchar(255) NOT NULL,
  `news_summarized_content` varchar(255) NOT NULL,
  `news_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_created_by`, `news_posted_day`, `news_tittle`, `news_image`, `news_summarized_content`, `news_link`) VALUES
(1, 1, '2018-04-29', 'Lớp học ọp ẹp cheo leo bên sườn núi', 'new01.jpg', 'Học ghép lớp trong căn phòng lợp bằng tre nứa ọp ẹp, đó là cảnh của điểm trường Sậy, thuộc bản Sậy, xã Trung Thành (huyện Quan Hóa, Thanh Hóa).', 'http://vietnamnet.vn/vn/giao-duc/nguoi-thay/lop-hoc-op-ep-cheo-leo-ben-suon-nui-446201.html'),
(2, 2, '2018-04-30', 'Mẹ nhận bằng thạc sĩ danh dự cho con qua đời vì tai nạn giao thông', 'new02.jpg', 'Trường ĐH Bách khoa, ĐHQG TP.HCM vừa trao bằng thạc sĩ cho một học viên qua đời vì tai nạn giao thông. Mẹ của nạn nhân đã nhận thay cho con tấm bằng thạc sĩ danh dự này.', 'http://vietnamnet.vn/vn/giao-duc/tuyen-sinh/me-nhan-bang-tot-nghiep-thac-si-cho-con-qua-doi-vi-tai-nan-giao-thong-446240.html'),
(3, 2, '2018-04-30', 'Tôi để con lớp 9 chọn học nghề', 'new03.jpg', 'TTO - Nhiều lần con hỏi tôi tại sao chú Tuấn, chú Phi đi học đại học xong không đi làm văn phòng mà cứ theo ba đi làm nghề cho cực khổ?', 'https://tuoitre.vn/toi-de-con-lop-9-chon-hoc-nghe-20180430093554139.htm'),
(4, 2, '2018-04-30', 'Các trường Anh tháo bỏ đồng hồ vì học sinh không biết coi giờ', 'new04.jpg', 'TTO - Các trường học Anh gỡ bỏ đồng hồ truyền thống trong phòng thi vì học sinh... không biết cách xem giờ.', 'https://tuoitre.vn/cac-truong-anh-thao-bo-dong-ho-vi-hoc-sinh-khong-biet-coi-gio-20180428225507149.htm'),
(5, 1, '2018-04-30', 'Nhà giáo tự thay đổi 8 điều này, được không?', 'new05.jpg', 'TTO - Thực tế cho thấy chỉ ít nhà giáo chăm chút cho việc soạn giảng, còn lại là đối phó với kiểm tra của cấp trên.', 'https://tuoitre.vn/8-dieu-nha-giao-can-tu-thay-doi-20180429084028107.htm'),
(6, 2, '2018-04-30', 'Những điểm thí sinh cần lưu ý với các bài thi THPT quốc gia 2018', 'new06.jpg', 'Thí sinh cần lưu ý một số điểm mới trong quá trình thi THPT quốc gia và xét công nhận tốt nghiệp THPT năm 2018.', 'http://vietnamnet.vn/vn/giao-duc/tuyen-sinh/nhung-diem-thi-sinh-can-luu-y-voi-cac-bai-thi-thpt-quoc-gia-2018-446125.html'),
(7, 11, '2018-04-30', 'Tuyển sinh đại học 2018: Tổng chỉ tiêu và nguồn tuyển đều tăng', 'new07.jpg', 'Các số liệu của Kỳ thi THPT quốc gia 2018 vừa được Bộ GD-ĐT công bố cho thấy số thí sinh dự thi, số thí sinh đăng ký xét tuyển, tổng chỉ tiêu, tổng số nguyện vọng', 'http://nhandan.com.vn/giaoduc/tuyen-sinh/item/36256802-tuyen-sinh-dai-hoc-2018-tong-chi-tieu-va-nguon-tuyen-deu-tang.html'),
(8, 11, '2018-04-30', 'Cô giáo \'quốc dân\' thu điện thoại cực dễ thương', 'new08.png', 'GD&TĐ - Những lời dạy rất gần gũi, thân thương khiến bạn học sinh bị thu điện thoại đành \"tâm phục khẩu phục\".', 'http://giaoducthoidai.vn/tre/co-giao-quoc-dan-thu-dien-thoai-cuc-de-thuong-3925916-l.html'),
(9, 2, '2018-05-03', 'Hà Nội công bố chỉ tiêu tuyển sinh lớp 6 chương trình song bằng', 'new09.jpg', 'Sở GD-ĐT Hà Nội vừa công bố chỉ tiêu tuyển sinh lớp 6 chương trình song bằng.', 'http://vietnamnet.vn/vn/giao-duc/tuyen-sinh/ha-noi-cong-bo-chi-tieu-tuyen-sinh-lop-6-chuong-trinh-song-bang-446470.html');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(10) NOT NULL,
  `student_school` varchar(190) NOT NULL,
  `student_address` varchar(190) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_school`, `student_address`) VALUES
(5, 'HCMUT', 'KTX Khu A'),
(6, 'HCMUS', 'Thuan An, Binh Duong'),
(7, 'Đại Học Ngoại Thương CS2', 'Tỉnh Quảng Ngãi'),
(8, 'HCMUT', 'Quang Ha'),
(25, 'HCMUT', '815AH1 - KTX Khu A'),
(29, 'DUT', 'Hoa Khanh, Da Nang'),
(30, 'HUST', 'Long Bien, Ha Noi');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(10) NOT NULL,
  `assigned_by` int(10) NOT NULL,
  `assigned_day` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `subject` enum('Toán học','Ngữ văn','Sinh học','Vật lý','Hóa học','Lịch sử','Địa lý','Ngoại ngữ','Giáo dục công dân','Công nghệ','Tin học') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `assigned_by`, `assigned_day`, `subject`) VALUES
(24, 2, '2018-05-15 01:46:46', 'Ngoại ngữ'),
(31, 1, '2018-05-15 01:28:25', 'Tin học'),
(36, 2, '2018-05-15 01:51:03', 'Toán học'),
(37, 2, '2018-05-15 01:50:58', 'Vật lý');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_email` varchar(190) NOT NULL,
  `user_name` varchar(190) NOT NULL,
  `user_pass` varchar(190) NOT NULL,
  `user_role` enum('admin','teacher','student') NOT NULL,
  `user_img` varchar(190) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_name`, `user_pass`, `user_role`, `user_img`) VALUES
(1, 'admin01@gmail.com', 'admin01', '18c6d818ae35a3e8279b5330eda01498', 'admin', 'user1.png'),
(2, 'admin02@gmail.com', 'admin02', '6e60a28384bc05fa5b33cc579d040c56', 'admin', 'user2.png'),
(5, 'phamvanlinh143@gmail.com', 'Phạm Văn Lĩnh', 'b0f272966386057c96b4e0bc3b2ebc0d', 'student', 'user5.png'),
(6, 'student02@gmail.com', 'Phạm Thị Phước', '3836fb8e0d5844c27591c9f0b7c2ddfa', 'student', 'user6.png'),
(7, 'student03@gmail.com', 'Đỗ Nhật Kim Long', '86d669cff1cf486d2f5ff5ca8d02a111', 'student', 'user7.png'),
(8, 'student04@gmail.com', 'Trịnh Kim Vinh', '097ba3e94398d24245e9d6897de23a45', 'student', 'user8.png'),
(11, 'admin03@gmail.com', 'admin03', '7dc2466ad3ff5911f6a5e47e043e0abc', 'admin', 'user11.png'),
(24, 'ngochung@gmail.com', 'Trần Ngọc Hùng', 'e10adc3949ba59abbe56e057f20f883e', 'teacher', 'user24.png'),
(25, 'nhatnam10a3@gmail.com', 'Hoàng Công Nhật Nam', 'b59c67bf196a4758191e42f76670ceba', 'student', 'user25.jpg'),
(27, 'admin04@gmail.com', 'admin04', '499c208ceafb4fbba162f077060955bd', 'admin', 'user27.png'),
(29, 'phamvanlanh@gmail.com', 'Phạm Văn Lanh', '4297f44b13955235245b2497399d7a93', 'student', 'user29.png'),
(30, 'trankiet@gmail.com', 'Trần Anh Kiệt', '4297f44b13955235245b2497399d7a93', 'student', 'user30.png'),
(31, 'thanhsach@gmail.com', 'Nguyễn Thành Sách', '4297f44b13955235245b2497399d7a93', 'teacher', 'user31.png'),
(32, 'admin05@gmail.com', 'admin05', '3deffd4cb346737769a7a509c95cee17', 'admin', 'user32.png'),
(36, 'giangho@gmail.com', 'Trần Giang Hồ', '4297f44b13955235245b2497399d7a93', 'teacher', 'student33.jpg'),
(37, 'vanluong@gmail.com', 'Trần Văn Lượng', '4297f44b13955235245b2497399d7a93', 'teacher', 'student37.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `fk_news_fk01` (`news_created_by`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `fk_teacher_03` (`assigned_by`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_01` FOREIGN KEY (`admin_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_news_fk01` FOREIGN KEY (`news_created_by`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_01` FOREIGN KEY (`student_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_teacher_01` FOREIGN KEY (`teacher_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `fk_teacher_03` FOREIGN KEY (`assigned_by`) REFERENCES `admin` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
