<?php
// เชื่อมต่อกับฐานข้อมูลผ่านไฟล์ DB_config.php
require_once('DB_config.php');

// การดึงข้อมูลทุกแถวที่ฟีล status เป็น 'use' จากตาราง template
$select_stmt_Page4 = $conn->prepare("SELECT `Page4` FROM `template` WHERE `Status` = 'use'");
$select_stmt_Page4->execute();

// วนลูปผลลัพธ์ที่ได้
while ($row_Page4 = $select_stmt_Page4->fetch(PDO::FETCH_ASSOC)) {
    $Page4 = $row_Page4['Page4'];
    include $Page4;
}
?>