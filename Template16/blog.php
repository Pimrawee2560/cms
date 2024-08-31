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
    $select_stmt_title = $conn->prepare("SELECT `name` FROM `title` WHERE id = 5");
    $select_stmt_title->execute();
    $row_title = $select_stmt_title->fetch(PDO::FETCH_ASSOC);
    $name_title = $row_title['name'];
    ?>
    <title><?php echo $name_title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <?php
    $select_stmt_title = $conn->prepare("SELECT `image`, `show` FROM `title` WHERE id = 5");
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
                                        echo '<img src="data:image/jpeg;base64,' . base64_encode($logo['image']) . '" alt="Logo">';
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
                                        echo '<img src="data:image/jpeg;base64,' . base64_encode($logo['image']) . '" alt="Logo" width="138" height="55">';
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
        <!--================Blog Area =================-->
        <?php
        $template_setting_id = 16;
        $sql = "SELECT `page5_content` FROM `template_setting` WHERE id = " . $template_setting_id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $page5_content = $result['page5_content'];

        $select_stmt_content = $conn->prepare("SELECT colors, `tcolors`, `border`, `radius`, `bcolors` FROM `colors` WHERE id = " . $page5_content);
        $select_stmt_content->execute();
        $row_content = $select_stmt_content->fetch(PDO::FETCH_ASSOC);
        $contentbackground = $row_content['colors'];
        $content2background = $row_content['tcolors'];
        $contentborder = $row_content['border'];
        $contentradius = $row_content['radius'];
        $contentbcolors = $row_content['bcolors'];
        ?>
        <?php
        $template_setting_id = 16;
        $sql = "SELECT `page5_content2` FROM `template_setting` WHERE id = " . $template_setting_id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $page5_content2 = $result['page5_content2'];

        $select_stmt_content2 = $conn->prepare("SELECT colors, `tcolors`, `border`, `radius`, `bcolors` FROM `colors` WHERE id = " . $page5_content2);
        $select_stmt_content2->execute();
        $row_content2 = $select_stmt_content2->fetch(PDO::FETCH_ASSOC);
        $content21background = $row_content2['colors'];
        $content22background = $row_content2['tcolors'];
        $content2border = $row_content2['border'];
        $content2radius = $row_content2['radius'];
        $content2bcolors = $row_content2['bcolors'];
        ?>
        <section class="blog_area section-padding bg-<?php echo $contentbackground; ?>">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 mb-5 mb-lg-0" style="border: <?php echo $contentborder; ?>px solid <?php echo $contentbcolors; ?>; border-radius: <?php echo $contentradius; ?>px;">
                        <div class="blog_left_sidebar">
                            <?php
                            try {
                                $sql = "SELECT * FROM addnewpost WHERE Status = 'Publish' ORDER BY id DESC";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();

                                if ($stmt->rowCount() > 0) {
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo '<article class="blog_item">';
                                        echo '<div class="blog_item_img">';
                                        echo '<img class="card-img rounded-0" src="upload/' . $row["image"] . '" alt="' . $row["Title"] . '">';
                                        echo '<a href="Page6.php?id=' . $row["id"] . '" class="blog_item_date bg-' . $content22background . '" style="border: ' . $content2border . 'px solid ' . $content2bcolors . '; border-radius: ' . $content2radius . 'px;">';
                                        echo '<h3>' . date('d', strtotime($row["day"])) . '</h3>'; // ใช้ฟังก์ชัน date() เพื่อดึงวันที่
                                        echo '<p>' . date('M', strtotime($row["day"])) . '</p>'; // ใช้ฟังก์ชัน date() เพื่อดึงเดือน
                                        echo '</a>';
                                        echo '</div>';
                                        echo '<div class="blog_details bg-' . $content21background . '">';
                                        echo '<a class="d-inline-block" href="single-blog.html">';
                                        echo '<h2>' . $row["Title"] . '</h2>';
                                        echo '</a>';
                                        echo '<p>' . $row["content"] . '</p>';
                                        echo '</div>';

                                        echo '</article>';
                                    }
                                } else {
                                    echo "<p>0 รายการของข่าว</p>";
                                }
                            } catch (PDOException $e) {
                                echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                            }
                            ?>
                            <nav class="blog-pagination justify-content-center d-flex">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Previous">
                                            <i class="ti-angle-left text-<?php echo $content2background; ?>"></i>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link text-<?php echo $content2background; ?>">1</a>
                                    </li>
                                    <li class="page-item active">
                                        <a href="#" class="page-link text-<?php echo $content2background; ?>">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Next">
                                            <i class="ti-angle-right text-<?php echo $content2background; ?>"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
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

        <!-- JS here -->

        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
        <!-- Jquery, Popper, Bootstrap -->
        <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
        <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

        <!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>

        <!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
        <script src="./assets/js/animated.headline.js"></script>

        <!-- Scrollup, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
        <script src="./assets/js/jquery.sticky.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

        <!-- Jquery Plugins, main Jquery -->
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>

</body>

</html>