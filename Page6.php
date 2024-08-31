<?php
// เชื่อมต่อกับฐานข้อมูลผ่านไฟล์ DB_config.php
require_once('DB_config.php');

// การดึงข้อมูลทุกแถวที่ฟีล status เป็น 'use' จากตาราง template
$select_stmt_Page6 = $conn->prepare("SELECT `Page6` FROM `template` WHERE `Status` = 'use'");
$select_stmt_Page6->execute();

// วนลูปผลลัพธ์ที่ได้
while ($row_Page6 = $select_stmt_Page6->fetch(PDO::FETCH_ASSOC)) {
    $Page6 = $row_Page6['Page6'];
    include $Page6;
}
?>