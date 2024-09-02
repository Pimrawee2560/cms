<?php 
    require_once('DB_config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
// ดึงข้อมูลจากฐานข้อมูล
$select_stmt_title = $conn->prepare("SELECT `name` FROM `title` WHERE id = 3");
$select_stmt_title->execute();
$row_title = $select_stmt_title->fetch(PDO::FETCH_ASSOC);
$name_title = $row_title['name'];
?>
<title><?php echo $name_title; ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php 
$select_stmt_title = $conn->prepare("SELECT `image`, `show` FROM `title` WHERE id = 3");
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
          $template_setting_id = 3;
          $sql = "SELECT `page3_heading` FROM `template_setting` WHERE id = " . $template_setting_id;
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $result = $stmt->fetch(PDO::FETCH_ASSOC);
          $page3_heading = $result['page3_heading'];

          $select_stmt_13 = $conn->prepare("SELECT `Details`, `connect`, `show` FROM `text` WHERE id = " . $page3_heading);
          $select_stmt_13->execute();
          $row_13 = $select_stmt_13->fetch(PDO::FETCH_ASSOC);
          $Details_13 = $row_13['Details'];
          $connect_13 = $row_13['connect'];
          $show_13 = $row_13['show'];

          // ตรวจสอบค่าในฟิลด์ "show"
          if ($show_13 === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
          ?>
          <h2><?php echo $Details_13; ?></h2>
          <?php   } // ปิดเงื่อนไข if?>
          <div class="clr"></div>
              <?php 
                $template_setting_id = 3;
                $sql = "SELECT `page3_Textcontent` FROM `template_setting` WHERE id = " . $template_setting_id;
                $stmt = $conn->prepare($sql);
                $stmt->execute();
               $result = $stmt->fetch(PDO::FETCH_ASSOC);
              $page3_Textcontent = $result['page3_Textcontent'];
              
              $select_stmt_24 = $conn->prepare("SELECT `Details`, `connect`, `show` FROM `text` WHERE id = " . $page3_Textcontent);
              $select_stmt_24->execute();
              $row_24 = $select_stmt_24->fetch(PDO::FETCH_ASSOC);
              $Details_24 = $row_24['Details'];
              $connect_24 = $row_24['connect'];
              $show_24 = $row_24['show'];

    // ตรวจสอบค่าในฟิลด์ "show"
                if ($show_24 === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                ?>
             
          <p></p><?php echo $Details_24; ?></p>
               <?php   } // ปิดเงื่อนไข if?>
                        <?php 
                            $template_setting_id = 3;
                            $sql = "SELECT `page3_Textcontent2` FROM `template_setting` WHERE id = " . $template_setting_id;
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            $page3_Textcontent2 = $result['page3_Textcontent2'];
  
                            $select_stmt_25 = $conn->prepare("SELECT `Details`, `connect`, `show` FROM `text` WHERE id = " . $page3_Textcontent2);
                            $select_stmt_25->execute();
                            $row_25 = $select_stmt_25->fetch(PDO::FETCH_ASSOC);
                            $Details_25 = $row_25['Details'];
                            $connect_25 = $row_25['connect'];
                            $show_25 = $row_25['show'];

                             // ตรวจสอบค่าในฟิลด์ "show"
                             if ($show_25 === 'on') { // เมื่อค่าในฟิลด์ "show" เป็น "on" เท่านั้น
                              ?>
             
          <p></p><?php echo $Details_24; ?></p>
               <?php   } // ปิดเงื่อนไข if?>
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
