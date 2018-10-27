-- MySQL dump 10.16  Distrib 10.2.17-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u312006781_eowl
-- ------------------------------------------------------
-- Server version	10.2.17-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_created_day` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`admin_id`),
  CONSTRAINT `fk_admin_01` FOREIGN KEY (`admin_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'2018-04-26 08:45:30'),(2,'2018-04-26 08:45:30'),(11,'2018-04-28 09:05:30'),(27,'2018-05-11 14:17:45'),(32,'2018-05-14 15:16:06'),(41,'2018-05-19 20:06:29'),(45,'2018-05-20 09:02:30');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

--
-- Table structure for table `exam`
--

DROP TABLE IF EXISTS `exam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam` (
  `exam_id` int(10) NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(190) NOT NULL,
  `subject` enum('Toán học','Ngữ văn','Sinh học','Vật lý','Hóa học','Lịch sử','Địa lý','Ngoại ngữ','Giáo dục công dân','Công nghệ','Tin học') NOT NULL,
  `link_de` varchar(190) NOT NULL,
  `time` int(3) NOT NULL,
  `keyExam` varchar(190) NOT NULL,
  `link_sol` varchar(190) NOT NULL,
  `year` year(4) NOT NULL,
  `created_by` int(10) NOT NULL,
  PRIMARY KEY (`exam_id`),
  KEY `fk_exam_fk01` (`created_by`),
  CONSTRAINT `fk_exam_fk01` FOREIGN KEY (`created_by`) REFERENCES `teacher` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam`
--

/*!40000 ALTER TABLE `exam` DISABLE KEYS */;
INSERT INTO `exam` VALUES (1,'Đề thi thử THPTQG ngoại ngữ trường THPT Lục Ngạn - Bắc Giang','Ngoại ngữ','de01.pdf',90,'C A D B D D C C B D D B C A D A A B A A D D D B D C D D B D A A B B C B B D C D A B D D C A A D B C ','sol01.pdf',2018,24),(2,'Đề thi thử THPTQG năm 2018 lần 1 trường THPT Nguyễn Thị Minh Khai Hà Tĩnh','Ngoại ngữ','de02.pdf',90,'C A A A A C D B C D D C D A C A B B D B A D A C D C B C D C B A D B D C B A C D B B C B C A D C A B ','sol02.pdf',2018,24),(3,'Đề thi thử THPTQG 2018 Bình Phước','Toán học','de03.pdf',90,'A C D C D C B D D B B B B B C C D A B D A D A A C C D A C B A D A A D B D D C A C C B A C C B A D B ','sol03.pdf',2018,36),(4,'Đề Minh họa THPTQG 2018','Toán học','de04.pdf',90,'A B C A A A D C D B A A B B D D D A C D B B C B D D A C A D B D A B A B C D C C A B D A D A B B A A ','sol04.pdf',2018,36),(5,'Thi thử THPTQG 2018 lần 2 THPT Kim Liên - Hà Nội','Toán học','de05.pdf',90,'C B B B C B A B D C A B C B C C C A B D C B A A B A A C D B D A B D A D C D C B B C A A A B B C C A ','sol05.pdf',2018,36),(6,'Đề thi thử THPTQG 2017-2018 lần 2 THPT Quốc Học Huế','Toán học','de06.pdf',90,'C A D A D B D B D A C C B C D B A C A B B D C B C C A D C D A B B A A D C A C A B B D A D B D B A D ','sol06.pdf',2018,36),(7,'Đề thi thử THPTQG 2018 lần 2 Liên trường Nghệ An','Toán học','de07.pdf',90,'A C B C A A D D A C A B A C A D C B A C A B D D B C C D C B B D B D C B B B C D A D D A A B C A C D ','sol07.pdf',2018,36),(8,'Đề Minh Họa THPTQG 2015','Vật lý','de08.pdf',90,'B A A D B D A A C C A D B D B B C C A D B A A C A B B B A D C A B A C C D B B B A D B D B A B A B B ','sol08.pdf',2015,37),(9,'Đề thi thử THPTQG 2015-2016 lần 1 đại học Vinh','Vật lý','de09.pdf',90,'A A B D D B A A D A B A C C D B D D B A A C C C B C D D C C B B D C B C A B D A D C B A D C A D B A ','sol09.pdf',2016,37),(10,'Đề thi thử THPTQG 2016 lần 4 ĐHSP Hà Nội','Vật lý','de010.pdf',90,'D D A A C A D D B B C A C B D C D B A A D B A D C A D B C B A B A D C B C B C C C C C C B A D A D C ','sol010.pdf',2016,37),(11,'Đề thi THPTQG 2015','Vật lý','de011.pdf',90,'D B D B D C C A C B B A A B A A A B C D A A B D D D A D C D D D C B D B C B C A B C A D B C D A C C ','sol011.pdf',2015,37),(12,'Đề thi THPTQG 2015','Hóa học','de012.pdf',90,'A C C B B B A B D B D A A A C D A B B C B C B A D A D B D C D D D B A A C B D C C D A A C D B C C D ','sol012.pdf',2015,38),(13,'Đề thi THPTQG 2016','Hóa học','de013.pdf',90,'B A C D A A A C B C D D A B C D B D B B B D A B A D B C A A D B C B C A B D C C A D D C B A C D C C ','sol013.pdf',2016,38),(14,'Đề thi THPTQG 2015','Sinh học','de014.pdf',90,'C B D C D B A A A D C B A D B D D A C A C A A C C C A B D D D B B C D B D C B C C B D B A A C C A B ','sol014.pdf',2015,39);
/*!40000 ALTER TABLE `exam` ENABLE KEYS */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`u312006781_eowl`@`localhost`*/ /*!50003 TRIGGER `delete_record_from_exam` BEFORE DELETE ON `exam`
 FOR EACH ROW BEGIN 
DELETE FROM record
WHERE record.idExam = old.exam_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `news_id` int(10) NOT NULL AUTO_INCREMENT,
  `news_created_by` int(10) NOT NULL,
  `news_posted_day` date NOT NULL,
  `news_tittle` varchar(190) NOT NULL,
  `news_image` varchar(190) NOT NULL,
  `news_summarized_content` varchar(190) NOT NULL,
  `news_link` varchar(190) NOT NULL,
  PRIMARY KEY (`news_id`),
  KEY `fk_news_fk01` (`news_created_by`),
  CONSTRAINT `fk_news_fk01` FOREIGN KEY (`news_created_by`) REFERENCES `admin` (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,1,'2018-04-29','Lớp học ọp ẹp cheo leo bên sườn núi','new01.jpg','Học ghép lớp trong căn phòng lợp bằng tre nứa ọp ẹp, đó là cảnh của điểm trường Sậy, thuộc bản Sậy, xã Trung Thành (huyện Quan Hóa, Thanh Hóa).','http://vietnamnet.vn/vn/giao-duc/nguoi-thay/lop-hoc-op-ep-cheo-leo-ben-suon-nui-446201.html'),(2,2,'2018-04-30','Mẹ nhận bằng thạc sĩ danh dự cho con qua đời vì tai nạn giao thông','new02.jpg','Trường ĐH Bách khoa, ĐHQG TP.HCM vừa trao bằng thạc sĩ cho một học viên qua đời vì tai nạn giao thông. Mẹ của nạn nhân đã nhận thay cho con tấm bằng thạc sĩ danh dự này.','http://vietnamnet.vn/vn/giao-duc/tuyen-sinh/me-nhan-bang-tot-nghiep-thac-si-cho-con-qua-doi-vi-tai-nan-giao-thong-446240.html'),(3,2,'2018-04-30','Tôi để con lớp 9 chọn học nghề','new03.jpg','TTO - Nhiều lần con hỏi tôi tại sao chú Tuấn, chú Phi đi học đại học xong không đi làm văn phòng mà cứ theo ba đi làm nghề cho cực khổ?','https://tuoitre.vn/toi-de-con-lop-9-chon-hoc-nghe-20180430093554139.htm'),(4,2,'2018-04-30','Các trường Anh tháo bỏ đồng hồ vì học sinh không biết coi giờ','new04.jpg','TTO - Các trường học Anh gỡ bỏ đồng hồ truyền thống trong phòng thi vì học sinh... không biết cách xem giờ.','https://tuoitre.vn/cac-truong-anh-thao-bo-dong-ho-vi-hoc-sinh-khong-biet-coi-gio-20180428225507149.htm'),(5,1,'2018-04-30','Nhà giáo tự thay đổi 8 điều này, được không?','new05.jpg','TTO - Thực tế cho thấy chỉ ít nhà giáo chăm chút cho việc soạn giảng, còn lại là đối phó với kiểm tra của cấp trên.','https://tuoitre.vn/8-dieu-nha-giao-can-tu-thay-doi-20180429084028107.htm'),(6,2,'2018-04-30','Những điểm thí sinh cần lưu ý với các bài thi THPT quốc gia 2018','new06.jpg','Thí sinh cần lưu ý một số điểm mới trong quá trình thi THPT quốc gia và xét công nhận tốt nghiệp THPT năm 2018.','http://vietnamnet.vn/vn/giao-duc/tuyen-sinh/nhung-diem-thi-sinh-can-luu-y-voi-cac-bai-thi-thpt-quoc-gia-2018-446125.html'),(7,11,'2018-04-30','Tuyển sinh đại học 2018: Tổng chỉ tiêu và nguồn tuyển đều tăng','new07.jpg','Các số liệu của Kỳ thi THPT quốc gia 2018 vừa được Bộ GD-ĐT công bố cho thấy số thí sinh dự thi, số thí sinh đăng ký xét tuyển, tổng chỉ tiêu, tổng số nguyện vọng','http://nhandan.com.vn/giaoduc/tuyen-sinh/item/36256802-tuyen-sinh-dai-hoc-2018-tong-chi-tieu-va-nguon-tuyen-deu-tang.html'),(8,11,'2018-04-30','Cô giáo \'quốc dân\' thu điện thoại cực dễ thương','new08.png','GD&TĐ - Những lời dạy rất gần gũi, thân thương khiến bạn học sinh bị thu điện thoại đành \"tâm phục khẩu phục\".','http://giaoducthoidai.vn/tre/co-giao-quoc-dan-thu-dien-thoai-cuc-de-thuong-3925916-l.html'),(9,2,'2018-05-03','Hà Nội công bố chỉ tiêu tuyển sinh lớp 6 chương trình song bằng','new09.jpg','Sở GD-ĐT Hà Nội vừa công bố chỉ tiêu tuyển sinh lớp 6 chương trình song bằng.','http://vietnamnet.vn/vn/giao-duc/tuyen-sinh/ha-noi-cong-bo-chi-tieu-tuyen-sinh-lop-6-chuong-trinh-song-bang-446470.html'),(10,45,'2018-05-21','Bộ GD-ĐT mạnh tay chi 749 tỉ đồng cho đổi mới thi trong 3 năm','new010.jpg','Theo đề án đổi mới thi này, kỳ thi THPT quốc gia gồm 5 bài thi: toán, ngữ văn, ngoại ngữ, bài thi tổ hợp khoa học tự nhiên và bài thi tổ hợp khoa học xã hội. Bộ Giáo dục và Đào tạo (GD-ĐT) s','https://nld.com.vn/giao-duc-khoa-hoc/bo-gd-dt-manh-tay-chi-749-ti-dong-cho-doi-moi-thi-trong-3-nam-20180521203533652.htm'),(11,11,'2018-05-21','Bí quyết vàng \"ăn điểm\" thi trắc nghiệm môn Địa lí THPT Quốc gia năm 2018','new011.png','Việc củng cố kiến thức trong sách giáo khoa, thành thạo kỹ năng sử dụng Atlat,… sẽ giúp các em tự tin chinh phục điểm 8, 9 môn Địa lí THPT quốc gia năm 2018.','http://infonet.vn/bi-quyet-vang-an-diem-thi-trac-nghiem-mon-dia-li-thpt-quoc-gia-nam-2018-post262940.info'),(12,11,'2018-05-21','Những bí quyết đơn giản đến không ngờ giúp sĩ tử ôn thi khối D đạt điểm cao','new012.jpeg','Thời gian thi THPT Quốc gia đang gấp rút hơn vì thế các sĩ tử thi khối D hãy thử tham khảo bí kíp dưới để giúp cho việc ôn thi của mình tốt hơn nhé. ','http://www.doisongphapluat.com/tin-tuc/nhung-bi-quyet-don-gian-den-khong-ngo-giup-si-tu-on-thi-khoi-d-dat-diem-cao-a230256.html'),(13,2,'2018-05-21','Việt Nam giành Huy chương Vàng Olympic Tin học châu Á năm 2018','new013.jpg','(THPL) - Với 1 Huy chương Vàng, 4 Huy chương Bạc và 2 Huy chương Đồng, đội tuyển Việt Nam tham gia xét giải kỳ thi Olympic Tin học châu Á năm 2018 xếp thứ 3 toàn đoàn trên tổng số 31 quốc gi','http://thuonghieuvaphapluat.vn/viet-nam-gianh-huy-chuong-vang-olympic-tin-hoc-chau-a-nam-2018-102225'),(14,11,'2018-05-25','Cẩn trọng “vỡ mộng” trước chiêu trò tuyển sinh của khối ngành Y - Dược','new014.jpg','Kỳ thi THPT Quốc gia và xét tuyển đại học, cao đẳng năm 2018 sắp diễn ra. Hiện, nhiều trường đại học top dưới cũng như khối cao đẳng đang có cuộc “chạy đua” về thông tin để thu hút người học','http://www.nguoiduatin.vn/can-trong-vo-mong-truoc-chieu-tuyen-sinh-cua-khoi-nganh-y-duoc-a370961.html'),(15,27,'2018-05-21','Ai nói emoji chỉ để \'tám chuyện\', chúng còn đang được dùng để dạy học tại Anh','new015.jpeg','Sử dụng emoji để thể hiện cảm xúc trong những cuộc trò chuyện đã trở thành quy tắc bất thành văn của giới trẻ hiện nay. Emoji xuất hiện ở khắp mọi nơi, từ tin nhắn văn bản, email, những nền ','https://saostar.vn/cong-nghe/cong-nghe-cong-nghe/ai-noi-emoji-chi-dung-de-tam-chuyen-chung-dang-duoc-dung-de-day-hoc-tai-anh-2870656.html'),(16,2,'2018-05-21','Đề thi thử THPT quốc gia 2018 môn Tiếng Anh trường THPT Chuyên ĐH Vinh','new016.png','Thí sinh có thể tham khảo đề thi thử THPT quốc gia 2018 môn Tiếng Anh trường THPT Chuyên ĐH Vinh để tự luyện cho mình kỹ năng giải Toán chính xác.','http://infonet.vn/de-thi-thu-thpt-quoc-gia-2018-mon-tieng-anh-truong-thpt-chuyen-dh-vinh-post262886.info');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

--
-- Table structure for table `record`
--

DROP TABLE IF EXISTS `record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `record` (
  `record_id` int(10) NOT NULL AUTO_INCREMENT,
  `idStudent` int(10) NOT NULL,
  `idExam` int(10) NOT NULL,
  `key_dalam` varchar(190) NOT NULL,
  `exam_date` datetime NOT NULL,
  PRIMARY KEY (`record_id`),
  KEY `fk_record_fk01` (`idStudent`),
  KEY `fk_record_fk02` (`idExam`),
  CONSTRAINT `fk_record_fk01` FOREIGN KEY (`idStudent`) REFERENCES `student` (`student_id`),
  CONSTRAINT `fk_record_fk02` FOREIGN KEY (`idExam`) REFERENCES `exam` (`exam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `record`
--

/*!40000 ALTER TABLE `record` DISABLE KEYS */;
INSERT INTO `record` VALUES (1,5,1,'C A D B D D C C B D D B C A D A A B A A D D D B D C D D B D A A B B C B B D C D A B D D C A A D B C ','2018-05-15 19:42:24'),(2,6,1,'C A D B D D C C B D D B C A D A A B A A D D D B D C D D B D A A B B C B B D C D A A A A A A A A A A ','2018-05-15 19:43:22'),(3,7,1,'C A D B D D C C B D D B C A D A A B A A D D D B D C D D B D A A A A A A A A A A A A A A A A A A A A  ','2018-05-15 19:45:04'),(4,8,1,'A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A ','2018-05-15 19:45:34'),(5,25,1,'C A D B D D C C B D D B C A D A A B A A D D D B D C D D B D A A B B C B B D C D A B D D C A A A A A ','2018-05-15 19:54:59'),(6,29,1,'C A D B D D C C B D D B C A D A A B A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A ','2018-05-15 19:56:46'),(7,30,1,'C A D B D D C C B D D B C A D A A B A A D D D B D C D D B D A A A A A A A A A A A A A A A A A A A A','2018-05-15 19:57:51'),(8,5,2,'C B A A A C D B C D D C A A A A B B D B A D A C D C B C D C C C D B D C D A B D B B C B C A D C A B ','2018-05-15 21:17:26'),(9,6,2,'C B A A A C D B C D D C A A A A B B D B A D A C D C B C D C C C D B D C D A B D B B C B C A D D D D ','2018-05-15 21:18:54'),(10,8,2,'C B A A A C D B C D D C A A A A B B D B A D A C D C B C D C C C D B D C D A B D B B C B C A D C A B ','2018-05-15 21:19:38'),(11,7,2,'C B A A A C C C C D D C A A A A B B D B A D A C D C B C D D C C D B D C D A B D B B C B C A D C A B ','2018-05-15 21:20:17'),(12,25,2,'C A A A A C D B C D D C D A C A B B D B A D A C D C B C D C B A D B D C B A C D B B C B C A D C A B ','2018-05-15 21:21:18'),(13,5,3,'A C D C D C B D D B B B B B C C D A B D A D A A C C D A C B A D A A D B D D C A C C B A C C B A D B ','2018-05-15 21:21:48'),(14,6,3,'A C D C D C B D D B B B B B C C D A B D A D A A C C D A C B A D A A D B D D C A C C C C C C C C C C ','2018-05-15 21:22:08'),(15,7,3,'A C D C D C B D A A B B B B C C A A B D A D A A C C D A C B A D A A D B D D C A C C C C C C C C C C ','2018-05-15 21:22:24'),(16,29,3,'A C D C D C B D A A B B B B C C A A B D A D A A C C D A C B A D A A D B D D C A C C C C D D D D D D ','2018-05-15 21:22:45'),(17,30,4,'A B C A A A D C D B A A B B D D D A C D B B C B D D A C A D B D A B A B C D C C A B D A D A B B A A ','2018-05-15 21:23:31'),(18,7,4,'A B C A A A D C D B A A B B D D D A C D B B C B D D A C A D B D A B A B C D C C A A A A D A A A A A ','2018-05-15 21:23:50'),(19,8,4,'A B C A A A D C D A B A B B D D D A C D B B C B D D A C A D B C A B A B C D C C A A A A D A A A A A ','2018-05-15 21:24:06'),(20,25,4,'A B C A A A D C D A B A B B D D D A C D B B C B D D A C A D B C A B A B C D C C A D A D D A A A A D ','2018-05-15 21:24:47'),(21,29,4,'A B C A A A D C D A B A B B D D D A C D B B C B D D A C A D B C A B A B C D C C A D A D D A A A A D ','2018-05-15 21:24:55'),(22,6,5,'C B B B C B A B D C A B C B C C C A B D C B A A B A A C D B D A B D A D C D C B B C A A A B B C C A ','2018-05-15 21:25:24'),(23,5,5,'A B C A A A D C D B A A B B D D D A C D B B C B D D A C A D B D A B A B C D C C A B D A D A B B A A ','2018-05-15 21:25:46'),(24,7,5,'C B B B C B A B D C C C C C C C C C C C C B A A B A A C D B D A B D A D C D C B B C A A A B B C C A ','2018-05-15 21:26:52'),(25,5,6,'C A D A D B D B D A C C B C D B A C A B B D C B C C A D C D A B B A A D C A C A B B D A D B D B A D ','2018-05-15 21:27:27'),(26,8,6,'C A D A D B D B D A C C C C D D D D A B B D C B C C A D C D A B B A A D C A C A B B D A D B D B A D ','2018-05-15 21:27:43'),(27,25,6,'C A D A D B D B D A C C C C D D D D A B B D C B C C A D C D A B B A A D C A C A B B D A D A A A A A ','2018-05-15 21:27:58'),(29,6,11,'D B D B D C C A C B B A A B A A A B C D A A B D D D A D C D D D C B D B C B C A B C A D B C D A C C ','2018-05-15 21:30:11'),(30,5,11,'D B D B D C C A C B B A A B A A A B C D A A B D D D A D C D D D C B D B C B C A B C A C C C C C C C ','2018-05-15 21:30:22'),(31,7,11,'D B D B D C C A C B B A A B A A A B C D A A B D D D A D C D D D C B D B C B C A B C A D D D D C C C ','2018-05-15 21:30:39'),(32,30,11,'D B D B D C C A C B B A A B A A A B C D D D B D D D D D C D D D C B D B C B C A B C A D D D D C C C ','2018-05-15 21:30:49'),(33,30,10,'D D A A C A D D B B C A C B D C D B A A D B A D C A D B C B A B A D C B C B C C C C C C B A D A D C ','2018-05-15 21:31:12'),(34,25,10,'D D A A C A D D B B C A C B D C D B A A D B A D C A D B C B A B A D C B C B C C C C C C C C C A D C ','2018-05-15 21:31:22'),(35,29,10,'D D A A C A D D B B C A C B D D D D D A D B A D C A D B C B A B A D C B C B C C C C C C C C C A D C ','2018-05-15 21:31:35'),(36,5,10,'D D A A C A A D B B C A C B D D D D D A D B A D C A D B C B A B A D C B C B C A C A C A C C C A D C ','2018-05-15 21:31:54'),(37,5,12,'A C C B B B A B D B D A A A C D A B B C B C B A D A D B D C D D D B A A C B D C C D A A C D B C C D ','2018-05-15 21:33:14'),(38,6,12,'A C C B B B A A A B D A A A C D A B B C C C D D D D D B D C D D D B A A C B D C C D A A C D B C C D ','2018-05-15 21:33:45'),(39,7,12,'A C C B B B A A A B D A A C C D A B B C C C D D D D D B D C D D D B A C C B D C C D A A C D B C C D ','2018-05-15 21:33:57'),(40,30,12,'A C C B B B A A A B D A A C C D A B B C C C D D D D D B D C D D D B A C C B D C C D A A C D B C C D ','2018-05-15 21:34:04'),(41,25,12,'A C A A A B A B D B D A A A C D A B B C B C B A D A D B D C D D D B A A C B D C C D A A C D B C C D ','2018-05-15 21:34:34'),(42,25,13,'B A C D A A A C B C D D A B C D B D B B B D A B A D B C A A D B C B C A B D C C A D D C B A C D C C ','2018-05-15 21:35:15'),(43,29,13,'B A C D A A A C B C D D A A C B B B B B B D A B A D B C A A D B C B C A B D C C A D D C B A C D C C ','2018-05-15 21:35:27'),(44,30,13,'A C C B B B A B D B D A A A C D A B B C B C B A D A D B D C D D D B A A C B D C C D A A C D B C C D ','2018-05-15 21:35:46'),(45,5,13,'C B D C D B A A A D C B A D B D D A C A C A A C C C A B D D D B B C D B D C B C C B D B A A C C A B ','2018-05-15 21:36:19'),(46,5,14,'C B D C D B A A A D C B A D B D D A C A C A A C C C A B D D D B B C D B D C B C C B D B A A C C A B ','2018-05-15 21:36:25'),(47,6,14,'C B D C D B A A A D C B A D B D D A C D C A A C C C A B D D D B D C D B D C B C C B D B A A C D A B ','2018-05-15 21:36:42'),(48,6,14,'C B D C D B A A A D C B A D B D D A C D C A A C C C A B D D D B D C D B D C B C C B D B A A C D A B ','2018-05-15 21:36:42'),(49,8,14,'C B D C D B A A A D C D D D B D D A C D C A A A A C A B D D D B D C D B D C B C C B D B A A C D A B ','2018-05-15 21:37:16'),(50,8,9,'A A B D D B A A D A B A C C D B D D B A A C C C B C D D C C B B D C B C A B D A D C B A D C A D B A ','2018-05-15 21:37:52'),(51,7,9,'A A B D D B A A D A B A C C D A D D B A A C C C B C A D C C B B D C B C A B D A D C B A D C A A A A ','2018-05-15 21:38:08'),(52,25,9,'A A B D D B C A D A B A C C D A D D B A A C C C B C A D C C C B D C B C A B C A D C B A D C A A A A ','2018-05-15 21:38:21'),(53,30,9,'A A B D D B C A A A B A C C D A D D B A A C C C B C A D C C C B D C B C A B C A D C B A D C A A D A ','2018-05-15 21:38:44'),(54,30,7,'A C B C A A D D A C A B A C A D C B A C A B D D B C C D C B B D B D C B B B C D A D D A A B C A C D ','2018-05-15 21:39:15'),(55,29,7,'A C B C A A D D A C A B A C A D C B A C A B D D D D D D D D D D B D C B B B C D A D D A A B C A C D ','2018-05-15 21:39:28'),(56,7,7,'C A B A A A D D A C A B A C A D C B A C A B D D D D D D D D D D B D C B B B C D A D D A A B C A C D ','2018-05-15 21:39:45'),(57,5,7,'B A A D B D A A C C A D B D B B C C A D B A A C A B B B A D C A B A C C D B B B A D B D B A B A B B ','2018-05-15 21:40:34'),(58,5,8,'B A A D B D A A C C A D B D B B C C A D B A A C A B B B A D C A B A C C D B B B A D B D B A B A B B ','2018-05-15 21:40:40'),(59,7,8,'B A A A A A A A C A A D B D B B C C A D B A A C A B B B A D C A B A C C D B B B A D B D B A B A B B ','2018-05-15 21:40:57'),(60,25,8,'B A A A A A A A C A A D B D B B C C A D B A A C A B B B A D C A B A C C D B B B A D B D B A B A A A ','2018-05-15 21:41:09'),(61,29,8,'B A A A A A A A C A A D B D B B C C A A C A A C A B C B A D C A B A C C D B B B A D B D B A B A A A ','2018-05-15 21:41:22'),(65,46,10,'','2018-05-20 16:47:08'),(66,46,12,'B D E B E C E B C E E A E E C E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E','2018-05-20 16:48:05'),(67,47,13,'','2018-05-21 02:07:51'),(68,47,13,'A B B B B D C B B B B C A B C B B B C D B A A D B C D D C B C A B C D C B A B A C B C A D C B A B C','2018-05-21 02:09:04'),(72,49,14,'','2018-05-21 09:20:42'),(73,5,14,'A B C B C B D B D B C A C A C A B C D C B C B C B A A B C C D D C B A A B C D A A B C D C C C B A B','2018-05-21 09:20:45'),(74,49,14,'C E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E','2018-05-21 09:21:06'),(75,5,14,'A B C B C B D B D B C A C A C A B C D C B C B C B A A B C C D D C B A A B C D A A B C D C C C B A B','2018-05-21 09:21:18'),(76,5,14,'A B C B C B D B D B C A C A C A B C D C B C B C B A A B C C D D C B A A B C D A A B C D C C C B A B','2018-05-21 09:21:25'),(77,6,7,'E E B C C A B D E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E','2018-06-15 04:19:58'),(78,5,14,'D D D D E E E E E D D D D E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E','2018-06-19 15:44:01'),(79,46,11,'E E B E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E D A B E D E C E B E D A','2018-06-21 16:14:19'),(80,46,14,'E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E','2018-06-21 16:21:30'),(81,52,14,'E E B B E E D E E B D E B D A E E E B D B D E A C A D C A B D B C D B B B E C D A E E B E E E E E E','2018-06-22 01:21:26'),(82,52,14,'E E B B E E D E E B D E B D A E E E B D B D E A C A D C A B D B C D B B B E C D A E E B E E E E E E','2018-06-22 01:21:37'),(83,6,14,'','2018-06-22 12:57:17'),(84,51,7,'E E E A E E E B E E E E E E E E E E E E E C E E E A E E E E E E E E E E E E E E E E E E E E E E E E','2018-06-23 01:35:35'),(85,53,7,'A A A A A A A A A A A A A A E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E','2018-06-23 07:29:21'),(86,53,2,'','2018-06-23 07:34:04'),(89,52,13,'E E E E D E A E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E E','2018-07-20 05:00:04'),(90,58,14,'B B A C B B B B B B B B B B B B B B B B B B B B B B B B B B B B B B B B B B B E E E E E E E E E E E','2018-07-24 02:58:13');
/*!40000 ALTER TABLE `record` ENABLE KEYS */;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `student_id` int(10) NOT NULL,
  `student_school` varchar(190) NOT NULL,
  `student_address` varchar(190) NOT NULL,
  KEY `fk_student_01` (`student_id`),
  CONSTRAINT `fk_student_01` FOREIGN KEY (`student_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (5,'HCMUT','KTX Khu A'),(6,'HCMUS','Thuan An, Binh Duong'),(7,'Đại Học Ngoại Thương CS2','Tỉnh Quảng Ngãi'),(8,'HCMUT','Quang Ha'),(25,'HCMUT','815AH1 - KTX Khu A'),(29,'DUT','Hoa Khanh, Da Nang'),(30,'HUST','Long Bien, Ha Noi'),(46,'',''),(47,'HCMUT','KTX BK'),(49,'Mẫu giáo Bách Khoa','497 Hòa Hảo'),(51,'',''),(52,'',''),(53,'Đại học bách khoa','Lý thường kiệt'),(55,'fdsfsfsf','fsdfsdfdsf'),(56,'Aa','Áa'),(58,'Bách Khoa','312AH1');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`u312006781_eowl`@`localhost`*/ /*!50003 TRIGGER `delete_record_from_student` BEFORE DELETE ON `student`
 FOR EACH ROW BEGIN
DELETE FROM record
WHERE record.idStudent = old.student_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher` (
  `teacher_id` int(10) NOT NULL,
  `assigned_by` int(10) NOT NULL,
  `assigned_day` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `subject` enum('Toán học','Ngữ văn','Sinh học','Vật lý','Hóa học','Lịch sử','Địa lý','Ngoại ngữ','Giáo dục công dân','Công nghệ','Tin học') NOT NULL,
  PRIMARY KEY (`teacher_id`),
  KEY `fk_teacher_03` (`assigned_by`),
  CONSTRAINT `fk_teacher_01` FOREIGN KEY (`teacher_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `fk_teacher_03` FOREIGN KEY (`assigned_by`) REFERENCES `admin` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES (24,2,'2018-05-15 01:46:46','Ngoại ngữ'),(31,1,'2018-05-15 01:28:25','Tin học'),(36,2,'2018-05-15 01:51:03','Toán học'),(37,2,'2018-05-15 01:50:58','Vật lý'),(38,1,'2018-05-15 09:48:53','Hóa học'),(39,1,'2018-05-15 09:49:10','Sinh học'),(50,1,'2018-05-21 09:15:52','Toán học');
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`u312006781_eowl`@`localhost`*/ /*!50003 TRIGGER `delete_exam_from_teacher` BEFORE DELETE ON `teacher`
 FOR EACH ROW BEGIN 
DELETE FROM exam
WHERE exam.created_by = old.teacher_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(190) NOT NULL,
  `user_name` varchar(190) NOT NULL,
  `user_pass` varchar(190) NOT NULL,
  `user_role` enum('admin','teacher','student') NOT NULL,
  `user_img` varchar(190) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin01@gmail.com','admin01','18c6d818ae35a3e8279b5330eda01498','admin','user1.png'),(2,'admin02@gmail.com','admin02','6e60a28384bc05fa5b33cc579d040c56','admin','user2.png'),(5,'phamvanlinh143@gmail.com','Phạm Văn Lĩnh','b0f272966386057c96b4e0bc3b2ebc0d','student','user5.png'),(6,'student02@gmail.com','Phạm Thị Phước','3836fb8e0d5844c27591c9f0b7c2ddfa','student','user6.png'),(7,'student03@gmail.com','Đỗ Nhật Kim Long','86d669cff1cf486d2f5ff5ca8d02a111','student','user7.png'),(8,'student04@gmail.com','Trịnh Kim Vinh','097ba3e94398d24245e9d6897de23a45','student','user8.png'),(11,'admin03@gmail.com','admin03','7dc2466ad3ff5911f6a5e47e043e0abc','admin','user11.png'),(24,'ngochung@gmail.com','Trần Ngọc Hùng','e10adc3949ba59abbe56e057f20f883e','teacher','user24.png'),(25,'nhatnam10a3@gmail.com','Hoàng Công Nhật Nam','b59c67bf196a4758191e42f76670ceba','student','user25.jpg'),(27,'admin04@gmail.com','admin04','499c208ceafb4fbba162f077060955bd','admin','user27.png'),(29,'phamvanlanh@gmail.com','Phạm Văn Lanh','4297f44b13955235245b2497399d7a93','student','user29.png'),(30,'trankiet@gmail.com','Trần Anh Kiệt','4297f44b13955235245b2497399d7a93','student','user30.png'),(31,'thanhsach@gmail.com','Nguyễn Thành Sách','4297f44b13955235245b2497399d7a93','teacher','user31.png'),(32,'admin05@gmail.com','admin05','3deffd4cb346737769a7a509c95cee17','admin','user32.png'),(36,'giangho@gmail.com','Trần Giang Hồ','4297f44b13955235245b2497399d7a93','teacher','student33.jpg'),(37,'vanluong@gmail.com','Trần Văn Lượng','4297f44b13955235245b2497399d7a93','teacher','student37.png'),(38,'teacher01@gmail.com','teacher01','4297f44b13955235245b2497399d7a93','teacher',''),(39,'teacher02@gmail.com','teacher02','4297f44b13955235245b2497399d7a93','teacher',''),(41,'thinh@gmail.com','thinh','1e191d851b3b49a248f4ea62f6b06410','admin','admin41.jpg'),(45,'admin@gmail.com','admin','202cb962ac59075b964b07152d234b70','admin','user45.jpg'),(46,'leminhthinh.cse@gmail.com','Lê Minh Thịnh','938fca930a138f05ab0670be56631885','student','https://lh3.googleusercontent.com/-65smjg3iZIg/AAAAAAAAAAI/AAAAAAAAAD8/xSikx8NvWe8/photo.jpg'),(47,'hao@gmail.com','Văn Minh Hào','202cb962ac59075b964b07152d234b70','student',''),(49,'motmaytinh@gmail.com','Tran Ngoc Quy','e10adc3949ba59abbe56e057f20f883e','student',''),(50,'quy@gmail.com','Trần Ngọc Quý','202cb962ac59075b964b07152d234b70','teacher','student50.gif'),(51,'sangdu2326@gmail.com','Sáng Dũ Giang','0b7ef8fd14e6f3f42f098143a7822a7a','student','https://lh3.googleusercontent.com/-fKWyS4stZLg/AAAAAAAAAAI/AAAAAAAAAAA/AB6qoq1KJhXGguqzsKoGfFUQIB4fE9DNZA/mo/photo.jpg'),(52,'lmtdxpy@gmail.com','Minh Thịnh Lê','aa9134d013f2f3358433c79e5a65a3c2','student','https://lh3.googleusercontent.com/-rYoetttO0f0/AAAAAAAAAAI/AAAAAAAAJuo/PkO0Jpq2URY/photo.jpg'),(53,'1511998@hcmut.edu.vn','Nguyễn Quán Anh Minh','202cb962ac59075b964b07152d234b70','student',''),(55,'congluc19297@gmail.com','fsdfsfdfdfs','d1a80d95b2ec07a27e8de8291ee97d13','student','https://lh6.googleusercontent.com/-zjcmtRXqQnU/AAAAAAAAAAI/AAAAAAAAAOI/DlVsiG7Xkhs/photo.jpg'),(56,'aa@gmail.com','aa','e10adc3949ba59abbe56e057f20f883e','student',''),(58,'khanhtran@gmail.com','Trần Công Khanh','60e03d50c220822026a36ee830acc525','student','');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`u312006781_eowl`@`localhost`*/ /*!50003 TRIGGER `delete_student_from_user` BEFORE DELETE ON `user`
 FOR EACH ROW BEGIN
DELETE FROM student
  WHERE student.student_id = old.user_id;
DELETE FROM teacher
  WHERE teacher.teacher_id = old.user_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping routines for database 'u312006781_eowl'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-27  5:20:38
