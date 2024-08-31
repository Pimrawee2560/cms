CREATE TABLE `colors` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `section` varchar(255) NOT NULL,
  `colors` varchar(255) NOT NULL,
  `border` varchar(255) NOT NULL,
  `radius` varchar(255) NOT NULL,
  `bcolors` varchar(255) NOT NULL,
  `tcolors` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO colors (section, colors, border, radius, bcolors, tcolors) VALUES 
('Background colors', '#ffffff', '0px', '0px', '#706666', '-'),
('Tab Header', '#696969', '0px', '0px', '#ffffff', '#000000'),
('Register Button', '#ffffff', '1px', '4px', '#ffffff', '-'),
('Login Button', '#ffffff', '1px', '4px', '#ffffff', '-'),
('Tab Menu', '#525252', '0px', '0px', '#ffffff', '#ffffff'),
('View all Button', '#757575', '0px', '4px', '#ffffff', '#ffffff'),
('Update-new', '#ffffff', '-', '-', '#ff0000', '#ffffff'),
('Font Content', '#000000', '-', '-', '#ff0000', '#ff0000'),
('Font Title', '#000000', '18px', '-', '#ff0000', '#ff0000'),
('PAGEPOST_Container', '#ffffff', '#000000', '8px', '#563d7c', '#ff0000'),
('PAGEPOST_Related1', '#ffffff', '1px', '-', '#000000', '#000000');
