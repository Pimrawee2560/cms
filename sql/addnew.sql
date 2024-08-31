CREATE TABLE `addnewpost` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `day` date ,
  PRIMARY KEY (`id`)
)

INSERT INTO `addnewpost` (`Title`, `Status`, `image`, `link`, `content`, `day`) VALUES 
('รถไม่มีน้ำมันอ้ายกดเงินไม่ทัน', 'Publish', 's1.jpg', 'xxxxxx', '<p>เบนซิน</p>', '2024-05-22');
('หลงรักสาวบางโพ', 'Publish', 's4.jpg', 'xxxxxx', '<p>แม่งโง่</p>', '2024-05-22');
('ยังยิงเยา', 'Publish', '9abe49ed1cf29b8c012bbb1ab3e9e671.jpg', 'xxxxxx', '<p>asdasdsaasd</p>', '2024-05-22');
('ซูชิหน้าใหม่หัวใจดวงเดิม', 'Publish', 'a5ac7cd857319c1dcd0ca2f3ddc5a9b7.jpg', 'xxxxxx', '<p>ซูชิที่จริงใจต้องหน้าปลาไหลไฟฟ้า</p>', '2024-05-22');
('นกนนางนอน', 'Publish', '6f136a835cd205770931ec9cccc6b799.jpg', 'xxxxxx', '<p>นกนอนนาน</p>', '<p>เบนซิน</p>');
('ผมเป็นหมาคุณชอบไหม', 'Publish', 'ef145256cb14bdd44a65577c75aea100.jpg', 'https://www.youtube.com/watch?v=MD2xgAvyhpo
', '<p>เห็นคุณบอกคุณชอบหมา ผมเป็นหมาคุณจะชอบยัง</p>', '2024-05-22');
('ผมเป็นหมาคุณชอบไหม', 'Publish', 'ef145256cb14bdd44a65577c75aea100.jpg', 'https://www.youtube.com/watch?v=MD2xgAvyhpo
', '<p>เห็นคุณบอกคุณชอบหมา ผมเป็นหมาคุณจะชอบยัง</p>', '2024-05-22');
