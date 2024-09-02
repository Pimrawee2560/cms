<?php 
    require_once('DB_config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
<?php 
$select_stmt_title = $conn->prepare("SELECT `image`, `show` FROM `title` WHERE id = 1");
$select_stmt_title->execute();
$row_title = $select_stmt_title->fetch(PDO::FETCH_ASSOC);
$image_title = $row_title['image'];
$show_title = $row_title['show'];

if ($show_title === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
?>
<link rel="shortcut icon" type="image/x-icon" href="upload/logotitle/<?php echo $image_title; ?>">
<?php   } // ปิดเงื่อนไข if?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="Template3/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="Template3/css/coin-slider.css" />
<script type="text/javascript" src="Template3/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="Template3/js/script.js"></script>
<script type="text/javascript" src="Template3/js/coin-slider.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
  body {
        font-family: Arial, sans-serif;
    }
    .calendar {
        max-width: 300px; /* ลดความกว้างสูงสุดลงเป็น 600px */
        margin: 20px auto;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px; /* ลด padding เป็น 10px */
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .month {
        text-align: center;
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .days {
        display: flex;
        justify-content: space-between;
        padding: 5px 0;
        font-weight: bold;
    }
    .day {
        width: calc(100% / 7);
        text-align: center;
        background-color: #f0f0f0;
        border-radius: 5px;
        padding: 8px; /* ลด padding เป็น 8px */
        margin-bottom: 5px;
    }
    .today {
        background-color: #4CAF50;
        color: white;
    }
    /* Reset default margins and paddings */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
html, body {
    height: 100%;
}

.container {
    text-align: center; /* Center the text inside container */
    padding: 20px;
    background: #fff; /* White background for the content */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Light shadow */
}

.contact_section h2 {
    margin-bottom: 20px;
}

.contact_info {
    text-align: left; /* Align the contact information text to the left */
    margin: 0 auto;
    display: inline-block;
}
.contact_info {
    display: flex;
    flex-direction: column;
    align-items: flex-start; /* Align items to the left */
    margin: 0 auto;
    display: inline-block;
    font-size: 16px; /* Set font size for icons and text */
}

.contact_info i {
    margin-right: 8px; /* Space between icon and text */
    color: #333; /* Set icon color */
}

.contact_info a {
    color: #4CAF50; /* Set link color */
    text-decoration: none; /* Remove underline from links */
}

.contact_info a:hover {
    text-decoration: underline; /* Underline on hover */
}
.additional_info h3 {
        font-size: 18px; /* ขนาดฟอนต์ของหัวข้อ */
        margin-bottom: 10px; /* ระยะห่างล่างของหัวข้อ */
    }

    .additional_info p {
        font-size: 16px; /* ขนาดฟอนต์ของข้อความ */
        margin-bottom: 15px; /* ระยะห่างล่างของข้อความ */
    }

    .map iframe {
        border: 0; /* เอาขอบออก */
        width: 100%; /* ให้เต็มความกว้างของ div */
        height: 300px; /* ความสูงของแผนที่ */
    }

    .right-topbar {
        margin-top: 20px; /* ระยะห่างด้านบน */
    }

    .right-topbar a {
        margin-right: 10px; /* ระยะห่างระหว่างไอคอน */
        color: #333; /* สีของไอคอน */
        font-size: 24px; /* ขนาดไอคอน */
    }

    .right-topbar a:hover {
        color: #4CAF50; /* เปลี่ยนสีเมื่อโฮเวอร์ */
    }
    .right-topbar a {
        margin-right: 10px; /* ระยะห่างระหว่างไอคอน */
        color: #333; /* สีของไอคอน */
        font-size: 24px; /* ขนาดไอคอน */
        text-decoration: none; /* ลบขีดเส้นใต้ */
    }

    .right-topbar a:hover {
        color: #4CAF50; /* เปลี่ยนสีเมื่อโฮเวอร์ */
    }
    .img {
        margin-right: 20px; /* เพิ่มช่องว่างขวาของแต่ละภาพ */
        display: inline-block; /* ทำให้แต่ละ div เป็นบล็อกในแนวนอน */
    }
    .img img {
        vertical-align: top; /* ให้ภาพตรงกับตำแหน่งแนวตั้ง */
    }
    .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.prev, .next {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

.prev:hover, .next:hover {
    text-decoration: underline;
}
/* --------------------------- */
.article {
    overflow-x: auto; /* Enable horizontal scrolling */
    white-space: nowrap; /* Prevent wrapping of elements */
}

.article .img {
    display: inline-block; /* Align images horizontally */
    vertical-align: top; /* Align images to the top */
    margin-right: 10px; /* Space between images */
}

.pages {
    overflow-x: auto; /* Enable horizontal scrolling for pagination if needed */
    white-space: nowrap; /* Prevent wrapping of pagination elements */
}

.searchform {
    overflow-x: auto; /* Enable horizontal scrolling for search form if needed */
}
/* Optional: Add scroll bar styling if needed */
.article::-webkit-scrollbar {
    height: 8px;
}

.article::-webkit-scrollbar-thumb {
    background-color: #888;
    border-radius: 4px;
}

.article::-webkit-scrollbar-thumb:hover {
    background-color: #555;
}
  .social-icons {
  display: flex; /* ใช้ Flexbox สำหรับไอคอน */
  justify-content: center; /* จัดไอคอนให้อยู่กลางตามแนวนอน */
}
  .social-icons a {
    display: inline-block;
    margin: 0 10px;
    text-decoration: none; /* ทำให้ไม่มีเส้นใต้ */
    color: inherit; /* ทำให้สีของไอคอนเป็นสีที่สืบทอดจาก parent */
    font-size: 24px; /* ขนาดของไอคอน */
  }
  .footer {
  padding: 20px; /* เพิ่มพื้นที่ภายใน footer */
  display: flex; /* ใช้ Flexbox */
  justify-content: center; /* จัดตำแหน่งเนื้อหาให้อยู่กลางตามแนวนอน */
  align-items: center; /* จัดตำแหน่งเนื้อหาให้อยู่กลางตามแนวตั้ง */
  flex-direction: column; /* ทำให้คอลัมน์ใน footer อยู่ในแนวตั้ง */
}
.footer_resize {
  display: flex;
  flex-direction: column; /* จัดเนื้อหาในแนวตั้ง */
  align-items: center; /* จัดตำแหน่งเนื้อหาให้ชิดกลาง */
}

.col.c3 {
  text-align: center; /* จัดข้อความในคอลัมน์ให้อยู่กลาง */
}

.message-box {
  margin-bottom: 20px; /* เพิ่มระยะห่างด้านล่างของกล่องข้อความ */
}
.menu_nav ul li.active a, .menu_nav ul li a:hover {
	text-decoration:none;
	color: #000;
	background:#eee;
	border:1px solid;
}
.section {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 10px;
        }
        .section-title {
            margin-top: 0;
            font-size: 1.1em;
            font-weight: bold;
            color: #333;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }
        .news-container {
            display: flex;
            flex-wrap: nowrap;
            gap: 10px;
            padding: 10px 0;
            overflow-x: auto;
        }
        .video-container {
            display: flex;
            flex-direction: column; /* ให้วิดีโอแสดงในแนวตั้ง */
            gap: 10px;
            overflow: hidden; /* ปิดการเลื่อน */
        }
        .news-box, .video-box {
            border: 1px solid #ddd;
            padding: 5px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 10px;
            max-width: 100%;
            text-align: center;
            flex: 0 0 auto;
        }
        .news-box img, .video-box video {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
        }
        .news-box h2, .video-box h2 {
            margin: 5px 0;
            font-size: 0.9em;
            color: #333;
            text-align: left; /* จัดชิดซ้าย */
            padding: 0 5px; /* เพิ่มระยะห่างขอบซ้ายขวา */
            box-sizing: border-box; /* ทำให้ padding รวมในขนาดของกล่อง */
        }
        .video-box {
            width: 100%; /* ใช้ความกว้างของกรอบ */
            max-width: 100%; /* กำหนดขนาดสูงสุดของกรอบ */
            aspect-ratio: 16 / 9; /* อัตราส่วน 16:9 */
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: relative;
        }
        .video-box video {
            width: 100%;
            height: 100%;
            object-fit: cover; /* ครอบคลุมกรอบ */
            display: block;
        }


</style>
<?php //style
$template_setting_id = 3;
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
<?php
$template_setting_id = 3;
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
<body>
<div class="main">
  <div class="header bg-<?php echo $bodybackground; ?>">
    <div class="header_resize">
      <div class="logo">
        <h1><?php 
              $logoResult = $conn->query("SELECT * FROM logo ORDER BY id DESC LIMIT 1");
              $logo = $logoResult->fetch(PDO::FETCH_ASSOC);
              if ($logo && !empty($logo['image'])) {
              echo '<img src="data:image/jpeg;base64,' . base64_encode($logo['image']) . '" alt="Logo"style="margin-top: 10px;">';
              } else {
              echo 'News Website';
              }
              ?></h1>
      </div>
      <div class="menu_nav">
        <ul>
<?php
$template_setting_id = 3;
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

try {
    $sql = "SELECT * FROM menu WHERE `show` = 'on'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    // ตรวจสอบว่ามีข้อมูลหรือไม่
    if ($stmt->rowCount() > 0) {
        // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // ใช้ PHP เพื่อสร้าง class ที่ต้องการ
            $linkClass = "bg-" . htmlspecialchars($navbackground) . " text-" . htmlspecialchars($nav2background);
            echo '<li><a href="' . htmlspecialchars($row["connect"]) . '" class="' . $linkClass . '">' . htmlspecialchars($row["title"]) . '</a></li>';
        }
    } else {
        echo "0 รายการของข่าว";
    }
} catch(PDOException $e) {
    echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
}
?>
        </ul>
      </div>
      <div class="clr"></div>
      <div class="slider">
      <?php 
      $select_stmt_slideshow = $conn->prepare("SELECT `image` FROM `slideshow` ORDER BY id DESC LIMIT 3");
      $select_stmt_slideshow->execute();
      $images = $select_stmt_slideshow->fetchAll(PDO::FETCH_ASSOC);
      ?>
      <div id="coin-slider">
        <?php foreach ($images as $image): ?>
        <?php $base64_image = base64_encode($image['image']); ?>
        <img src="data:image/jpeg;base64,<?php echo $base64_image; ?>" width="935" height="272" alt="" /></a>
    <?php endforeach; ?>
</div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content bg-<?php echo $bodybackground; ?>">
    <div class="content_resize bg-<?php echo $conntentbackground; ?>">
      <div class="mainbar">
        <div class="article">
<?php 
// ดึงข้อมูล "id=3" จากตาราง button
$select_stmt_showone = $conn->prepare("SELECT `show`,`format` FROM `related` WHERE id = 1");
$select_stmt_showone->execute();
$row_showone = $select_stmt_showone->fetch(PDO::FETCH_ASSOC);
$format_showone = $row_showone['format'];
$show_showone = $row_showone['show'];
                            
// ตรวจสอบค่าในฟิลด์ "show"
if ($show_showone === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
?>
        <div class="calendar">
              <?php
    // ตัวแปรเดือนและปีปัจจุบัน
    $month = date('m');
    $year = date('Y');

    if (isset($_GET['month']) && isset($_GET['year'])) {
        $month = $_GET['month'];
        $year = $_GET['year'];
    }

    // คำนวณเดือนและปีสำหรับปุ่มถัดไปและก่อนหน้า
    $nextMonth = $month + 1;
    $nextYear = $year;
    if ($nextMonth > 12) {
        $nextMonth = 1;
        $nextYear++;
    }

    $prevMonth = $month - 1;
    $prevYear = $year;
    if ($prevMonth < 1) {
        $prevMonth = 12;
        $prevYear--;
    }

    // หาวันแรกของเดือนที่เลือก
    $firstDayOfMonth = strtotime("$year-$month-01");
    // หาจำนวนวันในเดือนที่เลือก
    $daysInMonth = date('t', $firstDayOfMonth);
    // หาวันที่แรกของสัปดาห์ (0 - 6)
    $dayOfWeek = date('w', $firstDayOfMonth);

    // ชื่อเดือน
    $monthName = date('F', $firstDayOfMonth);

    // แสดงชื่อเดือนและปี
    echo '<div class="header">';
    echo '<a href="?month=' . $prevMonth . '&year=' . $prevYear . '" class="prev">Prev</a>';
    echo '<div class="month">' . $monthName . ' ' . $year . '</div>';
    echo '<a href="?month=' . $nextMonth . '&year=' . $nextYear . '" class="next">Next</a>';
    echo '</div>';

    // แสดงวันในสัปดาห์
    echo '<div class="days">';
    $weekdays = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
    foreach ($weekdays as $weekday) {
        echo '<div class="day">' . $weekday . '</div>';
    }
    echo '</div>';

    // แสดงวันที่ในเดือน
    echo '<div class="days">';
    // วนลูปเพื่อแสดงวันที่ในเดือน
    for ($i = 0; $i < $dayOfWeek; $i++) {
        echo '<div class="day"></div>';
    }
    for ($day = 1; $day <= $daysInMonth; $day++) {
        // ตรวจสอบว่าเป็นวันนี้หรือไม่
        $isToday = (date('Y-m-d') == date('Y-m-d', strtotime("$year-$month-$day"))) ? true : false;

        // ตรวจสอบว่ามีกิจกรรมในวันนี้หรือไม่ (ในตัวอย่างนี้กำหนดข้อมูลแบบสุ่ม)
        $hasEvent = (rand(0, 1) == 1) ? true : false;

        // กำหนด class ของวัน
        $class = 'day';
        if ($isToday) {
            $class .= ' today';
        }

        // แสดงวันที่
        echo '<div class="' . $class . '">' . $day . '</div>';

        // สิ้นสุดแถวถ้าเป็นวันเสาร์หรือวันสุดท้ายของเดือน
        if (($dayOfWeek + $day) % 7 == 0 || $day == $daysInMonth) {
            echo '</div>';
            if ($day < $daysInMonth) {
                echo '<div class="days">';
            }
        }
    }
    ?>
    </div>
     <?php   } // ปิดเงื่อนไข if?>
           <div class="clr"></div>
</div>
        <div class="article">
            <?php 
// ดึงข้อมูล "id=3" จากตาราง button
$select_stmt_showtwo = $conn->prepare("SELECT `show` FROM `related` WHERE id = 2");
$select_stmt_showtwo->execute();
$row_showtwo = $select_stmt_showtwo->fetch(PDO::FETCH_ASSOC);
$show_showtwo = $row_showtwo['show'];
                            
// ตรวจสอบค่าในฟิลด์ "show"
if ($show_showtwo === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
?>
        <div class="section">
        <?php
            $template_setting_id = 3;
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
            <div class="section-title"><?php echo $Details_three; ?></div>
              <?php   } // ปิดเงื่อนไข if?>
            <div class="news-container">
               <?php   
               try {
                // ดึงข้อมูลที่มี Status เป็น 'Publish' และที่ฟิลด์ link ว่างเปล่าหรือเป็น NULL
                $sql = "SELECT * FROM addnewpost WHERE Status = 'Publish' AND (link IS NULL OR link = '')";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                
                if ($stmt->rowCount() > 0) {
                    // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<a href="Page6.php?id=' . $row["id"] . '" style="text-decoration: none;">';
                        echo '<div class="news-box">';
                        echo '<img src="upload/' . $row["image"] . '" alt="' . $row["Title"] . '" style="width: 250px; height: 180px; object-fit: cover;">';
                        echo '<h2>' . $row["Title"] . '</h2>';
                        echo '</div>';
                    }
                } else {
                    echo "0 รายการของข่าว";
                }
            } catch(PDOException $e) {
                echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
            }
            ?>  
            </div>
        </div><br><br><?php   } // ปิดเงื่อนไข if?>
<?php 
// ดึงข้อมูล "id=3" จากตาราง button
$select_stmt_showfour = $conn->prepare("SELECT `show` FROM `related` WHERE id = 4");
$select_stmt_showfour->execute();
$row_showfour = $select_stmt_showfour->fetch(PDO::FETCH_ASSOC);
$show_showfour = $row_showfour['show'];
                            
// ตรวจสอบค่าในฟิลด์ "show"
if ($show_showfour === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
?>
        <div class="section">
        <?php
            $template_setting_id = 3;
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
            <div class="section-title"><?php echo $Details_four; ?></div> <?php   } // ปิดเงื่อนไข if?>
            <div class="video-container">
<?php   
try {
    $sql = "SELECT * FROM postvideo WHERE Status = 'Publish'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<a href="video/' . $row["video"] . '" type="video/mp4" style="text-decoration: none;">';
            echo '<div class="video-box" style="position: relative; display: inline-block;">';
            // แสดงภาพปก
            echo '<img src="upload/' . $row["image"] . '" alt="' . $row["Title"] . '" style="width: 600px; height: 300px; object-fit: cover;">';
            // แสดงไอคอน YouTube
            echo '<i class="fab fa-youtube youtube-icon" style="position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%); font-size: 50px; color: red;"></i>';
            // แสดงชื่อเรื่อง
            echo '<h2>' . $row["Title"] . '</h2>';
            echo '</div>';
            echo '</a>';
        }
    } else {
        echo "0 รายการของข่าว";
    }
} catch(PDOException $e) {
    echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
}
?>
            </div>
        </div><br><br><?php   } // ปิดเงื่อนไข if?>
        <?php 
// ดึงข้อมูล "id=3" จากตาราง 
$select_stmt_showthree = $conn->prepare("SELECT `show` FROM `related` WHERE id = 3");
$select_stmt_showthree->execute();
$row_showthree = $select_stmt_showthree->fetch(PDO::FETCH_ASSOC);
$show_showthree = $row_showthree['show'];
                            
// ตรวจสอบค่าในฟิลด์ "show"
if ($show_showthree === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
?>
        <div class="section">
        <?php
            $template_setting_id = 3;
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
            <div class="section-title"><?php echo $Details_five; ?></div>  <?php   } // ปิดเงื่อนไข if?>
            <div class="news-container">
                    <?php   
                    try {
                        $sql = "SELECT * FROM addnewpost WHERE Status = 'Publish' AND link <> ''";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        
                        if ($stmt->rowCount() > 0) {
                            // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo '<a href="Page5.php?id=' . $row["id"] . '" style="text-decoration: none;">';
                                echo '<div class="news-box">';
                                echo '<img src="upload/' . $row["image"] . '" alt="' . $row["Title"] . '" style="width: 250px; height: 180px; object-fit: cover;">';
                                echo '<h2>' . $row["Title"] . '</h2>';
                                echo '</div>';
                                echo '</a>';
                            }
                        } else {
                            echo "0 รายการของข่าว";
                        }
                    } catch(PDOException $e) {
                        echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                    }
                    ?>
            </div>  
    </div><?php   } // ปิดเงื่อนไข if?>
          <div class="clr"></div>
        </div>
        <div class="article">

          <div class="clr"></div>
          <div class="post_content">
          
    
          </div>
          <div class="clr"></div>
        </div>
      </div>
      <div class="sidebar">
        <?php 
        $template_setting_id = 3;
        $sql = "SELECT `searchbox` FROM `template_setting` WHERE id = " . $template_setting_id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $searchbox = $result['searchbox'];

        $select_stmt_five = $conn->prepare("SELECT `name`, `connect`, `show` FROM `button` WHERE id = " . $searchbox);
        $select_stmt_five->execute();
        $row_five = $select_stmt_five->fetch(PDO::FETCH_ASSOC);
        $name_five = $row_five['name'];
        $connect_five = $row_five['connect'];
        $show_five = $row_five['show'];
                       
        if ($show_five === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
        ?>
        <div class="searchform">
          <form id="formsearch" name="formsearch" method="post" action="#">
            <span>
            <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="<?php echo $name_five; ?>" type="text" />
            </span>
            <input name="button_search" src="Template3/images/search.gif" class="button_search" type="image" />
          </form>
        </div>
        <?php   } // ปิดเงื่อนไข if?>
        <div class="clr"></div>
<?php
$template_setting_id = 3;
$sql = "SELECT `tab_menu2` FROM `template_setting` WHERE id = " . $template_setting_id;
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$tab_menu2 = $result['tab_menu2']; 

$select_stmt_tabmenu = $conn->prepare("SELECT colors, `tcolors`, `border`, `radius`, `bcolors` FROM `colors` WHERE id = " . $tab_menu2);
$select_stmt_tabmenu->execute();
$row_tabmenu = $select_stmt_tabmenu->fetch(PDO::FETCH_ASSOC);
$tabmenubackground = $row_tabmenu['colors'];
$tabmenu2background = $row_tabmenu['tcolors'];
$tabmenuvborder = $row_tabmenu['border'];
$tabmenuradius = $row_tabmenu['radius'];
$tabmenubcolors = $row_tabmenu['bcolors'];

try {
    $sql = "SELECT * FROM tabmenu WHERE `show` = 'on'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // สร้าง class ของ heading และ link
            $headingClass = "text-" . htmlspecialchars($tabmenubackground);
            $linkClass = "text-" . htmlspecialchars($tabmenubackground);

            echo '<div class="gadget">';
            echo '<h2 class="star ' . $headingClass . '">' . htmlspecialchars($row["heading"]) . '</h2>';
            echo '<div class="clr"></div>';
            echo '<ul class="sb_menu">'; // เพิ่มแท็ก <ul> และคลาส

            // แสดง subtopic1
            if (!empty($row["subtopic1"])) {
                echo '<li><a href="' . htmlspecialchars($row["connect1"]) . '" class="' . $linkClass . '">' . htmlspecialchars($row["subtopic1"]) . '</a></li>';
            }

            // ตรวจสอบและแสดง subtopic2 ถ้ามี
            if (!empty($row["subtopic2"])) {
                echo '<li><a href="' . htmlspecialchars($row["connect2"]) . '" class="' . $linkClass . '">' . htmlspecialchars($row["subtopic2"]) . '</a></li>';
            }

            // ตรวจสอบและแสดง subtopic3 ถ้ามี
            if (!empty($row["subtopic3"])) {
                echo '<li><a href="' . htmlspecialchars($row["connect3"]) . '" class="' . $linkClass . '">' . htmlspecialchars($row["subtopic3"]) . '</a></li>';
            }

            // ตรวจสอบและแสดง subtopic4 ถ้ามี
            if (!empty($row["subtopic4"])) {
                echo '<li><a href="' . htmlspecialchars($row["connect4"]) . '" class="' . $linkClass . '">' . htmlspecialchars($row["subtopic4"]) . '</a></li>';
            }

            // ตรวจสอบและแสดง subtopic5 ถ้ามี
            if (!empty($row["subtopic5"])) {
                echo '<li><a href="' . htmlspecialchars($row["connect5"]) . '" class="' . $linkClass . '">' . htmlspecialchars($row["subtopic5"]) . '</a></li>';
            }

            // ปิด tag ul
            echo '</ul>';
            echo '</div>'; // ปิด tag div ที่ p-b-23
        }
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
        <div class="gadget">
          <div class="clr"></div>
        </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <?php
$template_setting_id = 3;
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
<div class="footer bg-<?php echo $bodybackground; ?>">
  <div class="footer_resize bg-<?php echo $footerbackground; ?>" style="width: 53%; height: 200px; padding: 10px;">
    <div class="col c3">
      <div class="message-box">
      <?php
        $template_setting_id = 3;
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
        <p><?php echo $Details_six; ?></p> <?php   } // ปิดเงื่อนไข if?>
        <?php
            $template_setting_id = 3;
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
        <p><?php echo $Details_eight; ?></p><?php   } // ปิดเงื่อนไข if?>
        <div class="social-icons">
        <?php   
        try {
        $sql = "SELECT * FROM icon WHERE `show` = 'on'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // ตรวจสอบว่ามีข้อมูลหรือไม่
        if ($stmt->rowCount() > 0) {
        // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<a href="' . (!empty($row["link"]) ? $row["link"] : $row["connect"]) . '" class="' . $row["type"] . ' text-' . $row["colors"] . '">';
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
    <div class="clr"></div>
  </div>
</div>
</div>
</body>
</html>
