<?php 
    require_once('DB_config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
// ดึงข้อมูลจากฐานข้อมูล
$select_stmt_title = $conn->prepare("SELECT `name` FROM `title` WHERE id = 9");
$select_stmt_title->execute();
$row_title = $select_stmt_title->fetch(PDO::FETCH_ASSOC);
$name_title = $row_title['name'];
?>
	<title><?php echo $name_title; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<?php 
$select_stmt_title = $conn->prepare("SELECT `image`, `show` FROM `title` WHERE id = 9");
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
	<link rel="stylesheet" type="text/css" href="Template2/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
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
$sql = "SELECT `page9_content` FROM `template_setting` WHERE id = " . $template_setting_id;
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$page9_content = $result['page9_content'];

$select_stmt_content = $conn->prepare("SELECT colors, `tcolors`, `border`, `radius`, `bcolors` FROM `colors` WHERE id = " . $page9_content);
$select_stmt_content->execute();
$row_content = $select_stmt_content->fetch(PDO::FETCH_ASSOC);
$contentbackground = $row_content['colors'];
$content2background = $row_content['tcolors'];
$contentborder = $row_content['border'];
$contentradius = $row_content['radius'];
$contentbcolors = $row_content['bcolors'];
?>
	<!-- Breadcrumb -->
	<div class="container bg-<?php echo $contentbackground; ?>">
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8 bg-<?php echo $contentbackground; ?>">
			<div class="f2-s-1 p-r-30 m-tb-6 bg-<?php echo $contentbackground; ?>">
				<a href="index.html" class="breadcrumb-item f1-s-3 cl9 text-<?php echo $content2background; ?>">
					Home 
				</a>

				<span class="breadcrumb-item f1-s-3 cl9 text-<?php echo $content2background; ?>">
					Blog
				</span>
			</div>

			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
					<i class="zmdi zmdi-search"></i>
				</button>
			</div>
		</div>
	</div>

	<!-- Page heading -->
<div class="container p-t-4 p-b-40 d-flex justify-content-center bg-<?php echo $contentbackground; ?>">
			<?php 
         $template_setting_id = 2;
        $sql = "SELECT `page5_header` FROM `template_setting` WHERE id = " . $template_setting_id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $page5_header = $result['page5_header'];

    $select_stmt_23 = $conn->prepare("SELECT `Details`, `connect`, `show` FROM `text` WHERE id = " . $page5_header);
    $select_stmt_23->execute();
    $row_23 = $select_stmt_23->fetch(PDO::FETCH_ASSOC);
    $Details_23 = $row_23['Details'];
    $connect_23 = $row_23['connect'];
    $show_23 = $row_23['show'];

    // ตรวจสอบค่าในฟิลด์ "show"
    if ($show_23 === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
    ?>
    <h2 class="f1-l-1 cl2 text-center">
       <?php echo $Details_23; ?>
    </h2>
	<?php   } // ปิดเงื่อนไข if?>
</div>


	<!-- Post -->
	<section class="bg0 p-b-55 bg-<?php echo $contentbackground; ?>">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-80">
					<div class="p-r-10 p-r-0-sr991">
						<div class="m-t--65 p-b-40">
							<!-- Item Blog -->
							 <?php   
							 try {
								$sql = "SELECT * FROM addnewpost WHERE Status = 'Publish' ORDER BY id DESC";
								$stmt = $conn->prepare($sql);
								$stmt->execute();
								if ($stmt->rowCount() > 0) {
									// วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
									while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
										echo '<div class="flex-col-s-c how-bor2 p-t-65 p-b-40">';
										echo '<h5 class="p-b-17 txt-center">';
										echo '<a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '"  class="f1-l-1 cl2 hov-cl10 trans-03 respon2">' . $row["Title"] . '</a>';
										echo '</h5>'; // ปิด div.single-
										echo '<div class="cl8 txt-center p-b-24">';
										echo '<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">' . $row["day"] . '</a>';
										echo '<a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '" class="wrap-pic-w hov1 trans-03 m-b-30">';
										echo '<img src="upload/' . $row["image"] . '" alt="' . $row["Title"] . '" alt="IMG">';
										echo '</a>'; // ต้องเพิ่ม ; ที่นี่
										echo '<p class="f1-s-11 cl6 txt-center p-b-22">' . $row["content"] . '</p>';
										echo '<a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '" class="f1-s-1 cl9 hov-cl10 trans-03">Read More<i class="m-l-2 fa fa-long-arrow-alt-right"></i></a>';
										echo '</div></div>'; // ปิด div.cl8 และ div.flex-col-s-c
										}
									} else {
										echo "0 รายการของข่าว";
									}
								} catch(PDOException $e) {
									echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
								}
								?>
						</div>

						<!-- Pagination -->
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
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
<footer class="text-center">
    <div class="bg2 p-t-40 p-b-25 bg-<?php echo $footerbackground; ?>" style="border: <?php echo $footerborder; ?>px solid <?php echo $footerbcolors; ?>; border-radius: <?php echo $footerradius; ?>px;">
        <div class="container d-flex justify-content-center">
            <div class="row">
                <div class="col-lg-4 p-b-20 mx-auto">
                    <div class="d-flex justify-content-center mb-3">
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
                        </a>
                    </div>

                    <div>
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