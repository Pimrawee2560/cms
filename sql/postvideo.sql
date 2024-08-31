CREATE TABLE `postvideo` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `day` date ,
  PRIMARY KEY (`id`)
)

INSERT INTO `addnewpost` (`Title`, `Status`, `video`, `image`, `content`, `day`) VALUES 
('สองหมื่นสามร้าน', 'Publish', 'news1.mp4', 'whats_news_details4.png', '<p>เบนซิน</p>', '2024-05-22');
('เห่งเก่ง', 'Publish', 'news3.mp4', 'blog-list-06.jpg', '<p>แม่งโง่</p>', '2024-05-22');
