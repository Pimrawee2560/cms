
CREATE TABLE `text` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `Text` varchar(255) NOT NULL,
  `Details` varchar(255) NOT NULL,
  `connect` varchar(255) NOT NULL,
  `show` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `text` (`Text`, `Details`, `connect`, `show`)
VALUES ('Page1_Textsideshow', '<div>
<h1><span style="color: #e03e2d;"><em>Title of a longer featured blog post</em></span></h1>
</div>', 'index.php', 'on'),
VALUES ('Page1_Textsideshow', '<p><strong>Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</strong></p>', 'index.php', 'on'),
VALUES ('Page1_Textsideshow', '<div>
<h4><span style="color: #ecf0f1;"><strong>Continue reading...</strong></span></h4>
</div>', 'index.php', 'on'),
VALUES ('Page1_section1', '<h4>Latest update</h4>', 'index.php', 'on'),
VALUES ('Page1_section2', '<h3>Trending &nbsp;Newss</h3>', 'index.php', 'on');
VALUES ('Footer', '<div>
<div><span style="color: #ecf0f1;">Lorem ipsum dolor sit amet, nsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</span></div>
</div>', 'index.php', 'on');
VALUES ('Footer2', '<div>
<div><span style="color: #ecf0f1;">198 West 21th Street, Suite 721 New York,NY 10010</span></div>
</div>', 'index.php', 'on');
VALUES ('Footer3', '<div>
<div><span style="color: #ecf0f1;">Phone: +95 (0) 123 456 789 Cell: +95 (0) 123 456 789</span></div>
</div>', 'index.php', 'on');
VALUES ('Page2_TextHead1', '<h4>Our Mission</h4>', 'index.php', 'on');
VALUES ('Page2_TextContent1', '<p>Consectetur adipiscing elit, sued do eiusmod tempor ididunt udfgt labore et dolore magna aliqua. Quis ipsum suspendisces gravida. Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan lacus. Risus commodo viverra sebfd d</p>', 'index.php', 'on');
VALUES ('Page2_TextHead2', '<h4>Our Vision</h4>', 'index.php', 'on');
VALUES ('Page2_TextContent1', '<p>Consectetur adipiscing elit, sued do eiusmod tempor ididunt udfgt labore et dolore magna aliqua. Quis ipsum suspendisces gravida. Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan lacus. Risus commodo viverra sebfd d</p>', 'index.php', 'on');
VALUES ('Page3_Heading', '<div>
<h3>Whats New</h3>
</div>', 'index.php', 'on');
VALUES ('Page7_Headcontact', '<h3>Buttonwood, California.</h3>', 'Page7.php', 'on');
VALUES ('Page7_contact', '<p>Rosemead, CA 91770</p>', 'Page7.php', 'on');
VALUES ('Page7_Headcontact2', '<h3>+1 253 565 2365</h3>', 'Page7.php', 'on');
VALUES ('Page7_contact2', '<p>Mon to Fri 9am to 6pm</p>', 'Page7.php', 'on');
VALUES ('Page7_Headcontact3', '<h3>support@colorlib.com</h3>', 'Page7.php', 'on');
VALUES ('Page7_contact3', '<p>Send us your query anytime!</p>', 'Page7.php', 'on');
VALUES ('Page1_section3', '<h3 class="f1-m-2 cl3 tab01-title">Featured Video</h3>', 'Page7.php', 'on');
VALUES ('Page1_section4', '<h3 class="f1-m-2 cl3 tab01-title">Latest Articles</h3>', 'Page7.php', 'on');
VALUES ('Page2_section', '<h3 class="f1-m-2 cl3 tab01-title">Popular Postd</h3>', 'Page7.php', 'on');
VALUES ('Page5_Header', '<h2 class="f1-l-1 cl2 text-center">Blog List</h2>', 'Page7.php', 'on');
