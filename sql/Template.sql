CREATE TABLE `template` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `Template` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Page1` varchar(255) NOT NULL,
  `Page2` varchar(255) NOT NULL,
  `Page3` varchar(255) NOT NULL,
  `Page4` varchar(255) NOT NULL,
  `Page5` varchar(255) NOT NULL,
  `Page6` varchar(255) NOT NULL,
  `Page7` varchar(255) NOT NULL,
  `Page8` varchar(255) NOT NULL,
  `Page9` varchar(255) NOT NULL,
  `Page10` varchar(255) NOT NULL,
  `Page11` varchar(255) NOT NULL,
  `Page12` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `template` (`Template`, `Status`, `Page1`, `Page2`, `Page3`, `Page4`, `Page5`, `Page6`, `Page7`, `Page8`, `Page9`, `Page10`, `Page11`, `Page12`)
VALUES 
('Template News First', 'use', 'Template1/index.php', 'Template1/about.php', 'Template1/categori.php', 'Template1/latest_news.php', 'Template1/blog.php', 'Template1/blog_details.php', 'Template1/elements.php', 'Template1/contact.php', 'Page9 Content', 'Page10 Content', 'Page11 Content', 'Page12 Content'),
('Template News Two', 'unuse', 'Template2/home-03.php', 'Template2/about.php', 'Template2/category-02.php', 'Template2/blog-detail-02.php', 'Template2/blog-list-01.php', 'Template2/blog-detail-01.php', 'Template2/contact.php', 'Template2/blog-grid.php', 'Template2/blog-list-02.php', 'Page10 Content', 'Page11 Content', 'Page12 Content');

