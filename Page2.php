<?php
// เชื่อมต่อกับฐานข้อมูลผ่านไฟล์ DB_config.php
require_once('DB_config.php');

// การดึงข้อมูลทุกแถวที่ฟีล status เป็น 'use' จากตาราง template
$select_stmt_Page2 = $conn->prepare("SELECT `Page2` FROM `template` WHERE `Status` = 'use'");
$select_stmt_Page2->execute();

// วนลูปผลลัพธ์ที่ได้
while ($row_Page2 = $select_stmt_Page2->fetch(PDO::FETCH_ASSOC)) {
    $Page2 = $row_Page2['Page2'];
    include $Page2;
}
?>