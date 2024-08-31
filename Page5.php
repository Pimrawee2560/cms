<?php
// เชื่อมต่อกับฐานข้อมูลผ่านไฟล์ DB_config.php
require_once('DB_config.php');

// การดึงข้อมูลทุกแถวที่ฟีล status เป็น 'use' จากตาราง template
$select_stmt_Page5 = $conn->prepare("SELECT `Page5` FROM `template` WHERE `Status` = 'use'");
$select_stmt_Page5->execute();

// วนลูปผลลัพธ์ที่ได้
while ($row_Page5 = $select_stmt_Page5->fetch(PDO::FETCH_ASSOC)) {
    $Page5 = $row_Page5['Page5'];
    include $Page5;
}
?>