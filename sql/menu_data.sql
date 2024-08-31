-- menu_data.sql

CREATE TABLE `menu` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `connect` varchar(255) NOT NULL,
  `show` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `menu` (`title`, `connect`, `show`) VALUES 
('Home', 'link1.php', 'on'),
('Profile', 'link1.php', 'on'),
('nanm', 'link1.php', 'on'),
('edit', 'link1.php', 'on'),
('Sport', 'link1.php', 'on'),
('cake', 'link1.php', 'on'),
('epic', 'link1.php', 'off'),
('lotte', 'link1.php', 'off'),
('RRRR', 'link1.php', 'off'),
('SSSS', 'link1.php', 'off');