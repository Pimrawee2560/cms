<?php
// เชื่อมต่อกับฐานข้อมูลผ่านไฟล์ DB_config.php
require_once('DB_config.php');

// การดึงข้อมูลทุกแถวที่ฟีล status เป็น 'use' จากตาราง template
$select_stmt_Page1 = $conn->prepare("SELECT `Page1` FROM `template` WHERE `Status` = 'use'");
$select_stmt_Page1->execute();

// วนลูปผลลัพธ์ที่ได้
while ($row_Page1 = $select_stmt_Page1->fetch(PDO::FETCH_ASSOC)) {
    $Page1 = $row_Page1['Page1'];
    include $Page1;
}
?>