<?php 
    require_once('DB_config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
// ดึงข้อมูลจากฐานข้อมูล
$select_stmt_title = $conn->prepare("SELECT `name` FROM `title` WHERE id = 1");
$select_stmt_title->execute();
$row_title = $select_stmt_title->fetch(PDO::FETCH_ASSOC);
$name_title = $row_title['name'];
?>
	<title><?php echo $name_title; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<?php 
$select_stmt_title = $conn->prepare("SELECT `image`, `show` FROM `title` WHERE id = 1");
$select_stmt_title->execute();
$row_title = $select_stmt_title->fetch(PDO::FETCH_ASSOC);
$image_title = $row_title['image'];
$show_title = $row_title['show'];

if ($show_title === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
?>
    <link rel="icon" type="image/png" href="upload/logotitle/<?php echo $image_title; ?>"/>
<?php   } // ปิดเงื่อนไข if?>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Template2/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Template2/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Template2/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Template2/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Template2/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Template2/css/util.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Template2/css/main.css">
<!--===============================================================================================-->
</head>
<?php //style
$template_setting_id = 2;
$sql = "SELECT `background_colors` FROM `template_setting` WHERE id = " . $template_setting_id;
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$background_colors = $result['background_colors'];  // เก็บค่าของคอลัมน์ `background_colors`

$select_stmt_bodybackground = $conn->prepare("SELECT colors, `tcolors` FROM `colors` WHERE id = " . $background_colors);
$select_stmt_bodybackground->execute();
$row_bodybackground = $select_stmt_bodybackground->fetch(PDO::FETCH_ASSOC);
$bodybackground = $row_bodybackground['colors'];
$body2background = $row_bodybackground['tcolors'];
?>
<?php //style
$template_setting_id = 2;
$sql = "SELECT `tab_header` FROM `template_setting` WHERE id = " . $template_setting_id;
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$tab_header = $result['tab_header'];  // เก็บค่าของคอลัมน์ `background_colors`

$select_stmt_header = $conn->prepare("SELECT colors,`tcolors`,`border`, `radius`, `bcolors` FROM `colors` WHERE id = " . $tab_header);
$select_stmt_header->execute();
$row_header = $select_stmt_header->fetch(PDO::FETCH_ASSOC);
$headerbackground = $row_header['colors'];
$header2background = $row_header['tcolors'];
$headerborder = $row_header['border'];
$headerradius = $row_header['radius'];
$headerbcolors = $row_header['bcolors'];
?>
<?php //style
$template_setting_id = 2;
$sql = "SELECT `tab_menu` FROM `template_setting` WHERE id = " . $template_setting_id;
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$tab_menu = $result['tab_menu'];  // เก็บค่าของคอลัมน์ `background_colors`

$select_stmt_nav = $conn->prepare("SELECT colors, `tcolors`, `border`, `radius`, `bcolors` FROM `colors` WHERE id =  " . $tab_menu);
$select_stmt_nav->execute();
$row_nav = $select_stmt_nav->fetch(PDO::FETCH_ASSOC);
$navbackground = $row_nav['colors'];
$nav2background = $row_nav['tcolors'];
$navborder = $row_nav['border'];
$navradius = $row_nav['radius'];
$navbcolors = $row_nav['bcolors'];
?>
<body class="animsition bg-<?php echo $bodybackground; ?>">
	
<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<div class="topbar">
				<div class="content-topbar h-100 p-rl-30 bg-<?php echo $headerbackground; ?> " style="border: <?php echo $headerborder; ?>px solid <?php echo $headerbcolors; ?>; border-radius: <?php echo $headerradius; ?>px;">
					<div class="align-self-stretch size-w-0 pos-relative m-r-30">
					</div>
					<div class="flex-wr-e-c">
						<div class="left-topbar">
						 <?php 
                        $template_setting_id = 2;
                        $sql = "SELECT `about_button_homepage` FROM `template_setting` WHERE id = " . $template_setting_id;
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $about_button_homepage = $result['about_button_homepage'];

                        $select_stmt_four = $conn->prepare("SELECT `name`, `connect`, `show` FROM `button` WHERE id = " . $about_button_homepage);
                        $select_stmt_four->execute();
                        $row_four = $select_stmt_four->fetch(PDO::FETCH_ASSOC);
                        $name_four = $row_four['name'];
                        $connect_four = $row_four['connect'];
                        $show_four = $row_four['show'];
                        // ตรวจสอบค่าในฟิลด์ "show"
                        if ($show_four === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                        ?>
							<a href="<?php echo $connect_four; ?>" class="left-topbar-item">
								<?php echo $name_four; ?>
							</a>
						<?php   } // ปิดเงื่อนไข if?>
                        <?php 
                        $template_setting_id = 2;
                        $sql = "SELECT `contact_button_homepage` FROM `template_setting` WHERE id = " . $template_setting_id;
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $contact_button_homepage = $result['contact_button_homepage'];

                        $select_stmt_three = $conn->prepare("SELECT `name`, `connect`, `show` FROM `button` WHERE id = " . $contact_button_homepage);
                        $select_stmt_three->execute();
                        $row_three = $select_stmt_three->fetch(PDO::FETCH_ASSOC);
                        $name_three = $row_three['name'];
                        $connect_three = $row_three['connect'];
                        $show_three = $row_three['show'];
                        // ตรวจสอบค่าในฟิลด์ "show"
                        if ($show_three === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                        ?>
							<a href="<?php echo $connect_three; ?>" class="left-topbar-item">
								<?php echo $name_three; ?>
							</a>
						<?php   } // ปิดเงื่อนไข if?>
                                                        <?php
                                $template_setting_id = 2;
                                $sql = "SELECT `register_button_homepage` FROM `template_setting` WHERE id = " . $template_setting_id;
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                $register_button_homepage = $result['register_button_homepage'];

                                // ดึงข้อมูล "id=3" จากตาราง button
                                $select_stmt_one = $conn->prepare("SELECT `name`, `connect`, `show` FROM `button` WHERE id = " . $register_button_homepage);
                                $select_stmt_one->execute();
                                $row_one = $select_stmt_one->fetch(PDO::FETCH_ASSOC);
                                $name_one = $row_one['name'];
                                $connect_one = $row_one['connect'];
                                $show_one = $row_one['show'];
                                // ตรวจสอบค่าในฟิลด์ "show"
                                if ($show_one === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                                ?>
							<a href="<?php echo $connect_one; ?>" class="left-topbar-item">
								<?php echo $name_one; ?>
							</a>
					    <?php   } // ปิดเงื่อนไข if?>
                                <?php
                                $template_setting_id = 2;
                                $sql = "SELECT `login_button_homepage` FROM `template_setting` WHERE id = " . $template_setting_id;
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                $login_button_homepage = $result['login_button_homepage'];

                                // ดึงข้อมูล "id=3" จากตาราง button
                                $select_stmt_two = $conn->prepare("SELECT `name`, `connect`, `show` FROM `button` WHERE id = " . $login_button_homepage);
                                $select_stmt_two->execute();
                                $row_two = $select_stmt_two->fetch(PDO::FETCH_ASSOC);
                                $name_two = $row_two['name'];
                                $connect_two = $row_two['connect'];
                                $show_two = $row_two['show'];
                                // ตรวจสอบค่าในฟิลด์ "show"
                                if ($show_two === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                                ?>
							<a href="<?php echo $connect_two; ?>" class="left-topbar-item">
								<?php echo $name_two; ?>
							</a>
							<?php   } // ปิดเงื่อนไข if?>

							<a href="#" class="left-topbar-item"></a>
						</div>
					</div>	
				</div>
			</div>


			<!-- Header Mobile -->
			<div class="wrap-header-mobile">
				<!-- Logo moblie -->		
				<div class="logo-mobile">
					          <?php 
                                $logoResult = $conn->query("SELECT * FROM logo ORDER BY id DESC LIMIT 1");
                                $logo = $logoResult->fetch(PDO::FETCH_ASSOC);
                                if ($logo && !empty($logo['image'])) {
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($logo['image']) . '" alt="Logo" width="222" height="38">';
                                } else {
                                    echo 'News Website';
                                }
                                ?>
				</div>

			<!-- Button show menu -->
				<div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>

			<!-- Menu Mobile -->
			<div class="menu-mobile">
				<ul class="topbar-mobile">
					<li class="left-topbar">
						 <?php 
                        $template_setting_id = 2;
                        $sql = "SELECT `about_button_homepage` FROM `template_setting` WHERE id = " . $template_setting_id;
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $about_button_homepage = $result['about_button_homepage'];

                        $select_stmt_four = $conn->prepare("SELECT `name`, `connect`, `show` FROM `button` WHERE id = " . $about_button_homepage);
                        $select_stmt_four->execute();
                        $row_four = $select_stmt_four->fetch(PDO::FETCH_ASSOC);
                        $name_four = $row_four['name'];
                        $connect_four = $row_four['connect'];
                        $show_four = $row_four['show'];
                        // ตรวจสอบค่าในฟิลด์ "show"
                        if ($show_four === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                        ?>
						<a href="<?php echo $connect_four; ?>" class="left-topbar-item">
								<?php echo $name_four; ?>
						</a>
<?php   } // ปิดเงื่อนไข if?>
                        <?php 
                        $template_setting_id = 2;
                        $sql = "SELECT `contact_button_homepage` FROM `template_setting` WHERE id = " . $template_setting_id;
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $contact_button_homepage = $result['contact_button_homepage'];

                        $select_stmt_three = $conn->prepare("SELECT `name`, `connect`, `show` FROM `button` WHERE id = " . $contact_button_homepage);
                        $select_stmt_three->execute();
                        $row_three = $select_stmt_three->fetch(PDO::FETCH_ASSOC);
                        $name_three = $row_three['name'];
                        $connect_three = $row_three['connect'];
                        $show_three = $row_three['show'];
                        // ตรวจสอบค่าในฟิลด์ "show"
                        if ($show_three === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                        ?>
						<a href="<?php echo $connect_three; ?>" class="left-topbar-item">
							<?php echo $name_three; ?>
						</a>
						<?php   } // ปิดเงื่อนไข if?>
						<?php
                                $template_setting_id = 2;
                                $sql = "SELECT `register_button_homepage` FROM `template_setting` WHERE id = " . $template_setting_id;
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                $register_button_homepage = $result['register_button_homepage'];

                                // ดึงข้อมูล "id=3" จากตาราง button
                                $select_stmt_one = $conn->prepare("SELECT `name`, `connect`, `show` FROM `button` WHERE id = " . $register_button_homepage);
                                $select_stmt_one->execute();
                                $row_one = $select_stmt_one->fetch(PDO::FETCH_ASSOC);
                                $name_one = $row_one['name'];
                                $connect_one = $row_one['connect'];
                                $show_one = $row_one['show'];
                                // ตรวจสอบค่าในฟิลด์ "show"
                                if ($show_one === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                                ?>
						<a href="<?php echo $connect_one; ?>" class="left-topbar-item">
							<?php echo $name_one; ?>
						</a>
						<?php   } // ปิดเงื่อนไข if?>
                        <?php
                                $template_setting_id = 2;
                                $sql = "SELECT `login_button_homepage` FROM `template_setting` WHERE id = " . $template_setting_id;
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                $login_button_homepage = $result['login_button_homepage'];

                                // ดึงข้อมูล "id=3" จากตาราง button
                                $select_stmt_two = $conn->prepare("SELECT `name`, `connect`, `show` FROM `button` WHERE id = " . $login_button_homepage);
                                $select_stmt_two->execute();
                                $row_two = $select_stmt_two->fetch(PDO::FETCH_ASSOC);
                                $name_two = $row_two['name'];
                                $connect_two = $row_two['connect'];
                                $show_two = $row_two['show'];
                                // ตรวจสอบค่าในฟิลด์ "show"
                                if ($show_two === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                                ?>
						<a href="<?php echo $connect_two; ?>" class="left-topbar-item">
							<?php echo $name_two; ?>
						</a>
						<?php   } // ปิดเงื่อนไข if?>
					</li>
				</ul>

				<ul class="main-menu-m">
					<?php   
                         try {
                                            $sql = "SELECT * FROM menu WHERE `show` = 'on'";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->execute();
                                            // ตรวจสอบว่ามีข้อมูลหรือไม่
                                            if ($stmt->rowCount() > 0) {
                                                // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    echo '<li><a href="' . $row["connect"] . '" class="left-topbar-item">' . $row["title"] . '</a></li>';
                                                }
                                            } else {
                                                echo "0 รายการของข่าว";
                                            }
                                        } catch(PDOException $e) {
                                            echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                            }?> 
					<li>
				</ul>
			</div>
			
			<!--  -->
			<div class="wrap-logo no-banner container bg-<?php echo $header2background; ?>">
				<!-- Logo desktop -->		
				<div class="logo">
					          <?php 
                                $logoResult = $conn->query("SELECT * FROM logo ORDER BY id DESC LIMIT 1");
                                $logo = $logoResult->fetch(PDO::FETCH_ASSOC);
                                if ($logo && !empty($logo['image'])) {
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($logo['image']) . '" alt="Logo" width="222" height="38">';
                                } else {
                                    echo 'News Website';
                                }
                                ?>
				</div>
			</div>	
			
			<!--  -->
			<div class="wrap-main-nav">
				<div class="main-nav bg-<?php echo $navbackground; ?> " style="border: <?php echo $navborder; ?>px solid <?php echo $navbcolors; ?>; border-radius: <?php echo $navradius; ?>px;">
					<!-- Menu desktop -->
					<nav class="menu-desktop">

						<ul class="main-menu justify-content-center">
											<?php   
                         try {
                                            $sql = "SELECT * FROM menu WHERE `show` = 'on'";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->execute();
                                            // ตรวจสอบว่ามีข้อมูลหรือไม่
                                            if ($stmt->rowCount() > 0) {
                                                // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    echo '<li><a href="' . $row["connect"] . '" class="left-topbar-item">' . $row["title"] . '</a></li>';
                                                }
                                            } else {
                                                echo "0 รายการของข่าว";
                                            }
                                        } catch(PDOException $e) {
                                            echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                            }?> 
							</ul>
					</nav>
				</div>
			</div>	
		</div>
	</header>
	
   <?php
                    $template_setting_id = 2;
                    $sql = "SELECT `page1_content` FROM `template_setting` WHERE id = " . $template_setting_id;
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $page1_content = $result['page1_content'];

                    $select_stmt_conntent = $conn->prepare("SELECT colors, `tcolors`, `border`, `radius`, `bcolors` FROM `colors` WHERE id = " . $page1_content);
                    $select_stmt_conntent->execute();
                    $row_conntent = $select_stmt_conntent->fetch(PDO::FETCH_ASSOC);
                    $conntentbackground = $row_conntent['colors'];
                    $conntent2background = $row_conntent['tcolors'];
                    $conntentborder = $row_conntent['border'];
                    $conntentradius = $row_conntent['radius'];
                    $conntentbcolors = $row_conntent['bcolors'];
                    ?>
	<!--TrendingTop -->
 <?php 
// ดึงข้อมูล "id=3" จากตาราง button
$select_stmt_showone = $conn->prepare("SELECT `show` FROM `related` WHERE id = 1");
$select_stmt_showone->execute();
$row_showone = $select_stmt_showone->fetch(PDO::FETCH_ASSOC);
$show_showone = $row_showone['show'];
                            
// ตรวจสอบค่าในฟิลด์ "show"
if ($show_showone === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
?>
	<div class="container bg-<?php echo $body2background; ?>">
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8 bg-<?php echo $conntentbackground; ?>">
			<div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c bg-<?php echo $conntentbackground; ?>">
				<span class="text-uppercase cl2 p-r-8">
                <?php
                $template_setting_id = 2;
                $sql = "SELECT `page1_text_sideshow`  FROM `template_setting` WHERE id = " . $template_setting_id;
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $page1_text_sideshow = $result['page1_text_sideshow'];

                $select_stmt_one = $conn->prepare("SELECT `Details`, `connect`, `show` FROM `text` WHERE id = " . $page1_text_sideshow);
                $select_stmt_one->execute();
                $row_one = $select_stmt_one->fetch(PDO::FETCH_ASSOC);
                $Details_one = $row_one['Details'];
                $connect_one = $row_one['connect'];
                $show_one = $row_one['show'];

                // ตรวจสอบค่าในฟิลด์ "show"
                if ($show_one === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                ?>
					<?php echo $Details_one; ?>
					 <?php   } // ปิดเงื่อนไข if?>
				</span>
				 
			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
					<i class="zmdi zmdi-search"></i>
				</button>
			</div>
		</div>
	</div>
	<!-- Feature post -->
	<section class="bg0 bg-<?php echo $conntentbackground; ?>">
		<div class="container">
			<div class="row m-rl--1">
				  <?php
                  try {
                    $sql = "SELECT * FROM addnewpost WHERE Status = 'Publish' ORDER BY RAND() LIMIT 6";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    if ($stmt->rowCount() > 0) {
                        // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<div class="col-sm-6 col-lg-4 p-rl-1 p-b-2">';
                            echo '<div class="bg-img1 size-a-12 how1 pos-relative" style="background-image: url(upload/' . $row["image"] . ');">';
                            echo '<a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '" class="dis-block how1-child1 trans-03"></a>';
                            echo '<div class="flex-col-e-s s-full p-rl-25 p-tb-11">';
                            echo '<h3 class="how1-child2 m-t-10">';
                            echo '<a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '" class="f1-m-1 cl0 hov-cl10 trans-03" style="font-weight: bold;">' . $row["Title"] . '</a>';
                            echo '<p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms" style="color: white;">' . $row["day"] . '</p>';
                            echo '</h3></div></div></div>'; // ปิด div.single-slider
                            }
                        } else {
                            echo "0 รายการของข่าว";
                        }
                    } catch(PDOException $e) {
                        echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                    }
                    ?>
			</div>
		</div>
	</section>
   <?php   } // ปิดเงื่อนไข if?>
                    <?php
                    $template_setting_id = 2;
                    $sql = "SELECT `page1_content2` FROM `template_setting` WHERE id = " . $template_setting_id;
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $page1_content2 = $result['page1_content2'];  // เก็บค่าของคอลัมน์ `background_colors`


                    $select_stmt_content2 = $conn->prepare("SELECT colors, `tcolors`, `border`, `radius`, `bcolors` FROM `colors` WHERE id = " . $page1_content2);
                    $select_stmt_content2->execute();
                    $row_content2  = $select_stmt_content2->fetch(PDO::FETCH_ASSOC);
                    $content2background = $row_content2['colors'];
                    $content22background = $row_content2['tcolors'];
                    $content2border = $row_content2['border'];
                    $content2radius = $row_content2['radius'];
                    $content2bcolors = $row_content2['bcolors'];
                    ?>
	<!-- Latestupdate -->
	<section class="bg0 p-t-70 bg-<?php echo $content2background; ?>">
		<div class="container">
			<div class="row justify-content-center" style="border: <?php echo $content2border; ?>px solid <?php echo $content2bcolors; ?>; border-radius: <?php echo $content2radius; ?>px;">
				<div class="col-md-10 col-lg-8">
					<div class="p-b-20">
						<?php 
						// ดึงข้อมูล "id=3" จากตาราง button
						$select_stmt_showtwo = $conn->prepare("SELECT `show` FROM `related` WHERE id = 2");
						$select_stmt_showtwo->execute();
						$row_showtwo = $select_stmt_showtwo->fetch(PDO::FETCH_ASSOC);
						$show_showtwo = $row_showtwo['show'];
                        // ตรวจสอบค่าในฟิลด์ "show"
						if ($show_showtwo === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
						?>
						<!-- Entertainment  -->
                         <?php
                        $template_setting_id = 2;
                        $sql = "SELECT `page1_section1` FROM `template_setting` WHERE id = " . $template_setting_id;
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $page1_section1 = $result['page1_section1'];

                        $select_stmt_four = $conn->prepare("SELECT `Details`, `connect`, `show` FROM `text` WHERE id = " . $page1_section1);
                        $select_stmt_four->execute();
                        $row_four = $select_stmt_four->fetch(PDO::FETCH_ASSOC);
                        $Details_four = $row_four['Details'];
                        $connect_four = $row_four['connect'];
                        $show_four = $row_four['show'];
                       // ตรวจสอบค่าในฟิลด์ "show"
                        if ($show_four === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                        ?>
						<div class="p-b-20">
							<div class="how2 how2-cl1 flex-sb-c m-r-10 m-r-0-sr991">
								<h3 class="f1-m-2 cl13 tab01-title"><?php echo $Details_four; ?></h3>
                                

								<a href="category-01.html" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
									View all
									<i class="fs-12 m-l-5 fa fa-caret-right"></i>
								</a>
							</div>
							 <?php   } // ปิดเงื่อนไข if?>


							<div class="row p-t-35">
								<div class="col-sm-6 p-r-25 p-r-15-sr991">
									<!-- Item post -->	
					        <?php   
                             try {
                                $sql = "SELECT * FROM addnewpost WHERE Status = 'Publish' ORDER BY RAND() LIMIT 1";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                if ($stmt->rowCount() > 0) {
                                    // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo '<div class="m-b-30">';
                                        echo '<a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '" class="wrap-pic-w hov1 trans-03">';
                                        echo '<img src="upload/' . $row["image"] . '" alt="' . $row["Title"] . '" alt="IMG">';
                                        echo '</a>';
                                        echo '<div class="p-t-20">';
                                        echo '<h5 class="p-b-5">';
                                        echo '<a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '" class="wrap-pic-w hov1 trans-03" class="f1-m-3 cl2 hov-cl10 trans-03">' . $row["Title"] . '</a>';
										echo '</h5>'; // ปิด div.single-
										echo '<span class="cl8">';
										echo '<a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '" class="f1-s-4 cl8 hov-cl10 trans-03">' . $row["day"] . '</a>';
										echo '</span>';
										echo '</div></div></div>';
                                        }
                                    } else {
                                        echo "0 รายการของข่าว";
                                    }
                                } catch(PDOException $e) {
                                    echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                                }
                                ?>

								<div class="col-sm-6 p-r-25 p-r-15-sr991">
									<!-- Item post -->	
								<?php   
								try {
                                $sql = "SELECT * FROM addnewpost WHERE Status = 'Publish' ORDER BY id DESC LIMIT 3";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                if ($stmt->rowCount() > 0) {
                                    // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo '<div class="flex-wr-sb-s m-b-30">';
                                        echo '<a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '"  class="size-w-1 wrap-pic-w hov1 trans-03">';
                                        echo '<img src="upload/' . $row["image"] . '" alt="' . $row["Title"] . '" alt="IMGDonec metus orci, malesuada et lectus vitae">';
                                        echo '</a>';
                                        echo '<div class="size-w-2">';
                                        echo '<h5 class="p-b-5">';
                                        echo '<a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '" class="f1-s-5 cl3 hov-cl10 trans-03">' . $row["Title"] . '</a>';
										echo '</h5>'; // ปิด div.single-
										echo '<span class="cl8">';
										echo '<a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '" class="f1-s-4 cl8 hov-cl10 trans-03">' . $row["day"] . '</a>';
										echo '</span>';
										echo '</div></div>';
                                        }
                                    } else {
                                        echo "0 รายการของข่าว";
                                    }
                                } catch(PDOException $e) {
                                    echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                                }
                                ?>
								</div>
							</div>
						</div>
						<?php   } // ปิดเงื่อนไข if?>

						<!-- TrendingNews  -->
<?php 
// ดึงข้อมูล "id=3" จากตาราง button
$select_stmt_showthree = $conn->prepare("SELECT `show` FROM `related` WHERE id = 3");
$select_stmt_showthree->execute();
$row_showthree = $select_stmt_showthree->fetch(PDO::FETCH_ASSOC);
$show_showthree = $row_showthree['show'];
                            
// ตรวจสอบค่าในฟิลด์ "show"
if ($show_showthree === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
?>
						     <?php
                                $template_setting_id = 2;
                                $sql = "SELECT `page1_section2` FROM `template_setting` WHERE id = " . $template_setting_id;
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                $page1_section2= $result['page1_section2'];  

                                $select_stmt_five = $conn->prepare("SELECT `Details`, `connect`, `show` FROM `text` WHERE id = " . $page1_section2);
                                $select_stmt_five->execute();
                                $row_five = $select_stmt_five->fetch(PDO::FETCH_ASSOC);
                                $Details_five = $row_five['Details'];
                                $connect_five = $row_five['connect'];
                                $show_five = $row_five['show'];
                                // ตรวจสอบค่าในฟิลด์ "show"
                                if ($show_five === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                            ?>
						<div class="p-b-25 p-r-10 p-r-0-sr991">
							<div class="how2 how2-cl3 flex-s-c">
								<h3 class="f1-m-2 cl14 tab01-title">
									<?php echo $Details_five; ?>
								</h3>
							</div>
							  <?php   } // ปิดเงื่อนไข if?>

							<div class="flex-wr-sb-s p-t-35">
								<div class="size-w-6 w-full-sr575">
									<!-- Item post -->	
							<?php   
                             try {
                                $sql = "SELECT * FROM addnewpost WHERE Status = 'Publish' AND link <> '' ORDER BY RAND() LIMIT 1";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                if ($stmt->rowCount() > 0) {
                                    // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo '<div class="m-b-30">';
                                        echo '<a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '" class="wrap-pic-w hov1 trans-03">';
                                        echo '<img src="upload/' . $row["image"] . '" alt="' . $row["Title"] . '" alt="IMG">';
                                        echo '</a>';
                                        echo '<div class="p-t-25">';
                                        echo '<h5 class="p-b-5">';
                                        echo '<a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '" class="wrap-pic-w hov1 trans-03" class="f1-m-3 cl2 hov-cl10 trans-03">' . $row["Title"] . '</a>';
										echo '</h5>'; // ปิด div.single-
										echo '<span class="cl8">';
										echo '<a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '" class="f1-s-4 cl8 hov-cl10 trans-03">' . $row["day"] . '</a>';
										echo '</span>';
										echo '<p class="f1-s-1 cl6 p-t-18">' . $row["content"] . '</p>';
										echo '</div></div></div>';
                                        }
                                    } else {
                                        echo "0 รายการของข่าว";
                                    }
                                } catch(PDOException $e) {
                                    echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                                }
                                ?>
								<div class="size-w-7 w-full-sr575">
									<!-- Item post -->	
							    <?php   
								try {
                                $sql = "SELECT * FROM addnewpost WHERE Status = 'Publish' AND link <> '' ORDER BY id LIMIT 2";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                if ($stmt->rowCount() > 0) {
                                    // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo '<div class="m-b-30">';
                                        echo '<a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '"  class="wrap-pic-w hov1 trans-03">';
                                        echo '<img src="upload/' . $row["image"] . '" alt="' . $row["Title"] . '" alt="IMGDonec metus orci, malesuada et lectus vitae">';
                                        echo '</a>';
                                        echo '<div class="p-t-10">';
                                        echo '<h5 class="p-b-5">';
                                        echo '<a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '" class="f1-s-5 cl3 hov-cl10 trans-03">' . $row["Title"] . '</a>';
										echo '</h5>'; // ปิด div.single-
										echo '<span class="cl8">';
										echo '<class="f1-s-4 cl8 hov-cl10 trans-03">' . $row["day"] . '</class=>';
										echo '</span>';
										echo '</div></div>';
                                        }
                                    } else {
                                        echo "0 รายการของข่าว";
                                    }
                                } catch(PDOException $e) {
                                    echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                                }
                                ?>
								</div>
							</div>
						</div>
					</div>
				</div>
<?php   } // ปิดเงื่อนไข if?>
			
						<!-- Video -->
<?php 
// ดึงข้อมูล "id=3" จากตาราง button
$select_stmt_showfour = $conn->prepare("SELECT `show` FROM `related` WHERE id = 4");
$select_stmt_showfour->execute();
$row_showfour = $select_stmt_showfour->fetch(PDO::FETCH_ASSOC);
$show_showfour = $row_showfour['show'];
                            
// ตรวจสอบค่าในฟิลด์ "show"
if ($show_showfour === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
?>
						<?php 
                        $template_setting_id = 2;
                        $sql = "SELECT `page1_section3` FROM `template_setting` WHERE id = " . $template_setting_id;
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $page1_section3 = $result['page1_section3'];

                         $select_stmt_20 = $conn->prepare("SELECT `Details`, `connect`, `show` FROM `text` WHERE id = " . $page1_section3);
                         $select_stmt_20->execute();
                         $row_20 = $select_stmt_20->fetch(PDO::FETCH_ASSOC);
                         $Details_20 = $row_20['Details'];
                         $connect_20 = $row_20['connect'];
                         $show_20 = $row_20['show'];
                         // ตรวจสอบค่าในฟิลด์ "show"
                         if ($show_20 === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                         ?>
						<div class="p-b-55">
							<div class="how2 how2-cl4 flex-s-c m-b-35">
								<h3 class="f1-m-2 cl3 tab01-title">
									<?php echo $Details_20; ?>
								</h3>
							</div>
							<?php   } // ปิดเงื่อนไข if?>
							<?php   
                            try {
                                $sql = "SELECT * FROM `postvideo` WHERE Status = 'Publish'";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                // ตรวจสอบว่ามีข้อมูลหรือไม่
                                if ($stmt->rowCount() > 0) {
                                    // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
										echo '<div>';
                                        echo '<div class="wrap-pic-w pos-relative">';
                                        echo '<a href="video/' . $row["video"] . '"type="video/mp4">';
                                        echo '<img src="upload/' . $row["image"] . '" alt="' . $row["Title"] . '" width="720" height="405">';
                                        echo '<button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03" data-toggle="modal" data-target="#modal-video-01">';
                                        echo '<span class="fab fa-youtube"></span>';
                                        echo '</button></div>';
										echo '<div class="p-tb-16 p-rl-25 bg3">';
										echo '<h5 class="p-b-5">';
										echo '<a href="video/' . $row["video"] . '" class="f1-m-3 cl0 hov-cl10 trans-03">' . $row["Title"] . '</a></h5>';
										echo '<span class="cl15">';
										echo '<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">' . $row["day"] . '</a>';
                                        echo '</span>';
                                        echo '</div></div>';
                                        echo '</div>'; // ปิด div.single-video
                                        }
                                    } else {
                                        echo "0 รายการของข่าว";
                                    }
                                } catch(PDOException $e) {
                                    echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                                }
                                ?>
					

							
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php   } // ปิดเงื่อนไข if?>

	<!-- Latest -->
<?php 
// ดึงข้อมูล "id=3" จากตาราง button
$select_stmt_showfive = $conn->prepare("SELECT `show` FROM `related` WHERE id = 5");
$select_stmt_showfive->execute();
$row_showfive = $select_stmt_showfive->fetch(PDO::FETCH_ASSOC);
$show_showfive = $row_showfive['show'];
                            
// ตรวจสอบค่าในฟิลด์ "show"
if ($show_showfive === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
?>
	<section class="bg0 p-t-50 p-b-90 bg-<?php echo $bodybackground; ?> ">
		<div class="container">
			<div class="row justify-content-center bg-<?php echo $content2background; ?>">
				<div class="col-md-10 col-lg-8 p-b-50">
						<?php 
                        $template_setting_id = 2;
                        $sql = "SELECT `page1_section4` FROM `template_setting` WHERE id = " . $template_setting_id;
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $page1_section4= $result['page1_section4'];  
                        
                         // ดึงข้อมูล "id=3" จากตาราง button
                         $select_stmt_21 = $conn->prepare("SELECT `Details`, `connect`, `show` FROM `text` WHERE id = " . $page1_section4);
                         $select_stmt_21->execute();
                         $row_21 = $select_stmt_21->fetch(PDO::FETCH_ASSOC);
                         $Details_21 = $row_21['Details'];
                         $connect_21 = $row_21['connect'];
                         $show_21 = $row_21['show'];
                         // ตรวจสอบค่าในฟิลด์ "show"
                         if ($show_21 === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                         ?>
					<div class="p-r-10 p-r-0-sr991">
						<div class="how2 how2-cl4 flex-s-c">
							<h3 class="f1-m-2 cl3 tab01-title">
								<?php echo $Details_21; ?>
							</h3>
						</div>
						<?php   } // ปิดเงื่อนไข if?>

						<div class="p-b-40">
							<!-- Item post -->
							   <?php   
                                        try {
                                            $sql = "SELECT * FROM addnewpost WHERE Status = 'Publish'  ORDER BY id DESC LIMIT 5";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->execute();
                                            
                                            if ($stmt->rowCount() > 0) {
                                                // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    echo '<div class="flex-wr-sb-s p-t-40 p-b-15 how-bor2">';
													echo '<a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '" class="size-w-8 wrap-pic-w hov1 trans-03 w-full-sr575 m-b-25" >';
													echo '<img src="upload/' . $row["image"] . '" alt="IMG"></a>';
													echo '<div class="size-w-9 w-full-sr575 m-b-25">';
													echo '<h5 class="p-b-12">';
													echo '<a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '" class="f1-l-1 cl2 hov-cl10 trans-03 respon2">' . $row["Title"] . '</a>';
													echo '</h5>';
													echo '<div class="cl8 p-b-18">';
													echo '<span class="f1-s-3">' . $row["day"] . '</span>';
													echo '</div>';
													echo '<p class="f1-s-1 cl6 p-b-24">' . $row["content"] . '</p>';
													echo '<a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '" class="f1-s-1 cl9 hov-cl10 trans-03">Read More<i class="m-l-2 fa fa-long-arrow-alt-right"></i></a>';
													echo '</div></div>';
                                                }
                                            } else {
                                                echo "0 รายการของข่าว";
                                            }
                                        } catch(PDOException $e) {
                                            echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                                        }
                                        ?>  
							
						
				
			</div>
		</div>
	</section>
<?php   } // ปิดเงื่อนไข if?>
            <?php
            $template_setting_id = 2;
            $sql = "SELECT `footer_background` FROM `template_setting` WHERE id = " . $template_setting_id;
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $footer_background = $result['footer_background'];  // เก็บค่าของคอลัมน์ `background_colors`


            $select_stmt_footer = $conn->prepare("SELECT colors, `tcolors`, `border`, `radius`, `bcolors` FROM `colors` WHERE id = " . $footer_background);
            $select_stmt_footer->execute();
            $row_footer = $select_stmt_footer->fetch(PDO::FETCH_ASSOC);
            $footerbackground = $row_footer['colors'];
            $footer2background = $row_footer['tcolors'];
            $footerborder = $row_footer['border'];
            $footerradius = $row_footer['radius'];
            $footerbcolors = $row_footer['bcolors'];
            ?>
<!-- Footer -->
<footer>
    <div class="bg2 p-t-40 p-b-25 bg-<?php echo $footerbackground; ?>" style="border: <?php echo $footerborder; ?>px solid <?php echo $footerbcolors; ?>; border-radius: <?php echo $footerradius; ?>px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 p-b-20">
                    <div class="size-h-3 flex-s-c">
                        <a href="index.html">
                                <?php 
                                $logoResult = $conn->query("SELECT * FROM logo ORDER BY id DESC LIMIT 1");
                                $logo = $logoResult->fetch(PDO::FETCH_ASSOC);
                                if ($logo && !empty($logo['image'])) {
                                    echo '<img class="max-s-full" src="data:image/jpeg;base64,' . base64_encode($logo['image']) . '" alt="Logo" width="222" height="38">';
                                } else {
                                    echo 'News Website';
                                }
                                ?> 
                    </div>
                    <?php
                    $template_setting_id = 2;
                    $sql = "SELECT `footer` FROM `template_setting` WHERE id = " . $template_setting_id;
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $footer = $result['footer'];

                    $select_stmt_six = $conn->prepare("SELECT `Details`, `connect`, `show` FROM `text` WHERE id = " . $footer);
                    $select_stmt_six->execute();
                    $row_six = $select_stmt_six->fetch(PDO::FETCH_ASSOC);
                    $Details_six = $row_six['Details'];
                    $connect_six = $row_six['connect'];
                    $show_six = $row_six['show'];
                    // ตรวจสอบค่าในฟิลด์ "show"
                    if ($show_six === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                    ?>
                    <div>
                        <p class="f1-s-1 cl11 p-b-16">
                            <?php echo $Details_six; ?>
                        </p>
						 <?php   } // ปิดเงื่อนไข if?>
                        <?php
                        $template_setting_id = 2;
                        $sql = "SELECT `footer2` FROM `template_setting` WHERE id = " . $template_setting_id;
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $footer2 = $result['footer2'];

                        $select_stmt_seven = $conn->prepare("SELECT `Details`, `connect`, `show` FROM `text` WHERE id = " . $footer2);
                        $select_stmt_seven->execute();
                        $row_seven = $select_stmt_seven->fetch(PDO::FETCH_ASSOC);
                        $Details_seven = $row_seven['Details'];
                        $connect_seven = $row_seven['connect'];
                        $show_seven = $row_seven['show'];
                        // ตรวจสอบค่าในฟิลด์ "show"
                        if ($show_seven === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                        ?>
                        <p class="f1-s-1 cl11 p-b-16">
                           <?php echo $Details_seven; ?>
                        </p>
						<?php   } // ปิดเงื่อนไข if?>
                        <?php
                        $template_setting_id = 2;
                        $sql = "SELECT `footer3` FROM `template_setting` WHERE id = " . $template_setting_id;
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $footer3 = $result['footer3'];

                        $select_stmt_eight = $conn->prepare("SELECT `Details`, `connect`, `show` FROM `text` WHERE id = " . $footer3);
                        $select_stmt_eight->execute();
                        $row_eight = $select_stmt_eight->fetch(PDO::FETCH_ASSOC);
                        $Details_eight = $row_eight['Details'];
                        $connect_eight = $row_eight['connect'];
                        $show_eight = $row_eight['show'];
                        // ตรวจสอบค่าในฟิลด์ "show"
                        if ($show_eight === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                        ?>
                        <p class="f1-s-1 cl11 p-b-16">
                           <?php echo $Details_eight; ?>
                        </p>
						<?php   } // ปิดเงื่อนไข if?>
                        <div class="p-t-15">
                            	<?php   
                                 try {
                                            $sql = "SELECT * FROM icon WHERE `show` = 'on'";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->execute();
                                            // ตรวจสอบว่ามีข้อมูลหรือไม่
                                            if ($stmt->rowCount() > 0) {
                                                // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    echo '<a href="' . (!empty($row["link"]) ? $row["link"] : $row["connect"]) . '" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">';
                                                    echo '<span class="' . $row["type"] . ' text-' . $row["colors"] . '"></span>';
                                                    echo '</a>';
                                                }
                                            } else {
                                                echo "0 รายการของข่าว";
                                            }
                                        } catch(PDOException $e) {
                                            echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                            }?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<span class="fas fa-angle-up"></span>
		</span>
	</div>

	<!-- Modal Video 01-->
	<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document" data-dismiss="modal">
			<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

			<div class="wrap-video-mo-01">
				<div class="video-mo-01">
					<iframe src="https://www.youtube.com/embed/wJnBTPUQS5A?rel=0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>