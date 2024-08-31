<?php
// เชื่อมต่อกับฐานข้อมูลผ่านไฟล์ DB_config.php
require_once('DB_config.php');

// การดึงข้อมูลทุกแถวที่ฟีล status เป็น 'use' จากตาราง template
$select_stmt_Page8 = $conn->prepare("SELECT `Page8` FROM `template` WHERE `Status` = 'use'");
$select_stmt_Page8->execute();

// วนลูปผลลัพธ์ที่ได้
while ($row_Page8 = $select_stmt_Page8->fetch(PDO::FETCH_ASSOC)) {
    $Page8 = $row_Page8['Page8'];
    include $Page8;
}
?>