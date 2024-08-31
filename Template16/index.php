<?php
require_once('DB_config.php');
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php
    // ดึงข้อมูลจากฐานข้อมูล
    $select_stmt_title = $conn->prepare("SELECT `name` FROM `title` WHERE id = 1");
    $select_stmt_title->execute();
    $row_title = $select_stmt_title->fetch(PDO::FETCH_ASSOC);
    $name_title = $row_title['name'];
    ?>
    <title><?php echo $name_title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <?php
    $select_stmt_title = $conn->prepare("SELECT `image`, `show` FROM `title` WHERE id = 1");
    $select_stmt_title->execute();
    $row_title = $select_stmt_title->fetch(PDO::FETCH_ASSOC);
    $image_title = $row_title['image'];
    $show_title = $row_title['show'];

    if ($show_title === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
    ?>
        <link rel="shortcut icon" type="image/x-icon" href="upload/logotitle/<?php echo $image_title; ?>">
    <?php   } // ปิดเงื่อนไข if
    ?>
    <!-- CSS here -->
    <link rel="stylesheet" href="Template1/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="Template1/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="Template1/assets/css/ticker-style.css">
    <link rel="stylesheet" href="Template1/assets/css/flaticon.css">
    <link rel="stylesheet" href="Template1/assets/css/slicknav.css">
    <link rel="stylesheet" href="Template1/assets/css/animate.min.css">
    <link rel="stylesheet" href="Template1/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="Template1/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="Template1/assets/css/themify-icons.css">
    <link rel="stylesheet" href="Template1/assets/css/slick.css">
    <link rel="stylesheet" href="Template1/assets/css/nice-select.css">
    <link rel="stylesheet" href="Template1/assets/css/style.css">
    <style>
        .jumbotron {
            background-size: cover;
            /* ปรับขนาดรูปภาพให้ครอบคลุมพื้นที่ทั้งหมดของ <div> */
            background-position: center;
            /* จัดตำแหน่งรูปภาพให้อยู่กลาง */
            min-height: 300px;
            /* ตั้งค่าสูงสุดของ <div> */
        }

        .btn::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: #000000;
            z-index: 1;
            border-radius: 0px;
            transition: transform 0.5s;
            transition-timing-function: ease;
            transform-origin: 0 0;
            transition-timing-function: cubic-bezier(0.5, 1.6, 0.4, 0.7);
            transform: scaleX(0)
        }

        .single-video {
            position: relative;
            display: inline-block;
        }

        .video-title {
            position: absolute;
            top: 630px;
            /* Adjust this value as needed */
            left: 15px;
            /* Adjust this value as needed */
            color: white;
            font-weight: bold;
            font-size: 24px;
            /* Adjust this value as needed */
            margin: 0;
            padding: 5px;
            background-color: rgba(0, 0, 0, 0.5);
            /* Optional: adds a semi-transparent background to make the text more readable */
        }

        .weekly2-news-active {
            display: flex;
            /* Use flexbox for horizontal alignment */
            overflow-x: auto;
            /* Enable horizontal scrolling */
            scroll-snap-type: x mandatory;
            /* Optional: Snap scrolling for a better user experience */
            padding: 10px;
            /* Optional: Add padding if needed */
        }

        .weekly2-single {
            flex: 0 0 auto;
            /* Prevent items from shrinking and ensure they stay at their content width */
            margin-right: 15px;
            /* Space between items */
            scroll-snap-align: start;
            /* Optional: Snap alignment for each item */
        }

        /* Optional: Style for scrollbar */
        .weekly2-news-active::-webkit-scrollbar {
            height: 8px;
            /* Height of the scrollbar */
        }

        .weekly2-news-active::-webkit-scrollbar-thumb {
            background: #888;
            /* Color of the scrollbar */
            border-radius: 4px;
            /* Rounded corners for the scrollbar */
        }

        .weekly2-news-active::-webkit-scrollbar-thumb:hover {
            background: #555;
            /* Color of the scrollbar when hovered */
        }

        .weekly3-news-active {
            display: flex;
            /* Align items horizontally */
            overflow-x: auto;
            /* Enable horizontal scrolling */
            scroll-snap-type: x mandatory;
            /* Optional: Snap scrolling for better alignment */
            padding: 10px;
            /* Optional: Add padding if needed */
            gap: 15px;
            /* Optional: Add space between items */
        }

        .weekly3-single {
            flex: 0 0 auto;
            /* Prevent items from shrinking and keep their natural width */
            scroll-snap-align: start;
            /* Optional: Align items at the start */
        }

        /* Optional: Style for scrollbar */
        .weekly3-news-active::-webkit-scrollbar {
            height: 8px;
            /* Height of the scrollbar */
        }

        .weekly3-news-active::-webkit-scrollbar-thumb {
            background: #888;
            /* Color of the scrollbar */
            border-radius: 4px;
            /* Rounded corners for the scrollbar */
        }

        .weekly3-news-active::-webkit-scrollbar-thumb:hover {
            background: #555;
            /* Color of the scrollbar when hovered */
        }
    </style>
</head>
<?php //style
$template_setting_id = 16;
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
$template_setting_id = 16;
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
$template_setting_id = 16;
$sql = "SELECT `register_button` FROM `template_setting` WHERE id = " . $template_setting_id;
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$register_button = $result['register_button'];

$select_stmt_register = $conn->prepare("SELECT colors, `border`, `radius`, `bcolors` FROM `colors` WHERE id = " . $register_button);
$select_stmt_register->execute();
$row_register = $select_stmt_register->fetch(PDO::FETCH_ASSOC);
$registerbackground = $row_register['colors'];
$registerborder = $row_register['border'];
$registerradius = $row_register['radius'];
$registerbcolors = $row_register['bcolors'];
?>
<?php //style
$template_setting_id = 16;
$sql = "SELECT `login_button` FROM `template_setting` WHERE id = " . $template_setting_id;
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$login_button = $result['login_button'];

$select_stmt_login = $conn->prepare("SELECT colors, `border`, `radius`, `bcolors` FROM `colors` WHERE id = " . $login_button);
$select_stmt_login->execute();
$row_login = $select_stmt_login->fetch(PDO::FETCH_ASSOC);
$loginbackground = $row_login['colors'];
$loginborder = $row_login['border'];
$loginradius = $row_login['radius'];
$loginbcolors = $row_login['bcolors'];
?>
<?php //style
$template_setting_id = 16;
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

<body class="bg-<?php echo $bodybackground; ?>">
    <!-- Preloader Start -->
    <div class="container bg-<?php echo $body2background; ?>">
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">
                <div class="header-mid bg-<?php echo $headerbackground; ?>" style="border: <?php echo $headerborder; ?>px solid <?php echo $headerbcolors; ?>; border-radius: <?php echo $headerradius; ?>px;">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-3 col-lg-3 col-md-3 d-none d-md-block">
                                <div class="logo">
                                    <?php
                                    $logoResult = $conn->query("SELECT * FROM logo ORDER BY id DESC LIMIT 1");
                                    $logo = $logoResult->fetch(PDO::FETCH_ASSOC);
                                    if ($logo && !empty($logo['image'])) {
                                        echo '<img src="data:image/jpeg;base64,' . base64_encode($logo['image']) . '" alt="Logo" >';
                                    } else {
                                        echo 'News Website';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-4 d-flex justify-content-end align-items-center ml-auto">
                                <?php
                                $template_setting_id = 16;
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
                                    <a class="btn btn-sm btn-outline-secondary bg-<?php echo $registerbackground; ?> mr-2 btn::before-warning " href="<?php echo $connect_one; ?>" data-toggle="modal" data-target="#signInModal" style="border: <?php echo $registerborder; ?>px solid <?php echo $registerbcolors; ?>; border-radius: <?php echo $registerradius; ?>px;"><?php echo $name_one; ?></a>
                                <?php   } // ปิดเงื่อนไข if
                                ?>
                                <?php
                                $template_setting_id = 16;
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
                                    <a class="btn btn-sm btn-outline-secondary bg-<?php echo $loginbackground; ?>" href="<?php echo $connect_two; ?>" data-toggle="modal" data-target="#signUpModal" style="border: <?php echo $loginborder; ?>px solid <?php echo $loginbcolors; ?>; border-radius: <?php echo $loginradius; ?>px;"><?php echo $name_two; ?></a>
                                <?php   } // ปิดเงื่อนไข if
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom header-sticky bg-<?php echo $navbackground; ?> " style="border: <?php echo $navborder; ?>px solid <?php echo $navbcolors; ?>; border-radius: <?php echo $navradius; ?>px;">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-8 col-lg-8 col-md-12 header-flex">
                                <!-- sticky -->
                                <div class="sticky-logo">
                                    <?php
                                    $logoResult = $conn->query("SELECT * FROM logo ORDER BY id DESC LIMIT 1");
                                    $logo = $logoResult->fetch(PDO::FETCH_ASSOC);
                                    if ($logo && !empty($logo['image'])) {
                                        echo '<img src="data:image/jpeg;base64,' . base64_encode($logo['image']) . '" alt="Logo" >';
                                    } else {
                                        echo 'News Website';
                                    }
                                    ?>
                                </div>
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-md-block">
                                    <nav>
                                        <ul id="navigation">
                                            <?php
                                            try {
                                                $sql = "SELECT * FROM menu WHERE `show` = 'on'";
                                                $stmt = $conn->prepare($sql);
                                                $stmt->execute();
                                                // ตรวจสอบว่ามีข้อมูลหรือไม่
                                                if ($stmt->rowCount() > 0) {
                                                    // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        echo '<li><a href="' . $row["connect"] . '">' . $row["title"] . '</a></li>';
                                                    }
                                                } else {
                                                    echo "0 รายการของข่าว";
                                                }
                                            } catch (PDOException $e) {
                                                echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                                            } ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 ">
                                <div class="header-right f-right d-none d-lg-block">
                                    <!-- Search Nav -->
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-md-none bg-<?php echo $navbackground; ?> "></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
        </header>
        <?php
        $select_stmt_slideshow = $conn->prepare("SELECT `image` FROM `slideshow` ORDER BY id DESC LIMIT 1");
        $select_stmt_slideshow->execute();
        $images = $select_stmt_slideshow->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <?php foreach ($images as $image): ?>
            <?php $base64_image = base64_encode($image['image']); ?>
            <div class="jumbotron p-3 p-md-5 text-white rounded" style="background-image: url('data:image/jpeg;base64, <?php echo $base64_image; ?>');">
            <?php endforeach; ?>
            <div class="col-md-6 px-0">
                <?php
                $template_setting_id = 16;
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
                    <h1 class="display-4 font-italic"><?php echo $Details_one; ?></h1>
                <?php   } // ปิดเงื่อนไข if
                ?>
                <?php
                $template_setting_id = 16;
                $sql = "SELECT `page1_text_sideshow1` FROM `template_setting` WHERE id = " . $template_setting_id;
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $page1_text_sideshow1 = $result['page1_text_sideshow1'];

                $select_stmt_two = $conn->prepare("SELECT `Details`, `connect`, `show` FROM `text` WHERE id = " . $page1_text_sideshow1);
                $select_stmt_two->execute();
                $row_two = $select_stmt_two->fetch(PDO::FETCH_ASSOC);
                $Details_two = $row_two['Details'];
                $connect_two = $row_two['connect'];
                $show_two = $row_two['show'];

                // ตรวจสอบค่าในฟิลด์ "show"
                if ($show_two === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                ?>
                    <p class="lead my-3"><?php echo $Details_two; ?></p>
                <?php   } // ปิดเงื่อนไข if
                ?>
                <?php
                $template_setting_id = 16;
                $sql = "SELECT `page1_text_sideshow2` FROM `template_setting` WHERE id = " . $template_setting_id;
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $page1_text_sideshow2 = $result['page1_text_sideshow2'];

                $select_stmt_three = $conn->prepare("SELECT `Details`, `connect`, `show` FROM `text` WHERE id = " . $page1_text_sideshow2);
                $select_stmt_three->execute();
                $row_three = $select_stmt_three->fetch(PDO::FETCH_ASSOC);
                $Details_three = $row_three['Details'];
                $connect_three = $row_three['connect'];
                $show_three = $row_three['show'];

                // ตรวจสอบค่าในฟิลด์ "show"
                if ($show_three === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                ?>
                    <p class="lead mb-0"><a href="#" class="text-white font-weight-bold"><?php echo $Details_three; ?></a></p>
                <?php   } // ปิดเงื่อนไข if
                ?>
            </div>
            </div>

            <main>
                <?php
                $select_stmt_showone = $conn->prepare("SELECT `show`,`format` FROM `related` WHERE id = 1");
                $select_stmt_showone->execute();
                $row_showone = $select_stmt_showone->fetch(PDO::FETCH_ASSOC);
                $format_showone = $row_showone['format'];
                $show_showone = $row_showone['show'];

                // ตรวจสอบค่าในฟิลด์ "show"
                if ($show_showone === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                ?>
                    <!-- Trending Area Start -->
                    <?php
                    $template_setting_id = 16;
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
                    <div class="trending-area fix pt-25 bg-<?php echo $conntentbackground; ?>">
                        <div class="container">
                            <div class="trending-main">
                                <div class="row">
                                    <div class="col-lg-6"> <!--ปรับกรอบ -->
                                        <!-- Trending Top -->
                                        <div class="slider-active">
                                            <!-- Single -->
                                            <?php
                                            try {
                                                $sql = "SELECT * FROM addnewpost WHERE Status = 'Publish' ORDER BY RAND() LIMIT 3";
                                                $stmt = $conn->prepare($sql);
                                                $stmt->execute();
                                                if ($stmt->rowCount() > 0) {
                                                    // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        echo '<div class="single-slider">';
                                                        echo '<div class="trending-top mb-30" >';
                                                        echo '<div class="trend-top-img" style="width: 560px; height: 462px; overflow: hidden; position: relative;">'; //ปรับขนาด
                                                        echo '<img src="upload/' . $row["image"] . '" alt="' . $row["Title"] . '" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">';
                                                        echo '<div class="trend-top-cap">';
                                                        echo '<h2><a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"]) . '" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms">' . $row["Title"] . '</a></h2>';
                                                        echo '<p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">' . $row["day"] . '</p>';
                                                        echo '</div>'; // ปิด div.trend-top-cap
                                                        echo '</div>'; // ปิด div.trend-top-img
                                                        echo '</div>'; // ปิด div.trending-top mb-30
                                                        echo '</div>'; // ปิด div.single-slider
                                                    }
                                                } else {
                                                    echo "0 รายการของข่าว";
                                                }
                                            } catch (PDOException $e) {
                                                echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                                            }
                                            ?>
                                            <!-- Single -->
                                        </div>
                                    </div>
                                    <!-- Right content -->
                                    <div class="col-lg-6"> <!--ปรับกรอบ -->
                                        <!-- Trending Top -->
                                        <div class="row">
                                            <?php
                                            // ดึงข้อมูล "id=1" จากตาราง related
                                            $select_stmt_showone = $conn->prepare("SELECT  `format` FROM `related` WHERE id = 1");
                                            $select_stmt_showone->execute();
                                            $row_showone = $select_stmt_showone->fetch(PDO::FETCH_ASSOC);
                                            $format_showone = $row_showone['format'];

                                            // ตรวจสอบค่าในฟิลด์ "show"
                                            // ตรวจสอบค่าในฟิลด์ "format"
                                            if ($format_showone == 2) {
                                                // ถ้าข้อมูลในฐานข้อมูล related ฟิลด์ format ไอดี 1 เป็น 2
                                                try {
                                                    $sql = "SELECT * FROM addnewpost WHERE Status = 'Publish' ORDER BY RAND() LIMIT 2";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->execute();

                                                    if ($stmt->rowCount() > 0) {
                                                        // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                            echo '<div class="col-lg-12 col-md-6 col-sm-6">';
                                                            echo '<div class="trending-top mb-30">';
                                                            echo '<div class="trend-top-img" style="width: 555px; height: 550px; overflow: hidden; position: relative;">';
                                                            echo '<img src="upload/' . $row["image"] . '" alt="' . $row["Title"] . '" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">';
                                                            echo '<div class="trend-top-cap trend-top-cap2">';
                                                            echo '<h2><a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '">' . $row["Title"] . '</a></h2>';
                                                            echo '<p>' . $row["day"] . '</p>';
                                                            echo '</div></div></div></div>';
                                                        }
                                                    } else {
                                                        echo "0 รายการของข่าว";
                                                    }
                                                } catch (PDOException $e) {
                                                    echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                                                }
                                            } elseif ($format_showone == 4) {
                                                // ถ้าข้อมูลในฐานข้อมูล related ฟิลด์ format ไอดี 1 เป็น 9
                                                try {
                                                    $sql = "SELECT * FROM addnewpost WHERE Status = 'Publish' ORDER BY RAND() LIMIT 4";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->execute();

                                                    if ($stmt->rowCount() > 0) {
                                                        // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                            echo '<div class="col-lg-6 col-md-6 col-sm-6">';
                                                            echo '<div class="trending-top mb-30">';
                                                            echo '<div class="trend-top-img" style="width: 265px; height: 265px; overflow: hidden; position: relative;">';
                                                            echo '<img src="upload/' . $row["image"] . '" alt="' . $row["Title"] . '" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">';
                                                            echo '<div class="trend-top-cap trend-top-cap2">';
                                                            echo '<h2><a href="Page4.php?id=' . $row["id"] . '">' . $row["Title"] . '</a></h2>';
                                                            echo '<p>' . $row["day"] . '</p>';
                                                            echo '</div></div></div></div>';
                                                        }
                                                    } else {
                                                        echo "0 รายการของข่าว";
                                                    }
                                                } catch (PDOException $e) {
                                                    echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                                                }
                                            } elseif ($format_showone == 6) {
                                                // ถ้าข้อมูลในฐานข้อมูล related ฟิลด์ format ไอดี 1 เป็น 9
                                                try {
                                                    $sql = "SELECT * FROM addnewpost WHERE Status = 'Publish' ORDER BY RAND() LIMIT 6";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->execute();

                                                    if ($stmt->rowCount() > 0) {
                                                        // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                            echo '<div class="col-lg-6 col-md-6 col-sm-6">';
                                                            echo '<div class="trending-top mb-30">';
                                                            echo '<div class="trend-top-img" style="width: 265px; height: 265px; overflow: hidden; position: relative;">';
                                                            echo '<img src="upload/' . $row["image"] . '" alt="' . $row["Title"] . '" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">';
                                                            echo '<div class="trend-top-cap trend-top-cap2">';
                                                            echo '<h2><a href="Page4.php?id=' . $row["id"] . '">' . $row["Title"] . '</a></h2>';
                                                            echo '<p>' . $row["day"] . '</p>';
                                                            echo '</div></div></div></div>';
                                                        }
                                                    } else {
                                                        echo "0 รายการของข่าว";
                                                    }
                                                } catch (PDOException $e) {
                                                    echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                                                }
                                            } elseif ($format_showone == 8) {
                                                // ถ้าข้อมูลในฐานข้อมูล related ฟิลด์ format ไอดี 1 เป็น 9
                                                try {
                                                    $sql = "SELECT * FROM addnewpost WHERE Status = 'Publish' ORDER BY RAND() LIMIT 8";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->execute();

                                                    if ($stmt->rowCount() > 0) {
                                                        // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                            echo '<div class="col-lg-6 col-md-6 col-sm-6">';
                                                            echo '<div class="trending-top mb-30">';
                                                            echo '<div class="trend-top-img" style="width: 265px; height: 265px; overflow: hidden; position: relative;">';
                                                            echo '<img src="upload/' . $row["image"] . '" alt="' . $row["Title"] . '" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">';
                                                            echo '<div class="trend-top-cap trend-top-cap2">';
                                                            echo '<h2><a href="Page4.php?id=' . $row["id"] . '">' . $row["Title"] . '</a></h2>';
                                                            echo '<p>' . $row["day"] . '</p>';
                                                            echo '</div></div></div></div>';
                                                        }
                                                    } else {
                                                        echo "0 รายการของข่าว";
                                                    }
                                                } catch (PDOException $e) {
                                                    echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                                                }
                                            } elseif ($format_showone == 10) {
                                                // ถ้าข้อมูลในฐานข้อมูล related ฟิลด์ format ไอดี 1 เป็น 9
                                                try {
                                                    $sql = "SELECT * FROM addnewpost WHERE Status = 'Publish' ORDER BY RAND() LIMIT 10";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->execute();

                                                    if ($stmt->rowCount() > 0) {
                                                        // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                            echo '<div class="col-lg-6 col-md-6 col-sm-6">';
                                                            echo '<div class="trending-top mb-30">';
                                                            echo '<div class="trend-top-img" style="width: 265px; height: 265px; overflow: hidden; position: relative;">';
                                                            echo '<img src="upload/' . $row["image"] . '" alt="' . $row["Title"] . '" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">';
                                                            echo '<div class="trend-top-cap trend-top-cap2">';
                                                            echo '<h2><a href="Page4.php?id=' . $row["id"] . '">' . $row["Title"] . '</a></h2>';
                                                            echo '<p>' . $row["day"] . '</p>';
                                                            echo '</div></div></div></div>';
                                                        }
                                                    } else {
                                                        echo "0 รายการของข่าว";
                                                    }
                                                } catch (PDOException $e) {
                                                    echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                                                }
                                            }

                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </section>
                <?php   } // ปิดเงื่อนไข if
                ?>
                <!-- Whats New End -->
                <!--   Weekly2-News start -->
                <?php
                $select_stmt_showtwo = $conn->prepare("SELECT `show` FROM `related` WHERE id = 2");
                $select_stmt_showtwo->execute();
                $row_showtwo = $select_stmt_showtwo->fetch(PDO::FETCH_ASSOC);
                $show_showtwo = $row_showtwo['show'];

                // ตรวจสอบค่าในฟิลด์ "show"
                if ($show_showtwo === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                ?>
                    <div class="weekly2-news-area pt-50 pb-30 bg-<?php echo $conntentbackground; ?>">
                        <div class="container">
                            <div class="weekly2-wrapper">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="slider-wrapper bg-<?php echo $conntent2background; ?>">
                                            <!-- section Tittle -->
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="small-tittle mb-30">
                                                        <?php
                                                        $template_setting_id = 16;
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
                                                            <p><?php echo $Details_four; ?>
                                                            <p>
                                                            <?php   } // ปิดเงื่อนไข if
                                                            ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Slider -->
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="weekly2-news-active d-flex">
                                                        <!-- Single -->
                                                        <?php
                                                        try {
                                                            $sql = "SELECT * FROM addnewpost WHERE Status = 'Publish' ORDER BY id DESC";
                                                            $stmt = $conn->prepare($sql);
                                                            $stmt->execute();

                                                            if ($stmt->rowCount() > 0) {
                                                                // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML

                                                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                                    echo '<div class="weekly2-single">';
                                                                    echo '<div class="weekly2-img" style="width: 235px; height: 155px; overflow: hidden; position: relative;">';
                                                                    echo '<img src="upload/' . $row["image"] . '" alt="' . $row["Title"] . '" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">';
                                                                    echo '</div>';
                                                                    echo '<div class="weekly2-caption">';
                                                                    echo '<h4><a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '">' . $row["Title"] . '</a></h4>';
                                                                    echo '<p>' . $row["day"] . '</p>';
                                                                    echo '</div></div>'; // ปิด div.weekly2-single
                                                                }
                                                            } else {
                                                                echo "0 รายการของข่าว";
                                                            }
                                                        } catch (PDOException $e) {
                                                            echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php   } // ปิดเงื่อนไข if
                ?>
                <!-- End Weekly-News -->

                <!--  Recent Articles start -->
                <?php
                // ดึงข้อมูล "id=3" จากตาราง 
                $select_stmt_showthree = $conn->prepare("SELECT `show` FROM `related` WHERE id = 3");
                $select_stmt_showthree->execute();
                $row_showthree = $select_stmt_showthree->fetch(PDO::FETCH_ASSOC);
                $show_showthree = $row_showthree['show'];

                // ตรวจสอบค่าในฟิลด์ "show"
                if ($show_showthree === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                ?>
                    <?php
                    $template_setting_id = 16;
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
                    <div class="recent-articles pt-80 pb-80 bg-<?php echo $content2background; ?>">
                        <div class="container">
                            <div class="recent-wrapper">
                                <!-- section Tittle -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section-tittle mb-30">
                                            <?php

                                            $select_stmt_five = $conn->prepare("SELECT `Details`, `connect`, `show` FROM `text` WHERE id = 5");
                                            $select_stmt_five->execute();
                                            $row_five = $select_stmt_five->fetch(PDO::FETCH_ASSOC);
                                            $Details_five = $row_five['Details'];
                                            $connect_five = $row_five['connect'];
                                            $show_five = $row_five['show'];
                                            // ตรวจสอบค่าในฟิลด์ "show"
                                            if ($show_five === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                                            ?>
                                                <h3><?php echo $Details_five; ?></h3>
                                            <?php   } // ปิดเงื่อนไข if
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="recent-active dot-style d-flex dot-style">
                                            <!-- Single -->
                                            <?php
                                            try {
                                                $sql = "SELECT * FROM addnewpost WHERE Status = 'Publish' AND link <> '' ORDER BY id LIMIT 4";
                                                $stmt = $conn->prepare($sql);
                                                $stmt->execute();
                                                if ($stmt->rowCount() > 0) {
                                                    // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        echo '<div class="single-recent">';
                                                        echo '<div class="what-img" style="width: 263px; height: 210px; overflow: hidden; position: relative;">';
                                                        echo '<img src="upload/' . $row["image"] . '" alt="' . $row["Title"] . '" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">';
                                                        echo '</div>';
                                                        echo '<div class="what-cap">';
                                                        echo '<h4><a href="Page6.php?id=' . $row["id"] . '">' . $row["Title"] . '</a></h4>';
                                                        echo '<p>' . $row["day"] . '</p>';
                                                        echo '<a class="popup-video" href="' . $row["link"] . '"><span class="flaticon-play-button"></span></a>';
                                                        echo '</div></div>'; // ปิด div.weekly2-single
                                                    }
                                                } else {
                                                    echo "0 รายการของข่าว";
                                                }
                                            } catch (PDOException $e) {
                                                echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php   } // ปิดเงื่อนไข if
                ?>
                <!--Recent Articles End -->
                <!-- Start Video Area -->
                <?php
                $select_stmt_showfour = $conn->prepare("SELECT `show` FROM `related` WHERE id = 4");
                $select_stmt_showfour->execute();
                $row_showfour = $select_stmt_showfour->fetch(PDO::FETCH_ASSOC);
                $show_showfour = $row_showfour['show'];

                // ตรวจสอบค่าในฟิลด์ "show"
                if ($show_showfour === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                ?>
                    <div class="youtube-area video-padding d-none d-sm-block bg-<?php echo $content22background; ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="video-items-active">
                                        <div class="video-info">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="testmonial-nav text-center">
                                                        <?php
                                                        try {
                                                            $sql = "SELECT * FROM `postvideo` WHERE Status = 'Publish'";
                                                            $stmt = $conn->prepare($sql);
                                                            $stmt->execute();
                                                            // ตรวจสอบว่ามีข้อมูลหรือไม่
                                                            if ($stmt->rowCount() > 0) {
                                                                // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                                                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                                    echo '<div class="single-video">';
                                                                    echo '<a href="video/' . $row["video"] . '" type="video/mp4">';
                                                                    echo '<div style="position: relative; display: inline-block;">';
                                                                    echo '<img src="upload/' . $row["image"] . '" alt="' . $row["Title"] . '">';
                                                                    echo '<h4 class="video-title">' . $row["Title"] . ' | ' . $row["day"] . '</h4>';
                                                                    echo '<i class="fab fa-youtube youtube-icon" style="position: absolute; top: 320px; left: 50%; transform: translateX(-50%); font-size: 50px; color: white;"></i>';
                                                                    echo '</div>';
                                                                    echo '</a>';
                                                                    echo '<div class="video-intro">';
                                                                    echo '<h5></h5>';
                                                                    echo '</div>';
                                                                    echo '</div>'; // ปิด div.single-video

                                                                }
                                                            } else {
                                                                echo "0 รายการของข่าว";
                                                            }
                                                        } catch (PDOException $e) {
                                                            echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php   } // ปิดเงื่อนไข if
                            ?>
                            <!-- End Start Video area-->
                            <!--   Weekly3-News start -->
                            <?php
                            $select_stmt_showfive = $conn->prepare("SELECT `show` FROM `related` WHERE id = 5");
                            $select_stmt_showfive->execute();
                            $row_showfive = $select_stmt_showfive->fetch(PDO::FETCH_ASSOC);
                            $show_showfive = $row_showfive['show'];

                            // ตรวจสอบค่าในฟิลด์ "show"
                            if ($show_showfive === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                            ?>
                                <div class="weekly3-news-area pt-80 pb-130">
                                    <div class="container">
                                        <div class="weekly3-wrapper">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="slider-wrapper">
                                                        <!-- Slider -->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="weekly3-news-active dot-style d-flex">
                                                                    <?php
                                                                    try {
                                                                        $sql = "SELECT * FROM addnewpost WHERE Status = 'Publish'  ORDER BY id DESC LIMIT 5";
                                                                        $stmt = $conn->prepare($sql);
                                                                        $stmt->execute();

                                                                        if ($stmt->rowCount() > 0) {
                                                                            // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                                                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                                                echo '<div class="weekly3-single">';
                                                                                echo '<div class="weekly3-img" style="width: 263px; height: 210px; overflow: hidden; position: relative;">';
                                                                                echo '<img src="upload/' . $row["image"] . '" alt="' . $row["Title"] . '" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">';
                                                                                echo '</div>';
                                                                                echo '<div class="weekly3-caption">';
                                                                                echo '<h4><a href="' . (!empty($row["link"]) ? 'Page6.php?id=' . $row["id"] : 'Page4.php?id=' . $row["id"] . '') . '">' . $row["Title"] . '</a></h4>';
                                                                                echo '<p>' . $row["day"] . '</p>';
                                                                                echo '</div></div>';
                                                                            }
                                                                        } else {
                                                                            echo "0 รายการของข่าว";
                                                                        }
                                                                    } catch (PDOException $e) {
                                                                        echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Weekly-News -->
                        <?php   } // ปิดเงื่อนไข if
                        ?>
            </main>
            <?php
            $template_setting_id = 16;
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
            <footer>
                <!-- Footer Start-->
                <div class="footer-main footer-bg">
                    <div class="footer-area bg-<?php echo $footerbackground; ?>" style="padding: 20px 0; border: <?php echo $footerborder; ?>px solid <?php echo $footerbcolors; ?>; border-radius: <?php echo $footerradius; ?>px;"> <!-- Adjusted padding -->
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-8">
                                    <div class="single-footer-caption text-center">
                                        <!-- logo -->
                                        <div class="footer-logo mb-2">
                                            <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                                        </div>
                                        <div class="footer-tittle">
                                            <div class="footer-pera">
                                                <?php
                                                $template_setting_id = 16;
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
                                                    <p class="info1"><?php echo $Details_six; ?></p>
                                                <?php   } // ปิดเงื่อนไข if
                                                ?>
                                                <?php
                                                $template_setting_id = 16;
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
                                                    <p class="info2"><?php echo $Details_seven; ?></p>
                                                <?php   } // ปิดเงื่อนไข if
                                                ?>
                                                <?php
                                                $template_setting_id = 16;
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
                                                    <p class="info2"><?php echo $Details_eight; ?></p>
                                                <?php   } // ปิดเงื่อนไข if
                                                ?>
                                            </div>
                                        </div>
                                        <!-- Social Media Icons -->
                                        <ul class="header-social d-flex justify-content-center mb-0">
                                            <?php
                                            try {
                                                $sql = "SELECT * FROM icon WHERE `show` = 'on'";
                                                $stmt = $conn->prepare($sql);
                                                $stmt->execute();
                                                // ตรวจสอบว่ามีข้อมูลหรือไม่
                                                if ($stmt->rowCount() > 0) {
                                                    // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        echo '<a href="' . (!empty($row["link"]) ? $row["link"] : $row["connect"]) . '" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">';
                                                        echo '<li class="mr-2"><a href="' . (!empty($row["link"]) ? $row["link"] : $row["connect"]) . '"><i class="' . $row["type"] . ' text-' . $row["colors"] . '"></i></a></li>';
                                                        echo '</a>';
                                                    }
                                                } else {
                                                    echo "0 รายการของข่าว";
                                                }
                                            } catch (PDOException $e) {
                                                echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                                            } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Search model Begin -->
            <div class="search-model-box">
                <div class="d-flex align-items-center h-100 justify-content-center">
                    <div class="search-close-btn">+</div>
                    <form class="search-model-form">
                        <input type="text" id="search-input" placeholder="Searching key.....">
                    </form>
                </div>
            </div>
            <!-- Search model end -->

            <!-- JS here -->

            <script src="./Template1/assets/js/vendor/modernizr-3.5.0.min.js"></script>
            <!-- Jquery, Popper, Bootstrap -->
            <script src="./Template1/assets/js/vendor/jquery-1.12.4.min.js"></script>
            <script src="./Template1/assets/js/popper.min.js"></script>
            <script src="./Template1/assets/js/bootstrap.min.js"></script>
            <!-- Jquery Mobile Menu -->
            <script src="./Template1/assets/js/jquery.slicknav.min.js"></script>

            <!-- Jquery Slick , Owl-Carousel Plugins -->
            <script src="./Template1/assets/js/owl.carousel.min.js"></script>
            <script src="./Template1/assets/js/slick.min.js"></script>
            <!-- Date Picker -->
            <script src="./Template1/assets/js/gijgo.min.js"></script>
            <!-- One Page, Animated-HeadLin -->
            <script src="./Template1/assets/js/wow.min.js"></script>
            <script src="./Template1/assets/js/animated.headline.js"></script>
            <script src="./Template1/assets/js/jquery.magnific-popup.js"></script>

            <!-- Scrollup, nice-select, sticky -->
            <script src="./Template1/assets/js/jquery.scrollUp.min.js"></script>
            <script src="./Template1/assets/js/jquery.nice-select.min.js"></script>
            <script src="./Template1/assets/js/jquery.sticky.js"></script>

            <!-- contact js -->
            <script src="./Template1/assets/js/contact.js"></script>
            <script src="./Template1/assets/js/jquery.form.js"></script>
            <script src="./Template1/assets/js/jquery.validate.min.js"></script>
            <script src="./Template1/assets/js/mail-script.js"></script>
            <script src="./Template1/assets/js/jquery.ajaxchimp.min.js"></script>

            <!-- Jquery Plugins, main Jquery -->
            <script src="./Template1/assets/js/plugins.js"></script>
            <script src="./Template1/ssets/js/main.js"></script>

</body>

</html>